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
	
	$this->images[$i]->price = $price;
	$this->images[$i]->like = $like;
	$this->images[$i]->avatar = $avatar;
	$i++;
}
?>
<div class="container-fluid">
	<div class="container rel">
		<div class="row">
			<div class="col-xs-12">
				<div class="menu-space"></div>
				{module Breadcrumbs} </div>
			<div class=" col-xs-12">
				<div class="title-box clearfix">
					<div class="pull-left">
						<div class="dropdown">
							<h2 class="title"><?php echo $this->category->name;?></h2>
						</div>
						<h5 class="des"><?php echo $this->category->description;?></h5>
					</div>
					<!--<div class="pull-right">
						<ul class="nav navbar-nav category-nav">
							<li><a href="#">Ảnh mới</a></li>
							<li><a href="#">Top yêu thích</a></li>
							<li><a href="#">Xem nhiều</a></li>
							<li class="active"><a href="#">Top doanh thu</a></li>
						</ul>
					</div>-->
				</div>
				<div class="imgs-box m10t">
					<div class="am-container clearfix" id="am-container-category">
						<?php foreach($this->images as $image){?>
						<div class="wrap"> <a href="#"  data-toggle="modal" data-target="#ImageDetailModal"><img src="<?php echo JURI::base()."images/joomgallery/details/".$image->catpath."/".$image->imgfilename;?>" class="arrange-img"></a>
							<div class="img-top-overlay"> <a href="#"><img src="<?php echo JURI::base()."media/plg_user_profilepicture/images/50/".$image->avatar;?>" class="avatar pull-left" alt=""></a> <a href="#" class="user"><?php //echo $image->owner_name;?></a>
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
