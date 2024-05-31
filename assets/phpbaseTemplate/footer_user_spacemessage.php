<script src="../js/jquery-3.5.1.min.js"></script>
<script src="assets/js/jquery-3.5.1.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/owl-carousel/js/owl.carousel.min.js"></script>
<script src="../vendor/wow/wow.min.js"></script>
<script src="assets/vendor/wow/wow.min.js"></script>
<script src="../js/theme.js"></script>
<script src="assets/js/theme.js"></script>
<script src="../js/manipilation.js"></script>
<script src="assets/js/manipilation.js"></script>

<script>
// this code allow us to view the admin reply on our message
$(document).on('click', '#userview', function userview() {

    let idmessageback = $(this).val();
    $.ajax({
        method: 'POST',
        url: "../actionAjax/showthe_admin_reply.php",
        data: {
            idmessageback: idmessageback,
            action: 1
        },
        success: function(response) {
            $('#fetchreply' + idmessageback).html(response);
        }
    })


})
// this code will close the message reply
$(document).on('click', '#closethis', function closethereply() {

    let idmessageback = $(this).val();
    $.ajax({
        method: 'POST',
        url: "../actionAjax/showthe_admin_reply.php",
        data: {
            idmessageback: idmessageback,
            action: 1
        },
        success: function(response) {
            $('#fetchreply' + idmessageback).html("");
        }
    })


})
</script>
</body>

</html>