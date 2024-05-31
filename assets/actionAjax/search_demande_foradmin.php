<table class="table table-striped table-hover" id="alltable">
    <span class="text-danger notification"></span>
    <thead>
        <tr>

            <th>N° de Reference</th>
            <th>Demandeur</th>
            <th>Type</th>
            <th>status</th>
            <th>Decision</th>
            <th>Consulter</th>
        </tr>
    </thead>
    <!-- table here  -->
    <?php
  $dsn = 'mysql:host=localhost;dbname=orphelinat';
  $username = 'root';
  $password = getenv('');

 try{
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['input'])){
        $input=$_POST['input'];

        $query="SELECT *FROM adoption WHERE CONCAT(reference) LIKE '%{$input}%'";
        $stmt = $pdo->query($query);
        $teams = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($teams){
             
            foreach($teams as $rows){
                $id=$rows['idAdoption'];
                $encrypte_1=(($id));
                $link="demande_detail.php?thisdetail=".urlencode(base64_encode($encrypte_1));
                ?>
    <tbody class="fetchrecord">
        <tr>
            <td><?php echo $rows['reference'];?></td>
            <td><?php echo $rows['name'];?></td>
            <?php
            $sql="SELECT * FROM  users WHERE idUser=".$rows['iduser']."";
            $stmt = $pdo->query($sql);
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($users  as $rowsuser){
                  ?>
            <td><?php echo $rowsuser['objectif'];?></td>
            <?php
                                     }
                               ?>
            <!--here to show the status dynamically  -->
            <td id="showstatus<?php echo $rows['idAdoption'];?>"><?php echo $rows['status'];?></td>
            <!-- here to show the status dynamically end -->
            <td>
                <form method="post">
                    <select id="selectdecision">
                        <?php
                      if($rows['decision']=="encours"){
                        ?>
                        <option value="encours"><?php echo $rows['decision'];?></option>
                        <option value="en avance">en avance</option>
                        <option value="Accepté">Accepté</option>
                        <option value="Rejeté">Rejeté</option>
                        <?php
                      }elseif($rows['decision']=="en avance"){
                        ?>
                        <option value="en avance"><?php echo $rows['decision'];?></option>
                        <option value="Accepté">Accepté</option>
                        <option value="Rejeté">Rejeté</option>
                        <?php
                      }elseif($rows['decision']=="Accepté"){
                        ?>
                        <option value="Accepté"><?php echo $rows['decision'];?></option>
                        <option value="encours">encours</option>
                        <option value="en avance">en avance</option>
                        <option value="Rejeté">Rejeté</option>
                        <?php
                      }
                      else{
                        ?>
                        <option value="Rejeté"><?php echo $rows['decision'];?></option>
                        <option value="encours">encours</option>
                        <option value="en avance">en avance</option>
                        <option value="Accepté">Accepté</option>
                        <?php
                      }
                    ?>
                    </select>
                    <button style="background-color:none;border:none;outline:none;" id="updateDecision"
                        value="<?php echo $rows['idAdoption'];?>">
                        ok
                    </button>
                </form>
            </td>
            <td><a href="<?=$link;?>"><u>detail</u></a></td>
            <td>
                <!-- here the form -->
                <div class="gap-3 formdelete">
                </div>
                <!-- here the form -->
            </td>
        </tr>

    </tbody>
    <!-- table here end -->
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
 ?>
</table>