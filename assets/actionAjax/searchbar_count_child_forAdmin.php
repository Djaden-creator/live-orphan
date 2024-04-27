<?php
  $dsn = 'mysql:host=localhost;dbname=orphelinat';
  $username = 'root';
  $password = getenv('');

 try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['input'])){
        $input=$_POST['input'];

        $sql="SELECT COUNT(*) FROM children WHERE CONCAT(name,date,sex) LIKE '%{$input}%'";
        $res = $pdo->query($sql);
        $count = $res->fetchColumn();
               echo"$count datas found in the system";
            }
        else{
            echo"no data found into the system";
        }
 }
 catch(PDOException){
echo"erreur data base";
 }
 