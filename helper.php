<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
/**
 * Helper class for UserBook! module
 * http://docs.joomla.org/Creating_a_Hello_World_Module_for_Joomla_1.5#Completed_mod_helloworld.php_file
 * 
 * @package    Joomla.Tutorials
 * @subpackage Modules
 * @link http://dev.joomla.org/component/option,com_jd-wiki/Itemid,31/id,tutorials:modules/
 * @license        GNU/GPL, see LICENSE.php
 * mod_userbook is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
class modUserBookHelper
{
    /**
     * Retrieves the Recent User books
     *
     * @param array $params An object containing the module parameters
     * @access public
     */    
    function getUserBooks( $params )
    {
        $db =& JFactory::getDBO();
			$db->setQuery("SELECT DISTINCT a.user_id, a.book_id, b.product_id, b.product_name, c.name, c.id
		FROM #__hikashop_track AS a
		LEFT JOIN #__hikashop_product AS b ON a.book_id = b.product_id
		LEFT JOIN #__users AS c ON a.user_id = c.id
		ORDER BY a.read_start_time DESC 
		LIMIT 5");
	$db->query();
	$pcount=$db->getNumRows();
	 $column= $db->loadAssocList();
	// print_r($column);
	 return $column;
    }
}
?>
