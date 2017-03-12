<?php
/**
 * Created by PhpStorm.
 * User: tangliangdong
 * Date: 2017/3/12
 * Time: 16:28
 */

Class Connection{

    private static $pdo;

    /**
     * 获取实例化的PDO，单例模式
     * @return PDO
     */
    public static function getInstance($dbConf){
        if(!(self::$pdo instanceof PDO)){
            $dsn ="mysql:host=".$dbConf['host'].";port=".$dbConf['port'].";dbname=".$dbConf['dbName'].";charset=".$dbConf['charSet'];
            try {
                self::$pdo = new PDO($dsn,$dbConf['user'], $dbConf['password'], array(PDO::ATTR_PERSISTENT => true,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); //保持长连接
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            } catch (PDOException $e) {
                print "Error:".$e->getMessage()."<br/>";
                die();
            }
        }
        return self::$pdo;
    }
}