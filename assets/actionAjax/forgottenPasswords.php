<?php
 $dsn = 'mysql:host=localhost;dbname=orphelinat';
 $username = 'root';
 $password = getenv('');
 try{
     $pdo = new PDO($dsn, $username, $password);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
     //Récupérer les données du formulaire de connexion
     if(isset($_POST['modifier'])){
         $hiddenmail=$_POST['hiddenmail'];
         $passget=$_POST['passget'];
            
         if(empty($passget)||empty($hiddenmail)){
            ?>
<span class="text-danger" style="font-size:14px">ce champ ne peut pas etre vide</span>
<?php
         }
            //security regex for password formation
elseif(!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",$passget)){
    echo'<span class="text-danger" style="font-size:12px;">
    le mot de passe doit avoir au moin un characteur en maj,miniscule,one number,un special characteur!@\| avoir au moins 8 caracteres
    </span>';
    }
        else{
              $password_hash = md5($passget);

              $sql="UPDATE users SET password=:password_hash WHERE email=:hiddenmail";
              
                $statement=$pdo->prepare($sql);
                $statement->bindParam(':password_hash',$password_hash);
                $statement->bindParam(':hiddenmail',$hiddenmail);
               if($statement->execute()){
                 ?>
<span class="text-success" style="font-size:14px">votre mot de passe a été modifié </span>
<?php
               }else{
               ?>
<span class="text-danger" style="font-size:14px">votre mot de passe n'a pas été modifié,recommencez </span>
<?php


            }
}
}else{
    echo'<span class="text-danger">oupss,recommencer </span>';
}
}
 catch (PDOException $e){
     echo "pas de connection revenez plus tard:";
 }