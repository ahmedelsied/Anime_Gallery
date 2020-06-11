<?php
namespace models;
class animeModel extends abstractModel
{
    protected static $tableName = 'anime';
    public static $tableSchema = array(
        'name'     => '',
        'link'     => '',
        'avatar'   => '',
        'bg_img'   => ''
    );
    protected static $primaryKey = 'id';
    protected static $uniqeKey = 'name';
}