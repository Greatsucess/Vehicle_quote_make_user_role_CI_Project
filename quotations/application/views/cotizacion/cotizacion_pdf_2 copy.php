<?php error_reporting(E_ALL);
ini_set('display_errors', 1);?><?php 


$fecha_a=_info('fecha_a',$cotizacion_info,true);
$fecha_b=_info('fecha_b',$cotizacion_info,true);
$empresa=_info('empresa',$cotizacion_info,true);
$telefono=_info('telefono',$cotizacion_info,true);
$domicilio=_info('domicilio',$cotizacion_info,true);

$valor_no_declarado=_info('valor_no_declarado',$cotizacion_info,true);

$email=_info('email',$cotizacion_info,true);
$telefono=_info('telefono',$cotizacion_info,true);
$INE=_info('INE',$cotizacion_info,true);


$nombre=_info('nombre',$cotizacion_info,true);
$tipo_unidad=_info("tipo_unidad",$cotizacion_info,true);
$origen=_info('origen',$cotizacion_info,true);
$destino=_info('destino',$cotizacion_info,true);
$descripcion=_info('descripcion',$cotizacion_info,true);
$peso_embarque=_info('peso_embarque',$cotizacion_info,true);
$peso_embarque_dimension=_info('peso_embarque_dimension',$cotizacion_info,true);
$maniobras=_info("maniobras",$cotizacion_info,true);
$maniobras_importe=_info('maniobras_importe',$cotizacion_info,true);
 if ($maniobras!='1') {
 	$maniobras_importe=0;
 }
$prima=_info('prima',$cotizacion_info,true); 
$declarar_valor= _info('declarar_valor',$cotizacion_info,true);
$kilometros=_info('kilometros',$cotizacion_info,true);
$vehiculo_logo=_info('vehiculo_logo',$cotizacion_info,true);
$vehiculo_nombre=_info('vehiculo_nombre',$cotizacion_info,true);
$vehiculo_descripcion=_info('vehiculo_descripcion',$cotizacion_info,true);
$vehiculo_tipo_unidad=_info('vehiculo_tipo_unidad',$cotizacion_info,true);

$vehiculo_price = _info('verhiculo_price', $cotizacion_info, true);
$importe = $kilometros * $vehiculo_price;
//number_format($price, ((int) $price == $price ? 0 : 2), '.', ',');


if ($valor_no_declarado == 1) {
	$prima_amount = 0;
} else {
	$prima_amount = ($declarar_valor * $prima / 100);
}


$importe_total = ($importe + $prima_amount + $maniobras_importe)*1.16;
$peso_embarque= _f(floatval($peso_embarque));
 
//number_format($price, ((int) $price == $price ? 0 : 2), '.', ',');

$importe_total=_f($importe_total);
$prima= _f(floatval($prima));
$importe= _f(floatval($importe));
$maniobras_importe= _f(floatval($maniobras_importe));
$declarar_valor= _f(floatval($declarar_valor));
 function _f($n)
 {
 	return number_format($n, 2, ".", ",");
 }

 ?>
<html>
	<head>
		<?php $css = file_get_contents(base_url("styles/pdf.css"));?>
		<style>

		<?PHP  echo $css; ?>

		@page {

    background: url(<?php  echo base_url('styles/bg/background3.jpg'); ?>) no-repeat 0 0;
    background-image-resize: 6;
    margin-top: 3.5cm;
}


		.Estilo1 {font-size: 14px;}
		.Estilo2 {font-size: 12px; color: #FFFFFF; }
		.Estilo3 {font-size: 12px}
		.Estilo5 {color: #FFFFFF; font-size: 16px; }
        .Estilo7 {color: #FFFFFF; font-weight: bold; }
        .Estilo8 {color: #FFFFFF; font-size: 16px; font-weight: bold; }
        .Estilo9 {font-size: 9px}
.Estilo10{font-size:9px;}
.Estilo11 {font-size:9px;}
         div#card,div.card{
         	border: solid 1px #333;
         	margin-top: 15px;
         	margin-bottom: 15px;
         }
        </style>
	</head>
	<body style="font-family:Helvetica; font-size:10px;">
		<main>

			<div class="fila">
				 <div class="page clearfix">
				 	<strong>CDMX a <?php  echo date("d") ?> de <?php 
				 	 echo _mes(date('m')); ?> de <?PHP echo date('Y');  ?>		<br />
At'n <?php  echo $nombre; ?> / <?php  echo $empresa; ?><br />
Tel. <?php  echo $telefono; ?> </strong><br />


				 	<p>Por medio de la presente me permito distraer su amable atención con el objeto de enviar el presupuesto que amablemente nos solicitó
				 	</p>

		
				 	<table id="detalles" style="border: solid 1px #000; width: 100%;" padding="0" width="100%" cellpadding="5" cellspacing="0">
				 		<tr><td style="border-bottom: solid 1px #333;">Tipo de Unidad:</td>  <td style="border-bottom: solid 1px #333;">
				 			<?php 
				 			 echo $vehiculo_tipo_unidad; ?>
				 		</td></tr>
				 		<tr><td style="border-bottom: solid 1px #333;">Origen</td>  <td style="border-bottom: solid 1px #333;"><?php  echo $origen; ?></td></tr>
				 		<tr><td style="border-bottom: solid 1px #333;">Destino</td>  <td style="border-bottom: solid 1px #333;"><?php  echo $destino; ?></td></tr>
				 		<tr><td style="border-bottom: solid 1px #333;">Descripción de la Carga</td>  <td style="border-bottom: solid 1px #333;"><?php  echo $descripcion; ?></td></tr>
				 		<tr><td style="border-bottom: solid 1px #333;">Peso por Embarque</td>  <td style="border-bottom: solid 1px #333;"><?php  echo $peso_embarque; ?> <?php  echo $peso_embarque_dimension; ?></td></tr>
				 		<tr><td style="border-bottom: solid 1px #333;">Importe del Servicio</td>  <td style="border-bottom: solid 1px #333;">$<?php  echo $importe; ?></td></tr>
				 		
						 <?php 
						 
						  ?>
						    <?php  if(!empty($maniobras) && $maniobras=='1'): ?>
				 		<tr>
				 			<td style="border-bottom: solid 1px #333;">Maniobras Liquidación 100% Anticipado</td>  <td style="border-bottom: solid 1px #333;">
				 			$<?php  echo $maniobras_importe; ?></td>
				 		</tr>
				 			 <?php  endif; ?>

				 		<tr><td style="border-bottom: solid 1px #333;">Fecha del Servicio</td>  <td style="border-bottom: solid 1px #333;">
				 			<?php  echo _fecha_literal($fecha_a); ?></td></tr>
				 		<tr>
				 			<td style="border-bottom: solid 1px #333;">Valor Declarado por Cliente</td>
				 			<td style="border-bottom: solid 1px #333;">

						 <?php if ($valor_no_declarado==1): ?>
						 	
								 Valor no declarado.
						 	<?php else: ?>
						 		$<?php  echo $declarar_valor; 


				 				?>
						 <?php endif ?>
				 				
				 					


				 				</td>
				 		</tr>
				 		<tr>
				 			<td style="border-bottom: solid 1px #333;">Kilómetros</td>
				 			<td style="border-bottom: solid 1px #333;">
				 				<?php  echo $kilometros;  ?>
				 			</td>
				 		</tr>
				 		<tr><td style="border-bottom: solid 1px #333;">Gestoría de Prima de Seguro Liquidación 100% Anticipada</td>  <td  style="border-bottom: solid 1px #333;">
				 			Porcentaje de Prima: 
				 			<?php 
				 			echo  $prima;?>% 
				 			Monto % de Prima: 
				 			$<?php 

				 			 if ($valor_no_declarado==1) {
				 			 	 echo $prima_amount=0;
				 			 }else{
				 			 		echo $prima_amount; 	
				 			 }
				 			 
				 			 ?>
				 		</td></tr>

				 		<tr>
				 			<td style="border-bottom: solid 1px #333;" class="font-red">Disposición Inmediata Total</td>
				 			<td  style="border-bottom: solid 1px #333;" class="font-red">$<?PHP 
				 			 echo $importe_total; ?> MXN + IVA</td>
				 		</tr>
				 	</table>

					<div id="card">
				 	 <table>
				 	 	<tr>
				 	 		<td><img src="<?php  echo  base_url("uploads/vehiculos/".$vehiculo_logo); ?>" alt="" height="180px"></td>
				 	 		 
				 	 	 
				 	 	 	 <td valign="top">
				 	 	 	 	 <h3> <?php  echo $vehiculo_nombre; ?></h3>
				 	 	 	 	  <h5><i><?php  echo $vehiculo_tipo_unidad ?></i></h5>
				 	 	 	 	   <p>
				 	 	 	 	   	 <?php  echo $vehiculo_descripcion; ?>
				 	 	 	 	   </p>
				 	 	 	 </td>
				 	 	 </tr>
				 	 </table>
				 	 </div>

				 	  	 <img src="<?php  echo base_url('uploads/settings/cuentas.png'); ?>" alt="">


<div class="Estilo11">

<p>Este servicio incluye: Servicio de flete con Operador, Recolecci&oacute;n y Entrega.
<?php  if($maniobras!='1'): ?> <b>No</b>
se incluye Maniobras de carga y descarga. 
<?php else: ?>
Se incluye Maniobras de carga y descarga. 
 <?PHP endif; ?> 
 
<br />Seguro: Esta cotizaci&oacute;n no incluye seguro de la mercanc&iacute;a si lo requiere ser&iacute;a. El 1% sobre el valor declarado de su Mercanc&iacute;a m&aacute;s I.V.A. S&iacute; 
  la mercanc&iacute;a alcanza a tener un valor de m&aacute;s de un Mill&oacute;n de Pesos M.N., se le manejar&iacute;a costo preferencial del porcentaje antes 
mencionado. * En valores declarados iguales o inferiores a $350,000.00 M.N el costo del seguro ser&aacute; de $3,500.00 M.N. + IVA<br />Confirmaci&oacute;n de servicio con 24 Horas de anticipaci&oacute;n de preferencia; o bien si requiere FLETE URGENTE contamos con disposici&oacute;n inmediata. Los 
  tiempos de entrega est&aacute;n sujetos a imprevistos fuera de nuestro alcance como lo puede ser: Retenes Federales, Condiciones Climatol&oacute;gicas o 
  imprevistos de &uacute;ltimo momento.<br />
  <br />  
  <strong>Condiciones de Pago:<br />
  1) 100% Anticipado en servicios locales, en productos perecederos o productos peligrosos.<br />
  2) 50% Anticipo y 50% antes de la descarga, en carga general.<br />
  3) Se recomienda al cliente que se trancite de d&iacute;a en servicios que viajen hacia el sureste. cuando la carga rebase los $ 500,000.00 pesos, es 
  importante que se considere custodia adicional al servicio y al seguro de carga (no obligatorio).</strong><br />
  <strong>Forma de Pago: Transferencia Electr&oacute;nica Interbancaria o Dep&oacute;sito en Firme en nuestra cuenta Bancomer.</strong><br />
&ldquo;En caso de vernos favorecidos con su preferencia solicitamos su Orden de Compra y Carta de instrucciones, Direcci&oacute;n de Carga, 
Direcci&oacute;n de Descarga con Contacto y Tel&eacute;fono, indicarnos tambi&eacute;n la hora exacta de Carga, as&iacute; como Datos Fiscales y RFC para elaborar 
factura electr&oacute;nica.&ldquo;<br />
<br /> 
Una vez confirmado el dep&oacute;sito correspondiente al pago del servicio, podemos dar salida a la unidad para presentarnos en tiempo y forma como 
ustedes lo solicitaron. Sin m&aacute;s por el momento, agradecemos su preferencia, quedo al pendiente de sus comentarios. Reiter&aacute;ndole las m&aacute;s atenta y 
distinguida consideraci&oacute;n.<br />
<strong>
Toda cancelaci&oacute;n causara honorarios del 40% sobre el monto total de la negociaci&oacute;n mas el I.V.A.</strong><br />
Favor de enviar su comprobante de pago o anticipo en tiempo y forma v&iacute;a electr&oacute;nica. 
</p></div>
				 </div>

<pagebreak page-break-type="clonebycss" />
				 <div class="page page-carta Estilo1">
				 	<h4 class="center">CARTA RESPONSIVA DE EMBARQUE SIN SEGURO</h4>
<br />
				 	<p align="right"><strong>CD. DE MEXICO, <?php echo _fecha_literal(date("Y-m-d")) ?></strong></p>
<p><br />
  <strong>ATENCI&Oacute;N:</strong><br /><br />
  <strong>TRANSPORTES SIGFRA S.A. DE C.V.</strong></p><br />
<p>  POR MEDIO DE LA PRESENTE CARTA RESPONSIVA, DOY LA AUTORIZACI&Oacute;N PARA QUE LA CARGA TRANSPORTADA A 
  CONTINUACI&Oacute;N DESCRITA, VIAJE SIN SEGURO MANIFESTANDO QUE CONOZCO LOS RIESGOS QUE DICHA ACCI&Oacute;N 
PUDIESE DERIVAR, Y CONOCIENDO LOS RIESGOS QUE ESTO PUDIERA IMPLICAR DURANTE EL TRAYECTO DEL 
EMBARQUE DEL ORIGEN AL DESTINO.</p>
<p>  AS&Iacute; MISMO, LIBERO DE TODA RESPONSABILIDAD A TRANSPORTES SIGFRA S.A. DE C.V. EN CUANTO A 
PROBLEMAS LEGALES QUE PUDIERA OCASIONAR LA OMISI&Oacute;N DEL ASEGURAMIENTO DE LA CARGA.</p>
<p>  SIN M&Aacute;S POR EL MOMENTO, ME PONGO A SU DISPOSICI&Oacute;N PARA CUALQUIER ACLARACI&Oacute;N.</p>
<p>  NOMBRE DEL CLIENTE: <?php echo $nombre; ?><br />
  DOMICILIO: <?php  echo $domicilio; ?><br />
  TEL&Eacute;FONO: <?php  echo $telefono; ?><br />
  CORREO: <?php  echo $email; ?><br />
  DESCRIPCI&Oacute;N DEL EMBARQUE: <?php  echo $descripcion; ?><br />
  VALOR DECLARADO DE LA CARGA: $ <?php  echo $declarar_valor; ?> MXN<br />
  FECHA DE SALIDA: <?php  echo _fecha_literal($fecha_a); ?><br />
  FECHA ESTIMADA DE LLEGADA: <?php  echo _fecha_literal($fecha_b); ?><br />
  CLAVE INE: <?php  echo $INE; ?><br />
  ANEXAR COPIA DE IDENTIFICACI&Oacute;N DE QUIEN AUTORIZA.<br />
  DECLARO BAJO PROTESTA DE DECIR VERDAD, QUE LOS DATOS ANTES REFERIDOS EN ESTA CARTA SON LOS
  CORRECTOS, LOS CUALES FUERON PROPORCIONADOS POR EL SUSCRITO. <br />
</p>

<br /><br />
 <table align="center" id="acepto">
 	<tr><td>ACEPTO LA RESPONSABILIDAD</td>
 	<td>
 		FIRMA DE ENTERADO
 	</td></tr>

 	<tr>
 		<td  height="45" valign="bottom">____________________________</td>
 		<td valign="bottom">____________________________</td>
 	</tr>
 	<tr>
 		<td>Nombre Cliente</td>
 		<td>Nombre Compañia</td>
 	</tr>
 </table>
				 </div>

<pagebreak page-break-type="clonebycss" />
				 <div class="page page-condiciones Estilo10">
				 	

<p align="center"><strong>
	<h3>CONDICIONES DEL CONTRATO DE TRANSPORTE QUE AMPARA ESTA CARTA PORTE</h3>
</strong></p>
<p>  
  <strong>PRIMERA.-</strong> Para los efectos del presente contrato de transporte se denomina &quot;Porteador&quot; al transportista y &quot;Remitente&quot;  
  al usuario que contrate el servicio.</p>
<p>  <strong>SEGUNDA.- </strong>El &ldquo;Remitente&rdquo; es responsable de que la informaci&oacute;n proporcionada al &ldquo;Porteador&rdquo; sea veraz y que la 
documentaci&oacute;n que entregue para efectos del transporte sea la correcta.</p>
<p><strong>TERCERA.-</strong> El &ldquo;Remitente&rdquo; debe declarar al &ldquo;Porteador&rdquo; el tipo de mercanc&iacute;a o efecto de que se trate, peso, medidas  
  y/o n&uacute;mero de la carga que se entrega para su transporte y en su caso el valor de la misma. La carga que se entregue a  
  granel ser&aacute; pesada por el &ldquo;Porteador&rdquo; en el primer punto donde haya b&aacute;scula apropiada o, en su defecto, aforada en  
metros c&uacute;bicos con la conformidad del remitente.</p>
<p><strong>CUARTA.-</strong> Para efectos del transporte, el &ldquo;Remitente&rdquo; deber&aacute; entrega al &ldquo;Porteador&rdquo; los documentos que las leyes y  
  reglamentos exijan para llevar a cabo el servicio, en caso de no cumplirse con estos requisitos el &ldquo;Porteador&rdquo; est&aacute;  
obligado a rehusar el transporte de las mercanc&iacute;as.</p>
<p><strong>QUINTA.-</strong> Si por sospecha de falsedad en la declaraci&oacute;n del contenido de un bulto el &ldquo;porteador&rdquo; deseare proceder a su  
  reconocimiento, podr&aacute; hacerlo ante testigos y con una asistencia del &ldquo;Remitente&rdquo; o del consignatario. Si este &uacute;ltimo no  
  concurriere, se solicitar&aacute; la presencia de un inspector de la secretaria de comunicaciones y transportes, y se levantar&aacute; el  
  acta correspondiente. El &ldquo;Porteador&rdquo; tendr&aacute; en todo caso la obligaci&oacute;n de dejar los bultos en el estado en que se  
encontraban antes del reconocimiento.</p>
<p><strong>SEXTA.-</strong> El &ldquo;Porteador&rdquo; deber&aacute; recoger y entregar la carga precisamente en los domicilios que se&ntilde;ale el &ldquo;Remitente&rdquo;  
  ajust&aacute;ndose a los t&eacute;rminos y condiciones convenidos. El &ldquo;Porteador&rdquo; s&oacute;lo est&aacute; obligado a llevar la carga al domicilio del  
  consignatario para su entrega una sola vez. Si &eacute;sta no fuera recibida, se dejar&aacute; aviso de que la mercanc&iacute;a queda a  
disposici&oacute;n del interesado en las bodegas que indique el &ldquo;Porteador&rdquo;.</p>
<p><strong>SEPTIMA.-</strong> Si la carga no fuere retirada dentro de los 30 d&iacute;as siguientes a aqu&eacute;l en que hubiere sido puesta a  
  disposici&oacute;n del consignatario, el &ldquo;Porteador&rdquo; podr&aacute; solicitar la venta en p&uacute;blica subasta con arreglo en lo que dispone el  
C&oacute;digo de Comercio.</p>
<p><strong>OCTAVA.-</strong> El &ldquo;Porteador&rdquo; y el &ldquo;Remitente&rdquo; negociar&aacute;n libremente el precio del servicio, tomando en cuenta su tipo,  
caracter&iacute;sticas de los embarques, volumen, regularidad, clase de carga y sistema de pago.</p>
<p><strong>NOVENA.-</strong> Si el &ldquo;Remitente&rdquo; desea que el &ldquo;Porteador&rdquo; asuma la responsabilidad por el valor de la mercanc&iacute;a, o efectos  
  que &eacute;l declare y que cubra toda clase de riesgo, inclusive los derivados de casos fortuitos o de fuerza mayor, las partes  
  deber&aacute;n convenir un cargo adicional, equivalente al valor de la prima del seguro que se contrate, el cual se deber&aacute;  
expresar en la carta de porte.</p>
<p><strong>DECIMA.-</strong> Cuando el importe del flete no incluya el cargo adicional, la responsabilidad del &ldquo;Porteador&rdquo; queda  
  expresamente limitada a la cantidad equivalente a 15 d&iacute;as del salario m&iacute;nimo vigente en el Distrito Federal por tonelada  
  o cuando se trate de embarques cuyo peso sea mayor de 200kg. peso menor de 1000kg. y a 4 d&iacute;as del salario m&iacute;nimo  
por remesa cuando se trate de embarques con peso hasta de 200 kg.</p>
<p><strong>DECIMA PRIMERA.-</strong> El precio del transporte deber&aacute; pagarse en origen, salvo convenio entre las partes de pago en  
  destino. Cuando el transporte se hubiere concertado &ldquo;Flete por Cobrar&rdquo;, la entrega de las mercanc&iacute;as o efectos se har&aacute;  
  contra el pago del flete y el &ldquo;Porteador&rdquo; tendr&aacute; derecho a retenerlos mientras no se cubra el precio convenido. *** Para  
  poder ingresar a las instalaciones del cliente en anden o rampa, es necesario que se cubra el 100% de la factura en  
firme sin excepci&oacute;n de lo contrario se facturaran estad&iacute;as de acuerdo al tipo de unidad. ***</p>
<p><strong>DECIMO SEGUNDA.-</strong> Si al momento de la entrega resultare alg&uacute;n faltante o aver&iacute;a, el consignatario deber&aacute; hacerla  
  constar en ese acto en la carta porte y formular su reclamaci&oacute;n por escrito al &ldquo;Porteador&rdquo;, dentro de las 24 horas  
siguientes.</p>
<p><strong>DECIMO TERCERA.-</strong> El &ldquo;Porteador&rdquo; queda eximido de la obligaci&oacute;n de recibir mercanc&iacute;a o efectos para su transporte,  
  en los siguientes casos:  
  a) Cuando se trate de carga que por su naturaleza, peso, volumen, embalaje defectuoso o cualquier otra circunstancia  
  no pueda transportarse sin destruirse o sin causar otro da&ntilde;o a los dem&aacute;s art&iacute;culos o al material rodante, salvo que la  
  empresa de que se trate tenga el equipo adecuado.  
  b) Las mercanc&iacute;as cuyo transporte haya sido prohibido por disposiciones legales o reglamentarias. Cuando tales  
  disposiciones no proh&iacute;ban precisamente el transporte de determinadas mercanc&iacute;as, pero si ordenen la presentaci&oacute;n de  
  ciertos documentos para que puedan ser transportados, el &ldquo;Remitente&rdquo; estar&aacute; obligado a entregar al &ldquo;Porteador&rdquo; los  
documentos correspondientes.</p>
<p><strong>DECIMA CUARTA.-</strong> Los casos no previstos en las presentes condiciones y las quejas derivadas de su aplicaci&oacute;n se  
someter&aacute;n por la v&iacute;a administrativa a la Secretar&iacute;a de Comunicaciones y Transportes.</p>
<p><strong>DECIMA QUINTA.-</strong> No se considera como pago cheques salvo buen cobro ni transferencias (SPEI) que no hayan sido  
  abonadas en firme en nuestra cuenta de cheques o bancaria. Por tal motivo se descargara la mercanc&iacute;a hasta que no  
se cubra el monto total del servicio y estad&iacute;as si fuera el caso.</p>
<p><strong>DECIMA SEXTA.- </strong>Para efectos del seguro es importante y necesario que se cubra el 100% del seguro, antes de cargar  
dicha mercanc&iacute;a.</p>
<p><strong>DECIMA SEPTIMA.-</strong> Para poder posicionar la unidad ya sea tr&aacute;iler, torton, camioneta, lowboy o gr&uacute;as es importante  
que se deposite o se haga transferencia por lo menos con dos horas de anticipaci&oacute;n, para recolectar en tiempo y forma.</p>
<p><strong>DECIMA OCTAVA.- </strong>El transporte o transportista tendr&aacute; 48 horas para posicionar la unidad para cargar en origen sin  
  cargo para dicho transportista. Si el cliente cancela el servicio antes de esas 48 horas, ser&aacute; penalizado con el 40% del  
monto total m&aacute;s el 16% de I.V.A. sin excepci&oacute;n.</p>
<p><strong>DECIMA NOVENA.- </strong>En caso de que la carga o mercanc&iacute;a haya sido robada &ndash; sustra&iacute;da; y el seguro dictamine  
  improcedente la indemnizaci&oacute;n de dicho siniestro, la empresa transportista se limitara a pagar solo el 1% del valor  
  declarado de la mercanc&iacute;a. (Siempre y cuando la gesti&oacute;n de la prima del seguro haya sido facturada por TRANSPORTES SIGFRA S.A. DE C.V. y/o Transportes Sigfra, s.a. de c.v.).</p>
<p><strong>VIG&Eacute;SIMA PRIMERA.-</strong> En caso de que el cliente no liquidara el 50% restante al momento de que la unidad &oacute; unidades,  
  hayan llegado a su destino final. Se le facturar&aacute;n estad&iacute;as a raz&oacute;n de: Camioneta $ 3,500.00 m&aacute;s I.V.A., Torton o Rab&oacute;n  
  $ 5,500.00 m&aacute;s I.V.A., Tr&aacute;iler $ 7,500.00 m&aacute;s I.V.A., y Lowboy a raz&oacute;n de $ 12,500.00 m&aacute;s I.V.A. Todos estos costos  
  son por d&iacute;a sin excepci&oacute;n.   
</p>

<div align="center">*** Validez de cotizaci&oacute;n por 7 d&iacute;as naturales.
  <br /><br />
    <strong>
www.fletesenmexico.mx<br />
www.fletesdemexico.com.mx<br />
www.transportessigfra.com.mx<br />
www.transportes-urgentes.com<br />
www.fletesrefrigerados.com.mx </strong></div>


				 </div>
			</div>
		</main>
		</body>
		</html>
