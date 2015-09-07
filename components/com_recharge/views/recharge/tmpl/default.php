<?php
defined('_JEXEC') or die;
?>
<div class="container-fluid min-height-fix-window">
	<div class="container rel">
		<div class="row">
			<div class="col-xs-12">
				<div class="menu-space"></div>
				{module Breadcrumbs}
			</div>
			<div class="col-xs-12">
				<div class="title-box">
					<h2 class="title">Nạp Thẻ</h2>
				</div>
				<div class="m20t">
					<div class="login-page">
						<div class="row">
							<div class="col-md-12">
								<div class="tab-content">
									<div class="tab-pane active" id="Registration">
										
										<form role="form" class="form-horizontal m20t">
										<div class="form-group">
											<label for="email" class="col-xs-3 control-label">
												Chọn nhà mạng</label>
											<div class="col-xs-9">
												<div class="row">
													<div class="col-md-12">
														<select class="form-control">
															<option>Mobifone</option>
															<option>Vinaphone</option>
															<option>Viettel</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-xs-3 control-label">
												Số Seri</label>
											<div class="col-xs-9">
												<input type="text" class="form-control"  placeholder="Nhập số Seri trên thẻ" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-xs-3 control-label">
												Mã PIN</label>
											<div class="col-xs-9">
												<input type="text" class="form-control"  placeholder="Nhập mã PIN" />
											</div>
										</div>
										<div class="row">
											<div class="col-xs-3">
											</div>
											<div class="col-xs-9">
												<button type="button" class="btn btn-primary btn-sm">
													Nạp thẻ này</button>
											</div>
										</div>
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
