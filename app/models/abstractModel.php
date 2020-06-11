<?php
namespace models;
class abstractModel
{
    public function getAll()
    {
        global $con;
        $stmt = $con->prepare("SELECT * FROM " . static::$tableName);
		$stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getLimit($argument,$cond = null)
    {
        global $con;
        $sql = "SELECT * FROM " . static::$tableName ." ".$cond." LIMIT ".$argument;
        $stmt = $con->prepare($sql);
		$stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getWPK($pk)
    {
        global $con;
        $sql = 'SELECT * FROM '. static::$tableName . ' WHERE '.static::$primaryKey.' = ' . $pk;
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getUNI($uni)
    {
        global $con;
        $sql = 'SELECT * FROM '. static::$tableName . ' WHERE '.static::$uniqeKey." = $uni";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getWCond($cond)
    {
        global $con;
        $sql = 'SELECT * FROM '. static::$tableName . ' WHERE '.$cond;
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function getJOIN($columnMain,$tableJOIN,$selectedJOIN,$selected2,$cond)
    {
        global $con;
        $sql = 'SELECT '.static::$tableName.'.'.$columnMain.'
        FROM '.static::$tableName.'
        INNER JOIN '.$tableJOIN.'
        ON '.$tableJOIN.'.'.$selectedJOIN.' = '.static::$tableName.'.'.$selected2.' 
        WHERE '.$cond;
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function buildNameParametersSQL()
    {
        $namedParams = '';
        foreach (static::$tableSchema as $columnName => $type) {
            $namedParams .= $columnName . ' = "' . $type . '", ';
        }
        return trim($namedParams, ', ');
    }
    public function insertRec()
    {
        global $con;
        $sql = 'INSERT INTO ' . static::$tableName . ' SET ' . $this->buildNameParametersSQL();
        $stmt = $con->prepare($sql);
        $stmt->execute();
        return true;
    }
    public function deleteRec($param)
    {
        global $con;
        $sql = 'DELETE FROM '. static::$tableName .' WHERE '. static::$primaryKey .' = ' . $param;
        $stmt = $con->prepare($sql);
        $stmt->execute();
    }
    public function updateRec($param)
    {
        global $con;
        $sql = 'UPDATE ' . static::$tableName . ' SET ' . $this->buildNameParametersSQL() . ' WHERE ' . static::$primaryKey .' = ' . $param;
        $stmt = $con->prepare($sql);
        $stmt->execute();
        return true;
    }
    public function countRow($cond = null)
    {
        global $con;
        $sql = 'SELECT '.static::$primaryKey.' FROM '.static::$tableName.$cond;
        $stmt = $con->prepare($sql);
        $stmt->execute(array());
        $count = $stmt->rowCount();
        return $count;
    }
}