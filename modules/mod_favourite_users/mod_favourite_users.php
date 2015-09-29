<?php
defined('_JEXEC') or die;
$db = JFactory::getDBO();
$db->setQuery("SELECT id, name FROM #__users WHERE block = 0 AND follow != 0 ORDER BY follow DESC");
$users = $db->loadObjectList();
?>
<div class="col-sm-4">
	<div>
		<div class="title-box">
			<h2 class="title">Thành viên nổi bật</h2>
			<h5 class="des">Thành viên được yêu thích nhiều nhất</h5>
		</div>
	</div>
	<div class="row list-user-box">
		<?php foreach($users as $item){
			$profile = JUserHelper::getProfile( $item->id );
		?>
		<div class="col-sm-3 user-item"> <a href="index.php?option=com_recharge&view=user&id=<?php echo $item->id;?>&Itemid=142"  data-toggle="tooltip" data-placement="top" title="<?php echo $item->name;?>">
		<?php if($profile->profilepicture['file']){?> 
		<img src="<?php echo JURI::base();?>timthumb/timthumb.php?src=<?php echo JURI::base().'media/plg_user_profilepicture/images/200/'.$profile->profilepicture['file'].'&w=90&h=90&q=100';?>" class="avatar-90">
		<?php } else {?>
		<img src="images/no_avatar.jpg" class="avatar-90">
		<?php }?>
		</a> </div>
		<?php }?>
	</div>
</div>