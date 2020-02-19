<?php 
$email2_asunto = "AutoSpecial - Cotizador";
$archivo_html = "envio_datos.html";

function validar_email($email) {
    $mail_correcto = false;
    //compruebo unas cosas primeras
    if ((strlen($email) >= 6) && (substr_count($email, "@") == 1) && (substr($email, 0, 1) != "@") && (substr($email, strlen($email) - 1, 1) != "@")) {
        if ((!strstr($email, "'")) && (!strstr($email, "\"")) && (!strstr($email, "\\")) && (!strstr($email, "\$")) && (!strstr($email, " "))) {
            //miro si tiene caracter .
            if (substr_count($email, ".") >= 1) {
                //obtengo la terminacion del dominio
                $term_dom = substr(strrchr($email, '.'), 1);
                //compruebo que la terminaci�n del dominio sea correcta
                if (strlen($term_dom) > 1 && strlen($term_dom) < 5 && (!strstr($term_dom, "@"))) {
                    //compruebo que lo de antes del dominio sea correcto
                    $antes_dom = substr($email, 0, strlen($email) - strlen($term_dom) - 1);
                    $caracter_ult = substr($antes_dom, strlen($antes_dom) - 1, 1);
                    if ($caracter_ult != "@" && $caracter_ult != ".") {
                        $mail_correcto = true;
                    }
                }
            }
        }
    }
    if ($mail_correcto)
        return false;
    else
        return true;
}

if ($_POST["nombre"] == '' or $_POST["email"] == ''  or $_POST["telefono"]  == '' or $_POST["provincia"] == '') {
    ?>
<script>
    alert("Debe completar los campos requeridos")
</script>
<script>
    top.location.href = "index.html";
</script>;

<?
} elseif (validar_email($_POST["emai"])) {
    ?><script>
    alert("La dirección de email ingresada es incorrecta");
</script>
<script>
    top.location.href = "index.html";
</script>;<?
} else {
    $archivo = 'sp3k4mch47k4.csv';
    if (file_exists($archivo)) {
        $contenido = file_get_contents($archivo);
    }

    if (is_array($_POST))
        foreach ($_POST as $key => $value) {
            if (preg_match('/;/i', $_POST[$key]))
                $_POST[$key] = '"' . $_POST[$key] . '"';
        }

 @$fecha = date("Y-m-d H:i:s", time());
    $date = new DateTime($fecha, new DateTimeZone('America/Argentina/Buenos_Aires'));
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $zonahoraria = date_default_timezone_get();
    @$fecha=date("d/m/Y H:i:s", time());


    $contenido .= '
    ' . @$fecha . ';  ' . $_POST["nombre"] . ';  ' . $_POST["telefono"] . ';  ' . $_POST["email"] . ';  ' . $_POST["provincia"] . ';  ' . $_POST["modelo"] . ';  ' . $_POST["anticipo"].'; ' . $_POST["rangoSeleccionado"] . '; ' . $_POST["entregaUsado"] . ';  ' . $_POST["marca"] . ';  ' . $_POST["modelousado"] . ';  ' . $_POST["anio"] . ';  '.$_POST["planCaido"];
    




    $fp = fopen('sp3k4mch47k4.csv', "w+");
    fwrite($fp, $contenido);
    fclose($fp);

    require_once("phpmailer/class.phpmailer.php");

    $sitio = str_replace('www.', '', $_SERVER['HTTP_HOST']);

    //ENV�O EL EMAIL EN HTML
    //primero verifico que hayan cupos:


    $mail = new PHPMailer();

    $mail->Host = "localhost";



    //$mail->From = "cuponesdiaz@gmail.com";

    $mail->From = "info@autospecialdigital.com";

    $mail->FromName = "AutoSpecial";

    //$mail->AddReplyTo($_POST[email]);

    $mail->Subject = $email2_asunto;

    //$mail->AddAddress($_POST[email]);

    //$mail->AddAddress('cuponesautospecial@gmail.com', 'CRM-AUTOSPECIAL');
    //$mail->AddAddress('jorgerepossi1980@gmail.com','CRM-AUTOSPECIAL');






    $mail->IsHTML(true);





    //$contenido = file_get_contents($archivo_html);

    $contenido = '<html><body>';
    $contenido .= '<img src="http://www.autospecialdigital.com/graciasheader.jpg" alt="Datos del interesado" />';
    $contenido .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    $contenido .= '<tr style="background: #ccc;"><td><strong>Nombre:</strong> </td><td>' . strip_tags($_POST["nombre"]) . '</td></tr>';
    $contenido .= '<tr><td><strong>Teléfono:</strong> </td><td>' . strip_tags($_POST["telefono"]) . '</td></tr>';
    $contenido .= '<tr><td><strong>Email:</strong> </td><td>' . strip_tags($_POST["email"]) . '</td></tr>';
    $contenido .= '<tr><td><strong>Provincia:</strong> </td><td>' . strip_tags($_POST["provincia"]) . '</td></tr>';
    $contenido .= '<tr><td><strong>Modelo de interés:</strong> </td><td>' . strip_tags($_POST["modelo"]) . '</td></tr>';
    // $contenido .= "<tr><td><strong>Anticipo seleccionado:</strong> </td><td>" . strip_tags($_POST['anticipoSeleccionado']) . "</td></tr>";
    if($_POST["anticipoSeleccionado"] == 'si'){
    $contenido .= "<tr><td><strong>Anticipo:</strong> </td><td> $" . strip_tags($_POST['rangoSeleccionado']) . " ". strip_tags($_POST['cuotasAPagarDe'])."</td></tr>";
}else{
    $contenido .= "<tr><td><strong>Anticipo:</strong> </td><td> No posee anticipo ". strip_tags($_POST['cuotasAPagarDe'])."</td></tr>";
}
    $contenido .= "</body></html>";

    $mail->Body = $contenido;


    $mail->Send();




    $mail = new PHPMailer();
    $mail->Host = "localhost";

    //$mail->From = "cuponesdiaz@gmail.com";
    $mail->From = "info@autospecialdigital.com";
    $mail->FromName = "AutoSpecial";
    //$mail->AddReplyTo($_POST[email]);
    $mail->Subject = $email2_asunto;

$mail->AddAddress('cuponesautospecial@gmail.com', 'CRM-AUTOSPECIAL');
// $mail->AddAddress('wc+autospecial_Kamchatka@tecnom.cloud');
   
// $mail->AddAddress('jorgerepossi1980@gmail.com','CRM-AUTOSPECIAL');
    // $mail->AddAddress('sanchezjoseluis@gmail.com','CRM-AUTOTAG');
    //$mail->AddAddress('cuponesautotag@gmail.com','CRM-AUTOTAG');
    // $mail->AddAddress('cuponesdiaz@gmail.com','CRM-DIAZ');
    //$mail->AddAddress('sanchezjoseluis@gmail.com','CRM-DIAZ');
    //$mail->IsHTML(true);


    $contenido = '';

if ($_POST["anticipo"] == 'si'){
    $anticipo = "$".strip_tags($_POST['rangoSeleccionado']);
}else{
    $anticipo = "No posee anticipo ";
}

if ($_POST["planCaido"] == 'si' ){
    $plancaido = 'Posee un plan caído';
}else{
    $plancaido = 'No posee un plan caído';
}


if ($_POST["entregaUsado"] == 'si' ){
    $entregaUsado = $_POST["marca"] . '  ' . $_POST["modelousado"] . ' ' . $_POST["anio"] .'';
}else{
    $entregaUsado = 'No posee un Usado';
}


 $contenido .= "DATOS DEL INTERESADO:
Nombre: " . strip_tags($_POST['nombre']) . "
Email: " . strip_tags($_POST['email']) . "
Teléfono: " . strip_tags($_POST['telefono']) . "
Localidad: " . $_POST['provincia'] . "
Modelo de interés: " . strip_tags($_POST['modelo']) . "
Anticipo seleccionado: " . $anticipo ."
Entrega Usado: " . $entregaUsado ."
Plan caído: " . $plancaido ."


";


    $mail->Body = $contenido;
    $mail->Body .= '
<?ADF VERSION "1.0"?>
<?XML VERSION "1.0"?>
<adf>
<prospect>
<requestdate>' . date("Y-m-d") . 'T' . date("H:i:m") . '-08:00</requestdate>
<vehicle>
<year></year>
<make>Ford</make>
<model>' . strip_tags($_POST['modelo']) . '</model>
<comments>Planes anticipo</comments>
</vehicle>
<customer>
<contact>
<name part="first" type="individual">' . strip_tags($_POST['nombre']) . '</name>
<name part="last" type="individual"></name>
<email>' . strip_tags($_POST['email']) . '</email>
<phone type="phone">' . strip_tags($_POST['telefono']) . '</phone>
<phone type="cellphone"></phone>
<address type="home">
<city>' . $_POST['provincia'] . '</city>
</address>
</contact>
<comments> ' . $anticipo .' '.$entregaUsado.' '.$plancaido.'</comments>
</customer>

<vendor>
<vendorname>Planes</vendorname>
</vendor>
<provider>
<name>Facebook</name>
<service>Planes anticipo</service>
</provider>

</prospect>
</adf>';

    $mail->Send();


    header('location: index_ok.php');

    exit;
}
