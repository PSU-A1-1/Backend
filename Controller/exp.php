<?php
include_once "../Model/user_model.php";
include_once '../Model/cardholder.php';
include_once '../Model/volunteer.php';

$UserModel = new User();

echo $UserModel->getNewId();


?>