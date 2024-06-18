<?php
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_POST['action'])){
            
                $query ="DELETE FROM adoption where decision='en avance'";
                $stmt = $pdo->query($query);
                if($stmt){
                    $truncate="TRUNCATE TABLE adoption";
                    $statment=$pdo->query($truncate);
                    if($statment){
                        echo"la liste de demande en en avance est vide...";
                    }else{
                        echo"<span class='text-danger'>impossible de supprimer toute les demandes en avance
                         pour le moment</span>";
                    }
                                }else{
                                    echo"<span class='text-danger'>
                                    impossible de supprimer toute les demande pour le moment</span>";
                                }
                        }
}
catch(PDOException $e){
$get->error($e->getMessage());
echo $get;
}