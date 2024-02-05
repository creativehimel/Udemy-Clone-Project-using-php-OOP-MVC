<?php
/*
*Database Class
*/
class Database
{
    private function connect()
    {
        $str = DB_DRIVER.":hostname=".DB_HOST.";dbname=".DB_NAME;
        return new PDO($str, DB_USER, DB_PASSWORD);
    }

    public function query($query, $params = array(), $type= "object")
    {
        $con = $this->connect();
        $statement = $con->prepare($query);
        if($statement){
            $check = $statement->execute($params);
            if($check){
                if($type != "object"){
                    $fetchType = PDO::FETCH_ASSOC;
                }else{
                    $fetchType = PDO::FETCH_OBJ;
                }
                $result = $statement->fetchAll($fetchType);
                if(is_array($result) && count($result) > 0){
                    return $result;
                }
            }
        }
        return false;
    }
}