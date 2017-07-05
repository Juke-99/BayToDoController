<?php
  try{
    $db = new PDO('mysql:host=localhost;dbname=todo;charset=utf8', 'root', '');
    $sql = $db -> prepare('select * from task_list');
    $sql -> execute();

    while($row = $sql -> fetch()) {
      $db_data[] = array(
        'title' => $row['title'],
        'regist_date' => $row['regist_date'],
        'checkbox' => (bool) $row['checkbox']
      );
    }

    $response['SQL_TEST'] = $db_data;

    header("Content-type: application/json; charset=UTF-8");
    echo json_encode($response);
    $db = null;
  } catch (Exception $e) {

  }
?>
