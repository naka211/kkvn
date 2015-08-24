<?php
defined('_JEXEC') or die;

JHtml::_('behavior.formvalidator');
?>

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
	
	jQuery("#checkForm").click(function(e) {
		if(jQuery("#password").val() != jQuery("#password2").val()){
			alert("Mật khẩu không khớp");
			return false;
		} else {
			jQuery("#register").click();
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
					<h2 class="title">Đăng Ký</h2>
				</div>
				<div class="m20t">
					<div class="login-page">
						<div class="row">
							<div class="col-md-12"> 
								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane active" id="Registration">
										<script type="text/javascript">
										 var RecaptchaOptions = {
											theme : 'clean',
											lang: 'vi'
										 };
										 </script>
										<form role="form" class="form-horizontal form-validate" action="index.php" method="post" id="registerForm">
											<div class="form-group">
												<div class="col-sm-12">
													<input type="text" class="form-control required" placeholder="Họ và tên *" name="jform[name]" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12">
													<input type="text" class="form-control required validate-email" placeholder="Email *" name="jform[email]" id="email" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12">
													<input type="text" class="form-control" placeholder="Điện thoại" name="jform[phone]" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12">
													<input type="password" class="form-control required"  placeholder="Mật khẩu *" name="jform[password]" id="password" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12">
													<input type="password" class="form-control required validate-passverify"  placeholder="Lặp lại mật khẩu *" name="jform[password1]" id="password2" />
												</div>
											</div>
											<?php 
											require_once('recaptchalib.php');
											$publickey = "6LehjgMTAAAAANt2O-hrqTtVEd9q_3n-ZwZ7nfWX";
											echo recaptcha_get_html($publickey);
											?>
											<div class="row" style="margin-top:10px;">
												<div class="col-sm-12">
													<button type="button" id="checkForm" class="btn btn-primary btn-sm">Đăng ký</button>
													<button type="submit" class="btn btn-primary btn-sm validate" style="display:none;" id="register"> Đăng Ký</button>
													<button type="reset" class="btn btn-default btn-sm"> Hủy</button>
												</div>
											</div>
											<input type="hidden" name="option" value="com_users" />
											<input type="hidden" name="task" value="registration.register" />
											<input type="hidden" name="jform[username]" id="username" value="" />
											<input type="hidden" name="jform[email1]" id="email2" value="" />
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
