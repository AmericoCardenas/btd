<html>

<h1>Usuarios</h1>

<div class="row">
    <div class="col-md-12" style="text-align:right !important;">

        <form method="post">
            <button title="Agregar" type="button" class="btn btnadd" id="btn-add" data-bs-toggle="modal"
                data-bs-target="#modal_agregar"><i class="fas fa-plus-circle"></i></button>

            <button title="Exportar Excel" formaction="<?php echo base_url();?>FunctionsController/exportar_usuarios"
                id="btn-excel" class="btn btn-success"><i class="fas fa-file-excel"></i></button>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-sm" id="table_id" style="text-align:center !important;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>EMAIL</th>
                    <th>PASSWORD</th>
                    <th>AREA</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tb as $row => $value) { ?>
                <tr>
                    <td><?php echo $value['ID']; ?></td>
                    <td><?php echo $value['NOMBRE']; ?></td>
                    <td><?php echo $value['EMAIL']; ?></td>
                    <td><?php echo $value['PASWORD']; ?></td>
                    <td><?php echo $value['AREA']; ?></td>

                    <td><button title="Editar" type="button" class="btn btnedit" id="btn-edit" data-bs-toggle="modal"
                            data-bs-target="#modal_editar" value="<?php echo $value['ID']; ?>"><i
                                class="fas fa-edit"></i></button></td>

                    <td><button title="Eliminar" type="button" class="btn btndelete" id="btn-delete"
                            value="<?php echo $value['ID']; ?>"><i class="fas fa-trash-alt"></i></button></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>           


<!-- Modal Agregar -->
<div class="modal" id="modal_agregar" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="text-align:center !important">Agregar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <label>NOMBRE</label>
                <input type="text" name="nombre" id="nombre" onkeypress="return soloLetras(event)" required>
                <hr>

                <label>EMAIL</label>
                <input type="email" name="email2" id="email2" required>
                <hr>

                <label>PASSWORD</label>
                <input type="password" name="password" id="password" required>
                <hr>

                <label>AREA</label>
                <select name="area" id="area" class="form-control" required>
                <option value="" selected>SELECCIONAR AREA</option>
                <option value="SISTEMAS">SISTEMAS</option>
                <option value="CONTABILIDAD">CONTABILIDAD</option>
                <option value="RECURSOS HUMANOS">RECURSOS HUMANOS</option>
                <option value="ALMACEN">ALMACEN</option>
                <option value="LOGISTICA">LOGISTICA</option>
                <option value="TALLER">TALLER</option>
                <option value="DIESEL">DIESEL</option>
                <option value="GERENCIA">GERENCIA</option>
                <option value="ADMIN">ADMIN</option>
                </select>
                <hr>

            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" id="btn_guardar" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- MODAL EDITAR -->
<div class="modal" id="modal_editar" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="text-align:center !important">Editar Empleado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <input type="text" name="id" id="id_edt" hidden>

                <label>NOMBRE</label>
                <input type="text" name="nombre" id="edt_nombre" required>
                <hr>

                <label>EMAIL</label>
                <input type="email" name="email2" id="edt_email2" required>
                <hr>

                <label>CONTRASEÑA</label>
                <input type="password" name="password" id="edt_password" required>
                <hr>

                <label>AREA</label>
                <select name="area" id="edt_area" class="form-control" required>
                <option value="" selected>SELECCIONAR AREA</option>
                <option value="SISTEMAS">SISTEMAS</option>
                <option value="CONTABILIDAD">CONTABILIDAD</option>
                <option value="RECURSOS HUMANOS">RECURSOS HUMANOS</option>
                <option value="ALMACEN">ALMACEN</option>
                <option value="LOGISTICA">LOGISTICA</option>
                <option value="TALLER">TALLER</option>
                <option value="DIESEL">DIESEL</option>
                <option value="GERENCIA">GERENCIA</option>
                <option value="ADMIN">ADMIN</option>
                <option value="GESTORIA">GESTORIA</option>
                <option value="COMERCIAL">COMERCIAL</option>
                </select>
                <hr>

            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" id="btn_update" class="btn btn-primary btnupdate">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
//TABLA JQUERY//
$(document).ready(function() {
    $('#table_id').DataTable();
});


//AÑADIR//
$(document).ready(function() {
    $("#btn_guardar").click(function(event) {
        var nombre = $("#nombre").val().toUpperCase();
        var email = $("#email2").val().toUpperCase();
        var password = $("#password").val().toUpperCase();
        var area = $("#area").val().toUpperCase();

        if (nombre == "" || email == "" || password == "" || area == "") {
            swal({
                title: "Aviso",
                text: "Favor de no dejar campos vacios",
                icon: "info",
            })
            $('#modal_cuenta').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $("#main").load('<?php echo base_url(); ?>FunctionsController/usuarios');
        } else {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>FunctionsController/insert_usuario",
                data: {
                    nombre: nombre,
                    email: email,
                    password: password,
                    area: area
                },
                success: function(data) {
                    swal({
                        title: "Usuario Guardado Exitosamente",
                        text: email,
                        icon: "success",
                    });
                    $('#modal_cuenta').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    $("#main").load(
                        '<?php echo base_url(); ?>FunctionsController/usuarios');
                },
            })
        }
    });
});


    //ELIMINAR//
    $(document).ready(function() {
        $(".btndelete").on("click", function() {
            var id = $(this).val();
            swal({
                title: "¿Esta seguro de eliminar este dato?",
                text: "No se podra recuperar este elemento",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>FunctionsController/delete_usuario",
                        data: {
                            id: id
                        }
                    }).done(function() {
                        swal({
                            title: "Eliminado",
                            text: "Usuario eliminado exitosamente",
                            icon: "success",
                        }).then(function() {
                            $("#main").load(
                                '<?php echo base_url(); ?>FunctionsController/usuarios'
                            );

                        });
                    });

                } else {
                    swal("Cambio no efectuado");
                }
            });
        });
    });

    //MODAL EDITAR//
    $(document).ready(function() {
        $(".btnedit").click(function(event) {
            var id = $(this).val();
            if (id != "") {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>FunctionsController/usuario",
                    data: {
                        id: id
                    },
                    success: function(result) {
                        var result = JSON.parse(result);
                        $.each(result, function(i, result) {
                            $("#id_edt").val(result.ID);
                            $("#edt_nombre").val(result.NOMBRE);
                            $("#edt_email2").val(result.EMAIL);
                            $("#edt_password").val(result.PASWORD);
                            $("#edt_area").val(result.AREA);
                        });
                    },
                });
            }
        });
    });

    //UPDATE//
    $(document).ready(function() {
        $(".btnupdate").click(function(event) {

                //VARIABLES//
                var id = $("#id_edt").val();
                var nombre = $("#edt_nombre").val().toUpperCase();               
                var email = $("#edt_email2").val().toUpperCase();            
                var password = $("#edt_password").val().toUpperCase();          
                var area = $("#edt_area").val().toUpperCase();    

                //COMPROBAR//
                if (id != "" || nombre != "" || email != "" || password != "" || area != "") {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>FunctionsController/update_usuario",
                        data: {
                            id: id,
                            nombre: nombre,
                            email: email,
                            password: password,
                            area: area
                        },
                        success: function(result) {
                            swal({
                        title: "Actualizado",
                        text: "Empleado actualizado exitosamente",
                        icon: "success",
                    }).then(function() {
                        $('#modal_cuenta').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        $("#main").load('<?php echo base_url(); ?>FunctionsController/usuarios');

                    });
                        },
                    });   

                    }else{
                        swal({
                        title: "Aviso",
                        text: "Favor de no dejar campos vacios",
                        icon: "info",
                    });
                    $('#modal_cuenta').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    $("#main").load('<?php echo base_url(); ?>FunctionsController/usuarios');  
                    }
        });
    });
</script>

</html>