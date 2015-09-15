<?php
defined('_JEXEC') or die;
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
				{module Breadcrumbs}
			</div>
			<div class=" col-xs-12">
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