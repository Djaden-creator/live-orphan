<?php
if(!isset($_SESSION['idUser'])){
header('location:login.php');
}else{
    ?>
<div class="container-fluid">
    <div class="d-flex">
        <div class="bg-body-tertiary col-sm-4">
            <div class="list-group list-group-flush border-bottom" style="height: 600px;overflow: scroll;">
                <!-- here we shall fetch all the unread message  -->
                <?php
                require_once'../functions/messageClass.php';
                  $message= new Message();
                  $message->getMessage();
                ?>
                <!-- here we shall fetch all the unread message  -->
            </div>
        </div>
        <div class="bg-body-tertiary col-sm-8">
            <div class="list-group d-grid gap-2 border-0" style="height: 600px;overflow: scroll;" id="messagedetail">
                <!-- here on va afficher les detail du message -->

                <!-- here on va afficher les detail du message -->
            </div>
        </div>
    </div>

</div>
<?php
}