<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/models/cities.php';

$citiesClass = new Cities();
$cities = $citiesClass->get_all();

$id = $_GET['id'] ?? '';

$carsData = ['id'=> '', 'name' => '', 'post_index'=>''];

if(!empty($id))
{
    include_once $_SERVER['DOCUMENT_ROOT'].'/models/cars.php';

    $carsClass = new Cars();
    $result = $carsClass->get_one(['id' => $id]);
    if($result){
        $carsData = $result;
    }
}

include_once $_SERVER['DOCUMENT_ROOT'].'/models/cars.php';
$carClass = new Cars();
$cars = $carClass->get_all();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ДОбавление авто</title>
</head>
<body>

<form action="/controllers/save.php?operator=addcar" method="post">
    <p>
        <label for="">Название авто</label>
        <input type="text" name="name" value="<?php echo $carsData['name'] ?>">
    </p>
    <p>
        <label for="">Год выпуска</label>
        <input type="text" name="year_create" value="<?php echo $carsData['year_create'] ?>">
    </p>
    <p>
        <label for="">Город</label>
        <select name="city_id">
            <?php foreach ($cities as $city) {?>
                <option value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option>
            <?php } ?>
        </select>
    </p>
    <p>
        <input type="hidden" name="id" value="<?php echo $carsData['id']?>">
        <button>Сохранить</button>
    </p>
</form>

<ol>
    <?php foreach ($cars as $car) {?>
        <li><?php echo $car['name']; ?></li>
        <a href="addCar.php?id=<?php echo $car['id']?>">Редактировать</a>
    <?php } ?>
</ol>

</body>
</html>
