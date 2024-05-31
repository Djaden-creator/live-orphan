<?php
        $dsn = 'mysql:host=localhost;dbname=orphelinat';
        $username = 'root';
        $password = getenv('');
    
        try{
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if(isset($_POST['action'])){
                $idadoption=$_POST['idadoption'];

                $sql="SELECT * FROM  adoption WHERE idAdoption='$idadoption'";
                $stmt = $pdo->query($sql);
                $adoption = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach($adoption  as $rows){
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

            }

        }
    }
        catch(PDOException $e){
            echo"echec" .$e->getMessage();
            }