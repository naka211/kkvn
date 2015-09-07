<?php
defined('_JEXEC') or die;
$tmpl = JURI::base()."templates/kkvn/";
if ($params->def('prepare_content', 1))
{
	JPluginHelper::importPlugin('content');
	$module->content = JHtml::_('content.prepare', $module->content, '', 'mod_special_gallery.content');
}
$db = JFactory::getDBO();
$q = "SELECT imd.id FROM #__joomgallery_image_details imd 
		INNER JOIN #__joomgallery g ON imd.id = g.id 
		WHERE imd.details_key = 'additional.like' AND g.published = 1 ORDER BY imd.details_value DESC LIMIT 0,12";
$db->setQuery($q);
$ids = $db->loadObjectList();
foreach($ids as $id){
	$ids_arr[] = $id->id;
}
$ids_str = implode(",", $ids_arr);

$q = "SELECT g.id, g.imgfilename, g.owner, c.catpath, u.name as owner_name FROM #__joomgallery g 
		INNER JOIN #__joomgallery_catg c ON g.catid = c.cid 
		INNER JOIN #__users u ON g.owner = u.id 
		WHERE g.id IN (".$ids_str.")";
$db->setQuery($q);
$images = $db->loadObjectList();
$i = 0;
foreach($images as $image){
	$q = "SELECT details_value FROM #__joomgallery_image_details WHERE id = ".$image->id." AND details_key = 'additional.price'";
	$db->setQuery($q);
	$price = $db->loadResult();
	
	$q = "SELECT details_value FROM #__joomgallery_image_details WHERE id = ".$image->id." AND details_key = 'additional.like'";
	$db->setQuery($q);
	$like = $db->loadResult();
	
	$q = "SELECT profile_value FROM #__user_profiles WHERE user_id = ".$image->owner." AND profile_key = 'profilepicture.file'";
	$db->setQuery($q);
	$avatar = $db->loadResult();
	
	$images[$i]->price = $price;
	$images[$i]->like = $like;
	$images[$i]->avatar = $avatar;
	$i++;
}
?>

<div class=" col-sm-12">
	<div class="title-box">
		<h2 class="title"><?php echo $module->title;?></h2>
		<h5 class="des"><?php echo $module->content;?></h5>
	</div>
	<div class="imgs-box m10t">
		<div class="am-container clearfix" id="am-container3">
			<?php foreach($images as $image){?>
			<div class="wrap"> <a href="#"><img src="<?php echo JURI::base()."images/joomgallery/details/".$image->catpath."/".$image->imgfilename;?>" class="arrange-img" /></a>
				<div class="img-top-overlay"> <a href="#"><img src="<?php echo JURI::base()."media/plg_user_profilepicture/images/50/".$image->avatar;?>" class="avatar pull-left" alt=""></a> <a href="#" class="user"><?php echo $image->owner_name;?></a>
					<div class="like"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> <?php echo $image->like;?></div>
				</div>
				<div class="img-bottom-overlay">
					<div class="strong-me price"><?php echo number_format($image->price, 0, "", "."). " VNĐ";?></div>
				</div>
			</div>
			<?php }?>
		</div>
		<!--<a href="#" class="load-more-image">Tải thêm</a>--> </div>
</div>