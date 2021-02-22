<html>
<title>BTP </title>
<link rel="icon" href="<?php echo base_url();?>application/assets/img/data.ico">

<head>
    
    <!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->
    <link rel="stylesheet" href="<?php echo base_url();?>application/assets/img/coding.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
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

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js">
    </script>

    
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js">
    </script>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.3.2/css/fixedColumns.bootstrap.min.css"> -->

    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="<?php echo base_url();?>application/assets/css/magnific-popup.css">

    <!-- Magnific Popup core JS file -->
    <script src="<?php echo base_url();?>application/assets/js/jquery.magnific-popup.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.0/jspdf.umd.min.js" integrity="sha512-GctVjwNNH1cjfoaMyi3WTXq/Y+NDpQ2q+tVPGtNNCgmKiokNiWR68MMYbgaCLg5IgHgZ3dM8EVcmRpJVBLkaiA==" crossorigin="anonymous"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>


</head>



<body>

<?php foreach($data_user as $row => $value){ ?>  
<?php $area = $value['AREA']; ?> 

<div class="row">
        <div class="col-md-2">
    <header>
        <ul id="nav-mobile" class="sidenav side-nav fixed">
            <li>
                <div class="user-view">
                   

                    <a href="#user"><img class="circle"
                            src="<?php echo base_url();?>application/assets/img/tda.jpg"></a>

                    <a><span class="white-text name"><?php echo $value['NOMBRE'];?></span></a>

                    <a><span class="white-text name"><?php echo $value['AREA'];?></span></a>

                    <a><span class="white-text email"><?php echo $value['EMAIL'];?></span></a>

                    <input type="text" hidden value="<?php echo $value['EMAIL'];?>" id="email" name="email">
                    <input type="text" hidden value="<?php echo $value['ID'];?>" id="id" name="id">
                   

                </div>
            </li>
      
            <ul class="collapsible">

                <!-- CATALOGOS -->
                    <li>
                        <div class="collapsible-header"><i class="fas fa-database" style="color:orange !important;"></i>
                            <span class="span-menu"> Catalogos</span>
                        </div>
                        <div class="collapsible-body">
                            <ul class="ul-slide">

                                

                                <!-- CONTABILIDAD -->
                                <?php if($area == "CONTABILIDAD" || $area == "GERENCIA" ){?>

                                <li><a href="#" id="btn-bancos"><i class="fas fa-university fa-2x islide"></i><span
                                            class="sp">Bancos</span></a></li>

                                <li><a href="#" id="btn-cuentas"><i class="fas fa-money-check fa-2x islide"></i><span
                                            class="sp">Cuentas
                                        </span></a></li>

                                <li><a href="#" id="btn-proveedores"><i class="fas fa-store-alt fa-2x islide"></i><span
                                            class="sp">Proveedores</span></a></li>

                                <?php } ?>
                                <!-- CONTABILIDAD -->

                                <!-- LOGISTICA -->
                                <?php if($area == "LOGISTICA" || $area == "GERENCIA"){?>

                                <li><a href="#" id="btn-unidades"><i class="fas fa-bus fa-2x islide"></i><span class="sp">Unidades</span></a>
                                </li>

                                <?php } ?>
                                <!-- LOGISTICA -->

                                <!-- RECURSOS HUMANOS -->        
                                <?php if($area == "RECURSOS HUMANOS" || $area == "GERENCIA"){?> 

                                <li><a href="#" id="btn-empleados"><i class="fas fa-user-alt fa-2x islide"></i><span class="sp">
                                            Empleados</span></a></li>

                                <?php } ?>
                                <!-- RECURSOS HUMANOS -->   

                                <!-- SISTEMAS --> 
                                <?php if($area == "SISTEMAS" || $area == "GERENCIA"){?> 

                                <li><a href="#" id="btn-usuarios"><i class="fas fa-users fa-2x islide"></i><span class="sp">
                                Usuarios</span></a></li>

                                <?php } ?>    
                                <!-- SISTEMAS -->

                            </ul>
                        </div>
                    </li>
                <!-- CATALOGOS -->

                <!-- CONTABILIDAD -->
                    <?php if($area == "CONTABILIDAD" || $area == "GERENCIA" ){?>

                    <li>
                        <div class="collapsible-header"><i class="fas fa-dollar-sign" style="color:orange !important;"></i>
                            <span class="span-menu"> Contabilidad</span>
                        </div>

                        <!-- FLUJOS -->
                        <div class="collapsible-body">
                            <ul class="ul-slide">
                                <li><a href="#" id="btn-flujos"><i class="fas fa-file-invoice-dollar fa-2x islide"></i><span
                                            class="sp">Flujos</span></a></li>
                            </ul>
                        </div>
                        <!-- FLUJOS -->

                    </li>

                    <?php } ?> 
                <!-- CONTABILIDAD -->

                <!-- SISTEMAS -->
                    <?php if($area == "SISTEMAS" || $area == "GERENCIA" ){?>

                    <li>
                        <div class="collapsible-header"><i class="fas fa-desktop" style="color:orange !important;"></i>
                            <span class="span-menu"> Sistemas</span>
                        </div>
                        <div class="collapsible-body">
                            <ul class="ul-slide">
                                <li><a href="#"><i class="fas fa-box-open fa-2x islide"></i><span
                                            class="sp">Inventario</span></a></li>
                            </ul>
                        </div>
                    </li>

                    <?php } ?> 
                <!-- SISTEMAS -->

                <!-- TALLER -->
                    <?php if($area == "TALLER" || $area == "GERENCIA" ){?>

                    <li>
                        <div class="collapsible-header"><i class="fas fa-cogs" style="color:orange !important;"></i>
                            <span class="span-menu"> Taller</span>
                        </div>
                        <div class="collapsible-body">
                            <ul class="ul-slide">
                                <li><a href="#"><i class="fas fa-tools fa-2x islide"></i><span
                                            class="sp">Mantenimientos</span></a></li>
                            </ul>
                        </div>
                    </li>

                    <?php } ?> 
                <!-- TALLER -->  
                
                <!-- ALMACEN -->
                    <?php if($area == "ALMACEN" || $area == "GERENCIA" ){?>

                    <li>
                        <div class="collapsible-header"><i class="fas fa-store-alt" style="color:orange !important;"></i>
                            <span class="span-menu"> Almacen</span>
                        </div>
                        <div class="collapsible-body">
                            <ul class="ul-slide">
                                <li><a href="#" id="btn-requisicion"><i class="fas fa-file-alt fa-2x islide"></i><span
                                class="sp">Requisición</span></a></li>

                                <li><a href="#" id="btn-orden"><i class="fas fa-file-signature fa-2x islide"></i><span
                                class="sp">Ordenes C.</span></a></li>
                                
                                
                                <li><a href="#"><i class="fas fa-arrow-right fa-2x islide"></i><span
                                class="sp">Entradas</span></a></li>  

                                
                                <li><a href="#"><i class="fas fa-arrow-left fa-2x islide"></i><span
                                class="sp">Salidas</span></a></li>  
                            </ul>
                        </div>
                    </li>

                    <?php } ?> 
                <!-- ALMACEN -->       



                <!-- SALIR -->
                    <li>
                        <div class="collapsible-header"><i class="fas fa-window-close" style="color:orange !important;"></i>
                            <span class="span-menu"> Cerrar Sesión</span>
                        </div>
                        <div class="collapsible-body">
                            <ul class="ul-slide">
                                <li><a href="<?php echo base_url();?>FunctionsController/salir" id="btn-salir"><i class="fas fa-door-closed fa-2x islide"></i><span
                                            class="sp">Salir</span></a></li>
                            </ul>
                        </div>
                    </li>
                <!-- SALIR -->
            </ul>
           

        </ul>
    </header>
    </div>

<div class="col-md-10">
    <main>
       
            <div class="row">

                <div class="col-md" id="main">
    

                </div>

            </div>

    </main>
</div>
<?php } ?>



    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo base_url();?>application/assets/js/contabilidad.js"></script>
    <script>
    $(document).ready(function() {
        $("#btn-bancos").click(function(event) {
            $("#main").load('<?php echo base_url();?>FunctionsController/bancos');
        });
    });

    $(document).ready(function() {
        $("#btn-cuentas").click(function(event) {
            $("#main").load('<?php echo base_url();?>FunctionsController/cuentas');
        });
    });

    $(document).ready(function() {
        $("#btn-proveedores").click(function(event) {
            $("#main").load('<?php echo base_url();?>FunctionsController/proveedores');
        });
    });

    $(document).ready(function() {
        $("#btn-unidades").click(function(event) {
            var id_user = $('#id').val();
            $("#main").load('<?php echo base_url();?>FunctionsController/unidades',{id_user:id_user});
        });
    });

    $(document).ready(function() {
        $("#btn-empleados").click(function(event) {
            $("#main").load('<?php echo base_url();?>FunctionsController/empleados');
        });
    });

    $(document).ready(function() {
        $("#btn-usuarios").click(function(event) {
            $("#main").load('<?php echo base_url();?>FunctionsController/usuarios');
        });
    });

    $(document).ready(function() {
        $("#btn-flujos").click(function(event) {
            var id_user = $('#id').val();
            $("#main").load('<?php echo base_url();?>FunctionsController/flujos',{id_user:id_user});    
        });
    });

    $(document).ready(function() {
        $("#btn-requisicion").click(function(event) {
            var id_user = $('#id').val();
            $("#main").load('<?php echo base_url();?>FunctionsController/requisiciones',{id_user:id_user});    
        });
    });

    $(document).ready(function() {
        $("#btn-orden").click(function(event) {
            var id_user = $('#id').val();
            $("#main").load('<?php echo base_url();?>FunctionsController/ordenes',{id_user:id_user});    
        });
    });

    // </script>




</body>

</html>