<?php

/**
 *
 * @name shopControler
 * @package easypshop
 * @subpackage cmd
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
 * This is the main class for the Shop controler
 * 
 * @version 0.0.5
 * @since Version 0.0.5
 * @author Ruben Storm 
 */
class shopControler {
    /**
     *
     * The default $errorMessage for the shopControler
     * @var type 
     */
    static private $errorMessage = 'The controler found a system error';
        
    private function __construct(){
        // instanziierung verhindern
    }
    
    /**
     *
     * The public function to enter the main controler
     * @return type 
     */
    static public function checkShop() {
        // check if the shop is ok
        self::_checker();
        
        return;        
    }
    
    /**
     *
     * The public function to check a single possition if it exists and is ok
     * @param type $toCheck
     * @return boolean 
     */
    static public function _checkSingle($toCheck) {
        if (defined($toCheck)) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     *
     * check the system if all is ok, is called before it makes the final printout
     * @return type 
     */
    static private function _checker() {
        // check all defines
        if (!defined('REQ_DOMAIN')) {
            libErrors::mk_Errors(self::$errorMessage, 1);
        }
        if (!defined('USE_THEME')) {
            libErrors::mk_Errors(self::$errorMessage, 1);
        }
        if (!defined('SHOP_SET_NAME')) {
            libErrors::mk_Errors(self::$errorMessage, 1);
        }
        if (!defined('SHOP_SET_DOM')) {
            libErrors::mk_Errors(self::$errorMessage, 1);
        }
        if (!defined('SHOP_SET_FRAME')) {
            libErrors::mk_Errors(self::$errorMessage, 1);
        }
        if (!defined('SHOP_SET_OWNER')) {
            libErrors::mk_Errors(self::$errorMessage, 1);
        }
        if (!defined('SHOP_SET_SLOGAN')) {
            libErrors::mk_Errors(self::$errorMessage, 1);
        }
        if (!defined('SHOP_SET_HEADER_TITLE')) {
            libErrors::mk_Errors(self::$errorMessage, 1);
        }
        if (!defined('SHOP_SET_HEADER_LANG')) {
            libErrors::mk_Errors(self::$errorMessage, 1);
        }
        if (!defined('SHOP_SET_HEADER_META_DESC')) {
            libErrors::mk_Errors(self::$errorMessage, 1);
        }
        if (!defined('SHOP_SET_HEADER_META_KEYW')) {
            libErrors::mk_Errors(self::$errorMessage, 1);
        }
        if (!defined('SHOP_LANG')) {
            libErrors::mk_Errors(self::$errorMessage, 1);
        }
        if (!defined('SHOW_EPS_INFO')) {
            libErrors::mk_Errors(self::$errorMessage, 1);
        }
        if (!defined('THEME_SETTINGS_HOMEPAGE')) {
            libErrors::mk_Errors(self::$errorMessage, 1);
        }
        return;
              
        
    }
    
}

?>
