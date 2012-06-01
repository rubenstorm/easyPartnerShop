<?php

/**
 *
 * @name sysLoader
 * @package easypshop
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
 * Set the include Base to the Document Root  
 */
define('INCLUDEBASE', realpath($_SERVER['DOCUMENT_ROOT']));


/**
 *
 * Require the settings file 
 */
require('./eps_settings.php');



/**
 *
 * @since Version 0.0.5
 * @author Ruben Storm 
 */
class sysLoader {
    
    private function __construct(){
        // instanziierung verhindern
        
    }
    
    /**
     *
     * INIT, required by the autoloader
     * 
     * @param type $name
     * @return string 
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
 *
 * This is the autoloader, here all classes gets automatic loaded
 * 
 * @param type $name
 * @return type 
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
 *
 * Start the Shop 
 */
shopManager::eps_register();



?>