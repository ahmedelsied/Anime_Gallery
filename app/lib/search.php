<?php
namespace lib;
trait search
{
    // Method To Search In Blogs
    public function searchBlog($params)
    {
        global $con;
        $tags = filter_var($params,FILTER_SANITIZE_STRING);
        $sql  = "SELECT * FROM blogs WHERE tags LIKE '%$tags%' OR title LIKE '%$tags%'";
        $stmt = $con->prepare($sql);
        $stmt->execute(array());
        $result = $stmt->fetchAll();
        return $result;
    }
    // Method To Search In BLogs And Services
    public function serviceSearch($search)
    {
        global $con;
        $tags = filter_var($search,FILTER_SANITIZE_STRING);
        $sql  = "SELECT * FROM services WHERE title LIKE '%$tags%'";
        $stmt = $con->prepare($sql);
        $stmt->execute(array());
        $result = $stmt->fetchAll();
        return $result;
    }
}