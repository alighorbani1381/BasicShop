<section id="main-content">
    <section class="wrapper">

        <h1 class="pageLables">افزودن اسلایدر</h1>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <section class="panel">
                    <header class="panel-heading">
                        فرم اصلی
                        <li class="icon-dribbble"></li>
                    </header>
                    <div class="panel-body">
                        <form role="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">عنوان اسلایدر</label>
                                <input type="text" name="frm[title]" class="form-control" id="exampleInputEmail1" placeholder="متن عنوان اسلایدر را وارد کنید ...">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">توضیح مختصر اسلایدر</label>
                                <textarea name="frm[text]" class="form-control" id="exampleInputEmail1" placeholder="توضیح مختصری در مورد اسلایدر وارد کنید..."></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">ترتیب قرارگیری</label>
                                <input type="number" name="frm[sort]" class="form-control" id="exampleInputEmail1" placeholder="ترتیب قرارگیری اسلایدر را مشخص کنید...">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">لینک به دسته بندی</label>
                                <select style="font-size:14px;" class="form-control input-lg m-bot15" name="frm[procat]">
                                    <?php foreach ($subproduct as $value) : ?>
                                        <option value="<?php echo $value->id; ?>"><?php echo $value->title; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">تصویر اسلایدر</label>
                                <input type="file" name="picture" class="form-control" id="exampleInputEmail1" placeholder="کلمات کلیدی مربوط به این صفحه را وارد کنید ...">
                            </div>

                            <button type="submit" class="btn btn-info" name="submit">افزودن اسلایدر</button>
                        </form>

                    </div>

                </section>
    </section>