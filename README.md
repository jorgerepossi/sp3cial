# Web car form validation

A web car form to sen info to the owner
---

###Cotizador.js 

```
<script>
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
const modelosUsadosSeleccionados = $("#modelosUsadosSeleccionados");
const consultas_provincia_cons = $("#Consultas_provincia_cons");
const anticipoSeleccionado = $("#anticipoSeleccionado");
const clienteEntregaUsado = $("#clienteEntregaUsado");

$("#anticipo").html(
"Anticipo de " + String($("#range").val()).replace(/(.)(?=(\d{3})+$)/g, "$1.")
);

$(" .anticipoSection p.left").html("$50.000");
$(" .anticipoSection p.right").html("$600.000");

error.hide();

modelosUsadosSeleccionados.hide();

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

/************************************** */

/** Anticipo */

$("#showInfo").on("click", function() {
anticipoSection.slideDown();
});

$("#showInfoNo").on("click", function() {
anticipoSection.slideUp();
$("#rangoSeleccionado").attr("value", "0");
});

/** fin Anticipo */

/************************************** */

/**  Usados */

$("#entregaUsado").on("click", function() {
modelosUsadosSeleccionados.slideDown();
$("#clienteEntregaUsado").attr("value", "si");
});

$("#entregaUsadoNo").on("click", function() {
modelosUsadosSeleccionados.slideUp();
$("#clienteEntregaUsado").attr("value", "no");
});

$("#showUsado").on("click", function() {
anticipoSection.slideDown();
});

$("#showUsadoNo").on("click", function() {
anticipoSection.slideUp();
$("#rangoSeleccionado").attr("value", "0");
});

/** fin Usados */

/************************************** */

/**  Plan Caido*/

$("#planCaidoSi").on("click", function() {
$("#clientePlanCaido").attr("value", "si");
});

$("#planCaidoNo").on("click", function() {
$("#clientePlanCaido").attr("value", "no");
});

/** fin Plan Caido */

/************************************** */

/** Seleccionar Marca */

$("input").on("change", function() {
let activo = $('[type="radio"]:checked').val();
$("#anticipoSeleccionado").val(activo);
});

$("#button").on("click", function(e) {
e.preventDefault();

if (nombre.val() == "") {
error.show().html("El campo Nombre es requerido");
} else if (nombre.val().length < 4) {
error
.show()
.html(
"El campo Nombre debe tener al menos de 4 caracteres"
);
} else if (telefono.val() == "") {
error.show().html("Debes completar el campo Teléfono  ");
} else if (isNaN(telefono.val())) {
error
.show()
.html("El campo Teléfono   sólo admite números");
} else if (telefono.val().length < 7) {
error
.show()
.html(
"El campo Teléfono  debe tener al menos de 8 caracteres"
);
} else if (email.val() == "") {
error.show().html("Debes completar el campo Email  ");
} else if (!emailValidate.test(email.val())) {
error.show().html("El campo Email  no es váildo");
} else if (consultas_provincia_cons.val().length < 1) {
error.show().html("El seleccionar una provincia  ");
} else if ($("#valorDelAuto option:selected").val() == "Modelo de interés") {
error.show().html("Debe seleccionar un modelo ");
} else if (anticipoSeleccionado.val() == "") {
error.show().html("Debe seleccionar un tipo de anticipo ");
} else if (clienteEntregaUsado.val() == "") {
error
.show()
.html("Debe seleccionar si tiene o no un modelo usado ");
} else if ($("#clientePlanCaido").val() == "") {
error
.show()
.html("Debe seleccionar si tiene o no un plan caido ");
} else {
var form = $("#invitacion");
var url = form.attr("action");

$.ajax({
  type: "post",
  url: url,
  data: form.serialize(),
  beforeSend: function() {
    error.hide();
    $(".beforeHide").hide();
    resultado.html(
      "<i class='fa fa-spinner fa-pulse fa-3x fa-fw'></i> <span class='sr-only'>Loading...</span>"
    );
  },
  success: function(data) {
    resultado.html(
      "<div class='alert alert-success'> <p><strong> ¡Muchas gracias! Sus datos fueron enviados correctamente.  </strong></p><p> <strong> A la brevedad será contactado por un asesor. </strong>  </p> </div> "
    );

    form[0].reset();
  },
  error: function() {
    error.show().html("<strong>No pudimos enviar tus datos! </strong>");
  }
});


}
});

</script>
```