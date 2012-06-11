<?php

/**
<<<<<<< HEAD
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
=======
 *
 * @name eps_settings
 * @package easypshop
 * @author: Ruben Storm
 * @link http://projects.ruben-storm.eu/easypartnershop/
 * @copyright Copyright (c) 2012, Ruben Storm
 * @link http://www.gnu.org/licenses/gpl.html
 * @version 0.0.5
 * @since Version 0.0.5
 * @license: GNU General Public License 3.0 (GPL) http://www.gnu.org/licenses/gpl.html
 * 
>>>>>>> 245677b78c7e19d3804cbdbec14b9fbfbaee4933
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
<<<<<<< HEAD
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
=======
 * 
 *  
 */

/**
 *
 * This is the setup file, here you have to set up your shop. Please make sure 
 * you have everything setup right, so the shop can work. 
 * 
 */


/**
 *
 * Define the name of the Shop Theme, it is the same name as the foldername of 
 * the themefolder. 
 * 
 * This is only used if "SHOP_THEME_SETTINGS" is set to 0
>>>>>>> 245677b78c7e19d3804cbdbec14b9fbfbaee4933
 */
define('SHOP_THEME', 'default');

/**
<<<<<<< HEAD
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
=======
 *
 * If you want to use the theme that is defined in the settings file, then set 
 * the "SHOP_THEME_SETTINGS" to 1
 *
 * Default ist that all shops have the same theme. With this you can change it. 
 *
 * define('SHOP_THEME_SETTINGS', 0); all shops will use the same theme. The 
 * theme is set in define('SHOP_THEME', 'default');
 *
 * define('SHOP_THEME_SETTINGS', 1); every shop has a own theme, the settings for 
 * "SHOP_THEME" is ignored and you have to set up every theme in the special 
 * shop file
 * 
>>>>>>> 245677b78c7e19d3804cbdbec14b9fbfbaee4933
 */
define('SHOP_THEME_SETTINGS', 0);



/**
<<<<<<< HEAD
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
=======
 *
 * In this section you set up the language of your shop. The default is german, 
 * for german language it is de_DE, see the default settings 
 * define("SHOP_LANG", "de_DE"); 
 *
 * For more Information about language settings look at the wikipedia website.
 * @see http://projects.ruben-storm.eu/easypartnershop/
 * @todo make or find a list with posix locale for example
 * @todo not used in Version 0.0.5, implement in next version
>>>>>>> 245677b78c7e19d3804cbdbec14b9fbfbaee4933
 */
define('SHOP_LANG', 'de_DE');


/**
<<<<<<< HEAD
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
=======
 *
 * Show the Information about the Project, if you like to support it. 
 * Default is 1, set it to 0 if you dont want to show 
>>>>>>> 245677b78c7e19d3804cbdbec14b9fbfbaee4933
 */
define('SHOW_EPS_INFO', 1);


?>