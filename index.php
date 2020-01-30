<!DOCTYPE html>
<html lang="es-AR" itemscope="itemscope" itemtype="http://schema.org/WebPage"
  xmlns:og="http://opengraphprotocol.org/schema/" class="">

<head profile="http://gmpg.org/xfn/11">
  <meta name="robots" content="index,follow">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cotizador - Auto Special </title>
  <script src="/js/jquery.3.2.1.js"></script>
  <script type="text/javascript" src="/js/funciones.js"></script>
  <script src="/js/menu.js"></script>
  <?php $random = rand(0, 999999999999); ?>
  <link rel="stylesheet"
    href="/css/estilos.css?v=<?php echo $random; ?>">
  <!-- Latest compiled and minified CSS-->
  <link rel="stylesheet" href="css/owl.theme.default.css">
  <link rel="stylesheet" href="/css/bootstrap.css">
  <link rel="stylesheet" href="cotizador.css">
  <link rel="shortcut icon" type="image/x-icon"
    href="https://www.ford.com.ar/etc/designs/guxfoap/clientlibs/guxfoap/img/favicon.ico">
  <!-- Facebook Pixel Code -->
  <script>
    ! function(f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function() {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window,
      document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '344731482542933'); // Insert your pixel ID here.
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=344731482542933&ev=PageView&noscript=1" /></noscript>
  <!-- DO NOT MODIFY -->
  <!-- End Facebook Pixel Code -->
</head>

<body>

  <?php include '../header.php'; ?>

  <section id="main" class="col-md-12 col-xs-12 col-lg-12">

    <div class="container">
      <div class="innerMainUsados">
        <div class="hardTitle">
          <h2>Cotizador</h2>
        </div>
        <img src="cotizador.jpg" alt="" class="img-responsive">
        <div id="infoFichaUsados" class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
          <div class="col-md-1 col-sm-12 col-xs-12"></div>
          <div id="cotizacionInfo" class="col-md-10 col-lg-10 col-xs-12 nopadding">
            <h2>PAGALO EN <strong>CUOTAS SIN INTERÉS</strong> <span> <strong>CON ó SIN ANTICIPO </strong> </span> </h2>
            <ul>
              <li>
                <p>BONIFICACIÓN $250.000</p>
              </li>
              <li>
                <p>Tomamos tu usado</p>
              </li>
              <li>
                <p>Tomamos tu plan caído</p>
              </li>
            </ul>
            <div class="itemContenido">

              <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 nopadding">
                <h2> CALCULÁ AHORA EL VALOR DE LA CUOTA </h2>
              </div>

              <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 nopadding">
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                  <img src="ka.jpg" alt="" class="img-responsive"></div>
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                  <img src="kaplus.jpg" alt="" class="img-responsive"></div>
              </div>

              <div class="col-md-12 nopadding">
                <p style="margin-top: 20px"><small>
                    Los valor de las cuotas expresadas corresponden a la cuota pura, sin gastos administrativos ni
                    seguro.
                  </small>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-1 col-sm-12 col-xs-12"></div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
          <form id="invitacion" name="invitacion" method="post" action="autospecial.php" autocomplete="off"
            onsubmit="enviar();return false;">
            <h2>COMPLETÁ EL FORMULARIO
              Y CALCULÁ EL VALOR DE TU CUOTA</h2>
            <div id="userFormData">

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
            <div class="form-group">
              <select name="modelo" id="valorDelAuto" class="inputCiudad form-control" required>
                <option selected name="modelo"> Modelo de interés</option>

                <option name="Ford Ka" data-valor="835939">Ford Ka</option>
                <option name="Ford Ka+" data-valor="833578">Ford Ka+</option>
              </select>

            </div>

            <!-- Anticipo -->

            <div class="form-group anticipoUsado col-md-12 col-xs-12">

              <div class="col-xs-12 col-md-12 nopadding">
                <p class="text-center">¿Entrega anticipo? </p>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 nopadding">
                <label for="showInfo">
                  <p class="conanticipo btn">Con anticipo</p>
                  <input type="radio" name="anticipo" value="si" id="showInfo">
                </label>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 nopadding">
                <label for="showInfoNo">
                  <p class="sinanticipo btn">Sin anticipo</p>
                  <input type="radio" name="anticipo" value="no" id="showInfoNo">
                </label>
              </div>
            </div>

            <!-- Fin Anticipo -->




            <div class="anticipoSection col-md-12 col-xs-12">
              <label for="">

                <p><span id="anticipo"> 0 </span> </p>
                <input id="range" type="range" value="0" min="50000" max="600000" step="100" name="anticipoAgregado">
                <p class="left"></p>
                <p class="right"></p>
              </label>
            </div>



            <!-- Usado -->

            <div class="form-group anticipoUsado col-md-12 col-xs-12">

              <div class="col-xs-12 col-md-12 nopadding">
                <p class="text-center">¿Entrega usado? </p>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 nopadding">
                <label for="showInfo">
                  <p class="conanticipo btn">Si</p>
                  <input type="radio" name="anticipo" value="si" id="showInfo">
                </label>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 nopadding">
                <label for="showInfoNo">
                  <p class="sinanticipo btn">No</p>
                  <input type="radio" name="anticipo" value="no" id="showInfoNo">
                </label>
              </div>
            </div>

            <div class="form-group anticipoUsado col-md-12 col-xs-12">

              <div class="col-xs-12 col-md-12 nopadding">
                <p class="text-center">Modelo</p>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 nopadding">
                <label for="showInfo">
                  <p class="conanticipo btn">Año</p>
                  <input type="text" name="anticipo" value="si" id="showInfo">
                </label>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 nopadding">
                <label for="showInfoNo">
                  <p class="sinanticipo btn">Modelo</p>
                  <input type="text" name="anticipo" value="no" id="showInfoNo">
                </label>
              </div>
            </div>





            <!-- Fin Usado -->


            <input type="hidden" name="modeloSeleccionado" id="modeloSeleccionado" value="">
            <input type="hidden" name="anticipoSeleccionado" id="anticipoSeleccionado" value="">
            <input type="hidden" name="rangoSeleccionado" id="rangoSeleccionado" value="">
            <input type="hidden" name="cuotasAPagarDe" id="cuotasAPagarDe" value="">


            <button id="calcular" class="boton btn-blue__item" type="submit">Calcular Cuota </button>
            <div class="resultado"></div>
            <div id="error" class="text-center alert alert-danger mtop col-md-12"></div>

            <button id="button" class="boton btn-blue__item" type="submit">recibí mas info </button>

          </form>

        </div>
      </div>
    </div>
    <?php include '../footer.php'; ?>

  </section>

  <script src="cotizador.js"></script>

</body>

</html>