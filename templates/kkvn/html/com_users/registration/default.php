<?php
defined('_JEXEC') or die;

JHtml::_('behavior.formvalidator');
require_once ('recaptcha/src/autoload.php');
$siteKey = '6LehjgMTAAAAANt2O-hrqTtVEd9q_3n-ZwZ7nfWX';
$lang = 'vi';
?>
<style>
.invalid {
    border-color: red !important;
}
</style>
<script type="text/javascript">
jQuery(document).ready(function () {
    document.formvalidator.setHandler('passverify', function (value) {
        return (jQuery('#password').val() == value);
    });
	
	jQuery('input').on('change invalid', function() {
		var textfield = jQuery(this).get(0);
		textfield.setCustomValidity('');
		
		if (!textfield.validity.valid) {
		  textfield.setCustomValidity('Vui lòng điền vào đây');  
		}
	});
	
	jQuery("#email").blur(function(e) {
		jQuery("#username").val(jQuery("#email").val());
		jQuery("#email2").val(jQuery("#email").val());
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
					<h2 class="title">Đăng Ký</h2>
				</div>
				<div class="m20t">
					<div class="login-page">
						<div class="row">
							<div class="col-md-12"> 
								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane active" id="Registration">
										<form role="form" class="form-horizontal form-validate" action="index.php" method="post">
											<div class="form-group">
												<div class="col-sm-12">
													<input type="text" class="form-control required" placeholder="Họ và tên *" name="jform[name]" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12">
													<input type="text" class="form-control required validate-email" placeholder="Email *" name="jform[email1]" id="email" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12">
													<input type="text" class="form-control" placeholder="Điện thoại" name="jform[phone]" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12">
													<input type="password" class="form-control required"  placeholder="Mật khẩu *" name="jform[password1]" id="password" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12">
													<input type="password" class="form-control required validate-passverify"  placeholder="Lặp lại mật khẩu *" name="jform[password2]" id="password2" />
												</div>
											</div>
											<div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>" style="margin-bottom:15px;"></div>
											<script type="text/javascript"
													src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang; ?>">
											</script>
											<div class="row">
												<div class="col-sm-12">
													<button type="submit" class="btn btn-primary btn-sm validate"> Đăng Ký</button>
													<button type="reset" class="btn btn-default btn-sm"> Hủy</button>
												</div>
											</div>
											<input type="hidden" name="option" value="com_users" />
											<input type="hidden" name="task" value="registration.register" />
											<input type="hidden" name="jform[username]" id="username" value="" />
											<input type="hidden" name="jform[email2]" id="email2" value="" />
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
