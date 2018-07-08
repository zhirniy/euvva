<?php
require_once "Model/Model.php";
/**
* Класс описывающие основные свойства объектов 
*/
class News extends Model{
	public $id;
	public $user;
    public $description;
    public $date_created;
    public $table = "news";
    public $class_name = __CLASS__;
}
?>