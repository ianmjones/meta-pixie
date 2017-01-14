<?php

/**
 * The core plugin class.
 *
 * This is used to define internationalization, dashboard-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 */
class Meta_Pixie {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 */
	protected $meta_pixie;

	/**
	 * The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the Dashboard and
	 * the public-facing side of the site.
	 */
	public function __construct() {
		$this->meta_pixie = 'meta-pixie';
		$this->version    = '1.1';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Meta_Pixie_Loader. Orchestrates the hooks of the plugin.
	 * - Meta_Pixie_i18n. Defines internationalization functionality.
	 * - Meta_Pixie_Data_Format. Various data format routines.
	 * - Meta_Pixie_List_Table. Extends WP_List_Table functionality.
	 * - Meta_Pixie_Admin. Defines all hooks for the dashboard.
	 *
	 * Creates an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 */
	private function load_dependencies() {
		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-meta-pixie-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-meta-pixie-i18n.php';

		/**
		 * The data format utilities class.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-meta-pixie-data-format.php';

		/**
		 * The class responsible for creating and display of the list table.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-meta-pixie-list-table.php';

		/**
		 * The class responsible for defining all actions that occur in the Dashboard.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-meta-pixie-admin.php';

		$this->loader = new Meta_Pixie_Loader();
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Meta_Pixie_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 */
	private function set_locale() {
		$plugin_i18n = new Meta_Pixie_i18n();
		$plugin_i18n->set_domain( $this->get_meta_pixie() );

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}

	/**
	 * Register all of the hooks related to the dashboard functionality
	 * of the plugin.
	 */
	private function define_admin_hooks() {
		$plugin_admin = new Meta_Pixie_Admin( $this->get_meta_pixie(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		$this->loader->add_action( 'init', $plugin_admin, 'delay_output' );

		if ( is_multisite() ) {
			$this->loader->add_action( 'network_admin_menu', $plugin_admin, 'add_menu_items' );
		} else {
			$this->loader->add_action( 'admin_menu', $plugin_admin, 'add_menu_items' );
		}
		$this->loader->add_action( 'meta_pixie_admin_page_hooked', $plugin_admin, 'admin_page_hooked' );
		$this->loader->add_filter( 'set-screen-option', $plugin_admin, 'set_records_per_page_option', 10, 3 );
		$this->loader->add_filter( 'meta_pixie_admin_page_footer', $plugin_admin, 'get_admin_page_footer' );

		$this->loader->add_filter( 'meta_pixie_get_query_string', $plugin_admin, 'get_query_string', 10, 2 );
		$this->loader->add_filter( 'meta_pixie_get_count', $plugin_admin, 'get_count', 10, 2 );
		$this->loader->add_filter( 'meta_pixie_get_item', $plugin_admin, 'get_item', 10, 2 );

		$this->loader->add_filter( 'meta_pixie_column_display', $plugin_admin, 'column_display', 10, 3 );
		$this->loader->add_filter( 'meta_pixie_column_row_actions', $plugin_admin, 'column_row_actions', 10, 3 );
		$this->loader->add_filter( 'meta_pixie_extra_tablenav', $plugin_admin, 'extra_tablenav', 10, 2 );
		$this->loader->add_action( 'wp_ajax_meta_pixie_toggle_truncate', $plugin_admin, 'ajax_toggle_truncate' );
		$this->loader->add_action( 'wp_ajax_meta_pixie_toggle_remember_search', $plugin_admin, 'ajax_toggle_remember_search' );

		// We just want to access some static functions.
		$plugin_list_table = 'Meta_Pixie_List_Table';

		$this->loader->add_filter( 'meta_pixie_format_row_actions', $plugin_list_table, 'format_row_actions' );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @return string The name of the plugin.
	 */
	public function get_meta_pixie() {
		return $this->meta_pixie;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @return Meta_Pixie_Loader Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @return string The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Returns the admin url that can be used to update the plugin.
	 *
	 * @return string
	 */
	public function get_update_url() {
		$basename = plugin_basename( plugin_dir_path( dirname( __FILE__ ) ) . '/meta-pixie.php' );

		return wp_nonce_url( network_admin_url( 'update.php?action=upgrade-plugin&plugin=' . urlencode( $basename ) ), 'upgrade-plugin_' . $basename );
	}

	/**
	 * Returns an HTML link that can be used to update the plugin.
	 *
	 * @return string
	 */
	public function get_update_link() {
		return sprintf( '<a href="%1$s">%2$s</a>', $this->get_update_url(), _x( 'Update Meta Pixie Now', 'Download and install a new version of the plugin', 'meta-pixie' ) );
	}
}
