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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="../js/manipilation.js"></script>
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

    // search for employee in the search bar for the admin------------
    $("#teamsearch").keyup(function() {
        let input = $(this).val();
        if (input.length > 0) {
            $.ajax({
                url: "../actionAjax/search_employe.php",
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
            $("#teamsearch").val($(this).text());
            $(".gettable").html('');
        });
    });

    // count the number dynamicaly of employee fund in the system while search ------------
    $("#teamsearch").keyup(function() {
        let input = $(this).val();
        if (input.length > 0) {
            $.ajax({
                url: "../actionAjax/searchbar_count_teams.php",
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
            $("#teamsearch").val($(this).text());
            $("#countusers").html('');
        });
    });
    //end of searching employee using the search bar----------------------
    //----------------------------------------------------------------

    // search for services in the search bar for the admin------------
    $("#servicesearch").keyup(function() {
        let input = $(this).val();
        if (input.length > 0) {
            $.ajax({
                url: "../actionAjax/search_services.php",
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
            $("#servicesearch").val($(this).text());
            $(".gettable").html('');
        });
    });

    // count the number dynamicaly of services fund in the system while search ------------
    $("#servicesearch").keyup(function() {
        let input = $(this).val();
        if (input.length > 0) {
            $.ajax({
                url: "../actionAjax/searchbar_count_service.php",
                method: "post",
                data: {
                    input: input
                },
                success: function(data) {
                    $("#countservice").html(data);
                    $("#countservice").css("display", "block");
                }
            });
        } else {
            $("#countservice").css("display", "none");
        }
        $(document).on('click', 'a', function() {
            $("#servicesearch").val($(this).text());
            $("#countservice").html('');
        });
    });

    //ici nous allons activer un temoignage pour que ca soit visible pour le visiteur dans la page index
    $(document).on('click', '.nonactive', function() {
        var $this = $(this);
        var reviewid = $(this).val();

        $this.toggleClass('nonactive');
        if ($this.hasClass('nonactive')) {
            $this.text('nonactive');
        } else {
            $this.text('active');

            $this.addClass("activerreview");
        }
        $.ajax({
            type: 'POST',
            url: '../actionAjax/active_review.php',
            data: {
                reviewid: reviewid,
                active: 1
            },

            success: function() {

            }
        });
    });

    //ici nous allons desactiver un temoignage pour que ca soit plus visible pour le visiteur dans la page index
    $(document).on('click', '.activerreview', function() {
        var $this = $(this);
        var reviewid = $(this).val();

        $this.toggleClass('activerreview');
        if ($this.hasClass('activerreview')) {
            $this.text('active');
        } else {
            $this.text('nonactive');

            $this.addClass("nonactive");
        }
        $.ajax({
            type: 'POST',
            url: '../actionAjax/desactive_review.php',
            data: {
                reviewid: reviewid,
                active: 1
            },

            success: function() {

            }
        });
    });

});
</script>
</body>

</html>