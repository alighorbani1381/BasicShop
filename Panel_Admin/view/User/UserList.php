    <style>
    	.product-profile {
    		width: 30px;
    		height: 30px;
    	}
    </style>
    <section id="main-content">
    	<section class="wrapper">
    		<div class="row">
    			<div class="col-lg-12">
    				<section class="panel">
    					<header class="panel-heading">
    						<li class="icon-bar-chart"></li>
    						لیست کاربران سایت (<?php echo $UserCount; ?>)

    					</header>
    					<table class="table table-striped table-advance table-hover">
    						<thead>
    							<tr>
    								<th>نام مشتری</th>
    								<th>نام خانوادگی</th>
    								<th>شماره تماس مشتری</th>
    								<th>ایمیل مشتری</th>
    								<th> حذف</th>
    								<th> فعالیت</th>
    							</tr>
    						</thead>
    						<tbody>

    							<?php foreach ($PaginateUser['data'] as $user) : ?>
    								<tr>
    									<td><?php echo $user->name; ?></td>
    									<td><?php echo $user->lastname; ?></td>
    									<td><?php echo $user->phone; ?></td>
    									<td><?php echo $user->email; ?></td>
    									<td><a href="users/delete/<?php echo $user->id; ?>" class="btn btn-danger btn-xs actionbtn"><i class="icon-trash "></i></a></td>
    									<td><a href="users/activity/<?php echo $user->id; ?>" class="btn btn-success btn-xs actionbtn"><i class="icon-bar-chart"></i></a></td>
    								</tr>
    							<?php endforeach; ?>

    						</tbody>
    					</table>

    					<!-- Pagination Likns Start !-->
    					<div>
    						<?php $manageData->PaginationLinks(6, "users_tbl"); ?>
    					</div>
    					<!-- Pagination Likns End !-->

    				</section>
    			</div>
    		</div>
    	</section>
    </section>