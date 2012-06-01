<?php

/**
 *
 * @name libShopData
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
 * Description of libShopData
 * Here the shop is loading the data it need to run.
 *
 * @author Ruben Storm
 * @version 0.0.5
 * @since Version 0.0.5
 */
class libShopData {
    
    /**
     *
     * The default for the messages and filesystem
     * @var type 
     */
    static private $shopFile = 'eps_content/eps_DB/setup/settings.xml';
    static private $shopMetaThemeFolder = 'eps_content/themes/';
    static private $shopThemeFile = '';
    static private $shopMetaThemeFile = '';
    static private $errorMessage = 'Parsing your setting gave an error';
    
    private function __construct(){
        // instanziierung verhindern
    }
    
    /**
     *
     * Starting to initialize the shop data system
     * @return type None
     */
    static public function getShop() {
        // get the shop
        
        if (shopControler::_checkSingle('SHOP_SYSTEM_DATADONE') == false) {
            self::_getShopData();
            libDefine::_definer('SHOP_SYSTEM_DATADONE', 1);
        }
        
        if (shopControler::_checkSingle('USE_THEME') == true) {
            if (shopControler::_checkSingle('SHOP_META_READY') == false) {
                self::_getShopMeta();
            }
            
        } else {
            libErrors::mk_Errors(self::$errorMessage, 1);
        }
        
        return;
    }
    
    /**
     *
     * Get the shop theme, if the shop has a mutli setup. 
     * 
     * @return type theme name
     * @version 0.0.5
     * @since Version 0.0.2
     * @author Ruben Storm
     */
    static public function _getShopTheme() {
        // get the shop theme if not default
        if (file_exists(self::$shopFile)) {
            $xml = simplexml_load_file(self::$shopFile);
            foreach ($xml->shop as $shop) {
                if (REQ_DOMAIN == $shop->host) {
                    return $shop->theme;
                }
            }
        } else {
            self::$errorMessage = 'Shop settings File '. self::$shopFile . ' has a error';
            libErrors::mk_Errors(self::$errorMessage, 1);
        }
        
    }
    
    /**
     *
     * Loading the shop setup template and all needed informations
     * 
     * @return type None
     * @version 0.0.5
     * @since Version 0.0.3
     * @author Ruben Storm
     */
    static private function _getShopData() {
        // get all the shop data
        if (file_exists(self::$shopFile)) {
            $xml = simplexml_load_file(self::$shopFile);
            foreach ($xml->shop as $shop) {
                if (REQ_DOMAIN == $shop->host) {
                    libDefine::_definer('SHOP_SET_NAME', $shop->name);
                    libDefine::_definer('SHOP_SET_DOM', $shop->host);
                    libDefine::_definer('SHOP_SET_FRAME', $shop->frameLink);
                    libDefine::_definer('SHOP_SET_OWNER', $shop->owner);
                    libDefine::_definer('SHOP_SET_SLOGAN', htmlentities($shop->slogan));
                    libDefine::_definer('SHOP_SET_HEADER_TITLE', $shop->header->title);
                    libDefine::_definer('SHOP_SET_HEADER_LANG', $shop->header->contlang);
                    libDefine::_definer('SHOP_SET_HEADER_META_DESC', $shop->header->meta->descr);
                    libDefine::_definer('SHOP_SET_HEADER_META_KEYW', $shop->header->meta->keywords);
                    
                }
            }
            
            if (shopControler::_checkSingle('SYSTEM_ERROR_DATA') == true && SYSTEM_ERROR_DATA == 1) {
                libDefine::_definer('SYSTEM_ERROR_DATA', 0);
                libErrors::mk_Errors('', 0);
            }
            
        } else {
            self::$errorMessage = 'Shop settings File '. self::$shopFile . ' has a error';
            libErrors::mk_Errors(self::$errorMessage, 1);
        }
        return;
    }
    
    /**
     *
     * Loading the shop meta
     * @return type None
     * @version 0.0.5
     * @since 0.0.3
     * @author Ruben Storm
     */
    static private function _getShopMeta() {
        // get the Shop Meta
        if (shopControler::_checkSingle('USE_THEME') == true) {
            self::$shopMetaThemeFile = self::$shopMetaThemeFolder . USE_THEME .'/theme.xml';
            if (file_exists(self::$shopMetaThemeFile)) {
                $xml = simplexml_load_file(self::$shopMetaThemeFile);
                foreach ($xml->settings as $settings) {
                    libDefine::_definer('THEME_SETTINGS_NAME', $settings->name);
                    libDefine::_definer('THEME_SETTINGS_VERSION', $settings->version);
                    libDefine::_definer('THEME_SETTINGS_SCREEN', $settings->screen);
                    libDefine::_definer('THEME_SETTINGS_FORVERSION', $settings->forVersion);
                    libDefine::_definer('THEME_SETTINGS_AUTHOR', $settings->author);
                    libDefine::_definer('THEME_SETTINGS_HOMEPAGE', '<a href="'. $settings->homepage .'" target="_blank">'. $settings->homepage .'</a>');
                    libDefine::_definer('THEME_SETTINGS_EMAIL', $settings->contact->email);
                    libDefine::_definer('THEME_SETTINGS_CONTACT_STREET', $settings->contact->street);
                    libDefine::_definer('THEME_SETTINGS_CONTACT_CITY', $settings->contact->city);
                    libDefine::_definer('THEME_SETTINGS_CONTACT_COUNTRY', $settings->contact->country);
                    libDefine::_definer('THEME_SETTINGS_MOREINFO', $settings->moreInformation);
                    libDefine::_definer('THEME_SETTINGS_DONATE', $settings->donate->allow);
                    libDefine::_definer('THEME_SETTINGS_DONATE_EMAIL', $settings->donate->email);
                    libDefine::_definer('THEME_SETTINGS_DONATE_WEBSEITE', '<a href="'. $settings->donate->website .'" target="_blank">'. $settings->donate->website. '</a>');
                }
                
                libDefine::_definer('SHOP_META_READY', 1);
                
            } else {
                
                self::$errorMessage = 'Theme File ('. self::$shopMetaThemeFile .') does not exists';
                libErrors::mk_Errors(self::$errorMessage, 1);
            }
            if (shopControler::_checkSingle('SYSTEM_ERROR_DATA') == true && SYSTEM_ERROR_DATA == 1) {
                libDefine::_definer('SYSTEM_ERROR_DATA', 0);
                libErrors::mk_Errors('', 0);
            }
        } else {
            libErrors::mk_Errors(self::$errorMessage, 1);
        }
        return;
    }
    
    
    
}

?>