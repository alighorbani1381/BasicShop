<style>
    .product-profile {
        transition: 0.3s;
        width: 40px;
        height: 40px;
        border-radius: 5%;
    }

    .product-profile:hover {
        transition: 0.3s;
        margin-bottom: 8px;
        box-shadow: 1px 0px 3px 2px #ccc8c8;
    }

    .add_slider {
        transition: 0.3s;
        background-color: #099157;
        border-radius: 3px;
        width: 35px;
        border: none;
        color: whitesmoke;
        margin: 0 2%;
        padding: 3px;
    }

    .add_slider:hover {
        transition: 0.3s;
        background-color: #046f41;
        margin: 0 3%;
        color: white;
    }
</style>
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
                    <li><a href="file">مدیریت رسانه ها</a></li>
                    <li class="active">لیست رسانه ها</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        لیست فایل های شما

                        <span>
                            <a class="add_slider" href="file/add">
                                <i class="icon-plus"></i>
                                <i>افزودن </i>
                                <i class="icon-music"></i>
                            </a>
                        </span>

                    </header>


                    <table class="table table-striped table-advance table-hover">
                        <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>عنوان</th>
                                <th>
                                    متن جایگزین
                                    (سئو)

                                </th>
                                <th>تصویر</th>
                                <th>حذف</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php $num = 0;
                            foreach ($uploaderFiles as $uploaderFile) : $num++; ?>

                                <tr>
                                    <td><?= $num ?></td>
                                    <td><?php echo $uploaderFile->title; ?></td>
                                    <td><?php echo $uploaderFile->alt; ?></td>
                                    <td><img class="product-profile" src="<?= "../" . $uploaderFile->address ?>"></td>
                                    <td>
                                        <form action="index.php?c=uploader&a=destroy&id=<?= $uploaderFile->id ?>" method="post"><button type="submit" class="btn btn-danger btn-xs"><i class="icon-trash"></i></form>
                                    </td>

                                </tr>

                            <?php endforeach; ?>



                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </section>
</section>