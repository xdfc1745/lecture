<?php
  $servername = "localhost";
  $username = "root";
  $password = "apmsetup";

  $connect = mysql_connect($servername, $username, $password);
  if ($connect->connect_error) {
    die("connection failed : ".$connect->connect_error);
  }

  //create  DB if not exists
  $db_name = "customer2";
  $db_selector = mysql_select_db($db_name, $connect);

  $query = "create database ".$db_name;

  if (!mysql_query($query, $connect)) {
    echo "failed<br>";
  }

  //create table if not exists
  $table_name = "cust";
  $query = "select * from ".$table_name;
  $result = mysql_query($query, $connect);

  if (empty($result)) {
    $query = "create table cust(
        cust_num int auto_increment,
        id char(16) not null,
        cust_name char(64),
        cust_gender char,
        primary key(cust_num)
      )";
    $result = mysql_query($query, $connect);
  }else {
    echo "table exist<br>";
  }
?>
