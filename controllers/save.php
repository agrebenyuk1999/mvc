<?php


if(isset($_GET['operator'])){

    //добавление города
    if($_GET['operator'] == 'addcity'){
        include_once $_SERVER['DOCUMENT_ROOT'].'/models/cities.php';

        $cityClass = new Cities();
        $result = $cityClass->insert($_POST);
        if($result){
            echo 'данные сохранены!';
        }
    }

    if($_GET['operator'] == 'addcar'){
        include_once $_SERVER['DOCUMENT_ROOT'].'/models/cars.php';

        $carsClass = new Cars();

        if(!empty($_POST['id'])){
            $result = $carsClass->update($_POST);
        }else{
            unset($_POST['id']);
            $result = $carsClass->insert($_POST);
        }

        if($result){
            echo 'данные сохранены!';
        }
    }

}

?>
