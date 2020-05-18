<!-- Custom CSS -->
<link rel="stylesheet" href="Public/css/CustomCSS/indexCSS.css">

<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
                    <li class="active">آمار های فروشگاه</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <!-- page start-->
        <div class="tab-content">
            <div class="tab-pane active" id="morris">
                <div class="row">
                    <!-- Buying Static Start!-->
                    <div class="col-lg-6">
                        <section class="panel">
                            <header class="panel-heading" style="color: green;">
                                <i class="livicon" data-name="credit-card" data-size="25" data-color="green" data-onparent="true"></i>
                                آمار خرید های وب سایت
                            </header>
                            <div class="panel-body">
                                <div class="chart">تعداد کل خرید های انجام شده از وب سایت (<?= count($list_basket) ?>)</div>
                                <div class="chart">مجموع خرید های مشتریان تا به این لحظه (<?= number_format($list_buy_all->all_price) . " تومان" ?>)</div>
                                <div class="chart">
                                    3 خرید کننده برتر به همراه مبلغ خرید
                                    <ul style="display:table-cell;">
                                        <?php foreach ($list_buy as $item) : ?>
                                            <li>
                                                <?= number_format($item->sum_price) . " تومان"; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- Buying Static End !-->

                    <!--  User Static Start !-->
                    <div class="col-lg-6">
                        <section class="panel">
                            <header class="panel-heading" style="color:#6f15c8">
                                <i class="livicon" data-name="users" data-size="22" data-color="#6f15c8" data-onparent="true"></i>
                                آمار کاربران
                            </header>
                            <div class="panel-body">
                                <div class="chart">
                                    تعداد کاربران وب سایت تا این لحظه (<?= $list_user ?>)
                                    <a href="users">مشاهده کل کاربران</a>
                                </div>
                                <div class="chart">
                                    تعداد کاربرانی که سبد خرید خود را نهایی نکرده اند(<?= $user_dontPay ?>)
                                    <a href="users/dontpay">مشاهده</a>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!--  User Static End !-->

                    <!--  Product Static Start!-->
                    <div class="col-lg-6">
                        <section class="panel">
                            <header class="panel-heading customing">
                                <i class="livicon" data-name="shopping-cart" data-size="22" data-color="#9f0000" data-onparent="true"></i>
                                آمار محصولات
                            </header>
                            <div class="panel-body">
                                <div class="chart">
                                    تعداد انواع محصولات وب سایت (<?= count($list_product) . " عدد"; ?>)
                                </div>

                                <div class="chart">
                                    <div class="top_product">
                                        <b class="alia">پرفروش ترین محصولات (تعداد) </b>
                                        <?php
                                        $product_count_item = $product_class->product_statistics("count");
                                        $number = 1;
                                        foreach ($product_count_item as $product_count) :
                                            $product_count_name = $product_class->product_info($product_count->product_id);
                                        ?>
                                            <div class="Item_product">
                                                <div class="Item-product-title">
                                                    نام محصول:
                                                    <a href="../index.php?c=product&a=details&id=<?php echo $product_count_name->id; ?>">
                                                        (<?php echo $product_count_name->title; ?>)
                                                    </a>
                                                    <span style="display:block;">تعداد فروش رفته از این محصول (<?php echo ($product_count->count_product . " عدد"); ?>)</span>
                                                </div>
                                                <div class="max_product_img">
                                                    <a target="_blank" href="../index.php?c=product&a=details&id=<?php echo $product_count_name->id; ?>">
                                                        <div style="color:white;"><?php echo "رتبه " . $number; ?></div>
                                                        <img class="max_pay" src="<?php echo "../" . $product_count_name->images; ?>">
                                                    </a>
                                                </div>
                                            </div>
                                        <?php $number++;
                                        endforeach;
                                        ?>
                                    </div>
                                </div>

                            </div>
                        </section>
                    </div>
                    <!--  Product Static End!-->

                </div> <!-- Div Class Row End !-->

            </div>

     

        </div>
        <!-- page end-->


    </section>
</section>