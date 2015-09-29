<?php
defined('_JEXEC') or die;
JHTML::_('behavior.formvalidator');
$user = JFactory::getUser();
$userProfile = JUserHelper::getProfile( $user->id );
?>
<div class="container-fluid min-height-fix-window">
	<div class="container rel">
		<div class="row">
			<div class="col-xs-12">
				<div class="menu-space"></div>
			</div>
			<div class="col-xs-12">
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
					<h2 class="title">Nạp Thẻ</h2>
				</div>
				<div class="m20t">
					<div class="login-page">
						<div class="row">
							<div class="col-md-12">
								<div class="tab-content">
									<div class="tab-pane active" id="Registration">
										
										<form role="form" class="form-horizontal m20t form-validate" method="post" action="index.php">
										<div class="form-group">
											<label for="email" class="col-xs-3 control-label">
												Chọn nhà mạng</label>
											<div class="col-xs-9">
												<div class="row">
													<div class="col-md-12">
														<select class="form-control" name="provider">
															<option value="VMS">Mobifone</option>
															<option value="VNP">Vinaphone</option>
															<option value="VTT">Viettel</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-xs-3 control-label">
												Số Seri</label>
											<div class="col-xs-9">
												<input type="text" class="form-control required"  placeholder="Nhập số Seri trên thẻ" name="serial" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-xs-3 control-label">
												Mã PIN</label>
											<div class="col-xs-9">
												<input type="text" class="form-control required"  placeholder="Nhập mã PIN" name="pin" />
											</div>
										</div>
										<div class="row">
											<div class="col-xs-3">
											</div>
											<div class="col-xs-9">
												<button type="summit" class="btn btn-primary btn-sm">
													Nạp thẻ này</button>
											</div>
										</div>
										<input type="hidden" name="option" value="com_recharge" />
										<input type="hidden" name="task" value="recharge.recharge" />
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
