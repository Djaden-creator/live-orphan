<table class="table table-striped table-hover" id="alltable">
    <span class="text-danger notification"></span>
    <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>role</th>
            <th>compte</th>
            <th>Actions</th>
            <th>Decision</th>
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

        $query="SELECT *FROM users WHERE CONCAT(name) LIKE '%{$input}%'";
        $stmt = $pdo->query($query);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($users){
             
            foreach($users as $rows){
                $dateOfBirth = $rows['dbd'];
                $today = date("Y-m-d");
                $diff = date_diff(date_create($dateOfBirth), date_create($today));
                ?>
    <tbody class="fetchrecord" id="fulluser<?php echo $rows['idUser']?>">
        <tr>
            <td><?php echo $rows['name']?></td>
            <td><?php echo $diff->format('%y'); ?> ans</td>
            <td>
                <select id="selectrole<?php echo $rows['idUser'];?>">
                    <option value="<?php echo $rows['role'];?>"><?php echo $rows['role'];?></option>
                    <option value="secretaire">secretaire</option>
                    <option value="moderateur">moderateur</option>
                    <option value="administrateur">administrateur</option>
                    <option value="utilisateur">utilisateur</option>
                </select>
                <button style="background-color:none;border:none;outline:none;" id="rolebtn"
                    value="<?php echo $rows['idUser'];?>">
                    ok
                </button>
            </td>
            <?php
           if ($rows['niveau_du_compte']=="active"){
            ?><td id="buttonbloquer<?php echo $rows['idUser']?>"><button class="btn-primary" id="activer"
                    value="<?php echo $rows['idUser']?>">
                    active</button></td><?php
           }
           else{
            ?><td id="buttonactive<?php echo $rows['idUser']?>"><button class="btn-primary" id="bloquer"
                    value="<?php echo $rows['idUser']?>">bloqué
                </button></td><?php
           }
        ?>
            <td class="d-flex">
                <button id="delete_user" style="border: none;background:none;outline:none;"
                    value="<?php echo $rows['idUser']?>"><i class="material-icons" data-toggle="tooltip"
                        title="Delete">&#xE872;</i></button>
            </td>
            <td>
                <!-- here the form -->
                <div class="gap-3 formduserdelete<?php echo $rows['idUser']?>">
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