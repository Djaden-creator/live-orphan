<?php
//count record for visitor in the search bar of timeline page
  $dsn = 'mysql:host=localhost;dbname=orphelinat';
  $username = 'root';
  $password = getenv('');

 try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['save'])){
        $idmessage=$_POST['idmessage'];
        $usersender=$_POST['usersender'];
        
        $sql="SELECT COUNT(*) FROM message WHERE idUser=$usersender  AND status='unread'";
        $res = $pdo->query($sql);
        $count = $res->fetchColumn();
        if($count){
           ?>
<span class="mai-chatbubble" style="background-color:#d94350;color:white;padding:6px;border-radius:5px;">
    <?php
                 echo $count;
               ?>
</span>
<?php
        }else{
            
                ?>
<span class="mai-trophy" style="background-color:#d94350;color:white;padding:6px;border-radius:5px;">
</span>
<?php
           
        }
       ?>
<?php
 }
}
 catch(PDOException){
echo"erreur data base";
 }