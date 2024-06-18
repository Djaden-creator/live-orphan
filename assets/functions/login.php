<?php
$dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');
    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //Récupérer les données du formulaire de connexion
        if(isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        //security regex for email adresse
if(!preg_match('/^[a-zA-Z\d\._]+@[a-zA-Z\d\._].[a-zA-Z\d\._]{2,}+$/',$email)){
    $pregmail='<span class="text-danger" style="font-size:12px;">invalid email '.$email.',</span>';
    }
    // Check a value is provided of email
    $lenmail = strlen($email);
    if ($lenmail == 0) {
    $lengsmail='<span class="text-danger" style="font-size:12px;">ce champ ne doit pas etre vide,</span>';
    }
    
    // Check the string is long to long for name
    if ($lenmail >40) {
    $maxmail='<span class="text-danger" style="font-size:12px;">email ne dois pas depasser 40 characteur,</span>';
    }

    //regex for password
      //security regex for password formation
if(!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",$password)){
    $invalipass='<span class="text-danger" style="font-size:12px;">
    le mot de passe doit avoir au moin un characteur en maj,miniscule,one number,un special characteur!@\|
    </span>';
    }
    // Check a value is provided of tel
    $longpass = strlen($password);
    if ($longpass == 0) {
    $longpass='<span class="text-danger" style="font-size:12px;">ce champ ne doit pas etre vide,</span>';
    }
    
    // Check the string is long to long for name
    if ($longpass >20) {
    $maxpass='<span class="text-danger" style="font-size:12px;">
    le mot de pass ne doit pas avoir plus de 20 characters,</span>';
    }
    else
{
$password_hash = md5($password);
//Récupérer les données utilisateurs
$query = "SELECT * FROM users WHERE email = :email and password= :password_hash";

$stmt = $pdo->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password_hash',$password_hash);
$stmt->execute(

array(
'email'=>$email,
'password_hash'=>$password_hash,
)
);
//Est-ce que l’utilisateur (mail) existe ?
$count=$stmt->rowCount();
if($count==1){
foreach($stmt as $rows){
$_SESSION['idUser']=$rows['idUser'];
$_SESSION['name']=$rows['name'];
$_SESSION['email']=$email;
if($_SESSION['idUser']){
$query = "SELECT * FROM users WHERE idUser =".$_SESSION['idUser']."";
$stmt = $pdo->query($query);
$child = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($child as $rowsit){
$hash=md5($rowsit['name']);
if($rowsit['niveau_du_compte']=="bloqué"){
header('location:help.php');
}else{
header('location:timeline.php?itsme='.$_SESSION['idUser'].'/'.$hash.'');
}
}
}

ob_end_flush();
}
}
else{
?>
<div style="display:flex;justify-content:center; align-items:center;
        border-radius:5px;padding:5px;">
    <h5 style="color:red;font-size:12px">
        Desolé vous n'existez pas dans notre systeme créer un compte
    </h5>
</div>
<?php
            }
          
        }
 } 
 } 
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