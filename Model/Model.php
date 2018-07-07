<?php
require_once "Model\DB.php";
class Model extends DB
{
    protected $dbn;
    //Функция получение и вывода списка Call center
         public static function data($table)
    {
       //Подключаемся к базе данных и делаем выборку значений. Полученный результат записываем в переменную $res
      //и передаём переменную в seqrch.php
        $dbn = new DB();
        $sql = $dbn->query('SELECT * FROM '.$table, null);
        if($sql){
            $res = 0;
        }
        return $res;
      
    
    }
}
?>