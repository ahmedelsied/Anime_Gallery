<?php
namespace controllers\anime;
class animeImgs
{
    private $params;
    private $anime_imgsModel;
    public function __construct($params)
    {
        $this->params           = $params[0];
        $this->anime_imgsModel  = $params[1];
    }
    public function PCImgs($id)
    {
        return $this->anime_imgsModel->getWCond('anime_id = '.$this->params.' AND img_type = 1 AND id '.$id.' LIMIT 20 ');
    }
    public function mobileImgs($id)
    {
        return $this->anime_imgsModel->getWCond('anime_id = '.$this->params.' AND img_type = 0 AND id '.$id.' LIMIT 20 ');
    }
    public function getSpecImg($imgID,$animID)
    {
        return $this->anime_imgsModel->getJOIN('*','anime','id','anime_id','anime_imgs.id = '.$imgID.' AND anime.id ='.$animID);
    }
    public function getLimitImgs($animeID,$activeImg)
    {
        return $this->anime_imgsModel->getLimit('20','WHERE anime_id = '.$animeID.' AND id != '.$activeImg);
    }
}