<a id="return-to-top"><i class="fas fa-angle-up"></i></a>
    <section class="hidden" style="background-image: url(<?=UPLOADS.$this->animeDetails[0]['name'].'/_original_'.$this->animeDetails[0]['bg_img']?>);background-position:center right ;">
        <div class="logo">
            <a href="https://animeix.com">
                <img src="<?=IMG?>logo.png">
            </a>
        </div>
        <div class="navbar">
            <ul>
                <li class="link">
                    <a href="../"> photo </a>
                </li>
                <li class="link">
                    <a href="https://animeix.com"> <i class="fa fa-chevron-right"></i> الصفحه الرئسيه </a>
                </li>
            </ul>
        </div>
    </section>
    <section class="cover">
        <div class="container-2">
            <div class="row content">
                <div class="col-lg-12 head">
                    <nav class=" nav-link-wrap mb-5">
                        <ul class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <li>
                                <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true"><i class="fas fa-mobile-alt"></i>خلفيات موبيل</a>
                            </li>
                            <li>
                                <a class="nav-link " id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false"> خلفيات كمبيوتر <i class='fas fa-desktop'></i></a>
                            </li>
                            <li>
                                <a class="nav-link " href="https://animeix.com/tvshows/<?=$this->animeDetails[0]['link']?>/">حلقات المسلسل <i class='fas fa-film'></i></a>
                            </li>
                        </ul>
                    </nav>
                    <div class="darkmode">
                        <!--3-->
                        <div class="light far fa-sun">
                            <!--4-->
                        </div>
                        <div class="dark fa fa-moon-o">
                            <!--5-->
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="tab-content " id="v-pills-tabContent">
                            <div class="tab-pane fade show active respones-imgs" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
                                <div class="row content-2">
                                    <div class="container-1">
                                        <?php $mobileImgs = $this->allAnimeImgs->mobileImgs('< 30 '); ?>
                                        <?php $pcImgs = $this->allAnimeImgs->PCImgs('< 30 '); ?>
                                    <?php if(!empty($mobileImgs)): ?>
                                    <?php foreach($mobileImgs as $img): ?>
                                        <div class="box" data_img_id="<?=$img['id']?>" data_anime_id="<?=$img['anime_id']?>" data_anime_name="<?=$this->animeDetails[0]['name']?>">
                                            <a href="<?=SERVER_NAME.'/gallery/main/anime/'.$this->animeDetails[0]['name'].'/'.$img['id']?>"> </a>
                                            <img class="shadow p-3" src="<?=UPLOADS.$this->animeDetails[0]['name'].'/_low_quality_'.$img['img']?>" alt="<?=$img['img_alt']?>">
                                        </div>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                        <div class="col-xs-12 text-center">
                                            <h4 style="padding:15px;color:black;font-family: 'Cairo', sans-serif;">لا يوجد صور هنا</h4>
                                        </div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade respones-imgs" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
                                <div class="row content-2">
                                    <div class="container-1">
                                    <?php if(!empty($pcImgs)): ?>
                                    <?php foreach($pcImgs as $img): ?>
                                        <div class="box-2" data_img_id="<?=$img['id']?>" data_anime_id="<?=$img['anime_id']?>" data_anime_name="<?=$this->animeDetails[0]['name']?>">
                                            <a href="<?=SERVER_NAME.'/gallery/main/anime/'.$this->animeDetails[0]['name'].'/'.$img['id']?>">
                                            </a>
                                            <img src="<?=UPLOADS.$this->animeDetails[0]['name'].'/_low_quality_'.$img['img']?>" alt="<?=$img['img_alt']?>">
                                        </div>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                        <div class="col-xs-12 text-center">
                                            <h4 style="padding:15px;color:black;font-family: 'Cairo', sans-serif;">لا يوجد صور هنا</h4>
                                        </div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php if(count($mobileImgs) == 20 || count($pcImgs) == 20): ?>
                                <div class="text-center">
                                    <button id="watch-more">مشاهدة المزيد</button>                        
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>