<style>
	.product-profile {
		transition: 0.4s;
		width: 40px;
		height: 40px;
		border-radius: 5%;
	}

	.close:hover {
		color: red !important;
	}

	.product-upload {
		transition: 0.2s;
		width: 40px;
		height: 40px;
		border: 1px solid #eae9e9;
		border-radius: 5px;
	}

	.product-upload:hover {
		transition: 0.3s;
		margin-bottom: 10px;
	}

	.product-profile:hover {
		transition: 0.4s;
		box-shadow: 1px 0px 3px 2px #ccc8c8;
		width: 60px;
		height: 60px;
	}

	td button{
		width: max-content !important;
		height: max-content !important;
	}
	td button i {
    padding: 1px;
    margin: 5px;
	}

	.pin {
		width: 80px;
	}
	.text-center{
		text-align: center;
	}

	.message {
		font-size: 25px;
		font-weight: bold;
	}

	.message,
	.pin {
		display: inline;
	}
</style>
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<!--breadcrumbs start -->
				<ul class="breadcrumb">
					<li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
					<li><a href="product">محصولات</a></li>
					<li class="active">لیست محصولات</li>
				</ul>
				<!--breadcrumbs end -->
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<?php if ($pagin_rows['count'] != 0) { ?>
						<header class="panel-heading">

							<i class="livicon" data-name="thumbnails-small" data-size="22" data-onparent="true" data-color="original"></i>
							لیست محصولات شما
							(<?= $CountAll ?>)
						</header>



						<table class="table table-striped table-advance table-hover">
							<thead>
								<tr>
									<th>ردیف</th>
									<th>نام محصول</th>
									<th>دسته بندی</th>
									<th>تصویر شاخص</th>
									<th>تعداد در انبار</th>
									<th>قیمت (تومان)</th>
									<th>درصد تخفیف</th>
									<th class="text-center">گالری تصاویر </th>
									<th>ویرایش</th>
									<th class="text-center">حذف</th>
								</tr>
							</thead>
							<tbody>

								<?php
								foreach ($pagin_rows['data'] as $key => $value) :

									$subproduct = $object->sup_product($value->cat_id);
									$supproduct = $object->SelectMainProcat($subproduct->chid);
								?>

									<tr>
										<td><?= $key + 1?></td>
										<td><?php echo $value->title; ?></td>
										<td><?php echo $supproduct->title . " / " . $subproduct->title; ?></td>

										<td>
											<?php
											if ($value->images == null)
												$img = "Public/img/Symbol/Close.png";
											else
												$img = "../" . $value->images;
											?>
											<a href="/php_course_files/shop/index.php?c=product&a=details&id=<?= $value->id ?>">
												<img class="product-profile" title="<?php echo $value->title; ?>" src="<?php echo $img; ?>">
											</a>
										</td>

										<td><?php echo $value->count ?> عدد</td>
										<td><?php echo number_format($value->price); ?></td>
										<td><?php echo $value->off . "%"; ?></td>

										<td class="text-center">
											<a href="#myModal" data-toggle="modal" class="clickPic" product="<?= $value->id ?>">
												<button data-placement="top" data-toggle="tooltip" class="btn btn-info btn-xs tooltips" type="submit" data-original-title="برای افزودن تصویر به  <?= $value->title ?> به کار میرود">
												<i class="icon-picture actionbtn"></i>
												</button>
											</a>

										</td>
										<style>
											.picture {
												visibility: hidden;
												cursor: pointer;
											}

											label i {
												visibility: visible;
												cursor: pointer;
											}
										</style>

										<td>
											<form method="post" action="product/edit/<?php echo $value->id; ?>"><button type="submit" class="btn btn-primary btn-xs"></form>
											<i class="icon-pencil actionbtn"></i>
										</td>


										<td class="text-center">
											<form method="post" action="product/delete/<?php echo $value->id; ?>"><button type="submit" class="btn btn-danger btn-xs"></form><i class="icon-trash actionbtn"></i>
										</td>
									</tr>
								<?php
								endforeach;
								?>


							</tbody>
						</table>

						<!-- Pagination Likns Start !-->
						<div>
							<?php $manageData->PaginationLinks(6, "product_tbl"); ?>
						</div>
						<!-- Pagination Likns End !-->
					<?php
					} //endif
					else {
					?>
						<div class="alert alert-block alert-danger fade in">
							<button data-dismiss="alert" class="close close-sm" type="button">
								<i class="icon-remove"></i>
							</button>
							<h4>
								<i class="icon-bar-chart"></i>
								نتیجه
							</h4>
							<p>محصولی برای نمایش وجود ندارد</p>
						</div>
					<?php } ?>
				</section>
			</div>
		</div>
	</section>
</section>
<style>
	.chose-image {
		width: 50px;
		height: 50px;
		border: 1px solid black;
	}

	label:hover {
		cursor: pointer;
	}
</style>
<?php
$files = $uploaded->files();
?>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
				<h4 class="modal-title">
					<i class="livicon" data-name="camera-alt" data-size="22" data-color="white" data-onparent="true"></i>
					یک تصویر را انتخاب کنید
				</h4>
			</div>
			<div class="modal-body">

				<form action="index.php?c=Product&a=addImage" method="post">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>ردیف</th>
								<th>عنوان تصویر</th>
								<th>تصویر</th>
								<th>متن جایگزین</th>
								<th>انتخاب</th>
							</tr>
						</thead>
						<input type="hidden" value="null" id="targetpic" name="targetpic">
						<tbody>
							<?php $num = 0;
							foreach ($files as $file) : $num++; ?>
								<tr>
									<td>
										<label for="<?= "pic" . $num ?>">
											<?= $num ?>
										</label>
									</td>

									<td>
										<label for="<?= "pic" . $num ?>">
											<?= $file->title ?> &nbsp;
										</label>
									</td>

									<td>
										<label for="<?= "pic" . $num ?>">
											<img class="product-upload" src="<?php echo "../" . $file->address ?>" alt="<?= $file->alt ?>">
										</label>
									</td>
									<td>
										<label for="<?= "pic" . $num ?>">
											<?= $file->alt ?>
										</label>
									</td>
									<td>
										<div class="pretty p-icon p-curve p-tada">
											<input name="picture_selected[]" value="<?= $file->id ?>" type="checkbox" id="<?= "pic" . $num ?>" class="pic-checkbox">
											<div class="state p-primary-o">
												<i class="icon mdi mdi-check"></i>
												<label> </label>
											</div>
										</div>
									</td>
								</tr>

							<?php endforeach; ?>
						</tbody>
					</table>

					<button type="submit" class="btn btn-success "><i class="livicon" data-name="check" data-size="22" data-color="white" data-onparent="true"></i></span>اعمال تصاویر </button>
					<a href="file/add" id="uploadepic"> <button type="button" class="btn btn-warning "> <i class="livicon" data-name="file-import" data-size="22" data-color="white" data-onparent="true"></i>افزودن تصویر جدید </button></a>
			</div>
		</div>
	</div>
</div>
</form>


<script src="Public/js/jquery.js"></script>
<script>
	$(document).ready(function() {

		$(".clickPic").click(function() {
			$(".pic-checkbox").prop('checked', false)

			var product = $(this).attr('product');
			$("#targetpic").val(product);

			var old_url = 'file/add';
			var new_url = old_url + '/' + product;
			$('#uploadepic').attr('href', new_url);
		});


	});
</script>