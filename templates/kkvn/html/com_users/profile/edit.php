<?php
defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidator');
$user = JFactory::getUser();
$userProfile = JUserHelper::getProfile( $user->id );
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
				
			</div>
			<div class="col-sm-12">
				<div class="white-box owner-field">
					<div class="row">
						<div class="col-xs-2 special-col-1">
							<div>
								<div class="owner-avatar rel">
									<a href="index.php?option=com_users&task=profile.edit&user_id=<?php echo $user->id;?>">
										<img src="<?php echo JURI::base();?>timthumb/timthumb.php?src=<?php echo JURI::base().'media/plg_user_profilepicture/images/200/'.$userProfile->profilepicture['file'].'&w=200&h=200&q=100';?>" alt="">
										<div class="change-image">Thay đổi Avatar</div>
									</a>
								</div>
								<ul class="ul-reset">
									<li class="owner-name"><?php echo $user->name;?></li>
									<li>Tham gia: <?php echo JHtml::_('date', $user->registerDate, 'd-m-Y'); ?></li>
									<li>Lượt xem: <?php echo $user->hits;?></li>
									<li>Số tiền trong tài khoản: <strong><?php echo number_format($user->balance,0,',','.');?></strong> vnđ</li>
								</ul>
							</div>
						</div>
						<div class="col-xs-10 special-col-2">
							<div class="cover">
								<a href="index.php?option=com_users&task=profile.edit&user_id=<?php echo $user->id;?>">
									<img src="<?php echo JURI::base();?>timthumb/timthumb.php?src=<?php echo JURI::base().'media/plg_user_profilecover/images/original/'.$userProfile->profilecover['file'].'&w=810&h=250&q=100';?>" alt="">
									<div class="change-image">Thay đổi hình Cover</div>
								</a>
								<div class="fade-up fade-up-transparent">
									<p class="status"><?php echo $user->status;?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="white-box m10t  clearfix" style="margin-bottom:10px;">
					{module UserMenu}
				</div><!--end. white-box-->
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
													<input type="text" class="form-control required validate-email" placeholder="Email *" name="jform[email1]" id="email" value="<?php echo $this->data->email;?>" readonly />
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
													<?php if($this->data->profilecover['file']){?>
													<img src="<?php echo JURI::base();?>timthumb/timthumb.php?src=<?php echo JURI::base().'media/plg_user_profilecover/images/original/'.$this->data->profilecover['file'].'&h=80&q=100';?>">
													<input type="checkbox" value="<?php echo $this->data->profilecover['file'];?>" name="jform[profilecover][file][remove]" id="jform_profilecover_fileremove" aria-invalid="false">
													<label for="jform_profilecover_fileremove" aria-invalid="false">Xóa hình cover</label>
													<?php }?>
                                                </div>
                                            </div>
											<div class="row">
												<div class="col-sm-12">
													<button type="button" id="checkForm" class="btn btn-primary btn-sm">Lưu</button>
													<button type="submit" class="btn btn-primary btn-sm validate" style="display:none;" id="save"> Đăng Ký</button>
													<a href="index.php?option=com_joomgallery&view=userpanel&Itemid=140" class="btn btn-default btn-sm">Trở về</a>
												</div>
											</div>
											<input type="hidden" name="option" value="com_users" />
				<input type="hidden" name="task" value="profile.save" />
											<input type="hidden" name="jform[username]" id="username" value="<?php echo $this->data->username;?>" />
											<input type="hidden" name="jform[email2]" id="username" value="<?php echo $this->data->email;?>" />
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
