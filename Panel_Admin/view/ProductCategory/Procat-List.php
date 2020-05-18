    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <!--breadcrumbs start -->
                    <ul class="breadcrumb">
                        <li><a href="dashbord"><i class="icon-home"></i>داشبورد</a></li>
                        <li><a href="category">دسته بندی ها</a></li>
                        <li class="active">لیست دسته بندی ها</li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            لیست دسته بندی ها شما
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                                <tr>
                                    <th>نام</th>
                                    <th>زیر گروه </th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($row as $value) :
                                    $chid = $value->chid;
                                    if ($chid != 0) {
                                        $procat_sup = $object->SelectmainProcat($chid);
                                        $status = $procat_sup->title;
                                    } else {
                                        $status = "سرگروه";
                                    }

                                ?>


                                    <tr>
                                        <td><?php echo $value->title; ?></td>
                                        <td><?php echo $status; ?></td>
                                        <td>
                                            <form method="post" action="category/edit/<?php echo $value->id; ?>"><button type="submit" class="btn btn-primary btn-xs"></form><i class="icon-pencil"></i>
                                        </td>
                                        <td>
                                            <form method="post" action="category/delete/<?php echo $value->id; ?>"><button type="submit" class="btn btn-danger btn-xs"></form><i class="icon-trash"></i>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>

                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </section>
    </section>