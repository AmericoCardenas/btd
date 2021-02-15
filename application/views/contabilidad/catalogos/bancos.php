<html>

<h1>Bancos</h1>
<div class="row">
    <div class="col-md-12" style="text-align:right !important;">
        <form method="post">
            <button title="Agregar" type="button" class="btn btnadd" id="btn-add"><i
                    class="fas fa-plus-circle"></i></button>

            <button title="Exportar Excel" id="btn-excel" class="btn btn-success"
                formaction="<?php echo base_url();?>FunctionsController/exportar_bancos">
                <i class="fas fa-file-excel"></i></button>
        </form>
    </div>

    <table class="table table-hover display table-responsive" id="table_id" style="text-align:center !important;">
        <thead>
            <tr>
                <th>ID</th>
                <th>BANCO</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tb_bancos as $row => $value) { ?>
            <tr>
                <td><?php echo $value['ID']; ?></td>
                <td><?php echo $value['BANCO']; ?></td>
                <td><button title="Editar" type="button" class="btn btnedit" id="btn-edit"
                        value="<?php echo $value['ID']; ?>"><i class="fas fa-edit"></i></button></td>
                <td><button title="Eliminar" type="button" class="btn btndelete" id="btn-delete"
                        value="<?php echo $value['ID']; ?>"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</div>


<script>
//TABLA JQUERY//
$(document).ready(function() {
    $('#table_id').DataTable();
});

//AÑADIR BANCO//
$(document).ready(function() {
    $("#btn-add").click(function(event) {
        swal({
            text: "Agregar Banco",
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
            if (txt_banco == "") {
                swal({
                    title: "Aviso",
                    text: "Favor de no dejar campos vacios",
                    icon: "info",
                })
                $("#main").load('<?php echo base_url(); ?>FunctionsController/bancos');
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>FunctionsController/insert_bancos",
                    data: {
                        txt_banco: txt_banco
                    }
                }).done(function() {
                    swal({
                        title: "Agregado",
                        text: txt_banco,
                        icon: "success",
                    }).then(function() {
                        $("#main").load(
                            '<?php echo base_url(); ?>FunctionsController/bancos'
                        );
                    });
                });
            }
        });
    });
});


//ELIMINAR BANCO//
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
                    url: "<?php echo base_url(); ?>FunctionsController/delete_bancos",
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
                            '<?php echo base_url(); ?>FunctionsController/bancos'
                        );
                        console.log(id);
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