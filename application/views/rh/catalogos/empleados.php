<html>

<h1>Empleados</h1>

<div class="row">
    <div class="col-md-12" style="text-align:right !important;">

        <form method="post">
            <button title="Agregar" type="button" class="btn btnadd" id="btn-add" data-bs-toggle="modal"
                data-bs-target="#modal_agregar"><i class="fas fa-plus-circle"></i></button>

            <button title="Exportar Excel" formaction="<?php echo base_url();?>FunctionsController/exportar_empleados"
                id="btn-excel" class="btn btn-success"><i class="fas fa-file-excel"></i></button>
        </form>
    </div>

    <div class="table-responsive table-fixed">
        <table class="table table-sm" id="table_id" style="text-align:center !important;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FOTO</th>
                    <th>FECHA INGRESO</th>
                    <th>NOMBRE</th>
                    <th>TIPO</th>
                    <th>CLASE</th>
                    <th>PUESTO</th>
                    <th>CALLE</th>
                    <th>NO.EXT</th>
                    <th>NO.INT</th>
                    <th>COLONIA</th>
                    <th>C.P</th>
                    <th>MUNICIPIO</th>
                    <th>ESTADO</th>
                    <th>TELEFONO</th>
                    <th>CELULAR</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tab as $row => $value) { ?>
                <tr class="tr">
                    <td><?php echo $value['ID']; ?></td>
                    <td><a href="../../../uploads/<?php echo $value['FOTO'];?>"><img src="../../../uploads/<?php echo $value['FOTO'];?>" height="80px !important" width="80px !important" id="img" class="img"></a></td>
                    <td><?php echo $value['FI']; ?></td>
                    <td><?php echo $value['NOMBRE']; ?></td>
                    <td><?php echo $value['TIPO']; ?></td>
                    <td><?php echo $value['CLASE']; ?></td>
                    <td><?php echo $value['PUESTO']; ?></td>
                    <td><?php echo $value['CALLE']; ?></td>
                    <td><?php echo $value['NOEXT']; ?></td>
                    <td><?php echo $value['NOINT']; ?></td>
                    <td><?php echo $value['COLONIA']; ?></td>
                    <td><?php echo $value['CP']; ?></td>
                    <td><?php echo $value['MUNICIPIO']; ?></td>
                    <td><?php echo $value['ESTADO']; ?></td>
                    <td><?php echo $value['TELEFONO']; ?></td>
                    <td><?php echo $value['CELULAR']; ?></td>

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
                <h5 class="modal-title" style="text-align:center !important">Agregar Empleado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

        
            <form enctype="multipart/form-data" method="POST" id="submit">  
            <div class="modal-body">
                    
                <label>FOTO</label>   
                <input type="file" name="foto" id="foto" class="form-control" required>
                <hr>   

                <label>FECHA INGRESO</label>   
                <input type="date" class="form-control" name="fi" id="fi" required>
                <hr>   

                <label>NOMBRE</label>   
                <input type="text" name="nombre" id="nombre" onkeypress="return soloLetras(event)" required>
                <hr>

                <label>TIPO</label>
                <select name="tipo" id="tipo" class="form-control">
                    <option value="" selected>SELECCIONAR TIPO</option>
                    <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                    <option value="OPERADOR">OPERADOR</option>
                </select>
                <hr>

                <label>CLASE</label>
                <select name="clase" id="clase" class="form-control">
                    <option value="" selected>SELECCIONAR CLASE</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="NINGUNA">NINGUNA</option>           
                </select>
                <hr>

                <label>PUESTO</label>
                <input type="text" name="puesto" id="puesto" onkeypress="return soloLetras(event)" required>
                <hr>

                <label>CALLE</label>
                <input type="text" name="calle" id="calle" onkeypress="return soloLetras(event)" required>
                <hr>

                <label>NO. EXT</label>
                <input type="number" name="noext" id="noext" onkeypress='return validaNumericos(event)' required>
                <hr>

                <label>NO. INT</label>
                <input type="text" name="noint" id="noint" onkeypress='return validaNumericos(event)' required>
                <hr>

                <label>COLONIA</label>
                <input type="text" name="colonia" id="colonia" onkeypress="return soloLetras(event)" required>
                <hr>

                <label>C.P</label>
                <input type="text" name="cp" id="cp" onkeypress='return validaNumericos(event)' required>
                <hr>

                <label>MUNICIPIO</label> 
                <input type="text" name="municipio" id="municipio" onkeypress="return soloLetras(event)" required>
                <hr>

                <label>ESTADO</label>
                <input type="text" name="estado" id="estado" onkeypress="return soloLetras(event)"required>
                <hr>

                <label>TELEFONO</label>
                <input type="text" name="telefono" id="telefono" onkeypress='return validaNumericos(event)' required>
                <hr>

                <label>CELULAR</label>
                <input type="text" name="celular" id="celular" onkeypress='return validaNumericos(event)' required>
                <hr>


            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btn_guardar" class="btn btn-primary">Guardar</button>
                    
                    </div>
                </div>
            </div>
            </form>
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

            <form enctype="multipart/form-data" method="POST" id="update"> 
            <div class="modal-body">

                <input type="text" name="id" id="id_edt" hidden>

                <label>FOTO</label>   
                <input type="file" name="foto" id="foto_edt" class="form-control" required>
                <hr>   

                <label>FECHA INGRESO</label>   
                <input type="date" class="form-control" name="fi" id="fi_edt" required>
                <hr>   

                <label>NOMBRE</label>   
                <input type="text" name="nombre" id="nombre_edt" required>
                <hr>

                <label>TIPO</label>
                <select name="tipo" id="tipo_edt" class="form-control">
                    <option value="" selected>SELECCIONAR TIPO</option>
                    <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                    <option value="OPERADOR">OPERADOR</option>
                </select>
                <hr>

                <label>CLASE</label>
                <select name="clase" id="clase_edt" class="form-control" required>
                    <option value="" selected>SELECCIONAR CLASE</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="NINGUNA">NINGUNA</option>           
                </select>
                <hr>

                <label>PUESTO</label>
                <input type="text" name="puesto" id="puesto_edt"  required>
                <hr>

                <label>CALLE</label>
                <input type="text" name="calle" id="calle_edt"  required>
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

                <label>TELEFONO</label>
                <input type="text" name="telefono" id="telefono_edt" onkeypress='return validaNumericos(event)' required>
                <hr>

                <label>CELULAR</label>
                <input type="text" name="celular" id="celular_edt" onkeypress='return validaNumericos(event)' required>
                <hr>
                
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btn_update" class="btn btn-primary btnupdate">Guardar</button>
                    </div>
                </div>
            </div>
                </form>
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
        $('#submit').submit(function(e) {
            e.preventDefault();

                var fi = $("#fi").val();
                var nombre = $("#nombre").val().toUpperCase();
                var tipo = $("#tipo").val();
                var clase = $("#clase").val();
                var puesto = $("#puesto").val().toUpperCase();
                var calle = $("#calle").val().toUpperCase();
                var noext = $("#noext").val();
                var noint = $("#noint").val();
                var colonia = $("#colonia").val().toUpperCase();
                var cp = $("#cp").val();
                var municipio = $("#municipio").val().toUpperCase();
                var estado = $("#estado").val().toUpperCase();
                var telefono = $("#telefono").val();
                var celular = $("#celular").val();

                if (fi == "" || nombre == "" || tipo == "" || clase == "" ||
                    puesto == "" || calle == "" || noext == "" || noint == "" || colonia == ""
                    || cp == "" || municipio == "" || estado == "" || telefono == "" || celular == "") {
                    swal({
                        title: "Aviso",
                        text: "Favor de no dejar campos vacios",
                        icon: "info",
                    })
                    $('#modal_cuenta').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    $("#main").load('<?php echo base_url(); ?>FunctionsController/empleados');
                } else {
                    
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url(); ?>FunctionsController/insert_empleado",
                                data: new FormData(this),
                                processData: false,
                                cache: false, 
                                contentType: false,
                                success: function(data) {
                                    swal({
                                        title: "Empleado Guardado Exitosamente",
                                        text: nombre,
                                        icon: "success",
                                    });
                                    $('#modal_cuenta').modal('hide');
                                    $('body').removeClass('modal-open');
                                    $('.modal-backdrop').remove();
                                    $("#main").load(
                                        '<?php echo base_url(); ?>FunctionsController/empleados');
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
                        url: "<?php echo base_url(); ?>FunctionsController/delete_empleado",
                        data: {
                            id: id
                        }
                    }).done(function() {
                        swal({
                            title: "Eliminado",
                            text: "Empleado eliminado exitosamente",
                            icon: "success",
                        }).then(function() {
                            $("#main").load(
                                '<?php echo base_url(); ?>FunctionsController/empleados'
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
                    url: "<?php echo base_url(); ?>FunctionsController/empleado",
                    data: {
                        id: id
                    },
                    success: function(result) {
                        var result = JSON.parse(result);
                        $.each(result, function(i, result) {
                            $("#id_edt").val(result.ID);
                            // $("#foto_edt").val(result.FOTO);
                            $("#fi_edt").val(result.FI);
                            $("#nombre_edt").val(result.NOMBRE);
                            $("#tipo_edt").val(result.TIPO);
                            $("#clase_edt").val(result.CLASE);
                            $("#puesto_edt").val(result.PUESTO);
                            $("#calle_edt").val(result.CALLE);
                            $("#noext_edt").val(result.NOEXT);
                            $("#noint_edt").val(result.NOINT);
                            $("#colonia_edt").val(result.COLONIA);
                            $("#cp_edt").val(result.CP);
                            $("#municipio_edt").val(result.MUNICIPIO);
                            $("#estado_edt").val(result.ESTADO);
                            $("#telefono_edt").val(result.TELEFONO);
                            $("#celular_edt").val(result.CELULAR);
                        });
                    },
                });
            }
        });
    });

    //UPDATE//
    $(document).ready(function() {
        $("#update").submit(function(e) {
            e.preventDefault();

                var id = $("#id_edt").val();
                var fi = $("#fi_edt").val();
                var nombre = $("#nombre_edt").val().toUpperCase();
                var tipo = $("#tipo_edt").val();
                var clase = $("#clase_edt").val();
                var puesto = $("#puesto_edt").val().toUpperCase();
                var calle = $("#calle_edt").val().toUpperCase();
                var noext = $("#noext_edt").val();
                var noint = $("#noint_edt").val();
                var colonia = $("#colonia_edt").val().toUpperCase();
                var cp = $("#cp_edt").val();
                var municipio = $("#municipio_edt").val().toUpperCase();
                var estado = $("#estado_edt").val().toUpperCase();
                var telefono = $("#telefono_edt").val();
                var celular = $("#celular_edt").val();

                if (id == "" || fi == "" || nombre == "" || tipo == "" || clase == "" ||
                    puesto == "" || calle == "" || noext == "" || noint == "" || colonia == ""
                    || cp == "" || municipio == "" || estado == "" || telefono == "" || celular == "") {
                    swal({
                        title: "Aviso",
                        text: "Favor de no dejar campos vacios",
                        icon: "info",
                    })
                    $('#modal_cuenta').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    $("#main").load('<?php echo base_url(); ?>FunctionsController/empleados');
                } else {
                    
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url(); ?>FunctionsController/update_empleado",
                                data: new FormData(this),
                                processData: false,
                                cache: false, 
                                contentType: false,
                                success: function(data) {
                                    swal({
                                        title: "Empleado Actualizado Exitosamente",
                                        text: nombre,
                                        icon: "success",
                                    });
                                    $('#modal_cuenta').modal('hide');
                                    $('body').removeClass('modal-open');
                                    $('.modal-backdrop').remove();
                                    $("#main").load(
                                        '<?php echo base_url(); ?>FunctionsController/empleados');
                                },
                            })
                    
                    }
        });
    });

$(document).ready(function() {
  $('.image-link').magnificPopup({type:'image'});
});

$('.tr').magnificPopup({
    delegate:'a',
  type: 'image'
  // other options
});
</script>


</html>