<?php
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_POST['action'])){
            $iduser=$_POST['iduser'];
            if(empty($iduser)){
                echo"oups revenez plus tard";
            }else{
                $query = "DELETE from users where idUser='$iduser'";
            $stmt = $pdo->query($query);
            $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
}
}
catch(PDOException $e){
echo"oupss revenez plus tard";
}