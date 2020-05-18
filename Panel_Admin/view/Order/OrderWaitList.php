    <style>
    	.product-profile {
    		width: 30px;
    		height: 30px;
    	}
    </style>
    <section id="main-content">
    	<section class="wrapper">
    		<div class="col-lg-12">
    			<!--breadcrumbs start -->
    			<ul class="breadcrumb">
    				<li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
    				<li><a href="product">سفارشات</a></li>
    				<li class="active">سفارشات تایید نشده</li>
    			</ul>
    			<!--breadcrumbs end -->
    		</div>
    		<div class="row">
    			<div class="col-lg-12">
    				<section class="panel">
    					<?php if (count($row) != 0) { ?>
    						<header class="panel-heading">
    							سفارشات در دست بررسی
    						</header>
    						<table class="table table-striped table-advance table-hover">
    							<thead>
    								<tr>
    									<th>نام مشتری</th>
    									<th>نام کالا</th>
    									<th>تعداد</th>
    									<th>قیمت</th>
    									<th>تاریخ ثبت سفارش</th>
    									<th>شماره تماس مشتری</th>
    									<th>ارسال به بخش پست</th>
    								</tr>
    							</thead>
    							<tbody>

    								<?php

									foreach ($row as $value) :
										$target_user = $class->get_user($value->user_id);
										$target_product = $class->product_details($value->product_id);
									?>

    									<tr>
    										<td><?php echo $target_user->name . " " . $target_user->lastname; ?></td>
    										<td><?php echo $target_product->title; ?></td>
    										<td><?php echo $value->count; ?></td>
    										<td><?php echo number_format($value->price); ?></td>
    										<?php

											$date = explode("/", $value->date);
											$Hejri_Date = gregorian_to_jalali($date[0], $date[1], $date[2], "/");
											?>
    										<td><?php echo $Hejri_Date; ?></td>
    										<td><?php echo $target_user->email; ?></td>
    										<td><a href="?c=order&a=submit&id=<?php echo $value->id; ?>" class="btn btn-primary btn-xs"><i class="icon-ok"></i></a></td>
    									</tr>
    								<?php
									endforeach;
									?>

    							</tbody>
    						</table>
    					<?php
						} else {
						?>
    						<div class="alert alert-block alert-warning  fade in">
    							<button data-dismiss="alert" class="close close-sm" type="button">
    								<i class="icon-remove"></i>
    							</button>
    							<h4>
    								<i class="icon-meh"></i>
    								نتیجه
    							</h4>
    							<p>تاکنون سفارش جدیدی ثبت نشده است</p>
    						</div>
    					<?php } ?>
    				</section>
    			</div>
    		</div>
    	</section>
    </section>