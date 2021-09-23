# Plugin Dependency

 * Plugin Name: Plugin Dependency
 * Plugin URI: https://github.com/afragen/plugin-dependency
 * Description: Parses 'Requires Plugin' header, add plugin install dependencies tab, and information about dependencies.
 * Author: Andy Fragen
 * Version: 0.1.0
 * License: MIT
 * Network: true
 * Requires at least: 5.1
 * Requires PHP: 5.6

## Descripton

1. Parses the `Required Plugins` header that defines plugin dependencies using a comma separated list of wp.org slugs.
2. Adds a new view/tab to plugins install page ( Plugins > Add New ) titled 'Dependencies' that contains plugin cards for all plugin dependencies. This view also lists which plugins require which plugin dependencies.
3. In the plugins page a dependent plugin is unable to be deleted or deactivated.
A label designating a 'Required Plugin' is inserted as is data noting which plugins require the dependency.

## Need to add to core

* Add filter hook to wp-admin/includes/class-wp-plugin-install-list-table.php:514
  * `$description = apply_filters( 'plugin_install_description', $description, $plugin );`
