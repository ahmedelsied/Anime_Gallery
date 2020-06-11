    <a id="return-to-top"><i class="fas fa-angle-up"></i></a>
    <section class="hidden" style="background-image: url(<?=IMG?>head.jpg);">
        <div class="logo">
            <img src="<?=IMG?>logo.png">
        </div>
        <form class="search" id="searchform" action="../../../gallery/search">
            <input name="q" placeholder="بحث..." type="text" required="required" value="<?=isset($_GET['q']) ? $_GET['q'] : ''?>">
            <button class="fa fa-search" style="background-color: transparent;border: none;"></button>
        </form>
    </section>
    <div class="darkmode">
        <!--3-->
        <div class="light far fa-sun">
            <!--4-->
        </div>
        <div class="dark fa fa-moon-o">
            <!--5-->
        </div>
    </div>
    <section class="ftco-menu">
        <div class="row content">
            <div class="container-1">
                <?php if(!empty($this->allAnime)): ?>
                <?php foreach($this->allAnime as $anime): ?>
                <div class="box">
                    <a href="<?=SERVER_NAME.'/gallery/main/anime/'.$anime['name']?>">
                    </a>
                    <img lass="shadow p-3" src="<?=UPLOADS.$anime['name'].'/_low_quality_'.$anime['avatar']?>" alt="<?=$anime['name']?>">
                    <div class="taxe">
                        <h4><?=$anime['name']?></h4>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-xs-12 text-center">
                        <h4 style="padding:15px;color:black;font-family: 'Cairo', sans-serif;">لا يوجد إنمي </h4>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>