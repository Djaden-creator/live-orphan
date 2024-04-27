<?php
ob_start();
class User{

//user session detail
public function userdatail(){
    
        $dsn = 'mysql:host=localhost;dbname=orphelinat';
        $username = 'root';
        $password = getenv('');
        try{
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            //Récupérer les données du formulaire de connexion
            if(isset($_SESSION['idUser'])){
                       
                $sql="SELECT * FROM users WHERE idUser=".$_SESSION['idUser']."";
                $stmt = $pdo->query($sql);
                $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($child as $rows){
                        $dateOfBirth = $rows['dbd'];
                $today = date("Y-m-d");
                $diff = date_diff(date_create($dateOfBirth), date_create($today));
                        ?>
<div class="card mb-3" id="showformuser<?php echo $rows['idUser'];?>">
    <div class="card-body details">
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
            </div>
            <div class="col-sm-9 text-dark">
                <?php echo $rows['name'];?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
            </div>
            <div class="col-sm-9 text-dark">
                <?php echo $rows['email'];?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3 text-dark">
                <h6 class="mb-0">Phone</h6>
            </div>
            <div class="col-sm-9 text-dark">
                <?php echo $rows['portable'];?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3 ">
                <h6 class="mb-0">sex</h6>
            </div>
            <div class="col-sm-9 text-dark">
                <?php echo $rows['sex'];?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <h6 class="mb-0">age</h6>
            </div>
            <div class="col-sm-9 text-dark">
                <?php echo $diff->format('%y%');?> ans
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12 d-flex" style="column-gap:6px;">
                <button class="btn btn-primary detailedit" value="<?php echo $rows['idUser'];?>">Edit</button>
                <button class="btn btn-primary passwordchange" value="<?php echo $rows['idUser'];?>">changer mot de
                    passe</button>
            </div>
        </div>
    </div>
</div>

<?php
        }}}
        catch (PDOException $e){
            ?>
<div class="btn btn-danger" style="display:flex;justify-content:center; align-items:center;
            border-radius:5px;padding:10px 20px;">
    <h5 style="color: #f2f2f2;font-size:18px">
        oops impossible de se connecter a la base de donnée
    </h5>
</div>
<?php
           
        }
        }

//function of counting number of users in the database:
public function countuserRow(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');
       
    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql="SELECT COUNT(*) FROM users";
        $res = $pdo->query($sql);
        $count = $res->fetchColumn();
        echo $count;
    }catch(PDOException $e){
        ?>
<div style="background-color:#d94350;display:flex;justify-content:center; align-items:center;
            border-radius:5px;padding:10px 20px;">
    <h5 style="color: #f2f2f2;font-size:18px">
        ouff nous ne pouvons pas compter vos produit pour le moment
    </h5>
</div>
<?php
    }
   }

//fetch all user for the admin 
public function getUser(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //getting all data from the database
        $query = "SELECT * FROM users";
        $stmt = $pdo->query($query);
        $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        //Afficher les utilisateurs
        if($child){
            foreach($child as $rows){
                $dateOfBirth = $rows['dbd'];
                $today = date("Y-m-d");
                $diff = date_diff(date_create($dateOfBirth), date_create($today));
                ?>
<tbody class="fetchrecord" id="fulluser<?php echo $rows['idUser']?>">
    <tr>
        <td>
            <span class="custom-checkbox">
                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                <label for="checkbox1"></label>
            </span>
        </td>
        <td><?php echo $rows['name']?></td>
        <td><?php echo $diff->format('%y'); ?> ans</td>
        <?php
           if($rows['idUser']==1){
            ?><td>Administrateur</td><?php
           }elseif($rows['idUser']==2){
            ?><td>Moderateur</td><?php
           }
           else{
            ?><td>Utilisateur</td><?php
           }
        ?>
        <?php
           if ($rows['niveau_du_compte']=="active"){
            ?><td id="buttonbloquer<?php echo $rows['idUser']?>"><button class="btn-primary" id="activer"
                value="<?php echo $rows['idUser']?>">
                active</button></td><?php
           }
           else{
            ?><td id="buttonactive<?php echo $rows['idUser']?>"><button class="btn-primary" id="bloquer"
                value="<?php echo $rows['idUser']?>">bloqué
            </button></td><?php
           }
        ?>
        <td class="d-flex">
            <button id="delete_user" style="border: none;background:none;outline:none;"
                value="<?php echo $rows['idUser']?>"><i class="material-icons" data-toggle="tooltip"
                    title="Delete">&#xE872;</i></button>
        </td>
        <td>
            <!-- here the form -->
            <div class="gap-3 formduserdelete<?php echo $rows['idUser']?>">
            </div>
            <!-- here the form -->
        </td>
    </tr>

</tbody>

<?php
             }
        }else{
            echo"no data found in the system";
        }
      
}
catch(PDOException $e){
    echo"error",$e ->getMessage();
}
}
//here to choose the username:
public function chooseUsernameone(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
 $username = 'root';
 $password = getenv('');
 try{
     $pdo = new PDO($dsn, $username, $password);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
     //Récupérer les données du formulaire de connexion
     if(isset($_POST['sendone'])){
         $id=$_POST['id'];
         $one=$_POST['one'];
              $sql="UPDATE users SET username='$one' WHERE idUser=:id";
                $statement=$pdo->prepare($sql);
                $statement->bindParam(':id',$id);
               if($statement->execute()){
                header('location:welcomepage.php');
            }
        }
}
 catch (PDOException $e){
     echo "impossible de creer un username pour le moment veuillez recommencer".$e->getMessage();
 }
}
// here the username two:
public function chooseUsernametwo(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
 $username = 'root';
 $password = getenv('');
 try{
     $pdo = new PDO($dsn, $username, $password);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
     //Récupérer les données du formulaire de connexion
     if(isset($_POST['sendtwo'])){
         $id=$_POST['id'];
         $two=$_POST['two'];
              $sql="UPDATE users SET username='$two' WHERE idUser=:id";
                $statement=$pdo->prepare($sql);
                $statement->bindParam(':id',$id);
               if($statement->execute()){
                header('location:welcomepage.php');
            }
        }
}
 catch (PDOException $e){
     echo "impossible de creer un username pour le moment veuillez recommencer".$e->getMessage();
 }
}

// here the username three:
public function chooseUsernamethree(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
 $username = 'root';
 $password = getenv('');
 try{
     $pdo = new PDO($dsn, $username, $password);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
     //Récupérer les données du formulaire de connexion
     if(isset($_POST['sendthree'])){
         $id=$_POST['id'];
         $three=$_POST['three'];
              $sql="UPDATE users SET username='$three' WHERE idUser=:id";
                $statement=$pdo->prepare($sql);
                $statement->bindParam(':id',$id);
               if($statement->execute()){
                header('location:welcomepage.php');
            }
        }
}
 catch (PDOException $e){
     echo "impossible de creer un username pour le moment veuillez recommencer".$e->getMessage();
 }
}

// here the username customusername:
public function customUsername(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
 $username = 'root';
 $password = getenv('');
 try{
     $pdo = new PDO($dsn, $username, $password);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
     //Récupérer les données du formulaire de connexion
     if(isset($_POST['customname'])){
        $max=20;
         $four=$_POST['four'];
         $myusername=$_POST['myusername'];
        if(preg_match('/^[a-zA-Z\d\._]+$/',$myusername)){
             echo'<span class="text-success" style="font-size:12px;">username valide</span>';
         }else{
            echo'<span class="text-danger" style="font-size:12px;">username invalide</span>';
         }
         // Check a value is provided of name
$lenusername = strlen($myusername);
if ($lenusername == 0) {
echo'<span class="text-danger" style="font-size:12px;">ce champ ne doit pas etre vide</span>';
}

// Check the string is long to long for name
elseif ($lenusername >$max) {
echo'<span class="text-danger" style="font-size:12px;">
 votre username ne peut pas depasser '.$max.'characteur</span>';
}
         else{
              $sql_u = "SELECT * FROM  users WHERE username=:myusername";
              $stmt = $pdo->prepare($sql_u);
              $stmt->bindParam(':myusername', $myusername);
              $stmt->execute();
              //Est-ce que l’utilisateur (username) existe ?
             $count=$stmt->rowCount();
             if($count==1){
                echo"<span class='alert alert-danger'>
                une autre personne utilise deja ce username choisissez un autre</span>";
             }else{
                $sql="UPDATE users SET username='$myusername' WHERE idUser=:four";
                $statement=$pdo->prepare($sql);
                $statement->bindParam(':four',$four);
                if($statement->execute()){
                header('location:welcomepage.php');
             }
            }

          }

       }
}
catch (PDOException $e){
echo "impossible de creer un username pour le moment veuillez recommencer".$e->getMessage();
}
}
}