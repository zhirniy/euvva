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

$sth = $dbh->prepare("SELECT * FROM news");
$sth->execute();
$result = $sth->fetchAll(PDO::FETCH_CLASS, "News");
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>EUVVA</title>
</head>
<body>
<form method="post" action="index.php">
		<label>Имя пользователя:</label>
		<input type="text" name="user" required value="">
		<label>Текст новости:</label>
		<textarea name="descriptions" required></textarea>
		<input type="submit" name="submit_news" value="Опубликовать3">
</form>


<?php 

foreach ($result as $news) { ?>
	<form method="post" action="product.php">
		<input type="hidden" name="id" disabled value="<?php echo $news->id; ?>">
		<input type="text" name="user" disabled value="<?php echo $news->user; ?>">
		<input type="text" name="descriptions" disabled value="<?php echo $news->description; ?>">
		<input type="text" name="date_created" disabled value="<?php echo $news->date_created; ?>">
	</form>
	<br>
<?php 
} ?>
</body>
</html>