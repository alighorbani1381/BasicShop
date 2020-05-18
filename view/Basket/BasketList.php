


    



	<style>table td{
		text-align: center !important;
	}
	div{font-family:IRANSANSWEB !important;}
	</style>
	
	<div id="container">
    <div class="container">
      <!-- Breadcrumb Start-->
      <ul class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i></a></li>
        <li><a href="cart.html">سبد خرید</a></li>
      </ul>
      <!-- Breadcrumb End-->
      <div class="row">
        <!--Middle Part Start-->
		<?php
		$sum_of_product=0;
		$final_off=0;
		$basket_list=$class->basket_list($user_id);
		$number=count($basket_list);
		 if($number!=0):    
		?>
        <div id="content" class="col-sm-12">
          <h1 class="title">سبد خرید</h1>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td class="text-center">تصویر</td>
                    <td class="text-left">نام محصول</td>
                    <td class="text-left">درصد تخفیف</td>
                    <td class="text-left">تعداد</td>
                    <td class="text-right">قیمت واحد</td>
                    <td class="text-right">کل</td>
                  </tr>
                </thead>
                <tbody>
				<?php 	foreach($basket_list as $product):
					$product_Item=$class->product_info($product->product_id);
					$price=$class->CalculateOff($product_Item->price, $product_Item->off);
						?>
                  <tr>
                    <td class="text-center">
						<a href="index.php?c=product&a=details&id=<?= $product_Item->id;?>">
							<img src="<?= $product_Item->images ?>" alt="<?= $product_Item->title ?>" title="<?= $product_Item->title ?>" class="img-thumbnail" style="width: 95px;">
						</a>
					</td>
					
                    <td class="text-left">
						<a href="product.html"><?= $product_Item->title ?></a><br>
                     </td>
					 
                    <td class="text-left">% <?= $product_Item->off ?> </td>
                    <td class="text-left"><div class="input-group btn-block quantity">
                        <input type="text" name="quantity" value="<?= $product->count ?>" size="1" class="form-control">
                        <span class="input-group-btn">
                        <button type="submit" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="بروزرسانی"><i class="fa fa-refresh"></i></button>
                       <form method="post" action="index.php?c=basket&a=delete&id=<?=$product->id;?>">
								<button type="submit" data-toggle="tooltip" title="" class="btn btn-danger" onclick="" data-original-title="حذف"><i class="fa fa-times-circle"></i></button>
					   </form>
                        </span></div>
					</td>
					
                    <td class="text-right"><?= number_format($product_Item->price) ?> تومان</td>
                    <td class="text-right"><?= number_format($product_Item->price*$product->count) ?> تومان</td>
                  </tr>
                 
				  <?php 
$sum_of_product=$sum_of_product+$product_Item->price;
$final_off=$final_off+$price['off_price'];
endforeach;
?>

                </tbody>
              </table>
            </div>
          <h2 class="subtitle">حالا مایلید چه کاری انجام دهید؟</h2>
          <p>در صورتی که کد تخفیف در اختیار دارید میتوانید از آن در اینجا استفاده کنید.</p>
          <div class="row">
            <div class="col-sm-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">استفاده از کوپن تخفیف</h4>
                </div>
                <div id="collapse-coupon" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <label class="col-sm-4 control-label" for="input-coupon">کد تخفیف خود را در اینجا وارد کنید</label>
                    <div class="input-group">
                      <input type="text" name="coupon" value="" placeholder="کد تخفیف خود را در اینجا وارد کنید" id="input-coupon" class="form-control">
                      <span class="input-group-btn">
                      <input type="button" value="اعمال کوپن" id="button-coupon" data-loading-text="بارگذاری ..." class="btn btn-primary">
                      </span></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">استفاده از کارت هدیه</h4>
                </div>
                <div id="collapse-voucher" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <label class="col-sm-4 control-label" for="input-voucher">کد کارت هدیه را در اینجا وارد کنید</label>
                    <div class="input-group">
                      <input type="text" name="voucher" value="" placeholder="کد کارت هدیه را در اینجا وارد کنید" id="input-voucher" class="form-control">
                      <span class="input-group-btn">
                      <input type="submit" value="اعمال کارت هدیه" id="button-voucher" data-loading-text="بارگذاری ..." class="btn btn-primary">
                      </span> </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">پیش بینی هزینه ی حمل و نقل و مالیات</h4>
            </div>
            <div id="collapse-shipping" class="panel-collapse collapse in">
              <div class="panel-body">
                <p>مقصد خود را جهت براورد هزینه ی 0 تومان وارد کنید.</p>
                <form class="form-horizontal">
                  <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-zone">شهر / استان</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="input-zone" name="zone_id">
                        <option value=""> --- لطفا انتخاب کنید --- </option>
                        <option value="09">Western Isles</option>
                        <option value="10">Wiltshire</option>
                        <option value="11">Worcestershire</option>
                        <option value="12">Wrexham</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-postcode">کد پستی</label>
                    <div class="col-sm-10">
                      <input type="text" name="postcode" value="" placeholder="کد پستی" id="input-postcode" class="form-control">
                    </div>
                  </div>
                  <input type="button" value="دریافت پیش فاکتور" id="button-quote" data-loading-text="بارگذاری ..." class="btn btn-primary">
                </form>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4 col-sm-offset-8">
              <table class="table table-bordered">
                <tbody><tr>
                  <td class="text-right"><strong>جمع کل:</strong></td>
                  <td class="text-right"> <?= number_format($sum_of_product) ?> تومان</td>
                </tr>
                <tr>
                  <td class="text-right"><strong>کسر هدیه (تخفیف):</strong></td>
                  <td class="text-right"><?= number_format($final_off) ?> تومان</td>
                </tr>
                <tr>
                  <td class="text-right"><strong>کل :</strong></td>
                  <td class="text-right"> <?= number_format($sum_of_product-$final_off) ?> تومان</td>
                </tr>
              </tbody></table>
            </div>
          </div>
          <div class="buttons">
            <div class="pull-left"><a href="index.html" class="btn btn-default">ادامه خرید</a></div>
            <div class="pull-right"><a href="checkout.html" class="btn btn-primary">تسویه حساب</a></div>
          </div>
		  <?php else:?>
		 سبد خرید شما خالی است
		  <?php endif;?>
        </div>
        <!--Middle Part End -->
      </div>
    </div>
  </div>