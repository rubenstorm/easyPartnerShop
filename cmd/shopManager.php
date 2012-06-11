<?php

/**
 * @file shopManager.php
 * @brief The shopManager
 * 
 * This is the shop manager, the shop manager is making the main work for the system. 
 * Everything gets managed from here. So it is like the main class in the system. 
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
 * @name shopManager
 * @package cmd
 */



/**
 * @class shopManager
 * @brief Manager class
 * 
 * This is the shopManager class for the shop, it builds the shop and then gives the output
 * 
 * This class get automatic detected because of the sysLoader 
 * 
 * @author Ruben Storm
 * @version 0.0.5
 * @since Version 0.0.5
 */
class shopManager {
    //put your code here
    /**
     * @var string $errorMessage
     * @brief Error message
     * 
     * The default error message for the shopManager
     * 
     * @author Ruben Storm
     * @version 0.0.5
     * @since 0.0.5
     */
    static private $errorMessage = 'Manager made a booboo';
    
    /**
     * @fn private function __construct()
     * @brief Constructor
     * 
     * The constructor for the shopManager.
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
     * @fn static public function eps_register()
     * @brief Register
     * 
     * Register the system and starting the shop
     * 
     * @author Ruben Storm
     * @version 0.0.5
     * @since 0.0.5
     */
    static public function eps_register() {
        /* register everthing what have to be registered */
        libDefine::mk_define();
        libTheme::mk_theme();
        libShopData::getShop();
        shopControler::checkShop();
        libShopData::getShop();
        libErrors::_getError();
        self::_get_Theme();
    }
    /**
     * @fn static private function _get_Theme()
     * @brief Printer
     * 
     * Print the screen if all is done 
     * 
     * @author Ruben Storm
     * @version 0.0.5
     * @since 0.0.5
     */
    static private function _get_Theme() {
        /* get the Shop header */
        echo libTheme::mk_theme();
        
    }
}

?>