<!--main content start-->
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
                        <li class="active"><a href="Profile"><i class="icon-user"></i>پروفایل</a></li>
                        <li><a href="Profile/Activity/<?php echo $info->id; ?>"><i class="icon-calendar"></i>فعالیت ها اخیر<span class="label label-danger pull-right r-activity">9</span></a></li>
                        <li><a href="Profile/Edit/<?php echo $info->id; ?>"><i class="icon-edit"></i>ویرایش پروفایل</a></li>
                    </ul>

                </section>
            </aside>

            <aside class="profile-info col-lg-9">
                <section class="panel">
                    <div class="bio-graph-heading">
                        <h2>اطلاعات شما</h2>
                    </div>
                    <div class="panel-body bio-graph-info">
                        <h1>بیوگرافی</h1>
                        <div class="row">
                            <div class="bio-row">
                                <p><span>نام</span><?php echo $info->name; ?></p>
                            </div>
                            <div class="bio-row">
                                <p><span>نام خانوادگی</span><?php echo $info->lastname; ?></p>
                            </div>
                            <div class="bio-row">
                                <p><span>شهر</span><?php echo $info->city; ?></p>
                            </div>
                            <div class="bio-row">
                                <p><span>تاریخ تولد</span><?php echo $info->birthday; ?></p>
                            </div>
                            <div class="bio-row">
                                <p><span>سمت یا شغل </span><?php echo $info->job; ?></p>
                            </div>
                            <div class="bio-row">
                                <p><span>ایمیل </span><?php echo $info->email; ?></p>
                            </div>
                            <div class="bio-row">
                                <p><span>شماره موبایل </span><?php echo $info->mobile; ?></p>
                            </div>
                            <div class="bio-row">
                                <p><span>شماره ثابت </span><?php echo $info->phone; ?></p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="panel">
                    <form action="Plan/Store" method="post">


                        <label for="inputEmail1" class="col-lg-2 control-label">عنوان کار</label>
                        <div class="col-lg-10">
                            <input type="text" name="title" class="form-control" id="inputEmail1" placeholder="Email" style="background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: left center; cursor: auto;" autocomplete="off">
                        </div>


                        <textarea name="text" placeholder="برنامه یا کاری که قرار است انجام دهید ..." rows="2" class="form-control input-lg p-text-area"></textarea>

                        <footer class="panel-footer">
                            <button type="submit" name="SubmitPlan" class="btn btn-success pull-right">افزودن برنامه</button>
                            <ul class="nav nav-pills">
                                <li>
                                    <a href="#"><i class="icon-camera"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class=" icon-film"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="icon-microphone"></i></a>
                                </li>
                            </ul>
                        </footer>
                    </form>
                </section>
            </aside>
        </div>

        <!-- page end-->
    </section>
</section>
<!--main content end-->
</section>