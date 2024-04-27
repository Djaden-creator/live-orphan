<?php
session_start();
  $dsn = 'mysql:host=localhost;dbname=orphelinat';
  $username = 'root';
  $password = getenv('');

 try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_SESSION['idUser'])){
        if (isset($_POST['action'])){
      
            $idchild=$_POST['idchild'];
           $sql="SELECT * FROM children WHERE idChild='$idchild'";
           $stmt = $pdo->query($sql);
           $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
           if($child){
               foreach($child as $rows){
                   ?>
<div id="closethetagform">
    <div class="row">
        <input type="hidden" id="myiduser" value="<?php echo $_SESSION['idUser']; ?>">
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft ">
            <input type="text " id="myname" class="form-control " placeholder="Full name ">
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInRight ">
            <input type="email" id="myemail" class="form-control " placeholder="Email address.. ">
        </div>
        <div class="col-12 py-2 wow fadeInUp " data-wow-delay="300ms ">
            <input type="text " id="mynumber" class="form-control " placeholder="Number.. ">
        </div>
        <div class="col-12 py-2 wow fadeInUp " data-wow-delay="300ms ">
            <textarea id="mymessage" class="form-control " rows="6 " placeholder="Enter message.. "></textarea>
        </div>
    </div>
    <button class="btn btn-primary mt-3 wow zoomIn" id="solution" value="<?php echo $idchild;?>">Submit
        Request</button>
    <span class="btn btn-danger mt-3 wow zoomIn" id="closemenow" value="<?php echo $idchild;?>">close</span>
</div>

<?php
               }
           }else{
               echo"vous ne pouvez pas faire une demane pour le moment";
           }
       }else{
           echo'ouppps revenez plus tard';
       }
    }        
 }
 catch(PDOException){
echo"erreur data base";
 }