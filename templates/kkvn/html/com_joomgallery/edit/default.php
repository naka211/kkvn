<?php defined('_JEXEC') or die('Direct Access to this location is not allowed.');
//print_r($this->image);exit;
?>

<div class="container-fluid min-height-fix-window">
	<div class="container rel">
		<div class="row">
			<div class="col-xs-12">
				<div class="menu-space"></div>
				{module Breadcrumbs}
			</div>
			<div class="col-xs-12">
				<div class="title-box">
					<h2 class="title">Sửa Ảnh</h2>
				</div>
				<div class="m20t">
					<div class="login-page">
						<div class="row">
							<div class="col-md-12"> 
								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane active" id="Registration">
										<form role="form" class="form-horizontal form-validate" action="<?php echo JRoute::_('index.php?task=image.save'.$this->redirect.$this->slimitstart); ?>" method="post" name="adminForm">
											<div class="form-group">
												<label for="email" class="col-xs-3 control-label"> Ảnh</label>
												<div class="col-xs-9">
													<?php echo $this->form->getInput('imagelib'); ?>
												</div>
											</div>
											<div class="form-group">
												<label for="email" class="col-xs-3 control-label"> Tên tác phẩm</label>
												<div class="col-xs-9">
													<div class="row">
														<div class="col-md-12">
															<?php echo $this->form->getInput('imgtitle'); ?>
														</div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="email" class="col-xs-3 control-label"> Thể loại</label>
												<div class="col-xs-9">
													<?php echo $this->form->getInput('catid'); ?>
												</div>
											</div>
											<div class="form-group">
												<label for="mobile" class="col-xs-3 control-label"> Tag</label>
												<div class="col-xs-9">
													<input type="text" class="form-control" placeholder="" name="additional[tags]" value="<?php echo $this->image->additional['tags']?>" />
													<p class="p5t">nhập từ khóa để người dùng có thể tìm được tác phẩm, tối đa 5 từ khóa, cách nhau bằng dấu phẩy "," .Ví dụ: Vịnh Hạ Long, sông nước, lễ hội.</p>
												</div>
											</div>
											<div class="form-group">
												<label for="mobile" class="col-xs-3 control-label"> Giá (VND)</label>
												<div class="col-xs-9">
													<input type="text" class="form-control" name="additional[price]" value="<?php echo $this->image->additional['price']?>" />
												</div>
											</div>
											<div class="row">
												<div class="col-xs-3"> </div>
												<div class="col-xs-9">
													<button type="submit" class="btn btn-primary btn-sm validate">Lưu</button>
													<button type="button" class="btn btn-primary btn-sm" onclick="javascript:location.href='index.php?option=com_joomgallery&view=userpanel&Itemid=140';">Trở về</button>
												</div>
											</div>
											<?php echo $this->form->getInput('id'); ?>
											<input type="hidden" name="additional[code]" value="<?php echo $this->image->additional['code']?>" />
											<input type="hidden" name="additional[like]" value="<?php echo $this->image->additional['like']?>" />
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
