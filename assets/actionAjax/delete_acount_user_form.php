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
                $query = "SELECT * FROM users where idUser='$iduser'";
            $stmt = $pdo->query($query);
            $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            //Afficher les utilisateurs
            foreach($child as $rows){
             ?>
<span style="font-size:12px;display:flex;justify-content:center;">voulez-vous l'effacer?</span>
<div class="d-flex" style="column-gap:3px;">
    <button type="submit" id="ouiuser" value="<?php echo $rows['idUser']?>" class=" btn btn-danger mb-3">oui</button>
    <button type="submit" id="nonuser" value="<?php echo $rows['idUser']?>" class="btn btn-success mb-3">non</button>
</div>
<?php
            }
        }
}
}
catch(PDOException $e){
echo"error";
}