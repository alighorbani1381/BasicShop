<style>.custom-error{margin-top:8px;}</style>
<div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="login.html">حساب کاربری</a></li>
        <li><a href="register.html">ثبت نام</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
        <div class="col-sm-9" id="content">
          <h1 class="title">ثبت نام حساب کاربری</h1>
          <p>اگر قبلا حساب کاربریتان را ایجاد کرد اید جهت ورود به <a href="login.html">صفحه لاگین</a> مراجعه کنید.</p>
          <form class="form-horizontal" method="post" action="">
            <fieldset id="account">
              <legend>اطلاعات شخصی شما</legend>
              <div style="display: none;" class="form-group required">
                <label class="col-sm-2 control-label">گروه مشتری</label>
                <div class="col-sm-10">
                  <div class="radio">
                    <label>
                      <input type="radio" checked="checked" value="1" name="customer_group_id">
                      پیشفرض</label>
                  </div>
                </div>
              </div>
              <div class="form-group required">
                <label for="input-firstname" class="col-sm-2 control-label">نام</label>
                <div class="col-sm-10">
                  <input type="text" name="name"  class="form-control" id="input-firstname" placeholder="نام" value="<?php Old('name') ?>" >
					<div class="custom-error"> <?php FirstError('name'); ?></div>
                </div>
              </div>

              <div class="form-group required">
                <label for="input-lastname" class="col-sm-2 control-label">نام خانوادگی</label>
                <div class="col-sm-10">
                  <input type="text" name="lastname" class="form-control" id="input-lastname" placeholder="نام خانوادگی" value="<?php Old('lastname'); ?>" >
					<div class="custom-error"> <?php FirstError('lastname'); ?></div>
                </div>
              </div>

              <div class="form-group required">
                <label for="input-email" class="col-sm-2 control-label">آدرس ایمیل</label>
                <div class="col-sm-10">
                  <input type="email" name="email" class="form-control" id="input-email" placeholder="آدرس ایمیل"  value="<?php Old('email','show')?>" >
			<div class="custom-error"> <?php FirstError('email'); ?></div>
                </div>
              </div>
		
              <div class="form-group required">
                <label for="input-telephone" class="col-sm-2 control-label">شماره تلفن</label>
                <div class="col-sm-10">
                  <input type="tel" class="form-control" id="input-telephone" placeholder="شماره تلفن" value="" name="telephone">
                </div>
              </div>
<!--
            </fieldset>
            <fieldset id="address">
              <legend>آدرس</legend>
              <div class="form-group">
                <label for="input-company" class="col-sm-2 control-label">شرکت</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-company" placeholder="شرکت" value="" name="company">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-address-1" class="col-sm-2 control-label">آدرس 1</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-address-1" placeholder="آدرس 1" value="" name="address_1">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-city" class="col-sm-2 control-label">شهر</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-city" placeholder="شهر" value="" name="city">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-postcode" class="col-sm-2 control-label">کد پستی</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="input-postcode" placeholder="کد پستی" value="" name="postcode">
                </div>
              </div>
              <div class="form-group required">
                <label for="input-country" class="col-sm-2 control-label">کشور</label>
                <div class="col-sm-10">
                  <select class="form-control" id="input-country" name="country_id">
                    <option value=""> --- لطفا انتخاب کنید --- </option>
                    <option value="244">Aaland Islands</option>
                    <option value="1">Afghanistan</option>
                    <option value="2">Albania</option>
                    <option value="32">Brunei Darussalam</option>
                    <option value="239">Zimbabwe</option>
                  </select>
                </div>
              </div>
              <div class="form-group required">
                <label for="input-zone" class="col-sm-2 control-label">شهر / استان</label>
                <div class="col-sm-10">
                  <select class="form-control" id="input-zone" name="zone_id">
                    <option value="3611">Worcestershire</option>
                    <option value="3612">Wrexham</option>
                  </select>
                </div>
              </div>
            </fieldset>
				!-->
            <fieldset>

              <legend>رمز عبور شما</legend>
              <div class="form-group required">
                <label for="input-password" class="col-sm-2 control-label">رمز عبور</label>
                <div class="col-sm-10">
                  <input type="password"  name="password" class="form-control" id="input-password" placeholder="رمز عبور" value="<?php Old('password') ?>" >
					<div class="custom-error"> <?php FirstError('password'); ?></div>
                </div>
              </div>

              <div class="form-group required">
                <label for="input-confirm" class="col-sm-2 control-label">تکرار رمز عبور</label>
                <div class="col-sm-10">
                  <input type="password" name="confirm" class="form-control" id="input-confirm" placeholder="تکرار رمز عبور" value="" >
                </div>
              </div>
            </fieldset>
<!--
            <fieldset>
              <legend>خبرنامه</legend>
              <div class="form-group">
                <label class="col-sm-2 control-label">اشتراک</label>
                <div class="col-sm-10">
                  <label class="radio-inline">
                    <input type="radio" value="1" name="newsletter">
                    بله</label>
                  <label class="radio-inline">
                    <input type="radio" checked="checked" value="0" name="newsletter">
                    نه</label>
                </div>
              </div>
            </fieldset>
!-->
            <div class="buttons">
              <div class="pull-right">
                <input type="checkbox" value="1" name="agree">
                &nbsp;من <a class="agree" href="#"><b>سیاست حریم خصوصی</b> را خوانده ام و با آن موافق هستم</a> &nbsp;
                <input type="submit" name="submit" class="btn btn-primary" value="ثبت نام">
              </div>
            </div>
          </form>
        </div>
        <!--Middle Part End -->
        <!--Right Part Start -->
        <aside id="column-right" class="col-sm-3 hidden-xs">
          <h3 class="subtitle">حساب کاربری</h3>
          <div class="list-group">
            <ul class="list-item">
              <li><a href="login.html">ورود</a></li>
              <li><a href="register.html">ثبت نام</a></li>
              <li><a href="#">فراموشی رمز عبور</a></li>
              <li><a href="#">حساب کاربری</a></li>
              <li><a href="#">لیست آدرس ها</a></li>
              <li><a href="wishlist.html">لیست علاقه مندی</a></li>
              <li><a href="#">تاریخچه سفارشات</a></li>
              <li><a href="#">دانلود ها</a></li>
              <li><a href="#">امتیازات خرید</a></li>
              <li><a href="#">بازگشت</a></li>
              <li><a href="#">تراکنش ها</a></li>
              <li><a href="#">خبرنامه</a></li>
              <li><a href="#">پرداخت های تکرار شونده</a></li>
            </ul>
          </div>
        </aside>
        <!--Right Part End -->
      </div>
    </div>
  </div>
	<?php 
	ResetEngine();
	?>
