<?php
defined('_JEXEC') or die;
JHtml::_('behavior.formvalidator');
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
					<h2 class="title">Đăng Nhập</h2>
				</div>
				<div class="m20t">
					<div class="login-page">
						<div class="row">
							<div class="col-md-12">
								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane active" id="Login">
										<form role="form" class="form-horizontal form-validate" action="<?php echo JRoute::_('index.php?option=com_users&task=user.login'); ?>" method="post">
										<div class="form-group">
											<label for="email" class="col-xs-2 control-label">
												Email</label>
											<div class="col-xs-10">
												<input type="text" class="form-control required" id="email1" placeholder="Email" name="username" />
											</div>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1" class="col-xs-2 control-label">
												Mật khẩu</label>
											<div class="col-xs-10">
												<input type="password" class="form-control required" id="exampleInputPassword1" placeholder="Mật khẩu" name="password" />
											</div>
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1" class="col-xs-2 control-label">
											</label>
											<div class="col-xs-10">
												<label>
													<input type="checkbox" name="remember"> Nhớ mật khẩu
												</label>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-2">
											</div>
											<div class="col-xs-10">
												<button type="submit" class="btn btn-success pull-left validate">
													Đăng Nhập</button>
												<a href="index.php?option=com_users&view=remind" class="m15l">Quên mật khẩu?</a>
											</div>
										</div>
										<?php echo JHtml::_('form.token'); ?>
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