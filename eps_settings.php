<?php

/**
 * @file eps_settings.php
 * @brief Settings file
 * 
 * This is the file where you set up your shop
 * 
 * This is the setup file, here you have to set up your shop. Please make sure 
 * you have everything setup right, so the shop can work.
 * 
 * @anchor setupFile
 * @category Settings
 * @author Ruben Storm
 * @copyright Copyright (c) 2012, Ruben Storm - GNU General Public License 3.0 (GPL) http://www.gnu.org/licenses/gpl.html 
 * @version 0.0.5
 * @since Version 0.0.5
 * 
 * @verbatim
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * @endverbatim
 * 
 * @see http://yoursl.in/easyPartnerShop Project Page
 * @see http://yoursl.in/GPL License
 * @name eps_settings
 * @package easypshop
 * 
 */

/**
 * @page Settings Shop Settings
 * @brief Shop setup
 * 
 * This is the setup file, here you have to set up your shop. Please make sure 
 * you have everything setup right, so the shop can work.
 * 
 * There are four points you have to configure in eps_settings.php, that's all.
 * Do configure those steps and move on to the XML configuration
 * 
 * @li @ref SHOP_THEME
 * @li @ref SHOP_THEME_SETTINGS
 * @li @ref SHOP_LANG
 * @li @ref SHOW_EPS_INFO
 *  
 * The other configuration is the theme XML and the shop XML. For this setup you 
 * go to @ref Database
 * 
 * When you are finished with that, go to the @ref main_install and @ref main_install 
 * you shop online.
 * 
 * 
 * 
 * @attention Make sure you made all setups right
 * @anchor Setup
 * @author Ruben Storm
 * @version 0.0.6
 * @since Version 0.0.6
 */



/**
 * @property SHOP_THEME
 * @brief The theme name
 * 
 * Setting up the Theme for the Shop.
 * 
 * Define the name of the Shop Theme, it is the same name as the folder of 
 * the theme.
 * 
 * You can here set up the shop, so every shop instance is using the same 
 * theme or each Shop has a different theme. If you want that each shop has his 
 * own theme, then ignore this settings and go to the next one
 * 
 * Make sure that the theme, that you configure here, is installed. The theme 
 * name @em default is saying that your theme is in the folder default.
 * 
 * <em>This is only used if SHOP_THEME_SETTINGS is set to 0</em>
 * 
 * Default settings: 
 * @code
 *      define('SHOP_THEME', 'default');
 * @endcode
 * <em>use the default theme, it is in the folder default of your main theme folder</em>
 * 
 * @warning The theme name must be the name of the folder where the theme resides
 * @author Ruben Storm
 * @version 0.0.5
 * 
 */
define('SHOP_THEME', 'default');

/**
 * @property SHOP_THEME_SETTINGS
 * @brief Theme settings
 * 
 * Default is that all shops have the same theme. With this setup you can change it.
 * 
 * Configure your Shop for single or multi themes.
 * 
 * The default ist that all shops use the same theme, i call it single setup. 
 * But you can install more than one shop, they just use the same theme. 
 * With those settings you configure the Shop to use single or multi theme, 
 * possible settings are @em 0 or @em 1
 * 
 * If you want to use the theme that is defined in the XML settings file, then set 
 * the this to @em 1
 * 
 * Default settings:
 * @code
 *      define('SHOP_THEME_SETTINGS', 0);
 * @endcode
 * <em>All shops you install use the same theme</em>
 * 
 * Every shop with a own theme:
 * @code
 *      define('SHOP_THEME_SETTINGS', 1);
 * @endcode
 * <em>Now each shop has a won theme, to set this up go to your XML setup file</em>
 * 
 * With this settings you have to make sure you have the theme written in the setup file 
 * and that each shop has its own theme installed. Now you can ignore the settings 
 * for SHOP_THEME
 * 
 * @warning If you turn this to 1, make sure you have the theme setup in the XML file
 * @author Ruben Storm
 * @version 0.0.5
 */
define('SHOP_THEME_SETTINGS', 0);



/**
 * @property SHOP_LANG
 * @brief Shop language
 * 
 * Setting up your language
 * 
 * In this section you set up the language of your shop. The default is german, 
 * for german language it is de_DE, see the default settings 
 * 
 * Default settings:
 * @code
 *      define("SHOP_LANG", "de_DE"); 
 * @endcode
 * 
 * @author Ruben Storm
 * @bug Not implemented in this version, the coding is not working
 * @todo make or find a list with posix locale for example, not used in Version 0.0.5, implement in next version
 * @version 0.0.5
 */
define('SHOP_LANG', 'de_DE');


/**
 * @property SHOW_EPS_INFO
 * @brief Set the shop information
 * 
 * You like this shop, you want to support it?
 * 
 * <em>Please show where i come from and what is this for a shop</em>
 * 
 * With other words, it has a copyright on it, you can configure here if you 
 * like to show it or not.
 * 
 * The default:
 * @code
 *      define('SHOW_EPS_INFO', 1);
 * @endcode
 * <em>Now it shows the copyright</em>
 * 
 * Don't show:
 * @code
 *      define('SHOW_EPS_INFO', 0);
 * @endcode
 * <em>Now it will hide the copyright</em>
 * 
 * 
 * @attention Would be nice if you support me and let it on 1, but you can set it on 0, if you don't want to show it
 * @author Ruben Storm
 * @version 0.0.5
 */
define('SHOW_EPS_INFO', 1);


?>