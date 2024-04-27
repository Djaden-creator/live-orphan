<?php
  $dsn = 'mysql:host=localhost;dbname=orphelinat';
  $username = 'root';
  $password = getenv('');

 try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['input'])){
        $input=$_POST['input'];

        $query="SELECT *FROM children WHERE CONCAT(name,date,sex) LIKE '%{$input}%'";
        $stmt = $pdo->query($query);
        $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($child){
             
            foreach($child as $rows){
                $dateOfBirth = $rows['date'];
                $today = date("Y-m-d");
                $diff = date_diff(date_create($dateOfBirth), date_create($today));
                ?>
<div class="col-sm-2 mb-3 mb-sm-0">
    <?php
    $id=$rows['idChild'];
    $encrypte_1=(($id));
    $link2="detail.php?thisthedetail=".urlencode(base64_encode($encrypte_1));
    ?>
    <div class="card">
        <img src="<?php echo $rows['photos'] ?>" class="img-fluid"
            style="height: 150px;width: 100%; object-fit: container;" alt="...">
        <div class="text-center" style="margin: 10px;">
            <h5 style="font-size: 12px;font-style: bold;"><?php echo $rows['name'] ?></h5>
            <h5 style="font-size: 12px;font-style: bold;"><?php echo $diff->format('%y'); ?> ans,
                <?php echo $rows['pays'] ?>
            </h5>

            <?php
               $queryad ="SELECT * FROM adoption where idchild=".$rows['idChild']."";
               $stmtd = $pdo->query($queryad);
               $childd = $stmtd->fetchAll(PDO::FETCH_ASSOC);
               if($childd){
                foreach($childd as $chilrow){
                    if($chilrow['decision']=='Rejeté'){
                        ?>
            <a href="<?=$link2;?>" class="btn btn-danger" title="cet enfant est reprenable">disponible</a>
            <?php
                    }elseif($chilrow['decision']=='Accepté'){
                        ?>
            <button class="btn btn-success" style="color:white" title="cet enfant est deja adopté">Adopté</button>
            <?php
                    }elseif($chilrow['decision']=='encours'){
                        ?>
            <button class="btn btn-warning" style="color:white" title="cet enfant est deja demandé">Demandé</button>
            <?php
                    }
                }
                ?>
            <?php
               }else{
                ?>
            <a href="<?=$link2;?>" class="btn btn-primary" title="cet enfant est disponible">disponible</a>
            <?php
               }
            ?>
        </div>
    </div>
</div>

<?php
            }
        }
        else{
            echo"no data found into the system";
        }
    }else{
        echo"echec";
    }

 }
 catch(PDOException){
echo"erreur data base";
 }