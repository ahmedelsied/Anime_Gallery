        <!-- Content Page Dashbord  -->
        <div class="page-wrapper" id="page-wrapper">
            <div class="container-fluid  page-content">
                <div class="search" id="searchform" action="search.php" dir="rtl">
                    <input name="q" placeholder="أبحث عن انمي" type="text" id="myInput">
                    <i class="fa fa-search"></i>
                </div>
                <div class="row content" id="myTable">
                <?php if(!empty($this->latestAnime)): ?>
                <?php foreach($this->latestAnime as $anime): ?>
                    <div class="col-lg-4 col-md-6 col-12 cover">
                        <div class="box">
                            <div class="box-img">
                                <img src="<?=UPLOADS.$anime['name'].'/_low_quality_'.$anime['avatar']?>">
                            </div>
                            <h4><?=$anime['name']?></h4>
                            <a href="<?=$this->mainURL?>admin_hash_dashboard/anime/<?=$anime['id']?>" class="btn add">دخول</a>
                            <a href="<?=$this->mainURL.'admin_hash_dashboard/delete_anime/'.$anime['id'].'/'.$anime['name']?>" class="btn remove confirm">مسح</a>
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
    </div>