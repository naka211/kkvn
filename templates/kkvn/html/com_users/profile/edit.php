<?php
defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidator');
//print_r($this->data);exit;
?>
<script type="text/javascript">
jQuery(document).ready(function () {
	jQuery("#checkForm").click(function(e) {
		if(jQuery("#password").val() != jQuery("#password2").val()){
			alert("Mật khẩu không khớp");
			return false;
		} else {
			jQuery("#save").click();
		}
	});
});
</script>
<div class="container-fluid min-height-fix-window">
	<div class="container rel">
		<div class="row">
			<div class="col-sm-12">
				<div class="menu-space"></div>
				{module Breadcrumbs}
			</div>
			<div class="col-sm-12">
				<div class="title-box">
					<h2 class="title">Chỉnh sửa thông tin</h2>
				</div>
				<div class="m20t">
					<div class="login-page">
						<div class="row">
							<div class="col-md-12"> 
								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane active" id="Registration">
										<form role="form" class="form-horizontal form-validate" action="<?php echo JRoute::_('index.php?option=com_users&task=profile.save'); ?>" method="post" id="editForm" enctype="multipart/form-data">
											<div class="form-group">
												<div class="col-sm-12">
													<input type="text" class="form-control required" placeholder="Họ và tên *" name="jform[name]" value="<?php echo $this->data->name;?>" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12">
													<input type="text" class="form-control required validate-email" placeholder="Email *" name="jform[email]" id="email" value="<?php echo $this->data->email;?>" readonly />
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12">
													<input type="password" class="form-control"  placeholder="Mật khẩu" name="jform[password]" id="password" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12">
													<input type="password" class="form-control validate-passverify"  placeholder="Lặp lại mật khẩu" name="jform[password1]" id="password2" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12">
													<input type="text" class="form-control" placeholder="Điện thoại" name="jform[phone]" value="<?php echo $this->data->phone;?>" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12">
													<textarea name="jform[status]" placeholder="Tâm trạng" class="form-control" rows="5"><?php echo $this->data->status;?></textarea>
												</div>
											</div>
											<div class="form-group">
                                                <div class="col-xs-12">
                                                	<input class="file" type="file" data-show-upload="false" name="jform[profilepicture][file]" id="jform_profilepicture_file">
                                                    <p class="p5t">Kích thước hình đại diện: hình vuông độ phân giải thấp nhất là 200x200</p>
													<?php if($this->data->profilepicture['file']){?>
													<img src="<?php echo JURI::base();?>timthumb/timthumb.php?src=<?php echo JURI::base().'media/plg_user_profilepicture/images/200/'.$this->data->profilepicture['file'].'&w=80&h=80&q=100';?>">
													<input type="checkbox" value="<?php echo $this->data->profilepicture['file'];?>" name="jform[profilepicture][file][remove]" id="jform_profilepicture_fileremove" aria-invalid="false">
													<label for="jform_profilepicture_fileremove" aria-invalid="false">Xóa hình đại diện</label>
													<?php }?>
                                                </div>
                                            </div>
											<div class="form-group">
                                                <div class="col-xs-12">
                                                	<input class="file" type="file" data-show-upload="false" name="jform[profilecover][file]">
                                                    <p class="p5t">Kích thước hình cover: độ phân giải thấp nhất là 810x250</p>
													<img src="<?php echo JURI::base();?>timthumb/timthumb.php?src=<?php echo JURI::base().'media/plg_user_profilecover/images/original/'.$this->data->profilecover['file'].'&h=80&q=100';?>">
													<input type="checkbox" value="<?php echo $this->data->profilecover['file'];?>" name="jform[profilecover][file][remove]" id="jform_profilecover_fileremove" aria-invalid="false">
													<label for="jform_profilecover_fileremove" aria-invalid="false">Xóa hình cover</label>
                                                </div>
                                            </div>
											<div class="row">
												<div class="col-sm-12">
													<button type="button" id="checkForm" class="btn btn-primary btn-sm">Lưu</button>
													<button type="submit" class="btn btn-primary btn-sm validate" style="display:none;" id="save"> Đăng Ký</button>
													<a href="javascript:history.go(-1);" class="btn btn-default btn-sm">Trở về</a>
												</div>
											</div>
											<input type="hidden" name="option" value="com_users" />
				<input type="hidden" name="task" value="profile.save" />
											<input type="hidden" name="jform[username]" id="username" value="<?php echo $this->data->username;?>" />
											<?php echo JHtml::_('form.token');?>
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
