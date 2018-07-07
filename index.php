<?php
$dbh = new PDO('mysql:host=localhost;dbname=euvva', 'root', '21072013');
class News{
	public $id;
	public $user;
    public $description;
    public $date_created;
}

if(isset($_POST['submit_news'])){
	$user = $_POST['user'];
	$descriptions = $_POST['descriptions'];
	$sth = $dbh->prepare("INSERT INTO news (user, description, date_created) VALUES ('".$user."', '".$descriptions."', NOW())");
	$sth->execute();
}

$sth = $dbh->prepare("SELECT * FROM news ORDER BY id DESC");
$sth->execute();
$result = $sth->fetchAll(PDO::FETCH_CLASS, "News");
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>EUVVA</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link href='style.css' rel='stylesheet' type='text/css'>
</head>
<body>
</br>
<h5>Гостевая книга</h5>
</br>
<form id="main" method="post" action="index.php">
<div class="row">
	<div class="col-lg-4"></div>
	<div class="col-lg-4">
			<label>Имя пользователя:</label>
			<input class="form-control" type="text" name="user" required value="" placeholder="Ваше имя">
	</div>
	<div class="col-lg-4"></div>
</div>
<div class="row">
	<div class="col-lg-4"></div>
	<div class="col-lg-4">
		<label>Текст новости:</label>
		<textarea class="form-control" name="descriptions" required placeholder="Текст записи"></textarea>
	</div>
	<div class="col-lg-4"></div>
</div>
<div class="row">
	<div class="col-lg-4"></div>
	<div class="col-lg-4">
		<input type="submit" class="btn btn-success" name="submit_news" value="Опубликовать">
	</div>
	<div class="col-lg-4"></div>
</div>
</form>
</br>
<h5>Записи</h5>
</br>

<?php 
foreach ($result as $news) { ?>
	<form method="post" action="product.php">
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-2"><label>Имя пользователя:</label></div>	
			<div class="col-lg-2">	
				<input type="hidden" name="id" disabled value="<?php echo $news->id; ?>">
				<input class="form-control" type="text" name="user" disabled value="<?php echo $news->user; ?>">
			</div>
			<div class="col-lg-4"></div>
			</div>
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-2"><label>Время публикации:</label></div>	
			<div class="col-lg-2">	
				<input class="form-control" type="text" name="date_created" disabled value="<?php echo $news->date_created; ?>">
			</div>
			<div class="col-lg-4"></div>
			</div>
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4"><label>Текст новости</label></div>	
			<div class="col-lg-4"></div>
		</div>
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">	
				<textarea class="form-control" type="text" name="descriptions" disabled value="<?php echo $news->description; ?>"><?php echo $news->description; ?></textarea>
			</div>
			<div class="col-lg-4"></div>
		</div>	
	</form>
	<br>
	<br>
<?php 
} ?>
</body>
</html>