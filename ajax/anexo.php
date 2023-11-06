<?php
include '../db_connect.php';
include_once '../phpmailer/PHPMailerAutoload.php'; //LIVRARIA PHPMAILER

if(isset($_FILES["file"]["name"]) && $_FILES["file"]["name"] != '') {

	$coninha = $_POST['teste'];
	$_SESSION['teste'] = $coninha;

	$existe = "../anexos/utilizadores/".$_SESSION['user'][0]."";
	if (!is_dir($existe)) {
		mkdir(''.$existe.'', 0777, true);
	}
	$targetPath = "anexos/utilizadores/".$_SESSION['user'][0]."/".$_FILES["file"]["name"]; 

	$caminho = "../anexos/utilizadores/".$_SESSION['user'][0]."/".$_FILES["file"]["name"]; 

	move_uploaded_file($_FILES["file"]["tmp_name"], $caminho);    

	mysqli_query($link, "UPDATE projetos SET anexo='$targetPath' WHERE id_projeto='".$_SESSION['user'][1]."'") or die(mysqli_error($link));


	$nome = $_SESSION['data_ajax'][0];
	$apelido = $_SESSION['data_ajax'][1];
	$email = $_SESSION['data_ajax'][2];
	$cidade = $_SESSION['data_ajax'][3];
	$pass_gerada = $_SESSION['data_ajax'][4];
	$descricao = $_SESSION['data_ajax'][5];
	$gasto = $_SESSION['data_ajax'][6];
  $data = $_SESSION['data_ajax'][7];
  $telefone = $_SESSION['data_ajax'][8];


	$mail = new PHPMailer;
	$mail->isSMTP();                            // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                     // Enable SMTP authentication
	$mail->Username = 'lifepageshop123@gmail.com'; // your email id
	$mail->Password = 'flash136'; // your password
	$mail->SMTPSecure = 'tls';                  
	$mail->Port = 587;     //587 is used for Outgoing Mail (SMTP) Server.
	$mail->setFrom('lifepageshop123@gmail.com', 'I9');
	$mail->addAddress($email);   // Add a recipient
  $mail->addAddress('gabrielvicent98@gmail.com');
	$mail->isHTML(true);  // Set email format to HTML
	$mail->AddAttachment($caminho);

	$bodyContent = "<!DOCTYPE HTML PUBLIC '-//W3C//DTD XHTML 1.0 Transitional //EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'><head>
    <!--[if gte mso 9]><xml>
     <o:OfficeDocumentSettings>
      <o:AllowPNG/>
      <o:PixelsPerInch>96</o:PixelsPerInch>
     </o:OfficeDocumentSettings>
    </xml><![endif]-->
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <meta name='viewport' content='width=device-width'>
    <!--[if !mso]><!--><meta http-equiv='X-UA-Compatible' content='IE=edge'><!--<![endif]-->
    <title></title>
    
    
    <style type='text/css' id='media-query'>
      body {
  margin: 0;
  padding: 0; }

table, tr, td {
  vertical-align: top;
  border-collapse: collapse; }

.ie-browser table, .mso-container table {
  table-layout: fixed; }

* {
  line-height: inherit; }

a[x-apple-data-detectors=true] {
  color: inherit !important;
  text-decoration: none !important; }

[owa] .img-container div, [owa] .img-container button {
  display: block !important; }

[owa] .fullwidth button {
  width: 100% !important; }

[owa] .block-grid .col {
  display: table-cell;
  float: none !important;
  vertical-align: top; }

.ie-browser .num12, .ie-browser .block-grid, [owa] .num12, [owa] .block-grid {
  width: 600px !important; }

.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
  line-height: 100%; }

.ie-browser .mixed-two-up .num4, [owa] .mixed-two-up .num4 {
  width: 200px !important; }

.ie-browser .mixed-two-up .num8, [owa] .mixed-two-up .num8 {
  width: 400px !important; }

.ie-browser .block-grid.two-up .col, [owa] .block-grid.two-up .col {
  width: 300px !important; }

.ie-browser .block-grid.three-up .col, [owa] .block-grid.three-up .col {
  width: 200px !important; }

.ie-browser .block-grid.four-up .col, [owa] .block-grid.four-up .col {
  width: 150px !important; }

.ie-browser .block-grid.five-up .col, [owa] .block-grid.five-up .col {
  width: 120px !important; }

.ie-browser .block-grid.six-up .col, [owa] .block-grid.six-up .col {
  width: 100px !important; }

.ie-browser .block-grid.seven-up .col, [owa] .block-grid.seven-up .col {
  width: 85px !important; }

.ie-browser .block-grid.eight-up .col, [owa] .block-grid.eight-up .col {
  width: 75px !important; }

.ie-browser .block-grid.nine-up .col, [owa] .block-grid.nine-up .col {
  width: 66px !important; }

.ie-browser .block-grid.ten-up .col, [owa] .block-grid.ten-up .col {
  width: 60px !important; }

.ie-browser .block-grid.eleven-up .col, [owa] .block-grid.eleven-up .col {
  width: 54px !important; }

.ie-browser .block-grid.twelve-up .col, [owa] .block-grid.twelve-up .col {
  width: 50px !important; }

@media only screen and (min-width: 620px) {
  .block-grid {
    width: 600px !important; }
  .block-grid .col {
    vertical-align: top; }
    .block-grid .col.num12 {
      width: 600px !important; }
  .block-grid.mixed-two-up .col.num4 {
    width: 200px !important; }
  .block-grid.mixed-two-up .col.num8 {
    width: 400px !important; }
  .block-grid.two-up .col {
    width: 300px !important; }
  .block-grid.three-up .col {
    width: 200px !important; }
  .block-grid.four-up .col {
    width: 150px !important; }
  .block-grid.five-up .col {
    width: 120px !important; }
  .block-grid.six-up .col {
    width: 100px !important; }
  .block-grid.seven-up .col {
    width: 85px !important; }
  .block-grid.eight-up .col {
    width: 75px !important; }
  .block-grid.nine-up .col {
    width: 66px !important; }
  .block-grid.ten-up .col {
    width: 60px !important; }
  .block-grid.eleven-up .col {
    width: 54px !important; }
  .block-grid.twelve-up .col {
    width: 50px !important; } }

@media (max-width: 620px) {
  .block-grid, .col {
    min-width: 320px !important;
    max-width: 100% !important;
    display: block !important; }
  .block-grid {
    width: calc(100% - 40px) !important; }
  .col {
    width: 100% !important; }
    .col > div {
      margin: 0 auto; }
  img.fullwidth, img.fullwidthOnMobile {
    max-width: 100% !important; }
  .no-stack .col {
    min-width: 0 !important;
    display: table-cell !important; }
  .no-stack.two-up .col {
    width: 50% !important; }
  .no-stack.mixed-two-up .col.num4 {
    width: 33% !important; }
  .no-stack.mixed-two-up .col.num8 {
    width: 66% !important; }
  .no-stack.three-up .col.num4 {
    width: 33% !important; }
  .no-stack.four-up .col.num3 {
    width: 25% !important; }
  .mobile_hide {
    min-height: 0px;
    max-height: 0px;
    max-width: 0px;
    display: none;
    overflow: hidden;
    font-size: 0px; } }

    </style>
</head>
<body class='clean-body' style='margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #B8CCE2'>
  <style type='text/css' id='media-query-bodytag'>
    @media (max-width: 520px) {
      .block-grid {
        min-width: 320px!important;
        max-width: 100%!important;
        width: 100%!important;
        display: block!important;
      }

      .col {
        min-width: 320px!important;
        max-width: 100%!important;
        width: 100%!important;
        display: block!important;
      }

        .col > div {
          margin: 0 auto;
        }

      img.fullwidth {
        max-width: 100%!important;
      }
			img.fullwidthOnMobile {
        max-width: 100%!important;
      }
      .no-stack .col {
				min-width: 0!important;
				display: table-cell!important;
			}
			.no-stack.two-up .col {
				width: 50%!important;
			}
			.no-stack.mixed-two-up .col.num4 {
				width: 33%!important;
			}
			.no-stack.mixed-two-up .col.num8 {
				width: 66%!important;
			}
			.no-stack.three-up .col.num4 {
				width: 33%!important;
			}
			.no-stack.four-up .col.num3 {
				width: 25%!important;
			}
      .mobile_hide {
        min-height: 0px!important;
        max-height: 0px!important;
        max-width: 0px!important;
        display: none!important;
        overflow: hidden!important;
        font-size: 0px!important;
      }
    }
  </style>
  <!--[if IE]><div class='ie-browser'><![endif]-->
  <!--[if mso]><div class='mso-container'><![endif]-->
  <table class='nl-container' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #B8CCE2;width: 100%' cellpadding='0' cellspacing='0'>
	<tbody>
	<tr style='vertical-align: top'>
		<td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
    <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td align='center' style='background-color: #B8CCE2;'><![endif]-->

    <div style='background-color:transparent;'>
      <div style='Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;' class='block-grid '>
        <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
          <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='background-color:transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width: 600px;'><tr class='layout-full-width' style='background-color:transparent;'><![endif]-->

              <!--[if (mso)|(IE)]><td align='center' width='600' style=' width:600px; padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><![endif]-->
            <div class='col num12' style='min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;'>
              <div style='background-color: transparent; width: 100% !important;'>
              <!--[if (!mso)&(!IE)]><!--><div style='border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;'><!--<![endif]-->

                  
                    
<table border='0' cellpadding='0' cellspacing='0' width='100%' class='divider mobile_hide' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%'>
    <tbody>
        <tr style='vertical-align: top'>
            <td class='divider_inner' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-right: 5px;padding-left: 5px;padding-top: 5px;padding-bottom: 5px;min-width: 100%;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%'>
                <table class='divider_content' height='40px' align='center' border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 0px solid transparent;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%'>
                    <tbody>
                        <tr style='vertical-align: top'>
                            <td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 40px;line-height: 40px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%'>
                                <span>&#160;</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>
    <div style='background-color:transparent;'>
      <div style='Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #b62125;' class='block-grid '>
        <div style='border-collapse: collapse;display: table;width: 100%;background-color:#b62125;'>
          <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='background-color:transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width: 600px;'><tr class='layout-full-width' style='background-color:#b62125;'><![endif]-->

              <!--[if (mso)|(IE)]><td align='center' width='600' style=' width:600px; padding-right: 0px; padding-left: 20px; padding-top:5px; padding-bottom:5px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><![endif]-->
            <div class='col num12' style='min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;'>
              <div style='background-color: transparent; width: 100% !important;'>
              <!--[if (!mso)&(!IE)]><!--><div style='border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 20px;'><!--<![endif]-->

                  
                    <div align='left' class='img-container left  autowidth  ' style='padding-right: 25px;  padding-left: 25px;'>
<!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr style='line-height:0px;line-height:0px;'><td style='padding-right: 25px; padding-left: 25px;' align='left'><![endif]-->
<div style='line-height:25px;font-size:1px'>&#160;</div>  <a href='http://www.inoverso.com/index.php' target='_blank'>
    <img class='left  autowidth ' align='left' border='0' src='http://www.inoverso.com/logo_white_small.png' alt='Image' title='Image' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;width: 100%;max-width: 50px' width='50'>
  </a>
<div style='line-height:25px;font-size:1px'>&#160;</div><!--[if mso]></td></tr></table><![endif]-->
</div>

                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>
    <div style='background-color:transparent;'>
      <div style='Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #FFFFFF;' class='block-grid '>
        <div style='border-collapse: collapse;display: table;width: 100%;background-color:#FFFFFF;'>
          <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='background-color:transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width: 600px;'><tr class='layout-full-width' style='background-color:#FFFFFF;'><![endif]-->

              <!--[if (mso)|(IE)]><td align='center' width='600' style=' width:600px; padding-right: 35px; padding-left: 35px; padding-top:35px; padding-bottom:40px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><![endif]-->
            <div class='col num12' style='min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;'>
              <div style='background-color: transparent; width: 100% !important;'>
              <!--[if (!mso)&(!IE)]><!--><div style='border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:35px; padding-bottom:40px; padding-right: 35px; padding-left: 35px;'><!--<![endif]-->

                  
                    <div class=''>
	<!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;'><![endif]-->
	<div style='color:#132F40;font-family:'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif;line-height:120%; padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px;'>	
		<div style='font-size:12px;line-height:14px;color:#132F40;font-family:'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;'><p style='margin: 0;font-size: 14px;line-height: 17px'><span style='font-size: 22px; line-height: 26px;'>Olá&#160;<strong>". $nome." ".$apelido."</strong>, projeto enviado!</span></p></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
                  
                    <div class=''>
	<!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 10px; padding-top: 5px; padding-bottom: 30px;'><![endif]-->
	<div style='color:#555555;font-family:'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif;line-height:150%; padding-right: 10px; padding-left: 10px; padding-top: 5px; padding-bottom: 30px;'>	
		<div style='font-size:12px;line-height:18px;color:#555555;font-family:'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;'><p style='margin: 0;font-size: 14px;line-height: 21px'>O seu projeto foi enviado. Foi criada uma conta, onde pode acompanhar o seu projeto em tempo real.</p></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
                  
                    <div align='center' class='img-container center fixedwidth ' style='padding-right: 0px;  padding-left: 0px;'>
<!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr style='line-height:0px;line-height:0px;'><td style='padding-right: 0px; padding-left: 0px;' align='center'><![endif]-->
  <img class='center fixedwidth' align='center' border='0' src='https://d1oco4z2z1fhwp.cloudfront.net/templates/default/271/illo.png' alt='Image' title='Image' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: 0;height: auto;float: none;width: 100%;max-width: 530px' width='530'>
<!--[if mso]></td></tr></table><![endif]-->
</div>

                  
                  
                    <div class=''>
	<!--[if mso]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='padding-right: 10px; padding-left: 10px; padding-top: 20px; padding-bottom: 10px;'><![endif]-->
	<div style='color:#555555;font-family:'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif;line-height:120%; padding-right: 10px; padding-left: 10px; padding-top: 20px; padding-bottom: 10px;'>	
		<div style='line-height:14px;font-size:12px;color:#555555;font-family:'Cabin', Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;'><p style='margin: 0;line-height: 14px;font-size: 12px'><span style='font-size: 16px; line-height: 19px;'>".$_SESSION['mensagem']."<br> O anexo enviado encontra-se abaixo</span></p></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>
    <div style='background-image:url('https://d1oco4z2z1fhwp.cloudfront.net/templates/default/271/bg_password.gif');background-position:top center;background-repeat:no-repeat;;background-color:transparent'>
      <div style='Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;' class='block-grid  no-stack'>
        <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
          <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='background-image:url('https://d1oco4z2z1fhwp.cloudfront.net/templates/default/271/bg_password.gif');background-position:top center;background-repeat:no-repeat;;background-color:transparent' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width: 600px;'><tr class='layout-full-width' style='background-color:transparent;'><![endif]-->

              <!--[if (mso)|(IE)]><td align='center' width='600' style=' width:600px; padding-right: 35px; padding-left: 35px; padding-top:15px; padding-bottom:2px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><![endif]-->
            <div class='col num12' style='min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;'>
              <div style='background-color: transparent; width: 100% !important;'>
              <!--[if (!mso)&(!IE)]><!--><div style='border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:15px; padding-bottom:2px; padding-right: 35px; padding-left: 35px;'><!--<![endif]-->

                  
                    
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
                  
                    


                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>
    <div style='background-color:transparent;'>
      
              <!--[if (mso)|(IE)]></td><td align='center' width='300' style=' width:300px; padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><![endif]-->
            <div class='col num6' style='max-width: 320px;min-width: 300px;display: table-cell;vertical-align: top;'>
              <div style='background-color: transparent; width: 100% !important;'>
              <!--[if (!mso)&(!IE)]><!--><div style='border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'><!--<![endif]-->

                  
                    
<div align='right' style='padding-right: 35px; padding-left: 10px; padding-bottom: 10px;' class=''>
  <div style='line-height:20px;font-size:1px'>&#160;</div>
  <div style='display: table; max-width:196px;'>
  <!--[if (mso)|(IE)]><table width='151' cellpadding='0' cellspacing='0' border='0'><tr><td style='border-collapse:collapse; padding-right: 35px; padding-left: 10px; padding-bottom: 10px;'  align='right'><table width='100%' cellpadding='0' cellspacing='0' border='0' style='border-collapse:collapse; mso-table-lspace: 0pt;mso-table-rspace: 0pt; width:151px;'><tr><td width='32' style='width:32px; padding-right: 10px;' valign='top'><![endif]-->
    <table align='left' border='0' cellspacing='0' cellpadding='0' width='32' height='32' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;Margin-right: 10px'>
      <tbody><tr style='vertical-align: top'><td align='left' valign='middle' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
        <a href='https://www.facebook.com/' title='Facebook' target='_blank'>
          <img src='images/facebook@2x.png' alt='Facebook' title='Facebook' width='32' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important'>
        </a>
      <div style='line-height:5px;font-size:1px'>&#160;</div>
      </td></tr>
    </tbody></table>
      <!--[if (mso)|(IE)]></td><td width='32' style='width:32px; padding-right: 10px;' valign='top'><![endif]-->
    <table align='left' border='0' cellspacing='0' cellpadding='0' width='32' height='32' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;Margin-right: 10px'>
      <tbody><tr style='vertical-align: top'><td align='left' valign='middle' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
        <a href='https://twitter.com/' title='Twitter' target='_blank'>
          <img src='images/twitter@2x.png' alt='Twitter' title='Twitter' width='32' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important'>
        </a>
      <div style='line-height:5px;font-size:1px'>&#160;</div>
      </td></tr>
    </tbody></table>
      <!--[if (mso)|(IE)]></td><td width='32' style='width:32px; padding-right: 0;' valign='top'><![endif]-->
    <table align='left' border='0' cellspacing='0' cellpadding='0' width='32' height='32' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;Margin-right: 0'>
      <tbody><tr style='vertical-align: top'><td align='left' valign='middle' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top'>
        <a href='https://instagram.com/' title='Instagram' target='_blank'>
          <img src='images/instagram@2x.png' alt='Instagram' title='Instagram' width='32' style='outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important'>
        </a>
      <div style='line-height:5px;font-size:1px'>&#160;</div>
      </td></tr>
    </tbody></table>
    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
  </div>
</div>
                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>
    <div style='background-color:transparent;'>
      <div style='Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;' class='block-grid '>
        <div style='border-collapse: collapse;display: table;width: 100%;background-color:transparent;'>
          <!--[if (mso)|(IE)]><table width='100%' cellpadding='0' cellspacing='0' border='0'><tr><td style='background-color:transparent;' align='center'><table cellpadding='0' cellspacing='0' border='0' style='width: 600px;'><tr class='layout-full-width' style='background-color:transparent;'><![endif]-->

              <!--[if (mso)|(IE)]><td align='center' width='600' style=' width:600px; padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;' valign='top'><![endif]-->
            <div class='col num12' style='min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;'>
              <div style='background-color: transparent; width: 100% !important;'>
              <!--[if (!mso)&(!IE)]><!--><div style='border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;'><!--<![endif]-->

                  
                    
<table border='0' cellpadding='0' cellspacing='0' width='100%' class='divider ' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%'>
    <tbody>
        <tr style='vertical-align: top'>
            <td class='divider_inner' style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-right: 5px;padding-left: 5px;padding-top: 5px;padding-bottom: 5px;min-width: 100%;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%'>
                <table class='divider_content' height='30px' align='center' border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 0px solid transparent;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%'>
                    <tbody>
                        <tr style='vertical-align: top'>
                            <td style='word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 30px;line-height: 30px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%'>
                                <span>&#160;</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>
   <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
		</td>
  </tr>
  </tbody>
  </table>
  <!--[if (mso)|(IE)]></div><![endif]-->


</body></html>";
	$mail->Subject = 'I9 - Projeto Enviado';
	$mail->Body    = $bodyContent;
	if(!$mail->send()) {

	} else {
		
	}

}

?>