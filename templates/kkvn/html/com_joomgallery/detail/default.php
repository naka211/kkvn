<?php
defined('_JEXEC') or die;
$tmpl = JURI::base()."templates/kkvn/";
$user = JFactory::getUser();
if($user->id == $this->image->owner){
	$isOwner = true;
	$owner = $user;
} else {
	$isOwner = false;
	$owner = JFactory::getUser($this->image->owner);
}
$ownerProfile = JUserHelper::getProfile( $owner->id );
if($isOwner){
	$user_link = "#";
} else {
	$user_link = "index.php?option=com_recharge&view=user&id=".$owner->id."&Itemid=142";
}

if(!$isOwner){
	$db = JFactory::getDBO();
	$q = "SELECT piclist FROM #__joomgallery_users WHERE uuserid = ".$user->id;
	$db->setQuery($q);
	$favStr = $db->loadResult();
	if($favStr){
		$tmp = explode(",",$favStr);
		$key = array_search($this->image->id, $tmp);
		if($key){
			$favourite = true;
			$fav_link = "index.php?option=com_joomgallery&task=favourites.removeImage&id=".$this->image->id."&r=detail";
		} else {
			$favourite = false;
			$fav_link = "index.php?option=com_joomgallery&task=favourites.addImage&id=".$this->image->id."&r=detail";
		}
	} else {
		$favourite = false;
		$fav_link = "index.php?option=com_joomgallery&task=favourites.addImage&id=".$this->image->id."&r=detail";
	}
}
?>
<div class="container-fluid min-height-fix-window">
	<div class="container rel">
		<div class="row">
			<div class="col-xs-12">
				<div class="menu-space"></div>
			</div>
			<div class="col-xs-4 col-lg-3 col-white">
				<div class="user-field clearfix"> <a href="<?php echo $user_link;?>" class=" pull-left col1"><img src="<?php echo JURI::base();?>timthumb/timthumb.php?src=<?php echo JURI::base().'media/plg_user_profilepicture/images/200/'.$ownerProfile->profilepicture['file'].'&w=100&h=100&q=100';?>" class="avatar" alt=""></a>
					<div class="des pull-left col2"> <a href="<?php echo $user_link;?>" class="user strong-me"><?php echo $owner->name;?></a>
						<!--<p>2145 người theo dõi</p>
						<?php if(!$isOwner){?>
						<a href="<?php echo $follow_link;?>" class="btn btn-default btn-sm strong-me"><?php if($followed) echo "Hủy theo dõi"; else echo "Theo dõi";?></a>
						<?php }?>-->
					</div>
				</div>
				<div class="info-field m10t">
					<div class="post-info detail">
						<p class="fs18"><?php echo $this->image->imgtitle;?></p>
						<p> <span class="label-b">Mã tác phẩm: </span> <span><?php echo JoomHelper::getAdditional($this->image->id, "code");?></span> </p>
						<p> <span class="label-b">Thể loại: </span> <span><?php echo JoomHelper::getCatName($this->image->id);?></span> </p>
						<p> <span class="label-b">Độ phân giải: </span> <span><?php echo $this->image->orig_width."x".$this->image->orig_height;?></span> </p>
						<p> <span class="label-b">Giá: </span> <span class="orange-me strong-me fs18"><?php echo number_format(JoomHelper::getAdditional($this->image->id, "price"), 0, ",", ".")?> VND</span> </p>
						<?php if(!$user->guest){?>
						<?php if(!$isOwner){?>
						<a href="index.php?option=com_recharge&view=cart&id=<?php echo $this->image->id;?>" class="btn btn-warning btn-blue btn-big btn-sm strong-me text-uppercase">Mua tác phẩm</a>
						<?php }}?>
					</div>
				</div>
				
				<div class="m10t clearfix">
					<a class="pull-left btn-action active">
						<div class="icon-action pull-left">
							<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
							<span class="text-nowrap des"><?php echo JoomHelper::getAdditional($this->image->id, "like");?></span>
						</div>
					</a>
					<?php if(!$user->guest){?>
					<?php if(!$isOwner){?>
					<a href="<?php echo $fav_link;?>" class="pull-left btn-action <?php if($favourite) echo "active";?>">
					<div class="icon-action pull-left"> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> <span class="text-nowrap des"><?php if($favourite) echo "Bỏ yêu thích"; else echo "Thêm yêu thích";?></span></div>
					<!-- them class active vao the "<a>" để on off cai nut--> 
					</a>
					<?php }}?>
				</div>
				
				<?php if(!$user->guest){?>
				<div class="comment-field m10t">
					<div class="detailBox">
						<div class="titleBox">
							<label>Bình luận</label>
						</div>
						<div class="actionBox">
							<form name="commentform" action="<?php echo JRoute::_('index.php?task=comments.comment&id='.$this->image->id); ?>" method="post" class="form-inline">
								<div class="form-group col1">
									<textarea class="form-control" rows="2"  placeholder="Viết bình luận" name="cmttext"></textarea>
								</div>
								<div class="form-group col2">
									<button type="submit" class="btn btn-default">Đăng</button>
								</div>
							</form>
							<?php if($this->comments != NULL){?>
							<ul class="commentList">
								<?php foreach($this->comments as $comment){
								$commentUser = JFactory::getUser($comment->userid);	
								$commentUserProfile = JUserHelper::getProfile( $commentUser->id );
								?>
								<li>
									<a href="index.php?option=com_recharge&view=user&id=<?php echo $comment->userid;?>&Itemid=142" class="commenterImage"> <img src="<?php echo JURI::base().'media/plg_user_profilepicture/images/200/'.$ownerProfile->profilepicture['file'];?>" /> </a>
									<div class="commentText"> <a href="index.php?option=com_recharge&view=user&id=<?php echo $comment->userid;?>&Itemid=142" class=" strong-me"><?php echo $commentUser->name;?></a>
										<p class=""><?php echo stripslashes($comment->text); ?></p>
										<span class="date sub-text"><?php echo JHTML::_('date', $comment->cmtdate, JText::_('DATE_FORMAT_LC1')); ?></span> </div>
								</li>
								<?php }?>
							</ul>
							<?php }?>
						</div>
					</div>
				</div>
				<?php } else echo "Vui lòng đăng nhập để bình luận";?>
			</div>
			<div class="col-xs-8 col-lg-9 img-wrapper">
				<div class="img-position"> <img src="<?php echo $this->image->img_src."&type=img"; ?>" alt="" class="img-thumb">
					<div class="helper"></div>
				</div>
			</div>
		</div>
	</div>
</div>
