<?php
namespace models;
class anime_imgsModel extends abstractModel
{
    protected static $tableName = 'anime_imgs';
    public static $tableSchema = array(
        'anime_id'  => '',
        'img'       => '',
        'img_type'  => '',
        'img_alt'   => '',
    );
    protected static $primaryKey = 'id';
    protected static $uniqeKey = 'id';
}