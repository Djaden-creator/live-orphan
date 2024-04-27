<table class="table table-striped table-hover" id="alltable">
    <span class="text-danger notification"></span>
    <thead>
        <tr>
            <th>
                <span class="custom-checkbox">
                    <input type="checkbox" id="selectAll">
                    <label for="selectAll"></label>
                </span>
            </th>
            <th>photo</th>
            <th>Name</th>
            <th>Age</th>
            <th>Sex</th>
            <th>pays</th>
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

        $query="SELECT *FROM children WHERE CONCAT(name,date,sex) LIKE '%{$input}%'";
        $stmt = $pdo->query($query);
        $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($child){
             
            foreach($child as $rows){
                $dateOfBirth = $rows['date'];
                $today = date("Y-m-d");
                $diff = date_diff(date_create($dateOfBirth), date_create($today));
                ?>
    <tbody class="fetchrecord" id="fullchildren<?php echo $rows['idChild']?>">
        <tr>
            <td>
                <span class="custom-checkbox">
                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                    <label for="checkbox1"></label>
                </span>
            </td>
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