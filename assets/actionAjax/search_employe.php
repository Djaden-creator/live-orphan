<table class="table table-striped table-hover" id="alltable">
    <span class="text-danger notification"></span>
    <thead>
        <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>Age</th>
            <th>Email</th>
            <th>Tel</th>
            <th>Poste</th>
            <th>Actions</th>
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

        $query="SELECT *FROM teams WHERE CONCAT(nom) LIKE '%{$input}%'";
        $stmt = $pdo->query($query);
        $teams = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($teams){
             
            foreach($teams as $rows){
                $dateOfBirth = $rows['dob'];
                $today = date("Y-m-d");
                $diff = date_diff(date_create($dateOfBirth), date_create($today));
                ?>
    <tbody>
        <tr>
            <td><img src="<?php echo $rows['photo']?>" alt="" style="height: 30px;width:30px;object-fit:contain;"></td>
            <td><?php echo $rows['nom']?></td>
            <td><?php echo $diff->format('%y'); ?> ans</td>
            <td><?php echo $rows['email']?></td>
            <td><?php echo $rows['portable']?></td>
            <td><?php echo $rows['poste']?></td>
            <td class="d-flex">
                <?php
              $id=$rows['idTeam'];
              $encrypte_1=(($id));
              $link="editTeam.php?yourskin=".urlencode(base64_encode($encrypte_1));
            ?>
                <a href="<?=$link;?>">
                    <button id="edit" style="border: none;background:none;outline:none;"
                        value="<?php echo $rows['idTeam']?>"><i class="material-icons" data-toggle="tooltip"
                            title="Edit">&#xE254;</i></button>
                </a>
                <form action="" method="post">
                    <input type="hidden" name="idteam" value="<?php echo $rows['idTeam']?>">
                    <button id="delete" style="border: none;background:none;outline:none;" name="delete_one_employe"><i
                            class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
                </form>
            </td>
            <td>
                <!-- here the form -->
                <div class="gap-3 formdelete<?php echo $rows['idTeam']?>">
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