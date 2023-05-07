<?php

/**
 * All slect queries.
 * @Single Fetch
 * @Fetch all
 * @Search queries
 */
require_once('db.class.php');
 class Engine extends DB
 {

    public function delete($table, $ky)
    {
        $id = "";
        foreach ($ky as $key => $value) {
            $id .= "`".$key ."` = '".$value."'";    
        }

        $sql = "UPDATE `".$table."` SET `status` = '200' WHERE ".$id;
        $query  =   $this->Jigo->query($sql);

        if($query->num_rows > 0){
            if ($query) {
                return true;
            }
        }else{
            return false;
        }
    }

    public function coutTables($table)
    {
        $sql = "SELECT * FROM `$table`";
        $query = $this->Jigo->query($sql);
        $tableCount = $query->num_rows;

        return $tableCount;
    }

    public function Insert($table, $fields){
        $sql    =   "";
        $sql    .=  "INSERT INTO `".$table;
        $sql    .=  "` (`".implode("`,`", array_keys($fields))."`) VALUES ";
        $sql    .=  "('".implode("','", array_values($fields))."')";
        $query  =   $this->Jigo->query($sql);

        if ($query) {
            return true;
        }else{
            false;
        }

    }   

    function genRandomKeys(INT $limit = 6)
    {
        $Dtt    = time();
        $keys   = '987654321ABCDEFGHKMNPQRSTUWYZ'.$Dtt.rand(2346,9178);
        return  substr(str_shuffle($keys), 0, $limit);
    }

    public function update($table, $fields, $ky)
    {
        //$id = "";
        $codition = "";
        foreach ($fields as $key => $value) {
            $codition .= "`".$key. "` = '".$value."', ";
        }

        $codition = substr($codition, 0, -2);

        $sql = "UPDATE `".$table."` SET ".$codition." WHERE `id` =".$ky;
        $query  =   $this->Jigo->query($sql);
        if ($query) {
            return true;
        }else{
            return false;
        }
    }

    public function viewById($table, $ky)
    {
        $id = "";
        foreach ($ky as $key => $value) {
            // Update table SET name='' , qlt ='' where id = '' 
            $id .= "`".$key ."` = '".$value."'";    
        }
        
        $sql = "SELECT * FROM `".$table;
        $sql .= "` WHERE ".$id;
        $array = array();
        $query = $this->Jigo->query($sql);
         if($query->num_rows > 0){
            while ($row = $query->fetch_array()) {
                $array[] = $row;
            }
            return $array;
        }else{
            return false;
        }
    }
 }
 