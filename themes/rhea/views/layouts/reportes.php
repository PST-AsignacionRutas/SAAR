<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/imprimir.css" />

	<title>Reporte Solicitudes de Transporte</title>
</head>

<body>
<!--mpdf
 <htmlpageheader name="myheader">
 <table width="100%"><tr>
 <td width="100%"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/reportes.jpg"></td></tr>
 </table>
<table style="margin-left: 35%;">
<tr>
 <td>
 <center>
  Universidad Nacional Experimental Sur del Lago<br />
"Jesús María Semprum"<br />
<b>SECRETARIA GENERAL</b> <br />
COORDINACIÓN DE TRANSPORTE <br /><br />
</center>
 </td>
<td style="text-align: right; width: 50%">

<img src="<?php echo Yii::app()->request->baseUrl;?>/images/logo.png">


</td>
</tr>
</table>
 
 </htmlpageheader>
 
<htmlpagefooter name="myfooter">
 <div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
 <center>
Av. Universidad, Campus Universitario, Hacienda La Glorieta. Santa Bárbara, Estado Zulia <br />
Teléfonos: (0275)555.10.36/555.28.32 Ext. 203-204<br />
www.unesur.edu.ve<br />
</center>
 Página {PAGENO} de {nb}
 </div>
 </htmlpagefooter>
 
<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
 <sethtmlpagefooter name="myfooter" value="on" />
 mpdf-->
 <br />
 <br />
 <br />
 <br />
 <br />
 <br />
 <br />
 
<?php echo $content; ?> 
 
</body>
</html>
