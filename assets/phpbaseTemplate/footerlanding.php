<footer class="page-footer">
    <div class="container">
        <div class="row px-md-3">
            <div class="col-sm-6 col-lg-3 py-3">
                <h5>Company</h5>
                <ul class="footer-menu">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Career</a></li>
                    <li><a href="#">Editorial Team</a></li>
                    <li><a href="#">Protection</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3 py-3">
                <h5>More</h5>
                <ul class="footer-menu">
                    <li><a href="#">Terms & Condition</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Advertise</a></li>
                    <li><a href="#">Join as Doctors</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3 py-3">
                <h5>Our partner</h5>
                <ul class="footer-menu">
                    <li><a href="#">One-Fitness</a></li>
                    <li><a href="#">One-Drugs</a></li>
                    <li><a href="#">One-Live</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3 py-3">
                <h5>Contact</h5>
                <p class="footer-link mt-2">351 Willow Street Franklin, MA 02038</p>
                <a href="#" class="footer-link">701-573-7582</a>
                <a href="#" class="footer-link">healthcare@temporary.net</a>

                <h5 class="mt-3">Social Media</h5>
                <div class="footer-sosmed mt-3">
                    <a href="#" target="_blank"><span class="mai-logo-facebook-f"></span></a>
                    <a href="#" target="_blank"><span class="mai-logo-twitter"></span></a>
                    <a href="#" target="_blank"><span class="mai-logo-google-plus-g"></span></a>
                    <a href="#" target="_blank"><span class="mai-logo-instagram"></span></a>
                    <a href="#" target="_blank"><span class="mai-logo-linkedin"></span></a>
                </div>
            </div>
        </div>

        <hr>

        <p id="copyright">Copyright &copy; 2020 <a href="https://macodeid.com/" target="_blank">MACode ID</a>. All right
            reserved</p>
    </div>
</footer>

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
$(document).ready(function() {
    //to make a search in the search bar
    $("#searchfiled").keyup(function() {
        let input = $(this).val();
        if (input.length > 0) {
            $.ajax({
                url: "../actionAjax/fetchsearch.php",
                method: "post",
                data: {
                    input: input
                },
                success: function(data) {
                    $("#fetchere").html(data);
                    $("fetchhere").css("display", "block");
                }
            });
        } else {
            $("#.fetchere").css("display", "none");
        }
        $(document).on('click', 'a', function() {
            $("#searchfiled").val($(this).text());
            $("#fetchere").html('');
        });
    });

    //count rows of data in the table the search
    $("#searchfiled").keyup(function() {
        let input = $(this).val();
        if (input.length > 0) {
            $.ajax({
                url: "../actionAjax/countrows.php",
                method: "post",
                data: {
                    input: input
                },
                success: function(data) {
                    $("#countrows").html(data);
                    $("#countrows").css("display", "block");
                }
            });
        } else {
            $("#countrows").css("display", "none");
        }
        $(document).on('click', 'a', function() {
            $("#searchfiled").val($(this).text());
            $("#countrows").html('');
        });
    });

    //this code is to show the  form of sendind a message or demande on detail page.
    $(document).on('click', '#idchildhere', function idchildhereshowform() {
        let $this = $(this).val();
        let idchild = $(this).val();
        $.ajax({
            type: "POST",
            url: "../actionAjax/form_adopte_Child.php",
            data: {
                idchild: idchild,
                action: 1
            },
            success: function(response) {
                $('#myformtohide' + idchild).html(response);

            }
        });
    })

    //this code is to hide the  form of sendind a message or demande on detail page.
    $(document).on('click', '#closemenow', function closeformeofdemande() {

        let $this = $(this).val();
        let idchild = $(this).val();
        $.ajax({
            type: "POST",
            url: "../actionAjax/form_adopte_Child.php",
            data: {
                idchild: idchild,
                action: 1
            },
            success: function(response) {
                $('#closethetagform').html("");
            }
        });
    })

    //this code is to show the edit detail form for a particular user in the profil page:
    $(document).on('click', '.detailedit', function userdetailform() {
        let $this = $(this).val();
        let iduser = $(this).val();
        $.ajax({
            type: "POST",
            url: "../actionAjax/form_user_edit.php",
            data: {
                iduser: iduser,
                action: 1
            },
            success: function(response) {
                $('#showformuser' + iduser).html(response);

            }
        });
    })

    //this code is to hide the edit detail form for a particular user in the profil page:
    $(document).on('click', '#closeedituserform', function closeedituserform() {

        let $this = $(this).val();
        let iduser = $(this).val();
        $.ajax({
            type: "POST",
            url: "../actionAjax/form_user_edit.php",
            data: {
                iduser: iduser,
                action: 1
            },
            success: function(response) {
                $('#closethetagform' + iduser).html("");

            }
        });
    })

    //this code is to show back  the user detail after closing the form edit user detail:
    $(document).on('click', '#closeedituserform', function reopendetailuser() {

        let $this = $(this).val();
        let iduser = $(this).val();
        $.ajax({
            type: "POST",
            url: "../actionAjax/user_details.php",
            data: {
                iduser: iduser,
                action: 1
            },
            success: function(response) {
                $('#showformuser' + iduser).html(response);

            }
        });
    })

    //this code is to edit the detail of user:
    $(document).on('click', '#toedit', function edituser() {

        let $this = $(this).val();
        let iduser = $(this).val();
        let name = $('#myname').val();
        let email = $('#myemail').val();
        let dob = $('#mydob').val();
        let tel = $('#mytel').val();
        let sex = $('#mysex').val();
        let objectif = $('#myobjectif').val();
        let addresse = $('#myaddresse').val();
        $.ajax({
            type: "POST",
            url: "../actionAjax/edituser_action.php",
            data: {
                iduser: iduser,
                name: name,
                email: email,
                dob: dob,
                tel: tel,
                sex: sex,
                objectif: objectif,
                addresse: addresse,
                action: 1
            },
            success: function(response) {
                $('#notifications' + iduser).html(response);
            }
        });
    })

    //this code is to open the form to change password for a user:
    $(document).on('click', '.passwordchange', function passwordformopener() {

        let $this = $(this).val();
        let iduser = $(this).val();
        $.ajax({
            type: "POST",
            url: "../actionAjax/passwordChange_form.php",
            data: {
                iduser: iduser,
                action: 1
            },
            success: function(response) {
                $('#showformuser' + iduser).html(response);
            }
        });
    })

    //this code is to hide the form to change password for a user:
    $(document).on('click', '#closepassform', function passwordformcloser() {
        let $this = $(this).val();
        let iduser = $(this).val();
        $.ajax({
            type: "POST",
            url: "../actionAjax/passwordChange_form.php",
            data: {
                iduser: iduser,
                action: 1
            },
            success: function(response) {
                $('#showformuser' + iduser).html("");
            }
        });
    })

    //this code is to reopen the detail of a particular user after clossing the password formupdater:
    $(document).on('click', '#closepassform', function reopeneragain() {
        let $this = $(this).val();
        let iduser = $(this).val();
        $.ajax({
            type: "POST",
            url: "../actionAjax/user_details.php",
            data: {
                iduser: iduser,
                action: 1
            },
            success: function(response) {
                $('#showformuser' + iduser).html(response);
            }
        });
    })

    //this code is to update the password of a particular user:
    $(document).on('click', '#confirm', function updatepassword() {

        let $this = $(this).val();
        let iduser = $(this).val();
        let password = $('#password').val();
        let confirmer = $('#confirmer').val();
        $.ajax({
            type: "POST",
            url: "../actionAjax/update_password.php",
            data: {
                iduser: iduser,
                password: password,
                confirmer: confirmer,
                action: 1
            },
            success: function(response) {
                $('#notificationpassword' + iduser).html(response);
            }
        });
    })

    //this code allows a visitor  to send the review :
    $(document).on('click', '.sendreview', function sendreview() {

        let name = $('#name').val();
        let email = $('#email').val();
        let note = $('#note').val();
        let message = $('#message').val();
        $.ajax({
            type: "POST",
            url: "assets/actionAjax/send_review.php",
            data: {
                name: name,
                email: email,
                note: note,
                message: message,
                action: 1
            },
            success: function(response) {
                $('#review_notification').html(response);
            }
        });
    })

    //this code allows a visitor  to send the demande of adopting a child  :
    $(document).on('click', '#solution', function sendreview() {
        let $this = $(this).val();
        let myidchild = $(this).val();
        let myiduser = $('#myiduser').val();
        let myname = $('#myname').val();
        let myemail = $('#myemail').val();
        let mynumber = $('#mynumber').val();
        let mymessage = $('#mymessage').val();
        $.ajax({
            type: "POST",
            url: "../actionAjax/send_adoption_demand.php",
            data: {
                myidchild: myidchild,
                myiduser: myiduser,
                myname: myname,
                myemail: myemail,
                mynumber: mynumber,
                mymessage: mymessage,
                solution: 1
            },
            success: function(response) {
                $('#closethetagform').html("");
                $('#notificationforadoption' + myidchild).html(response);

            }
        });
    })

    //this code is to delete the demande of adopting  a child:
    $(document).on('click', '#deleteadopt', function deleteadopt() {
        let $this = $(this).val();
        let iddemande = $(this).val();
        $.ajax({
            type: "POST",
            url: "../actionAjax/delete_demande_adoption.php",
            data: {
                iddemande: iddemande,
                action: 1
            },
            success: function(response) {
                $('#closemethis' + iddemande).html("");
            }
        });
    })

    //this code is to show the detail of an adoption:
    $(document).on('click', '#clickonme', function clickonme() {

        let $this = $(this).val();
        let iddemande = $(this).val();
        $.ajax({
            type: "POST",
            url: "../actionAjax/open_detail_adoption_child.php",
            data: {
                iddemande: iddemande,
                action: 1
            },
            success: function(response) {
                $('#adoptedetail' + iddemande).html(response);

            }
        });
    })

    //this code is to hide a particular detail of an adoption:
    $(document).on('click', '#closethisdetail', function closethisdetail() {
        let $this = $(this).val();
        let iddemande = $(this).val();
        $.ajax({
            type: "POST",
            url: "../actionAjax/open_detail_adoption_child.php",
            data: {
                iddemande: iddemande,
                action: 1
            },
            success: function(response) {
                $('#adoptedetail' + iddemande).html("");
            }
        });
    })
});
</script>
</body>

</html>