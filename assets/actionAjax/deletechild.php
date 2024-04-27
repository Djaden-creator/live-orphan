<?php
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_POST['actiondelete'])){
            $idchild=$_POST['idchild'];

            if(empty($idchild)){
                echo"oups revenez plus tard";
            }else{
                $query = "DELETE FROM children where idChild='$idchild'";
                $stmt = $pdo->query($query);
                if($stmt){
                    echo"effacer";
                }
        }
}
}
catch(PDOException $e){
echo"error";
}