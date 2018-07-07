<?php

class DB
{
protected $dbn;	
public function __construct()
  {
     $this->dbn = new \PDO('mysql:host=localhost; dbname=euvva', 'root', '21072013');
   }
   public function query($params, $id)
   {
    //Подготавливаем и делаем запрос к базе данных
   	$stmt = $this->dbn->prepare($params);
    if($id!==null){
    $stmt->execute(array('id' => $id));}
    else{
    $stmt->execute();  
    }
    return $stmt;
  }
}

?>