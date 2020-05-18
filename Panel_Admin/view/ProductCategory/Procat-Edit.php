<section id="main-content">
	<section class="wrapper">

		<h3 class="pageLables">
			ویرایش دسته بندی
			<?= $show->title ?>
		</h3>
		<br><br>
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<section class="panel">
					<header class="panel-heading">
						فرم اصلی
					</header>
					<div class="panel-body">
						<form role="form" method="post">
							<div class="form-group">
								<label for="exampleInputEmail1">عنوان دسته بندی</label>
								<input type="text" name="frm[title]" class="form-control" value="<?php echo $show->title; ?>" id="exampleInputEmail1" placeholder="عنوان منو را وارد کنید">
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">زیر منو</label>
								<select style="font-size:14px;" class="form-control input-lg m-bot15" name="frm[chid]">

									<?php
									if ($show->chid != 0) :
										foreach ($subprocat as $value) :
											if ($value->id == $show->chid)
												$target_category = "selected";
											else
												$target_category = " ";

									?>

											<option value="<?php echo $value->id; ?>" <?= $target_category ?>>
												<?= $value->title ?>
											</option>
										<?php endforeach; ?>
									<?php else : ?>
										<option value="0"> سرگروه </option>
									<?php endif; ?>

								</select>
							</div>

							<button type="submit" class="btn btn-warning" name="submit">ویرایش دسته بندی</button>
						</form>

					</div>

				</section>
	</section>