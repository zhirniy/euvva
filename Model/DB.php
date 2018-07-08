<?php
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
     $this->dbn = new \PDO('mysql:host=localhost; dbname=euvva', 'root', '21072013');
   }
    /**
    * Метод получения данных из базы 
    * Возвращает массив объектов дочернего класса 
    */
  	public function query($sql, $class_name){
  	    $sth = $this->dbn->prepare($sql);
		    $sth->execute();
		    $result = $sth->fetchAll(PDO::FETCH_CLASS, $class_name);
		    return $result;
  	}
    /**
    * Метод добавления данных в базу данных 
    */
  	public function execute($sql, $user, $description){
      $stmt = $this->dbn->prepare($sql);
      $stmt->bindParam(':user', $user);
      $stmt->bindParam(':description', $description);
		  $stmt->execute();
  	}

}

?>