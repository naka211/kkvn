<?php defined('_JEXEC') or die('Direct Access to this location is not allowed.');?>

<div class="container-fluid min-height-fix-window">
	<div class="container rel">
		<div class="row">
			<div class="col-xs-12">
				<div class="menu-space"></div>
				
			</div>
			<div class="col-xs-12">
				<div class="title-box">
					<h2 class="title">Đăng Ảnh</h2>
				</div>
				<div class="m20t">
					<div class="login-page">
						<div class="row">
							<div class="col-md-12"> 
								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane active" id="Registration">
										<form role="form" class="form-horizontal form-validate" action="<?php echo JRoute::_('index.php?type=single'); ?>" method="post" name="adminForm" enctype="multipart/form-data">
											<div class="form-group">
												<label for="email" class="col-xs-3 control-label"> Ảnh cần bán</label>
												<div class="col-xs-9">
													<input id="file-0a" class="file required" type="file" data-show-upload="false" name="arrscreenshot[0]">
													<p class="p5t">Kích thước yêu cầu thấp nhất là 1900px chiều ngang hoặc chiều dọc</p>
												</div>
											</div>
											<div class="form-group">
												<label for="email" class="col-xs-3 control-label"> Tên tác phẩm</label>
												<div class="col-xs-9">
													<div class="row">
														<div class="col-md-12">
															<input type="text" class="form-control required" name="imgtitle" />
														</div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label for="email" class="col-xs-3 control-label"> Thể loại</label>
												<div class="col-xs-9">
													<?php echo $this->single_form->getInput('catid'); ?>
												</div>
											</div>
											<div class="form-group">
												<label for="mobile" class="col-xs-3 control-label"> Tag</label>
												<div class="col-xs-9">
													<input type="text" class="form-control" placeholder="" name="tags" />
													<p class="p5t">nhập từ khóa để người dùng có thể tìm được tác phẩm, tối đa 5 từ khóa, cách nhau bằng dấu phẩy "," .Ví dụ: Vịnh Hạ Long, sông nước, lễ hội.</p>
												</div>
											</div>
											<div class="form-group">
												<label for="mobile" class="col-xs-3 control-label"> Giá (VND)</label>
												<div class="col-xs-9">
													<input type="text" class="form-control" placeholder="Ví dụ: 2000000" name="price" />
												</div>
											</div>
											<div class="row">
												<div class="col-xs-3"> </div>
												<div class="col-xs-9">
													<button type="submit" class="btn btn-primary btn-sm validate"> Đăng ảnh</button>
												</div>
											</div>
											<input type="hidden" name="task" value="upload.upload" />
											<input type="hidden" name="published" value="1" />
											<input type="hidden" name="create_special_gif" value="" />
											<input type="hidden" name="debug" value="" />
											<input type="hidden" name="redirect" value="<?php echo base64_encode('index.php?option=com_joomgallery&view=userpanel&Itemid=140');?>" />
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
