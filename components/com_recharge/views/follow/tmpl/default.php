<?php
defined('_JEXEC') or die;
$user = JFactory::getUser();
$userProfile = JUserHelper::getProfile( $user->id );

$db = JFactory::getDBO();
$q = $db->getQuery(true);
$q->select($db->quoteName('follow_id'));
$q->from($db->quoteName('#__follow'));
$q->where($db->quoteName('user_id')."=".$user->id);
$db->setQuery($q);

$followStr = $db->loadResult();
if($followStr){
	$followArr = explode(",", $followStr);
}
?>
<div class="container-fluid min-height-fix-window">
	<div class="container rel">
		<div class="row">
			<div class="col-sm-12">
				<div class="menu-space"></div>
			</div>
			<div class=" col-sm-12">
				<div class="white-box owner-field">
					<div class="row">
						<div class="col-xs-2 special-col-1">
							<div>
								<div class="owner-avatar rel">
									<a href="index.php?option=com_users&task=profile.edit&user_id=<?php echo $user->id;?>">
										<img src="<?php echo JURI::base();?>timthumb/timthumb.php?src=<?php echo JURI::base().'media/plg_user_profilepicture/images/200/'.$userProfile->profilepicture['file'].'&w=200&h=200&q=100';?>" alt="">
										<div class="change-image">Thay đổi Avatar</div>
									</a>
								</div>
								<ul class="ul-reset">
									<li class="owner-name"><?php echo $user->name;?></li>
									<li>Tham gia: <?php echo JHtml::_('date', $user->registerDate, 'd-m-Y'); ?></li>
									<li>Lượt xem: <?php echo $user->hits;?></li>
									<li>Số tiền trong tài khoản: <strong><?php echo number_format($user->balance,0,',','.');?></strong> vnđ</li>
								</ul>
							</div>
						</div>
						<div class="col-xs-10 special-col-2">
							<div class="cover">
								<a href="index.php?option=com_users&task=profile.edit&user_id=<?php echo $user->id;?>">
									<img src="<?php echo JURI::base();?>timthumb/timthumb.php?src=<?php echo JURI::base().'media/plg_user_profilecover/images/original/'.$userProfile->profilecover['file'].'&w=810&h=250&q=100';?>" alt="">
									<div class="change-image">Thay đổi hình Cover</div>
								</a>
								<div class="fade-up fade-up-transparent">
									<p class="status"><?php echo $user->status;?></p>
								</div>
							</div>
						</div>
					</div>
				</div><!--end. white-box-->
				
				<div class="white-box m10t  clearfix">
					{module UserMenu}
				</div><!--end. white-box-->
				
				
				<div class=" m10t m20b white-box p5all">
					<div class="title-box">
						<h2 class="title">Danh sách đang theo dõi</h2>
					</div>
					<div class="row list-user-box user-list-all">
						<?php if($followStr){
							foreach($followArr as $item){
								$tmpUser = JFactory::getUser($item);
								$tmpUserProfile = JUserHelper::getProfile( $tmpUser->id );
						?>
						<div class="col-sm-3 user-item">
							<a href="index.php?option=com_recharge&view=user&id=<?php echo $tmpUser->id;?>&Itemid=142">
								<?php if($tmpUserProfile->profilepicture['file']){?> 
								<img src="<?php echo JURI::base();?>timthumb/timthumb.php?src=<?php echo JURI::base().'media/plg_user_profilepicture/images/200/'.$tmpUserProfile->profilepicture['file'].'&w=90&h=90&q=100';?>" class="avatar-90 pull-left">
								<?php } else {?>
								<img src="images/no_avatar.jpg" class="avatar-90 pull-left">
								<?php }?>
								<p class="user-info"><?php echo $tmpUser->name;?></p>
							</a>
						</div>
						<?php 
							}
						} else { echo "Chưa có người nào!!!"; }?>
					</div>
					<!--<ul class="pagination m15l">
						<li class="disabled"><a href="#">«</a></li>
						<li class="active"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">»</a></li>
					</ul>-->
				</div>
				
			</div>
		</div>
	</div>
</div>