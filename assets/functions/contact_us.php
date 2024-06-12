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

           if(empty($name)){
            $lengname='<span class="text-danger" style="font-size:12px;">ce champ ne doit pas etre vide</span>';
            }
            if(empty($email)){
                $lengsmail='<span class="text-danger" style="font-size:12px;">ce champ ne doit pas etre vide</span>';
            }
            if(empty($reference)){
                $lenref='<span class="text-danger" style="font-size:12px;">ce champ ne doit pas etre vide</span>';
            }
            if(empty($message)){
                $lenmess='<span class="text-danger" style="font-size:12px;">ce champ ne doit pas etre vide</span>';
            }
           
          
//1.security with regex for name
// Check only letters; the regex searches for anything that isn't a plain letter
elseif (!preg_match('/^[a-zA-Z\s]+$/',$name)){
    $pregname='<span class="text-danger" style="font-size:12px;">only alphabet allowed</span>';
}
//security regex for email adresse
elseif(!preg_match('/^[a-zA-Z\d\._]+@[a-zA-Z\d\._].[a-zA-Z\d\._]{2,}+$/',$email)){
    $pregmail='<span class="text-danger" style="font-size:12px;">invalid email</span>';
}
//security regex for reference formation
elseif(!preg_match('/^[a-zA-Z\d]+$/',$reference)){
    $preref='<span class="text-danger" style="font-size:12px;">votre numero de reference n\'est pas valide il doit avoir 6 characters</span>';
    }
    $longreference = strlen($reference);
    if ($longreference > 6) {
    $longpass='<span class="text-danger" style="font-size:12px;">votre numero de reference n\'est pas valide il doit avoir 6 characters</span>';
    }
//security regex for adresse formation
elseif(!preg_match('/^[a-zA-Z\d\s\._\W\w]+$/',$message)){
    $premess='<span class="text-danger" style="font-size:12px;">votre message n\'est pas valide</span>';
    }
    else{
        $sql_e = "SELECT * FROM  adoption WHERE reference=:reference";
        $stmt = $pdo->prepare($sql_e);
        $stmt->bindParam(':reference',$reference);
        $stmt->execute();
         //Est-ce que le numero de reference existe deja?
         $count=$stmt->rowCount();
         if($count==1){
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
                                        border-radius:5px;padding:5px;">
    <h5 style="color:black;font-size:14px">votre message a été envoyé avec succées avec un bon numero de reference</h5>
</div>
<?php
            }else{
            ?>
<div style="background-color:#d94350;display:flex;justify-content:center;
               align-items:center;
                    border-radius:5px;padding:10px 20px;">
    <h5 style="color: #f2f2f2;font-size:12px">votre message n'a pas été envoyé</h5>
</div>
<?php
            }

         }
         else{
            ?>
<div class="alert alert-danger" style="display:flex;justify-content:center;
               align-items:center;
                    border-radius:5px;padding:5px;">
    <h5 style="color:black;font-size:14px">veuillez mettre un bon numero de reference ou sans cela contactez nous
        directement sur notre email:djaden@gmail.com</h5>
</div>
<?php
         }
    }
}
}
catch(PDOException $e){
echo"echec" .$e->getMessage();
}