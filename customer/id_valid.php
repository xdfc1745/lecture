<?php
$servername = "localhost";
$username = "root";
$password = "apmsetup";

$connect = mysql_connect($servername, $username, $password);
if ($connect->connect_error) {
  die("connection failed : ".$connect->connect_error);
}

$db_name = "customer";
$db_selector = mysql_select_db($db_name, $connect);

$table_name = "cust";
$query = "select * from ".$table_name;
$result = mysql_query($query, $connect);

if (empty($result))
  echo "there is no table name : ".$table_name."<br>";
//init setting
?>

<?php
  $id_input = $_POST['id_input'];
  $query = "select id from cust where id = ".$id_input;
  $result = mysql_query($query, $connect);

  echo ">> ".$result." < <br>";

  if (empty($result)) {
    //echo $id_input."::<br>";
    $query = "insert into cust(id, cust_name, cust_gender)
    values( ' ".$id_input." ', 'kim','M')";

    if (mysql_query($query, $connect))
        echo "input success<br>";
    else
        echo "input failed<br>";
  }else {
    echo $id_input." is exists<br>";
  }
?>

<?php
  function valid() {
    $id_input = $_POST['id_input'];
    echo $id_ipnut."<br>";
    $query = "select id from cust where id = ".$id_input;
    $result = mysql_query($query, $connect);

    if (empty($result)) {
      //echo $id_input."::<br>";
      $query = "insert into cust(id, cust_name, cust_gender)
      values( ' ".$id_input." ', 'kim','M')";

      if (mysql_query($query, $connect))
          echo "input success<br>";
      else
          echo "input failed<br>";
    }else {
      echo $id_input." is exists<br>";
    }
  }
?>
