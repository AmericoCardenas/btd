<html>

<h1>Proveedores</h1>

<div class="row">
    <div class="col-md-12" style="text-align:right !important;">

        <form method="post">
            <button title="Agregar" type="button" class="btn btnadd" id="btn-add" data-bs-toggle="modal"
                data-bs-target="#modal_agregar"><i class="fas fa-plus-circle"></i></button>

            <button title="Exportar Excel" formaction="<?php echo base_url();?>FunctionsController/exportar_proveedores"
                id="btn-excel" class="btn btn-success"><i class="fas fa-file-excel"></i></button>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-sm" id="table_id" style="text-align:center !important;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>RAZON SOCIAL</th>
                    <th>RFC</th>
                    <th>CALLE</th>
                    <th>NO.EXT</th>
                    <th>NO.INT</th>
                    <th>COLONIA</th>
                    <th>C.P</th>
                    <th>MUNICIPIO</th>
                    <th>ESTADO</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tb as $row => $value) { ?>
                <tr>
                    <td><?php echo $value['ID']; ?></td>
                    <td><?php echo $value['NOMBRE']; ?></td>
                    <td><?php echo $value['RAZONSOCIAL']; ?></td>
                    <td><?php echo $value['RFC']; ?></td>
                    <td><?php echo $value['CALLE']; ?></td>
                    <td><?php echo $value['NOEXT']; ?></td>
                    <td><?php echo $value['NOINT']; ?></td>
                    <td><?php echo $value['COLONIA']; ?></td>
                    <td><?php echo $value['CP']; ?></td>
                    <td><?php echo $value['MUNICIPIO']; ?></td>
                    <td><?php echo $value['ESTADO']; ?></td>

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
                <h5 class="modal-title" style="text-align:center !important">Agregar Proveedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <label>NOMBRE COMERCIAL</label>
                <input type="text" name="nombre" id="nombre" required>
                <hr>

                <label>RAZON SOCIAL</label>
                <input type="text" name="razonsocial" id="razonsocial" required>
                <hr>

                <label>RFC</label>
                <input type="text" name="rfc" id="rfc" required>
                <hr>

                <label>CALLE</label>
                <input type="text" name="calle" id="calle" required>
                <hr>

                <label>NO. EXT</label>
                <input type="number" name="noext" id="noext" onkeypress='return validaNumericos(event)' required>
                <hr>

                <label>NO. INT</label>
                <input type="text" name="noint" id="noint" onkeypress='return validaNumericos(event)' required>
                <hr>

                <label>COLONIA</label>
                <input type="text" name="colonia" id="colonia" required>
                <hr>

                <label>C.P</label>
                <input type="text" name="cp" id="cp" onkeypress='return validaNumericos(event)' required>
                <hr>

                <label>MUNICIPIO</label>
                <input type="text" name="municipio" id="municipio" required>
                <hr>

                <label>ESTADO</label>
                <input type="text" name="estado" id="estado" required>
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
                <h5 class="modal-title" style="text-align:center !important">Editar Proveedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <input type="text" name="id" id="id_edt" hidden>

                <label>NOMBRE COMERCIAL</label>
                <input type="text" name="nombre" id="nombre_edt" required>
                <hr>

                <label>RAZON SOCIAL</label>
                <input type="text" name="razonsocial" id="razonsocial_edt" required>
                <hr>

                <label>RFC</label>
                <input type="text" name="rfc" id="rfc_edt" required>
                <hr>

                <label>CALLE</label>
                <input type="text" name="calle" id="calle_edt" required>
                <hr>

                <label>NO. EXT</label>
                <input type="number" name="noext" id="noext_edt" onkeypress='return validaNumericos(event)' required>
                <hr>

                <label>NO. INT</label>
                <input type="text" name="noint" id="noint_edt" onkeypress='return validaNumericos(event)' required>
                <hr>

                <label>COLONIA</label>
                <input type="text" name="colonia" id="colonia_edt" required>
                <hr>

                <label>C.P</label>
                <input type="text" name="cp" id="cp_edt" onkeypress='return validaNumericos(event)' required>
                <hr>

                <label>MUNICIPIO</label>
                <input type="text" name="municipio" id="municipio_edt" required>
                <hr>

                <label>ESTADO</label>
                <input type="text" name="estado" id="estado_edt" required>
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
        var razonsocial = $("#razonsocial").val().toUpperCase();
        var rfc = $("#rfc").val().toUpperCase();
        var calle = $("#calle").val().toUpperCase();
        var noext = $("#noext").val();
        var noint = $("#noint").val();
        var colonia = $("#colonia").val().toUpperCase();
        var cp = $("#cp").val();
        var municipio = $("#municipio").val().toUpperCase();
        var estado = $("#estado").val().toUpperCase();

        if (nombre == "" || razonsocial == "" || rfc == "" || calle == "" || noext == "" ||
            noint == "" || colonia == "" || cp == "" || municipio == "" || estado == "") {
            swal({
                title: "Aviso",
                text: "Favor de no dejar campos vacios",
                icon: "info",
            })
            $('#modal_cuenta').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $("#main").load('<?php echo base_url(); ?>FunctionsController/proveedores');
        } else {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>FunctionsController/insert_proveedor",
                data: {
                    nombre: nombre,
                    razonsocial: razonsocial,
                    rfc: rfc,
                    calle: calle,
                    noext: noext,
                    noint: noint,
                    colonia: colonia,
                    cp: cp,
                    municipio: municipio,
                    estado: estado
                },
                success: function(data) {
                    swal({
                        title: "Proveedor Guardado Exitosamente",
                        text: nombre,
                        icon: "success",
                    });
                    $('#modal_cuenta').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    $("#main").load(
                        '<?php echo base_url(); ?>FunctionsController/proveedores');
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
                        url: "<?php echo base_url(); ?>FunctionsController/delete_proveedor",
                        data: {
                            id: id
                        }
                    }).done(function() {
                        swal({
                            title: "Eliminado",
                            text: "Proveedor eliminado exitosamente",
                            icon: "success",
                        }).then(function() {
                            $("#main").load(
                                '<?php echo base_url(); ?>FunctionsController/proveedores'
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
                    url: "<?php echo base_url(); ?>FunctionsController/proveedor",
                    data: {
                        id: id
                    },
                    success: function(result) {
                        var result = JSON.parse(result);
                        $.each(result, function(i, result) {
                            $("#id_edt").val(result.ID);
                            $("#nombre_edt").val(result.NOMBRE);
                            $("#razonsocial_edt").val(result.RAZONSOCIAL);
                            $("#rfc_edt").val(result.RFC);
                            $("#calle_edt").val(result.CALLE);
                            $("#noext_edt").val(result.NOEXT);
                            $("#noint_edt").val(result.NOINT);
                            $("#colonia_edt").val(result.COLONIA);
                            $("#cp_edt").val(result.CP);
                            $("#municipio_edt").val(result.MUNICIPIO);
                            $("#estado_edt").val(result.ESTADO);
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
                var nombre = $("#nombre_edt").val().toUpperCase();
                var razonsocial = $("#razonsocial_edt").val().toUpperCase();
                var rfc = $("#rfc_edt").val().toUpperCase();
                var calle = $("#calle_edt").val().toUpperCase();
                var noext = $("#noext_edt").val();
                var noint = $("#noint_edt").val();
                var colonia = $("#colonia_edt").val().toUpperCase();
                var cp = $("#cp_edt").val();
                var municipio = $("#municipio_edt").val().toUpperCase();
                var estado = $("#estado_edt").val().toUpperCase();

                //COMPROBAR//
                if (id != "" || nombre != "" || razonsocial != "" || rfc != "" || calle != "" || noext != "" ||
                    noint != "" || colonia != "" || cp != "" || municipio != "" || estado != "") {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>FunctionsController/update_proveedor",
                        data: {
                            id: id,
                            nombre: nombre,
                            razonsocial: razonsocial,
                            rfc: rfc,
                            calle: calle,
                            noext: noext,
                            noint: noint,
                            colonia: colonia,
                            cp: cp,
                            municipio: municipio,
                            estado: estado,
                        },
                        success: function(result) {
                            swal({
                        title: "Actualizado",
                        text: "Proveedor actualizado exitosamente",
                        icon: "success",
                    }).then(function() {
                        $('#modal_cuenta').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        $("#main").load('<?php echo base_url(); ?>FunctionsController/proveedores');

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
                    $("#main").load('<?php echo base_url(); ?>FunctionsController/proveedores');  
                    }
        });
    });
</script>

</html>