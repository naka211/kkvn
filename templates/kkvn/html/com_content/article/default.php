<?php
defined('_JEXEC') or die;
?>
<div class="container-fluid min-height-fix-window">
	<div class="container rel container-small">
		<div class="row">
			<div class="col-sm-12">
				<div class="menu-space"></div>
				{module Breadcrumbs}
			</div>
			<div class=" col-sm-12">
				<div class="title-box">
					<h2 class="title"><?php echo $this->item->title;?></h2>
				</div>
				<br />
				<div>
					<div class="section">
						<div class="teaser clearfix">
							<?php echo $this->item->text; ?>
							</div>
							<!-- /teaser-content --> 
						</div>
						<!-- /teaser clearfix --> 
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
