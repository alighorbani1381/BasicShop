<style>
	.product-profile {
		transition: 1.5s;
		width: 40px;
		height: 40px;
	}

	.product-profile:hover {
		transition: 1.5s;
		box-shadow: 1px 0px 3px 2px #ccc8c8;
		width: 60px;
		height: 60px;
	}
</style>
<section id="main-content">
	<section class="wrapper">
		<h1 class="pageLables">ویرایش <?php echo $show->title; ?></h1>
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<section class="panel">
					<header class="panel-heading">
						فرم اصلی
					</header>
					<div class="panel-body">
						<form role="form" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="exampleInputEmail1">نام محصول</label>
								<input type="text" name="title" value=" <?php OldEdit('title', $show->title) ?>" class="form-control" id="exampleInputEmail1" placeholder="عنوان محصول را وارد کنید">
							</div>
							<?php FirstError('title') ?>

							<div class="form-group">
								<label for="exampleInputEmail1">توضیحات محصول</label>
								<textarea name="text" class="form-control" id="exampleInputEmail1" placeholder="توضیحات محصول را وارد کنید"><?php OldEdit('text', $show->text) ?></textarea>
							</div>
							<?php FirstError('text') ?>

							<div class="form-group">
								<label for="exampleInputEmail1">قیمت محصول</label>
								<input type="text" name="price" value="<?php OldEdit('price', $show->price) ?>" class="form-control" id="exampleInputEmail1" placeholder="عنوان محصول را وارد کنید">
							</div>
							<?php FirstError('price') ?>

							<div class="form-group">
								<label for="exampleInputEmail1">درصد تخفیف</label>
								<input type="text" name="off" value="<?php OldEdit('off', $show->off) ?>" class="form-control" id="exampleInputEmail1" placeholder="عنوان محصول را وارد کنید">
							</div>
							<?php FirstError('off') ?>

							<div class="form-group">
								<label for="exampleInputEmail1">تعداد</label>
								<input type="text" name="count" value="<?php OldEdit('count', $show->count) ?>" class="form-control" id="exampleInputEmail1" placeholder="عنوان محصول را وارد کنید">
							</div>
							<?php FirstError('count') ?>

							<div class="form-group">
								<label for="exampleInputEmail1">دسته بندی</label>
								<select style="font-size:14px;" class="form-control input-lg m-bot15" name="cat_id">
									<?php foreach ($subproduct as $value) : ?>
										<?php
										$procat_id = $value->id;
										$cat_id = $show->cat_id;
										if ($procat_id == $cat_id) {
											$status = "selected";
										} else {
											$status = "";
										}
										?>
										<option value="<?php echo $value->id; ?>" <?php echo $status; ?>><?php echo $value->title; ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">تصویر شاخص محصول</label>
								<img class="product-profile" src="<?php echo "../" . $show->images; ?>">
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">تغییر تصویر شاخص محصول</label>
								<input type="file" name="picture" class="form-control" id="exampleInputEmail1" placeholder="کلمات کلیدی مربوط به این صفحه را وارد کنید ...">
							</div>

							<button type="submit" class="btn btn-info" name="submit">افزودن محصول</button>
						</form>

					</div>

				</section>
	</section>
	<?php
	ResetEngine();
	?>