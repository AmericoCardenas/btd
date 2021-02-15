<html>

<h1>FLUJOS</h1>

<div class="row">
    <div class="col-md-12" style="text-align:right !important;">

   
            <button title="Agregar" type="button" class="btn btnadd" id="btn-add" data-bs-toggle="modal"
                data-bs-target="#modal_agregar"><i class="fas fa-plus-circle"></i></button>

            <button title="Saldo Actual"
                id="btn-saldo" class="btn btn-warning" style="background-color: #FFCA2C !important;"><i class="fas fa-dollar-sign"></i></button>
        
            <a href="<?php echo base_url();?>FunctionsController/exportar_flujos"><button title="Exportar Excel"
                id="btn-excel" class="btn btn-success"><i class="fas fa-file-excel"></i></button></a>
   
   
    </div>

    <?php foreach ($user as $row => $value) { ?>

    <?php $area = $value['AREA']; ?>
    <input type="text" hidden value="<?php echo $value['ID'];?>" id="id_user" name="id_user"> 

    <div style="margin-top:10px !important;">
        <table class="table table-sm table-hover" id="table_id" style="text-align:center !important;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th><div style="width:100px !important;">FECHA</div></th>
                    <th>TIPO</th>
                    <th>METODO</th>
                    <th>EMPLEADO</th>
                    <th>AREA</th>
                    <th>CONCEPTO</th>
                    <th>CANTIDAD</th>
                    <th>COMPROBANTE</th>
                    <?php if($area == "SISTEMAS" || $area == "GERENCIA"){ ?>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tb as $row => $value) { ?>

                <tr class="tr <?php echo $value['TIPO'];?>">
                    <td><?php echo $value['ID']; ?></td>
                    <td><?php echo date('d-m-Y',strtotime($value['FECHA']));?></td>
                    <td><?php echo $value['TIPO']; ?></td>
                    <td><?php echo $value['METODO']; ?></td>
                    <td><?php echo $value['EMPLEADO']; ?></td>
                    <td><?php echo $value['AREA']; ?></td>
                    <td><?php echo $value['CONCEPTO']; ?></td>
                    <td><?php echo $value['CANTIDAD']; ?></td>
                    <td><a href="<?php echo base_url();?>uploads/<?php echo $value['COMPROBANTE'];?>"><img src="<?php echo base_url();?>application/assets/img/documento.png" height="40px !important" width="40px !important" id="img" class="img"></a></td>
                    

                    <?php if($area == "SISTEMAS" || $area == "GERENCIA"){ ?>

                    <td><button title="Editar" type="button" class="btn btnedit" id="btn-edit" data-bs-toggle="modal"
                            data-bs-target="#modal_editar" value="<?php echo $value['ID']; ?>"><i
                                class="fas fa-edit"></i></button></td>

                    <td><button title="Eliminar" type="button" class="btn btndelete" id="btn-delete"
                            value="<?php echo $value['ID']; ?>"><i class="fas fa-trash-alt"></i></button></td>

                    <?php } ?>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
    <?php }?>
</div>


<!-- Modal Agregar -->
<div class="modal" id="modal_agregar" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="text-align:center !important">Agregar Flujo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

        
            <form enctype="multipart/form-data" method="POST" id="submit">  
            <div class="modal-body">
                       
                <label>FECHA</label>   
                <input type="date" class="form-control" name="fecha" id="fecha" required>
                <hr>   

                <label>TIPO</label>
                <select name="tipo" id="tipo" class="form-control">
                    <option value="" selected>SELECCIONAR TIPO</option>
                    <option value="INGRESO">INGRESO</option>
                    <option value="EGRESO">EGRESO</option>
                </select>
                <hr>

                <label>METODO</label>
                <select name="metodo" id="metodo" class="form-control">
                    <option value="EFECTIVO" selected>EFECTIVO</option>         
                </select>
                <hr>

                <label>EMPLEADO</label>
                <select name="empleado" id="empleado" class="form-control">
                    <option value="" selected>SELECCIONAR EMPLEADO</option>
                    <?php foreach ($empleados as $row => $value){ ?>
                    <option value="<?php echo $value['NOMBRE'];?>"><?php echo $value['NOMBRE'];?></option>
                    <?php }?>       
                </select>
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
                <option value="VIGILANCIA">VIGILANCIA</option>
                </select>
                <hr>

                <label>CONCEPTO</label>   
                <input type="text" class="form-control" name="concepto" id="concepto" onkeypress="return soloLetras(event)" required>
                <hr> 

                <label>CANTIDAD</label>   
                <input type="number" class="form-control" name="cantidad" id="cantidad" onkeypress='return validaNumericos(event)' required>
                <hr> 

                <label>COMPROBANTE</label>   
                <input type="file" name="comprobante" id="comprobante" class="form-control">
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
                 
                <label>FECHA</label>   
                <input type="date" class="form-control" name="fecha" id="fecha_edt" required>
                <hr>   

                <label>TIPO</label>
                <select name="tipo" id="tipo_edt" class="form-control">
                    <option value="" selected>SELECCIONAR TIPO</option>
                    <option value="INGRESO">INGRESO</option>
                    <option value="EGRESO">EGRESO</option>
                </select>
                <hr>

                <label>METODO</label>
                <select name="metodo" id="metodo_edt" class="form-control">
                    <option value="EFECTIVO" selected>EFECTIVO</option>         
                </select>
                <hr>

                <label>EMPLEADO</label>
                <select name="empleado" id="empleado_edt" class="form-control">
                    <option value="" selected>SELECCIONAR EMPLEADO</option>
                    <?php foreach ($empleados as $row => $value){ ?>
                    <option value="<?php echo $value['NOMBRE'];?>"><?php echo $value['NOMBRE'];?></option>
                    <?php }?>       
                </select>
                <hr>

                <label>AREA</label>
                <select name="area" id="area_edt" class="form-control" required>
                <option value="" selected>SELECCIONAR AREA</option>
                <option value="SISTEMAS">SISTEMAS</option>
                <option value="CONTABILIDAD">CONTABILIDAD</option>
                <option value="RECURSOS HUMANOS">RECURSOS HUMANOS</option>
                <option value="ALMACEN">ALMACEN</option>
                <option value="LOGISTICA">LOGISTICA</option>
                <option value="TALLER">TALLER</option>
                <option value="DIESEL">DIESEL</option>
                <option value="GERENCIA">GERENCIA</option>
                <option value="VIGILANCIA">VIGILANCIA</option>
                </select>
                <hr>

                <label>CONCEPTO</label>   
                <input type="text" class="form-control" name="concepto" id="concepto_edt" onkeypress="return soloLetras(event)" required>
                <hr> 

                <label>CANTIDAD</label>   
                <input type="number" class="form-control" name="cantidad" id="cantidad_edt" onkeypress='return validaNumericos(event)' required>
                <hr> 

                <label>COMPROBANTE</label>   
                <input type="file" name="comprobante" id="comprobante_edt" class="form-control">
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
    $('#table_id').DataTable( {
        "scrollY": 340,
        "scrollX": true,
        paging:false,
        scrollCollapse: true,
        fixedColumns:   {
            leftColumns: 2
        }
    } );
} );

    //AÑADIR//
    $(document).ready(function() {
        $('#submit').submit(function(e) {
            e.preventDefault();

                var id_user = $("#id_user").val();
                var fecha = $("#fecha").val();
                var tipo = $("#tipo").val().toUpperCase();
                var metodo = $("#metodo").val().toUpperCase();
                var empleado = $("#empleado").val().toUpperCase();
                var area = $("#area").val().toUpperCase();
                var concepto = $("#concepto").val().toUpperCase();
                var cantidad = $("#cantidad").val();

                if (fecha == "" || tipo == "" || metodo == "" || empleado == "" ||
                    area == "" || concepto == "" || cantidad == "") {
                    swal({
                        title: "Aviso",
                        text: "Favor de no dejar campos vacios",
                        icon: "info",
                    })
                    $('#modal_cuenta').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    $("#main").load('<?php echo base_url(); ?>FunctionsController/flujos',{id_user:id_user});
                } else {
                    // var id_user = $("#id_user").val();
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url(); ?>FunctionsController/insert_flujo",
                                data: new FormData(this),
                                processData: false,
                                cache: false, 
                                contentType: false,
                                success: function(data) {
                                    swal({
                                        title: "Flujo Guardado Exitosamente",
                                        text: metodo,
                                        icon: "success",
                                    });
                                    $('#modal_cuenta').modal('hide');
                                    $('body').removeClass('modal-open');
                                    $('.modal-backdrop').remove();
                                    $("#main").load(
                                        '<?php echo base_url(); ?>FunctionsController/flujos',{id_user:id_user});
                                },
                            })
                    
                    } 
            });
    });

    //ELIMINAR//
    $(document).ready(function() {
        $(document).on("click",".btndelete", function() {
            var id = $(this).val();
            var id_user = $("#id_user").val();
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
                        url: "<?php echo base_url(); ?>FunctionsController/delete_flujo",
                        data: {
                            id: id
                        }
                    }).done(function() {
                        swal({
                            title: "Eliminado",
                            text: "Flujo eliminado exitosamente",
                            icon: "success",
                        }).then(function() {
                            $("#main").load(
                                '<?php echo base_url(); ?>FunctionsController/flujos',{id_user:id_user}
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
        $(document).on("click",".btnedit",function(event) {
            var id = $(this).val();
            if (id != "") {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>FunctionsController/flujo",
                    data: {
                        id: id
                    },
                    success: function(result) {
                        var result = JSON.parse(result);
                        $.each(result, function(i, result) {
                            $("#id_edt").val(result.ID);
                            $("#fecha_edt").val(result.FECHA);
                            $("#tipo_edt").val(result.TIPO);
                            $("#metodo_edt").val(result.METODO);
                            $("#empleado_edt").val(result.EMPLEADO);
                            $("#area_edt").val(result.AREA);
                            $("#concepto_edt").val(result.CONCEPTO);
                            $("#cantidad_edt").val(result.CANTIDAD);
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

                var id_user = $("#id_user").val();
                var id = $("#id_edt").val();
                var fecha = $("#fecha_edt").val();
                var tipo = $("#tipo_edt").val().toUpperCase();
                var metodo = $("#metodo_edt").val().toUpperCase();
                var empleado = $("#empleado_edt").val().toUpperCase();
                var area = $("#area_edt").val().toUpperCase();
                var concepto = $("#concepto_edt").val().toUpperCase();
                var cantidad = $("#cantidad_edt").val();

                if (fecha == "" || tipo == "" || metodo == "" || empleado == "" ||
                    area == "" || concepto == "" || cantidad == "") {
                    swal({
                        title: "Aviso",
                        text: "Favor de no dejar campos vacios",
                        icon: "info",
                    })
                    $('#modal_cuenta').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    $("#main").load('<?php echo base_url(); ?>FunctionsController/flujos',{id_user:id_user});
                } else {
                    
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url(); ?>FunctionsController/update_flujo",
                                data: new FormData(this),
                                processData: false,
                                cache: false, 
                                contentType: false,
                                success: function(data) {
                                    swal({
                                        title: "Movimiento Actualizado Exitosamente",
                                        text: tipo,
                                        icon: "success",
                                    });
                                    $('#modal_cuenta').modal('hide');
                                    $('body').removeClass('modal-open');
                                    $('.modal-backdrop').remove();
                                    $("#main").load(
                                        '<?php echo base_url(); ?>FunctionsController/flujos',{id_user:id_user});
                                },
                            })
                    
                    }
        });
    });

    //MAGNIFIC POP UP//
    $(document).ready(function() {
        $('.image-link').magnificPopup({type:'image'});
    });

    $('.tr').magnificPopup({
        delegate:'a',
        type: 'image'
        // other options
    });

    $('.tr').magnificPopup({
        delegate:'a',
        type: 'iframe'
        // other options
    });

    //SALDO ACTUAL//
    $(document).ready(function() {
        $('#btn-saldo').click(function(event) {             
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url(); ?>FunctionsController/saldo_actual",
                                success: function(result) {
                                    
                                    swal({
                                        text:"Saldo Actual",
                                        title: result +"$",
                                        icon: "success",
                                    });
                                },
                            })      
            });
    });

</script>


</html>