<?php
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_POST['action'])){
         ?>
<span class="text-danger" style="font-size:12px;display:flex;justify-content:center;">
    voulez-vous effacer tout les utilisateurs?
</span>
<div class="d-flex" style="justify-content:center;column-gap:3px;">
    <button type="submit" id="ouiAlluser" class=" btn btn-danger mb-3">oui</button>
    <button type="submit" id="nonAlluser" class="btn btn-success mb-3">non</button>
</div>
<?php
               
        }
}
catch(PDOException $e){
echo"error";
}