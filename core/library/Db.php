<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 17.06.2017
 * Time: 13:12
 */

namespace library;


class Db
{
    private static $_db = null;
    private $_link;
    private $conf = __DIR__ . '/../config/db.conf.php';

    private function __construct()
    {
        if(!file_exists( $this->conf)){
            throw new \Exception('Config db not found :' . $this->conf);
        }

        $config = require_once __DIR__ . '/../config/db.conf.php';
        $this->_link = @new \mysqli($config['host'], $config['user'], $config['password'], $config['db_name']);

        if($this->_link->connect_error){
            throw new \Exception('not _link ' . $this->_link->connect_error);
        }

        $this->_link->set_charset('utf8');
    }

    public static function getDb(){
        if(is_null(self::$_db)){
            self::$_db = new Self();
        }

        return self::$_db;
    }

    public function sendQuery($sql){
        $result = $this->_link->query($sql);
       if(!$result){
           throw new \Exception('Ошибка в запросе '.$this->_link->error);
       }

        return $result;
    }

    /**
     * @param $data
     * @return string
     */
    public function getSafeData($data)
    {
        return $this->_link->escape_string($data);
    }


    //для расштрения
   /* public function sendIUDQuery($sql){
        $result = $this->_link->query($sql);
        if(!$result){
            throw new \Exception('Ошибка в запросе '.$this->_link->connect_error);
        }

        return $result;
    }*/
}