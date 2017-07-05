<?php
if(isset($_POST['title'])) {
  try{
    $db = new PDO('mysql:host=localhost;dbname=todo;charset=utf8', 'root', '');
    $sql = $db -> prepare('select memo from task_list where title=:title');
    $sql -> bindvalue(':title',$_POST['title']);
    $sql -> execute();

    while($row = $sql -> fetch()) {
      $db_data[] = array(
        'memo' => $row['memo']
      );
    }

    $response['SQL_TEST'] = $db_data;

    header("Content-type: application/json; charset=UTF-8");
    echo json_encode($response);
    $db = null;
  } catch (Exception $e) {

  }
}
?>
