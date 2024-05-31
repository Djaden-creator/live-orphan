<?php
session_start();
  $dsn = 'mysql:host=localhost;dbname=orphelinat';
  $username = 'root';
  $password = getenv('');

 try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_POST['save'])){
           
           $childid=$_POST['childid'];

            $sql="SELECT * FROM children WHERE idChild='$childid'";
            $stmt = $pdo->query($sql);
            $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($child){
                foreach($child as $rows){
                   ?>
<form class="main-form" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idchildsure" value="<?php echo $childid;?>">
    <input type="hidden" name="childname" value="<?php echo $rows['name'];?>">
    <div class="col-12 py-2 d-flex wow fadeInUp" data-wow-delay="300ms">
        <input type="file" name="photo" class="form-control" style="font-size: 12px;border-radius:4px;" />
    </div>
    <div class="col-12 py-2 d-flex wow fadeInUp" data-wow-delay="300ms">
        <input type="submit" name="edititpicture" class="btn-primary" style="font-size: 12px;border-radius:4px;"
            value="Edit">&nbsp;
        <small class="btn-primary" id="closepictureform" value="<?php echo $childid;?>"
            style="font-size: 12px;border-radius:4px; padding:5px;">close</small>
    </div>
</form>

<?php
               }
           }else{
               echo"pas de reponse disponible";
           }
       }else{
           echo'ouppps revenez plus tard';
       }
    }
 catch(PDOException){
echo"erreur data base";
 }