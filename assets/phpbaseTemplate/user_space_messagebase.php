<div class="container">
    <div class="d-flex">
        <div class="bg-body-tertiary col mt-3">
            <strong>votre parcours de messagerie avec la team liveOrphan debute</strong>
            <div class="list-group d-grid gap-2 border-0" id="messagedetail">
                <!-- here on va afficher les detail du message -->
                <?php
                require_once'../functions/messageClass.php';
                  $message= new Message();
                  $message->getMessageinuserSpace();
                ?>
                <!-- here on va afficher les detail du message -->
            </div>
        </div>
    </div>
</div>