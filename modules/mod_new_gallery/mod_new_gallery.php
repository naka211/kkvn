<?php
defined('_JEXEC') or die;
$tmpl = JURI::base()."templates/kkvn/";
if ($params->def('prepare_content', 1))
{
	JPluginHelper::importPlugin('content');
	$module->content = JHtml::_('content.prepare', $module->content, '', 'mod_special_gallery.content');
}
$db = JFactory::getDBO();
$q = "SELECT g.id, g.imgfilename, g.owner, c.catpath, u.name as owner_name FROM #__joomgallery g 
		INNER JOIN #__joomgallery_catg c ON g.catid = c.cid 
		INNER JOIN #__users u ON g.owner = u.id 
		WHERE g.published = 1 AND g.owner != 0 ORDER BY g.id ASC LIMIT 0,12";
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
		<div class="am-container clearfix" id="am-container2">
			<?php foreach($images as $image){
				$link = JRoute::_('index.php?option=com_joomgallery&view=detail&id='.$image->id);
			?>
			<div class="wrap"> <a href="<?php echo $link;?>"><img src="index.php?option=com_joomgallery&view=image&format=raw&type=img&id=<?php echo $image->id;?>" class="arrange-img" /></a>
				<div class="img-top-overlay"> <a href="index.php?option=com_recharge&view=user&id=<?php echo $image->owner;?>&Itemid=142"><img src="<?php echo JURI::base()."media/plg_user_profilepicture/images/50/".$image->avatar;?>" class="avatar pull-left" alt=""></a> <a href="index.php?option=com_recharge&view=user&id=<?php echo $image->owner;?>&Itemid=142" class="user"><?php echo $image->owner_name;?></a>
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