<?php
if(strtolower($_SERVER['REQUEST_METHOD']) === 'get')
{
  include('class.php');
  if(isset($_GET['id']) && $_GET['id']!=='')
  {
    $response = $class->enableDriver($_GET['id']);
  }
  header('Location: ../drivers.php');
}
?>