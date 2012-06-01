<?php

/**
 *
 * @name libErrors
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
 * Description of libErrors
 * This is printing out the errors
 * 
 *
 * @todo Check it and fix some controler bugs
 * @author Ruben Storm
 */
class libErrors {
    //put your code here
    
    /**
     *
     * The default $errorMessage template
     * @var type 
     */
    static private $errorMessage = '<p align="center" style="color: red;"><b>ERROR: </b><br />{error.message}</p>';
    
    private function __construct(){
        // instanziierung verhindern
    }
    
    /**
     *
     * The error maker, main object to make an error, call this from other 
     * classes if an error happen
     * @param type $message the error message that throw
     * @param type $id the id, 0 or 1, if 1 it will throw an error
     * @return type 
     */
    static public function mk_Errors($message, $id) {
        // make the Errors
        if (shopControler::_checkSingle('SYSTEM_ERROR') == false) {
            libDefine::_definer('SYSTEM_ERROR', $id);
            libDefine::_definer('SYSTEM_ERROR_MESS', $message);
        }
        return;
        
    }
    
    /**
     *
     * @todo manual and over work it, might be depricated
     * @return type 
     */
    static public function _getError() {
        // get the Error
        if (defined('SYSTEM_ERROR') && SYSTEM_ERROR == 1) {
            // do error printer
            if (defined('SYSTEM_ERROR_MESS')) {
                self::$errorMessage = preg_replace('/{error.message}/', SYSTEM_ERROR_MESS, self::$errorMessage);
            } else {
                self::$errorMessage = preg_replace('/{error.message}/', 'Unknown system error', self::$errorMessage);
            }
            
            self::_errorControler();
        }
        return;
    }
    
    static private function _errorControler() { 
        // control Error type
        try {
            throw new Exception(self::$errorMessage);
        } catch(Exception $e) {
            echo $e->getMessage();
        }
        
    }


    
    
    
}

?>