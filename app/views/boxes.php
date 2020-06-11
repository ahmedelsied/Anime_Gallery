<?php
foreach($this->response as $img): ?>
    <div class="box<?=$this->device?>" data_img_id="<?=$img['id']?>" data_anime_id="<?=$img['anime_id']?>" data_anime_name="<?=$this->animename?>">
        <a href="<?=SERVER_NAME.'/gallery/main/anime/'.$this->animename.'/'.$img['id']?>">
        </a>
        <img src="<?=UPLOADS.$this->animename.'/_low_quality_'.$img['img']?>" alt="<?=$img['img_alt']?>">
    </div>
<?php endforeach; ?>