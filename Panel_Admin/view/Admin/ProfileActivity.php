<style>
    h1,
    h2,
    h3,
    h4,
    p {
        font-family: IRANSANSWEB !important;
    }
</style>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <aside class="profile-nav col-lg-3">
                <section class="panel">
                    <div class="user-heading round">
                        <a href="#">
                            <img src="Public/img/profile-avatar.jpg" alt="">
                        </a>
                        <h1><?php echo $info->name . " " . $info->lastname; ?></h1>
                        <p><?php echo $info->email; ?></p>
                    </div>

                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="Profile"><i class="icon-user"></i>پروفایل</a></li>
                        <li class="active"><a href="Profile/Activity/"><i class="icon-calendar"></i>فعالیت ها اخیر<span class="label label-danger pull-right r-activity">9</span></a></li>
                        <li><a href="Profile/Edit/<?php echo $info->id; ?>"><i class="icon-edit"></i>ویرایش پروفایل</a></li>
                    </ul>

                </section>
            </aside>
            <aside class="profile-info col-lg-9">

                <section class="panel">
                    <div class="panel-body profile-activity">
                        <h5 class="pull-right">لیست برنامه های شما</h5>
                        <!-- 
								activity terques
								activity alt purple
								activity blue
								activity alt green
								!-->

                        <?php
                        $step = 0;
                        foreach ($plans as $plan) :
                            $date = $manageData->explodeDateTime($plan->created_at);
                            $Hejri_Date = gregorian_to_jalali($date['year'], $date['month'], $date['day'], "/");
                            $step++; ?>
                            <div class="activity<?php if ($step % 2 == 0) echo " alt "; ?> blue">
                                <span>
                                    <i class="icon-bullhorn"></i>
                                </span>
                                <div class="activity-desk">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="arrow"></div>
                                            <i class="icon-calendar"></i>
                                            <h4><?= $Hejri_Date ?></h4>
                                            <br>
                                            <i class=" icon-time"></i>
                                            <h4><?= $date['time'] ?></h4>
                                            <p><?= $plan->text ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>


                    </div>
                </section>

                <section class="panel">
                    <header class="panel-heading summary-head">
                        <h4>گزارش فعالیت های شما</h4>
                        <p>18 بهمن 1398</p>
                    </header>
                    <div class="panel-body">
                        <ul class="summary-list">
                            <li>
                                <a href="javascript:;">
                                    <i class=" icon-shopping-cart text-primary"></i>
                                    1 Purchase
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="icon-envelope text-info"></i>
                                    15 ایمیل جدید
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class=" icon-picture text-muted"></i>
                                    آپلود 2 عکس
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="icon-tags text-success"></i>
                                    19 خرید
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="icon-microphone text-danger"></i>
                                    4 صدا
                                </a>
                            </li>
                        </ul>
                    </div>
                </section>


                <div class="text-center">
                    <a class="btn btn-danger" href="javascript:;">Load Old Activities</a>
                </div>
            </aside>
        </div>

        <!-- page end-->
    </section>
</section>