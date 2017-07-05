=== Plugin Name ===
Contributors: ianmjones
Donate link: https://www.bytepixie.com/
Tags: commentmeta, wp_commentmeta, postmeta, wp_postmeta, termmeta, wp_termmeta, sitemeta, wp_sitemeta, usermeta, wp_usermeta, metadata, admin, administration, search, sort, filter, view
Requires at least: 3.9
Tested up to: 4.8
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

List, sort, search and view your WordPress site's commentmeta, postmeta, termmeta, sitemeta and usermeta records with style.

== Description ==

List, filter, sort and view commentmeta, postmeta, termmeta, sitemeta and usermeta records, even serialized and base64 encoded values.

* List, sort and search metadata
* "Rich view" of serialized and JSON string values
* Works with base64 encoded serialized and JSON string values
* Highlights broken serialized values
* Supports Multisites

= Inspect Your Site's Metadata =
With Meta Pixie you can find out what is really going on with your WordPress metadata.

Your metadata tables hold nearly all the settings that govern how your WordPress site looks and works, and if things aren't working quite as expected it's good to be able to peak into these records right in your site's admin dashboard.

= Broken Serialized Values =
Meta Pixie highlights broken serialized values, showing you exactly where that string buried deep in a setting and supposed to be 128 characters long is actually only 127, something that is otherwise very hard to spot.

= Rich View =
The Rich View takes those long unwieldy strings of serialized or JSON data and turns them into neat expandable lists of key/value pairs, much easier to read and understand.

= Decodes Base64 Encoded Values =
Also with Rich View you can drill into those otherwise opaque base64 encoded values, Meta Pixie decodes them to show you the serialized data, JSON string or object hidden within.

= Multisite Support =
When installed on a WordPress Multisite it is activated at the network level, with a site selector shown above the list of records to enable switching between the metadata tables for each subsite, with sitemeta also made available.

= Search & Sort =
The usual search and sort functionality you expect from an admin page are there to help you find the records you need, including filter links to switch between seeing all sitemeta records, permanent records only or transient sitemeta only when on a multisite.

== Installation ==

= From your WordPress dashboard =
1. Visit 'Plugins > Add New'
1. Search for 'Meta Pixie'
1. Activate Meta Pixie from your Plugins page.

= From WordPress.org =
1. Download Meta Pixie.
1. Upload the 'meta-pixie' directory to your '/wp-content/plugins/' directory, using your favorite method (ftp, sftp, scp, etc...)
1. Activate Meta Pixie from your Plugins page.

== Frequently Asked Questions ==

= Do I have to activate Meta Pixie on every Multisite subsite? =

Nope (it's network activated).

= Does Meta Pixie support multiple networks? =

Yep.

= Can I add/edit/delete postmeta records with Meta Pixie? =

Nope, but we have a Pro addon for that called [Meta Pixie Pro](https://www.bytepixie.com/meta-pixie-pro).

= Can I fix broken serialized postmeta records with Meta Pixie? =

Nope, but we have a Pro addon for that called [Meta Pixie Pro](https://www.bytepixie.com/meta-pixie-pro).

== Screenshots ==

1. Rich View.
2. List View.
3. Multisites Supported.
4. Screen Options Pane.
5. Help Pane.

== Changelog ==

= 1.1 =
* New: Related ID is now a link to edit page for related comment, post, site or user as appropriate.
* Fix: Deprecation notice for `wp_get_sites` on WP 4.6+.

= 1.0.1 =
* Fix: Expanding value for usermeta record returns postmeta value if same meta_id exists.

= 1.0 =
* Initial release.
