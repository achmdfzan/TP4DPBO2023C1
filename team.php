<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Team.controller.php");

$team = new TeamController();

if (isset($_POST['add'])) {
    //memanggil add
    $team->add($_POST);
}
//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $team->delete($id);
} else if (isset($_POST['edit'])) {
    $team->edit($_POST);
} else {
    $team->index();
}
