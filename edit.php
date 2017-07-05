<?php
if(isset($_POST['title'])) {
  try {
    $db = new PDO('mysql:host=localhost;dbname=todo;charset=utf8','root','');
    $write = $db -> prepare('insert into task_list(title) values(:title)');
    $write -> bindvalue(':title',$_POST['title']);
    $write -> execute();
    $db = null;
  } catch (Exception $e) {

  }
}
?>
