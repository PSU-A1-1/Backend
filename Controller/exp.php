<?php
include_once "../Model/user_model.php";

$UserModel = new User();

echo $UserModel->getNewId();


?>