<?php
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_POST['actionall'])){
                $query ="DELETE FROM children";
                $stmt = $pdo->query($query);
                if($stmt){
                    $truncate="TRUNCATE TABLE children";
                    $statment=$pdo->query($truncate);
                    if($statment){
                        echo"<span class='alert alert-success'>
                        vous avez effacé tout les enfants dans votre systeme</span>";
                    }else{
                        echo"<span class='alert alert-success'>
                        impossible de supprimer les enfants pour le moment
                         </span>";
                    }
                                }else{
                                    echo"<span class='alert alert-success'>
                                    impossible de supprimer tout les enfants pour le moment</span>";
                                }
        }else{
            echo"oupps veuillez ressayer plus tard";
        }
}
catch(PDOException $e){
echo"oups revenez plus tard,base de donnée indisponible";
}