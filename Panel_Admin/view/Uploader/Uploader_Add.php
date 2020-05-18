<style>
	.product-profile {
		transition: 1.5s;
		width: 40px;
		height: 40px;
		border-radius: 5%;
	}

	.product-profile:hover {
		transition: 1.5s;
		box-shadow: 1px 0px 3px 2px #ccc8c8;
		width: 60px;
		height: 60px;
	}

	.adding_file_bottom {
		background-color: #428bca;
		border-radius: 7px;
		text-align: center;
		padding: 18px;
		color: white;
		font-weight: bold;
		font-size: x-large;
		height: 68px;
		font-family: iransansweb;
		transition: 0.3s;
	}

	.adding_file_bottom:hover {
		transition: 0.3s;
		background-color: #1f598c;

	}

	.adding_file_bottom div {
		float: left;
		display: block;
		position: absolute;
		left: 35%;
	}

	.fdss label {
		cursor: pointer;
		width: 100%;
	}

	#plus_img {
		transition: 0.3s;
		width: max-content;
		height: max-content;
		padding: 5px;
		font-size: 39px;
		font-family: FontAwesome !important;
	}

	optgroup {
		font-family: iransansweb !important;
		background-color: #323232;
		color: white;
	}
</style>
<section id="main-content">
	<section class="wrapper">


		<div class="row">
			<div class="col-lg-12">
				<!--breadcrumbs start -->
				<ul class="breadcrumb">
					<li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
					<li><a href="file">مدیریت فایل ها</a></li>
					<li class="active">افزودن تصویر</li>
				</ul>
				<!--breadcrumbs end -->
			</div>
		</div>

		<?php if (isset($_POST['error'])) :
			$errors = $_POST['error'];

		?>
			<div class="col-lg-8 col-lg-offset-2">
				<div class="row">
					<div class="alert alert-info fade in alert-block fade in">
						<button data-dismiss="alert" class="close close-sm" type="button">
							<i class="icon-remove"></i>
						</button>
						<h4>
							<i class="icon-exclamation-sign"></i>
							<span>اخطار</span>
						</h4>
						<h3>شما نمیتوانید این فایل را اضافه کنید !!</h3>
						<p>مشکلی پیش آمده برای رفع مشکل خطاهای زیر را مطالعه کنید</p>

					</div>


					<?php
					if ($errors['type'] == "Error") :
					?>
						<div class="alert alert-block alert-danger fade in">
							<button data-dismiss="alert" class="close close-sm" type="button">
								<i class="icon-remove"></i>
							</button>
							<b>خطا:</b>
							فرمت فایل نامعتبر است
						</div>
					<?php
					endif;
					if ($errors['size'] == "Error") {
					?>
						<div class="alert alert-block alert-warning fade in">
							<b>هشدار:</b>
							<p>حجم فایل نباید بیشتر از یک مگابایت شود</p>
						</div>
					<?php } ?>

				</div>
			</div>
		<?php endif; ?>
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<section class="panel">

					<?php
					$myproduct = $product->product_details(@$_GET['pic']);
					if (isset($_GET['pic']) && $myproduct != false) :
					?>
						<div class="form-group  alert alert-info fade in">
							<label for="exampleInputEmail1">نکته: </label>
							<b>
								<span>تصویر روی محصول</span>
								<span>
									<a href="/php_course_files/shop/index.php?c=product&a=details&id=<?= $myproduct->id ?>">
										<?= $myproduct->title ?>
									</a>
								</span>
								<span>اضافه می شود</span>
							</b>
							<a href="/php_course_files/shop/index.php?c=product&a=details&id=<?= $myproduct->id ?>">
								<img class="product-profile" src="<?= "../" . $myproduct->images ?>"> &nbsp;&nbsp;
							</a>
						</div>
					<?php else : ?>
						<header class="panel-heading">
							افزودن تصویر جدید
							<i class="icon-picture"></i>
						</header>

					<?php endif; ?>


					<div class="panel-body">
						<form role="form" method="post" enctype="multipart/form-data">

							<div class="form-group">
								<label for="exampleInputEmail1">عنوان فایل</label>
								<input type="text" name="frm[title]" class="form-control" id="exampleInputEmail1" placeholder="در صورت خالی بودن اتفاقی نمی افتد">
							</div>
							<input type="hidden" value="<?= @$_GET['pic'] ?>" name="pic">
							<div class="form-group">
								<label for="exampleInputEmail1">متن پیش نمایش</label>
								<input type="text" name="frm[alt]" class="form-control" id="exampleInputEmail1" placeholder="درصورتی که این فایل تصویر است باید یک متن پیشنمایش برای آن انتخاب کنید...">
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">پوشه</label>
								<select style="font-size:14px;" class="form-control input-lg m-bot15" name="frm[folder]">
									<optgroup label="پیشفرض">
										<option value="0">بدون پوشه</option>
									</optgroup>
									<?php
									foreach ($main_lists as $main_list) :
									?>
										<optgroup label="<?php echo $main_list->title; ?>">
											<?php
											$sub_folders = $uploaded->sub_folder($main_list->id);
											foreach ($sub_folders as $sub_folder) :
											?>
												<option value="<?php echo $sub_folder->id; ?>"><?php echo $sub_folder->title; ?></option>
											<?php endforeach; ?>
										</optgroup>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="fdss">
								<label for="new_file">
									<div class="adding_file_bottom">
										<div style="margin:-11px;" id="plus_img" class="icon-plus-sign ic"></div>
										<div id="add_text" style="margin-left:30px; transition:0.3s;">برای افزودن تصویر کلیک کنید </div>
									</div>


									<script src="Public/js/jquery.js"></script>
									<script>
										$(document).ready(function() {

											$(".adding_file_bottom").mouseenter(function() {
												$("#plus_img").css({
													"color": "#b8d3ea",
													"transform": " rotate(95deg)",
													"margin-inline": "-25px"
												});
												$("#add_text").css({
													"padding-left": "20px",
													"color": "#b5e3e8"
												});
											});

											$(".adding_file_bottom").mouseleave(function() {
												$("#plus_img").css({
													"color": "white",
													"transform": " rotate(-90deg)"
												});
												$("#add_text").css({
													"padding-left": "0px",
													"color": "white"
												});
											});

										});
									</script>

								</label>

							</div>

							<div class="form-group">
								<input type="file" id="new_file" name="file[]" multiple style="display:none;">
							</div>



							<button type="submit" class="btn btn-primary" name="add_file">
								<i class="icon-cloud-upload "></i> &nbsp;
								آپلود تصویر
							</button>
						</form>

					</div>

				</section>
	</section>