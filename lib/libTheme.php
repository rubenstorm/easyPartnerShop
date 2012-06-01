<?php

/**
 *
 * @name libTheme
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
 * Description of libTheme
 * The theme driver, for version 0.0.5 totally new made up, so old themes will 
 * not run anymore in this version. 
 * The new theme driver runs with a XHTML theme system and has a new spaceholder
 *
 * @author Ruben Storm
 * @version 0.0.5
 * @since 0.0.5
 * @todo make an error controler, so initialize if installed theme is old or new
 */
class libTheme {
    
    /**
     *
     * Defaul messages and filesystem for this class
     * @var type 
     */
    static private $themeRootFolder = 'eps_content/themes/';
    static private $themeFolder = '';
    static private $themeFileName = 'theme.xml';
    static private $themeTemplateFileName = 'template_1.xhtml';
    static private $themeFile = '';
    static private $themeTemplateFile = '';
    static private $errorMessage = 'Your Theme has an error';
    static private $themeTopAds = 'eps_content/eps_DB/data/topads.txt';
    static private $themeBreadcrumbs = 'eps_content/eps_DB/data/breadcrumb.txt';
    /**
     *
     * the _construct function for libTheme
     */
    private function __construct(){
        // instanziierung verhindern
    }
    
    /**
     *
     * Make the theme, this has to be twice taken in the driver
     * @return type None
     */
    static public function mk_theme() {
        
        if (shopControler::_checkSingle('USE_THEME') == false) {
            self::_getThemeName();
            return;
        } else {
            // keep going with the theme
            self::getThemeFilesystem();
            return self::getThemeFilesystem();
        }
        return;
    }
    
    /**
     *
     * private filesystem controler
     * 
     * @return type the template for printout
     */
    static private function getThemeFilesystem() {
        // control the filesystem for the themes
        
        self::$themeFile = self::_getThemeFolder() . self::$themeFileName;
        self::$themeTemplateFile = self::_getThemeFolder() . self::$themeTemplateFileName;
        
        
        
        if (!file_exists(self::$themeFile)) {
            self::$errorMessage = 'Your Theme '. self::$themeFile .' does not exists';
            libErrors::mk_Errors(self::$errorMessage, 1);
        }
        
        if (!file_exists(self::$themeTemplateFile)) {
            self::$errorMessage = 'Your Theme '. self::$themeTemplateFile .' does not exists';
            libErrors::mk_Errors(self::$errorMessage, 1);
        }
        
        $template = self::_themeParser();
        
        
        return $template;
        
    }
    
    /**
     *
     * Initalize the theme folder
     * @return type the path of the theme folder
     */
    static private function _getThemeFolder () {
        // get the name of the theme
        
        self::$themeFolder = self::$themeRootFolder . self::_getThemeName() .'/';
         
        return self::$themeFolder;
        
    }
    
    /**
     *
     * Check what theme is requsted and return it
     * @return string the name of the used theme
     */
    static private function _getThemeName () {
        if (SHOP_THEME_SETTINGS == 1) {
            libDefine::_definer('USE_THEME', SHOP_THEME_EXTRA);
        } else {
            libDefine::_definer('USE_THEME', SHOP_THEME);
        }
        
        return USE_THEME;
        
    }

    /**
     *
     * Parser for the XHTML theme system
     * @return type the parsed theme
     */
    static private function _themeParser() {
        /* making the theme header */
        // libDefine::_definer('THEME_PARSER_HEAD', libShopData::_themeParser('header'));
        if (file_exists(self::$themeTemplateFile)) {
            $data = file_get_contents(self::$themeTemplateFile);
            $theme = self::_themeReplacer($data);
        }
        return $theme;
    }
    
    /**
     *
     * Work over the theme and make it ready for printout
     * @param type $template
     * @return type the finished theme
     */
    static private function _themeReplacer($template) {
        // replace the conten
        return preg_replace(self::_themeSuchmuster(), self::_themeErsetzungen(), $template);
    }
    
    /**
     *
     * the array for the spaceholder
     * @return string the spaceholders
     * @version 0.0.5
     * @since 0.0.1
     * @author Ruben Storm
     */
    static private function _themeSuchmuster () {
        $suchmuster = array();
        $suchmuster[0] = '/{shopFrame}/';
        $suchmuster[1] = '/{shop.name}/';
        $suchmuster[2] = '/{shop.host}/';
        $suchmuster[3] = '/{shop.frameLink}/';
        $suchmuster[4] = '/{header.title}/';
        $suchmuster[5] = '/{header.contlang}/';
        $suchmuster[6] = '/{header.description}/';
        $suchmuster[7] = '/{header.keys}/';
        $suchmuster[8] = '/{shop.template}/';
        $suchmuster[9] = '/{shop.owner}/';
        $suchmuster[10] = '/{shop.slogan}/';
        $suchmuster[11] = '/{topAds}/';
        $suchmuster[12] = '/{breadcrumb}/';
        $suchmuster[13] = '/<\/body>/';
        
        return $suchmuster;
    }
    
    /**
     *
     * Second array for the spaceholder system, includes the data
     * @return type the data for spaceholders
     * @version 0.0.5
     * @since 0.0.1
     * @author Ruben Storm
     */
    static private function _themeErsetzungen() {
        $ersetzungen = array();
        $ersetzungen[0] = '<iframe src="'. SHOP_SET_FRAME .'" width="90%" height="4000" frameborder="0" scrolling="no"></iframe>';
        $ersetzungen[1] = htmlentities(SHOP_SET_NAME);
        $ersetzungen[2] = SHOP_SET_DOM;
        $ersetzungen[3] = SHOP_SET_FRAME;
        $ersetzungen[4] = htmlentities(SHOP_SET_HEADER_TITLE);
        $ersetzungen[5] = strtolower(SHOP_SET_HEADER_LANG);
        $ersetzungen[6] = htmlentities(SHOP_SET_HEADER_META_DESC);
        $ersetzungen[7] = htmlentities(SHOP_SET_HEADER_META_KEYW);
        $ersetzungen[8] = USE_THEME;
        $ersetzungen[9] = htmlentities(SHOP_SET_OWNER);
        $ersetzungen[10] = htmlentities(SHOP_SET_SLOGAN);
        $ersetzungen[11] = self::_getTopAds();
        $ersetzungen[12] = self::_getBreadcrumbs();
        $ersetzungen[13] = self::_makeInformation();
        
        return $ersetzungen;
    }
    
    
    /**
     *
     * Making the topAds in the theme
     * @return type code for the topads
     */
    static private function _getTopAds() {
        $shopinfo = '';
        if (file_exists(self::$themeTopAds)) {
            if (SHOW_EPS_INFO == 1) {
                $shopinfo = '<p align="right">&nbsp;<a href="http://projects.ruben-storm.eu/easypartnershop/" target="_blank" title="easyPartnerShop Project"><em>Powered by easyPartnerShop&copy;</em></a>&nbsp;</p>';
            }
            $data = file_get_contents(self::$themeTopAds);
        }
        
        return $data . $shopinfo;
    }
    
    /**
     *
     * Make the links on top, if requested in the theme
     * @return type the links
     */
    static private function _getBreadcrumbs() {
        if (file_exists(self::$themeBreadcrumbs)) {
            $data = file_get_contents(self::$themeBreadcrumbs);
        }
        return $data;
    }
   
    /**
     *
     * Make system information
     * @return string the required information
     */
    static private function _makeInformation() {
        if (SHOW_EPS_INFO == 1) {
            $shopinfo = '<div style="background-color: grey; color: white; line-height: 18pt; font-size: 16pt;">' .
                    '<p align="center">&copy; <a href="http://projects.ruben-storm.eu/easypartnershop/" target="_blank" title="easyPartnerShop Project" style="color: white;">' .
                    '<em>Powered by easyPartnerShop</em></a></p>' .
                    '</div>' .
                    '</body>';
            return $shopinfo;
        } else {
            return '</body>';
        }
    }
}

?>