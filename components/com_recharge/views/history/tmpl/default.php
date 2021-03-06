<?php
defined('_JEXEC') or die;
$user = JFactory::getUser();
$userProfile = JUserHelper::getProfile( $user->id );
$db = JFactory::getDBO();
$user = JFactory::getUser();
$db->setQuery("SELECT time, serial, code, amount FROM #__recharge WHERE userid = ".$user->id);
$items = $db->loadObjectList();
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
						<h2 class="title">Lịch sử nạp thẻ</h2>
					</div>
					<div class="table-responsive custom-table ">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th width="23%">Ngày nạp</th>
									<th width="18%">Số seri thẻ</th>
									<th width="18%">Mã pin</th>
									<th width="11%">Trạng thái</th>
									<th width="15%" class="text-right">Mệnh giá (VND)</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($items as $item){?>
								<tr>
									<td><?php echo date("H:i d/m/Y", $item->time);?></td>
									<td><?php echo $item->serial;?></td>
									<td><?php echo $item->code;?></td>
									<td><span class="green-me">Thành công</span></td>
									<td class="text-right strong-me"><?php echo number_format((float)$item->amount, 0, ",", ".")?></td>
								</tr>
								<?php }?>
							</tbody>
						</table>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>