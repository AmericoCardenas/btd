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
                    <th>RFC</th>
                    <th>FOLIO</th>
                    <th>METODO</th>
                    <th>SUBTOTAL</th>
                    <th>IVA</th>
                    <th>TOTAL</th>
                    <th>COMPROBANTE</th>
                    <th>CHECK</th>
                    <th>PDF</th>
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
                    <td><?php echo $value['RFC']; ?></td>
                    <td><?php echo $value['FOLIO']; ?></td>
                    <td><?php echo $value['METODO']; ?></td>
                    <td><?php echo $value['SUBTOTAL'];?></td>
                    <td><?php echo $value['IVA'];?></td>
                    <td><?php echo $value['TOTAL'];?></td>
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

                    <td>
                    <button title="PDF" type="button" class="btn btn-warning btnpdf" id="btn-pdf" data-bs-toggle="modal" data-bs-target="#modal_pdf"
                    value="<?php echo $value['PROVEEDOR'];?>">
                    <i class="fas fa-file-pdf"></i></button>
                    <input type="hidden" name="id-orden" id="id_orden" value="<?php echo $value['ID'];?>"/>
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
                <select  name="proveedor" id="proveedor_edt" class="form-control proveedor" required>
                <option value="">SELECCIONAR PROVEEDOR</option>
                <?php foreach($proveedores as $row => $value){ ?>
                <option value="<?php echo $value['NOMBRE'];?>"><?php echo $value['NOMBRE'];?></option>
                <?php } ?>
                </select>
                <hr>

                <label>RFC</label>
                <input type="text" name="rfc" id="rfc_edt" class="form-control rfc" required readonly>
                <hr>

                <label>FOLIO</label>
                <input type="text" name="folio" id="folio_edt" class="form-control" required>
                <hr>

                <label>METODO DE PAGO</label>
                    <select name="metodo" id="metodo_edt" class="form-control">
                        <option value="">SELECCIONAR METODO DE PAGO:</option>
                        <option value="EFECTIVO">EFECTIVO</option>
                        <option value="CHEQUE">CHEQUE</option>
                        <option value="TRANSFERENCIA">TRANSFERENCIA</option>
                    </select>
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

<!-- Large modal -->

<div class="modal modalpdf" id="modal_pdf" tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
        
                <div class="modal-header">
                    <img src="<?php echo base_url();?>application/assets/img/tda.jpg" weigth="50px" height="50px">
                    <?php foreach ($tb as $row => $value) { ?>
                    <h5 class="modal-title" style="text-align:center !important">ORDEN DE COMPRA #<?php echo $value['ID'];?>  </h5>
                    <p> <label style="color:black !important;">FECHA:</label> <span style="font-weight:bolder;"><?php echo date('d/m/Y',strtotime($value['FECHA']));?></span>
                    <br> <label style="color:black !important;">FOLIO:</label> <span style="font-weight:bolder;"><?php echo $value['FOLIO'];?></span>
                    <?php }?>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>



                <div class="modal-body">

                        <div class="row" style="background-color:#2e7cf5 !important;">
                            <div class="col-md-4">
                            <label style="color:white !important; font-weight:bolder !important;">TRANSPORTES DAVILA SA DE CV</label>
                            <label style="color:white !important; font-weight:bolder !important;">TDA010727UD7</label>
                            </div>

                            <div class="col-md-4">
                            <label style="color:white !important; font-weight:bolder !important;">Nicolas Michelena 1128 <br>
                                        Hacienda de Santa Catarina <br>
                                        Ciudad de Santa Catarina <br>
                                        Santa Catarina <br>
                                        México
                            </label>
                            </div>

                            <div class="col-md-4">
                            <label style="color:white !important; font-weight:bolder !important;">
                            66357 <br>
                            Nuevo León
                            </label>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                            <?php foreach ($tb as $row => $value) { ?>
                            <label style="color:black !important;"> CLIENTE: </label> <span style="font-weight:bolder; color:black !important;font-size: 12px !important;"><?php echo $value['PROVEEDOR'];?></span> <br>
                            <label style="color:black !important;"> RFC: </label> <span style="font-weight:bolder; color:black !important;font-size: 12px !important;"><?php echo $value['RFC'];?></span> <br>
                            <?php }?>
                            <label style="color:black !important;"> CORREO: </label> <span style="font-weight:bolder; color:black !important; font-size: 12px !important;" id="md-correo"></span> <br>
                            <label style="color:black !important;"> TELEFONO: </label> <span style="font-weight:bolder; color:black !important; font-size: 12px !important;" id="md-telefono"></span> <br>
                            <label style="color:black !important;"> MUNICIPIO: </label> <span style="font-weight:bolder; color:black !important; font-size: 12px !important;" id="md-municipio"></span>
                            </div>

                            <div class="col-md-6">
                            <label style="color:black !important;"> CALLE: </label> <span style="font-weight:bolder; color:black !important; font-size: 12px !important;" id="md-calle"></span> <br>
                            <label style="color:black !important;"> NO.EXT: </label> <span style="font-weight:bolder; color:black !important; font-size: 12px !important;" id="md-noext"></span><br>
                            <label style="color:black !important;"> COLONIA: </label> <span style="font-weight:bolder; color:black !important; font-size: 12px !important;" id="md-colonia"></span><br>
                            <label style="color:black !important;"> C.P.: </label> <span style="font-weight:bolder; color:black !important; font-size: 12px !important;" id="md-cp"></span><br>
                            <label style="color:black !important;"> ESTADO: </label> <span style="font-weight:bolder; color:black !important; font-size: 12px !important;" id="md-estado"></span>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-sm table-hover table-bordered">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">FECHA</th>
                                        <th scope="col">UNIDAD</th>
                                        <th scope="col">CANTIDAD</th>
                                        <th scope="col">UMED</th>
                                        <th scope="col">DESCRIPCION</th>
                                        <th scope="col">ORDEN</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbreq">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                            <?php foreach ($tb as $row => $value) { ?>
                            <label style="color:black !important;"> SUBTOTAL: </label> <span style="font-weight:bolder; color:black !important;font-size: 12px !important;"><?php echo $value['SUBTOTAL'];?></span> <br>
                            <label style="color:black !important;"> IVA: </label> <span style="font-weight:bolder; color:black !important;font-size: 12px !important;"><?php echo $value['IVA'];?></span> <br>
                            <label style="color:black !important;"> TOTAL: </label> <span style="font-weight:bolder; color:black !important;font-size: 12px !important;"><?php echo $value['TOTAL'];?></span> <br>
                            <?php }?>
                            </div>

                            <div class="col-md-6">
                            <?php foreach ($tb as $row => $value) { ?>
                            <label style="color:black !important;">METODO DE PAGO:</label> <span style="font-weight:bolder; color:black !important;font-size: 12px !important;"><?php echo $value['METODO'];?></span> <br>
                            <?php }?>
                            </div>
                        </div>
                        <hr>  

                        <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <input type="text" style="outline: 0 !important;  border-width: 0 0 2px !important; border-color: black !important;" readonly> <br>
                                    <label style="color:black !important;">FIRMA DE CONFORMIDAD</label>
                                </div>
                            
                                <div class="col-md-4"></div>
                        </div>    

                        <div class="row">
                        <div class="col-md-12" style="text-align: center !important;">
                               <button type="submit" class="btn btn-primary btn-export">PDF</button>
                        </div>
                        </div>   

                </div>
        </div>
  </div>
</div>

<script>

//DATA TABLES//
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
                        text: "Orden eliminada exitosamente",
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

//PROVEEDOR BY NAME
$(document).ready(function() {
    $(document).on("click", ".btnpdf", function(event) {
        var proveedor = $(this).val();
        if (proveedor != "") {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>FunctionsController/proveedorbyname",
                data: {
                    proveedor: proveedor
                },
                success: function(result) {
                    var result = JSON.parse(result);
                    $.each(result, function(i, result) {
                        $("#md-municipio").text(result.MUNICIPIO);
                        $("#md-correo").text(result.CORREO);
                        $("#md-telefono").text(result.TELEFONO);
                        $("#md-calle").text(result.CALLE);
                        $("#md-noext").text(result.NOEXT);
                        $("#md-colonia").text(result.COLONIA);
                        $("#md-cp").text(result.CP);
                        $("#md-estado").text(result.ESTADO);
                    });
                },
            });
        }
    });   
});

//CALCULAR SUBTOTAL
$(document).ready(function() {
    $('.subtotal').on('keypress', function(event) {
        var subtotal = $(this).val();

        var subtotal2 = parseFloat(subtotal);

        var iva = parseFloat(subtotal2 * 0.16);

        var total = subtotal2 + iva;

        var total2 = parseFloat(total).toFixed(2);
        $('.iva').val(iva);
        $('.total').val(total2);

    });
});

//RFC BY PROVEEDOR
$(document).ready(function() {
    $('.proveedor').on('change', function(event) {
        var proveedor = $(this).val();
        if (proveedor != "") {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>FunctionsController/proveedor_rfc",
                data: {
                    proveedor: proveedor
                },
                success: function(result) {
                    var result = JSON.parse(result);
                    $.each(result, function(i, result) {
                        $(".rfc").val(result.RFC);
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
                var fecha = $("#fecha_edt").val();
                var proveedor = $("#proveedor_edt").val();
                var rfc = $("#rfc_edt").val();
                var folio = $("#folio_edt").val();
                var metodo = $("#metodo_edt").val();
                var subtotal = $("#subtotal_edt").val();
                var iva = $("#iva_edt").val();
                var total = $("#total_edt").val();
                //COMPROBAR//
                if (fecha != "" || proveedor != "" || rfc != "" || folio != "" || metodo != "" ||
                subtotal != "" || iva != "" || total != "") {
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

//FLOAT STYLE
$(document).ready(function() {
    $('.subtotal').on('input', function() {
        this.value = this.value.replace(/[^0-9,.]/g, '').replace(/,/g, '.');
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
                        $("#rfc_edt").val(result.RFC);
                        $("#folio_edt").val(result.FOLIO);
                        $("#metodo_edt").val(result.METODO);
                        $("#subtotal_edt").val(result.SUBTOTAL);
                        $("#iva_edt").val(result.IVA);
                        $("#total_edt").val(result.TOTAL);
                    });
                },
            });
        }
    });   
});

//MODAL TABLE//
$(document).ready(function() {
    $(document).on("click", ".btnpdf", function(event) {
        var id_orden = $("#id_orden").val();
        if (id_orden != "") {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>FunctionsController/reqbyorder",
                data: {
                    id_orden: id_orden
                },
                success: function(result) {
                    var result = JSON.parse(result);
                    $.each(result, function(i, result) {
                        
                        var id = result.ID;
                        var fecha = result.FECHA;
                        var unidad = result.UNIDAD;
                        var cantidad = result.CANTIDAD;
                        var umed = result.UMED;
                        var descripcion = result.DESCRIPCION;
                        var area = result.AREA;
                        var orden = result.ORDEN;

                        var tbody = $('#tbreq');
                        var table = $('<tr>'+

                        '<td>'+id+'</td>'+
                        '<td>'+fecha+'</td>'+
                        '<td>'+unidad+'</td>'+
                        '<td>'+cantidad+'</td>'+
                        '<td>'+umed+'</td>'+
                        '<td>'+descripcion+'</td>'+
                        // '<td>'+area+'</td>'+
                        '<td>'+orden+'</td>'+
                        '</tr>');
                       
                        tbody.append(table);

                    });
                },
            });
        }
    });   
});

//TO PDF


</script>

<script>
window.jsPDF = window.jspdf.jsPDF;
$(document).ready(function() {
    $(document).on("click", ".btn-export", function(event) {

        var pdf = new jsPDF('p', 'pt', 'letter');
		pdf.html(document.body, {
			callback: function (pdf) {
				var iframe = document.createElement('iframe');
				iframe.setAttribute('style', 'position:absolute;right:0; top:0; bottom:0; height:100%; width:500px');
				document.body.appendChild(iframe);
				iframe.src = pdf.output('datauristring');
			}
		});
        
    });
});
</script>