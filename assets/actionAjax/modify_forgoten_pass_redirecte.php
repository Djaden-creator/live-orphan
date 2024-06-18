<?php
//user self registration
        $dsn = 'mysql:host=localhost;dbname=orphelinat';
        $username = 'root';
        $password = getenv('');
    
        try{
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           if(isset($_POST['modifier'])){

           $mailget=$_POST['mailget'];
           if(empty($mailget)){
            echo '
                <span class="text-danger">pour modifier votre password veuillez ne pas laisser ce champ vide,recommencer</span>
            ';
           }
//security regex for email adresse
elseif(!preg_match('/^[a-zA-Z\d\._]+@[a-zA-Z\d\._].[a-zA-Z\d\._]{2,}+$/',$mailget)){
echo'<span class="text-danger" style="font-size:12px;">invalid email voici le format de votre email ex: Djaden@gmail.com</span>';
}
    else{
          $sql_e = "SELECT * FROM  users WHERE email=:mailget";

          $state=$pdo->prepare($sql_e);
          $state->bindParam(':mailget',$mailget);
          $state->execute();
          //Est-ce que l’utilisateur (mail) existe ?
         $count=$state->rowCount();
         if($count==1){
           ?>
<small class="error text-success" style="font-size:13px;">Votre email a été trouvé,vous pouvez maintenant modifier votre
    mot de passe</small>
<div class="onthis">
    <div class="row">
        <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="hidden" class="hiddenmail" value="<?php echo $mailget; ?>">
            <input type="password" name="password" class="form-control passget" placeholder="password">
        </div>
    </div>
    <div class="col-12 py-2 wow fadeInUp d-flex" data-wow-delay="300ms">
        <input type="checkbox" onclick="ModifythePasswordShow()">Show Password
    </div>
    <button class="btn btn-primary mt-3 wow zoomIn herewego">modifier</button>
</div>
<?php
         }
        else{
            echo'<span class="text-danger">cette adresse email n\'existe pas</span>';
        }
         
    }
}else{
    echo"oups revenez plus tard";
}
}
catch(PDOException $e){
echo"echec" .$e->getMessage();
}
    
       