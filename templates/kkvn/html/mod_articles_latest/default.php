<?php
defined('_JEXEC') or die;
?>
<div class="col-sm-<?php echo $moduleclass_sfx; ?>">
	<h4 class="white-me text-uppercase"><?php echo $module->title;?></h4>
	<ul class="ul-reset footer-ul">
		<?php foreach ($list as $item){ ?>
		<li><a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></li>
		<?php }?>
	</ul>
</div>
