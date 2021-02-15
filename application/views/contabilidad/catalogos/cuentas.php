<html>

<h1>Cuentas Bancarias</h1>

<div class="row">
    <div class="col-md-12" style="text-align:right !important;">
        <form method="post">
            <button title="Agregar" type="button" class="btn btnadd" id="btn-add" data-bs-toggle="modal"
                data-bs-target="#modal_cuenta"><i class="fas fa-plus-circle"></i></button>
            <button title="Exportar Excel" formaction="<?php echo base_url();?>FunctionsController/exportar_cuentas"
                id="btn-excel" class="btn btn-success"><i class="fas fa-file-excel"></i></button>
        </form>
    </div>

    <table class="table table-hover display table-responsive" id="table_id" style="text-align:center !important;">
        <thead>
            <tr>
                <th>ID</th>
                <th>BANCO</th>
                <th>CUENTA</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tb_cuentas as $row => $value) { ?>
            <tr>
                <td><?php echo $value['ID']; ?></td>
                <td><?php echo $value['BANCO']; ?></td>
                <td><?php echo $value['CUENTA']; ?></td>
                <td><button title="Editar" type="button" class="btn btnedit" id="btn-edit"
                        value="<?php echo $value['ID']; ?>"><i class="fas fa-edit"></i></button></td>
                <td><button title="Eliminar" type="button" class="btn btndelete" id="btn-delete"
                        value="<?php echo $value['ID']; ?>"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>



<!-- Modal -->

<div class="modal" id="modal_cuenta" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="text-align:center !important">Agregar Cuenta Bancaria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label>SELECIONAR BANCO:</label>
                <select name="cmb_banco" id="cmb_banco" class="form-control">
                    <option value="" selected>SELECCIONAR BANCO</option>
                    <?php foreach ($tb_bancos as $row => $value) { ?>
                    <option value="<?php echo $value['BANCO']; ?>"><?php echo $value['BANCO']; ?></option>
                    <?php } ?>
                </select>

                <label class="lb_modal">NUMERO DE CUENTA BANCARIA</label>
                <input type="number" id="txt_cuenta" name="txt_cuenta" onkeypress='return validaNumericos(event)'>
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


<script>
//TABLA JQUERY//
$(document).ready(function() {
    $('#table_id').DataTable();
});


//AÑADIR CUENTA//
$(document).ready(function() {
    $("#btn_guardar").click(function(event) {
        var banco = $("#cmb_banco").val();
        var cuenta = $("#txt_cuenta").val();
        if (banco == "" || cuenta == "") {
            swal({
                title: "Aviso",
                text: "Favor de no dejar campos vacios",
                icon: "info",
            })
            $('#modal_cuenta').modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $("#main").load('<?php echo base_url(); ?>FunctionsController/cuentas');
        } else {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>FunctionsController/insert_cuenta",
                data: {
                    banco: banco,
                    cuenta: cuenta
                },
                success: function(data) {
                    swal({
                        title: "Cuenta Bancaria Guardada Exitosamente",
                        text: cuenta,
                        icon: "success",
                    });
                    $('#modal_cuenta').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    $("#main").load('<?php echo base_url(); ?>FunctionsController/cuentas');
                },
            })
        }
    });
});


//ELIMINAR CUENTA//
$(document).ready(function() {
    $(".btndelete").on("click", function() {
        var id = $(this).val();
        swal({
            title: "¿Esta seguro de eliminar este campo?",
            text: "No se podra recuperar este elemento",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>FunctionsController/delete_cuenta",
                    data: {
                        id: id
                    }
                }).done(function() {
                    swal({
                        title: "Eliminado",
                        text: "Campo eliminado exitosamente",
                        icon: "success",
                    }).then(function() {
                        $("#main").load(
                            '<?php echo base_url(); ?>FunctionsController/cuentas'
                        );

                    });
                });

            } else {
                swal("Cambio no efectuado");
            }
        });
    });
});

//EDITAR BANCO//
$(document).ready(function() {
    $(".btnedit").click(function(event) {
        var id = $(this).val();
        swal({
            text: "Editar Banco",
            content: {
                element: "input",
                attributes: {
                    placeholder: "Nombre del Banco",
                    type: "text",
                    id: "txt_banco",
                },
            },
        }).then(function() {
            var txt_banco = $("#txt_banco").val().toUpperCase();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>FunctionsController/update_bancos",
                data: {
                    txt_banco: txt_banco,
                    id: id
                }
            }).done(function() {
                swal({
                    title: "Editado",
                    text: txt_banco,
                    icon: "success",
                }).then(function() {
                    $("#main").load(
                        '<?php echo base_url(); ?>FunctionsController/bancos'
                    );
                });
            });
        });
    });
});
</script>

</html>