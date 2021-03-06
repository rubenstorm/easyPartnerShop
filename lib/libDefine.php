<?php

/**
 * @file libDefine.php
 * @brief The libDefine
 * 
 * This is a library where the definitions made and controled. 
 * 
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
 * @name libDefine
 * @package lib
 * 
 *  
 */

/**
 * @class libDefine
 * @brief Library for definitions
 * 
 * The libDefine is making sure everything gets defined what the system 
 * needs to be running
 *
 * @author Ruben Storm
 * @version 0.0.5
 * @since Version 0.0.5
 */
class libDefine {
    //put your code here
    
    /**
     * @fn __construct()
     * @brief Constructor
     * 
     * The constructor for the libDefine.
     * 
     * @version 0.0.5
     * @since Version 0.0.5
     * @author Ruben Storm
     * @abstract
     */
    private function __construct(){
        // instanziierung verhindern
    }
    
    /**
     * @fn mk_define()
     * @brief Make definitions
     * 
     * This is the main door for the libDefine, here it defines the host so the 
     * shop can find the special settings.
     * 
     * @version 0.0.5
     * @since Version 0.0.5
     * @author Ruben Storm
     * @return
     */
    static public function mk_define() {
        /* make define, define all things that are important */
        define('REQ_DOMAIN', $_SERVER['HTTP_HOST']);
        
        
        self::_shopDefiner();
        self::_themeDefiner();
        
        return;
    }
    
    /**
     * @fn _shopDefiner()
     * @brief The definer
     * 
     * This is checking how the setup is made, if you have a theme for all shops 
     * or if every shop has a single theme, then it will activate your theme and 
     * make the definiton you want
     * 
     * @version 0.0.5
     * @since Version 0.0.5
     * @author Ruben Storm
     * @return
     */
    static private function _shopDefiner() {
        // Define the Shop settings
        if (!defined('SHOP_THEME_SETTINGS')) {
            define('SHOP_THEME_SETTINGS', 0);
        }
        
        if (!defined('SHOP_THEME')) {
            define('SHOP_THEME', 'default');
        }
        
        return;
    }
    
    /**
     * @fn _themeDefiner()
     * @brief Theme definiton
     * 
     * Define the Theme extra, only used to identify later on the real theme, 
     * if single or special settings for each shop.
     * 
     * @version 0.0.5
     * @since Version 0.0.5
     * @author Ruben Storm
     * @return
     */
    static private function _themeDefiner() {
        // define the theme
        if (SHOP_THEME_SETTINGS == 1) {
            define('SHOP_THEME_EXTRA', libShopData::_getShopTheme());
        }
        
        return;
        
    }
    
    /**
     * @fn _definer($def, $data)
     * @brief Single definer
     * 
     * Define a single part, so if you have to restup a special information, it 
     * will get directly in here
     * 
     * @version 0.0.5
     * @since Version 0.0.5
     * @author Ruben Storm
     * @param   string  $def
     *      this is the definition
     * @param   string  $data
     *      this is the data that has to be saved
     * @return 
     */
    static public function _definer($def, $data) {
        // define a single definition
        define($def, $data);
        return;
    }
}

?>