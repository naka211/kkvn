<?php
defined('_JEXEC') or die;
include_once(JPATH_SITE.DIRECTORY_SEPARATOR."components".DIRECTORY_SEPARATOR."com_joomgallery".DIRECTORY_SEPARATOR."helpers".DIRECTORY_SEPARATOR."helper.php");
$owner = JFactory::getUser(JRequest::getVar('id'));
$ownerProfile = JUserHelper::getProfile( $owner->id );
$db = JFactory::getDBO();
$q = "SELECT g.id, g.imgtitle, g.alias, g.imgfilename, c.name as cat_name, g.catid FROM #__joomgallery g INNER JOIN #__joomgallery_catg c ON g.catid = c.cid WHERE g.published = 1 AND g.approved = 1 AND g.owner = ".$owner->id;
$db->setQuery($q);
$images = $db->loadObjectList();

$user = JFactory::getUser();
$q = "SELECT follow_id FROM #__follow WHERE user_id = ".$user->id;
$db->setQuery($q);
$followStr = $db->loadResult();
if($followStr){
	$tmp = explode(",",$followStr);
	$key = array_search($owner->id, $tmp);
	if($key){
		$followed = true;
		$follow_link = "index.php?option=com_recharge&task=user.follow&ownerid=".$owner->id."&flag=0";
	} else {
		$followed = false;
		$follow_link = "index.php?option=com_recharge&task=user.follow&ownerid=".$owner->id."&flag=1";
	}
} else {
	$followed = false;
	$follow_link = "index.php?option=com_recharge&task=user.follow&ownerid=".$owner->id."&flag=1";
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
									<img src="<?php echo JURI::base();?>timthumb/timthumb.php?src=<?php echo JURI::base().'media/plg_user_profilepicture/images/200/'.$ownerProfile->profilepicture['file'].'&w=200&h=200&q=100';?>" alt="">
										
								</div>
								<ul class="ul-reset">
									<li class="owner-name"><?php echo $owner->name;?></li>
									<li>Tham gia: <?php echo JHtml::_('date', $owner->registerDate, 'd-m-Y'); ?></li>
									<li>Lượt xem: <?php echo $owner->hits;?></li>
								</ul>
								<a href="<?php echo $follow_link;?>" class="btn btn-default btn-sm strong-me" style="margin-left:10px;"><?php if($followed) echo "Hủy theo dõi"; else echo "Theo dõi";?></a>
							</div>
						</div>
						<div class="col-xs-10 special-col-2">
							<div class="cover">
								<img src="<?php echo JURI::base();?>timthumb/timthumb.php?src=<?php echo JURI::base().'media/plg_user_profilecover/images/original/'.$ownerProfile->profilecover['file'].'&w=810&h=250&q=100';?>" alt="">
								<div class="fade-up fade-up-transparent">
									<p class="status"><?php echo $owner->status;?></p>
								</div>
							</div>
						</div>
					</div>
				</div><!--end. white-box-->
							
				<div class=" m10t m20b">
					<div class="title-box">
						<h2 class="title">Tác phẩm</h2>
					</div>
					<div>
						<?php foreach($images as $image){
						$link = JRoute::_('index.php?option=com_joomgallery&view=detail&id='.$image->id);
						$catPath = JoomHelper::getCatPath($image->catid);
						
						$catPath1 = str_replace("/",DIRECTORY_SEPARATOR,$catPath);
							
						$path = JPATH_ROOT.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'joomgallery'.DIRECTORY_SEPARATOR.'originals'.DIRECTORY_SEPARATOR.$catPath1.$image->imgfilename;
						$orig_info = getimagesize($path);
						?>
						<div class="post-item white-box m10t">
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
											<a class="btn btn-warning btn-blue strong-me" href="index.php?option=com_recharge&view=cart&id=<?php echo $image->id;?>">Mua Tác Phẩm</a>
										</div>
									</div>
								</div>
							</div>
						</div><!--end .post-item-->
						<?php } ?>
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
