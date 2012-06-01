<?php

/**
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
 * Description of shopManager
 * This is the manager from the shop, here is the shop build and then it 
 * makes the output. 
 * No required file in php because all classes get dynamic used over the loader. 
 * 
 * @see sysLoader
 * @author Ruben Storm 
 */
class shopManager {
    //put your code here
    /**
     *
     * The default $errorMessage for the shopManager
     * @var type 
     */
    static private $errorMessage = 'Manager made a booboo';
    
    private function __construct(){
        // instanziierung verhindern
    }
    /**
     *
     * Register the system and starting the shop
     * @version 0.0.5
     * @since 0.0.5
     * @author Ruben Storm 
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
     *
     * Print the screen if all is done 
     */
    static private function _get_Theme() {
        /* get the Shop header */
        echo libTheme::mk_theme();
        
    }
}

?>