marcas_modelos_json("Marca");
function marcas_modelos_json(id, modelos) {
  var html = "";
  $.getJSON("marcas.json", function(data) {
    //console.log(data);
    html += '<option class="span-down" > Seleccionar ' + id + "  </option>";
    if (id == "Marca" && modelos == null) {
      for (var i = 0; i < data.marcas.length; i++) {
        html +=
          "<option value=" +
          data.marcas[i].marca +
          ">" +
          data.marcas[i].nombre +
          " </option>";
      }
    } else {
      for (var i = 0; i < data.marcas.length; i++) {
        if (data.marcas[i].marca == modelos) {
          for (var m = 0; m < data.marcas[i].modelos.length; m++) {
            html +=
              "<option value=" +
              data.marcas[i].modelos[m] +
              ">" +
              data.marcas[i].modelos[m] +
              " </option>";
          }
        }
      }
    }
    $("#" + id).html(html);
  });
}

$("#Marca").on("change", function() {
  var modelos = $(this).val();
  //   console.log(modelos);
  if (modelos != null) {
    marcas_modelos_json("Modelo", modelos);
  }
});
