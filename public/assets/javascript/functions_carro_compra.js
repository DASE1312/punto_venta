$(document).ready(function () {
});


function buscarProducto(e, tagCodigo, codigo) {
    var enterKey = 13;
    if (codigo != "") {

        if (e.which == enterKey) {

            $.ajax({
                url: BASE_URL + '/productos/buscarPorCodigo/' + codigo,
                dataType: 'json',
                success: function (resultado) {

                    if (resultado == 0) {
                        $(tagCodigo).val('');
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
                            $("#id_producto").val('');
                            $("#nombre").val('');
                            $("#cantidad").val('');
                            $("#precio_compra").val('');
                            $("#subtotal").val('');
                        }
                    }
                }
            })
        }
    }
}

function Calcular(e) {
    var cantidad = 0, precio_compra = 0, subtotal = 0;
    var tr = e.parentNode.parentNode;
    var nodes = tr.childNodes;

    for (var x = 0; x < nodes.length; x++) {

        if (nodes[x].firstChild.id == 'cantidad[]') {
            cantidad = parseFloat(nodes[x].firstChild.value, 10);
        }
        if (nodes[x].firstChild.id == 'precio_compra[]') {
            precunit = parseFloat(nodes[x].firstChild.value, 10);
        }
        if (nodes[x].firstChild.id == 'subtotal[]') {
            anterior = nodes[x].firstChild.value;
            totalitem = parseFloat((precio_compra * cantidad), 10);
            nodes[x].firstChild.value = subtotal;
        }
    }
    // Resultado final de cada fila ERROR, al editar o eliminar una fila
    var total = document.getElementById("total");
    if (total.innerHTML == 'NaN') {
        total.innerHTML = 0;
        // 
    }
    total.innerHTML = parseFloat(total.innerHTML) + subtotal - anterior;
}