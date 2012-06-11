<?php

/**
 * @file libErrors.php
 * @brief The libErrors
 * 
 * This is a library where the error made, controled and checked. 
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
 * @name libErrors
 * @package lib
 * 
 *  
 */

/**
 * @class libErrors
 * @brief Error handler
 * 
 * The error handler is checking for errors and if there is an error it throws 
 * an exeption
 * 
 *
 * @todo Check it and fix some controler bugs
 * @author Ruben Storm
 * @version 0.0.5
 * @since Version 0.0.5
 */
class libErrors {
    //put your code here
    
    /**
     * @var string $errorMessage
     * @brief Error message
     * 
     * Default error Message for the error handler
     * 
     * 
     * @author Ruben Storm
     * @version 0.0.5
     * @since Version 0.0.5
     *  
     */
    static private $errorMessage = '<p align="center" style="color: red;"><b>ERROR: </b><br />{error.message}</p>';
    
    /**
     * @fn __construct()
     * @brief Constructor
     * 
     * The constructor for the error handler.
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
     * @fn mk_Errors($message, $id)
     * @brief Make the error
     * 
     * The error maker, main object to make an error, call this from other 
     * classes if an error happen
     * 
     * @version 0.0.5
     * @since Version 0.0.5
     * @author Ruben Storm
     * @param   string  $message
     *      the error message that throw
     * @param   string  $id
     *      the id, 0 or 1, if 1 it will throw an error
     * @return 
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
     * @fn function _getError()
     * @brief check errors
     * 
     * Check if an error happen, then go to next and throw exception
     * 
     * @version 0.0.5
     * @since Version 0.0.5
     * @author Ruben Storm
     * @todo manual and over work it, might be depricated
     * @return
     *  
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
    
    /**
     * @fn _errorControler()
     * @brief Error 
     * 
     * Gets called if an error happen and it throws exception
     * 
     * @todo make the shop stop
     * @version 0.0.5
     * @since Version 0.0.5
     * @author Ruben Storm
     * @throws Exception
     * 
     */
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