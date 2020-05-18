<style>
    optgroup {
        background: #051f4e;
        color: white;
    }

    optgroup option {
        background: #16527d;
    }
</style>
<section id="main-content">
    <section class="wrapper">

        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
                    <li><a href="product">محصولات</a></li>
                    <li class="active">افزودن محصول جدید</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <section class="panel">
                    <header class="panel-heading">
                        فرم اصلی
                    </header>
                    <?php ShowAll(); ?>
                    <div class="panel-body">
                        <form role="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">نام محصول</label>
                                <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="عنوان محصول را وارد کنید" value="<?php Old('title'); ?>">
                            </div>
                            <?php FirstError('title'); ?>

                            <div class="form-group">
                                <label for="exampleInputEmail1">توضیحات محصول</label>
                                <textarea name="text" class="form-control" id="exampleInputEmail1" placeholder="توضیحات محصول را وارد کنید"><?php Old('text'); ?></textarea>
                            </div>
                            <?php FirstError('text'); ?>

                            <div class="form-group">
                                <label for="exampleInputEmail1">قیمت محصول</label>
                                <input type="text" name="price" class="form-control" id="exampleInputEmail1" placeholder="عنوان محصول را وارد کنید" value="<?php Old('price'); ?>">
                            </div>
                            <?php FirstError('price'); ?>

                            <div class="form-group">
                                <label for="exampleInputEmail1">درصد تخفیف</label>
                                <input type="number" value="0" name="off" class="form-control" id="exampleInputEmail1" placeholder="درصد تخفیف خود را روی محصول اعمال کنید.." value="<?php Old('off'); ?>">
                            </div>
                            <?php FirstError('off'); ?>

                            <div class="form-group">
                                <label for="exampleInputEmail1">تعداد</label>
                                <input type="text" name="count" class="form-control" id="exampleInputEmail1" placeholder="عنوان محصول را وارد کنید" value="<?php Old('count'); ?>">
                            </div>
                            <?php FirstError('count'); ?>

                            <div class="form-group">
                                <label for="exampleInputEmail1">دسته بندی محصول</label>
                                <select style="font-size:14px;" class="form-control input-lg m-bot15" name="cat_id">
                                    <?php
                                    $number = 0;
                                    foreach ($MainProcats as $MainProcat) :
                                        $Procat_Items = $ProductCategory->procat_items($MainProcat->id);
                                        if (count($Procat_Items) !== 0) :
                                    ?>
                                            <optgroup label="🟡 <?php echo $MainProcat->title; ?>">
                                            <?php endif; ?>
                                            <?php foreach ($Procat_Items as $Procat_Item) : $number++; ?>
                                                <option value="<?php echo $Procat_Item->id; ?>"><?php echo $number . " -  " . $Procat_Item->title; ?></option>
                                            <?php endforeach; ?>
                                            </optgroup>
                                        <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">تصویر محصول</label>
                                <input type="file" name="picture" class="form-control" id="exampleInputEmail1" placeholder="کلمات کلیدی مربوط به این صفحه را وارد کنید ...">
                            </div>

                            <button type="submit" class="btn btn-info" name="submit">افزودن محصول</button>
                        </form>

                    </div>

                </section>
    </section>
    <?php
    ResetEngine();
    ?>