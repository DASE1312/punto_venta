$(function () {
    $("#cliente").autocomplete({
        source: BASE_URL + "/clientes/autocompleteData",
        minLength: 3,
        select: function (event, ui) {
            event.preventDefault();
            $("#id_cliente").val(ui.item.id);
            $("#cliente").val(ui.item.value);
        },
    });
});

$(function () {
    $("#codigo").autocomplete({
        source: BASE_URL + "/productos/autocompleteData",
        minLength: 3,
        select: function (event, ui) {
            event.preventDefault();
            $("#codigo").val(ui.item.value);
            setTimeout(
                function (e) {
                    e = jQuery.Event("keypress");
                    e.which = 13;
                    agregarProductoV(e, ui.item.id, 1, "<?php echo $id_venta; ?>");
                }
            )
        },
    });
});
/*
function buscarProducto(e, tagCodigo, codigo) {
    var enterKey = 13;
    if (codigo != "") {
        if (e.which == enterKey) {
            $.ajax({
                url: BASE_URL + "/ventas/buscarPorCodigo/" + codigo,
                dataType: "json",
                success: function (resultado) {
                    if (resultado == 0) {
                        $(tagCodigo).val("");
                    } else {
                        $("#resultado_error").html(resultado.error);

                        if (resultado.existe) {
                            $("#id_producto").val(resultado.datos.id);
                            $("#nombre").val(resultado.datos.nombre);
                            $("#cantidad").val(1);
                            $("#precio_compra").val(resultado.datos.precio_compra);
                            $("#subtotal").val(resultado.datos.precio_compra);
                            $("#cantidad").focus();
                        } else {
                            $("#id_producto").val("");
                            $("#nombre").val("");
                            $("#cantidad").val("");
                            $("#precio_compra").val("");
                            $("#subtotal").val("");
                        }
                    }
                },
            });
        }
    }
}
*/
function agregarProductoV(e, id_producto, cantidad, id_venta) {
    var enterKey = 13;
    if (codigo != "") {
        if (e.which == enterKey) {
            if (id_producto != null && id_producto != 0 && cantidad > 0) {
                $.ajax({
                    url:
                        BASE_URL +
                        "/Temporal_Compra/insertar/" +
                        id_producto +
                        "/" +
                        cantidad +
                        "/" +
                        id_venta,

                    success: function (resultado) {
                        if (resultado == 0) {
                        } else {
                            var resultado = JSON.parse(resultado);

                            if (resultado.error == "") {
                                $("#tablaProductos tbody").empty();
                                $("#tablaProductos tbody").append(resultado.datos);
                                $("#total").val(resultado.total);
                                $("#id_producto").val("");
                                $("#codigo").val("");
                                $("#nombre").val("");
                                $("#cantidad").val("");
                                $("#precio_compra").val("");
                                $("#subtotal").val("");
                            }
                        }
                    },
                });
            }
        }
    }

}

function eliminarProducto(id_producto, id_venta) {
    $.ajax({
        url:
            BASE_URL + "/Temporal_Compra/eliminar/" + id_producto + "/" + id_venta,
        success: function (resultado) {
            if (resultado == 0) {
                $(tagCodigo).val("");
            } else {
                var resultado = JSON.parse(resultado);

                $("#tablaProductos tbody").empty();
                $("#tablaProductos tbody").append(resultado.datos);
                $("#total").val(resultado.total);
            }
        },
    });
}

$(function () {
    $("#completar_venta").click(function () {
        let nFilas = $("#tablaProductos tr").length;
        if (nFilas < 2) {
            alert("Debe agregar un producto");
        } else {
            $("#form_venta").submit();
        }
    })
})