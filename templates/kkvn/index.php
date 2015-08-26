<?php
defined('_JEXEC') or die;
$tmpl = JURI::base()."templates/kkvn/";
$user = JFactory::getUser();
$userProfile = JUserHelper::getProfile( $user->id );
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<jdoc:include type="head" />

<!-- Bootstrap -->
<link href="<?php echo $tmpl;?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $tmpl;?>css/bootstrap-theme.css" rel="stylesheet">
<link href="<?php echo $tmpl;?>css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<link href="<?php echo $tmpl;?>css/daterangepicker.css" media="all" rel="stylesheet" type="text/css" />

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

<style>
.invalid {
    border-color: red !important;
}
</style>
</head>
<body>
<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.4&appId=630010247133511";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<nav class="navbar navbar-fixed-top main-navbar">
	<div class="container rel">
		<div class="topbg"></div>
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			<a class="navbar-brand" href="<?php echo JURI::base();?>"> <img src="<?php echo $tmpl;?>images/logo.png" alt=""> </a> </div>
		<div id="navbar" class="navbar-collapse collapse">
			{module Main Menu}
			<div class="right-nav pull-right">
				<ul class="nav navbar-nav rnav">
					<li class="dropdown search-field">
						<div class="input-box form-group grid70 pull-left">
							<input type="text" placeholder="Tìm kiếm..." class="input-cl form-control" id="search">
							<button type="submit" class="go-btn btn">Search</button>
						</div>
					</li>
					<?php if($user->guest){?>
					<li>
						<ul class="ul-reset">
							<li class="pull-left">
								<a href="index.php?option=com_users&view=login&Itemid=138" class="logf">
									Đăng Nhập
								</a>
							</li>
							<li class="pull-left">
								<a href="index.php?option=com_users&view=registration&Itemid=139" class="logf regist">Đăng Ký</a>
							</li>
						</ul>
					</li>
					<?php } else {?>
					<li> <a href="#" class="dropdown-toggle avatar-thumb" data-toggle="dropdown" role="button" aria-expanded="false"> <img src="media/plg_user_profilepicture/images/50/<?php echo $userProfile->profilepicture['file'];?>" width="30" height="30" alt="" class="pull-left">
						<div class=" pull-left user-name"><?php echo $user->name;?></div>
						</a>
						<ul class="dropdown-menu login-dropdown" role="menu">
							<li><a href="index.php?option=com_users&view=profile&Itemid=140">Trang cá nhân</a></li>
							<!--<li><a href="index.php?option=com_users&view=profile&layout=edit&Itemid=141">Thông tin tài khoản</a></li>-->
							<li><a href="<?php echo JRoute::_('index.php?option=com_users&task=user.logout&return='.base64_encode(JURI::base())); ?>">Đăng xuất</a></li>
						</ul>
					</li>
					<?php }?>
				</ul>
			</div>
		</div>
		<!--/.nav-collapse --> 
	</div>
</nav>
<jdoc:include type="component" />
<!-- End .container-fluid-->

<div class="footer container-fluid">
	<div class="container m20t">
		<div class="row">
			{module Tin tức}
			{module Thông tin}
			{module Bảo trợ bởi}
			{module Liên hệ}
			
			<div class="col-sm-3">
				<h4 class="white-me text-uppercase">Nhận tin qua email</h4>
				<p>Để không bỏ lỡ bất kỳ tin tức nào cũng như thông tin tổ chức các cuộc thi, vui lòng nhập email:</p>
				<div class="input-box form-group grid70 pull-left newsletter">
					<input type="text" placeholder="Ví dụ:  An.Nguyen@gmail.com" class="input-cl form-control" id="newsletter">
					<button type="submit" class="go-btn btn submit-small-btn">Search</button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="ft-line">
				{article 9}{introtext}{/article}
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End .footer--> 

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="<?php echo $tmpl;?>js/bootstrap.min.js"></script> 
<script type="text/javascript" src="<?php echo $tmpl;?>js/jquery.montage.min.js"></script>
<script type="text/javascript" src="<?php echo $tmpl;?>js/moment.js"></script>
<script type="text/javascript" src="<?php echo $tmpl;?>js/daterangepicker.js"></script>
<script src="<?php echo $tmpl;?>js/fileinput.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $tmpl;?>js/main.js"></script>
<script type="text/javascript">
jQuery(document).ready(function () {
	jQuery('input').on('change invalid', function() {
		var textfield = jQuery(this).get(0);
		textfield.setCustomValidity('');
		
		if (!textfield.validity.valid) {
		  textfield.setCustomValidity('Vui lòng điền vào đây');  
		}
	});
});
</script>
</body>
</html>