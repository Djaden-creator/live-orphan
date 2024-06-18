<div class="nav-scroller shadow-sm">
    <nav class="nav" aria-label="Secondary navigation ">
        <a class="nav-link active text-dark-emphasis" aria-current="page"
            href="../pagesPhp/listofBabies.php">Dashboard</a>
        <button class="nav-link text-dark-emphasis encours">
            Demandes encours
            <span class="badge text-bg-light rounded-pill align-text-bottom">
                <?php
          require_once '../functions/adoptionClass.php';
          $adoption= new Adoption();
          $adoption ->Adminencours();
        ?>
            </span>
        </button>
        <button class="nav-link text-dark-emphasis avance">
            Demandes en avance
            <span class="badge text-bg-light rounded-pill align-text-bottom">
                <?php
         
         $adoption= new Adoption();
         $adoption ->Adminenavance();
       ?>
            </span>
        </button>
        <button class="nav-link text-dark-emphasis rejet">
            Demandes rejetées
            <span class="badge text-bg-light rounded-pill align-text-bottom">
                <?php
         
         $adoption= new Adoption();
         $adoption ->Adminrejet();
       ?>
            </span>
        </button>
        <button class="nav-link text-dark-emphasis accepter">
            Demand acceptées
            <span class="badge text-bg-light rounded-pill align-text-bottom">
                <?php
         
         $adoption= new Adoption();
         $adoption ->Adminaccepter();
       ?>
            </span>
        </button>
        <button class="nav-link text-dark-emphasis accepter">
            All
            <span class="badge text-bg-light rounded-pill align-text-bottom">
                <?php
         
         $adoption= new Adoption();
         $adoption ->countdemandeAll();
       ?>
            </span>
        </button>
    </nav>
</div>
<main class="container">
    <div
        class="d-flex align-items-center justify-content-center p-3 my-3 grid gap-3 text-white bg-purple rounded shadow-sm">
        <div class="bg-dark p-2 rounded-pill text-light">
            <small>
                demandes encours
                <?php
       $dsn = 'mysql:host=localhost;dbname=orphelinat';
       $username = 'root';
       $password = getenv('');
          
       try{
           $pdo = new PDO($dsn, $username, $password);
           $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
           $sql="SELECT COUNT(*) FROM adoption";
           $res = $pdo->query($sql);
           $count = $res->fetchColumn();

           $sqlone="SELECT COUNT(*) FROM adoption where decision='encours'";
           $resone = $pdo->query($sqlone);
           $countone = $resone->fetchColumn();
          if($count==0){
            echo"0%";
          }else{
            $total=$countone * 100 / $count;
            echo "".round($total)." % ";
          }
            
                  
   }catch(PDOException $e){
           ?>
                <span class="alert alert-danger">ouff nous ne pouvons pas compter vos produit pour le moment</span>
                <?php
       }
       ?>
            </small>
        </div>
        <div class="bg-dark p-2 rounded-pill text-light">
            <small>
                demandes en avance
                <?php
       $dsn = 'mysql:host=localhost;dbname=orphelinat';
       $username = 'root';
       $password = getenv('');
          
       try{
           $pdo = new PDO($dsn, $username, $password);
           $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
           $sql="SELECT COUNT(*) FROM adoption";
           $res = $pdo->query($sql);
           $count = $res->fetchColumn();

           $sqlone="SELECT COUNT(*) FROM adoption where decision='en avance'";
           $resone = $pdo->query($sqlone);
           $countone = $resone->fetchColumn();
           if($count==0){
            echo"0%";
          }else{
            $total=$countone * 100 / $count;
            echo "".round($total)." % ";
          }
   }catch(PDOException $e){
           ?>
                <span class="alert alert-danger">ouff nous ne pouvons pas compter vos produit pour le moment</span>
                <?php
       }
       ?>
            </small>
        </div>
        <div class="bg-dark p-2 rounded-pill text-light">
            <small>demandes rejetées
                <?php
       $dsn = 'mysql:host=localhost;dbname=orphelinat';
       $username = 'root';
       $password = getenv('');
          
       try{
           $pdo = new PDO($dsn, $username, $password);
           $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
           $sql="SELECT COUNT(*) FROM adoption";
           $res = $pdo->query($sql);
           $count = $res->fetchColumn();

           $sqlone="SELECT COUNT(*) FROM adoption where decision='Rejeté'";
           $resone = $pdo->query($sqlone);
           $countone = $resone->fetchColumn();
           
           if($count==0){
            echo"0%";
          }else{
            $total=$countone * 100 / $count;
            echo "".round($total)." % ";
          }
   }catch(PDOException $e){
           ?>
                <span class="alert alert-danger">ouff nous ne pouvons pas compter vos produit pour le moment</span>
                <?php
       }
       ?>
            </small>
        </div>
        <div class="bg-dark p-2 rounded-pill text-light">
            <small>demandes acceptées
                <?php
       $dsn = 'mysql:host=localhost;dbname=orphelinat';
       $username = 'root';
       $password = getenv('');
          
       try{
           $pdo = new PDO($dsn, $username, $password);
           $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
           $sql="SELECT COUNT(*) FROM adoption";
           $res = $pdo->query($sql);
           $count = $res->fetchColumn();

           $sqlone="SELECT COUNT(*) FROM adoption where decision='Accepté'";
           $resone = $pdo->query($sqlone);
           $countone = $resone->fetchColumn();
           
           if($count==0){
            echo"0%";
          }else{
            $total=$countone * 100 / $count;
            echo "".round($total)." % ";
          }
   }catch(PDOException $e){
           ?>
                <span class="alert alert-danger">ouff nous ne pouvons pas compter vos produit pour le moment</span>
                <?php
       }
       ?>
            </small>
        </div>
    </div>

    <div class="my-3 p-3 bg-body rounded shadow-sm p-1" id="encoursget">
        <h6 class="border-bottom pb-2 mb-0">Recent updates</h6>
        <div class="d-flex text-body-secondary pt-3">
            <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
                preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff"
                    dy=".3em">32x32</text>
            </svg>
            <p class="pb-3 mb-0 small lh-sm border-bottom">
                <strong class="d-block text-gray-dark">@username</strong>
                Some representative placeholder content, with some information about this user. Imagine this being some
                sort of status update, perhaps?
            </p>
        </div>
        <div class="d-flex text-body-secondary pt-3">
            <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
                preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#e83e8c"></rect><text x="50%" y="50%" fill="#e83e8c"
                    dy=".3em">32x32</text>
            </svg>
            <p class="pb-3 mb-0 small lh-sm border-bottom">
                <strong class="d-block text-gray-dark">@username</strong>
                Some more representative placeholder content, related to this other user. Another status update,
                perhaps.
            </p>
        </div>
        <div class="d-flex text-body-secondary pt-3">
            <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
                preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#6f42c1"></rect><text x="50%" y="50%" fill="#6f42c1"
                    dy=".3em">32x32</text>
            </svg>
            <p class="pb-3 mb-0 small lh-sm border-bottom">
                <strong class="d-block text-gray-dark">@username</strong>
                This user also gets some representative placeholder content. Maybe they did something interesting, and
                you really want to highlight this in the recent updates.
            </p>
        </div>
        <small class="d-block text-end mt-3">
            <a href="#">All updates</a>
        </small>
    </div>

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h6 class="border-bottom pb-2 mb-0">Suggestions</h6>
        <div class="d-flex text-body-secondary pt-3">
            <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
                preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff"
                    dy=".3em">32x32</text>
            </svg>
            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <div class="d-flex justify-content-between">
                    <strong class="text-gray-dark">Full Name</strong>
                    <a href="#">Follow</a>
                </div>
                <span class="d-block">@username</span>
            </div>
        </div>
        <div class="d-flex text-body-secondary pt-3">
            <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
                preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff"
                    dy=".3em">32x32</text>
            </svg>
            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <div class="d-flex justify-content-between">
                    <strong class="text-gray-dark">Full Name</strong>
                    <a href="#">Follow</a>
                </div>
                <span class="d-block">@username</span>
            </div>
        </div>
        <div class="d-flex text-body-secondary pt-3">
            <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
                preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff"
                    dy=".3em">32x32</text>
            </svg>
            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <div class="d-flex justify-content-between">
                    <strong class="text-gray-dark">Full Name</strong>
                    <a href="#">Follow</a>
                </div>
                <span class="d-block">@username</span>
            </div>
        </div>
        <small class="d-block text-end mt-3">
            <a href="#">All suggestions</a>
        </small>
    </div>
</main>