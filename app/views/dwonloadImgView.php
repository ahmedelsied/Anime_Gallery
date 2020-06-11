<section>
    <div class="content">
        <a class="link" href="../">Gallery</a>
        <a class="link" href="../<?=$this->animeDetails[0]['name']?>"><i class='fas fa-angle-left'></i> Back</a>
    </div>
    <div class="container-1">
        <div class="Download">
            <a href="<?=UPLOADS.$this->animeDetails[0]['name'].'/_original_'.$this->activeImg[0]['img']?>" download>
                <button>Download</button>
            </a>
        </div>
        <div class="Share">
            <button type="button" class="btn btn-default btn-sm" data-toggle="collapse" href="#collapseExample"
                role="button" aria-expanded="false" aria-controls="collapseExample">
                Share <i class="fa fa-share"></i>
            </button>
        </div>

        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <div class="sharetastic">
                    <div class="sharetastic sharetastic--initialized">
                        <div class="sharetastic sharetastic--initialized">
                            <a
                                class="sharetastic__button sharetastic__button--facebook"
                                href="https://www.facebook.com/sharer/sharer.php?u=https://www.facebook.com/animeix/&amp;title=animeix&amp;description=%D8%B1%D9%85%D8%B6%D8%A7%D9%86%20%D9%83%D8%B1%D9%8A%D9%85"
                                target="_blank"><svg width="32" "="" height=" 32" class="sharetastic__icon">
                                    <use xlink:href="#sharetastic-facebook"></use>
                                </svg>Facebook</a><a class="sharetastic__button sharetastic__button--twitter"
                                href="https://twitter.com/intent/tweet?text=animeix - https://www.facebook.com/animeix/"
                                target="_blank"><svg width="32" "="" height=" 32" class="sharetastic__icon">
                                    <use xlink:href="#sharetastic-twitter"></use>
                                </svg>Twitter</a><a class="sharetastic__button sharetastic__button--pinterest"
                                href="http://pinterest.com/pin/create/link/?url=https://www.facebook.com/animeix/&amp;description=animeix&amp;media=https%3A%2F%2Fwww.animeix.com%2Fgallery%2Fimages%2Fseven_deadly_sins.jfif"
                                target="_blank"><svg width="32" "="" height=" 32" class="sharetastic__icon">
                                    <use xlink:href="#sharetastic-pinterest"></use>
                                </svg>Pinterest</a><a class="sharetastic__button sharetastic__button--googleplus"
                                href="https://plus.google.com/share?url=https://www.facebook.com/animeix/"
                                target="_blank"><svg width="32" "="" height=" 32" class="sharetastic__icon">
                                    <use xlink:href="#sharetastic-googleplus"></use>
                                </svg>Google +</a><a class="sharetastic__button sharetastic__button--tumblr"
                                href="http://www.tumblr.com/share/link?&amp;url=https://www.facebook.com/animeix/&amp;name=animeix&amp;description=%D8%B1%D9%85%D8%B6%D8%A7%D9%86%20%D9%83%D8%B1%D9%8A%D9%85"
                                target="_blank"><svg width="32" "="" height=" 32" class="sharetastic__icon">
                                    <use xlink:href="#sharetastic-tumblr"></use>
                                </svg>Tumblr</a><a class="sharetastic__button sharetastic__button--email"
                                href="mailto:?Body=animeix%0Aرمضان كريم%https://www.facebook.com/animeix/?>"><svg
                                    width="32" "="" height=" 32" class="sharetastic__icon">
                                    <use xlink:href="#sharetastic-email"></use>
                                </svg>Email</a><a class="sharetastic__button sharetastic__button--whatsapp"
                                href="https://api.whatsapp.com/send?text=animeix - رمضان كريمhttps://www.facebook.com/animeix/?>"
                                target="_blank"><svg width="32" "="" height=" 32" class="sharetastic__icon">
                                    <use xlink:href="#sharetastic-whatsapp"></use>
                                </svg>WhatsApp</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container-2">
    <div class="box-img" id="active-container">
        <img id="active-img" src="<?=UPLOADS.$this->animeDetails[0]['name'].'/_low_quality_'.$this->activeImg[0]['img']?>"
            alt="<?=$this->activeImg[0]['img_alt']?>" />
    </div>
</section>
<section class="container-1">
    <div class="slider-area slider">
        <?php foreach($this->someImgs as $someImgs): ?>
        <div class="item">
            <a href="<?=SERVER_NAME.'/gallery/main/anime/'.$this->animeDetails[0]['name'].'/'.$someImgs['id']?>">
                <div class="shadow bg-white rounded"
                    style="background-image: url(<?=UPLOADS.$this->animeDetails[0]['name'].'/_low_quality_'.$someImgs['img']?>);">
                </div>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</section>