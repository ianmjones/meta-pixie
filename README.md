# [Meta Pixie](https://wordpress.org/plugins/meta-pixie/)
[![Build Status](https://travis-ci.org/bytepixie/meta-pixie.svg?branch=develop)](https://travis-ci.org/bytepixie/meta-pixie) [![Coverage Status](https://coveralls.io/repos/github/bytepixie/meta-pixie/badge.svg?branch=develop)](https://coveralls.io/github/bytepixie/meta-pixie?branch=develop) [![License](https://img.shields.io/badge/license-GPL--2.0%2B-green.svg)](https://github.com/bytepixie/meta-pixie/blob/master/src/LICENSE.txt)

## Description
List, filter, sort and view commentmeta, postmeta, termmeta, sitemeta and usermeta records, even serialized and base64 encoded values.

* List, sort and search metadata
* "Rich view" of serialized and JSON string values
* Works with base64 encoded serialized and JSON string values
* Highlights broken serialized values
* Supports Multisites

### Inspect Your Site's Options
With Meta Pixie you can find out what is really going on with your WordPress metadata.

Your metadata tables hold nearly all the settings that govern how your WordPress site looks and works, and if things aren't working quite as expected it's good to be able to peak into these records right in your site's admin dashboard.

### Broken Serialized Values
Meta Pixie highlights broken serialized values, showing you exactly where that string buried deep in a setting and supposed to be 128 characters long is actually only 127, something that is otherwise very hard to spot.

### Rich View
The Rich View takes those long unwieldy strings of serialized or JSON data and turns them into neat expandable lists of key/value pairs, much easier to read and understand.

### Decodes Base64 Encoded Values
Also with Rich View you can drill into those otherwise opaque base64 encoded values, Meta Pixie decodes them to show you the serialized data, JSON string or object hidden within.

### Multisite Support
When installed on a WordPress Multisite it is activated at the network level, with a site selector shown above the list of records to enable switching between the metadata tables for each subsite, with sitemeta also made available.

### Search & Sort
The usual search and sort functionality you expect from an admin page are there to help you find the records you need, including filter links to switch between seeing all sitemeta records, permanent records only or transient sitemeta only when on a multisite.e usual search and sort functionality you expect from an admin page are there to help you find the records you need, including filter links to switch between seeing all sitemeta records, permanent records only or transient sitemeta only when on a multisite.

## Installing
### From your WordPress dashboard
1. Visit 'Plugins > Add New'
1. Search for 'Meta Pixie'
1. Activate Meta Pixie from your Plugins page.

### From WordPress.org
1. Download [Meta Pixie](https://wordpress.org/plugins/meta-pixie/).
1. Upload the 'meta-pixie' directory to your '/wp-content/plugins/' directory, using your favorite method (ftp, sftp, scp, etc...)
1. Activate Meta Pixie from your Plugins page.

### From GitHub
1. Clone https://github.com/bytepixie/meta-pixie.git or download the [zip](https://github.com/bytepixie/meta-pixie/archive/master.zip)
2. Symlink `src` into your WordPress plugins folder as `meta-pixie`.

## Running Unit Tests
Run `tests/bin/run-unittests.sh -d testdb_name`

Usage: tests/bin/run-unittests.sh -d testdb_name [ -u dbuser ] [ -p dbpassword ] [ -h dbhost ] [ -P dbport ] [ -x dbprefix ] [ -D (drop-db) ] [ -s plugin_slug ] [ -c coverage_file ]

## Bugs & Feature Requests
Please report any issues via our [GitHub Issues list](https://github.com/bytepixie/meta-pixie/issues).
