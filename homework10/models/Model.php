<?php

namespace homework10\models;

use PDO;

abstract class Model {
    private function connect() {
        $string = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME;
        $con = new PDO($string, DBUSER, DBPASS);
        return $con;
    }


    public function query($query, $data = []) {
        $con = $this->connect();
        $stm = $con->prepare($query);
        $check = $stm->execute($data);
        if ($check) {
            //return as an associated array
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            if (is_array($result) && count($result)) {
                return $result;
            }
        }
        return false;
    }

    public function fetchAll($query) {
        $connectedPDO = $this->connect();
        $statementObject = $connectedPDO->query($query);
        return $statementObject->fetchAll();
    }

    public function fetchAllWithParams($query, $data = []) {
        $connection = $this->connect();
        $statementObject = $connection->prepare($query);
        $successOrFail = $statementObject->execute($data);
        if ($successOrFail) {
            $result = $statementObject->fetchAll();
            if (is_array($result) && count($result)) {
                return $result;
            }
        }
        return false;
    }





}