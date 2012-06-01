<?php

/**
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
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
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
 */
define('SHOP_THEME', 'default');

/**
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
 */
define('SHOP_THEME_SETTINGS', 0);



/**
 *
 * In this section you set up the language of your shop. The default is german, 
 * for german language it is de_DE, see the default settings 
 * define("SHOP_LANG", "de_DE"); 
 *
 * For more Information about language settings look at the wikipedia website.
 * @see http://projects.ruben-storm.eu/easypartnershop/
 * @todo make or find a list with posix locale for example
 * @todo not used in Version 0.0.5, implement in next version
 */
define('SHOP_LANG', 'de_DE');


/**
 *
 * Show the Information about the Project, if you like to support it. 
 * Default is 1, set it to 0 if you dont want to show 
 */
define('SHOW_EPS_INFO', 1);


?>