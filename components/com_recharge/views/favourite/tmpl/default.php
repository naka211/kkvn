<?php
defined('_JEXEC') or die;
include_once("components/com_joomgallery/helpers/helper.php");
$user = JFactory::getUser();
$userProfile = JUserHelper::getProfile( $user->id );
$db = JFactory::getDBO();
$q = "SELECT piclist FROM #__joomgallery_users WHERE uuserid = ".$user->id;
$db->setQuery($q);
$imagesStr = $db->loadResult();

if($imagesStr){
	$q = "SELECT g.id, g.imgtitle, g.alias, g.imgfilename, c.name as cat_name, g.catid, g.owner FROM #__joomgallery g INNER JOIN #__joomgallery_catg c ON g.catid = c.cid WHERE g.published = 1 AND g.approved = 1 AND g.id IN (".$imagesStr.")";
	$db->setQuery($q);
	$images = $db->loadObjectList();
}
?>
<div class="container-fluid min-height-fix-window">
	<div class="container rel">
		<div class="row">
			<div class="col-xs-12">
				<div class="menu-space"></div>
				
			</div>
			<div class=" col-xs-12">
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
							
				<div class=" m10t m20b">
					<div class="title-box">
						<h2 class="title">Tác phẩm</h2>
					</div>
					<div>
						<?php 
						if($imagesStr){
						foreach($images as $image){
						$link = JRoute::_('index.php?option=com_joomgallery&view=detail&id='.$image->id);	
						$catPath = JoomHelper::getCatPath($image->catid);
						
						$catPath1 = str_replace("/",DIRECTORY_SEPARATOR,$catPath);
							
						$path = JPATH_ROOT.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'joomgallery'.DIRECTORY_SEPARATOR.'originals'.DIRECTORY_SEPARATOR.$catPath1.$image->imgfilename;
						$orig_info = getimagesize($path);
						
						$owner = JFactory::getUser($image->owner);
						$ownerProfile = JUserHelper::getProfile( $owner->id );
						?>
						<div class="post-item white-box m10t">
							<div class="part-top clearfix">
								<a class="pull-left" href="#">
									<img class="avatar-30 pull-left" alt="" src="<?php echo JURI::base();?>timthumb/timthumb.php?src=<?php echo JURI::base().'media/plg_user_profilepicture/images/200/'.$ownerProfile->profilepicture['file'].'&w=50&h=50&q=100';?>">
									<p class="username strong-me"><?php echo $owner->name;?></p>
								</a>
								<a title="" data-placement="top" data-toggle="tooltip" class="pull-right active" href="index.php?option=com_joomgallery&task=favourites.removeimage&id=<?php echo $image->id;?>" data-original-title="Xóa khỏi yêu thích">
									<span aria-hidden="true" class="glyphicon glyphicon-star fs18 p5t"></span>
								</a>
							</div>
							<div class="part-body">
								<div class="row">
									<div class="col-xs-9 text-center p5all">
										<a href="<?php echo $link;?>"><img src="<?php echo JURI::base()."images/joomgallery/details/".$catPath.$image->imgfilename;?>" alt="" class="thumb"></a>
									</div>
									<div class="col-xs-3">
										<div class="border-left post-info">
											<p class="fs18"><?php echo $image->imgtitle;?></p>
											<p>
												<span class="label-b">Mã tác phẩm: </span>
												<span><?php echo JoomHelper::getAdditional($image->id, "code");?></span>
											</p>
											<p>
												<span class="label-b">Thể loại: </span>
												<span><?php echo $image->cat_name;?></span>
											</p>
											<p>
												<span class="label-b">Độ phân giải: </span>
												<span><?php echo $orig_info[0].'x'.$orig_info[1];?></span>
											</p>
											<p>
												<span class="label-b">Giá: </span>
												<span class="orange-me strong-me fs18"><?php echo number_format(JoomHelper::getAdditional($image->id, "price"), 0, ",", ".")?> VND</span>
											</p>
											<button class="btn btn-warning btn-blue strong-me">Mua Tác Phẩm</button>
										</div>
									</div>
								</div>
							</div>
						</div><!--end .post-item-->
						<?php }} else {echo "Chưa có tác phẩm nào";} ?>
					</div>
					<!--<ul class="pagination">
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
