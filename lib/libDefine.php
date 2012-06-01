<?php

/**
 *
 * @name libDefine
 * @package easypshop
 * @subpackage lib
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
 * Description of libDefine
 * The libDefine is making sure everything gets defined what the system 
 * needs to be running
 *
 * @author Ruben Storm
 */
class libDefine {
    //put your code here
    private function __construct(){
        // instanziierung verhindern
    }
    
    /**
     *
     * This is the main door for the libDefine, here it defines the host so the 
     * shop can find the special settings.
     * @return type 
     */
    static public function mk_define() {
        /* make defin, define all things that are important */
        define('REQ_DOMAIN', $_SERVER['HTTP_HOST']);
        
        
        self::_shopDefiner();
        self::_themeDefiner();
        
        return;
    }
    
    /**
     *
     * This is checking how the setup is made, if you have a theme for all shops 
     * or if every shop has a single theme
     * @return type 
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
     *
     * Define the Theme extra, only used to identify later on the real theme, 
     * if single or special settings for each shop
     * @return type 
     */
    static private function _themeDefiner() {
        // define the theme
        if (SHOP_THEME_SETTINGS == 1) {
            define('SHOP_THEME_EXTRA', libShopData::_getShopTheme());
        }
        
        return;
        
    }
    
    /**
     *
     * Define a single part, so if you have to restup a special information, it 
     * will get directly in here
     * @param type $def this is the definition
     * @param type $data this is the data that has to be saved
     * @return type 
     */
    static public function _definer($def, $data) {
        /* make the definer */
        define($def, $data);
        return;
    }
}

?>