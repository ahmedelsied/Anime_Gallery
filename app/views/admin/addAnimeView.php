<?php if(!empty($this->ERRORS)): ?>
<ul class="alert alert-danger invalid list-unstyled">
<?php foreach($this->ERRORS as $error): ?>
    <li><?=$error?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
<!-- Content Page Dashbord -->
<div class="page-wrapper" id="page-wrapper">
            <div class="container-fluid  page-content">
                <!-- Page Heading -->
                <div class="row" id="main">
                    <div class="col-xs-12 col-md-12 well" id="content">
                        <h2 class="text-center">إضافه إنمي جديد</h2>

                        <div class="add-craftsmen" dir="rtl">
                            <form method="POST" action="" enctype="multipart/form-data">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-film"></i></span>
                                    <input class="form-control input-lg" name="anime_name" type="text" placeholder="اسم الانمي" required="required" autocomplete="off">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-link"></i></span>
                                    <input class="form-control input-lg" name="link" type="text" placeholder="الاسم في الرابط" required="required" autocomplete="off">
                                </div>
                                <div class="input-group" style="overflow: hidden;
                                                                    border-left: 1px solid rgb(204, 204, 204);">
                                    <span class="input-group-addon"><i class="fas fa-upload"></i></span>
                                    <input class="form-control input-lg custom-inpt-file" name="avatar[]" type="file" required="required" autocomplete="off">
                                    <label class="custom-input">الأفاتار</label>
                                </div>
                                <div class="input-group" style="overflow: hidden;
                                                                    border-left: 1px solid rgb(204, 204, 204);">
                                    <span class="input-group-addon"><i class="fas fa-images"></i></span>
                                    <input class="form-control input-lg custom-inpt-file" name="bg_img[]" type="file" required="required" autocomplete="off">
                                    <label class="custom-input">خلفية الإنمي</label>
                                </div>
                                <button class="btn btn-lg btn-primary btn-block">اضافة انمي</button>
                            </form>


                        </div>

                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->