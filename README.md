# Web car form validation

A web car form to sen info to the owner
---

<sub> <sup>  <sup>  Cotizador.js  </sup> </sup>   </sub>
---
```javascript

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


<sub> <sup>  <sup>  Marcas.js  </sup> </sup>   </sub>
---

```javascript
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

 ##  HTML 
<sub> <sup> <sup> <sup> *Add jQuery and Bootstrap to make it work* </sup> </sup> </sup></sub>
---
```html
 <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
          <form id="invitacion" name="invitacion" method="post" action="autospecial.php" autocomplete="off"
            onsubmit="enviar();return false;">
            <h2>COMPLETÁ EL FORMULARIO
              Y CALCULÁ EL VALOR DE TU CUOTA</h2>
            <div id="userFormData" class="beforeHide">
              <div class="form-group">
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre y Apellido"
                  required>
              </div>
              <div class="form-group">
                <input type="phone" class="form-control" name="telefono" id="telefono" placeholder="Telefono" required
                  minlength="8">
              </div>
              <div class="form-group">
                <input type="mail" class="form-control" name="email" id="email" placeholder="Email" required>
              </div>
              <div class="form-group">
                <select id="Consultas_provincia_cons" name="provincia" class="inputCiudad form-control" required="">
                  <option value="">Provincia</option>
                  <option value="Capital Federal">Capital Federal</option>
                  <option value="GBA Norte">GBA Norte</option>
                  <option value="GBA Oeste">GBA Oeste</option>
                  <option value="GBA Sur">GBA Sur</option>
                  <option value="Buenos Aires">Buenos Aires</option>
                  <option value="Catamarca">Catamarca</option>
                  <option value="Chaco">Chaco</option>
                  <option value="Chubut">Chubut</option>
                  <option value="Cordoba">Cordoba</option>
                  <option value="Corrientes">Corrientes</option>
                  <option value="Entre Rios">Entre Rios</option>
                  <option value="Formosa">Formosa</option>
                  <option value="Jujuy">Jujuy</option>
                  <option value="La Pampa">La Pampa</option>
                  <option value="La Rioja">La Rioja</option>
                  <option value="Mendoza">Mendoza</option>
                  <option value="Misiones">Misiones</option>
                  <option value="Neuquen">Neuquen</option>
                  <option value="Rio Negro">Rio Negro</option>
                  <option value="Salta">Salta</option>
                  <option value="San Juan">San Juan</option>
                  <option value="San Luis">San Luis</option>
                  <option value="Santa Cruz">Santa Cruz</option>
                  <option value="Santa Fe">Santa Fe</option>
                  <option value="Santiago del Estero">Santiago del Estero</option>
                  <option value="Tierra del Fuego">Tierra del Fuego</option>
                  <option value="Tucuman">Tucuman</option>
                </select>
              </div>

            </div>
            <div class="form-group beforeHide">
              <select name="modelo" id="valorDelAuto" class="inputCiudad form-control" required>
                <option selected name="seleccionar"> Modelo de interés</option>
                <option name="Ford Ka" data-valor="835939">Ford Ka</option>
                <option name="Ford Ka+" data-valor="833578">Ford Ka+</option>
              </select>
            </div>
            <!-- Anticipo -->
            <div class="form-group anticipoUsado col-md-12 col-xs-12 beforeHide bloque bloque__blanco">


              <p class="bloque__text-center">¿Entrega anticipo? </p>

              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 nopadding">
                <label for="showInfo">
                  <p class="bloque__size-small conanticipo btn">Con anticipo</p>
                  <input type="radio" name="anticipo" value="si" id="showInfo">
                </label>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 nopadding">
                <label for="showInfoNo">
                  <p class="bloque__size-small sinanticipo btn">Sin anticipo</p>
                  <input type="radio" name="anticipo" value="no" id="showInfoNo">
                </label>
              </div>
            </div>
            <div class="anticipoSection col-md-12 col-xs-12 beforeHide ">
              <label for="">
                <p><span id="anticipo"> 0 </span> </p>
                <input id="range" type="range" value="0" min="50000" max="600000" step="100" name="anticipoAgregado">
                <p class="left"></p>
                <p class="right"></p>
              </label>
            </div>
            <!-- Fin Anticipo -->


            <!-- Usado -->
            <div id="entregaUsadoContent"
              class="form-group anticipoUsado col-md-12 col-xs-12 beforeHide bloque bloque__blanco">


              <p class="bloque__text-center">¿Entrega usado? </p>

              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 nopadding">
                <label for="entregaUsado">
                  <p class="bloque__size-small conUsado btn">Si</p>
                  <input type="radio" name="entregaUsado" value="si" id="entregaUsado">
                </label>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 nopadding">
                <label for="entregaUsadoNo">
                  <p class="bloque__size-small sinUsado btn">No</p>
                  <input type="radio" name="entregaUsado" value="no" id="entregaUsadoNo">
                </label>
              </div>
            </div>
            <div id="modelosUsadosSeleccionados" class="col-md-12 col-xs-12 nopadding beforeHide">
              <div class="form-group  col-md-12 col-xs-12 nopadding">
                <div class="form-group">
                  <select name="marca" id="Marca" class="form-control" required data-brand="">

                    <option value="marca"> Marca </option>
                  </select>
                </div>
                <div class="form-group">
                  <select name="modelousado" id="Modelo" class="form-control" required>
                    <option value="modelo"> Seleccionar Modelo </option>
                  </select>
                </div>
                <div class="form-group">
                  <select id="Anio" name="anio" class="form-control" required>
                    <option value="anio"> Año </option>
                    <option value="2019"> 2019 </option>
                    <option value="2018"> 2018 </option>
                    <option value="2017"> 2017 </option>
                    <option value="2016"> 2016 </option>
                    <option value="2015"> 2015 </option>
                    <option value="2014"> 2014 </option>
                    <option value="2013"> 2013 </option>
                    <option value="2012"> 2012 </option>
                    <option value="2011"> 2011 </option>
                    <option value="2010"> 2010 </option>
                    <option value="2009"> 2009 </option>
                    <option value="2008"> 2008 </option>
                    <option value="2007"> 2007 </option>
                    <option value="2006"> 2006 </option>
                  </select>
                </div>
              </div>
            </div>
            <!-- Fin Usado -->


            <!-- Plan caído  -->

            <div class="form-group planCaido col-md-12 col-xs-12 beforeHide bloque bloque__blanco">

              <p class="bloque__text-center">¿Tenés tu Plan Caído? </p>

              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 nopadding">
                <label for="planCaidoSi">
                  <p class="bloque__size-small planCaidoSi btn">Si</p>
                  <input type="radio" name="planCaido" value="si" id="planCaidoSi">
                </label>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 nopadding">
                <label for="planCaidoNo">
                  <p class="bloque__size-small planCaidoNo btn">No</p>
                  <input type="radio" name="planCaido" value="no" id="planCaidoNo">
                </label>
              </div>
            </div>

            <!-- Plan caído  -->


            <input id="modeloSeleccionado" type="hidden" name="modeloSeleccionado" value="">
            <input id="anticipoSeleccionado" type="hidden" name="anticipoSeleccionado" value="">
            <input id="rangoSeleccionado" type="hidden" name="rangoSeleccionado" value="">
            <input id="cuotasAPagarDe" type="hidden" name="cuotasAPagarDe" value="">
            <input id="clienteEntregaUsado" type="hidden" name="clienteEntregaUsado" value="">
            <input id="clientePlanCaido" type="hidden" name="clientePlanCaido" value="">
            <div class="resultado"></div>
            <div id="error" class="bloque__text-center alert alert-danger mtop col-md-12"></div>

            <input id="button" class="boton btn-blue__item" type="submit" value="Enviar Formulario" />

          </form>

        </div>
```




**Made by** [@jorgerepossi](https://github.com/jorgerepossi/sp3cial)

**Online Version** [AutoSpecial - Cotizador ](https://www.autospecial.com.ar/cotizador/)

copyright © 2020 Jo Repossi [@jorgerepossi](https://github.com/jorgerepossi/sp3cial) 