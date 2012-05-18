 <?php
// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * User Books! Module Entry Point
 * http://docs.joomla.org/Creating_a_Hello_World_Module_for_Joomla_1.5#Completed_mod_helloworld.php_file
 * @package    Joomla.Tutorials
 * @subpackage Modules
 * @link http://dev.joomla.org/component/option,com_jd-wiki/Itemid,31/id,tutorials:modules/
 * @license        GNU/GPL, see LICENSE.php
 * mod_helloworld is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
 
// Include the syndicate functions only once

//require_once( dirname(__FILE__).DS.'helper.php' );
 
//$books = modUserBookHelper::getUserBooks( $params );
require( JModuleHelper::getLayoutPath( 'mod_userbook' ) );
$document = JFactory::getDocument();
$document->addStyleSheet('modules/mod_userbook/assets/css/style.css');
/*
$document = JFactory::getDocument();
$document->addScript('modules/mod_userbook/assets/js/json2.js');*/

$document = JFactory::getDocument();
$document->addScript('modules/mod_userbook/assets/json2.js');

$document = JFactory::getDocument();
$document->addScript('modules/mod_userbook/assets/js/jquery-1.7.1.js');

$document = JFactory::getDocument();
$document->addScript('modules/mod_userbook/assets/js/current.js');
//$document->addScript('http://code.jquery.com/jquery-1.7.2.js');
?>


