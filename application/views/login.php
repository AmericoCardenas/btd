<html>
<title>BTP</title>
<link rel="icon" href="<?php echo base_url();?>application/assets/img/data.ico">
<head>
    <!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://kit.fontawesome.com/794c9fe0f4.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>application/assets/css/styles.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
    </script>

</head>

<body onload="deshabilitaRetroceso();">

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 col-sm-12"></div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12"></div>
        </div>

        <div class="row" style="text-align:center !important;">
            <div class="col-md-4"></div>
            <div class="col-md-4 col-sm-12">
                <div class="card">
                    <img src="<?php echo base_url();?>application/assets/img/tda.jpg" class="card-img-top" alt="...">
                    <form method="post" action="<?php echo base_url();?>FunctionsController/login" >
                        <div class="card-body">
                            <div class="input-field">
                                <input id="email" name="email" type="email" class="validate" placeholder="Email">
                                <label for="email">Correo</label>
                            </div>

                            <div class="input-field">
                                <input id="password" name="password" type="password" class="validate" placeholder="Contraseña">
                                <label for="password">Contraseña</label>
                            </div>

                            <div style="text-align:center">
                                <button type="submit" class="btn btn-primary">Ingresar <i
                                        class="fas fa-check"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12"></div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12"></div>
        </div>
    </div>


</body>


<script>
function deshabilitaRetroceso() {
    window.location.hash = "no-back-button";
    window.location.hash = "Again-No-back-button" //chrome
    window.onhashchange = function() {
        window.location.hash = "no-back-button";
    }
}
</script>

</html>