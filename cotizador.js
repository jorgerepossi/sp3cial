const anticipoSection = $(".anticipoSection");

const enviar = $("#button");
const resultado = $(".resultado");
const userFormData = $("#userFormData");
const nombre = $("input#nombre");
const telefono = $("input#telefono");
const email = $("input#email");
const emailValidate = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
const error = $("#error");
const anticipoUsado = $(".anticipoUsado");


$("#anticipo").html(
  "Anticipo de " + String($("#range").val()).replace(/(.)(?=(\d{3})+$)/g, "$1.")
);

error.hide();
enviar.hide();


$("#valorDelAuto").change(function() {
  let valorDelAuto = $("#valorDelAuto option:selected").attr("data-valor");

  $(this).each(function() {
    $("#modeloSeleccionado").val(valorDelAuto);
  });
});

$("#range").on("input", function() {
  let range = $(this).val();

  $("#anticipo").html(
    "Anticipo de " + String(range).replace(/(.)(?=(\d{3})+$)/g, "$1.")
  );

  $(this).attr("value", range);
  $("#rangoSeleccionado").attr("value", range);
});

$("#showInfo").on("click", function() {
  anticipoSection.slideDown();
});

$("#showInfoNo").on("click", function() {
  anticipoSection.slideUp();
  let rangoSeleccionado = $("#rangoSeleccionado").attr("value", "0");
  console.log("valor es: " + rangoSeleccionado);
});

$("input").on("change", function() {
  let activo = $('[type="radio"]:checked').val();
  $("#anticipoSeleccionado").val(activo);
});

$("#calcular").on("click", function(e) {
  e.preventDefault();

  if (nombre.val() == "") {
    error.show().html("El campo <strong>Nombre</strong> es requerido");
  } else if (nombre.val().length < 4) {
    error.show().html( "El campo <strong>Nombre</strong> debe tener al menos de 4 caracteres" );
  } else if (telefono.val() == "") {
    error.show().html("Debes completar el campo <strong>Teléfono </strong> ");
  } else if (isNaN(telefono.val())) {
    error.show().html("El campo <strong>Teléfono </strong>  sólo admite números");
  } else if (telefono.val().length < 7) {
    error.show().html("El campo <strong>Teléfono </strong> debe tener al menos de 8 caracteres");
  } else if (email.val() == "") {
    error.show().html("Debes completar el campo <strong>Email </strong> ");
  } else if (!emailValidate.test(email.val())) {
    error.show().html("El campo <strong>Email </strong> no es váildo");
  } else {
    // calcular
    if ($("#valorDelAuto option:selected").attr("name") == "seleccionar") {
      error.show().html("Debe seleccionar un modelo");
      resultado.hide();
    } else {
      error.hide();
      resultado.show();

      let valorDelAuto = $("#valorDelAuto option:selected").attr("data-valor");
      let modeloDelAuto = $("#valorDelAuto option:selected").attr("name");
      let anticipo = $("#range").attr("value");

      const valorDeLaCuota = Math.round(valorDelAuto / 84);
      const cuotasPagas = Math.round(anticipo / valorDeLaCuota);
      const cantCuotasRestantes = 86 - cuotasPagas;
      

      userFormData.hide();

      if ($("#anticipoSeleccionado").val() == "si") {
        console.log("activo");
        resultado.html(
          `
             <div class='has-success'>
             <p class='control-label'> Modelo seleccionado ` + modeloDelAuto + `</p>
             <p class='control-label'> Anticipo de $` +  String(anticipo).replace(/(.)(?=(\d{3})+$)/g, "$1.") +  `</p>
             <p class='control-label'> ` + cantCuotasRestantes + ` Cuotas de $` + String(valorDeLaCuota).replace(/(.)(?=(\d{3})+$)/g, "$1.") +  `</p> 
             </div>
             `
        );
        enviar.show();
        $("#calcular").hide();
        $("#valorDelAuto").hide();
        anticipoUsado.hide();
        anticipoSection.hide();
        $("#cuotasAPagarDe").attr("value", " " + cantCuotasRestantes +  " Cuotas de $" + String(valorDeLaCuota).replace(/(.)(?=(\d{3})+$)/g, "$1.") +
            "" );
      } else if ($("#anticipoSeleccionado").val() == "no") {
        resultado.html(
          `
            <div class='has-success'>
            <p class='control-label'> Modelo seleccionado ` + modeloDelAuto + `</p>
            <p class='control-label'> 84 Cuotas de $` + String(valorDeLaCuota).replace(/(.)(?=(\d{3})+$)/g, "$1.") + `</p> 
            </div>
          `
        );
        $("#cuotasAPagarDe").attr(
          "value",  " 84 Cuotas de $" + String(valorDeLaCuota).replace(/(.)(?=(\d{3})+$)/g, "$1.") +
            ""
        );
        anticipoUsado.hide();
        enviar.show();
        $("#valorDelAuto").hide();
        $("#range").val();
        $("#calcular").hide();
      } else {
        resultado.html(
          `
            <div class='has-success'>
            <p class='control-label'> Modelo seleccionado ` + modeloDelAuto + `</p>
            <p class='control-label'> 84 Cuotas de $` + String(valorDeLaCuota).replace(/(.)(?=(\d{3})+$)/g, "$1.") + `</p> 
           </div>
          `
        );
        $("#cuotasAPagarDe").attr(
          "value",  " 84 Cuotas de $" + String(valorDeLaCuota).replace(/(.)(?=(\d{3})+$)/g, "$1.") + ""
        );
        anticipoUsado.hide();
        enviar.show();
        $("#valorDelAuto").hide();
        $("#calcular").hide();
      }
    }
    // fin calcular
  }
});
