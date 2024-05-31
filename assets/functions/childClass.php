<?php
//class of children all task
class babiesClass{
//adding child in the database
    public function babies(){
        $dsn = 'mysql:host=localhost;dbname=orphelinat';
        $username = 'root';
        $password = getenv('');
    
        try{
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if(isset($_POST['saveit'])){
                $name = $_POST['name'];
                $date = $_POST['date'];
                $sex = $_POST['sex'];
                $pays = $_POST['pays'];
                $photo = $_FILES['photo'];
                if(empty($name)||empty($date)||empty($sex)||empty($pays)||empty($photo)){
                    ?>
<span class="d-flex justify-content-center text-danger">
    tout les champs doivent etre remplis
</span>
<?php
                }
                else{
                    $photo=$_FILES['photo'];
                    $filename=$_FILES['photo']['name'];
                    $file_size=$_FILES['photo']['size'];
                    $file_error=$_FILES['photo']['error'];
                    $tmp=$_FILES['photo']['tmp_name'];
                    $file_type=$_FILES['photo']['type'];
                    
                    $fileext=explode('.',$filename);
                    $filecheck=strtolower(end($fileext));
                   
                    $destinationfile='../picture/'.$name.'/images/';
                    $target_file=$destinationfile.basename($_FILES['photo']['name']);
                     $extensions=array("jpeg","jpg","png","webp","ARW");
                     $max_file_size = 200000000;
                     if (in_array($filecheck,$extensions)==false) {
                        ?>
<span class="d-flex justify-content-center text-success">
    la photo a été ajouté
</span>
<?php
                                }
                                if (!file_exists ($destinationfile)) {
                                 mkdir($destinationfile,0777,true);
                                 }
                               move_uploaded_file($tmp,$target_file);
                              $url=$_SERVER['HTTP_REFERER'];
                              $seg=explode('/',$url);
                              $path=$seg[0].'/'.$seg[1].'/'.$seg[2].'/'.$seg[3].'/'.$seg[4];
                              $full_url=$path.'/'.'picture/'.$name.'/images/'.$filename;
                 
                             $sql="INSERT INTO `children`(`name`, `date`, `sex`, `pays`, `photos`, `entre`)
                              VALUES (:name, :date, :sex,:pays,:full_url,NOW())";
                             
                               $statement=$pdo->prepare($sql);
                               $statement->bindParam(':name',$name);
                               $statement->bindParam(':date',$date);
                               $statement->bindParam(':sex',$sex);
                               $statement->bindParam(':pays',$pays);
                               $statement->bindParam(':full_url',$full_url);
                              if($statement->execute()){
                                ?>
<span class="d-flex justify-content-center text-success">
    vous venez d'ajouté un enfant
</span>
<?php
                              }
                              else{
                                ?>
<span class="d-flex justify-content-center text-danger">
    oupss veuillez recommencer!!
</span>
<?php
                }
            }
    }
}
    catch(PDOException $e){
        ?>
<span class="d-flex justify-content-center text-danger">
    oupps revenez plus tard
</span>
<?php
    }
}

//fetch all children for the admin 
public function getChildren(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //getting all data from the database
        $query = "SELECT * FROM children";
        $stmt = $pdo->query($query);
        $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        //Afficher les utilisateurs
        if($child){
            foreach($child as $rows){
                $dateOfBirth = $rows['date'];
                $today = date("Y-m-d");
                $diff = date_diff(date_create($dateOfBirth), date_create($today));
                ?>
<tbody class="fetchrecord" id="fullchildren<?php echo $rows['idChild']?>">
    <tr>
        <td><img src="<?php echo $rows['photos']?>" alt="" style="height: 30px;width:30px;object-fit:contain;"></td>
        <td><?php echo $rows['name']?></td>
        <td><?php echo $diff->format('%y'); ?> ans</td>
        <td><?php echo $rows['sex']?></td>
        <td><?php echo $rows['pays']?></td>
        <td class="d-flex">
            <a href="editchildren.php?id=<?php echo $rows['idChild']?>">
                <button id="edit" style="border: none;background:none;outline:none;"
                    value="<?php echo $rows['idChild']?>"><i class="material-icons" data-toggle="tooltip"
                        title="Edit">&#xE254;</i></button>
            </a>
            <button id="delete" style="border: none;background:none;outline:none;"
                value="<?php echo $rows['idChild']?>"><i class="material-icons" data-toggle="tooltip"
                    title="Delete">&#xE872;</i></button>



        </td>
        <td>
            <!-- here the form -->
            <div class="gap-3 formdelete<?php echo $rows['idChild']?>">
            </div>
            <!-- here the form -->
        </td>
    </tr>

</tbody>

<?php
             }
        }else{
            echo"no data found in the system";
        }
      
}
catch(PDOException $e){
    echo"error",$e ->getMessage();
}
}

//edit the detail of a particular child
public function editChild() {
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //getting all data from the database
                if(isset($_POST['editit'])){
                $name = $_POST['name'];
                $date = $_POST['date'];
                $sex = $_POST['sex'];
                $pays = $_POST['pays'];
                $getme = $_POST['getme'];
                
                          $query = "UPDATE children
                          SET name =:name, date = :date, sex=:sex,pays=:pays
                          WHERE idChild='$getme'";
                             
                           $statement=$pdo->prepare($query);
                           $statement->bindParam(':name',$name);
                           $statement->bindParam(':date',$date);
                           $statement->bindParam(':sex',$sex);
                           $statement->bindParam(':pays',$pays);
                          if($statement->execute()){
                            ?>
<span class="d-flex justify-content-center text-success">
    modification reussi avec succée
</span>
<?php
                          }
                          else{
                            ?>
<span class="d-flex justify-content-center text-danger">
    oupss veuillez recommencer!!
</span>
<?php
            }
}
}
catch(PDOException $e){
    echo"error:".$e->getMessage();
}
}


public function editChildpicture() {
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //getting all data from the database
                if(isset($_POST['edititpicture'])){
                   
                $idchildsure = $_POST['idchildsure'];
                $childname = $_POST['childname'];

                $photo=$_FILES['photo'];
                $filename=$_FILES['photo']['name'];
                $file_size=$_FILES['photo']['size'];
                $file_error=$_FILES['photo']['error'];
                $tmp=$_FILES['photo']['tmp_name'];
                $file_type=$_FILES['photo']['type'];
                
                $fileext=explode('.',$filename);
                $filecheck=strtolower(end($fileext));
               
                $destinationfile='../picture/'.$childname.'/images/';
                $target_file=$destinationfile.basename($_FILES['photo']['name']);
                 $extensions=array("jpeg","jpg","png","webp","ARW");
                 $max_file_size = 200000000;
                 if (in_array($filecheck,$extensions)==false) {
                    ?>
<span class="d-flex justify-content-center text-success">
    la photo a été ajouté
</span>
<?php
                            }
                            if (!file_exists ($destinationfile)) {
                             mkdir($destinationfile,0777,true);
                             }
                           move_uploaded_file($tmp,$target_file);
                          $url=$_SERVER['HTTP_REFERER'];
                          $seg=explode('/',$url);
                          $path=$seg[0].'/'.$seg[1].'/'.$seg[2].'/'.$seg[3].'/'.$seg[4];
                          $full_url=$path.'/'.'picture/'.$childname.'/images/'.$filename;
                
                          $query = "UPDATE children
                          SET photos =:full_url
                          WHERE idChild=:idchildsure";
                             
                           $statement=$pdo->prepare($query);
                           $statement->bindParam(':full_url',$full_url);
                           $statement->bindParam(':idchildsure',$idchildsure);
                          if($statement->execute()){
                            ?>
<span class="alert alert-success d-flex justify-content-center" style="font-size:12px;">
    photo modifier avec succée
</span>
<?php
                          }
                          else{
                            ?>
<span class="d-flex justify-content-center text-danger">
    oupss veuillez recommencer!!
</span>
<?php
            }
}
}
catch(PDOException $e){
    echo"error:".$e->getMessage();
}
}
//get children for all users in the timeline page

public function getChildrenforUser(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //getting all data from the database
        $query ="SELECT * FROM children ORDER by rand()";
        $stmt = $pdo->query($query);
        $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        //Afficher les utilisateurs
        if($child){
            foreach($child as $rows){
                $dateOfBirth = $rows['date'];
                $today = date("Y-m-d");
                $diff = date_diff(date_create($dateOfBirth), date_create($today));
                ?>
<div class="col-sm-2 mb-3 mb-sm-0 mt-3">
    <div class="card">
        <?php
    $id=$rows['idChild'];
    $encrypte_1=(($id));
    $link2="detail.php?thisthedetail=".urlencode(base64_encode($encrypte_1));
?>
        <img src="<?php echo $rows['photos'] ?>" class="img-fluid"
            style="height: 150px;width: 100%; object-fit: container;" alt="...">
        <?php
              if($diff->format('%y') <= 6){
                ?>
        <span class="mai-star" title="youngest"
            style="font-size:30px;position:relative;margin-top:-40px;color:#b37400;"></span>
        <?php
              }elseif($diff->format('%y') >6 && $diff->format('%y') <=10 ){
                ?>
        <span class="mai-arrow-up" title="younger"
            style="font-size:40px;position:relative;margin-top:-40px;color:#b37400;"></span>
        <?php
              }elseif($diff->format('%y') >10 && $diff->format('%y') <=18){
                ?>
        <span class="mai-thunderstorm" title="young"
            style="font-size:40px;position:relative;margin-top:-40px;color:#d94350;"></span>
        <?php
              }else{
                ?>
        <span class="mai-arrow-down" title="adult"
            style="font-size:40px;position:relative;margin-top:-40px;color:#e69500;"></span>
        <?php
              }
            ?>
        <div class="text-center" style="margin: 10px;">
            <h5 style="font-size: 12px;font-style: bold;"><?php echo $rows['name'] ?></h5>
            <h5 style="font-size: 12px;font-style: bold;"><?php echo $diff->format('%y'); ?> ans,
                <?php echo $rows['pays'] ?></h5>
            <?php
               $queryad ="SELECT * FROM adoption where idchild=".$rows['idChild']."";
               $stmtd = $pdo->query($queryad);
               $childd = $stmtd->fetchAll(PDO::FETCH_ASSOC);
               if($childd){
                foreach($childd as $chilrow){
                    if($chilrow['decision']=='Rejeté'){
                        ?>
            <a href="<?=$link2;?>">
                <button class="btn btn-danger" style="color:white;font-size:10px;"
                    title="cet enfant est reprenable">disponible</button></a>
            <?php
                    }elseif($chilrow['decision']=='Accepté'){
                        ?>
            <button class="btn btn-success" style="color:white;font-size:10px;" title="cet enfant est deja adopté">Deja
                adopté</button>
            <?php
                    }elseif($chilrow['decision']=='encours'){
                        ?>
            <button class="btn btn-warning" style="color:white;font-size:10px;"
                title="cet enfant est deja demandé">Demandé</button>
            <?php
                    }elseif($chilrow['decision']=='en avance'){
                        ?>
            <button class="btn btn-warning" style="color:white;font-size:10px;"
                title="cet enfant est deja demandé">pending..</button>
            <?php
                    }
                    else{
                        ?>
            <a href="<?=$link2;?>" class="btn btn-primary" style="color:white;font-size:10px;"
                title="cet enfant est disponible">disponible</a>
            <?php
                       }
                }
                ?>
            <?php
               }else{
                ?>
            <a href="<?=$link2;?>" class="btn btn-primary" style="color:white;font-size:10px;"
                title="cet enfant est disponible">disponible</a>
            <?php
               }
            ?>

        </div>
    </div>
</div>

<?php
             }
        }else{
            echo"<h6 class='text-center display-4' style='font-size:15px;'>no child finds in the system yet</h6>";
        }
      
}
catch(PDOException $e){
    echo"error",$e ->getMessage();
}
}

//function of counting number of child in the database:
public function countchildRow(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');
       
    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql="SELECT COUNT(*) FROM children";
        $res = $pdo->query($sql);
        $count = $res->fetchColumn();
        echo $count;
    }catch(PDOException $e){
        ?>
<div style="background-color:#d94350;display:flex;justify-content:center; align-items:center;
            border-radius:5px;padding:10px 20px;">
    <h5 style="color: #f2f2f2;font-size:18px">
        ouff nous ne pouvons pas compter vos produit pour le moment
    </h5>
</div>
<?php
    }
   }
}