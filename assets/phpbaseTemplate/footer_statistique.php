<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../vendor/owl-carousel/js/owl.carousel.min.js"></script>
<script src="../vendor/wow/wow.min.js"></script>
<script src="../js/theme.js"></script>
<script src="../js/manipilation.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script>
//show all demande encours dynamically
$(document).on('click', '.encours', function encours() {
    $.ajax({
        type: "POST",
        url: "../actionAjax/all_encours_demande.php",
        data: {
            action: 1
        },
        success: function(response) {
            $('#encoursget').html(response);

        }
    });
})
// delete all encour demande
$(document).on('click', '.deleteallencours', function deleteallencours() {
    alert("here");
    $.ajax({
        type: "POST",
        url: "../actionAjax/delete_all_encours_demande.php",
        data: {
            action: 1
        },
        success: function(response) {
            $('#encoursget').html(response);

        }
    });
})

// show avance demande
$(document).on('click', '.avance', function avance() {
    $.ajax({
        type: "POST",
        url: "../actionAjax/all_envance_demande.php",
        data: {
            action: 1
        },
        success: function(response) {
            $('#encoursget').html(response);

        }
    });
})

// effacer toute les demande en avance
$(document).on('click', '.deleteallenavance', function deleteallenavance() {
    $.ajax({
        type: "POST",
        url: "../actionAjax/delete_all_enavance_demande.php",
        data: {
            action: 1
        },
        success: function(response) {
            $('#encoursget').html(response);

        }
    });
})

// afficher les demandes rejetées
$(document).on('click', '.rejet', function rejet() {
    $.ajax({
        type: "POST",
        url: "../actionAjax/all_rejet_demande.php",
        data: {
            action: 1
        },
        success: function(response) {
            $('#encoursget').html(response);

        }
    });
})

// effacer toute les demande rejeter
$(document).on('click', '.deleteallrejet', function deleteallrejet() {
    $.ajax({
        type: "POST",
        url: "../actionAjax/delete_all_rejet_demande.php",
        data: {
            action: 1
        },
        success: function(response) {
            $('#encoursget').html(response);

        }
    });
})
// afficher les demandes accepter
$(document).on('click', '.accepter', function accepter() {
    $.ajax({
        type: "POST",
        url: "../actionAjax/all_accepter_demande.php",
        data: {
            action: 1
        },
        success: function(response) {
            $('#encoursget').html(response);

        }
    });
})
// effacer toute les demande accepter
$(document).on('click', '.deleteallaccepter', function deleteallaccepter() {
    $.ajax({
        type: "POST",
        url: "../actionAjax/delete_all_accepte_demande.php",
        data: {
            action: 1
        },
        success: function(response) {
            $('#encoursget').html(response);

        }
    });
})
</script>
</body>

</html>