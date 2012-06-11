<?php

/**
 * @file shopControler.php
 * @brief The shopControler
 * 
 * This is the Controler for the Shop
 * 
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
 * @name shopControler
 * @package cmd
 */



/**
 * @class shopControler
 * @brief Shop controler
 * 
 * This is the main class for the Shop controler
 * 
 * @author Ruben Storm
 * @version 0.0.5
 * @since Version 0.0.5
 *  
 */
class shopControler {
    
    /**
     * @var string $errorMessage
     * @brief Error message
     * 
     * Default error Message for the shopControler
     * 
     * This is the error message for the shopControler. This will be given out 
     * if no other message exists and an error happen. 
     * See the libErrors::mk_Errors
     * 
     * @author Ruben Storm
     * @version 0.0.5
     * @since Version 0.0.5
     *  
     */
    static private $errorMessage = 'The controler found a system error';
     
    /**
     * @fn __construct()
     * @brief Constructor
     * 
     * The constructor for the shopControler.
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
     * @fn checkShop()
     * @brief Check the shop
     * 
     * The public method to enter the main controler
     * 
     * @author Ruben Storm
     * @version 0.0.5
     * @since 0.0.5
     * @return
     */
    static public function checkShop() {
        // check if the shop is ok an everything is defined
        self::_checker();
        
        return;        
    }
    
    /**
     * @fn _checkSingle($toCheck)
     * @brief Single checker
     * 
     * The public method to check a single possition if it exists and is 
     * ok it will return true<
     * 
     * <em>This method is used to check a single settings value.</em>
     * 
     * @author Ruben Storm
     * @version 0.0.5
     * @since 0.0.5
     * @param string $toCheck
     *      the name string to check on
     * 
     * @return boolean true
     *      all is ok, true or nothing is ok, false
     */
    static public function _checkSingle($toCheck) {
        if (defined($toCheck)) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * @fn _checker()
     * @brief The checker
     * 
     * This is the oposit of the self::_checkSingle
     * 
     * This method is also checking the system if all is ok, so hier run the 
     * last check bevor the data is parsed, called before it makes the final 
     * printout
     * 
     * @author Ruben Storm
     * @version 0.0.5
     * @since 0.0.5
     * @return
     */
    static private function _checker() {
        // check all defines
        if (!defined('REQ_DOMAIN')) {
            // if defined REQ_DOMAIN not exists, throw an error
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
