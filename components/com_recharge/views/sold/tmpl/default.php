<?php
defined('_JEXEC') or die;
include_once(JPATH_SITE.DIRECTORY_SEPARATOR."components".DIRECTORY_SEPARATOR."com_joomgallery".DIRECTORY_SEPARATOR."helpers".DIRECTORY_SEPARATOR."helper.php");
$user = JFactory::getUser();
$userProfile = JUserHelper::getProfile( $user->id );

$db = JFactory::getDBO();
$db->setQuery("SELECT * FROM #__orders WHERE author = ".$user->id);
$orders = $db->loadObjectList();

$db->setQuery("SELECT SUM(price) as revenue FROM #__orders WHERE author = ".$user->id);
$revenue = $db->loadResult();
?>
<div class="container-fluid min-height-fix-window">
	<div class="container rel">
		<div class="row">
			<div class="col-xs-12">
				<div class="menu-space"></div>
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
				</div>
				<div class="white-box m10t  clearfix" style="margin-bottom:10px;">
					{module UserMenu}
				</div><!--end. white-box-->
				
				<div class=" m10t white-box p5all m20b">
					<div class="title-box">
						<h2 class="title">Danh sách tác phẩm đã bán</h2>
					</div>
				<div class="clearfix">
						<div class="pull-left box-revenue">
							<p class="des">Doanh thu</p>
							<p class="money "><?php echo number_format($revenue, 0, ",", ".")?> VND</p>
						</div>
						<div class="pull-left box-revenue">
							<p class="des">Tiền thực lãnh sau khi trừ phí dịch vụ -20%</p>
							<p class="money-final orange-me strong-me"><?php echo number_format($revenue * 0.8, 0, ",", ".")?> VND</p>
						</div>
					</div>
					<?php if($orders){?>
					<div class="table-responsive custom-table ">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th width="21%">Tác phẩm</th>
									<th width="16%">Tên</th>
									<th width="9%">Mã</th>
									<th width="12%">Thời gian mua</th>
									<th width="13%" class="text-right">Giá (VND)</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($orders as $order){
									$link = JRoute::_('index.php?option=com_joomgallery&view=detail&id='.$order->image_id);
								?>
								<tr>
									<td><a href="<?php echo $link;?>"><img src="index.php?option=com_joomgallery&view=image&format=raw&type=thumb&id=<?php echo $order->image_id;?>" alt="" class="thumbnail"></a></td>
									<td><a href="<?php echo $link;?>"><?php echo $order->image_name;?></a></td>
									<td><?php echo JoomHelper::getAdditional($order->image_id, "code");?></td>
									<td><?php echo JHtml::_('date', $order->buy_date, 'H:i d-m-Y'); ?></td>
									<td class="text-right strong-me"><?php echo number_format($order->price, 0, ",", ".")?></td>
								</tr>
								<?php }?>
							</tbody>
						</table>
					</div>
					<?php } else {echo "Chưa có tác phẩm nào!";}?>
				</div>
				
			</div>
		</div>
	</div>
</div>