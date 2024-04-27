<?php
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_POST['action'])){
            $iddemande=$_POST['iddemande'];
            if(empty($iddemande)){
                echo"oups revenez plus tard";
            }else{
                $query ="DELETE FROM adoption where idAdoption ='$iddemande'";
            $stmt = $pdo->query($query);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($result){
                ?>
<span class="alert alert-success">Demande effacer</span>
<?php
            }else{
                ?>
<span class="alert alert-success">oupsss revenez plus tard</span>
<?php 
            }

        }
}
}
catch(PDOException $e){
echo"oupss revenez plus tard";
}