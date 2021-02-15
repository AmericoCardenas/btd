<html>

<h1>Unidades</h1>

<div class="row">
    <div class="col-md-12" style="text-align:right !important;">

        <form method="post">
            <button title="Agregar" type="button" class="btn btnadd" id="btn-add" data-bs-toggle="modal"
                data-bs-target="#modal_agregar"><i class="fas fa-plus-circle"></i></button>

            <button title="Exportar Excel" formaction="<?php echo base_url();?>FunctionsController/exportar_unidades"
                id="btn-excel" class="btn btn-success"><i class="fas fa-file-excel"></i></button>
        </form>
    </div>

        <?php foreach ($user as $row => $value) { ?>
        <?php $area = $value['AREA']; ?>
        <input type="text" hidden value="<?php echo $value['ID'];?>" id="id_user" name="id_user"> 

        <table class="table table-sm table-hover" id="table_id" style="text-align:center !important;" width="100% !important">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ECONOMICO</th>
                    <th>MODELO</th>
                    <th>AÑO</th>
                    <th>#TIPO</th>
                    <th>#SERIE</th>
                    <th>#PLACA</th>
                    <th>#PLACA FISICA</th>
                    <th title="Tarjeta de Circulación">T.C.</th>
                    <th>FACTURA</th>
                    <th title="Poliza de Seguro">P.S.</th>
                    <th>COMBUSTIBLE</th>
                    <th>C.TANQUE</th>
                    <th title="Rendimiento Esperado">R.E</th>
                    <th>#GPS</th>
                    <th>ESTATUS</th>
                    <th>FECHA</th>
                    <th title="Tiempo Transcurrido">T.T</th>
                    <th>Editar</th>
                    <?php if($area == "SISTEMAS" || $area == "GERENCIA"){ ?>
                    <th>Eliminar</th>
                    <?php }?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tb as $row => $value) { ?>
                <?php date_default_timezone_set('America/Monterrey');
                $hoy=date("d-m-Y");
                $fecha = $value['FECHA'];
                $f = date('d-m-Y',strtotime($fecha));
                $fecha_ini = new DateTime($fecha);
                $fecha_fin = new DateTime($hoy);    
                $diff = $fecha_ini->diff($fecha_fin);

                $tc = $value['TC'];
                $factura = $value['FACTURA'];
                $ps = $value['PS'];
                ?>



                <tr class="tr <?php echo $value['ESTATUS'];?>">
                    <td><?php echo $value['ID']; ?></td>
                    <td><?php echo $value['ECONOMICO']; ?></td>
                    <td><?php echo $value['MODELO']; ?></td>
                    <td><?php echo $value['YEAR']; ?></td>
                    <td><?php echo $value['TIPO']; ?></td>
                    <td><?php echo $value['SERIE']; ?></td>
                    <td><?php echo $value['PLACA']; ?></td>
                    <td><?php echo $value['PF']; ?></td>
                    <td><a href="<?php echo base_url();?>uploads/<?php if($tc!=""){echo $tc;}else{echo 'default.jpg';}?>"><img src="<?php echo base_url();?>application/assets/img/documento.png" height="40px !important" width="40px !important" id="img" class="img"></a></td>
                    <td><a href="<?php echo base_url();?>uploads/<?php if($factura!=""){echo $factura;}else{echo 'default.jpg';}?>"><img src="<?php echo base_url();?>application/assets/img/documento.png" height="40px !important" width="40px !important" id="img" class="img"></a></td>
                    <td><a href="<?php echo base_url();?>uploads/<?php if($ps!=""){echo $ps;}else{echo 'default.jpg';}?>"><img src="<?php echo base_url();?>application/assets/img/documento.png" height="40px !important" width="40px !important" id="img" class="img"></a></td>
                    <td><?php echo $value['COMBUSTIBLE']; ?></td>
                    <td><?php echo $value['CTANQUE'].' LTS'; ?></td>
                    <td><?php echo $value['RE']; ?></td>
                    <td><?php echo $value['GPS']; ?></td>
                    <td><?php echo $value['ESTATUS']; ?></td>
                    <td><?php echo $f ?></td>
                    <td><?php echo $diff->days .' DIAS'; ?></td>

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
    <?php }?>
</div>           


<!-- Modal Agregar -->
<div class="modal" id="modal_agregar" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="text-align:center !important">Agregar Unidad</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form enctype="multipart/form-data" method="POST" id="submit">
            <div class="modal-body">

                <label>ECONOMICO</label>
                <input type="text" name="economico" id="economico" required>
                <hr>

                <label>MODELO</label>
                <input type="text" name="modelo" id="modelo" required>
                <hr>

                <label>AÑO</label>
                <input type="text" name="year" id="year" required onkeypress='return validaNumericos(event)'>
                <hr>

                <label>TIPO</label>
                <select name="tipo" id="tipo" class="form-control" required>
                <option value="" selected>SELECCIONAR TIPO</option>
                <option value="CAMION">CAMION</option>
                <option value="CAMIONETA">CAMIONETA</option>
                <option value="AUTOMOVIL">AUTOMOVIL</option>
                </select>
                <hr>

                <label>SERIE</label>
                <input type="text" name="serie" id="serie" required>
                <hr>

                <label>PLACA</label>
                <input type="text" name="placa" id="placa" required>
                <hr>

                <label>PLACA FISICA</label>
                <input type="text" name="pf" id="pf" required>
                <hr> 

                <label>TARJETA DE CIRCULACION</label>
                <input type="file" name="tc" id="tc" class="form-control">
                <hr>

                <label>FACTURA</label>
                <input type="file" name="factura" id="factura" class="form-control">
                <hr> 

                <label>POLIZA DE SEGURO</label>
                <input type="file" name="ps" id="ps" class="form-control">
                <hr>           

                <label>COMBUSTIBLE</label>
                <select name="combustible" id="combustible" class="form-control" required>
                <option value="" selected>SELECCIONAR COMBUSTIBLE</option>
                <option value="GASOLINA">GASOLINA</option>
                <option value="DIESEL">DIESEL</option>
                <option value="GAS">GAS</option>
                <option value="GAS/DIESEL">GAS/DIESEL</option>
                <option value="GAS/GASOLINA">GAS/GASOLINA</option>
                </select>
                <hr>

                <label>CAPACIDAD TANQUE</label>
                <input type="number" name="ctanque" id="ctanque" onkeypress='return validaNumericos(event)' required>
                <hr>

                <label>RENDIMIENTO</label>
                <input type="number" step="any" name="re" id="re" required>
                <hr>

                <label>#GPS</label>
                <input type="text" name="gps" id="gps" required>
                <hr>

                <label>ESTATUS</label>
                <select name="estatus" id="estatus" class="form-control" required>
                <option value="" selected>SELECCIONAR ESTATUS</option>
                <option value="ACTIVO">ACTIVO</option>
                <option value="CORRALON">CORRALON</option>
                <option value="TALLER">TALLER</option>
                </select>
                <hr>

                <label>FECHA</label>
                 <input type="date" name="fecha" id="fecha">   
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
                <h5 class="modal-title" style="text-align:center !important">Editar Unidad</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form enctype="multipart/form-data" method="POST" id="update">
            <div class="modal-body">

                <input type="text" name="id" id="id_edt" hidden>

                <label>ECONOMICO</label>
                <input type="text" name="economico" id="economico_edt" required>
                <hr>

                <label>MODELO</label>
                <input type="text" name="modelo" id="modelo_edt" required>
                <hr>

                <label>AÑO</label>
                <input type="number" name="year" id="year_edt" onkeypress='return validaNumericos(event)' required>
                <hr>

                <label>TIPO</label>
                <select name="tipo" id="tipo_edt" class="form-control" required>
                <option value="" selected>SELECCIONAR TIPO</option>
                <option value="CAMION">CAMION</option>
                <option value="CAMIONETA">CAMIONETA</option>
                <option value="AUTOMOVIL">AUTOMOVIL</option>
                </select>
                <hr>

                <label>SERIE</label>
                <input type="text" name="serie" id="serie_edt" required>
                <hr>

                <label>PLACA</label>
                <input type="text" name="placa" id="placa_edt" required>
                <hr>

                <label>PLACA FISICA</label>
                <input type="text" name="pf" id="pf_edt" required>
                <hr>

                <label>TARJETA DE CIRCULACION</label>
                <input type="file" name="tc" id="tc_edt" class="form-control">
                <hr>

                <label>FACTURA</label>
                <input type="file" name="factura" id="factura_edt" class="form-control">
                <hr> 

                <label>POLIZA DE SEGURO</label>
                <input type="file" name="ps" id="ps_edt" class="form-control">
                <hr>               

                <label>COMBUSTIBLE</label>
                <select name="combustible" id="combustible_edt" class="form-control" required>
                <option value="" selected>SELECCIONAR COMBUSTIBLE</option>
                <option value="GASOLINA">GASOLINA</option>
                <option value="DIESEL">DIESEL</option>
                <option value="GAS">GAS</option>
                <option value="GAS/DIESEL">GAS/DIESEL</option>
                <option value="GAS/GASOLINA">GAS/GASOLINA</option>
                </select>
                <hr>

                <label>CAPACIDAD TANQUE</label>
                <input type="number" name="ctanque" id="ctanque_edt" onkeypress='return validaNumericos(event)' required>
                <hr>

                <label>RENDIMIENTO</label>
                <input type="number" name="re" id="re_edt" onkeypress='return validaNumericos(event)' required>
                <hr>

                <label>#GPS</label>
                <input type="text" name="gps" id="gps_edt" required>
                <hr>

                <label>ESTATUS</label>
                <select name="estatus" id="estatus_edt" class="form-control" required>
                <option value="" selected>SELECCIONAR ESTATUS</option>
                <option value="ACTIVO">ACTIVO</option>
                <option value="CORRALON">CORRALON</option>
                <option value="TALLER">TALLER</option>
                </select>
                <hr>

                <label>FECHA</label>
                 <input type="date" name="fecha" id="fecha_edt">   
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

    //AÑADIR//
    $(document).ready(function() {
        $('#submit').submit(function(e) {
            e.preventDefault();
            var id_user = $("#id_user").val();
            var economico = $("#economico").val().toUpperCase();
            var modelo = $("#modelo").val().toUpperCase();
            var year = $("#year").val();
            var tipo = $("#tipo").val().toUpperCase();
            var serie = $("#serie").val().toUpperCase();
            var placa = $("#placa").val().toUpperCase();
            var pf = $("#pf").val().toUpperCase();
            var combustible = $("#combustible").val().toUpperCase();
            var ctanque = $("#ctanque").val();
            var re = $("#re").val();
            var gps = $("#gps").val().toUpperCase();
            var estatus = $("#estatus").val().toUpperCase();
            var fecha = $("#fecha").val();

            if (economico == "" || modelo == "" || year == "" || tipo == "" || serie == "" || placa == "" || pf == "" || combustible == "" || ctanque == "" ||
                re == "" || gps == "" || estatus == "" || fecha == "") {
                swal({
                    title: "Aviso",
                    text: "Favor de no dejar campos vacios",
                    icon: "info",
                })
                $('#modal_cuenta').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                $("#main").load('<?php echo base_url(); ?>FunctionsController/unidades',{id_user:id_user});
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>FunctionsController/insert_unidad",
                    data: new FormData(this),
                    processData: false,
                    cache: false, 
                    contentType: false,
                    success: function(data) {
                        swal({
                            title: "Unidad Guardada Exitosamente",
                            text: economico,
                            icon: "success",
                        });
                        $('#modal_cuenta').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        $("#main").load(
                            '<?php echo base_url(); ?>FunctionsController/unidades',{id_user:id_user});
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
                        url: "<?php echo base_url(); ?>FunctionsController/delete_unidad",
                        data: {
                            id: id
                        }
                    }).done(function() {
                        swal({
                            title: "Eliminado",
                            text: "Unidad eliminada exitosamente",
                            icon: "success",
                        }).then(function() {
                            $("#main").load('<?php echo base_url(); ?>FunctionsController/unidades',{id_user:id_user});

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
                    url: "<?php echo base_url(); ?>FunctionsController/unidad",
                    data: {
                        id: id
                    },
                    success: function(result) {
                        var result = JSON.parse(result);
                        $.each(result, function(i, result) {
                            $("#id_edt").val(result.ID);
                            $("#economico_edt").val(result.ECONOMICO);
                            $("#modelo_edt").val(result.MODELO);
                            $("#year_edt").val(result.YEAR);
                            $("#tipo_edt").val(result.TIPO);
                            $("#serie_edt").val(result.SERIE);
                            $("#placa_edt").val(result.PLACA);
                            $("#pf_edt").val(result.PF);
                            $("#combustible_edt").val(result.COMBUSTIBLE);
                            $("#ctanque_edt").val(result.CTANQUE);
                            $("#re_edt").val(result.RE);
                            $("#gps_edt").val(result.GPS);
                            $("#estatus_edt").val(result.ESTATUS);
                            $("#fecha_edt").val(result.FECHA);
                        });
                    },
                });
            }
        });
    });

    //UPDATE//
    $(document).ready(function() {
        $('#update').submit(function(e) {
        e.preventDefault();
                //VARIABLES//
                var id_user = $("#id_user").val();
                var id = $("#id_edt").val();
                var economico = $("#economico_edt").val().toUpperCase();
                var modelo = $("#modelo_edt").val().toUpperCase();
                var year = $("#year_edt").val();
                var tipo = $("#tipo_edt").val().toUpperCase();
                var serie = $("#serie_edt").val().toUpperCase();
                var placa = $("#placa_edt").val().toUpperCase();
                var pf = $("#pf_edt").val().toUpperCase();
                var combustible = $("#combustible_edt").val().toUpperCase();
                var ctanque = $("#ctanque_edt").val();
                var re = $("#re_edt").val();
                var gps = $("#gps_edt").val().toUpperCase();
                var estatus = $("#estatus_edt").val().toUpperCase();
                var fecha = $("#fecha_edt").val();         

                //COMPROBAR//
                if (economico != "" || modelo != "" || year != "" || tipo != "" || serie != "" || placa != "" || pf != "" || combustible != "" || ctanque != "" ||
            re != "" || gps != "" || estatus != "" || fecha != "") {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>FunctionsController/update_unidad",
                        data: new FormData(this),
                        processData: false,
                        cache: false, 
                        contentType: false,
                        success: function(result) {
                            swal({
                        title: "Actualizado",
                        text: "Unidad actualizada exitosamente",
                        icon: "success",
                    }).then(function() {
                        $('#modal_cuenta').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        $("#main").load('<?php echo base_url(); ?>FunctionsController/unidades',{id_user:id_user});

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
                    $("#main").load('<?php echo base_url(); ?>FunctionsController/unidades',{id_user:id_user});  
                    }
        });
    });






</script>

</html>