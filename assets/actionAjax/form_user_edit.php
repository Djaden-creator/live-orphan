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
<div class="p-2" id="closethetagform<?php echo $iduser; ?>">
    <div id="notifications<?php echo $iduser; ?>"></div>
    <div class="row ">
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft ">
            <input type="text" id="myname" class="form-control " value="<?php echo $rows['name']; ?>">
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft ">
            <input type="email" id="myemail" class="form-control " value="<?php echo $rows['email']; ?>">
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft ">
            <input type="date" id="mydob" class="form-control " value="<?php echo $rows['dbd']; ?>">
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft ">
            <input type="text " id="mytel" class="form-control " value="<?php echo $rows['portable']; ?>">
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select id="mysex" class="custom-select">
                <?php
                  if($rows['sex']=="Mr"){
                    ?>
                <option value="<?php echo $rows['sex']; ?>"><?php echo $rows['sex']; ?></option>
                <option value="Mrs">Mrs</option>
                <option value="bisex">bisex</option>
                <?php
                  }elseif($rows['sex']=="Mrs"){
                    ?>
                <option value="<?php echo $rows['sex']; ?>"><?php echo $rows['sex']; ?></option>
                <option value="Mr">Mr</option>
                <option value="bisex">bisex</option>
                <?php
                  }else{
                    ?>
                <option value="<?php echo $rows['sex']; ?>"><?php echo $rows['sex']; ?></option>
                <option value="Mrs">Mr</option>
                <option value="Mrs">Mrs</option>
                <?php
                  }               
               ?>
            </select>
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select id="myobjectif" class="custom-select">
                <?php
                  if($rows['objectif']=="adopter"){
                    ?>
                <option value="<?php echo $rows['objectif']; ?>"><?php echo $rows['objectif']; ?></option>
                <option value="financer">je veux financer</option>
                <option value="plaisir">juste pour me familiariser</option>
                <?php
                }
                elseif($rows['objectif']=="financer"){
                    ?>
                <option value="<?php echo $rows['objectif']; ?>"><?php echo $rows['objectif']; ?></option>
                <option value="adopter">je veux adopter</option>
                <option value="plaisir">juste pour me familiariser</option>
                <?php
                }
                else{
                    ?>
                <option value="<?php echo $rows['objectif']; ?>"><?php echo $rows['objectif']; ?></option>
                <option value="adopter">je veux adopter</option>
                <option value="financer">je veux financer</option>
                <?php
                }
                ?>
            </select>
        </div>

        <div class="col-12 wow fadeInLeft ">
            <input type="text" id="myaddresse" class="form-control " value="<?php echo $rows['adresse']; ?>">
        </div>

    </div>
    <button class="btn btn-primary mt-3 wow zoomIn" id="toedit" value="<?php echo $iduser;?>">Submit Request</button>
    <button class="btn btn-danger mt-3 wow zoomIn" id="closeedituserform" value="<?php echo $iduser;?>">close</button>
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