# Plugin Dependencies Tab

 * Plugin Name: Plugin Dependencies Tab
 * Plugin URI: https://github.com/afragen/plugin-dependencies-tab
 * Description: Parses 'Requires Plugin' header, add plugin install dependencies tab, and information about dependencies.
 * Author: Andy Fragen
 * License: MIT
 * Network: true
 * Requires at least: 5.1
 * Requires PHP: 5.6

## Descripton

* Parses the **Requires Plugins** header that defines plugin dependencies using a comma separated list of wp.org slugs.
* Adds a new view/tab to plugins install page ( **Plugins > Add New** ) titled **Dependencies** that contains plugin cards for all plugin dependencies. This view also lists which plugins require which plugin dependencies, though that feature requires the filter below to function. 😅
* In the plugins page, a dependent plugin is unable to be deleted or deactivated if the requiring plugin is active.
* Plugin dependencies can be deactivated or deleted if the requiring plugin is not active.
* A label designating a 'Required Plugin' is inserted as is data noting which plugins require the dependency.
* Displays an admin notice with link to **Plugins > Add New > Dependencies** if not all plugin dependencies have been installed.
* Ensures that plugins with unmet dependencies cannot be activated.

Some of the messaging is too difficult to display without directly modifying core.

## Need to add to core

* Add filter hook to wp-admin/includes/class-wp-plugin-install-list-table.php:514
  * `$description = apply_filters( 'plugin_install_description', $description, $plugin );`
