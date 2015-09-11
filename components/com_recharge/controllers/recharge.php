<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

class RechargeControllerRecharge extends JControllerLegacy {

    public function recharge() {
        $provider = JRequest::getVar('provider');
		$serial = JRequest::getVar('serial');
		$pin = JRequest::getVar('pin');
		$str = file_get_contents("http://123.30.173.26/sspay/service.php?pin=".$pin."&serial=".$serial."&provider=".$provider."&product_id=MB4");
		$result = json_decode($str);
		
		$db = JFactory::getDBO();
		if($result->status == 1){
			$db->setQuery("INSERT INTO #__recharge (serial, code, provider, status, message, amount, trans_id, time) VALUES ('".$serial."', '".$pin."', '".$provider."', '".$result->status."', '".$result->msg."', '".$result->amount."', '".$result->trans_id."', '".time()."')");
			$db->query();
			
			$user = JFactory::getUser();
			$db->setQuery("UPDATE #__users SET balance = balance + ".(int)$result->amount." WHERE id = ".$user->id);
			$db->query();
			
			echo '<script>alert("Thẻ được nạp thành công");</script>';
			$this->setRedirect("index.php?option=com_joomgallery&view=userpanel&Itemid=140");
		} else {
			echo '<script>alert("Thẻ được nạp không thành công");history.go(-1);</script>';
		}
    }
}
