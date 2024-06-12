<?php
$dsn = 'mysql:host=localhost;dbname=orphelinat';
$username = 'root';
$password = getenv('');

try{
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_POST['solution'])){
$myidchild = $_POST['myidchild'];
$myiduser = $_POST['myiduser'];
$myname = $_POST['myname'];
$myemail = $_POST['myemail'];
$mynumber = $_POST['mynumber'];
$mymessage = $_POST['mymessage'];
if(empty($myname)||empty($myemail)||empty($mynumber)||empty($mymessage)){
echo"<span class='alert-danger' style='padding: 3px;font-size 10px;'>tout les champs doivent etre remplis,rfraichissez la page!!</span>";
}
elseif (!preg_match('/^[a-zA-Z\s]+$/',$myname)){
    echo'<span class="text-danger" style="font-size:12px;">votre nom doit avoir au moin une lettre majiscule,miniscule et un espace</span>';
}elseif (!preg_match('/^(?:\+33\s|d)[1-9](?:\s\d{2}){4}$/',$mynumber)){
    echo'<span class="text-danger" style="font-size:12px;">votre numero doit commencer par +33 et des espaces apres deux chifres ex:+33 1 25 63 96 96  avoir que de chiffres</span>';
}elseif(!preg_match('/^[a-zA-Z\d\._]+@[a-zA-Z\d\._].[a-zA-Z\d\._]{2,}+$/',$myemail)){
    echo'<span class="text-danger" style="font-size:12px;">votre email format n\'est pas valide voici un ex:eden@gmai.com</span>';
    }elseif(!preg_match('/^[a-zA-Z\d\s\._\W\w]+$/',$mymessage)){
        echo'<span class="text-danger" style="font-size:12px;">nous acceptons des majiscule,miniscule,chiffre,format invalide sur votre Text</span>';
        }
else{
    $token=random_bytes(3);
    $generate=bin2hex($token);
    
 $sql="INSERT INTO `adoption`(`idchild`, `iduser`, `name`, `email`, `number`, `message`, `create_at`, `status`,`reference`,`decision`)
VALUES (:myidchild,:myiduser,:myname,:myemail,:mynumber,:mymessage,NOW(),'encours',:generate,'encours')";

$statement=$pdo->prepare($sql);
$statement->bindParam(':myidchild',$myidchild);
$statement->bindParam(':myiduser',$myiduser);
$statement->bindParam(':myname',$myname);
$statement->bindParam(':myemail',$myemail);
$statement->bindParam(':mynumber',$mynumber);
$statement->bindParam(':mymessage',$mymessage);
$statement->bindParam(':generate',$generate);
if($statement->execute()){
?>
<div class="alert alert-success">
    <span>
        votre demande a été envoyé,vous allez etre contacter par un de nos agent sur votre
        email ou sur votre messagerie live orphan 7 jour ouvrable
    </span>
</div>
<?php
                              }
                              else{
                                ?>
<div class="alert alert-danger">
    <span>oupps votre demande n'a pas pu etre envoyé veuillez recommencer</span>
</div>

<?php
                }
            }
    }
}
    catch(PDOException $e){
        ?>
<div class="alert alert-danger">
    <span>oupps notre base de donnéé ne repond pas pour le moment veuillez ressayer plus tard</span>
</div>

<?php
    }