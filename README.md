# Web car form validation

A web car form to sen info to the owner
---

### Cotizador.js 
---
```

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

```


## Marcas 

--

```
{
  "marcas": [
    {
      "id": 1,
      "marca": "Audi",
      "nombre": "Audi",
      "modelos": [
        "A1",
        "A1_Sportback",
        "A3",
        "A3_Sportback",
        "Q2",
        "Q3",
        "Q5"
      ]
    },
    {
      "id": 2,
      "marca": "Chery",
      "nombre": "Chery",
      "modelos": [
        "QQ",
        "Tiggo",
        "Tiggo_2",
        "Tiggo_3",
        "Tiggo_5"
      ]
    },
    {
      "id": 3,
      "marca": "Chevrolet",
      "nombre": "Chevrolet",
      "modelos": [
        "Agile",
        "Astra_2",
        "Aveo",
        "Captiva",
        "Celta",
        "Corsa",
        "Corsa_2",
        "Corsa_Classic",
        "Corsa_Wagon",
        "Corsa_Classic_Wagon",
        "Classic",
        "Cobalt",
        "Cruze",
        "Meriva",
        "Montana",
        "Onix",
        "Prisma",
        "S-10",
        "Sonic",
        "Spark",
        "Spin",
        "Tracker",
        "Trailblazer",
        "Vectra",
        "Zafira 2"
      ]
    },
    {
      "id": 4,
      "marca": "Chrysler",
      "nombre": "Chrysler",
      "modelos": [
        "Pt Cruiser"
      ]
    },
    {
      "id": 5,
      "marca": "Citroën",
      "nombre": "Citroën",
      "modelos": [
        "Berlingo_Furgón",
        "Berlingo_Multispace",
        "C3",
        "C3_Aircross",
        "C3_Picasso",
        "C4",
        "C4_Aircross",
        "C4_Cactus",
        "C4_Grand_Picasso",
        "C4_Lounge",
        "C4_Picasso",
        "C-Elysee",
        "Picasso",
        "Picasso_Safari",
        "Picasso_Spirit"
      ]
    },
    {
      "id": 5,
      "marca": "Dodge",
      "nombre": "Dodge",
      "modelos": [
        "Journey",
        "Ram"
      ]
    },
    {
      "id": 6,
      "marca": "Ds",
      "nombre": "Ds Automobiles",
      "modelos": [
        "Ds3",
        "Ds3_Crossback",
        "Ds4",
        "Ds4_Crossback"
      ]
    },
    {
      "id": 7,
      "marca": "Fiat",
      "nombre": "Fiat",
      "modelos": [
        "500",
        "500_X",
        "Argo",
        "Cronos",
        "Doblo",
        "Firorino",
        "Grand_Siena",
        "Idea",
        "Idea_Adventure",
        "Linea",
        "Mobi",
        "Palio",
        "Palio_Weekend",
        "Palio_Weekend_Adventure",
        "Punto",
        "Qubo",
        "Siena",
        "Strada",
        "Strada_Adventure",
        "Tipo",
        "Toro",
        "Uno",
        "Uno_Novo"
      ]
    },
    {
      "id": 8,
      "marca": "Ford",
      "nombre": "Ford",
      "modelos": [
        "Ecosport",
        "F-100",
        "Fiesta",
        "Focus",
        "Ka",
        "Kuga",
        "Mondeo",
        "Ranger",
        "S-Max"
      ]
    },
    {
      "id": 9,
      "marca": "Honda",
      "nombre": "Honda",
      "modelos": [
        "Accord",
        "City",
        "Civic",
        "Cvr",
        "Fit",
        "Hrv",
        "Wr-v"
      ]
    },
    {
      "id": 10,
      "marca": "Hyundai",
      "nombre": "Hyundai",
      "modelos": [
        "Atos",
        "Creta",
        "Grand_I_10",
        "Grand_Santa_Fe",
        "I_10",
        "I_30",
        "Ioniq",
        "Kona",
        "Santa_Fe",
        "Tucson"
      ]
    },
    {
      "id": 11,
      "marca": "Isuzu",
      "nombre": "Isuzu",
      "modelos": [
        "Pick-up"
      ]
    },
    {
      "id": 12,
      "marca": "Jeep",
      "nombre": "Jeep",
      "modelos": [
        "Cherokee",
        "Compass",
        "Grand_Cherokee",
        "Renegade",
        "Wrangler"
      ]
    },
    {
      "id": 13,
      "marca": "Kia",
      "nombre": "Kia",
      "modelos": [
        "Carnival",
        "Cerato",
        "Picanto",
        "Rio",
        "Rondo",
        "Sorento",
        "Soul",
        "Sportage"
      ]
    },
    {
      "id": 14,
      "marca": "Mercedes_Benz",
      "nombre": "Mercedes Benz",
      "modelos": [
        "Viano",
        "Vito"
      ]
    },
    {
      "id": 15,
      "marca": "Mitsubishi",
      "nombre": "Mitsubishi",
      "modelos": [
        "L200",
        "Outlander"
      ]
    },
    {
      "id": 16,
      "marca": "Nissan",
      "nombre": "Nissan",
      "modelos": [
        "Frontier",
        "Kicks",
        "March",
        "Note",
        "Sentra",
        "Versa",
        "Xtrail"
      ]
    },
    {
      "id": 17,
      "marca": "Peugeot",
      "nombre": "Peugeot",
      "modelos": [
        "206",
        "206_Sw",
        "207",
        "207_Compact",
        "207_Compact_Sw",
        "208",
        "2008",
        "301",
        "307",
        "307 Sw",
        "308",
        "3008",
        "408",
        "5008",
        "Partner",
        "Partner_Urbana",
        "Partner_Patagonica"
      ]
    },
    {
      "id": 18,
      "marca": "Renault",
      "nombre": "Renault",
      "modelos": [
        "Captur",
        "Clio_2_F2",
        "Clio_Mio",
        "Duster",
        "Fluence",
        "Grand_Scenic",
        "Kangoo_2",
        "Kangoo_Ze",
        "Kwid",
        "Logan",
        "Logan_2",
        "Megane_2",
        "Megane_3",
        "Oroch",
        "Sandero",
        "Sandero_2",
        "Sandero_Stepway",
        "Sandero_Stepway_2",
        "Scenic_2",
        "Symbol"
      ]
    },
    {
      "id": 19,
      "marca": "Subaru",
      "nombre": "Subaru",
      "modelos": [
        "Forester",
        "Impreza",
        "Legacy",
        "Legacy_R",
        "Outback",
        "Tribeca"
      ]
    },
    {
      "id": 20,
      "marca": "Suzuki",
      "nombre": "Suzuki",
      "modelos": [
        "Fun",
        "Grand Vitara",
        "Jimmy",
        "Vitara"
      ]
    },
    {
      "id": 21,
      "marca": "Toyota",
      "nombre": "Toyota",
      "modelos": [
        "C-HR",
        "Corolla",
        "Etios",
        "Hilux",
        "Innova",
        "Land_Cruiser",
        "Land_Cruiser_Prado",
        "Prius",
        "Rav_4",
        "Sw4",
        "Yaris"
      ]
    },
    {
      "id": 22,
      "marca": "Volkswagen",
      "nombre": "Volkswagen",
      "modelos": [
        "Amarok",
        "Bora",
        "Caddy",
        "Cross_Fox",
        "Fox",
        "Gol",
        "Gol_Country",
        "Gol_Trend",
        "Golf_7",
        "Golf_7_Variant",
        "New_Beetle",
        "Passat",
        "Passat_Cc",
        "Polo",
        "Saveiro",
        "Scirocco",
        "Sharan",
        "Suran",
        "Suran_Cross",
        "T-Cross",
        "The_Beetle",
        "Tiguan",
        "Tigua_ Al_ Space",
        "Up!",
        "Vento",
        "Vento_Variant",
        "Virtus",
        "Voyage"
      ]
    }
  ]
}

```


copyright © 2020 Jo Repossi [@jorgerepossi](https://github.com/jorgerepossi/sp3cial) 