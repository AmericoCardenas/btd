<html>

<h1>Requisiciones</h1>

<div class="row">
    <div class="col-md-12" style="text-align:right !important;">

        
            <button title="Agregar" type="button" class="btn btnadd" id="btn-add" data-bs-toggle="modal"
                data-bs-target="#modal_agregar"><i class="fas fa-plus-circle"></i></button>

            <a href="<?php echo base_url();?>FunctionsController/exportar_requisiones"> <button title="Exportar Excel"
                id="btn-excel" class="btn btn-success"><i class="fas fa-file-excel"></i></button></a>

            <button title="Orden Compra" type="button" class="btn btnorden" id="btn-orden" style="background-color:#27bddb !important;"><i
                                class="fas fa-file-signature"></i></button>
        
    </div>

        <?php foreach ($user as $row => $value) { ?>
        <?php $area = $value['AREA']; ?>
        <input type="text" hidden value="<?php echo $value['ID'];?>" id="id_user" name="id_user"> 
        
        <div style="margin-top:10px !important;">
        <table class="table table-sm table-hover" id="table_id" style="text-align:center !important;" width="100% !important">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FECHA</th>
                    <th>UNIDAD</th>
                    <th>SOLICITANTE</th>
                    <th>CANTIDAD</th>
                    <th title="Unidad de Medida">U.MED</th>
                    <th>DESCRIPCION</th>
                    <th>AREA</th>
                    <!-- <th title="Orden de Compra">O.COMPRA</th> -->
                    <th title="Estatus">ESTATUS</th>
                    <th>CHECK</th>
                    <th>#ORDEN</th>
                    <th>Editar</th>
                    <?php if($area == "SISTEMAS" || $area == "GERENCIA"){ ?>
                    <th>Eliminar</th>
                    <?php }?>
                </tr>
            </thead>
            <tbody id="req">
                <?php foreach ($tb as $row => $value) {?> 
                
                <?php $estatus = $value['ESTATUS'];
                $orden = $value['ORDEN'];?>
                
                <tr class="">
                    <td><?php echo $value['ID']; ?></td>
                    <td><?php echo date('d/m/Y',strtotime($value['FECHA'])); ?></td>
                    <td><?php echo $value['UNIDAD']; ?></td>
                    <td><?php echo $value['SOLICITANTE']; ?></td>
                    <td><?php echo $value['CANTIDAD']; ?></td>
                    <td><?php echo $value['UMED']; ?></td>
                    <td><?php echo $value['DESCRIPCION']; ?></td>
                    <td><?php echo $value['AREA']; ?></td>
                    <td><?php echo $value['ESTATUS']; ?></td>

                    <?php if($estatus == "ACEPTADA" && $orden == 0){?>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input req_id" type="checkbox" value="<?php echo $value['ID'];?>" id="flexCheckDefault req_id">
                            </div>
                        </td>
                    <?php }else{ ?>
                    <td></td>
                    <?php } ?>

                    <td><?php echo $value['ORDEN']; ?></td>

                    <td><button title="Editar" type="button" class="btn btnedit" id="btn-edit" data-bs-toggle="modal"
                            data-bs-target="#modal_editar" value="<?php echo $value['ID']; ?>"><i
                                class="fas fa-edit"></i></button></td>

                    <?php if($area == "SISTEMAS" || $area == "GERENCIA"){ ?>
                    <td><button title="Eliminar" type="button" class="btn btndelete" id="btn-delete"
                            value="<?php echo $value['ID']; ?>"><i class="fas fa-trash-alt"></i></button></td>
                    <?php }?>
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
                <h5 class="modal-title" style="text-align:center !important">Agregar Requisición</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <label>FECHA</label>
                <input type="date" name="fecha" id="fecha" class="form-control" required>
                <hr>

                <label>UNIDAD</label>
                <select name="unidad" id="unidad" class="form-control" required>
                    <option value="" selected>SELECCIONAR UNIDAD:</option>   
                    <?php foreach ($unidades as $row => $value) { ?>
                        <option value="<?php echo $value['ECONOMICO']; ?>"><?php echo $value['ECONOMICO']; ?></option> 
                    <?php }?>
                    <option value="OTROS">OTROS</option>
                </select>
                <hr>

                <label>SOLICITANTE</label>
                <select name="solicitante" id="solicitante" class="form-control" required>
                    <option value="" selected>SELECCIONAR EMPLEADO:</option>   
                    <?php foreach ($empleados as $row => $value) { ?>
                        <option value="<?php echo $value['NOMBRE']; ?>"><?php echo $value['NOMBRE']; ?></option> 
                    <?php }?>
                </select>
                <hr>

                <label>CANTIDAD</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" onkeypress='return validaNumericos(event)' required>
                <hr>

                <label>UNIDAD DE MEDIDA</label>
                <select name="umed" id="umed" class="form-control" required>
                    <option value="" selected>SELECCIONAR UMED:</option>   
                    <option value="LTS">LITROS</option> 
                    <option value="KGS">KILOGRAMOS</option> 
                    <option value="MTS">METROS</option>       
                    <option value="PZA">PIEZA</option>   
                </select>
                <hr>


                <label>DESCRIPCIÓN</label>
                <input type="text" name="descripcion" id="descripcion" required>
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
                <option value="GESTORIA">GESTORIA</option>
                <option value="COMERCIAL">COMERCIAL</option>
                </select>
                <hr> 

                <label>ESTATUS</label>
                <select name="estatus" id="estatus" class="form-control" required>
                <option value="PENDIENTE" selected>PENDIENTE</option>
                <?php foreach ($user as $row => $value) { ?>
                <?php $area = $value['AREA']; ?>
                    <?php if($area == "SISTEMAS" || $area == "GERENCIA"){ ?>
                        <option value="ACEPTADA">ACEPTADA</option>
                        <option value="RECHAZADA">RECHAZADA</option>
                    <?php }?>
                <?php }?>
                </select>
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
        </div>
    </div>
</div>


<!-- MODAL EDITAR -->
<div class="modal" id="modal_editar" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="text-align:center !important">Editar Requisición</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
       
            <div class="modal-body">

                <input type="text" name="id" id="id_edt" hidden>

                <label>FECHA</label>
                <input type="date" name="fecha" id="fecha_edt" class="form-control" required>
                <hr>

                <label>UNIDAD</label>
                <select name="unidad" id="unidad_edt" class="form-control" required>
                    <option value="" selected>SELECCIONAR UNIDAD:</option>   
                    <?php foreach ($unidades as $row => $value) { ?>
                        <option value="<?php echo $value['ECONOMICO']; ?>"><?php echo $value['ECONOMICO']; ?></option> 
                    <?php }?>
                    <option value="OTROS">OTROS</option>
                </select>
                <hr>

                <label>SOLICITANTE</label>
                <select name="solicitante" id="solicitante_edt" class="form-control" required>
                    <option value="" selected>SELECCIONAR EMPLEADO:</option>   
                    <?php foreach ($empleados as $row => $value) { ?>
                        <option value="<?php echo $value['NOMBRE']; ?>"><?php echo $value['NOMBRE']; ?></option> 
                    <?php }?>
                </select>
                <hr>

                <label>CANTIDAD</label>
                <input type="number" name="cantidad" id="cantidad_edt" class="form-control" onkeypress='return validaNumericos(event)' required>
                <hr>

                <label>UNIDAD DE MEDIDA</label>
                <select name="umed" id="umed_edt" class="form-control" required>
                    <option value="" selected>SELECCIONAR UMED:</option>   
                    <option value="LTS">LITROS</option> 
                    <option value="KGS">KILOGRAMOS</option> 
                    <option value="MTS">METROS</option>       
                    <option value="PZA">PIEZA</option>   
                </select>
                <hr>


                <label>DESCRIPCIÓN</label>
                <input type="text" name="descripcion" id="descripcion_edt" required>
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
                <option value="ADMIN">ADMIN</option>
                <option value="GESTORIA">GESTORIA</option>
                <option value="COMERCIAL">COMERCIAL</option>
                </select>
                <hr> 

                <label>ESTATUS</label>
                <select name="estatus" id="estatus_edt" class="form-control" required>
                <option value="PENDIENTE" selected>PENDIENTE</option>
                <?php foreach ($user as $row => $value) { ?>
                <?php $area = $value['AREA']; ?>
                    <?php if($area == "SISTEMAS" || $area == "GERENCIA"){ ?>
                        <option value="ACEPTADA">ACEPTADA</option>
                        <option value="RECHAZADA">RECHAZADA</option>
                    <?php }?>
                <?php }?>
                </select>
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
   
        </div>
    </div>
</div>


<script>

    $(document).ready(function() {
        $('#table_id').DataTable( {
            "scrollY": 340,
            "scrollX": true,
            paging:false,
            scrollCollapse: true,
            fixedColumns:   {
                leftColumns: 3
            }
        } );
    } );

    // //MAGNIFIC POP UP//
    // $(document).ready(function() {
    //     $('.image-link').magnificPopup({type:'image'});
    // });

    // $('.tr').magnificPopup({
    //     delegate:'a',
    //     type: 'image'
    //     // other options
    // });

    // $('.tr').magnificPopup({
    //     delegate:'a',
    //     type: 'iframe'
    //     // other options
    // });

    //AÑADIR//
    $(document).ready(function() {
        $(document).on('click','#btn_guardar',function(e) {
            e.preventDefault();
            var id_user = $("#id_user").val();
            var fecha = $("#fecha").val();
            var unidad = $("#unidad").val().toUpperCase();
            var solicitante = $("#solicitante").val().toUpperCase();
            var cantidad = $("#cantidad").val();
            var umed = $("#umed").val().toUpperCase();
            var descripcion = $("#descripcion").val().toUpperCase();
            var area = $("#area").val().toUpperCase();
            var estatus = $("#estatus").val().toUpperCase();
            var orden = 0;

            if (fecha == "" || unidad == "" || solicitante == "" || cantidad == "" || umed == "" || descripcion == "" || area == "" || estatus == "") {
                swal({
                    title: "Aviso",
                    text: "Favor de no dejar campos vacios",
                    icon: "info",
                })
                $('#modal_cuenta').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                $("#main").load('<?php echo base_url(); ?>FunctionsController/requisiciones',{id_user:id_user});
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>FunctionsController/insert_requisicion",
                    data: {fecha:fecha,
                           unidad:unidad,
                           solicitante:solicitante,
                           cantidad:cantidad,
                           umed:umed,
                           descripcion:descripcion,
                           area:area,
                           estatus:estatus,
                           orden:orden },
                    success: function(data) {
                        swal({
                            title: "Requisición Guardada Exitosamente",
                            text: solicitante +" "+ cantidad +" "+ umed +" "+ descripcion,
                            icon: "success",
                        });
                        $('#modal_cuenta').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        $("#main").load(
                            '<?php echo base_url(); ?>FunctionsController/requisiciones',{id_user:id_user});
                    },
                })
            }
        });
    });


    //ELIMINAR//
    $(document).ready(function() {
        $(document).on("click",".btndelete", function(event) {
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
                        url: "<?php echo base_url(); ?>FunctionsController/delete_requisicion",
                        data: {
                            id: id
                        }
                    }).done(function() {
                        swal({
                            title: "Eliminado",
                            text: "Requisicion eliminada exitosamente",
                            icon: "success",
                        }).then(function() {
                            $("#main").load('<?php echo base_url(); ?>FunctionsController/requisiciones',{id_user:id_user});

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
                    url: "<?php echo base_url(); ?>FunctionsController/requisicion",
                    data: {
                        id: id
                    },
                    success: function(result) {
                        var result = JSON.parse(result);
                        $.each(result, function(i, result) {
                            $("#id_edt").val(result.ID);
                            $("#fecha_edt").val(result.FECHA);
                            $("#unidad_edt").val(result.UNIDAD);
                            $("#solicitante_edt").val(result.SOLICITANTE);
                            $("#cantidad_edt").val(result.CANTIDAD);
                            $("#umed_edt").val(result.UMED);
                            $("#descripcion_edt").val(result.DESCRIPCION);
                            $("#area_edt").val(result.AREA);
                            $("#estatus_edt").val(result.ESTATUS);
                        });
                    },
                });
            }
        });
    });

    //UPDATE//
    $(document).ready(function() {
        $(document).on('click','#btn_update',function(e) {
        e.preventDefault();
                //VARIABLES//
                var id_user = $("#id_user").val();
                var id = $("#id_edt").val();
                var fecha = $("#fecha_edt").val().toUpperCase();
                var unidad = $("#unidad_edt").val().toUpperCase();
                var solicitante = $("#solicitante_edt").val();
                var cantidad = $("#cantidad_edt").val();
                var umed = $("#umed_edt").val().toUpperCase();
                var descripcion = $("#descripcion_edt").val().toUpperCase();
                var area = $("#area_edt").val().toUpperCase();   
                var estatus = $("#estatus_edt").val().toUpperCase();     

                //COMPROBAR//
                if (fecha != "" || unidad != "" || solicitante != "" || cantidad != "" || umed != "" || descripcion != "" || area != "" || estatus != "") {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>FunctionsController/update_requisicion",
                        data: {
                            id:id,
                            fecha:fecha,
                            unidad:unidad,
                            solicitante:solicitante,
                            cantidad:cantidad,
                            umed:umed,
                            descripcion:descripcion,
                            area:area,
                            estatus:estatus },
                            success: function(result) {
                            swal({
                        title: "Actualizado",
                        text: "Requisicion actualizada exitosamente",
                        icon: "success",
                    }).then(function() {
                        $('#modal_cuenta').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        $("#main").load('<?php echo base_url(); ?>FunctionsController/requisiciones',{id_user:id_user});

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
                    $("#main").load('<?php echo base_url(); ?>FunctionsController/requisiciones',{id_user:id_user});  
                    }
        });
    });

//https://stackoverflow.com/questions/61526076/how-to-get-checked-checkbox-table-row-value-in-codeigniter
    $(document).ready(function() {
        $(document).on('click','.btnorden',function(e) {
            

            $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>FunctionsController/create_orden",
                    success: function(result) {

                        var rows = $('#req tr');
        
                        rows.each(function(){
                        
                        if($(this).find('.req_id').is(':checked')){
                            
                            var req_id = $(this).find('.req_id').val();
                            var id_user = $("#id_user").val();
                            // var bonus         = $(this).find('#bonus').val();

                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url();?>FunctionsController/to_orden",
                                    data: {req_id:req_id},
                                success: function(result) {
                                    $("#main").load('<?php echo base_url(); ?>FunctionsController/requisiciones',{id_user:id_user});
                                }
                            }); 
                    }
                });
              }
            });
        });
    });



</script>

</html>