<?php
//class of review  all task
class reviewClass{
//fetch all temoignages for the admin
public function getReview(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //getting all data from the database
        $query = "SELECT * FROM reviews";
        $stmt = $pdo->query($query);
        $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        //Afficher les utilisateurs
        if($reviews){
            foreach($reviews as $rows){
                ?>
<?php
    $id=$rows['idreview'];
    $encrypte_1=(($id));
    $link="review_detail.php?itsmyraview=".urlencode(base64_encode($encrypte_1));
?>
<tbody>
    <tr>
        <td>
            <span class="custom-checkbox">
                <input type="checkbox" id="checkbox1" name="options[]" value="1">
                <label for="checkbox1"></label>
            </span>
        </td>
        <td><?php echo $rows['idreview']?></td>
        <td><?php echo $rows['name']?></td>
        <td><?php echo $rows['email']?></td>
        <td><?php echo $rows['note']?></td>
        <?php
              if($rows['status']=='nonactive'){
            ?>
        <td><button value="<?php echo $rows['idreview']?>" class="btn-danger nonactive">nonactive</button></td>
        <?php
              }else{
                ?>
        <td><button class="btn-success activerreview" value="<?php echo $rows['idreview']?>">active</button>
        </td>
        <?php
              }
            ?>

        <td class="d-flex">
            <form action="" method="post">
                <input type="hidden" name="idreview" value="<?php echo $rows['idreview']?>">
                <button id="delete" style="border: none;background:none;outline:none;" name="delete_one_review"><i
                        class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
            </form>
        </td>
        <td><a href="<?=$link;?>"><u>detail</u></a></td>
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
//delete a particular temoignage in the datebase
public function deleteReviews(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //delete a singlr employe

        if(isset($_POST['delete_one_review'])){
          $idreview=$_POST['idreview'];
          if(empty($idreview)){
            echo"<span class='alert alert-danger'>oups revenez plus tard</span>";
        }else{
            $query ="DELETE FROM reviews where idreview='$idreview'";
            $stmt = $pdo->query($query);
            if($stmt){
                echo"<span class='alert alert-success'>vous venez d'effacer un temoignage</span>";
            }else{
                echo"<span class='alert alert-success'>impossible de supprimer cet  temoignage pour le moment</span>";
            }
    }
        }
        }
catch(PDOException $e){
    echo"<span class='alert alert-success'>impossible de supprimer cet  temoignage pour le moment revenez plus tard</span>";
}
}
//delete all temoignages in the datebase
public function deleteallReview(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //delete all  employe

        if(isset($_POST['deleteallreview'])){
            $query ="DELETE FROM reviews";
            $stmt = $pdo->query($query);
            if($stmt){
                $truncate="TRUNCATE TABLE reviews";
                $statment=$pdo->query($truncate);
                if($statment){
                    echo"<span class='alert alert-success'>vous venez d'effacer tout les temoignages</span>";
                }else{
                    echo"<span class='alert alert-success'>impossible de supprimer tout les temoignages pour le moment</span>";
                }
            }else{
                echo"<span class='alert alert-success'>impossible de supprimer tout les temoignages pour le moment</span>";
            }
    }
}
catch(PDOException $e){
    echo"<span class='alert alert-success'>impossible de supprimer les temoignages pour le moment revenez plus tard</span>";
}
}
//function of counting number of employé in the database:
public function countreviewRow(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');
       
    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql="SELECT COUNT(*) FROM reviews";
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