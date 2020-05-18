<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="public/image/favicon.png" rel="icon" />
    <title>فروشگاه لیوینگ رووم</title>
    <meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">
    <!-- CSS Part Start-->
    <link rel="stylesheet" type="text/css" href="public/js/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="public/js/bootstrap/css/bootstrap-rtl.min.css" />
    <link rel="stylesheet" type="text/css" href="public/css/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="public/css/stylesheet.css" />
    <link rel="stylesheet" type="text/css" href="public/css/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="public/css/owl.transitions.css" />
    <link rel="stylesheet" type="text/css" href="public/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="public/css/stylesheet-rtl.css" />
    <link rel="stylesheet" type="text/css" href="public/css/responsive-rtl.css" />
    <link rel="stylesheet" type="text/css" href="public/css/stylesheet-skin2.css" />
    <style>
    .welcome {
        color: #959595;
        font-size: 19px;
    }

    .panbtn {
        border-radius: 5px;
        padding: 2px;
        margin: 6px;
        box-shadow: 1px 1px 5px -2px #696666;
    }

    .closepan {
        background: #ad0606;
    }

    .closepan:hover {
        background: #9c0707;
    }

    .panbtn a {
        text-decoration: none !important;
        color: white !important;
    }

    .signup-user {
        background: green;
    }

    .login-user {
        background: #0f4d79;
    }
    </style>
    <!-- CSS Part End-->
</head>

<body>
    <div class="wrapper-wide">
        <div id="header">
            <?php
require_once("Panel_Admin/Model/UserModel.php");
$info=$user->AuthInfo();
?>
            <!-- Top Bar Start-->
            <nav id="top" class="htop" style="border-bottom: 3px solid #f1b304;">
                <div class="container">
                    <div class="row"> <span class="drop-icon visible-sm visible-xs"><i
                                class="fa fa-align-justify"></i></span>

                        <div class="pull-left flip left-top">
                            <br>

                            <?php if($info['login']): ?>
                            <div class="welcome"><?= $info['name']." عزیز خوش آمدید" ?></div>

                            <?php else: ?>
                            <div class="welcome">کاربر عزیز خوش آمدید</div>
                            <?php endif;?>

                        </div>

                        <div id="top-links" class="nav pull-right flip">
                            <ul>

                                <?php if($info['login']){?>
                                <li class="panbtn closepan"><a href="Logout">خروج</a></li>
                                <?php }else{?>
                                <li class="panbtn login-user"><a href="Login">ورود</a></li>
                                <li class="panbtn signup-user"><a href="Signup">ثبت نام</a></li>
                                <?php }?>

                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Top Bar End-->
         
            <!-- Header Start-->
            <header class="header-row">
                <div class="container">
                    <div class="table-container">
                        <!-- Logo Start -->
                        <div class="col-table-cell col-lg-6 col-md-6 col-sm-12 col-xs-12 inner">
                            <div id="logo"><a href="index.html"><img class="img-responsive" src="public/image//logo.png"
                                        title="MarketShop" alt="MarketShop" /></a></div>
                        </div>
                        <!-- Logo End -->
				   <?php
						   if($info['login']):
						  require_once("Panel_Admin/Model/BasketModel.php");
						  require_once("Panel_Admin/Model/ProductModel.php");
						  $product_obj=new product();
						  $Basket_Items=$basket->basket_list($info['id']);
						  ?>
                        <!-- Mini Cart Start-->
                        <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div id="cart">
                                <button type="button" data-toggle="dropdown" data-loading-text="بارگذاری ..."
                                    class="heading dropdown-toggle">
                                    <span class="cart-icon pull-left flip"></span>
                                    <span id="cart-total"><?=count($Basket_Items)?> آیتم</span></button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <table class="table">
                                            <tbody>
                                                <?php 
					foreach($Basket_Items as $Basket_Item):
					$product_item=$product_obj->product_info($Basket_Item->product_id);
					?>
                                                <tr>
                                                    <td class="text-center"><a
                                                            href="index.php?c=product&a=details&id=<?= $product_item->id ?>"><img
                                                                class="img-thumbnail"
                                                                title="<?= $product_item->title ?>"
                                                                alt="<?= $product_item->title ?>"
                                                                src="<?= $product_item->images ?>"></a></td>
                                                    <td class="text-left"><a
                                                            href="index.php?c=product&a=details&id=<?= $product_item->id ?>"><?= $product_item->title ?></a>
                                                    </td>
                                                    <td class="text-right"><?= $Basket_Item->count ?></td>
                                                    <td class="text-right">
                                                        <?= $product_item->price*$Basket_Item->count ?> تومان</td>
                                                    <td class="text-center">
                                                        <form method="post"
                                                            action="index.php?c=basket&a=delete&id=<?=$Basket_Item->id;?>">
                                                            <button class="btn btn-danger btn-xs remove" title="حذف"
                                                                type="submit"><i class="fa fa-times"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </li>
                                    <li>
                                        <div>
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-right"><strong>جمع کل</strong></td>
                                                        <td class="text-right">132000 تومان</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right"><strong>کسر هدیه</strong></td>
                                                        <td class="text-right">4000 تومان</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right"><strong>مالیات</strong></td>
                                                        <td class="text-right">11880 تومان</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right"><strong>قابل پرداخت</strong></td>
                                                        <td class="text-right">139880 تومان</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p class="checkout"><a href="BasketList" class="btn btn-primary"><i
                                                        class="fa fa-shopping-cart"></i> مشاهده
                                                    سبد</a>&nbsp;&nbsp;&nbsp;<a href="checkout.html"
                                                    class="btn btn-primary"><i class="fa fa-share"></i> تسویه حساب</a>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Mini Cart End-->
                        <?php endif;?>
						

                        <!-- جستجو Start-->
                        <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12 inner">
                            <div id="search" class="input-group">
                                <input id="filter_name" type="text" name="search" value="" placeholder="جستجو"
                                    class="form-control input-lg" />
                                <button type="button" class="button-search"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <!-- جستجو End-->
                    </div>
                </div>
            </header>
            <!-- Header End-->
            <!-- Main آقایانu Start-->
            <?php
	require_once("Panel_Admin/model/ProcatModel.php");
  $procat=new procat();
	$Main_Menus=$procat->mainProcats();
	?>
            <nav id="menu" class="navbar">
                <div class="navbar-header"> <span class="visible-xs visible-sm"> منو <b></b></span></div>
                <div class="container">
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav">
                            <li><a class="home_link" title="خانه" href="index.html">صفحه اصلی</a></li>
                            <?php
			foreach($Main_Menus as $Main_Menu): 
			$SubMenus=$procat->subMenu($Main_Menu->id);
			?>
                            <li class="dropdown">
                                <a href="#"><?= $Main_Menu->title ?></a>
                                <?php if(count($SubMenus)>0): ?>
                                <div class="dropdown-menu">
                                    <ul>
                                        <?php	foreach($SubMenus as $SubMenu): ?>
                                        <li><a
                                                href="index.php?c=product&a=list&procat=<?= $SubMenu->id ?>"><?php echo $SubMenu->title ;?></a>
                                        </li>
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                                <?php endif; ?>
                            </li>
                            <?php endforeach;?>
                            <li class="custom-link-right"><a href="#" target="_blank"> همین حالا بخرید!</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Main آقایانu End-->
        </div>