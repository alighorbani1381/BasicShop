    <style>
    	.add_slider {
    		transition: 1s;
    		background-color: #099157;
    		border-radius: 3px;
    		width: 35px;
    		border: none;
    		color: whitesmoke;
    		margin: 0 2%;
    		padding: 3px;
    	}

    	.add_slider:hover {
    		transition: 1s;
    		background-color: #046f41;
    		margin: 0 3%;
    		color: white;
    	}

    	.product-profile {
    		transition: 0.7s;
    		width: 30px;
    		height: 30px;
    	}

    	.product-profile:hover {
    		transition: 0.7s;
    		width: 50px;
    		height: 50px;
    	}

    	.editing:hover {
    		margin: 10px;
    	}
    </style>
    <section id="main-content">
    	<section class="wrapper">
    		<div class="row">
    			<div class="col-lg-12">
    				<section class="panel">
    					<header class="panel-heading">
    						<li class="icon-laptop"></li>
    						لیست اسلایدر ها شما
    						<span>
    							<a class="add_slider" href="settings/slider/add">
    								افزودن
    								<li class="icon-plus-sign-alt"></li>
    							</a>

    						</span>
    					</header>
    					<table class="table table-striped table-advance table-hover">
    						<thead>
    							<tr>
    								<th>عنوان</th>
    								<th>توضیح کوتاه</th>
    								<th>لینک به دسته بندی</th>
    								<th>تصویر</th>
    								<th>ویرایش</th>
    								<th>حذف</th>
    							</tr>
    						</thead>
    						<tbody>
    							<?php foreach ($row as $value) :
									//$level_two_procat=$class->sup_product($value->procat);
									// $level_one_procat=$class->sup_procat($level_two_procat->chid);
								?>

    								<tr>
    									<td><?php echo $value->title; ?></td>
    									<td><?php echo $value->text; ?></td>
    									<td style="font-size:12px;"><? php // echo $level_one_procat->title."/".$level_two_procat->title;
																	?></td>
    									<td><img class="product-profile" alt="موردی برای نمایش وجود ندارد" src="<?php echo "../" . $value->image; ?>"></td>
    									<td><a href="?c=settings&a=edit_slider&id=<?php echo $value->id; ?>" class="btn btn-primary btn-xs"><i class="icon-pencil"></i></a></td>
    									<td><a href="?c=settings&a=delete_slider&id=<?php echo $value->id; ?>" class="btn btn-danger btn-xs"><i class="icon-trash "></i></a></td>
    								</tr>
    							<?php
								endforeach;
								?>

    						</tbody>
    					</table>
    				</section>
    			</div>
    		</div>
    	</section>
    </section>