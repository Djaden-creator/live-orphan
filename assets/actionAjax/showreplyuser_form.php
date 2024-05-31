<?php
session_start();
  $dsn = 'mysql:host=localhost;dbname=orphelinat';
  $username = 'root';
  $password = getenv('');

 try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_POST['save'])){
           
           $idmessage=$_POST['idmessage'];

            $sql="SELECT * FROM message WHERE idmessage='$idmessage'";
            $stmt = $pdo->query($sql);
            $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($child){
                foreach($child as $rows){
                   ?>
<input type="hidden" id="usersender" value="<?php echo $rows['idUser'];?>">
<textarea class="form-control" id="ecrire"></textarea>
<div class="d-flex">
    <button class="btn-primary btn-sm mt-1 p-1 satisfactioncount" id="satisfactionsend"
        value="<?php echo $rows['idmessage']; ?>" style="font-size:10px;">reply</button>&ensp;
    <button class="btn-danger btn-sm mt-1 p-1" id="satisfactionclose" value="<?php echo $rows['idmessage']; ?>"
        style="font-size:10px;">close</button>
</div>

<?php
               }
           }else{
               echo"pas de reponse disponible";
           }
       }else{
           echo'ouppps revenez plus tard';
       }
    }
 catch(PDOException){
echo"erreur data base";
 }