<?php
        $dsn = 'mysql:host=localhost;dbname=orphelinat';
        $username = 'root';
        $password = getenv('');
    
        try{
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           if(isset($_POST['send'])){
          
            $max=35;
           $idUser=$_POST['idUser'];
           $name=$_POST['name'];
           $email=$_POST['email'];
           $reference=$_POST['reference'];
           $message=$_POST['message'];
          
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
if(preg_match('/^[a-zA-Z\d]+$/',$reference)){
    $preref='<span class="text-success" style="font-size:12px;">votre numero de reference est pas valide</span>';
    }else{
    $preref='<span class="text-danger" style="font-size:12px;">votre numero de reference n\'est pas valide</span>';
    }
    // Check a value is provided of tel
    $lenref = strlen($reference);
    if ($lenref == 0) {
    $lenref='<span class="text-danger" style="font-size:12px;">ce champ ne doit pas etre vide</span>';
    }
    
    // Check the string is long to long for name
    if ($lenref >6) {
    $maxref='<span class="text-danger" style="font-size:12px;">
    votre numero de reference ne doit pas depasser 6 caracteres</span>';
    }
//security regex for adresse formation
if(preg_match('/^[a-zA-Z\d\._]+$/',$message)){
    $premess='<span class="text-success" style="font-size:12px;">votre message est valide </span>';
    }else{
    $premess='<span class="text-danger" style="font-size:12px;">votre message n\'est pas valide</span>';
    }
    // Check a value is provided of tel
    $lenmess = strlen($message);
    if ($lenmess == 0) {
    $lenmess='<span class="text-danger" style="font-size:12px;">ce champ ne doit pas etre vide</span>';
    }
    else{
       
                 $sql="INSERT INTO `message`(`idUser`, `name`, `email`, `reference_number`, `description`, `create_at`, `status`)
                  VALUES (:idUser,:name,:email,:reference,:message,NOW(),'unread')";
                 
                   $statement=$pdo->prepare($sql);
                   $statement->bindParam(':idUser',$idUser);
                   $statement->bindParam(':name',$name);
                   $statement->bindParam(':email',$email);
                   $statement->bindParam(':reference',$reference);
                   $statement->bindParam(':message',$message);
        
                  if($statement->execute()){
                    ?>
<div class="alert alert-success" style="display:flex;justify-content:center;
                                         align-items:center;
                                              border-radius:5px;padding:10px;">
    <h5 style="color:black;font-size:18px">votre message a été envoyé avec succées</h5>
</div>
<?php
                  }else{
                  ?>
<div style="background-color:#d94350;display:flex;justify-content:center;
                     align-items:center;
                          border-radius:5px;padding:10px 20px;">
    <h5 style="color: #f2f2f2;font-size:18px">votre message n'a pas été envoyé</h5>
</div>
<?php
                  }
                }
         
    }
}
catch(PDOException $e){
echo"echec" .$e->getMessage();
}