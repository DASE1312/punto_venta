$(document).ready(function () {
  $("#completar_compra").click(function(){
    let nFila=$("#tablaProductos tr").length;

    if(nFila<2){

    }else{
      $("#form_compra").submit()
    }
  })
});

function buscarProducto(e, tagCodigo, codigo) {
  var enterKey = 13;
  if (codigo != "") {
    if (e.which == enterKey) {
      $.ajax({
        url: BASE_URL + "/productos/buscarPorCodigo/" + codigo,
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

function agregarProducto(id_producto, cantidad, id_compra) {
  if (id_producto != null && id_producto != 0 && cantidad > 0) {
    $.ajax({
      url:
        BASE_URL +
        "/Temporal_Compra/insertar/" +
        id_producto +
        "/" +
        cantidad +
        "/" +
        id_compra,

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

function eliminarProducto(id_producto, id_compra) {
  $.ajax({
    url:
      BASE_URL + "/Temporal_Compra/eliminar/" + id_producto + "/" + id_compra,
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
