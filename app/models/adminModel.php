<?php
namespace models;
class adminModel extends abstractModel
{
    protected static $tableName = 'admin';
    public static $tableSchema = array(
        'full_name' => '',
        'user_name' => '',
        'password'  => '',
    );
    protected static $primaryKey = 'id';
    protected static $uniqeKey = 'user_name';
}