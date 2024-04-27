<?php
session_start();
  $dsn = 'mysql:host=localhost;dbname=orphelinat';
  $username = 'root';
  $password = getenv('');

 try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_POST['action'])){
      
           $iduser=$_POST['iduser'];
           $sql="SELECT * FROM users WHERE idUser='$iduser'";
           $stmt = $pdo->query($sql);
           $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
           if($child){
               foreach($child as $rows){
                   ?>
<div class="p-2" id="passwordform<?php echo $iduser; ?>">
    <div id="notificationpassword<?php echo $iduser; ?>"></div>
    <div class="row" style="row-gap:8px;">
        <div class="col-12 py-2 wow fadeInUp d-flex" data-wow-delay="300ms">
            <input type="password" id="password" class="form-control myInput" placeholder="new Password">
        </div>
        <div class="col-12 py-2 wow fadeInUp d-flex" data-wow-delay="300ms">
            <input type="password" id="confirmer" class="form-control myconfirmpass"
                placeholder="confirmer votre password">
        </div>
        <div class="col-12 d-block" style="row-gap:7px;">
            <div>
                <input type="checkbox" onclick="myFunction()">Show Password
            </div>
            <div>
                <input type="checkbox" onclick="myConfirmation()">Show the confirmation pass
            </div>
        </div>

    </div>
    <button class="btn btn-primary mt-3 wow zoomIn" id="confirm" value="<?php echo $iduser;?>">Submit Request</button>
    <button class="btn btn-danger mt-3 wow zoomIn" id="closepassform" value="<?php echo $iduser;?>">close</button>
</div>

<?php
               }
           }else{
               echo"vous ne pouvez pas faire une demane pour le moment";
           }
       }else{
           echo'ouppps revenez plus tard';
       }
    }
 catch(PDOException){
echo"erreur data base";
 }