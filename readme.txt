=== Forms with chart from VAB ===
Plugin Name: Forms with chart from VAB
Contributors: vabtopic
Donate link: https://it-vab.ru/vab-forms-with-chart#donate
Tags: chart, contact, form, contact form, forms with chart, feedback, email, multilingual
Requires at least: 5.5.1
Requires PHP: 5.6.20
Tested up to: 5.9.3
Stable tag: 1.1.4
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Simple Plugin for creating forms, inquirer and questionnaires with the ability to display the results in the form of charts.

== Description ==

Forms with chart from VAB can manage multiple contact forms, plus you can customize the form. The main direction of the plugin is polls and questionnaires with the output of results in the form of diagrams of such fields as «Check boxes», «Radio buttons», «Drop-down list» in pure css, but it is also suitable for creating simple feedback forms. Forms have their own protection against bots.

= Docs and support =

You can find more detailed information about Forms with chart from VAB on [it-vab.ru](https://it-vab.ru/vab-forms-with-chart/).

= Forms with chart from VAB needs your support =

It is hard to continue development and support for this free plugin without contributions from users like you. If you enjoy using Forms with chart from VAB and find it useful, please consider [making a donation](https://it-vab.ru/vab-forms-with-chart#donate). Your donation will help encourage and support the plugin's continued development and better user support.

= Privacy notices =

With the default configuration, this plugin, in itself, does not:

* track users by stealth;
* write any user personal data to the database;
* send any data to external servers;
* use cookies.

In the form settings, you can activate the plugin actions:

* logs the entered form data to a file for displaying the results of diagrams.


= Recommended plugins =

None

= Translations =

The plugin supports the ability to translate into any language. You can use special programs for translation, such as «Poedit». By default, the plugin is only translated into Russian.

== Installation ==

1. Upload the entire `vab-forms-with-chart` folder to the `/wp-content/plugins/` directory.
1. Activate the plugin through the **Plugins** screen (**Plugins > Installed Plugins**).

You will find **Contact** menu in your WordPress admin screen.

For basic usage, have a look at the [plugin's website](https://it-vab.ru/vab-forms-with-chart/).

== Frequently Asked Questions ==

Do you have questions or issues with Forms with chart from VAB? Use these support channels appropriately.

1. [FeedBack](https://it-vab.ru/контактная-форма/)
2. [Plugin's website](https://it-vab.ru/vab-forms-with-chart/)

= How to display form results anywhere else using shortcode =

To display the results of the form in any other place, you need to add the shortcode «VABFWC_Graphic».
For example.

**1.** For page and post editor

`[VABFWC_Graphic id="2228" title="Title for shortcode" tag="h4" class="my_class"]`

**2.** HTML code

`echo do_shortcode( '[VABFWC_Graphic id="2228" title="Title for shortcode" tag="h4" class="my_class"]' );`

Where:

* id - form identifier (required);
* title - text before displaying form results (optional);
* tag - the tag in which the title will be wrapped (optional). Allowed tags - h1, h2, h3, h4, h5, h6, div, p, center;
* class - Sets the style class for the tag (optional);

= Where are of the log files =

The log files are in the uploads folder. Folder structure example:

`...
├── your.site.com
	...
	├── wp-content
	│		├── languages
	│		├── plugins
	│		├── themes
	│		├── upgrade
	│		├── uploads
	│		│		...
	│		│		├── VABFWC
	│		│		│		├── your-site-com
	│		│		│		│		└── Diagram
	│		│		│		│				├── «form ID»
	│		│		│		│				│		├── .htaccess
	│		│		│		│				│		...
	│		│		│		│				│		├── «log files»
	│		│		│		│				│		...
	│		│		│		│				│		└── index.php
	│		│		...
	│		└── index.php
	├── wp-config.php
	...`


== Screenshots ==

1. General view of the list of questions, editing and adding new ones
2. General view of diagrams on the frontend
3. General view of additional options
4. General view of an incoming E-mail message

== Changelog ==

= 1.1.3 =

* Added the ability to move form elements (swap questions);

= 1.1.4 =

* Added shortcode to display form results anywhere;
* Now the name of the log files depends on the form ID;

== Upgrade Notice ==

None