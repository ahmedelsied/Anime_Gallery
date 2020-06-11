<?php if(!empty($this->ERRORS)): ?>
<ul class="alert alert-danger invalid list-unstyled">
<?php foreach($this->ERRORS as $error): ?>
    <li><?=$error?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
        <!-- Content Page Dashbord  -->
        <div class="page-wrapper" id="page-wrapper">
            <div class="container-fluid  page-content">
                <!-- Page Heading -->
                <div class="row" id="main">
                    <div class="col-xs-12 col-md-12 well" id="content" dir="ltr">
                        <h2 class="text-center">إضافه صور إنمي جديد</h2>
                        <div class="add-craftsmen" dir="rtl">
                            <form method="POST" action="" enctype="multipart/form-data">
                                <input name="anime_name" type="hidden"/>
                                <select name="anime_id" class="custom-select anime_name my-1 mr-sm-2" id="inlineFormCustomSelectPref" required="required">
                                    <option value="" selected disabled hidden>الانمي</option>
                                    <?php foreach($this->allAnime as $anime): ?>
                                    <option value="<?=$anime['id']?>"><?=$anime['name']?></option>
                                    <?php endforeach; ?>
                                </select>
                                <select name="img_type" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" required="required">
                                    <option value="" selected disabled hidden>نوع الصور</option>
                                    <option value="0">موبايل</option>
                                    <option value="1">كمبيوتر</option>
                                </select>
                                <div class="input-group" style="overflow: hidden;border-left: 1px solid rgb(204, 204, 204);">
                                    <span class="input-group-addon"><i class="fas fa-upload"></i></span>
                                    <input name="anime_imgs[]" class="form-control input-lg custom-inpt-file" type="file"  multiple="multiple" accept="image/*" required="required" autocomplete="off">
                                    <label class="custom-input">رفع الصور</label>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class='fas fa-italic'></i></span>
                                    <input name="img_alt" class="form-control input-lg" type="text" placeholder="(alt) النص البديل" required="required" autocomplete="off">
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