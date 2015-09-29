<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');
include_once(JPATH_SITE.DIRECTORY_SEPARATOR."components".DIRECTORY_SEPARATOR."com_joomgallery".DIRECTORY_SEPARATOR."helpers".DIRECTORY_SEPARATOR."helper.php");

class RechargeControllerCart extends JControllerLegacy {

    public function pay() {
		$user = JFactory::getUser();
		if($user->guest){
			die("Yêu cầu đăng nhập để mua");
		} else {
			$user_id = $user->id;
			$image_id = JRequest::getVar("id");
			$db = JFactory::getDBO();
			$db->setQuery("SELECT imgtitle, owner, catid, imgfilename FROM #__joomgallery WHERE id = ".$image_id);
			$image = $db->loadObject();
			$image_name = $image->imgtitle;
			$author = $image->owner;
			$price = JoomHelper::getAdditional($image_id, "price");
			
			$db->setQuery("INSERT INTO #__orders(user_id, image_id, image_name, author, price, buy_date) VALUES (".$user_id.", ".$image_id.", '".$image_name."', ".$author.", ".$price.", NOW())");
			$db->query();
			
			$db->setQuery("UPDATE #__users SET balance = balance - ".(int)$price." WHERE id = ".$user_id);
			$db->query();
			
			$catPath = JoomHelper::getCatPath($image->catid);
						
			$catPath1 = str_replace("/",DIRECTORY_SEPARATOR,$catPath);
				
			$path = JPATH_ROOT.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'joomgallery'.DIRECTORY_SEPARATOR.'originals'.DIRECTORY_SEPARATOR.$catPath1.$image->imgfilename;

			$owner = JFactory::getUser($author);
			
			$app = JFactory::getApplication();
			$mailfrom = $app->get('mailfrom');
			$fromname = $app->get('fromname');
			$sitename = $app->get('sitename');
			
			$body = "Xin chào ".$owner->name."<br/><br/>
			Đây là hình mà bạn đã mua từ Khoảnh khắc Việt Nam:<br/>
			- Tên: ".$image_name."<br/>
			- Tác giả: ".$owner->name."<br/>
			- Giá: ".number_format($price, 0, ',', '.')."<br/><br/>
			Khoảnh khắc Việt Nam
			";
			$mail = JFactory::getMailer();
			$mail->addRecipient($user->email);
			$mail->addCC($owner->email);
			$mail->setSender(array($mailfrom, $fromname));
			$mail->setSubject($sitename . ': ' . $image_name);
			$mail->setBody($body);
			$mail->IsHTML(true); 
			$mail->AddAttachment($path, $image->imgfilename);
			$sent = $mail->Send();
			
			//Push notification to android device
			$db->setQuery("SELECT gcm_id FROM #__users_gsm WHERE user_id = ".$author." AND login_state = 1");
			$gcms = $db->loadColumn();
			foreach($gcms as $gcm){
				// prep the bundle
				$msg = array
				(
					'message' 	=> 'test',
					'user_id'	=> $user_id,
					'author'	=> $author
				);
				$fields = array
				(
					'registration_ids' 	=> $gcm,
					'data'			=> $msg
				);
				 
				$headers = array
				(
					'Authorization: key=AIzaSyA0r0rtbBIUXi2uU6oqRZ5TSbkeBGWYje8',
					'Content-Type: application/json'
				);
				 
				$ch = curl_init();
				curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
				curl_setopt( $ch,CURLOPT_POST, true );
				curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
				curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
				curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
				curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
				$result = curl_exec($ch );
				curl_close( $ch );
			}
			
			$this->setRedirect(JRoute::_('index.php?option=com_recharge&view=cart&layout=success'));
		}
    }
}
