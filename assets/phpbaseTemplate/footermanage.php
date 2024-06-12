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
                    <li><a href="#">Join </a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3 py-3">
                <h5>Our partner</h5>
                <ul class="footer-menu">
                    <li><a href="#">One-Fitness</a></li>
                    <li><a href="#">One-Drum</a></li>
                    <li><a href="#">One-Live</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3 py-3">
                <h5>Contact</h5>
                <p class="footer-link mt-2">351 kibelisa, kife 1991</p>
                <a href="#" class="footer-link">701-573-7582</a>
                <a href="#" class="footer-link">liveorphan@gmail.com</a>

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

        <p id="copyright">Copyright &copy; 2024 . All right
            reserved liveOrphan</p>
    </div>
</footer>

<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../vendor/owl-carousel/js/owl.carousel.min.js"></script>
<script src="../vendor/wow/wow.min.js"></script>
<script src="../js/theme.js"></script>
<script src="../js/manipilation.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Select/Deselect checkboxes
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function() {
        if (this.checked) {
            checkbox.each(function() {
                this.checked = true;
            });
        } else {
            checkbox.each(function() {
                this.checked = false;
            });
        }
    });
    checkbox.click(function() {
        if (!this.checked) {
            $("#selectAll").prop("checked", false);
        }
    });

    // search for user in the search bar for the admin------------
    $("#usersearch").keyup(function() {
        let input = $(this).val();
        if (input.length > 0) {
            $.ajax({
                url: "../actionAjax/search_user_forAdmin.php",
                method: "post",
                data: {
                    input: input
                },
                success: function(response) {
                    $(".gettable").html(response);
                    $(".gettable").css("display", "block");
                }
            });
        } else {
            $(".gettable").css("display", "none");
        }
        $(document).on('click', 'a', function() {
            $("#usersearch").val($(this).text());
            $(".gettable").html('');
        });
    });

    // count the number dynamicaly of users fund in the system while search ------------
    $("#usersearch").keyup(function() {
        let input = $(this).val();
        if (input.length > 0) {
            $.ajax({
                url: "../actionAjax/searchbar_count_users_forAdmin.php",
                method: "post",
                data: {
                    input: input
                },
                success: function(data) {
                    $("#countusers").html(data);
                    $("#countusers").css("display", "block");
                }
            });
        } else {
            $("#countusers").css("display", "none");
        }
        $(document).on('click', 'a', function() {
            $("#usersearch").val($(this).text());
            $("#countusers").html('');
        });
    });
    //end of searching user using the search bar----------------------


    //----------------------------------------------------------------
    //to make a search in the search bar for children
    $("#searcher").keyup(function() {
        let input = $(this).val();
        if (input.length > 0) {
            $.ajax({
                url: "../actionAjax/search_child_forAdmin.php",
                method: "post",
                data: {
                    input: input
                },
                success: function(response) {
                    $(".gettable").html(response);
                    $(".gettable").css("display", "block");
                }
            });
        } else {
            $(".gettable").css("display", "none");
        }
        $(document).on('click', 'a', function() {
            $("#searcher").val($(this).text());
            $(".gettable").html('');
        });
    });

    //count rows of  child found in the table of children while searching for the admin only
    $("#searcher").keyup(function() {
        let input = $(this).val();
        if (input.length > 0) {
            $.ajax({
                url: "../actionAjax/searchbar_count_child_forAdmin.php",
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
            $("#searcher").val($(this).text());
            $("#countrows").html('');
        });
    });
    //end search for children--------------------------------------------------

    //open the delete question form
    $(document).on('click', '#delete', function openform() {

        let $this = $(this).val();
        let idchild = $(this).val();
        $.ajax({
            type: "POST",
            url: "../actionAjax/deletechildForm.php",
            data: {
                idchild: idchild,
                actionone: 1
            },
            success: function(response) {
                $('.formdelete' + idchild).html(response);
            }
        });
    })

    //close the form of delete children one by one
    $(document).on('click', '#non', function closeform() {

        let $this = $(this).val();
        let idchild = $(this).val();
        $.ajax({
            type: "POST",
            url: "../actionAjax/deletechildForm.php",
            data: {
                idchild: idchild,
                actionone: 1
            },
            success: function(response) {
                $('.formdelete' + idchild).html("");
            }
        });
    })

    //delete children one by one
    $(document).on('click', '#oui', function deletechild() {

        let $this = $(this).val();
        let idchild = $(this).val();
        $.ajax({
            type: "POST",
            url: "../actionAjax/deletechild.php",
            data: {
                idchild: idchild,
                actiondelete: 1
            },
            success: function(response) {
                $('.notification').html(response);
                $('#fullchildren' + idchild).html("");

            }
        });
    })

    //show the form of delete all children at one
    $(document).on('click', '#deleteallchild', function deleteallchild() {
        $.ajax({
            type: "POST",
            url: "../actionAjax/deleteallchildform.php",
            data: {
                actionall: 1
            },
            success: function(response) {
                $('#allclose').html(response);

            }
        });
    })

    //close the form of delete all children at once
    $(document).on('click', '#nonAll', function closedeleteallform() {
        $.ajax({
            type: "POST",
            url: "../actionAjax/deleteallchildform.php",
            data: {
                actionall: 1
            },
            success: function(response) {
                $('#allclose').html("");
            }
        });
    })

    //delete all chiildren action
    $(document).on('click', '#ouiAll', function actiondeleteall() {
        $.ajax({
            type: "POST",
            url: "../actionAjax/actiondeleteAllchildren.php",
            data: {
                actionall: 1
            },
            success: function(response) {
                $('#allclose').html("");
                $('#alltable').html("");
                $('#notificationout').html(response);

            }
        });
    })

    //ce code sert a bloqué le compte d'un utilisateur
    $(document).on('click', '#activer', function active() {
        let $this = $(this).val();
        let iduser = $(this).val();
        $.ajax({
            type: "POST",
            url: "../actionAjax/bloquer_compte.php",
            data: {
                iduser: iduser,
                action: 1
            },
            success: function(response) {
                $('#buttonbloquer' + iduser).html(response);
                $('#buttonactive' + iduser).html(response);
            }
        });
    })

    //ce code sert a activer le compte d'un utilisateur
    $(document).on('click', '#bloquer', function bloque() {
        let $this = $(this).val();
        let iduser = $(this).val();
        $.ajax({
            type: "POST",
            url: "../actionAjax/activer_compte.php",
            data: {
                iduser: iduser,
                actionactive: 1
            },
            success: function(response) {
                $('#buttonbloquer' + iduser).html(response);
                $('#buttonactive' + iduser).html(response);

            }
        });
    })
    //ce code sert a admin a faire apparaitre la forme pour effacer un compte utilisateur
    $(document).on('click', '#delete_user', function delete_user() {
        let $this = $(this).val();
        let iduser = $(this).val();
        $.ajax({
            type: "POST",
            url: "../actionAjax/delete_acount_user_form.php",
            data: {
                iduser: iduser,
                action: 1
            },
            success: function(response) {
                $('.formduserdelete' + iduser).html(response);
            }
        });
    })

    //ce code sert a admin a fermer la forme pour effacer un compte utilisateur
    $(document).on('click', '#nonuser', function nonuser() {
        let $this = $(this).val();
        let iduser = $(this).val();
        $.ajax({
            type: "POST",
            url: "../actionAjax/delete_acount_user_form.php",
            data: {
                iduser: iduser,
                action: 1
            },
            success: function(response) {
                $('.formduserdelete' + iduser).html("");
            }
        });
    })

    //ce code sert a effacer l'utilisateur ciblé par l'admin
    $(document).on('click', '#ouiuser', function ouiuser() {
        let $this = $(this).val();
        let iduser = $(this).val();
        $.ajax({
            type: "POST",
            url: "../actionAjax/delete_acount_user.php",
            data: {
                iduser: iduser,
                action: 1
            },
            success: function(response) {
                $('#fulluser' + iduser).html("");
            }
        });
    })
    //getting the form of deleting all user at once 
    $(document).on('click', '#deletealluser', function deletealluser() {
        $.ajax({
            type: "POST",
            url: "../actionAjax/delete_all_user_account_form.php",
            data: {
                action: 1
            },
            success: function(response) {
                $('#alluserdeleteform').html(response);
            }
        });
    })

    //closing the form of deleting all user at once 
    $(document).on('click', '#nonAlluser', function nonAlluser() {
        $.ajax({
            type: "POST",
            url: "../actionAjax/delete_all_user_account_form.php",
            data: {
                action: 1
            },
            success: function(response) {
                $('#alluserdeleteform').html("");
            }
        });
    })

    //delete all account user at once
    $(document).on('click', '#ouiAlluser', function ouiAlluser() {
        $.ajax({
            type: "POST",
            url: "../actionAjax/delete_all_user.php",
            data: {
                action: 1
            },
            success: function(response) {
                $('#notificationout').html(response);
                $('#alluserdeleteform').html("");
                $('.gettable').html("");

            }
        });
    })

    //ce code sert a a modifier le status d'une demande d'adoption selon sa progression
    $(document).on('click', '#updateDecision', function updateDecision() {

        let $this = $(this).val();
        let idadoption = $(this).val();
        let selectme = $('#selectdecision' + idadoption).val();
        $.ajax({
            type: "POST",
            url: "../actionAjax/adopt_update_decision.php",
            data: {
                idadoption: idadoption,
                selectme: selectme,
                action: 1
            },
            success: function(response) {
                $('#showstatus' + idadoption).html(response);
            }
        });
    })

    //ce code sert a a modifier le status d'une demande d'adoption selon sa progression cote reference
    $(document).on('click', '#updateDecision', function updateDecision() {

        let $this = $(this).val();
        let idadoption = $(this).val();
        $.ajax({
            type: "POST",
            url: "../actionAjax/referencedynamique.php",
            data: {
                idadoption: idadoption,
                action: 1
            },
            success: function(response) {
                $('#newtoold' + idadoption).html(response);
            }
        });
    })

    //----------------------------------------------------------------
    //here we are going  to search for a demande of adoption by using the reference tokens
    $("#demandesearch").keyup(function() {
        let input = $(this).val();
        if (input.length > 0) {
            $.ajax({
                url: "../actionAjax/search_demande_foradmin.php",
                method: "post",
                data: {
                    input: input
                },
                success: function(response) {
                    $(".gettable").html(response);
                    $(".gettable").css("display", "block");
                }
            });
        } else {
            $(".gettable").css("display", "none");
        }
        $(document).on('click', 'a', function() {
            $("#demandesearch").val($(this).text());
            $(".gettable").html('');
        });
    });
    //----------------------------------------------------------------
    //here we are counting the number of demande fund in the system by reference number
    $("#demandesearch").keyup(function() {
        let input = $(this).val();
        if (input.length > 0) {
            $.ajax({
                url: "../actionAjax/count_search_demande_foradmin.php",
                method: "post",
                data: {
                    input: input
                },
                success: function(data) {
                    $("#countitnow").html(data);
                    $("#countitnow").css("display", "block");
                }
            });
        } else {
            $("#countitnow").css("display", "none");
        }
        $(document).on('click', 'a', function() {
            $("#demandesearch").val($(this).text());
            $("#countitnow").html('');
        });
    });
    //end of searching demande by the reference number using the search bar-

    // here admin is updating the user role

    $(document).on('click', '#rolebtn', function rolebtn() {
        let iduser = $(this).val();
        let selectrole = $('#selectrole' + iduser).val();
        $.ajax({
            type: "POST",
            url: "../actionAjax/updateuser_role_byadmin.php",
            data: {
                iduser: iduser,
                selectrole: selectrole,
                action: 1
            },
            success: function(response) {
                $('').html();
            }
        });
    })
});
</script>
</body>

</html>