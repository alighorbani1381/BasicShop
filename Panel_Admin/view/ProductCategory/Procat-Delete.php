<style>
    span {
        font-family: iransansweb;
    }

    #danger_delete {
        background-image: url("../public/images/admin/img/item.png");
        background-color: white;
        list-style: none;
        background-repeat: no-repeat;
        color: #333;
        padding: 10px;
        background-size: 36px;
        transition: 0.3s;
    }

    #danger_delete:hover {
        transition: 0.3s;
        background-image: url("../public/images/admin/img/1.png");
        background-position: right;
        background-size: 36px;
        padding-right: 35px;

    }
</style>
<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
                    <li><a href="category">دسته بندی ها</a></li>
                    <li class="active">پیغام خطا</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <section class="panel">
                    <header class="panel-heading">
                        <?php
                        if ($delete["Action"] == "Procat") {
                            echo "خطای دسته بندی!";
                        } else {
                            echo "خطای محصول!";
                        } ?>
                    </header>
                    <div class="panel-body">
                        <?php if ($delete["Action"] == "Procat") : ?>
                            <div class="alert alert-info fade in alert-block fade in">

                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="icon-remove"></i>
                                </button>
                                <h4>
                                    <i class="icon-exclamation-sign"></i>
                                    <span>اخطار</span>
                                </h4>
                                <h3>شما نمیتوانید این دسته بندی را حذف کنید !</h3>
                                <p>این دسته بندی دارای زیرگروه است </p>
                            </div>
                            <div class="alert alert-block alert-danger fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="icon-remove"></i>
                                </button>
                                <b>خب چه کنم؟: </b>
                                برای این که بتوانید این دسته بندی را حذف کنید لازم است تمامی زیر گروه های آن را حذف کنید
                            </div>
                            <div class="alert alert-block alert-warning fade in">
                                <b>راهنمایی:</b>
                                برای حذف زیر گروه های این دسته بندی از منو کشویی پایین استفاده کنید</p>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-white" type="button"> حذف زیر گروه های این دسته بندی</button>
                                <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button"><span class="caret"></span></button>
                                <ul role="menu" class="dropdown-menu">
                                    <?php foreach ($delete["Result"] as $item) : ?>
                                        <li>
                                            <a id="danger_delete" href="category/delete/<?php echo $item->id; ?>"><?php echo $item->title; ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php
                        endif;
                        if ($delete["Action"] == "Product") :
                        ?>
                            <div class="alert alert-info fade in alert-block fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="icon-remove"></i>
                                </button>
                                <h4>
                                    <i class="icon-exclamation-sign"></i>
                                    <span>اخطار</span>
                                </h4>
                                <h3>شما نمیتوانید این زیرگروه را حذف کنید!</h3>
                                <p>این زیر گروه دارای محصولاتی دیگر است </p>
                            </div>
                            <div class="alert alert-block alert-danger fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="icon-remove"></i>
                                </button>
                                <b>خب چه کنم؟: </b>
                                برای این که بتوانید این زیر گروه را حذف کنید لازم است تمامی محصولات آن را حذف کنید
                            </div>
                            <div class="alert alert-block alert-warning fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="icon-remove"></i>
                                </button>
                                <b>راهنمایی:</b>
                                برای حذف زیر گروه های این دسته بندی از منو کشویی پایین استفاده کنید
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-white" type="button">حذف محصولات این زیر گروه</button>
                                <button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button"><span class="caret"></span></button>
                                <ul role="menu" class="dropdown-menu">
                                    <?php foreach ($delete["Result"] as $item) : ?>
                                        <li>
                                            <a id="danger_delete" href="product/delete/<?php echo $item->id; ?>"><?php echo $item->title; ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div>

                </section>
    </section>