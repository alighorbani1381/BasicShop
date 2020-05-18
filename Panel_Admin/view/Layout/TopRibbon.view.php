        <?php
        require_once('Model/AdminModel.php');
        $admin = new admin_functions();
        $info = $admin->ProfileAdmin();
        $plans = $admin->AdminPlans($_SESSION['admin']);
        ?>
        <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips ic"></div>
            </div>
            <!--logo start-->
            <a href="#" class="logo">پنل مدیریت |<span> خوش آمدید </span></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-tasks"></i>
                            <span class="badge bg-success"><?= count($plans); ?></span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">
                                    شما
                                    <?php echo count($plans); ?>
                                    برنامه در دست دارید
                                </p>
                            </li>
                            <?php foreach ($plans as $plan) : ?>
                                <li>
                                    <a href="#">
                                        <div class="task-info">
                                            <div class="desc"><?php echo $plan->title; ?></div>
                                            <div class="percent"><?php echo $plan->status; ?></div>
                                            <?php
                                            $status = $plan->status;
                                            if ($status >= 0 && $status <= 25)
                                                $attr = "progress-bar-info";
                                            elseif ($status >= 25 && $status <= 50)
                                                $attr = "progress-bar-success";
                                            elseif ($status >= 50 && $status <= 75)
                                                $attr = "progress-bar-warning";
                                            elseif ($status >= 75 && $status <= 99)
                                                $attr = "progress-bar-danger";
                                            ?>
                                        </div>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar <?= $attr ?>" role="progressbar" aria-valuenow="<?= $plan->status; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $plan->status . "%"; ?>">
                                                <span class="sr-only">45% Complete</span>
                                            </div>
                                        </div>

                                    </a>
                                </li>
                            <?php endforeach; ?>
                            <li class="external">
                                <a href="Profile/Activity/<?= $_SESSION['admin'] ?>">برنامه های بیشتر</a>
                            </li>
                        </ul>
                    </li>
                    <!-- settings end -->

                    <!-- notification dropdown start-->
                    <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <?php
                            require_once("model/OrderModel.php");
                            $class = new order();
                            $row = $class->order_list();
                            $number_of_wait = count($row);
                            ?>
                            <i class="icon-bell-alt"></i>
                            <span class="badge bg-warning"><?php echo $number_of_wait; ?></span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-yellow"></div>
                            <li>

                                <p class="yellow">شما به (<?php echo $number_of_wait; ?>) عدد سفارش جدید دارید</p>
                            </li>

                            <li>
                                <a href="index.php?c=order&a=order_list_wait">پیگیری سفارشات </a>
                            </li>
                        </ul>
                    </li>
                    <!-- notification dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder="Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="Public/img/avatar1_small.jpg">
                            <span class="username"><?php echo $info->name . " " . $info->lastname; ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="Profile"><i class=" icon-suitcase"></i>پروفایل</a></li>
                            <li><a href="#"><i class="icon-cog"></i>تنظیمات</a></li>
                            <li><a href="#"><i class="icon-bell-alt"></i>اعلام ها</a></li>
                            <li><a href="Logout"><i class="icon-key"></i>خروج</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>