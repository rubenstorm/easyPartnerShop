<?php

/**
 * @file index.php
 * @brief The index file
 * 
 * This is the index.php file, here is your shop start. A Webserver is looking for 
 * a index.html, index.php or default.php ... make sure your Webserver is configured 
 * to take the index.php in first place.
 * 
 * Go to @ref Home
 * 
 * Read how to @ref Setup your shop
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
 * @see http://j.mp/easyPartnerShop Project Homepage
 * @see http://j.mp/GPL-v3 License
 * @package easypshop
 * @name easyPartnerShop
 * 
 */

/**
 * @mainpage easyPartnerShop Documentation
 * Welcome to @em easyPartnerShop Documentation.
 * 
 * There are so many shop systems in the internet. Look at Amazon, Spreadshirts or 
 * Fotoportopro ... to count up all of them would just eat up my time. The point is that 
 * all those providers give you a free partner shop where they offer you the goods 
 * to sale, but then you have a shop with sublevel domain or even a long URL in 
 * a subfolder. So your customers will not find you and you will not make money. 
 * If one customer comes over your shop, they mostly go then to the original shop 
 * and you will not make money. This system is not a waranty that a customer 
 * orders in your shop, @em easyPartnerShop is developed so you can install those 
 * partner shops on your own domain, at a webhoster of your choice, with a easy 
 * @ref main_install_setup. Yes there are some partner shops that offer you a 
 * own domain, but mostly they are expensiv.
 * 
 * @section main_eps What is easyPartnerShop
 * 
 * @em easyPartnerShop is a PHP script with an XML setup and a XHTML theme system 
 * that help you to install all your partner shops in one install under your own 
 * domain. Once you Installed @em easyPartnerShop you can add any time a new shop 
 * within a few minutes.
 * 
 * @em easyPartnerShop is a script that you can install on your webserver and 
 * include your partner shop like Amazon.
 * 
 * With @em easyPartnerShop you can include as many partner shops as you like in one 
 * installation on your webspace. It does not matter if Amazon, Spreadshirts or 
 * any other shop. Just configure your shop and you are good to go.
 * 
 * Before installing the shop you should check if your webserver meets the 
 * @ref main_required.
 * 
 * This manual for @em easyPartnerShop will show you how to @ref main_install 
 * and @ref main_install_setup your own shop. It is real easy to set it up, 
 * but your webserver should meet the @ref main_required.
 * 
 * @section main_license License
 * The shop license.
 * 
 * @li GNU General Public License 3.0 http://j.mp/GPL-v3
 * 
 * @verbatim
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * @endverbatim
 * 
 * 
 * @section main_required Requirements
 * What are the requirements to run @em easyPartnerShop.
 * 
 * You need a webserver, webspace that will have PHP5 and the possibility to 
 * route all domain or sublevel domains on one folder. 
 * 
 * @attention This shop will not run on subfolders, you have to configure for each shop a own domain
 * 
 * If you can not configure your domains that way, you only can run one shop in 
 * the system
 * 
 * @li PHP5
 * @li Webserver / Webspace
 * @li Be able to configure your webspace that all domains go on one folder
 * @li A partner shop like Amazon or Spreadshirts
 * 
 * @subsection main_required_server Webserver
 * The Webserver.
 * 
 * You have to setup your server that all domains or sublevel domains point to 
 * the install folder of the shop.
 * 
 * @attention No Webforward or Alias, use a A-Record or CNAME and set it up as VirtualHosts in Apache
 * 
 * @section main_features Features
 * Shop features.
 * 
 * Setup with one install as many shops as you like, each one with its own 
 * design or all with the same. Every shop will have a own domain or sublevel 
 * domain. 
 * 
 * @li No Database needed
 * @li One install, as many shop as you like
 * @li Every shop with a own design
 * @li XHTML Theme, easy to make your own
 * @li easy setup, one php file and the XML files
 * @li use a Webhoster of your choice
 * @li No costs for @em easyPartnerShop because of its @ref main_license
 * 
 * @attention If you like @em easyPartnerShop please consider to donate
 * 
 * 
 * 
 * @section main_install Install
 * How to install @em easyPartnerShop.
 * 
 * It easy to install the shop, you can do it in a few steps. Before you install 
 * @em easyPartnerShop please look at the @ref main_install_setup and go through 
 * those steps. When you are finished with the @ref main_install_setup, you come 
 * back here. 
 * 
 * @attention Did you allready follow the documentation, and your @ref main_install_setup is finished? If yes, keep going in this part.
 * 
 * Now you just upload the contents in this folder to the root of your webserver. 
 * To do this you need a FTP program. 
 * 
 * Now you are finished and your newly installed @em easyPartnerShop is running.
 * 
 * @attention If you find a bug, or something that you think is not correct, see the @ref main_bugs section
 * 
 * 
 * @subsection main_install_setup Setup
 * How to @ref Setup @em easyPartnerShop.
 * 
 * After you finished with the @ref main_install of @em easyPartnerShop you 
 * can @ref Setup more shops in a minute, it is real easy.
 * 
 * @attention You need a Texteditor to @ref Setup @em easyPartnerShop, no MS Word, just a editor like kwrite, gedit, or notepad. 
 * 
 * On how to set it up, please look at the @ref Settings, after you are finished with those 
 * steps, you go to the @ref main_install and finish the installation of your shop.
 * 
 * @li @ref SHOP_THEME
 * @li @ref SHOP_THEME_SETTINGS
 * @li @ref SHOP_LANG
 * @li @ref SHOW_EPS_INFO
 * 
 * 
 * @section main_bugs Bugs
 * You found a bug!!!
 * 
 * Please look here if the bug is allready known, if not open a ticket 
 * at <em>GitHub issuess</em>
 * 
 * 
 * 
 * 
 * @anchor Home
 * @author Ruben Storm
 * @version 0.0.6
 * @since Version 0.0.6
 * @see http://j.mp/ePS-Issues GitHub issuess
 * @see http://j.mp/easyPartnerShop Project Homepage & Download
 * @see http://j.mp/GPL-v3 License
 * 
 */

/**
 * @page CHANGELOG CHANGELOG
 * @brief easyPartnerShop CHANGELOG
 * 
 * This is the CHANGELOG for @em easyPartnerShop
 * 
 * @section changelog_maintainers Maintainers
 * 
 * @li Ruben Storm
 * 
 * @section changelog_translators Translators
 * 
 * @em None
 * 
 * @section changelog_version CHANGELOG
 * 
 * @subsection changelog_version_0-0-6 0.0.6
 * @li Better Documentation
 * @li Code cleanup
 * @li header.xml deleted, no need anymore
 * @li body.xml deleted, no need anymore
 * 
 * @subsection changelog_version_0-0-5 0.0.5
 * @li First Release
 * 
 * @date 2012-06-01
 * 
 * @subsection changelog_version_0-0-1 0.0.1
 * @li First Testing
 * 
 * 
 * @author Ruben Storm
 * @copyright Copyright (c) 2012, Ruben Storm
 * @version 0.0.6
 * @since Version 0.0.6
 * @see http://j.mp/ePS-Commits Current CHANGELOG
 * 
 */


/**
 * @property EPS_STOP
 * @brief Shop start
 * 
 * This is not implemented, it was taken out for this version
 * 
 * @code
 *      // define('EPS_STOP', true);
 * @endcode
 * 
 * @var bol true
 *      to start the shop
 * 
 */
// define('EPS_STOP', true);


/**
 * @property Starter
 * @brief Start the shop
 * 
 * This is calling the loader and starts the shop
 * 
 */
require('./sysLoader.php');


?>