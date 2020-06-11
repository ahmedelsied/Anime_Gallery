        <!-- Content Page Dashbord  -->
        <div class="page-wrapper" id="page-wrapper">
            <div class="container-fluid  page-content">
                <!-- Page Heading -->
                <div class="row" id="main">
                    <div class="col-sm-12 col-md-12 well text-center" id="content">
                        <h2>أهلا بك</h2>
                    </div>

                    <!--اجمالي إحصائيات الموقع-->
                    <div class="col-sm-12 col-md-12 well cards text-right" id="content">
                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-2">
                                <div class="card-2 text-center">
                                    <p><?=$this->imgCount?></p>
                                    <h3>عدد الصور بالموقع</h3>
                                    <i class="fas fa-users fa-4x"></i>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card-1 text-center">
                                    <p><?=$this->animeCount?></p>
                                    <h3>عدد الانمي بالموقع</h3>
                                    <i class="fas fa-film fa-4x"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- جدوال اخر العملاء و الصنايعيه المسجلين -->
                    <div class="col-sm-12 col-md-12 well new-register" id="content" dir="rtl">
                        <div class="row">
                            <!-- جدول اخر العملاء المسجلين-->
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <!-- Default panel contents -->
                                    <div class="panel-heading">الانمي المضاف حديثا</div>
                                    <div class="row text-center">
                                    <?php if(!empty($this->latestAnime)): ?>
                                    <?php foreach($this->latestAnime as $anime): ?>
                                        <div class="col-sm-3">
                                            <div class="latest-box-model">
                                                <div class="latest-content-parent">
                                                    <div class="img-parent">
                                                        <img src="<?=UPLOADS.$anime['name'].'/_low_quality_'.$anime['avatar']?>" alt="<?=$anime['name']?>" />
                                                    </div>
                                                    <div class="control-content">
                                                        <h4><?=$anime['name']?></h4>
                                                        <a href="<?=$this->mainURL.'admin_hash_dashboard/delete_anime/'.$anime['id'].'/'.$anime['name']?>" class="btn btn-danger confirm">مسح<i class="fa fa-time"></i></a>
                                                        <a href="<?=$this->mainURL?>admin_hash_dashboard/anime/<?=$anime['id']?>" class="btn btn-primary">الدخول</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                    <div class="col-xs-12 text-center">
                                        <h4 style="padding:15px">لا يوجد إنمي بعد</h4>
                                    </div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- جدول اخر الصنايعية المسجلين-->
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <!-- Default panel contents -->
                                    <div class="panel-heading">الصور المضافه حديثا</div>
                                    <div class="row text-center">
                                    <?php if(!empty($this->latestImg)): ?>
                                    <?php foreach($this->latestImg as $img): ?>
                                    <?php $animeDetails = $this->animeModel->getWPK($img['anime_id']);?>
                                    <?php $imgDetails = explode('.',$img['img']) ?>
                                        <div class="col-sm-3">
                                            <div class="latest-box-model">
                                                <div class="latest-content-parent">
                                                    <div class="img-parent">
                                                        <img src="<?=UPLOADS.$animeDetails[0]['name'].'/_low_quality_'.$img['img']?>" alt="<?=$img['img_alt']?>" />
                                                    </div>
                                                    <div class="control-content">
                                                        <h4><?=$animeDetails[0]['name']?></h4>
                                                        <a href="<?=$this->mainURL.'admin_hash_dashboard/delete_img/'.$img['id'].'/'.$animeDetails[0]['name'].'/'.$imgDetails[0].'/'.$imgDetails[1]?>" class="btn btn-danger confirm">مسح<i class="fa fa-time"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                    <div class="col-xs-12 text-center">
                                        <h4 style="padding:15px">لا يوجد صور بعد</h4>
                                    </div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            </div>
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