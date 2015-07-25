<?php

/**
 * @file sysLoader.php
 * @brief The sysLoader
 * 
 * This is the file where it is looking for classes and includes them automatic 
 * so it is easy to develop new classes for the system. 
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
 * @see http://j.mp/easyPartnerShop Project Page
 * @see http://j.mp/GPL-v3 License
 * 
 * @name sysLoader
 * @package easypshop
 *  
 */

/**
 * @property INCLUDEBASE
 * @brief Define the INCLUDEBASE
 * 
 * Set the include Base to the Document Root.
 * 
 * @warning Don't change this settings, this has to be set the way it is
 * @author Ruben Storm
 * @version 0.0.5
 * @since Version 0.0.5
 */
define('INCLUDEBASE', realpath($_SERVER['DOCUMENT_ROOT']));


/**
 * @property Requires
 * @brief Require settings
 * 
 * Require the settings file.
 * 
 * This is the file where you have to set up your shop, the main settings 
 * are in this file, all other settings are in the XML files. So only change 
 * settings in this one php file
 * 
 * @author Ruben Storm
 * @see eps_settings
 */
require('./eps_settings.php');



/**
 * @class sysLoader
 * @brief The system loader
 * 
 * This is the sysLoader.
 * 
 * This class is checking the filesystem if a class exists and then loading what it 
 * need to run.
 * 
 * @author Ruben Storm 
 * @version 0.0.5
 * @since Version 0.0.5 
 * @see __autoload
 */
class sysLoader {
    
    /**
     * @fn __construct()
     * @brief Constructor
     * 
     * The constructor for the sysLoader.
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
     * @fn init($name)
     * @brief Entry for autoloader
     * 
     * Required by the autoloader.
     * 
     * This part is needed by the @ref __autoload method, so it can run the system
     * 
     * @author Ruben Storm
     * @version 0.0.5
     * @since Version 0.0.5
     * @param   string  $name 
     *      the name of the class to load
     * @return  string  $file 
     *      the file with path, where to find the requested class
     */
    public static function init($name) {
        // check the classfile, if exists
        $syspath = array('lib', 'cmd');
        for($i=0;$i<count($syspath);$i++){
            $file = $syspath[$i] . '/' . $name . '.php';
            if (file_exists($file)) {
                return $file;
            }
        } 
    }
    
    
    
}


/**
 * @fn __autoload($name)
 * @brief Autoloader
 * 
 * This is the autoloader, this is getting loaded to load everything needed 
 * during shop time
 * 
 * If class not exists it produces the class on the fly and throws an 
 * exception
 * 
 * @author Ruben Storm
 * @version 0.0.5
 * @since Version 0.0.5
 * @param   string    $name
 *      the name of the class to load
 * @return 
 */
function __autoload($name) {
    $includefile = sysLoader::init($name);
    @include_once $includefile;
    
    if (! class_exists($name, false)) {
        
        eval('class ' . $name . ' { ' .
                '    public function __construct() { ' .
                '        throw new Exception("Class ' . $name . ' not found."); ' .
                '    } ' .
                '} ');
        }
        
        return;
}


/**
 * @property eps_register
 * @brief Start the Shop
 * 
 * Call the shopManager::eps_register()
 * 
 * @author Ruben Storm
 * @version 0.0.5
 * @since Version 0.0.5
 */
shopManager::eps_register();



?>