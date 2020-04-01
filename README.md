# genius-stack-theme
Specialized WordPress Child Theme for [UnderStrap Theme Framework](https://github.com/understrap/understrap) designed to work as part of the [Genius Stack service by FatLab, LLC](https://thegeniusstack.com/).

## Overview
Genius Stack shares with the parent theme all PHP files and adds its own functions.php on top of the UnderStrap parent theme's functions.php.

**IT DOES NOT LOAD THE PARENT THEMES CSS FILE(S)!** Instead it uses the UnderStrap Parent Theme as a dependency via npm and compiles its own CSS file from it.

Genius Stack Child Theme uses the Enqueue method to load and sort the CSS file the right way instead of the old @import method.

## Installation
1. Install the parent theme UnderStrap first: [https://github.com/understrap/understrap](https://github.com/understrap/understrap)
   - IMPORTANT: If you download UnderStrap from GitHub make sure you rename the "understrap-master.zip" file to "understrap.zip" or you might have problems using this child theme!
2. Upload the genius-stack folder to your wp-content/themes directory
3. Go into your WP admin backend 
4. Go to "Appearance -> Themes"
5. Activate the Genius Stack theme

## License
[License: GNU General Public License v2 or later](http://www.gnu.org/licenses/gpl-2.0.html)

## Plugins
The Genius Stack theme was designed to work with specific plugins. These are listed below. Mandatory plugin(s) for this theme are noted.
1. [Advanced Custom Field (Pro Version Required)](https://www.advancedcustomfields.com/pro/)
2. [Classic Editor](https://wordpress.org/plugins/classic-editor/) 
3. [Gravity Forms](https://www.gravityforms.com/) 
4. [Yoast SEO](https://wordpress.org/plugins/wordpress-seo/) 

## Services/Plugins
The Genius Stack theme was designed to be fast loading and light-weight. The following are services we recommend to be used in conjunction with the theme to aid in its performance.
1. [WP Rocket](https://wp-rocket.me/)
2. [Imagify](https://wp-rocket.me/)

## Documentation
Documentation is maintained at [https://thegeniusstack.com/docs/](https://thegeniusstack.com/docs/)

## Credits
[Underscores Starter Theme by Automattic](https://underscores.me/)
This is the starter theme that the parent theme is based on and was developed by Automattic the company behind WordPress.

[UnderStap Starter Theme](https://understrap.com/)
Based on Underscores, this open source theme includes the Bootstrap 4 framework by Twitter and is the parent theme to this project.

[Twitter Bootstrap](https://getbootstrap.com/)
An open source framework developed by Twitter.

[FontAwesome](https://fontawesome.com/)
Included in UnderStrap, a great resource for fast loading web icons.

[Holger Könemann](https://www.holgerkoenemann.de/)
Developed the Understrap child theme that we based the Genius Stack theme from. Original child theme can be found on [GitHub](https://github.com/understrap/understrap-child)


## Current Version
Current theme version: 1.0.0

### Version Notes

#### V. 1.0.0
**Date: March 31, 2020**
This is the initial release of the Genius Stack theme as we soft launch the Genius Stack Service. 