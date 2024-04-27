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
            <th>N° de service</th>
            <th>type de service</th>
            <th>Actions</th>
            <th>Detail</th>
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

        $query="SELECT *FROM services WHERE CONCAT(type) LIKE '%{$input}%'";
        $stmt = $pdo->query($query);
        $service = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($service){
             
            foreach($service as $rows){
                ?>
    <?php
    $id=$rows['idService'];
    $encrypte_1=(($id));
    $link="service_detail.php?itsmyservice=".urlencode(base64_encode($encrypte_1));
?>
    <tbody>
        <tr>
            <td>
                <span class="custom-checkbox">
                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                    <label for="checkbox1"></label>
                </span>
            </td>
            <td><?php echo $rows['idService']?></td>
            <td><?php echo $rows['type']?></td>
            <td class="d-flex">
                <?php
              $id=$rows['idService'];
              $encrypte_1=(($id));
              $link="editservice.php?yourservices=".urlencode(base64_encode($encrypte_1));
            ?>
                <a href="<?=$link;?>">
                    <button id="edit" style="border: none;background:none;outline:none;"
                        value="<?php echo $rows['idService']?>"><i class="material-icons" data-toggle="tooltip"
                            title="Edit">&#xE254;</i></button>
                </a>
                <form action="" method="post">
                    <input type="hidden" name="idservice" value="<?php echo $rows['idService']?>">
                    <button id="delete" style="border: none;background:none;outline:none;" name="delete_one_service"><i
                            class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
                </form>
            </td>
            <td><a href="<?=$link;?>"><u>detail</u></a></td>
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