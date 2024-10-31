=== Replace Anchor Target ===
Contributors: ithemes, ChrisWiegman
Donate link: http://bit51.com/software/replace-anchor-target/
Tags: XHTML,jquery,filter
Requires at least: 3.0
Tested up to: 3.8.1
Stable tag: 3.1.2

Replaces target="_blank" attribute for XHTML Strict compliance.

== License ==  
Released under the terms of the GNU General Public License. 

== Description ==

Selecting "Open link in a new window" in the builtin Wordpress WYSIWYG editor breack XHTML strict compliance by adding the attribute target="_blank" to anchor tags. This plugin fixes the problem by replacing the target attribute with a common class attribute and then using a simple jquery script to open the link in a new window. This method allows for correct validation using XHTML 1.0 Strict.

== Installation ==

1. Upload all files to the `/wp-content/plugins/replace-anchor-target` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Changelog ==

= 3.1.2 =
* Moved to iThemes.com
* Tested in 3.8.1

= 3.1.1 =

* Updated Bit51 library
* Updated support and changelog to WordPress.org

= 3.1 =

* Minor refactoring
* Fixed PHP 5.2 bug
* Various typo and other corrections

= 3.0.2 =

* Minor bugfixes and refactoring

= 3.0.1 =

* New language translation support

= 3.0 =

* Completely rewritten codebase using my new Bit51 plugin library
* Added option to turn off plugin functionality for debugging

= 2.1 =

* target.js now links dynamically to handle a non-standard wp-content folder

= 2.0 =

* Now supported by Bit51.com

= 1.5 =

* Updated WordPress compliance

= 1.4 =

* Updated Homepage

= 1.3 =

* Spelling correction

= 1.2 =

* Request for project maintainers.

= 1.1 =

* Fixed installation instructions in readme.

= 1.0 =

* Added option page for donations

= 0.8 =

* New plugin homepage

= 0.7 =

* Correct plugin website address

= 0.6 =

* Minor bug fix

= 0.5 =

* Fixed error in readme file

= 0.4 =

* Changed author

= 0.3 =

* Cleanups and bug-fixes. Now tested with WP 3.0.1

= 0.2 =

* Now takes into account links that already have the class attribute

= 0.1 =

* First release.