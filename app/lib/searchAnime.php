<?php
namespace lib;
trait searchAnime
{
    // Method To Search In Anime
    public function searchAnime($params)
    {
        global $con;
        $tags = filter_var($params,FILTER_SANITIZE_STRING);
        $sql  = "SELECT * FROM anime WHERE name LIKE '%$tags%' ";
        $stmt = $con->prepare($sql);
        $stmt->execute(array());
        $result = $stmt->fetchAll();
        return $result;
    }
}