<?php
var_dump($Activities);
?>
<style>
    .customing {
        color: #9f0000;
    }

    .chart {
        margin-bottom: 2EM;
        text-align: right;
        font-family: IRANSANSWEB;
    }

    .panel-heading {
        font-weight: bold;
        font-size: 19px;
        font-family: IRANSANSWEB;
    }

    .max_pay {
        width: 105px;
        height: 105px;
        display: inline;
        position: relative;
        margin: 0 auto;
        box-shadow: 1px 1px 7px #d5d5d5;
    }

    .top_product {
        padding-bottom: 19px;
        border: 3px dashed#d71951;
        margin-bottom: 0 auto;
        padding-right: 7px;
    }

    .alia {
        display: block;
        color: #424040;
        font-size: large;
        margin-top: 10px;
    }

    .max_product_img {
        background-color: #e32274;
        text-align: center;
        display: inline-block;
        margin-right: 43%;
    }

    .Item_product {
        margin: 0 auto;
    }
</style>

<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
                    <li class="active">آمار مشتری <?php echo $Activities['buy'][0]->user_id; ?> </li>
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
                                <li class="icon-credit-card"></li>
                                آمار خرید های
                                <?php echo $Activities['buy'][0]->user_id; ?>
                            </header>
                            <div class="panel-body">
                                <?php
                                foreach ($Activities['buy'] as $buy) {
                                    $total += $buy->price;
                                    $total_count += $buy->count;
                                    $date = $buy->date;
                                }

                                ?>
                                <div class="chart">تعداد کل خرید های انجام شده از وب سایت (<?php echo count($Activities['buy']); ?>)</div>
                                <div class="chart">مجموع خرید تا الان (<?php echo number_format($total) . " تومان"; ?>)</div>
                        </section>
                    </div>
                    <!-- Buying Static End !-->


                    <!--  Product Static Start!-->
                    <div class="col-lg-6">
                        <section class="panel">
                            <header class="panel-heading customing">
                                <li class="icon-shopping-cart"></li>
                                آمار محصولات خریداری شده
                            </header>
                            <div class="panel-body">
                                <div class="chart">
                                    تعداد محصولات خریداری شده (<?php echo $total_count . " عدد"; ?>)
                                </div>
                                <div class="chart">
                                    آخرین تاریخ خرید (<?php echo $date; ?>)
                                </div>

                                <div class="chart">
                                    <div class="top_product">
                                        <b class="alia">پرطرفدار ترین </b>
                                        <?php
                                        /*$product_count_item=$product_class->product_statistics("count");
										$number=1;
										foreach($product_count_item as $product_count):
										$product_count_get_name=$product_class->product_info($product_count->product_id);
										foreach($product_count_get_name as $product_count_name):*/
                                        ?>
                                        <div class="Item_product">
                                            نام محصول:
                                            <a href="../index.php?c=product&a=details&id=<? php // echo$product_count_name->id; 
                                                                                            ?>">
                                                (<? php // echo $product_count_name->title;
                                                    ?>)
                                            </a>
                                            <div class="max_product_img">
                                                <a target="_blank" href="../index.php?c=product&a=details&id=<?php echo $product_count_name->id; ?>">
                                                    <div style="color:white;"><? php //echo "رتبه ".$number;
                                                                                ?></div>
                                                    <img class="max_pay" src="<? php // echo "../".$product_count_name->images;
                                                                                ?>">
                                                </a>
                                            </div>
                                            <span style="display:block;">تعداد فروش رفته از این محصول (<? php // echo($product_count->count_product." عدد");
                                                                                                        ?>)</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </section>
                    </div>
                    <!--  Product Static End!-->

                </div> <!-- Div Class Row End !-->

                <div class="row">

                    <!--  User Static Start !-->
                    <div class="col-lg-6">
                        <section class="panel">
                            <header class="panel-heading" style="color:#6f15c8">
                                <li class="icon-group"></li>
                                آمار فعالیت ها در سایت
                            </header>
                            <div class="panel-body">
                                <div class="chart">تعداد کامنت های ثبت شده </div>
                            </div>
                        </section>
                    </div>
                    <!--  User Static End !-->
                </div>
            </div>

            <div class="tab-pane" id="chartjs">
                <div class="row">
                    <div class="col-lg-6">
                        <section class="panel">
                            <header class="panel-heading">
                                Doughnut

                            </header>
                            <div class="panel-body text-center">
                                <canvas id="doughnut" height="300" width="400"></canvas>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-6">
                        <section class="panel">
                            <header class="panel-heading">
                                Line

                            </header>
                            <div class="panel-body text-center">
                                <canvas id="line" height="300" width="450"></canvas>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <section class="panel">
                            <header class="panel-heading">
                                Radar

                            </header>
                            <div class="panel-body text-center">
                                <canvas id="radar" height="300" width="400"></canvas>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-6">
                        <section class="panel">
                            <header class="panel-heading">
                                Polar Area

                            </header>
                            <div class="panel-body text-center">
                                <canvas id="polarArea" height="300" width="400"></canvas>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <section class="panel">
                            <header class="panel-heading">
                                Bar

                            </header>
                            <div class="panel-body text-center">
                                <canvas id="bar" height="300" width="500"></canvas>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-6">
                        <section class="panel">
                            <header class="panel-heading">
                                Pie

                            </header>
                            <div class="panel-body text-center">
                                <canvas id="pie" height="300" width="400"></canvas>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="sparkline">
                <div class="row">
                    <div class="col-lg-4">
                        <!--total earning start-->
                        <div class="panel green-chart">
                            <div class="panel-body">
                                <div class="chart">
                                    <div class="heading">
                                        <span>June</span>
                                        <strong>23 Days | 65%</strong>
                                    </div>
                                    <div id="barchart"></div>
                                </div>
                            </div>
                            <div class="chart-tittle">
                                <span class="title">Total Earning</span>
                                <span class="value">$, 76,54,678</span>
                            </div>
                        </div>
                        <!--total earning end-->
                    </div>
                    <div class="col-lg-4">
                        <!--new earning start-->
                        <div class="panel terques-chart">
                            <div class="panel-body chart-texture">
                                <div class="chart">
                                    <div class="heading">
                                        <span>Friday</span>
                                        <strong>$ 57,00 | 15%</strong>
                                    </div>
                                    <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="300%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564]"></div>
                                </div>
                            </div>
                            <div class="chart-tittle">
                                <span class="title">New Earning</span>
                                <span class="value">
                                    <a href="#" class="active">Market</a>
                                    |

                                    <a href="#">Referal</a>
                                    |

                                    <a href="#">Online</a>
                                </span>
                            </div>
                        </div>
                        <!--new earning end-->
                    </div>
                    <div class="col-lg-4">
                        <section class="panel">
                            <header class="panel-heading">
                                Pie

                            </header>
                            <div class="panel-body text-center">
                                <div class="inline-block">
                                    <div id="pie-chart2" style="width: 150px; height: 128px"></div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

        </div>
        <!-- page end-->


    </section>
</section>