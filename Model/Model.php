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
  *
  */   
  public function addnews($params){
    $column=null;
    $key_ar_ = [];
    $value_ar = [];
      foreach ($params as $key => $value) {
         $column.=$key.',';
         array_push($key_ar_, ':'.$key);
         array_push($value_ar, $value);
     }
     $value_prepare = implode(",", $key_ar_);
     $sql = "INSERT INTO ".$this->table." (".$column." date_created) VALUES (". $value_prepare.", NOW())";
     $dbn = new DB();
     $dbn->execute($sql, $key_ar_, $value_ar);
  }
  /**
  * Метод подключающий шаблон для отображения страницы
  *
  */ 
  public static function display($params){
    include "View/index.php";
  }
}
?>