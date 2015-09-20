<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

class RechargeControllerUser extends JControllerLegacy {

    public function follow() {
		$db = JFactory::getDBO();
		$user = JFactory::getUser();
		
        $ownerid = JRequest::getVar("ownerid");
		$flag = JRequest::getVar("flag");
		
		$q = "SELECT follow_id FROM #__follow WHERE user_id = ".$user->id;
		$db->setQuery($q);
		$followStr = $db->loadResult();
			
		if($flag){
			if($followStr){
				$followStr = $followStr.",".$ownerid;
				$db->setQuery("UPDATE #__follow SET follow_id = '".$followStr."' WHERE user_id = ".$user->id);
				$db->query();
				die('1');
			} else {
				$db->setQuery("INSERT INTO #__follow (user_id, follow_id) VALUES (".$user->id.", ".$ownerid.")");
				$db->query();
				die('1');
			}
		} else {
			$tmpArr = explode(",", $followStr);
			$tmpArr1 = array();
			foreach($tmpArr as $item){
				if($item != $ownerid){
					array_push($tmpArr1, $item);
				}
			}
			$followStr = implode(",", $tmpArr1);
			$db->setQuery("UPDATE #__follow SET follow_id = '".$followStr."' WHERE user_id = ".$user->id);
			$db->query();
			die('1');
		}
    }
}
