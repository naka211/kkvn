<?php
defined('_JEXEC') or die;
//print_r(JRequest::getVar("id"));exit;
include_once(JPATH_SITE.DIRECTORY_SEPARATOR."components".DIRECTORY_SEPARATOR."com_joomgallery".DIRECTORY_SEPARATOR."helpers".DIRECTORY_SEPARATOR."helper.php");
$id = JRequest::getVar("id");
$user = JFactory::getUser();
$db = JFactory::getDBO();
$db->setQuery("SELECT id, imgtitle, catid, imgfilename FROM #__joomgallery WHERE id = ".$id);
$image = $db->loadObject();

$catPath = JoomHelper::getCatPath($image->catid);
						
$catPath1 = str_replace("/",DIRECTORY_SEPARATOR,$catPath);
	
$path = JPATH_ROOT.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'joomgallery'.DIRECTORY_SEPARATOR.'originals'.DIRECTORY_SEPARATOR.$catPath1.$image->imgfilename;
$orig_info = getimagesize($path);
?>
<div class="container-fluid min-height-fix-window">
	<div class="container rel">
		<div class="row">
			<div class="col-xs-12">
				<div class="menu-space"></div>
			</div>
			<div class=" col-xs-12">
				<div class="title-box">
					<h2 class="title">Thanh Toán</h2>
				</div>
				<div class="row m20t">
					<div class="text-center col-xs-4 text-center">
						<img src="templates/kkvn/images/sprite.png" alt="" class="">
						<p class="fs18 gray-me-2">
							Vui lòng kiểm tra tác phẩm trong giỏ hàng và thanh toán.
							Hình gốc của tác phẩm sẽ được gửi qua Email đăng ký tài khoản.
						</p>
					</div>
					
					<div class="col-xs-8">
						<div class="table-responsive custom-table">
							<table class="table table-bordered table-hover payment">
								<thead>
									<tr>
										<th width="16%">Tác phẩm</th>
										<th width="27%">Tên</th>
										<th width="17%">Mã</th>
										<th width="23%">Độ phân giải (px)</th>
										<th width="17%" class="text-right">Giá (VND)</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><a href="index.php?option=com_joomgallery&view=detail&id=<?php echo $id;?>"><img src="index.php?option=com_joomgallery&view=image&format=raw&type=thumb&id=<?php echo $id;?>" alt="" class="thumbnail"></a></td>
										<td><a href="index.php?option=com_joomgallery&view=detail&id=<?php echo $id;?>"><?php echo $image->imgtitle;?></a></td>
										<td><?php echo JoomHelper::getAdditional($image->id, "code");?></td>
										<td><?php echo $orig_info[0].'x'.$orig_info[1];?></td>
										<td class="text-right strong-me"><?php echo number_format(JoomHelper::getAdditional($image->id, "price"), 0, ",", ".")?></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="summary clearfix">
							<div class="clearfix">
								<span class="label pull-left">Tổng giá tiền cần phải trả:</span>
								<span class="text-right  pull-left fs18 orange-me strong-me"><?php echo number_format(JoomHelper::getAdditional($image->id, "price"), 0, ",", ".")?></span>
							</div>
							<div class="clearfix">
								<span class="label pull-left">Tiền trong tài khoản:</span>
								<span class="text-right  pull-left"><?php echo number_format($user->balance, 0, ",", ".")?></span>
							</div>
							<div class="clearfix">
								<span class="label pull-left">Tiền còn lại sau khi mua:</span>
								<span class="text-right  pull-left"><?php echo number_format((int)$user->balance - (int)JoomHelper::getAdditional($image->id, "price"), 0, ",", ".")?></span>
							</div>
							<a class="btn btn-warning btn-blue btn-lg strong-me text-uppercase pull-right m10t fs14" href="index.php?option=com_recharge&task=cart.pay&id=<?php echo $id;?>">Thanh Toán</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>