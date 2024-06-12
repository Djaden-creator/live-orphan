<?php
class Adoption{
    //  get all demande  encours pour un utilisateur specifique
public function getEncours(){
    
        $dsn = 'mysql:host=localhost;dbname=orphelinat';
        $username = 'root';
        $password = getenv('');
        try{
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            //Récupérer les données du formulaire de connexion
            if(isset($_SESSION['idUser'])){
                $sql="SELECT * FROM  adoption WHERE iduser=".$_SESSION['idUser']." AND decision='encours' ORDER by idAdoption asc";
                $stmt = $pdo->query($sql);
                $adopt = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($adopt  as $rows){
                    //    ?>
<!-- here to show the notification when we delete one demande -->

<!-- here to show the notification when we delete one demande -->
<div id="closemethis<?php echo $rows['idAdoption'];?>">
    <div class="bg-light p-2" style="border-radius:4px;">
        <span style="font-size:12px;">nature:adoption</span>
        <div style="display:flex; justify-content:space-between">
            <small style="font-size:15px;">Ref N°:<strong><?php echo $rows['reference'];?></strong> </small>
            <small>statut:<?php echo $rows['decision'];?></small>
            <?php 
        if($rows['decision']=='encours'){
            ?>
            <small>progress: 0%</small>
            <?php
        }elseif($rows['decision']=='en avance'){
            ?>
            <small>progress: 50%</small>
            <?php
        }elseif($rows['decision']=='Accepté'){
            ?>
            <small>Decision:100% Accepté</small>
            <?php
        }elseif($rows['decision']=='Rejeté'){
            ?>
            <small>Decision:100% Rejeté</small>
            <?php
        }
        ?>
        </div>

        <?php 
        if($rows['decision']=="encours"){
            ?>
        <div class="progress mb-3" style="height: 5px">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0"
                aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <?php
        }elseif($rows['decision']=="en avance"){
            ?>
        <div class="progress mb-3" style="height: 5px">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="72"
                aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <?php
        }elseif($rows['decision']=="Accepté"){
            ?>
        <div class="progress mb-3" style="height: 5px">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="72"
                aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <?php
        }else{
            ?>
        <div class="progress mb-3" style="height: 5px">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="72"
                aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <?php
        }
        ?>
        <div style="display:flex;justify-content:space-between">
            <button id="clickonme" value="<?php echo $rows['idAdoption'];?>"
                style="background-color:black;border:none;outline:none; color:white;border-radius:4px;font-size:12px;">voir
                detail
            </button>
            <input type="hidden" id="usersessionid" value="<?php echo $_SESSION['idUser'];?>">
            <button class="deleteadopt" id="deleteadopt" value="<?php echo $rows['idAdoption'];?>"
                style="background-color:black;border:none;outline:none; color:white;border-radius:4px; font-size:12px;">
                supprimer demande
            </button>
        </div>
        <!-- here a particular detail of a demande of adoption -->
        <div id="adoptedetail<?php echo $rows['idAdoption'];?>" style="padding:5px;"></div>
        <!-- here a particular detail of a demande of adoption -->
    </div>
</div>
<br>
<?php
        }}}
        catch (PDOException $e){
            ?>
<span>database indisponible pour le moment</span>
<?php
           
        }
}
 //get all demande en avance pour un utilisateur specifique
 public function getEnavance(){
    
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');
    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //Récupérer les données du formulaire de connexion
        if(isset($_SESSION['idUser'])){
            $sql="SELECT * FROM  adoption WHERE iduser=".$_SESSION['idUser']." AND decision='en avance' ORDER by idAdoption asc";
            $stmt = $pdo->query($sql);
            $adopt = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($adopt  as $rows){
                //    ?>
<!-- here to show the notification when we delete one demande -->

<!-- here to show the notification when we delete one demande -->
<div id="closemethis<?php echo $rows['idAdoption'];?>">
    <div class="bg-light p-2" style="border-radius:4px;">
        <span style="font-size:12px;">nature:adoption</span>
        <div style="display:flex; justify-content:space-between">
            <small style="font-size:15px;">Ref N°:<strong><?php echo $rows['reference'];?></strong> </small>
            <small>statut:<?php echo $rows['decision'];?></small>
            <?php 
    if($rows['decision']=='encours'){
        ?>
            <small>progress: 0%</small>
            <?php
    }elseif($rows['decision']=='en avance'){
        ?>
            <small>progress: 50%</small>
            <?php
    }elseif($rows['decision']=='Accepté'){
        ?>
            <small>Decision:100% Accepté</small>
            <?php
    }elseif($rows['decision']=='Rejeté'){
        ?>
            <small>Decision:100% Rejeté</small>
            <?php
    }
    ?>
        </div>

        <?php 
    if($rows['decision']=="encours"){
        ?>
        <div class="progress mb-3" style="height: 5px">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0"
                aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <?php
    }elseif($rows['decision']=="en avance"){
        ?>
        <div class="progress mb-3" style="height: 5px">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="72"
                aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <?php
    }elseif($rows['decision']=="Accepté"){
        ?>
        <div class="progress mb-3" style="height: 5px">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="72"
                aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <?php
    }else{
        ?>
        <div class="progress mb-3" style="height: 5px">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="72"
                aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <?php
    }
    ?>
        <div style="display:flex;justify-content:space-between">
            <button id="clickonme" value="<?php echo $rows['idAdoption'];?>"
                style="background-color:black;border:none;outline:none; color:white;border-radius:4px;font-size:12px;">voir
                detail
            </button>
            <input type="hidden" id="usersessionid" value="<?php echo $_SESSION['idUser'];?>">
            <button class="deleteadopt" id="deleteadopt" value="<?php echo $rows['idAdoption'];?>"
                style="background-color:black;border:none;outline:none; color:white;border-radius:4px; font-size:12px;">
                supprimer demande
            </button>
        </div>
        <!-- here a particular detail of a demande of adoption -->
        <div id="adoptedetail<?php echo $rows['idAdoption'];?>" style="padding:5px;"></div>
        <!-- here a particular detail of a demande of adoption -->
    </div>
</div>
<br>
<?php
    }}}
    catch (PDOException $e){
        ?>
<span>database indisponible pour le moment</span>
<?php
       
    }
}

//get all demande accepter fetch all for a specific user
public function getaccepter(){
    
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');
    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //Récupérer les données du formulaire de connexion
        if(isset($_SESSION['idUser'])){
            $sql="SELECT * FROM  adoption WHERE iduser=".$_SESSION['idUser']." AND decision='Accepté' ORDER by idAdoption desc ";
            $stmt = $pdo->query($sql);
            $adopt = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($adopt  as $rows){
                //    ?>
<!-- here to show the notification when we delete one demande -->
<div id="hitherecloseme<?php echo $rows['idAdoption'];?>">
    <div class="bg-light p-2" style="border-radius:4px;">
        <span style="font-size:12px;">nature:adoption</span>
        <div style="display:flex; justify-content:space-between">
            <small style="font-size:15px;">Ref N°:<strong><?php echo $rows['reference'];?></strong> </small>
            <small>statut:<b style="background-color:black;color:white;padding:2px;border-radius:5px;font-size:12px;">
                    <?php echo $rows['decision'];?></b></small>
            <small>progress: 100%</small>
        </div>
        <div class="progress mb-3" style="height: 5px">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="0"
                aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div style="display:flex;justify-content:space-between">
            <button id="clickonme" value="<?php echo $rows['idAdoption'];?>"
                style="background-color:black;border:none;outline:none; color:white;border-radius:4px;font-size:12px;">voir
                detail
            </button>
            <input type="hidden" id="usersessionid" value="<?php echo $_SESSION['idUser'];?>">
            <button class="deletedemandeaccepted" id="deletedemandeaccepted" value="<?php echo $rows['idAdoption'];?>"
                style="background-color:black;border:none;outline:none; color:white;border-radius:4px; font-size:12px;">
                supprimer demande
            </button>
        </div>
        <!-- here a particular detail of a demande of adoption -->
        <div id="adoptedetail<?php echo $rows['idAdoption'];?>" style="padding:5px;"></div>
        <!-- here a particular detail of a demande of adoption -->
    </div>
</div>
<br>
<?php
    }}}
    catch (PDOException $e){
        ?>
<span>database indisponible pour le moment</span>
<?php
       
    }
}

//get all demande rejetter fetch all for a specific user
public function getrejeter(){
    
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');
    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //Récupérer les données du formulaire de connexion
        if(isset($_SESSION['idUser'])){
            $sql="SELECT * FROM  adoption WHERE iduser=".$_SESSION['idUser']." AND decision='Rejeté' ORDER by idAdoption desc ";
            $stmt = $pdo->query($sql);
            $adopt = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($adopt  as $rows){
                //    ?>
<!-- here to show the notification when we delete one demande -->
<div id="hitherecloseme<?php echo $rows['idAdoption'];?>">
    <div class="bg-light p-2" style="border-radius:4px;">
        <span style="font-size:12px;">nature:adoption</span>
        <div style="display:flex; justify-content:space-between">
            <small style="font-size:15px;">Ref N°:<strong><?php echo $rows['reference'];?></strong> </small>
            <small>statut:<b style="background-color:black;color:white;padding:2px;border-radius:5px;font-size:12px;">
                    <?php echo $rows['decision'];?></b></small>
            <small>progress: 100%</small>
        </div>
        <div class="progress mb-3" style="height: 5px">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="0"
                aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div style="display:flex;justify-content:space-between">
            <button id="clickonme" value="<?php echo $rows['idAdoption'];?>"
                style="background-color:black;border:none;outline:none; color:white;border-radius:4px;font-size:12px;">voir
                detail
            </button>
            <input type="hidden" id="usersessionid" value="<?php echo $_SESSION['idUser'];?>">
            <button class="deletedemandeaccepted" id="deletedemandeaccepted" value="<?php echo $rows['idAdoption'];?>"
                style="background-color:black;border:none;outline:none; color:white;border-radius:4px; font-size:12px;">
                supprimer demande
            </button>
        </div>
        <!-- here a particular detail of a demande of adoption -->
        <div id="adoptedetail<?php echo $rows['idAdoption'];?>" style="padding:5px;"></div>
        <!-- here a particular detail of a demande of adoption -->
    </div>
</div>
<br>
<?php
    }}}
    catch (PDOException $e){
        ?>
<span>database indisponible pour le moment</span>
<?php
       
    }
}
//function of counting number of demande terminé for a particular user:
    public function countrejetdemande(){
        $dsn = 'mysql:host=localhost;dbname=orphelinat';
        $username = 'root';
        $password = getenv('');
           
        try{
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if(isset($_SESSION['idUser'])){
            $sql="SELECT COUNT(*) FROM adoption where iduser=".$_SESSION['idUser']." AND decision='Rejeté'";
            $res = $pdo->query($sql);
            $count = $res->fetchColumn();
            echo $count;
        }
    }catch(PDOException $e){
            ?>
<span class="alert alert-danger">ouff nous ne pouvons pas compter vos produit pour le moment</span>
<?php
        }
       }

       //function of counting number of demande terminé for a particular user:
    public function countAcceptédemande(){
        $dsn = 'mysql:host=localhost;dbname=orphelinat';
        $username = 'root';
        $password = getenv('');
           
        try{
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if(isset($_SESSION['idUser'])){
            $sql="SELECT COUNT(*) FROM adoption where iduser=".$_SESSION['idUser']." AND decision='Accepté'";
            $res = $pdo->query($sql);
            $count = $res->fetchColumn();
            echo $count;
        }
    }catch(PDOException $e){
            ?>
<span class="alert alert-danger">ouff nous ne pouvons pas compter vos produit pour le moment</span>
<?php
        }
       }

//function of counting number of demande encours for a particular user:
public function countEncoursdemande(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');
       
    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_SESSION['idUser'])){
        $sql="SELECT COUNT(*) FROM adoption where iduser=".$_SESSION['idUser']." AND decision='encours'";
        $res = $pdo->query($sql);
        $count = $res->fetchColumn();
        echo $count;
    }
}catch(PDOException $e){
        ?>
<span class="alert alert-danger">ouff nous ne pouvons pas compter vos produit pour le moment</span>
<?php
    }
   }

   //function of counting number of demande encours for a particular user:
public function countEnavancedemande(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');
       
    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_SESSION['idUser'])){
        $sql="SELECT COUNT(*) FROM adoption where iduser=".$_SESSION['idUser']." AND decision='en avance'";
        $res = $pdo->query($sql);
        $count = $res->fetchColumn();
        echo $count;
    }
}catch(PDOException $e){
        ?>
<span class="alert alert-danger">ouff nous ne pouvons pas compter vos produit pour le moment</span>
<?php
    }
   }
//function of counting number of demande for a particular user:
    public function countdemandeAll(){
        $dsn = 'mysql:host=localhost;dbname=orphelinat';
        $username = 'root';
        $password = getenv('');
           
        try{
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if(isset($_SESSION['idUser'])){
            $sql="SELECT COUNT(*) FROM adoption";
            $res = $pdo->query($sql);
            $count = $res->fetchColumn();
            echo $count;
        }
    }catch(PDOException $e){
            ?>
<span class="alert alert-danger">ouff nous ne pouvons pas compter vos produit pour le moment</span>
<?php
        }
       }
//get all demande for the admin
public function getAlldemande(){
    
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');
    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //Récupérer les données du formulaire de connexion
            $sql="SELECT * FROM  adoption order by idAdoption asc";
            $stmt = $pdo->query($sql);
            $adopt = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($adopt){
                foreach($adopt as $rows){
                    $id=$rows['idAdoption'];
                    $encrypte_1=(($id));
                    $link="demande_detail.php?thisdetail=".urlencode(base64_encode($encrypte_1));
                ?>
<tbody class="fetchrecord">
    <tr>
        <td><?php echo $rows['reference'];?>
            <small id="newtoold<?php echo $rows['idAdoption'];?>">
                <?php
          if ($rows['decision']=='encours'){
            ?>
                <small style="background-color:brown; padding:5px;color:white;border-radius:5px;">new 0%
                </small>
                <?php

          }elseif($rows['decision']=='en avance'){
            ?>
                <small style="background-color:black; padding:5px;color:white;border-radius:5px;">50%
                </small>
                <?php
          }else{
            ?>
                <small style="background-color:black; padding:5px;color:white;border-radius:5px;">100%
                </small>
                <?php
          }
        ?>
            </small>
        </td>
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
            <select id="selectdecision<?php echo $rows['idAdoption'];?>">
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
<?php 
                }
       }
           }catch(PDOException){
       echo"error"; 
    }
}

//here nous allons delete all demands of adoption

public function deletealldemande(){
    $dsn = 'mysql:host=localhost;dbname=orphelinat';
    $username = 'root';
    $password = getenv('');

    try{
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //delete all  employe

        if(isset($_POST['deteledemande'])){
            $query ="DELETE FROM adoption";
            $stmt = $pdo->query($query);
            if($stmt){
                $truncate="TRUNCATE TABLE adoption";
                $statment=$pdo->query($truncate);
                if($statment){
                    echo"<span class='alert alert-success'>
                    vous venez d'effacer tout les demandes des utilisateurs
                    </span>";
                }else{
                    echo"<span class='alert alert-success'>
                    impossible de supprimer tout les demandes pour le moment</span>";
                }
            }else{
                echo"<span class='alert alert-success'>
                impossible de supprimer tout les demandes des utilisateurs pour le moment</span>";
            }
    }
}
catch(PDOException $e){
    echo"<span class='alert alert-success'>
    impossible de supprimer les demandes pour le moment revenez plus tard</span>";
}
}

}