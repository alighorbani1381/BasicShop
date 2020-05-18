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
                        <li><a href="Profile"><i class="icon-user"></i>پروفایل</a></li>
                        <li><a href="profile-activity.html"><i class="icon-calendar"></i>فعالیت های اخیر<span class="label label-danger pull-right r-activity">9</span></a></li>
                        <li class="active"><a><i class="icon-edit"></i>ویرایش پروفایل</a></li>
                    </ul>

                </section>
            </aside>
            <aside class="profile-info col-lg-9">
                <section class="panel">
                    <div class="bio-graph-heading">
                        متنی در مورد ویرایش پروفایل در اینجا نوشته خواهد شد

                    </div>
                    <div class="panel-body bio-graph-info">
                        <h1>اطلاعات پروفایل</h1>
                        <form method="post" action="" class="form-horizontal" role="form">

                            <div class="form-group">
                                <label class="col-lg-2 control-label">نام</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="f-name" placeholder=" " name="name" value="<?php OldEdit('name', $admin_info->name); ?>">
                                    <?php FirstError('name'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">نام خانوادگی</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="l-name" placeholder=" " name="lastname" value="<?php OldEdit('lastname', $admin_info->lastname); ?>">
                                    <?php FirstError('lastname'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">شهر</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="c-name" placeholder=" " name="city" value="<?php OldEdit('city', $admin_info->city); ?>">
                                    <?php FirstError('city'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">تاریخ تولد</label>
                                <div class="col-lg-6">
                                    <input type="date" class="form-control" id="b-day" placeholder=" " name="birthday" value="<?php OldEdit('birthday', $admin_info->birthday); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">سمت یا شغل</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="occupation" placeholder=" " name="job" value="<?php OldEdit('job', $admin_info->job); ?>">
                                    <?php FirstError('job'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">ایمیل</label>
                                <div class="col-lg-6">
                                    <input type="email" class="form-control" id="email" placeholder=" " name="email" value="<?php OldEdit('email', $admin_info->email); ?>">
                                    <?php FirstError('email'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">شماره موبایل</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="mobile" placeholder=" " name="mobile" value="<?php OldEdit('mobile', $admin_info->mobile); ?>">
                                    <?php FirstError('mobile'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-success" name="update">ذخیره</button>
                                    <button type="button" class="btn btn-default">انصراف</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
                <!--
                        <section>
                            <div class="panel panel-primary">
                                <div class="panel-heading">تغییر رمز عبور & تصویر</div>
                                <div class="panel-body">
                                    <form method="post" action=""  enctype="multipart/form-data" class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">رمز عبور فعلی</label>
                                            <div class="col-lg-6">
                                                <input type="password" name="oldpassword" class="form-control" id="c-pwd" placeholder=" ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">رمز عبور جدید</label>
                                            <div class="col-lg-6">
                                                <input type="password" name="newpassword" class="form-control" id="n-pwd" placeholder=" ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">تکرار رمز عبور جدید</label>
                                            <div class="col-lg-6">
                                                <input type="password" name="confirmpassword" class="form-control" id="rt-pwd" placeholder=" ">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">تغییر تصویر</label>
                                            <div class="col-lg-6">
                                                <input type="file" name="profile_picture" class="file-pos" id="exampleInputFile">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" class="btn btn-info">ذخیره</button>
                                                <button type="button" class="btn btn-default">انصراف</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
						!-->
            </aside>
        </div>
        <?php
        ResetEngine();
        ?>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
</section>