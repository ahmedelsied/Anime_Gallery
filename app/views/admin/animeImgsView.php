        <!-- Content Page Dashbord  -->
        <div class="page-wrapper" id="page-wrapper">
            <div class="container-fluid  page-content">
                <div class="header">
                    <img src="<?=UPLOADS.$this->anime_details[0]['name'].'/_low_quality_'.$this->anime_details[0]['bg_img']?>"/>
                </div>
                <div>
                    <div class="container">
                        <div dir="ltr" class="content-ltr"> <a href="../"><i class="fa fa-arrow-left"></i> رجوع</a></div>
                        <div class="content-name">
                            <h1><?=$this->anime_details[0]['name']?></h1>
                        </div>

                    </div>
                </div>
                <div class="row content">
                <?php if(!empty($this->allAnimeImgs)): ?>
                <?php foreach($this->allAnimeImgs as $img): ?>
                <?php $imgDetails = explode('.',$img['img']) ?>
                    <div class="col-lg-4 col-md-6 col-12 cover">
                        <div class="box">
                            <div class="box-img">
                                <img src="<?=UPLOADS.$this->anime_details[0]['name'].'/_low_quality_'.$img['img']?>">
                                <a href="<?=$this->mainURL.'admin_hash_dashboard/delete_img/'.$img['id'].'/'.$this->anime_details[0]['name'].'/'.$imgDetails[0].'/'.$imgDetails[1]?>" class="remove-img confirm btn">مسح</a> </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-xs-12 text-center">
                        <h4 style="padding:15px">لا يوجد صور هنا</h4>
                    </div>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>