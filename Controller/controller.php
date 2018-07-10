<?php
namespace euvva\Controller;
require_once "Model/News.php";
use euvva\Model\News;
//Создаём экземляр класса News
$news = new News();
//Если пришёл POST запрос - передаём в модель для обработки (добавления записи)
if($_POST){
	 $news::addnews($_POST);
}
//Получаем все записи из базы данных
$allnews = $news::allnews();
//Отображаем записи
$news::display($allnews);
?>