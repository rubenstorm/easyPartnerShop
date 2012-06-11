<?php

/**
<<<<<<< HEAD
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
=======
 *
 * @name shopManager
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
>>>>>>> 245677b78c7e19d3804cbdbec14b9fbfbaee4933
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
<<<<<<< HEAD
 * @endverbatim
 * 
 * @name shopManager
 * @package cmd
=======
 * 
 *  
>>>>>>> 245677b78c7e19d3804cbdbec14b9fbfbaee4933
 */



/**
<<<<<<< HEAD
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
=======
 * 
 * Description of shopManager
 * This is the manager from the shop, here is the shop build and then it 
 * makes the output. 
 * No required file in php because all classes get dynamic used over the loader. 
 * 
 * @see sysLoader
 * @author Ruben Storm 
>>>>>>> 245677b78c7e19d3804cbdbec14b9fbfbaee4933
 */
class shopManager {
    //put your code here
    /**
<<<<<<< HEAD
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
=======
     *
     * The default $errorMessage for the shopManager
     * @var type 
     */
    static private $errorMessage = 'Manager made a booboo';
    
>>>>>>> 245677b78c7e19d3804cbdbec14b9fbfbaee4933
    private function __construct(){
        // instanziierung verhindern
    }
    /**
<<<<<<< HEAD
     * @fn static public function eps_register()
     * @brief Register
     * 
     * Register the system and starting the shop
     * 
     * @author Ruben Storm
     * @version 0.0.5
     * @since 0.0.5
=======
     *
     * Register the system and starting the shop
     * @version 0.0.5
     * @since 0.0.5
     * @author Ruben Storm 
>>>>>>> 245677b78c7e19d3804cbdbec14b9fbfbaee4933
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
<<<<<<< HEAD
     * @fn static private function _get_Theme()
     * @brief Printer
     * 
     * Print the screen if all is done 
     * 
     * @author Ruben Storm
     * @version 0.0.5
     * @since 0.0.5
=======
     *
     * Print the screen if all is done 
>>>>>>> 245677b78c7e19d3804cbdbec14b9fbfbaee4933
     */
    static private function _get_Theme() {
        /* get the Shop header */
        echo libTheme::mk_theme();
        
    }
}

?>