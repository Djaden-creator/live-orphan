<?php
$dsn = 'mysql:host=localhost;dbname=orphelinat';
$username = 'root';
$password = getenv('');

try{
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_POST['action'])){
$name = $_POST['name'];
$email = $_POST['email'];
$note = $_POST['note'];
$message = $_POST['message'];
if(empty($name)||empty($email)||empty($note)||empty($message)){
echo"<span class='alert alert-danger'>tout les champs doivent etre remplis</span>";
}
elseif (!preg_match('/^[a-zA-Z\s]+$/',$name)){
    echo'<span class="text-danger" style="font-size:12px;">only alphabet allowed for the name</span>';
}
//security regex for email adresse
elseif(!preg_match('/^[a-zA-Z\d\._]+@[a-zA-Z\d\._].[a-zA-Z\d\._]{2,}+$/',$email)){
    echo'<span class="text-danger" style="font-size:12px;">invalid email</span>';
}
//security regex for adresse formation
elseif(!preg_match('/^[a-zA-Z\d\s\._\W\w]+$/',$message)){
    echo'<span class="text-danger" style="font-size:12px;">votre message n\'est pas valide</span>';
    }
else{

$sql="INSERT INTO `reviews`(`name`, `email`, `note`, `description`, `create_at`, `status`)
VALUES (:name,:email,:note,:message,NOW(),'nonactive')";

$statement=$pdo->prepare($sql);
$statement->bindParam(':name',$name);
$statement->bindParam(':email',$email);
$statement->bindParam(':note',$note);
$statement->bindParam(':message',$message);
if($statement->execute()){
?>
<span class='alert alert-success'>votre temoignage a été enregistré avec succée</span>
<?php
                              }
                              else{
                                ?>
<span class='alert alert-danger'>oupps votre temoignage n'a pas pu etre enregistré veuillez recommencer</span>
<?php
                }
            }
    }
}
    catch(PDOException $e){
        ?>
<span class='alert alert-danger'>notre base de donnée ne pas disponible pour le moment reesayez plus tard</span>
<?php
    }