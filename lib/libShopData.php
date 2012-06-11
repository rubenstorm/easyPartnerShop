<?php

/**
 * @file libShopData.php
 * @brief The libShopData
 * 
 * This is a library for data connection and definition.
 * 
 * This file is responible to get and make the data that your shop needs. 
 * It takes the required shop data for the requested shop and returns it. 
 * It is like a XML Database driver.
 * 
 * @author Ruben Storm
 * @copyright Copyright (c) 2012, Ruben Storm - GNU General Public License 3.0 (GPL) http://www.gnu.org/licenses/gpl.html
 * @version 0.0.5
 * @since Version 0.0.5
 * 
 * 
 * @verbatim
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * @endverbatim
 * 
 * @name libShopData
 * @package lib
 */

/**
 * @page Database Database Settings
 * @brief Setup your shop Database
 * 
 * After you are finished with the @ref Settings you keep going with this part. 
 * 
 * In this part you have to configure the @ref databse_shops. In this file you 
 * put all your shops in you wan to host.
 * 
 * After your finished with this file your shop is ready to run. But you might 
 * want more, like a own theme, so how to make your own theme is explained in a 
 * different place.
 * 
 * 
 * @section databse_shops Main Shop Database
 * @brief Database setup
 * 
 * You have to setup a own container for each shop you have in your system. Here 
 * you have an example how a container look like. The file for the databse you 
 * find in the folder @em eps_content/eps_DB/setup/ and it is named @em settings.xml 
 * 
 * The main container is <shops> so you have to put in your shops in between this.
 * 
 * Main container:
 * @code
 * <shops>
 *      // container for all shops
 * </shops>
 * @endcode
 * 
 * This is XML, and it is not hard to set up, in the distribution of your shop is 
 * a file included, so just look at it and it is self explaining. There are a 
 * few example shop allready set up for you, so you have an example.
 * 
 * In this tutorial are some example hot to set up your shop. 
 * @li @ref databse_shops_example
 * @li @ref databse_shops_field_name
 * @li @ref databse_shops_field_hostname
 * @li @ref databse_shops_field_framelink
 * @li @ref databse_shops_field_owner
 * @li @ref databse_shops_field_slogan
 * @li @ref databse_shops_field_header
 * @li @ref databse_shops_field_template
 * 
 * Here is a @ref database_shops_example for you.
 * 
 * @subsection databse_shops_example Example
 * 
 * In the main container you put the following code for each shop into it:
 * 
 * @code
 * 
 * <shop>
 *      <name>Ruben's Bookstore</name>
 *      <host>books.ruben-storm.eu</host>
 *      <frameLink>http://astore.amazon.de/power2search-21</frameLink>
 *      <owner>Ruben Storm</owner>
 *      <slogan>Ruben's Bookstore - Bücher in ca. 1000 Kategorien</slogan>
 *      <header>
 *          <title>Ruben's Bookstore - Bücher bei books.ruben-storm.eu</title>
 *          <contlang>de</contlang>
 *          <meta>
 *              <descr>Ruben's Bookstore, Bücher in ca. 1000 Kategorien sortiert.</descr>
 *              <keywords>books, Biografien, Erinnerungen, Business, Karriere</keywords>
 *          </meta>
 *      </header>
 *      <template>default</template>
 * </shop>
 * 
 * @endcode
 * 
 * This is the container for each shop, it is an XML file, so please keep up with 
 * the standards. 
 * 
 * Now i will explain you on what are the fields for.
 * 
 * @subsection databse_shops_field_name Name
 * 
 * The field name:
 * @code
 * <name>
 *      // write here the name of your shop
 * </name>
 * @endcode
 * 
 * @subsection databse_shops_field_hostname Host
 * 
 * The hostname:
 * @code
 * <host>
 *      // your host, where the shop will run under
 *      // make sure it is writen the way on the example
 * </host>
 * @endcode
 * 
 * @attention This is impotant, dont use @em http:// in front of it, your shop will not work
 * 
 * @subsection databse_shops_field_framelink frameLink
 * 
 * The partner shop:
 * @code
 * <frameLink>
 *      // The link to your partner shop, like Spreadshirts or Amazon
 *      // The example is a Amazon partner shop
 * </frameLink>
 * @endcode
 * 
 * @subsection databse_shops_field_owner Owner
 * 
 * The Owner:
 * @code
 * <owner>
 *      // The name of the shop owner
 * </owner>
 * @endcode
 * 
 * @subsection databse_shops_field_slogan Slogan
 * 
 * Your Slogan:
 * @code
 * <slogan>
 *      // The slogan for your shop
 * </slogan>
 * @endcode
 * 
 * @subsection databse_shops_field_header Header
 * 
 * The header:
 * @code
 * <header>
 *      <title>
 *          // Write your shop title here
 *      </title>
 *      <contlang>
 *          // Write your shop language here
 *      </contlang>
 *      <meta>
 *          <descr>
 *              // Write your meta description here
 *          </descr>
 *          <keywords>
 *              // Write your meta keywords here
 *          </keywords>
 *      </meta>
 * </header>
 * @endcode
 * 
 * <em>The header container is the data for each shop that is used in the HML header</em>
 * 
 * @subsection databse_shops_field_template Template
 * 
 * The template:
 * @code
 * <template>
 *      // Write the name of your theme here, 
 *      // used if you have setup each shop with a own theme
 * </template>
 * @endcode
 * 
 * This container is used if you have setup the @ref SHOP_THEME_SETTINGS to @em 1
 * @code
 *      define('SHOP_THEME_SETTINGS', 1);
 * @endcode
 * 
 * 
 * @section database_shops_example Database example
 * @brief How a Database looks like
 * 
 * Here is an example file, the way it should look like if you have two shops 
 * installed, shop number 1 with the theme @em blue and shop numer two with the 
 * theme @em red
 * 
 * @code
 * <?xml version="1.0" encoding="UTF-8"?>
 * <!--
 * This is an example shopfile with two shops installed. 
 * Don't use this file, change it to fit your own shop.
 * -->
 * <shops>
 *      <shop>
 *          <name>Ruben's Bookstore</name>
 *          <host>books.ruben-storm.eu</host>
 *          <frameLink>http://astore.amazon.de/power2search-21</frameLink>
 *          <owner>Ruben Storm</owner>
 *          <slogan>Ruben's Bookstore - Bücher in ca. 1000 Kategorien</slogan>
 *          <header>
 *              <title>Ruben's Bookstore - Bücher bei books.ruben-storm.eu</title>
 *              <contlang>de</contlang>
 *              <meta>
 *                  <descr>Ruben's Bookstore, Bücher in ca. 1000 Kategorien sortiert.</descr>
 *                  <keywords>books, Biografien, Erinnerungen, Business, Karriere</keywords>
 *              </meta>
 *          </header>
 *          <template>blue</template>
 *      </shop>
 *      <shop>
 *          <name>Ruben's Poster und Leinwand Shop</name>
 *          <host>poster.ruben-storm.eu</host>
 *          <frameLink>http://rubenstorm.fotoportopro.de/</frameLink>
 *          <owner>Ruben Storm</owner>
 *          <slogan>Fotos und Leinwände für Ihr neues Zuhause</slogan>
 *          <header>
 *              <title>Ruben's Poster und Leinwand Shop - poster.ruben-storm.eu</title>
 *              <contlang>de</contlang>
 *              <meta>
 *                  <descr>Bestellen Sie Poster oder Leinwände für Ihre Wände, die einfach so kahl sind.</descr>
 *                  <keywords>Poster, Leinwand, Wildlife, Enten, Gans, Schwan</keywords>
 *              </meta>
 *          </header>
 *          <template>red</template>
 *      </shop>
 * </shops>
 * 
 * @endcode
 * 
 * <em>The themes @em red and @em blue must exist in your installation, on a default install is only  
 * one theme in it, it is the @em default.</em>
 * 
 * @attention If now both shops have the same theme, go and read the @ref databse_shops_field_template
 * 
 * 
 * @anchor ShopSettings
 * @author Ruben Storm
 * @version 0.0.6
 * @since Version 0.0.6
 */

/**
 * @class libShopData
 * @brief The Data Library
 * 
 * The shop is makes the connection to the XML database and loading the required 
 * data. It is loading the shop settings, theme settings and the data for the shop.
 *
 * @author Ruben Storm
 * @version 0.0.5
 * @since Version 0.0.5
 */
class libShopData {
    
    /**
     * @var string $shopFile 
     * @brief Settings file
     * 
     * The default settings XML file 
     */
    static private $shopFile = 'eps_content/eps_DB/setup/settings.xml';
    
    /**
     * @var string $shopMetaThemeFolder
     * @brief Theme folder
     * 
     * The theme main folder 
     */
    static private $shopMetaThemeFolder = 'eps_content/themes/';
    
    /**
     * @var string $shopThemeFile
     * @brief Theme file
     * 
     * The theme file
     */
    static private $shopThemeFile = '';
    
    /**
     * @var string $shopMetaThemeFile
     * @brief Meta file
     * 
     * The theme meta file
     */
    static private $shopMetaThemeFile = '';
    
    /**
     * @var string $errorMessage
     * @brief Error message
     * 
     * The default error message for the libShopData, if no other message is given
     */
    static private $errorMessage = 'Parsing your setting gave an error';
    
    /**
     * @fn __construct()
     * @brief Constructor
     * 
     * The constructor for the database driver.
     * 
     * @version 0.0.5
     * @since Version 0.0.5
     * @author Ruben Storm
     * @abstract
     * 
     */
    private function __construct(){
        // instanziierung verhindern
    }
    
    /**
     * @fn getShop()
     * @brief Shop data starter
     * 
     * Starting to initialize the shop data system
     * 
     * @version 0.0.5
     * @since Version 0.0.5
     * @author Ruben Storm
     * @return
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
     * @fn _getShopTheme()
     * @brief Theme data
     * 
     * Get the shop theme, if the shop has a mutli setup. 
     * 
     * @version 0.0.5
     * @since Version 0.0.2
     * @author Ruben Storm
     * @return  string  $shop->theme
     *      the name of the theme
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
     * @fn _getShopData()
     * @brief Query the setup
     * 
     * Loading the shop setup template and all needed informations
     * 
     * @version 0.0.5
     * @since Version 0.0.3
     * @author Ruben Storm
     * @return
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
     * @fn _getShopMeta()
     * @brief Query shop meta
     * 
     * Loading the shop meta
     * 
     * @version 0.0.5
     * @since 0.0.3
     * @author Ruben Storm
     * @return
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