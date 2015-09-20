<?php
defined('_JEXEC') or die;
$tmpl = JURI::base()."templates/kkvn/";
$isOwner = false;
$user = JFactory::getUser();
if($user->id == $this->image->owner){
	$isOwner = true;
	$owner = $user;
}
$ownerProfile = JUserHelper::getProfile( $owner->id );
?>

<div class="container-fluid min-height-fix-window">
	<div class="container rel">
		<div class="row">
			<div class="col-xs-12">
				<div class="menu-space"></div>
			</div>
			<div class="col-xs-4 col-lg-3 col-white">
				<div class="user-field clearfix"> <a href="#" class=" pull-left col1"><img src="<?php echo JURI::base();?>timthumb/timthumb.php?src=<?php echo JURI::base().'media/plg_user_profilepicture/images/200/'.$ownerProfile->profilepicture['file'].'&w=100&h=100&q=100';?>" class="avatar" alt=""></a>
					<div class="des pull-left col2"> <a href="#" class="user strong-me"><?php echo $owner->name;?></a>
						<p>2145 người theo dõi</p>
						<?php if(!$isOwner){?>
						<button type="button" class="btn btn-default btn-sm strong-me">Theo dõi</button>
						<?php }?>
					</div>
				</div>
				<div class="info-field m10t">
					<div class="post-info detail">
						<p class="fs18"><?php echo $this->image->imgtitle;?></p>
						<p> <span class="label-b">Mã tác phẩm: </span> <span><?php echo JoomHelper::getAdditional($this->image->id, "code");?></span> </p>
						<p> <span class="label-b">Thể loại: </span> <span><?php echo JoomHelper::getCatName($this->image->id);?></span> </p>
						<p> <span class="label-b">Độ phân giải: </span> <span><?php echo $this->image->orig_width."x".$this->image->orig_height;?></span> </p>
						<p> <span class="label-b">Giá: </span> <span class="orange-me strong-me fs18"><?php echo number_format(JoomHelper::getAdditional($this->image->id, "price"), 0, ",", ".")?> VND</span> </p>
						<button type="button" class="btn btn-warning btn-blue btn-big btn-sm strong-me text-uppercase">Mua tác phẩm</button>
					</div>
				</div>
				<div class="m10t clearfix">
					<a href="#" class="pull-left btn-action">
					<div class="icon-action pull-left"> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> <span class="text-nowrap des">Thêm yêu thích</span> </div>
					<!-- them class active vao the "<a>" để on off cai nut--> 
					</a> </div>
				<div class="comment-field m10t">
					<div class="detailBox">
						<div class="titleBox">
							<label>Bình luận</label>
						</div>
						<div class="actionBox">
							<form class="form-inline" role="form">
								<div class="form-group col1">
									<textarea class="form-control" rows="2"  placeholder="Viết bình luận"></textarea>
								</div>
								<div class="form-group col2">
									<button class="btn btn-default">Đăng</button>
								</div>
							</form>
							<ul class="commentList">
								<li> <a href="#" class="commenterImage"> <img src="<?php echo $tmpl;?>images/ava.png" /> </a>
									<div class="commentText"> <a href="#" class=" strong-me">Nguyen Thi Mam</a>
										<p class="">Hello this is a test comment.</p>
										<span class="date sub-text">on March 5th, 2014</span> </div>
								</li>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-8 col-lg-9 img-wrapper">
				<div class="img-position"> <img src="<?php echo $tmpl;?>images_test/73.jpg" alt="" class="img-thumb">
					<div class="helper"></div>
				</div>
			</div>
		</div>
	</div>
</div>
