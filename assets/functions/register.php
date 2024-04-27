<?php
        $dsn = 'mysql:host=localhost;dbname=orphelinat';
        $username = 'root';
        $password = getenv('');
    
        try{
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           if(isset($_POST['create'])){
            $max=35;
           $name=$_POST['name'];
           $email=$_POST['email'];
           $dob=$_POST['dob'];
           $sex=$_POST['sex'];
           $tel=$_POST['tel'];
           $adresse=$_POST['adresse'];
           $objectif=$_POST['objectif'];
           $password=$_POST['password'];
           if(empty($name)||empty($email)||empty($dob)||empty($sex)||empty($tel)||empty($adresse)
           ||empty($objectif)||empty($password)){
           
            echo '
                <div style="display:flex;justify-content:center; align-items:center;
                            border-radius:5px;padding:10px 10px;">
                         <h5 style="color:red;font-size:15px">
                            *veuillez remplir tout le champ
                         </h5>
                </div>
            ';
           }
//1.security with regex for name
// Check only letters; the regex searches for anything that isn't a plain letter
if (preg_match('/^[a-zA-Z\s]+$/',$name)){
    $pregname='<span class="text-success" style="font-size:12px;">Good name</span>';
}else{
$pregname='<span class="text-danger" style="font-size:12px;">only alphabet allowed</span>';
}
// Check a value is provided of name
$len = strlen($name);
if ($len == 0) {
$lengstring='<span class="text-danger" style="font-size:12px;">ce champ ne doit pas etre vide</span>';
}

// Check the string is long to long for name
if ($len >$max) {
$maxlength='<span class="text-danger" style="font-size:12px;">
 le nom ne peut pas depasser '.$max.'characteur</span>';
}
//security regex for email adresse
if(preg_match('/^[a-zA-Z\d\._]+@[a-zA-Z\d\._].[a-zA-Z\d\._]{2,}+$/',$email)){
$pregmail='<span class="text-success" style="font-size:12px;">valide email</span>';
}else{
$pregmail='<span class="text-danger" style="font-size:12px;">invalid email</span>';
}
// Check a value is provided of email
$lenmail = strlen($email);
if ($lenmail == 0) {
$lengsmail='<span class="text-danger" style="font-size:12px;">ce champ ne doit pas etre vide</span>';
}

// Check the string is long to long for name
if ($lenmail >40) {
$maxmail='<span class="text-danger" style="font-size:12px;">email ne dois pas depasser 40 characteur</span>';
}

//security regex for number formation
if(preg_match('/^[+][\d]{2}[-][\d]{9}$/',$tel)){
    $pretel='<span class="text-success" style="font-size:12px;">valide numero</span>';
    }else{
    $pretel='<span class="text-danger" style="font-size:12px;">invalid number</span>';
    }
    // Check a value is provided of tel
    $lentel = strlen($tel);
    if ($lentel == 0) {
    $lentel='<span class="text-danger" style="font-size:12px;">ce champ ne doit pas etre vide</span>';
    }
    
    // Check the string is long to long for name
    if ($lentel >15) {
    $maxtel='<span class="text-danger" style="font-size:12px;">le numero ne doit pas depasser 15 chiffre</span>';
    }
//security regex for adresse formation
if(preg_match('/^[\d]+[\s][a-zA-Z\s]+[\d]{5}$/',$adresse)){
    $preadress='<span class="text-success" style="font-size:12px;">valide adresse</span>';
    }else{
    $preadress='<span class="text-danger" style="font-size:12px;">invalid adresse</span>';
    }
    // Check a value is provided of tel
    $lenadress = strlen($adresse);
    if ($lenadress == 0) {
    $lenadress='<span class="text-danger" style="font-size:12px;">ce champ ne doit pas etre vide</span>';
    }
    
    // Check the string is long to long for name
    if ($lenadress >50) {
    $maxadress='<span class="text-danger" style="font-size:12px;">le numero ne doit pas depasser 10 characters</span>';
    }

    //security regex for password formation
if(preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",$password)){
    $validpass='<span class="text-success" style="font-size:12px;">valide mot de pass</span>';
    }else{
    $invalipass='<span class="text-danger" style="font-size:12px;">
    le mot de passe doit avoir au moin un characteur en maj,miniscule,one number,un special characteur!@\|
    </span>';
    }
    // Check a value is provided of tel
    $longpass = strlen($password);
    if ($longpass == 0) {
    $longpass='<span class="text-danger" style="font-size:12px;">ce champ ne doit pas etre vide</span>';
    }
    
    // Check the string is long to long for name
    if ($longpass >20) {
    $maxpass='<span class="text-danger" style="font-size:12px;">
    le mot de pass ne doit pas avoirplus de 20 characters</span>';
    }
    else{
        $password_hash = md5($password);
          $sql_u = "SELECT * FROM  users WHERE name=:name";
          $sql_e = "SELECT * FROM  users WHERE email=:email";
          $stmt = $pdo->prepare($sql_u);
          $stmt->bindParam(':name', $name);
          $stmt->execute();

          $state=$pdo->prepare($sql_e);
          $state->bindParam(':email',$email);
          $state->execute();
          //Est-ce que l’utilisateur (mail) existe ?
         $count=$stmt->rowCount();
         $counttwo=$state->rowCount();
         if($count==1){
            ?>
<div class="btn btn-primary" style="display:flex;justify-content:center; align-items:center;
            border-radius:5px;padding:10px 20px;">
    <h5 style="color: #f2f2f2;font-size:18px">
        desolé cet nom existe deja
    </h5>
</div>
<?php
         }
        elseif($counttwo==1){
            ?>
<div style="background-color:#d94350;display:flex;justify-content:center; align-items:center;
            border-radius:5px;padding:10px 20px;">
    <h5 style="color: #f2f2f2;font-size:18px">
        cet adress email est pris trouvez un autre
    </h5>
</div>
<?php
        }else{
                 $sql="INSERT INTO `users`(`name`, `email`, `dbd`, `sex`, `portable`, `adresse`, `objectif`, `password`,
                  `enregistre`, `niveau_du_compte`,`username`)
                  VALUES (:name,:email,:dob,:sex,:tel,:adresse,:objectif, :password_hash, NOW(),'active','none')";
                 
                   $statement=$pdo->prepare($sql);
                   $statement->bindParam(':name',$name);
                   $statement->bindParam(':email',$email);
                   $statement->bindParam(':dob',$dob);
                   $statement->bindParam(':sex',$sex);
                   $statement->bindParam(':tel',$tel);
                   $statement->bindParam(':adresse',$adresse);
                   $statement->bindParam(':objectif',$objectif);
                   $statement->bindParam(':password_hash',$password_hash);
                  if($statement->execute()){
                $_SESSION['name']=$name;
                $_SESSION['email']=$email;
                    header('location:username.php');
                  }else{
                  ?>
<div style="background-color:#d94350;display:flex;justify-content:center;
                     align-items:center;
                          border-radius:5px;padding:10px 20px;">
    <h5 style="color: #f2f2f2;font-size:18px">l'enregistrement a echoué</h5>
</div>
<?php
                  }
                }
         
    }
}
}
catch(PDOException $e){
echo"echec" .$e->getMessage();
}