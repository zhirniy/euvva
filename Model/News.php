<?php
namespace euvva\Model;
use euvva\Model\Model;
require_once "Model/Model.php";
/**
* Класс описывающие основные свойства объектов 
*/
class News extends Model{
	public $id;
	public $user;
    public $description;
    public $date_created;
    const TABLE  = "news";
    const CLASS_NAME = __CLASS__;
}
?>