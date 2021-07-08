<?php
require "conexion.php";
session_start();

if(!isset($_SESSION["usuario"])){
  header("Location: ../index.php"); 
}

$nombre_apellido = $_SESSION['nombre_apellido'];
$tipo_usuario = $_SESSION["tipo_usuario"];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

    

       if(isset($_POST['enviar_form_email'])) {

            if(!empty($_POST['fecha_i']) && !empty($_POST['nombre_apellido_p']) && !empty($_POST['documento_p']) && !empty($_POST['obra_social_p']) && !empty($_POST['servicio_p'])){

                $fecha_i = $_POST["fecha_i"];
                $nombre_apellido_p = utf8_decode($_POST["nombre_apellido_p"]);
                $documento_p = $_POST["documento_p"];
                $nro_afiliado_p = $_POST["nro_afiliado_p"];
                $obra_social_p = utf8_decode($_POST["obra_social_p"]);
                $servicio_p = utf8_decode($_POST["servicio_p"]);
                $observaciones_p = utf8_decode($_POST["observaciones_p"]);

                $query = "INSERT INTO email (obra_social_p, fecha_i, nombre_apellido_p, documento_p, nro_afiliado_p, servicio_p, observaciones_p) VALUES ('$obra_social_p', '$fecha_i', '$nombre_apellido_p', '$documento_p', '$nro_afiliado_p', '$servicio_p', '$observaciones_p') ";

                $result = mysqli_query($conn, $query);

                //nombre de OS para email para
                $query_os = "SELECT * FROM obra_social WHERE id_os = '$obra_social_p'" ;
                $result_os = mysqli_query($conn, $query_os);

                while($row_os = $result_os->fetch_assoc()){
                   
                     $id_os_email = $row_os["id_os"];
                     $nombre_os_email = utf8_decode($row_os["nombre_os"]);
                     $email_os_email = utf8_decode($row_os["email_os"]);
                    
                }   

                    $date = $fecha_i;
                    $nuevoDate = date("d-m-Y", strtotime($date));

            }

require 'PhpMailer/Exception.php';
require 'PhpMailer/PHPMailer.php';
require 'PhpMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'admision.facturacion.hospital@unlar.edu.ar';                     //SMTP username
    $mail->Password   = 'Patri.hospi21';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail­->CharSet = "UTF­8";
    


    //Recipients
    $mail->setFrom('admision.facturacion.hospital@unlar.edu.ar', utf8_decode('Hospital de Clínicas VMF - UNLaR')); // desde donde se va a enviar el email
    $mail->addAddress($email_os_email); 
    //$mail->addAddress('lic.jose.a.chavez@gmail.com', $nombre);    // destinatario - 2do email - Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional - enviar a otros corros
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $asunto = "Ingreso al internado del Hospital de Clínicas | Vírgen María de Fátima - UNLaR ";

    $html = '
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="utf-8">
            <title>Ingreso de paciente - HDC</title>
            <style type="text/css">
            .clearfix:after {
                content: "";
                display: table;
                clear: both;
              }
              
              a {
                color: #5d6975;
                text-decoration: underline;
              }
              
              body {
                position: relative;
                width: 15cm;
                height: 15cm;
                margin: 0 auto;
                color: #001028;
                background: #ffffff;
                font-family: Arial, sans-serif;
                font-size: 12px;
                font-family: Arial;
              }
              
              header {
                padding: 5px 0;
                margin-bottom: 8px;
                margin-top: 8px;
              }
              
              #logo {
                width: 100px;
                text-align: center;
                margin-bottom: 3px;
              }
              #logo2 {
                width: 200px;
                text-align: center;
                margin-bottom: 5px;
              }
              #logo2 img {
                width: 100px;
                margin-top: 1px;
              }
              
              #logo img {
                width: 100px;
                margin-top: 5px;
              }
              
              h1 {
                border-top: 1px solid #5d6975;
                border-bottom: 1px solid #5d6975;
                color: #5d6975;
                font-size: 2.2em;
                line-height: 1.4em;
                font-weight: normal;
                text-align: center;
                margin: 0 0 5px 0;
                background: url("https://i.imgur.com/U0XkECS.png");
              }
              
              h3 {
                margin-bottom: 5px;
                margin-top: 5px;
              }
              h4 {
                margin-bottom: 4px;
                margin-top: 4px;
                text-align: right;
              }
              
              span {
                color: #5d6975;
                text-align: center;
                width: 100%;
              
                font-size: 0.8em;
              }
              
              #project {
                float: left;
              }
              
              #project span {
                color: #5d6975;
                text-align: right;
                width: 52px;
                margin-right: 10px;
                display: inline-block;
                font-size: 0.8em;
              }
              
              #company {
                float: right;
                text-align: right;
              }
              
              #project div,
              #company div {
                white-space: nowrap;
              }
              
              table {
                width: 100%;
                border-collapse: collapse;
                border-spacing: 0;
                margin-bottom: 20px;
              }
              
              table tr:nth-child(2n-1) td {
                background: #f5f5f5;
              }
              
              table th,
              table td {
                text-align: left;
              }
              
              table th {
                padding: 5px 10px;
                color: #5d6975;
                border-bottom: 1px solid #c1ced9;
                white-space: nowrap;
                font-weight: normal;
              }
              
              table .service,
              table .desc {
                text-align: left;
                font-size: 1.5em;
              }
              
              table td {
                padding: 7px;
                text-align: left;
              }
              
              table td.service,
              table td.desc {
                vertical-align: top;
              }
              
              table td.unit,
              table td.qty,
              table td.total {
                font-size: 1.2em;
              }
              
              table td.grand {
                border-top: 1px solid #5d6975;
              }
              
              #notices .notice {
                color: #5d6975;
                font-size: 1.2em;
              }
              
              footer {
                color: #5d6975;
                width: 100%;
                height: 30px;
                position: absolute;
                bottom: 0;
                border-top: 1px solid #c1ced9;
                padding: 8px 0;
                text-align: center;
              }
            </style>
        </head>
        <body>
            <div id="logo">
                <img src="https://i.imgur.com/Cj6FN40.png" style="width=75px">
            </div>

            <!-- <div id="company" class="clearfix">
                <div>Company Name</div>
                <div>455 Foggy Heights,<br /> AZ 85004, US</div>
                <div>(602) 519-0450</div>
                <div><a href="mailto:company@example.com">company@example.com</a></div>
            </div> -->
            <header class="clearfix">
            <h1>Paciente ingresado</h1>
            </header>
            <main>
            <br><br>
            <table>
                <tr>';
                $html.=' 
                <tr>
                <td class="desc"><u>Fecha de ingreso:</u><b> '.$nuevoDate.'</b></td>
                </tr>
                
                <tr>
                <td class="desc"><u>Servicio:</u><b> '.$servicio_p.'</b></td>
                
                </tr>

                <tr>
                <td class="desc"><u>Apellido y Nombre:</u><b> '.$nombre_apellido_p.'</b></td>
                </tr>

                <tr>
                <td class="desc"><u>Documento:</u><b> '.$documento_p.'</b></td>  
                </tr>
                
                <tr>
                <td class="desc"><u>Obra Social:</u><b> '.$nombre_os_email.'</b></td>
                </tr>
                <tr>
                <td class="desc"><u>Nro de afiliado:</u><b> '.$nro_afiliado_p.'</b></td>
                </tr>

                <tr>
                <td class="desc"><u>Observaciones:</u><b> '.$observaciones_p.'</b></td>
                </tr>
                
                </tr>';
                $html.='
            </table>
              <br>
            <div id="footer">
                
                <div class="notice">Secretar&iacute;a Administrativa - HDC<br>
                <p>No es SPAM. Mover a carpeta Principal / Bandeja de Entrada </p>
                <a href="mailto:admision.facturacion.hospital@unlar.edu.ar">Contacto</a>
                
                </div>
            </div>
            </main>
        </body>
        </html> '; 

    $mail->Subject = utf8_decode($asunto);
    
    $mail->Body = $html;

    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo'<script type="text/javascript">
                  alert("Email enviado exitosamente.-");
                  window.location.href="/emails_os/php/enviar_email_os.php";
                  </script>';
} catch (Exception $e) {
    echo"<script type='text/javascript'>
                  alert('Error al enviar mensaje: {$mail->ErrorInfo}');
                  window.location.href='/emails_os/php/enviar_email_os.php';
                  </script>";

    //echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
}


        }
?>