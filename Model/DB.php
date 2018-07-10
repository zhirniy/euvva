<?php
namespace euvva\Model;
/**
* Класс подключения к базе данных 
*/
class DB
{
protected $dbn;	
    /**
    * При вызове конструктора создаём подключение к базе данных 
    */
    public function __construct(){
     $this->dbn = new \PDO('mysql:host=localhost; dbname=euvva', 'root', '');
   }
    /**
    * Метод получения данных из базы 
    * Возвращает массив объектов дочернего класса 
    */
  	public function query($sql, $class_name){
  	    $sth = $this->dbn->prepare($sql);
		    $sth->execute();
		    $result = $sth->fetchAll(\PDO::FETCH_CLASS, $class_name);
		    return $result;
  	}
    /**
    * Метод добавления данных в базу данных 
    */
  	public function execute($sql, $key, $value){
      $sth = $this->dbn->prepare($sql);
      for ($i=0; $i < count($key); $i++) { 
         $sth->bindParam($key[$i], $value[$i]);
      }
		  $sth->execute();
  	}

}

?>