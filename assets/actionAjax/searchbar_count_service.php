<?php
  $dsn = 'mysql:host=localhost;dbname=orphelinat';
  $username = 'root';
  $password = getenv('');

 try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['input'])){
        $input=$_POST['input'];

        $sql="SELECT COUNT(*) FROM services WHERE CONCAT(type) LIKE '%{$input}%'";
        $res = $pdo->query($sql);
        $count = $res->fetchColumn();
               echo"$count data(s) found in the system";
            }
        else{
            echo"no data found into the system";
        }
 }
 catch(PDOException){
echo"base de donnée indisponible revenez plus tard merci!";
 }
 