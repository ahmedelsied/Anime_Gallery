<?php
namespace lib;
trait login{
    public function login($value)
    {
        global $con;
        $sql = 'SELECT * FROM admin WHERE user_name = ? AND password = ? LIMIT 1';
        $stmt = $con->prepare($sql);
        $stmt->execute($value);
        $data = $stmt->fetch();
        $count = $stmt->rowCount();
        return array($data,$count);
    }
}