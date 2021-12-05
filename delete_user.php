<?php
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

if (!empty($_GET['id'])) {
   // var_dump($_GET['token']);
   // var_dump($_SESSION['token']);
   // die();
    if($_GET['token'] == $_SESSION['token']){
        //var_dump(($_GET['id']));die();
    $id = $_GET['id'];
    $userModel->deleteUserById($id);//Delete existing user
    }
}
header('location: list_users.php');
?>