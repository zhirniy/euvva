<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>EUVVA</title>
	<!-- Подключаем Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link href='View/style.css' rel='stylesheet' type='text/css'>
</head>
<body>
<!-- Форма ввода данных -->
</br>
<h5>Гостевая книга</h5>
</br>
<form id="main" method="post" action="index.php">
<div class="row">
	<div class="col-lg-4"></div>
	<div class="col-lg-4">
			<label>Имя пользователя:</label>
			<input class="form-control" type="text" name="user" required pattern="[а-яА-Яa-zA-Z0-9_]{2,}" value="" placeholder="Ваше имя">
	</div>
	<div class="col-lg-4"></div>
</div>
<div class="row">
	<div class="col-lg-4"></div>
	<div class="col-lg-4">
		<label>Текст новости:</label>
		<textarea class="form-control" name="description" required placeholder="Текст записи"></textarea>
	</div>
	<div class="col-lg-4"></div>
</div>
<div class="row">
	<div class="col-lg-4"></div>
	<div class="col-lg-4">
		<input type="submit" class="btn btn-success" name="" value="Опубликовать">
	</div>
	<div class="col-lg-4"></div>
</div>
</form>
<!-- Форма ввода данных -->
</br>
<h5>Записи</h5>
</br>
<!-- Записи из базы данных -->
<?php 
foreach ($params as $news) { ?>
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
<!-- Записи из базы данных -->
</body>
</html>