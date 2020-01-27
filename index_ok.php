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
      fbq('track', 'CompleteRegistration');
   </script>
   <noscript><img height="1" width="1" style="display:none"
         src="https://www.facebook.com/tr?id=344731482542933&ev=PageView&noscript=1" /></noscript>
   <!-- DO NOT MODIFY -->
   <!-- End Facebook Pixel Code -->



   <!-- Global site tag (gtag.js) - Google Ads: 777721961 -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=AW-777721961"></script>
   <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
         dataLayer.push(arguments);
      }
      gtag('js', new Date());

      gtag('config', 'AW-777721961');
   </script>
   <!-- Event snippet for Special conversion page -->
   <script>
      gtag('event', 'conversion', {
         'send_to': 'AW-777721961/0LiCCKCx8ZABEOmw7PIC'
      });
   </script>
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
                <p>BONIFICACIÓN $98.000</p>
              </li>
              <li>
                <p>Tomamos tu usado</p>
              </li>
              <li>
                <p>Patentamiento bonificado</p>
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

              <div class="col-md-12 nopadding" >
              <small>
              Las valor de lascuotas expresadas corresponden a la cuota pura, sin gastos administrativos ni seguro. 
              </small>
              </div>
            </div>
          </div>
          <div class="col-md-1 col-sm-12 col-xs-12"></div>
        </div>
        <div  class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
          <div id="invitacion" class="col-sm-12 col-xs-12 col-md-12" > 
            <h2>¡Muchas Gracias!</h2>
        <p>Sus datos fueron enviados correctamente. <br>
        Nos estaremos comunicando a la brevedad con usted.</p> </div>
        
        </div>
      </div>
    </div>
    <?php include '../footer.php'; ?>

  </section>

  <script src="cotizador.js"></script>

</body>

</html>