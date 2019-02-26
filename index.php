<?
include_once $_SERVER['DOCUMENT_ROOT'].'/models/cities.php';
$citiesClass = new Cities();
$cities = $citiesClass->get_all();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Список городов</h1>

<?php foreach ($cities as $city):?>
<p><?php echo $city['name']?></p>
<?php endforeach;?>
</body>
</html>