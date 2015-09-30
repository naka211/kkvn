<?php
defined('_JEXEC') or die;
?>

<div class="container-fluid min-height-fix-window">
	<div class="container rel container-small">
		<div class="row">
			<div class="col-sm-12">
				<div class="menu-space"></div>
			</div>
			<div class=" col-sm-12">
				<div class="title-box">
					<h2 class="title"><?php echo $this->category->title;?></h2>
				</div>
				<div>
					<div class="section">
						<?php foreach($this->intro_items as $item){
						$link = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language));
						$images  = json_decode($item->images);
						?>
						<div class="teaser clearfix">
							<h3><a href="<?php echo $link;?>"><?php echo $item->title;?></a>&nbsp;<small><?php echo JHtml::_('date', $item->displayDate, 'd-m-Y'); ?></small></h3>
							<a href="<?php echo $link;?>" class="thumbnail"><i><img src="<?php echo $images->image_intro;?>" alt="<?php echo $item->title;?>"></i></a>
							<div class="teaser-content">
								<?php echo $item->introtext;?>
								<p><a href="<?php echo $link;?>">Xem Thêm...</a></p>
							</div>
							<!-- /teaser-content --> 
						</div>
						<!-- /teaser clearfix -->
						<hr>
						<?php }?>
						
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
</div>
