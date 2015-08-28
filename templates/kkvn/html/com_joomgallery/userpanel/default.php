<?php
defined('_JEXEC') or die;
$tmpl = JURI::base()."templates/kkvn/";
$user = JFactory::getUser();
$userProfile = JUserHelper::getProfile( $user->id );
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
					<a href="<?php echo JRoute::_('index.php?view=upload', false); ?>" class="upload-image m10t">Đăng tác phẩm mới</a>
				</div>
				
				<div class=" m10t white-box p5all m20b">
					<div class="title-box">
						<h2 class="title">Tác phẩm của tôi</h2>
					</div>
					<div class="table-responsive custom-table ">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th width="15%">Tác phẩm</th>
									<th width="15%">Tên</th>
									<th width="10%">Trạng thái</th>
									<th width="7%">Mã</th>
									<th width="10%">Thể loại</th>
									<th width="10%">Độ phân giải</th>
									<th width="10%">Tag</th>
									<th width="9%" class="text-right">Giá (VND)</th>
									<th width="14%">Thao tác</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($this->items as $i => $item){
							$canView    =    $item->approved == 1
                        && $item->published
                        && in_array($item->access, $this->_user->getAuthorisedViewLevels())
                        && isset($allowed_categories[$item->catid]);
							$link = JHTML::_('joomgallery.openImage', $this->_config->get('jg_detailpic_open'), $item);
							$catPath = JoomHelper::getCatPath($item->catid);
							$catPath = str_replace("/",DIRECTORY_SEPARATOR,$catPath);
							
							$path = JPATH_ROOT.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'joomgallery'.DIRECTORY_SEPARATOR.'originals'.DIRECTORY_SEPARATOR.$catPath.$item->imgfilename;
							$orig_info = getimagesize($path);
							?>
								<tr>
									<td><?php echo JHTML::_('joomgallery.minithumbimg', $item, 'thumbnail', $canView, false); ?></td>
									<td><a href="<?php echo $link;?>"><?php echo $item->imgtitle; ?></a></td>
									<td>
									<?php 
										if($item->approved == 1) echo '<p class="green-me strong-me">Đang được bán</p>';
										if($item->approved == 0) echo '<p class="yellow-me strong-me">Đang chờ duyệt</p>';
										if($item->approved == -1) echo '<a href="javascript:void(0);" class="red-me strong-me"  data-toggle="tooltip" data-placement="top" title="Vi phạm quy định">Từ chối <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span></a>';
									?>
									</td>
									<td><?php echo JoomHelper::getAdditional($item->id, "code");?></td>
									<td><?php echo JHtml::_('joomgallery.categorypath', $item->catid, true, ' &raquo; ', false, false, true); ?></td>
									<td><?php echo $orig_info[0].'x'.$orig_info[1];?></td>
									<td><?php echo JoomHelper::getTags($item->id);?></td>
									<td class="text-right"><strong><?php echo number_format(JoomHelper::getAdditional($item->id, "price"), 0, ",", ".")?></strong> vnđ</td>
									<td>
										<?php if($item->published){?>
										<a class="btn btn-sm btn-default" href="<?php echo JRoute::_('index.php?task=image.publish&id='.$item->id.$this->slimitstart); ?>">Ẩn hình<span class="glyphicon glyphicon-download" aria-hidden="true"></span></a>
										<?php } else {?>
										<a class="btn btn-sm btn-success" href="<?php echo JRoute::_('index.php?task=image.publish&id='.$item->id.$this->slimitstart); ?>">Đăng hình<span class="glyphicon glyphicon-upload" aria-hidden="true"></span></a>
										<?php }?>
										<a class="btn btn-sm btn-warning m10t" href="<?php echo JRoute::_('index.php?view=edit&id='.$item->id.$this->slimitstart); ?>">Chỉnh sửa <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
										<a class="btn btn-sm btn-danger m10t" href="javascript:if(confirm('Bạn chắc chắn muốn xóa hình này?')){ location.href='<?php echo JRoute::_('index.php?task=image.delete&id='.$item->id.$this->slimitstart, false);?>';}">Xóa hình <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
									</td>
								</tr>
							<?php }?>
							</tbody>
						</table>
						<?php
						if($this->pagination->get('pagesTotal') > 1){
							echo $this->pagination->getListFooter();
						}?>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>