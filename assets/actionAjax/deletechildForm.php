<?php
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_POST['actionone'])){
            $idchild=$_POST['idchild'];
            if(empty($idchild)){
                echo"oups revenez plus tard";
            }else{
                $query = "SELECT * FROM children where idChild='$idchild'";
            $stmt = $pdo->query($query);
            $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            //Afficher les utilisateurs
            foreach($child as $rows){
             ?>
<span style="font-size:12px;display:flex;justify-content:center;">voulez-vous effacer?</span>
<div class="d-flex" style="column-gap:3px;">
    <button type="submit" id="oui" value="<?php echo $rows['idChild']?>" class=" btn btn-danger mb-3">oui</button>
    <button type="submit" id="non" value="<?php echo $rows['idChild']?>" class="btn btn-success mb-3">non</button>
</div>
<?php
            }
        }
}
}
catch(PDOException $e){
echo"error";
}