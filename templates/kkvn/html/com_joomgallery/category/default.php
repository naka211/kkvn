<?php defined('_JEXEC') or die('Direct Access to this location is not allowed.');
//print_r($this->images);exit;
$db = JFactory::getDBO();
$i = 0;
foreach($this->images as $image){
	$q = "SELECT details_value FROM #__joomgallery_image_details WHERE id = ".$image->id." AND details_key = 'additional.price'";
	$db->setQuery($q);
	$price = $db->loadResult();
	
	$q = "SELECT details_value FROM #__joomgallery_image_details WHERE id = ".$image->id." AND details_key = 'additional.like'";
	$db->setQuery($q);
	$like = $db->loadResult();
	
	$q = "SELECT profile_value FROM #__user_profiles WHERE user_id = ".$image->owner." AND profile_key = 'profilepicture.file'";
	$db->setQuery($q);
	$avatar = $db->loadResult();
	
	$db->setQuery("SELECT name FROM #__users WHERE id = ".$image->owner);
	$owner_name = $db->loadResult();
	
	$this->images[$i]->price = $price;
	$this->images[$i]->like = $like;
	$this->images[$i]->avatar = $avatar;
	$this->images[$i]->owner_name = $owner_name;
	$i++;
}
?>
<div class="container-fluid">
	<div class="container rel">
		<div class="row">
			<div class="col-xs-12">
				<div class="menu-space"></div>
				
			</div>
			<div class=" col-xs-12">
				<div class="title-box clearfix">
					<div class="pull-left">
						<div class="dropdown">
							<h2 class="title"><?php echo $this->category->name;?></h2>
						</div>
						<h5 class="des"><?php echo $this->category->description;?></h5>
					</div>
				</div>
				<div class="imgs-box m10t">
					<div class="am-container clearfix" id="am-container-category">
						<?php foreach($this->images as $image){
						$link = JRoute::_('index.php?option=com_joomgallery&view=detail&id='.$image->id);	
						?>
						<div class="wrap"> <a href="<?php echo $link;?>"><img src="index.php?option=com_joomgallery&view=image&format=raw&type=img&id=<?php echo $image->id;?>" class="arrange-img"></a>
							<div class="img-top-overlay"> <a href="index.php?option=com_recharge&view=user&id=<?php echo $image->owner;?>&Itemid=142"><img src="<?php echo JURI::base()."media/plg_user_profilepicture/images/50/".$image->avatar;?>" class="avatar pull-left" alt=""></a> <a href="index.php?option=com_recharge&view=user&id=<?php echo $image->owner;?>&Itemid=142" class="user"><?php echo $image->owner_name;?></a>
								<div class="like"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> <?php echo $image->like;?></div>
							</div>
							<div class="img-bottom-overlay">
								<div class="strong-me price"><?php echo number_format($image->price, 0, "", "."). " VNĐ";?></div>
							</div>
						</div>
						<?php }?>
					</div>
					<hr>
					<!--<ul class="pagination">
						<li class="disabled"><a href="#">«</a></li>
						<li class="active"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">»</a></li>
					</ul>-->
					<?php echo $this->pagination->getPagesLinks(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
