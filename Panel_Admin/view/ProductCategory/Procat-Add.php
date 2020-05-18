<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
                    <li><a href="category">دسته بندی ها</a></li>
                    <li class="active">افزودن دسته بندی</li>
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
                    <div class="panel-body">
                        <form role="form" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">عنوان دسته بندی</label>
                                <input type="text" name="title" value="<?php Old('title'); ?>" class="form-control" id="exampleInputEmail1" placeholder="عنوان منو را وارد کنید">
                            </div>
                            <?php FirstError('title'); ?>

                            <div class="form-group">
                                <label for="exampleInputEmail1">زیر منو</label>
                                <select style="font-size:14px;" class="form-control input-lg m-bot15" name="chid">
                                    <option value="0">سر گروه</option>
                                    <?php foreach ($subprocat as $value) : ?>
                                        <option value="<?php echo $value->id; ?>"><?php echo $value->title; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?php FirstError('chid'); ?>



                            <button type="submit" class="btn btn-info" name="submit">افزودن</button>
                        </form>

                    </div>
                </section>
    </section>
    <?php ResetEngine(); ?>