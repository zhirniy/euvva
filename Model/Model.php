<?php
require_once "DB.php";
/**
* Абстрактный класс реализующий методы обращения к базе данных 
* Наследует подключение к базе данных
*/
Abstract class Model extends DB
{
  /**
  * Метод возвращающий всё записи из таблицы
  */  
  public function allnews(){
    $sql = "SELECT * FROM ".$this->table." ORDER BY id DESC";
    $dbn = new DB();
    $class_name = $this->class_name;
    $result = $dbn->query($sql, $class_name);
    return $result;  
  }
  /**
  * Метод добавляющий запись в таблицу
  */   
  public function addnews($params){
    $sql = "INSERT INTO ".$this->table." (user, description, date_created) VALUES (:user, :description, NOW())";
    $user = $params['user'];
    $description = $params['description'];

    $dbn = new DB();
    $dbn->execute($sql, $user, $description);
  }
  public static function display($params){
    include "View/index.php";
  }
}
?>