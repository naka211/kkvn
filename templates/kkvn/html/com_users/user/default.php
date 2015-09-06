<?php
defined('_JEXEC') or die; die('fghfgh');
$tmpl = JURI::base()."templates/kkvn/";
$user = JFactory::getUser();
$userProfile = JUserHelper::getProfile( $user->id );//print_r($user);exit;
?>
<div class="container-fluid min-height-fix-window">
	<div class="container rel">
		<div class="row">
			<div class="col-xs-12">
				<div class="menu-space"></div>
				{module Breadcrumbs}
			</div>
			<div class=" col-xs-12">
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
				</div><!--end. white-box-->
				
				<div class="white-box m10t  clearfix">
					<ul class="nav navbar-nav user-nav">
						<li class="active"><a href="#">Tác phẩm</a></li>
						<li><a href="#">Đang theo dõi</a></li>
						<li><a href="#">Tác phẩm yêu thích</a></li>
						<li><a href="#">Doanh thu</a></li>
						<li><a href="#">Tác phẩm đã mua</a></li>
						<li><a href="index.php?option=com_users&task=profile.edit&user_id=<?php echo $user->id;?>">Chỉnh sửa thông tin</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Khác <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Option 1</a></li>
								<li><a href="#">Option 2</a></li>
							</ul>
						</li>
						
					</ul>
				</div><!--end. white-box-->
				<div>
					<a href="#" class="upload-image m10t">Đăng tác phẩm mới</a>
				</div>
				
				<div class=" m10t white-box p5all m20b">
					<div class="title-box">
						<h2 class="title">Tác phẩm của tôi</h2>
					</div>
					<div class="table-responsive custom-table ">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th width="19%">Tác phẩm</th>
									<th width="15%">Tên</th>
									<th width="9%">Trạng thái</th>
									<th width="7%">Mã</th>
									<th width="10%">Thể loại</th>
									<th width="10%">Độ phân giải</th>
									<th width="10%">Tag</th>
									<th width="9%" class="text-right">Giá (VND)</th>
									<th width="11%">Thao tác</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><a href="#"><img src="<?php echo $tmpl;?>images_test/1.jpg" alt="" class="thumbnail"></a></td>
									<td><a href="#">Vịnh Rồng</a></td>
									<td><p class="yellow-me strong-me">Đang chờ duyệt</p></td>
									<td>ZD839F2</td>
									<td>Ngoại cảnh</td>
									<td>1900x1080</td>
									<td>Hạ Long, thiên nhiên, sông nước</td>
									<td class="text-right">1.999.000</td>
									<td>
										<div class="btn-group f-width">
											<button type="button" class="form-control btn btn-default dropdown-toggle" data-toggle="dropdown">
												Thao tác<span class="caret"></span>
											</button>
											<ul class="dropdown-menu" role="menu">
												<li><a href="#">Sửa </a></li>
												<li><a href="#">Ẩn hình này</a></li>
											</ul>
										</div>
										<button type="button" class="btn btn-sm btn-danger m10t">Xóa hình</button>
									</td>
								</tr>
								<tr>
									<td><a href="#"><img src="<?php echo $tmpl;?>images_test/1.jpg" alt="" class="thumbnail"></a></td>
									<td><a href="#">Vịnh Rồng</a></td>
									<td><p class="yellow-me strong-me">Đang chờ duyệt</p></td>
									<td>ZD839F2</td>
									<td>Ngoại cảnh</td>
									<td>1900x1080</td>
									<td>Hạ Long, thiên nhiên, sông nước</td>
									<td class="text-right">1.999.000</td>
									<td>
										<div class="btn-group f-width">
											<button type="button" class="form-control btn btn-default dropdown-toggle" data-toggle="dropdown">
												Thao tác<span class="caret"></span>
											</button>
											<ul class="dropdown-menu" role="menu">
												<li><a href="#">Sửa </a></li>
												<li><a href="#">Ẩn hình này</a></li>
											</ul>
										</div>
										<button type="button" class="btn btn-sm btn-danger m10t">Xóa hình</button>
									</td>
								</tr>
								<tr>
									<td><a href="#"><img src="<?php echo $tmpl;?>images_test/1.jpg" alt="" class="thumbnail"></a></td>
									<td><a href="#">Vịnh Rồng</a></td>
									<td><p class="green-me strong-me">Đang được bán</p></td>
									<td>ZD839F2</td>
									<td>Ngoại cảnh</td>
									<td>1900x1080</td>
									<td>Hạ Long, thiên nhiên, sông nước</td>
									<td class="text-right">1.999.000</td>
									<td>
										<div class="btn-group f-width">
											<button type="button" class="form-control btn btn-default dropdown-toggle" data-toggle="dropdown">
												Thao tác<span class="caret"></span>
											</button>
											<ul class="dropdown-menu" role="menu">
												<li><a href="#">Sửa </a></li>
												<li><a href="#">Ẩn hình này</a></li>
											</ul>
										</div>
										<button type="button" class="btn btn-sm btn-danger m10t">Xóa hình</button>
									</td>
								</tr>
								<tr>
									<td><a href="#"><img src="<?php echo $tmpl;?>images_test/1.jpg" alt="" class="thumbnail"></a></td>
									<td><a href="#">Vịnh Rồng</a></td>
									<td><a href="javascript:void(0);" class="red-me strong-me"  data-toggle="tooltip" data-placement="top" title="Vi phạm quy định, hình ảnh thô tục">Từ chối <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span></a></td>
									<td>ZD839F2</td>
									<td>Ngoại cảnh</td>
									<td>1900x1080</td>
									<td>Hạ Long, thiên nhiên, sông nước</td>
									<td class="text-right">1.999.000</td>
									<td>
										<div class="btn-group f-width">
											<button type="button" class="form-control btn btn-default dropdown-toggle" data-toggle="dropdown">
												Thao tác<span class="caret"></span>
											</button>
											<ul class="dropdown-menu" role="menu">
												<li><a href="#">Sửa </a></li>
												<li><a href="#">Ẩn hình này</a></li>
											</ul>
										</div>
										<button type="button" class="btn btn-sm btn-danger m10t">Xóa hình</button>
									</td>
								</tr>
								<tr>
									<td><a href="#"><img src="<?php echo $tmpl;?>images_test/1.jpg" alt="" class="thumbnail"></a></td>
									<td><a href="#">Vịnh Rồng</a></td>
									<td><p class="green-me strong-me">Đang được bán</p></td>
									<td>ZD839F2</td>
									<td>Ngoại cảnh</td>
									<td>1900x1080</td>
									<td>Hạ Long, thiên nhiên, sông nước</td>
									<td class="text-right">1.999.000</td>
									<td>
										<div class="btn-group f-width">
											<button type="button" class="form-control btn btn-default dropdown-toggle" data-toggle="dropdown">
												Thao tác<span class="caret"></span>
											</button>
											<ul class="dropdown-menu" role="menu">
												<li><a href="#">Sửa </a></li>
												<li><a href="#">Ẩn hình này</a></li>
											</ul>
										</div>
										<button type="button" class="btn btn-sm btn-danger m10t">Xóa hình</button>
									</td>
								</tr>
								
							</tbody>
						</table>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>