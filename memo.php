<?php
if(isset($_POST['memo']) && isset($_POST['title'])) {
  try {
    $db = new PDO('mysql:host=localhost;dbname=todo;charset=utf8','root','');
    $write = $db -> prepare('update task_list set memo=:memo where title=:title');
    $write -> bindvalue(':memo',$_POST['memo']);
    $write -> bindvalue(':title',$_POST['title']);
    $write -> execute();
    $db = null;
  } catch (Exception $e) {

  }
}
?>
