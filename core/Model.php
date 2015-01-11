<?php
/**
 * Created by PhpStorm.
 * User: horizon
 * Date: 11.01.2015
 * Time: 2:29
 */

class Model{

    protected $db = null;

    private $db_conn;

    private static $db_type;

    private static $db_host;
    private static $db_name;
    private static $db_user;
    private static $db_pass;

    private static $db_path;

    public function __construct(){
        self::get_DATA();

        /*
           Check for DB Driver
      */
        switch (self::$db_type) {
            case "mysql":
                $this->db_conn = "mysql:host=" . self::$db_host . ";dbname=" . self::$db_name;
                break;
            case "pgsql":
                $this->db_conn = self::$db_type . ":host=" . self::$db_host . " dbname=" . self::$db_name;
                break;
            case "sqlite":
                $this->db_conn = self::$db_type . ":" . self::$db_path;
                break;
            default:
                self::$db_type = "mysql";
                $this->db_conn = self::$db_type . ":host=" . self::$db_host . ";dbname=" . self::$db_name;
                break;
        }

        try {
            $this->db = new PDO($this->db_conn, self::$db_user, self::$db_pass);
            $this->db->query('set names utf8');
        } catch (PDOException $e) {
            die();
            return "Database error: " . $this->db->errorCode();
        }

    }

    private static function get_DATA() {
        $in = include('app/conf/db.php');
        if ($in) {
            self::$db_type = $in['db_driver'];
            self::$db_host = $in['db_host'];
            self::$db_path = $in['db_path'];
            self::$db_name = $in['db_name'];
            self::$db_user = $in['db_user'];
            self::$db_pass = $in['db_pass'];
        } else {
            echo "Config OR DB error;";
        }
    }

    protected function select($sql, $params = null){
        $q = $this->db->prepare($sql);
        $q->execute($params);
        return $q;
    }

    protected function insert(){

    }

    protected function update(){

    }

    protected function delete(){

    }
}
