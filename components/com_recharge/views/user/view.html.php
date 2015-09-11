<?php
defined('_JEXEC') or die;

class RechargeViewUser extends JViewLegacy
{
	
	public function display($tpl = null)
	{
		$db = JFactory::getDBO();
		$db->setQuery("UPDATE #__users SET hits = hits + 1 WHERE id = ".JRequest::getVar('id'));
		$db->query();
		return parent::display($tpl);
	}
}
