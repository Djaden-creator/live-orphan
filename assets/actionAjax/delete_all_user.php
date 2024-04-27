<?php
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_POST['action'])){
            
                $query = "DELETE FROM users";
                $stmt = $pdo->query($query);
                if($stmt){
                    $truncate="TRUNCATE TABLE users";
                    $statment=$pdo->query($truncate);
                    if($statment){
                        echo"<span class='alert alert-success'>
                        vous avez effacé tout les comptes utilisateurs dans votre systeme</span>";
                    }else{
                        echo"<span class='alert alert-success'>impossible de supprimer tout les compte utilisateurs
                         pour le moment</span>";
                    }
                                }else{
                                    echo"<span class='alert alert-success'>
                                    impossible de supprimer tout les comptes pour le moment</span>";
                                }
                        }
}
catch(PDOException $e){
echo"<span class='alert alert-danger'>ouppps revenez plus tard</span>";
}