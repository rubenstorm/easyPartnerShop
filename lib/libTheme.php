<?php

/**
 * @file libTheme.php
 * @brief The libTheme
 * 
 * This is the theme library, here it will design the shop
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
 * @name libTheme
 * @package lib
 *  
 */

/**
 * @page ThemeMaker Make Your Theme
 * @brief How to make your own theme
 * 
 * This is a short documentation on how you make your own theme. The easy way is 
 * to go in the folder @em eps_conten/themes/default/ and look at the files.
 * 
 * The Theme Library is not finished yet, there is a bit more work todo, but so 
 * far it works.
 * 
 * @todo Finish the Theme Library
 * 
 * A Theme for @em easyPartnerShop has two important files and then any file 
 * you want and need (ment @em .css and @em .js).
 * 
 * To see the files you can look on GitHub 
 * 
 * First make a folder with the name of your theme under @em eps_conten/themes/ 
 * lets say you want to name it @em blue so it should look like @em eps_conten/themes/blue 
 * and in that folder you make a file called @em theme.xml, this file is your theme 
 * settings file and then make a file named @em template_1.xhtml, this is your HTML 
 * template file for your theme.
 * 
 * For help you can look in the GitHub Repo. 
 * 
 * @attention The filenames are very important, dont change them
 * 
 * @see http://yoursl.in/epsGitHub GitHub Repo
 * @see http://yoursl.in/epsThemeXML Theme Settings File
 * @see http://yoursl.in/epsTemplateXHTML Template File
 * 
 * 
 * 
 * 
 * 
 * @author Ruben Storm
 * @copyright Copyright (c) 2012, Ruben Storm
 * @version 0.0.6
 * @since Version 0.0.6
 */

/**
 * @class libTheme
 * @brief Theme library
 * 
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
     * @var string $themeRootFolder
     * 
     */
    static private $themeRootFolder = 'eps_content/themes/';
    
    /**
     * @var string $themeFolder
     * 
     */
    static private $themeFolder = '';
    
    /**
     * @var string $themeFileName
     * 
     */
    static private $themeFileName = 'theme.xml';
    
    /**
     * @var string $themeTemplateFileName
     * 
     */
    static private $themeTemplateFileName = 'template_1.xhtml';
    
    /**
     * @var string $themeFile
     * 
     */
    static private $themeFile = '';
    
    /**
     * @var string $themeTemplateFile
     * 
     */
    static private $themeTemplateFile = '';
    
    /**
     * @var string $errorMessage
     * 
     */
    static private $errorMessage = 'Your Theme has an error';
    
    /**
     * @var string $themeTopAds
     * 
     */
    static private $themeTopAds = 'eps_content/eps_DB/data/topads.txt';
    
    /**
     * @var string $themeBreadcrumbs
     * 
     */
    static private $themeBreadcrumbs = 'eps_content/eps_DB/data/breadcrumb.txt';
    /**
     * @fn __construct()
     * @brief The constractor
     * 
     * the _construct function for libTheme
     */
    private function __construct(){
        // instanziierung verhindern
    }
    
    /**
     * @fn mk_theme()
     * @brief Theme maker
     * 
     * Make the theme, this has to be twice taken in the driver
     * 
     * @author Ruben Storm
     * @version 0.0.5
     * @since 0.0.5
     * @return
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
     * @fn getThemeFilesystem()
     * @brief Filesystem Controler
     * 
     * Setting up the filesystem and folders
     * 
     * @author Ruben Storm
     * @version 0.0.5
     * @since 0.0.5
     * @return  method  $template
     *      The method to keep going
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
     * @fn _getThemeFolder ()
     * @brief Theme folder
     * 
     * Initalize the theme folder
     * 
     * @author Ruben Storm
     * @version 0.0.5
     * @since 0.0.5
     * @return  string  self::$themeFolder
     *      the path of the theme folder
     */
    static private function _getThemeFolder () {
        // get the name of the theme
        
        self::$themeFolder = self::$themeRootFolder . self::_getThemeName() .'/';
         
        return self::$themeFolder;
        
    }
    
    /**
     * @fn _getThemeName ()
     * @brief Theme Requester
     * 
     * Check what theme is requsted and return it
     * 
     * @author Ruben Storm
     * @version 0.0.5
     * @since 0.0.5
     * @return  string  USE_THEME
     *      the name of the used theme
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
     * @fn _themeParser()
     * @brief XHTML Parser
     * 
     * Parser for the XHTML theme system
     * 
     * @author Ruben Storm
     * @version 0.0.5
     * @since 0.0.5
     * @return  string  $theme
     *      the parsed theme
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
     * @fn _themeReplacer($template)
     * @brief Theme parser
     * 
     * Work over the theme and make it ready for printout
     * 
     * @author Ruben Storm
     * @version 0.0.5
     * @since 0.0.5
     * @param   array   $template
     *      the array with the theme
     * @return  string   $template
     *      the finished theme
     */
    static private function _themeReplacer($template) {
        // replace the conten
        return preg_replace(self::_themeSuchmuster(), self::_themeErsetzungen(), $template);
    }
    
    /**
     * @fn _themeSuchmuster ()
     * @brief Placeholders
     * 
     * the array for the placeholder
     * 
     * @author Ruben Storm
     * @version 0.0.5
     * @since 0.0.1
     * @return  array   $suchmuster
     *      the spaceholders
     * 
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
     * @fn _themeErsetzungen()
     * @brief Replacements
     * 
     * Second array for the spaceholder system, includes the data
     * 
     * @author Ruben Storm
     * @version 0.0.5
     * @since 0.0.1
     * @return type the data for spaceholders
     * 
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
     * @fn _getTopAds()
     * @brief Adds maker
     * 
     * Making the topAds in the theme
     * 
     * @author Ruben Storm
     * @version 0.0.5
     * @since 0.0.5
     * @return  string  $data
     *      code for the topads
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
     * @fn _getBreadcrumbs()
     * @brief Breadcrumbs
     * 
     * Make the links on top, if requested in the theme
     * 
     * @author Ruben Storm
     * @version 0.0.5
     * @since 0.0.5
     * @return  string  $data
     *      the links
     */
    static private function _getBreadcrumbs() {
        if (file_exists(self::$themeBreadcrumbs)) {
            $data = file_get_contents(self::$themeBreadcrumbs);
        }
        return $data;
    }
   
    /**
     * @fn _makeInformation()
     * @brief System Informations
     * 
     * Make the shop information and insert it into the theme if requested by 
     * the shop owner
     * 
     * @author Ruben Storm
     * @version 0.0.5
     * @since 0.0.5
     * @return  string  $shopinfo
     *      the required information
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