<html>

<h1>Ordenes de Compra</h1>

<div class="row">
    <div class="col-md-12" style="text-align:right !important;">


        <!-- <button title="Agregar" type="button" class="btn btnadd" id="btn-add" data-bs-toggle="modal"
                data-bs-target="#modal_agregar"><i class="fas fa-plus-circle"></i></button> -->

        <a href="<?php echo base_url();?>FunctionsController/exportar_requisiones"> <button title="Exportar Excel"
                id="btn-excel" class="btn btn-success"><i class="fas fa-file-excel"></i></button></a>

        <!-- <button title="Orden Compra" type="button" class="btn btnorden" id="btn-orden" style="background-color:#27bddb !important;"><i
                                class="fas fa-file-signature"></i></button> -->

    </div>

    <?php foreach ($user as $row => $value) { ?>
    <?php $area = $value['AREA']; ?>
    <input type="text" hidden value="<?php echo $value['ID'];?>" id="id_user" name="id_user">

    <div style="margin-top:10px !important;">
        <table class="table table-sm table-hover" id="table_id" style="text-align:center !important;"
            width="100% !important">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FECHA</th>
                    <th>PROVEEDOR</th>
                    <th>SUBTOTAL</th>
                    <th>IVA</th>
                    <th>TOTAL</th>
                    <th>COMPROBANTE</th>
                    <th>CHECK</th>
                    <th>Editar</th>
                    <?php if($area == "SISTEMAS" || $area == "GERENCIA"){ ?>
                    <th>Eliminar</th>
                    <?php }?>
                </tr>
            </thead>
            <tbody id="req">
                <?php foreach ($tb as $row => $value) {
                    $comprobante = $value['COMPROBANTE'];?>

                <tr class="tr">
                    <td><?php echo $value['ID']; ?></td>
                    <td><?php echo date('d/m/Y',strtotime($value['FECHA'])); ?></td>
                    <td><?php echo $value['PROVEEDOR']; ?></td>
                    <td><?php echo $value['SUBTOTAL'] ."$";?></td>
                    <td><?php echo $value['IVA'] ."$";?></td>
                    <td><?php echo $value['TOTAL'] ."$";?></td>
                    <td><a
                            href="<?php echo base_url();?>uploads/<?php if($comprobante!=""){echo $comprobante;}else{echo 'default.jpg';}?>"><img
                                src="<?php echo base_url();?>application/assets/img/documento.png"
                                height="40px !important" width="40px !important" id="img" class="img"></a></td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input req_id" type="checkbox" value="<?php echo $value['ID'];?>"
                                id="flexCheckDefault req_id">
                        </div>
                    </td>

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




<!-- MODAL EDITAR -->
<div class="modal" id="modal_editar" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="text-align:center !important">Editar Orden de Compra</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form enctype="multipart/form-data" method="POST" id="update">             
            <div class="modal-body">

                <input type="text" name="id" id="id_edt" hidden>

                <label>FECHA</label>
                <input type="date" name="fecha" id="fecha_edt" class="form-control" required>
                <hr>

                <label>PROVEEDOR</label>
                <input type="text" name="proveedor" id="proveedor_edt" class="form-control" required>
                <hr>

                <label>SUBTOTAL</label>
                <input type="text" name="subtotal" id="subtotal_edt" class="form-control subtotal"
                    placeholder="0.00" title="AGREGAR SUBTOTAL CON DECIMALES" step="0.00" required>
                <hr>

                <label>IVA</label>
                <input type="text" name="iva" id="iva_edt" class="form-control iva"
                    onkeypress='return validaNumericos(event)' readonly>
                <hr>

                <label>TOTAL</label>
                <input type="text" name="total" id="total_edt" class="form-control total"
                    onkeypress='return validaNumericos(event)' readonly>
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
$(document).ready(function() {
    $('#table_id').DataTable({
        "scrollY": 340,
        "scrollX": true,
        paging: false,
        scrollCollapse: true,
        fixedColumns: {
            leftColumns: 3
        }
    });
});

//MAGNIFIC POP UP//
$(document).ready(function() {
    $('.image-link').magnificPopup({
        type: 'image'
    });
});

$('.tr').magnificPopup({
    delegate: 'a',
    type: 'image'
    // other options
});

$('.tr').magnificPopup({
    delegate: 'a',
    type: 'iframe'
    // other options
});


//ELIMINAR//
$(document).ready(function() {
    $(document).on("click", ".btndelete", function(event) {
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
                    url: "<?php echo base_url(); ?>FunctionsController/delete_orden",
                    data: {
                        id: id
                    }
                }).done(function() {
                    swal({
                        title: "Eliminado",
                        text: "Requisicion eliminada exitosamente",
                        icon: "success",
                    }).then(function() {
                        $("#main").load(
                            '<?php echo base_url(); ?>FunctionsController/ordenes', {
                                id_user: id_user
                            });

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
    $(document).on("click", ".btnedit", function(event) {
        var id = $(this).val();
        if (id != "") {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>FunctionsController/orden",
                data: {
                    id: id
                },
                success: function(result) {
                    var result = JSON.parse(result);
                    $.each(result, function(i, result) {
                        $("#id_edt").val(result.ID);
                        $("#fecha_edt").val(result.FECHA);
                        $("#proveedor_edt").val(result.PROVEEDOR);
                        $("#subtotal_edt").val(result.SUBTOTAL);
                        $("#iva_edt").val(result.IVA);
                        $("#total_edt").val(result.TOTAL);
                    });
                },
            });
        }
    });   
});

$(document).ready(function() {
    $('.subtotal').on('keypress', function() {
        var subtotal = $(this).val();

        var subtotal2 = parseFloat(subtotal);

        var iva = parseFloat(subtotal2 * 0.16);

        var total = subtotal2 + iva;

        var total2 = parseFloat(total).toFixed(2);
        $('.iva').val(iva);
        $('.total').val(total2);

    })
});


//UPDATE//
$(document).ready(function() {
        $('#update').submit(function(e) {
        e.preventDefault();
                //VARIABLES//
                var id_user = $("#id_user").val();
                var id = $("#id_edt").val();
                var fecha = $("#fecha_edt").val();
                var proveedor = $("#proveedor_edt").val();
                var subtotal = $("#subtotal_edt").val();
                var iva = $("#iva_edt").val();
                var total = $("#total_edt").val();
                //COMPROBAR//
                if (fecha != "" || proveedor != "" || subtotal != "") {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>FunctionsController/update_orden",
                        data: new FormData(this),
                        processData: false,
                        cache: false, 
                        contentType: false,
                        success: function(result) {
                            swal({
                        title: "Actualizado",
                        text: "Orden actualizada exitosamente",
                        icon: "success",
                    }).then(function() {
                        $('#modal_cuenta').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        $("#main").load('<?php echo base_url(); ?>FunctionsController/ordenes',{id_user:id_user});

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
                    $("#main").load('<?php echo base_url(); ?>FunctionsController/ordenes',{id_user:id_user});  
                    }
        });
    });

$(document).ready(function() {
    $('.subtotal').on('input', function() {
        this.value = this.value.replace(/[^0-9,.]/g, '').replace(/,/g, '.');
    });
});

</script>