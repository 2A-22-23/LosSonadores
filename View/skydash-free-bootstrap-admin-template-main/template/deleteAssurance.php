<?php
include 'C:\xampp\htdocs\t_assurance\Controller\Assurance.php';

if (isset($_POST['delete']))
{
    $id = $_POST['delete'];
    $ass = new Assurance();
    $ass->deleteAssurance($id);
}

header('Location: assurance.php');
exit;
?>