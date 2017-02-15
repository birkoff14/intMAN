<?php
	include_once("top.php");
?>
<?php
$maxRows_rsPoliticas = 5;
$pageNum_rsPoliticas = 0;
if (isset($_GET['pageNum_rsPoliticas'])) {
  $pageNum_rsPoliticas = $_GET['pageNum_rsPoliticas'];
}
$startRow_rsPoliticas = $pageNum_rsPoliticas * $maxRows_rsPoliticas;

mysql_select_db($database_oConn, $oConn);
$query_rsPoliticas = "SELECT IDPolitica, Titulo, RutaDocumento FROM mtbPoliticas ORDER BY IDPolitica DESC";
$query_limit_rsPoliticas = sprintf("%s LIMIT %d, %d", $query_rsPoliticas, $startRow_rsPoliticas, $maxRows_rsPoliticas);
$rsPoliticas = mysql_query($query_limit_rsPoliticas, $oConn) or die(mysql_error());
$row_rsPoliticas = mysql_fetch_assoc($rsPoliticas);

if (isset($_GET['totalRows_rsPoliticas'])) {
  $totalRows_rsPoliticas = $_GET['totalRows_rsPoliticas'];
} else {
  $all_rsPoliticas = mysql_query($query_rsPoliticas);
  $totalRows_rsPoliticas = mysql_num_rows($all_rsPoliticas);
}
$totalPages_rsPoliticas = ceil($totalRows_rsPoliticas/$maxRows_rsPoliticas)-1;
?>
<!-- Marketing Icons Section -->
<div class="row">
<div class="col-lg-12">
<h1> <font color="E40045"><b>Portal MAN Truck & Bus M&eacute;xico</b></font> </h1>
  </div>
            
  <div class="col-md-3">
<div class="panel panel-default">
<div class="panel-heading">
<h4><i class="fa fa-fw fa-user"></i>Calidad</h4>						
      </div>
      <div class="panel-body">
	  	<div align="center"><img src="img/iso.PNG" width="175" height="135">  	      </div>
      </div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<h4><i class="fa fa-fw fa-check-square-o"></i> Procedimientos MTB</h4>
      </div>
      <div class="panel-body">
	  <p>
	  	<?php do { ?>
	  		<i class="fa fa-fw fa-circle fa-1x"></i>
			<a href="politics.php?IDPolitica=<?php echo $row_rsPoliticas['IDPolitica']; ?>"><?php echo $row_rsPoliticas['Titulo']; ?></a>
			<br />
		<?php } while ($row_rsPoliticas = mysql_fetch_assoc($rsPoliticas)); ?>
	  </p>
	  <div align="center"><br />
	      <a href="#" class="btn btn-default">Ver m&aacute;s </a>
	    </div>
      </div>
    </div>
	
  </div>
  <div class="col-md-6">
<div class="panel panel-default">
<div class="panel-heading">
<h4><i class="fa fa-fw fa-bullhorn"></i> Noticias importantes</h4>
      </div>
      <div class="panel-body">
       <!-- Begin DWUser_EasyRotator -->
  <script type="text/javascript" src="http://c520866.r66.cf2.rackcdn.com/1/js/easy_rotator.min.js"></script>
</p>
<div class="dwuserEasyRotator" style="width: 530px; height: 380px; position:relative; text-align: left; background-color:#f5f5f5;" data-erconfig="{autoplayEnabled:false, lpp:'102-105-108-101-58-47-47-47-67-58-47-85-115-101-114-115-47-109-109-101-110-101-115-101-115-47-68-111-99-117-109-101-110-116-115-47-69-97-115-121-82-111-116-97-116-111-114-80-114-101-118-105-101-119-47-112-114-101-118-105-101-119-95-115-119-102-115-47', wv:1}" data-ername="TEst" data-erTID="{lgtbazxnd49804217756841}">
  <div data-ertype="content" style="display: none;"><ul data-erlabel="Main Category">
	<li>
		<img class="main" src="img/Rotativo/01.jpg" />
		<img class="thumb" src="img/Rotativo/01.jpg" />
		<span class="desc">El Grupo m&aacute;s importante del Autotransporte en M&eacute;xico, confirm&oacute; un nuevo pedido de 181 Autobuses MAN con carrocer&iacute;a Marcopolo, Ayats e Irizar i8, con los que renovará su flota de l&iacute;neas de lujo. Este mes, se entregaron los primeros 55 Autobuses MAN RR4 26.480, de los cuales 45 son doble piso (13 con carrocería Ayats y 32 con carrocer&iacute;a Marcopolo), 10 Autobuses son piso sencillo con carrocer...</span>
	</li>
	<li>
		<img class="main" src="img/Rotativo/02.jpg" />
		<img class="thumb" src="img/Rotativo/02.jpg" />
		<span class="desc">El pasado 4 de Noviembre se llevó a cabo en el Club de Golf de Juriquilla, Qro, el 11° torneo de Golf organizado por la Cámara Nacional del Autotransporte de Pasaje y Turismo (CANAPAT) donde se exhibió un Volksbus 17.280 OT Automático con carrocería Marcopolo MP70 con aplicación interurbano. Al evento asistieron más de 80 jugadores, dueños de diferentes líneas de autobuses, a los que MAN...</span>
	</li>
	<li>
		<img class="main" src="img/Rotativo/03.jpg" />
		<img class="thumb" src="img/Rotativo/03.jpg" />
		<span class="desc">Nuestro concesionario DISTRIBUIDORA VOLKSWAGEN DEL BAJÍO, QUERÉTARO entregó de las primeras 10 unidades VOLKSWAGEN 15.190 FEB al Municipio de Querétaro como parte del programa de Movilidad, Primera etapa en Transporte escolar gratuito, que beneficiará a 4,000 alumnos de diferentes escuelas públicas, los veremos en dos rutas: Cerrito Colorado y Mompani-Revolución.</span>
	</li>
</ul>
</div>
  <div data-ertype="layout" data-ertemplatename="NONE" style="">			
  <div class="erimgMain" style="position: absolute; left:0;right:0;top:0;bottom:100px;" data-erConfig="{___numTiles:3, scaleMode:'fillArea', imgType:'main', __loopNextButton:false, arrowButtonMode:'rollover'}">
				<div class="erimgMain_slides" style="position: absolute; left:0px; top:0; bottom:0; right:0px;">
					<div class="erimgMain_slide">
						<div class="erimgMain_img" style="position: absolute; left: 20px; width: 200px; top: 20px; bottom: 20px;"></div>
						<div class="" style="position: absolute; left: 240px; right: 20px; top:20px; bottom: 20px; padding: 0; color: #000; font-family: Georgia, 'Times New Roman', Times, _serif;">
							<p class="erimgMain_title" style="padding: 0; margin: 0 0 13px 0; font-weight: bold; font-size: 24px;"></p>
							<p class="erimgMain_desc" style="padding: 0; margin: 0; font-size: 14px; line-height: 19px;"></p>
						</div>
					</div>
				</div>
				<!-- <div class="erimgMain_arrowLeft" style="position:absolute; left: 10px; top: 50%; margin-top: -15px;" data-erConfig="{image:'circleSmall', image2:'circleSmall'}"></div>
				<div class="erimgMain_arrowRight" style="position:absolute; right: 10px; top: 50%; margin-top: -15px;"></div>-->
			</div>
			<div class="erimgMain rotatorTileNav" style="position: absolute; left:0;right:0;bottom:0;height:100px;background-color:#f5f5f5; border-top:1px solid #666;" data-erConfig="{numTiles:3, scaleMode:'fillArea', imgType:'thumb', loopNextButton:false, __arrowButtonMode:'rollover', __slideLinkEvent:'rollover'}">
				<div style="position: absolute; left: 0; top: 10px; right: 0; bottom: 0;"></div>
				<div class="erimgMain_slides" style="position: absolute; left:45px; top:0; bottom:0; right:45px;">
					<div class="erimgMain_slide">
						<div class="erimgMain_img" style="position: absolute; left: 5px; right: 5px; top: 10px; bottom: 10px;"></div>
						<!-- <div class="" style="background: #555; position: absolute; left: 1px; right: 1px; top: 10px; bottom: 0; padding: 5px; color: #FFF; font-family: Arial; font-size: 12px; text-align: center;">
							<p class="erimgMain_title" style="padding: 5px; margin: 0 0 3px 0; font-weight: bold;"></p>
						</div> -->
						<div class="selectionArrow visibleWhenSelected" style="position: absolute; top: 0; left: 50%; margin-left: -10px; width: 20px; height: 10px; background-image: url('http://easyrotator.s3.amazonaws.com/1/i/rotator/333_arrow10_8_down_export.png');"></div>
					</div>
				</div>
				<div class="erimgMain_arrowLeft" style="position:absolute; left: 10px; top: 50%; margin-top: -15px;" data-erConfig="{image:'circleSmall', image2:'circleSmall'}"></div>
				<div class="erimgMain_arrowRight" style="position:absolute; right: 10px; top: 50%; margin-top: -15px;"></div>
			</div><div class="erabout erFixCSS3" style="color: #FFF; text-align: left; background: #000; background:rgba(0,0,0,0.93); border: 2px solid #FFF; padding: 20px; font: normal 11px/14px Verdana,_sans; width: 300px; border-radius: 10px; display:none;"> This <a style="color:#FFF;" href="http://www.dwuser.com/easyrotator/" target="_blank">jQuery slider</a> was created with the free <a style="color:#FFF;" href="http://www.dwuser.com/easyrotator/" target="_blank">EasyRotator</a> software from DWUser.com. <br />
        <br />
      Use WordPress? The free <a style="color:#FFF;" href="http://www.dwuser.com/easyrotator/wordpress/" target="_blank">EasyRotator for WordPress</a> plugin lets you create beautiful <a style="color:#FFF;" href="http://www.dwuser.com/easyrotator/wordpress/" target="_blank">WordPress sliders</a> in seconds. <br />
      <br />
      <a style="color:#FFF;" href="#" class="erabout_ok">OK</a> </div>
    <noscript>
      Rotator powered by <a href="http://www.dwuser.com/easyrotator/">EasyRotator</a>, a free and easy jQuery slider builder from DWUser.com.  Please enable JavaScript to view.
    </noscript>
    <script type="text/javascript">/*Avoid IE gzip bug*/(function(b,c,d){try{if(!b[d]){b[d]="temp";var a=c.createElement("script");a.type="text/javascript";a.src="http://easyrotator.s3.amazonaws.com/1/js/nozip/easy_rotator.min.js";c.getElementsByTagName("head")[0].appendChild(a)}}catch(e){alert("EasyRotator fail; contact support.")}})(window,document,"er_$144");</script>
  </div>
</div>
<!-- End DWUser_EasyRotator -->
      </div>
    </div>
  </div>
  <div class="col-md-3">
<div class="panel panel-default">
<div class="panel-heading">
<h4><i class="fa fa-fw fa-coffee"></i> Men&uacute; de la semana </h4>
      </div>
      <div class="panel-body">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>Lunes</td>
          </tr>
<tr>
  <td> Martes </td>
</tr>
<tr>
  <td><b>Mi&eacute;rcoles</b> </td>
</tr>
<tr>
  <td> Jueves </td>
</tr>
<tr>
  <td> Viernes </td>
</tr>
</table>
      <!--a href="#" class="btn btn-default">Learn More</a-->
</div>
    </div>
	
	<div class="panel panel-default">
<div class="panel-heading">
<h4><i class="fa fa-fw fa-briefcase"></i> Aplicaciones MTB </h4>
      </div>
      <div class="panel-body">
<p><a href="http://192.168.2.90/tickets" target="_blank">Sistemas de Tickets MTB</a><br>
<a href="http://192.168.2.90/directorioman" target="_blank">Directorio MTB M&eacute;xico</a><br>
<a href="http://192.168.2.90/reciboNomina" target="_blank">Recibo de n&oacute;mina</a><br>
<a href="http://192.168.2.90/cotViajes" target="_blank">Cotizador de viajes</a> <br>
Vacaciones RH<br>
Pedidos concesionarios
<br>
<a href="http://192.168.2.209/cfdsweb/Default.aspx" target="_blank">CFDs Web</a><br>
<a href="http://192.168.2.197:8080/DERIP/" target="_blank">DERIP</a></p>
      </div>
    </div>
	
  </div>
</div>
<!-- /.row -->
<!--#modulo dos -->
<div class="row">
<div class="col-md-3">
<div class="panel panel-default">
<div class="panel-heading">
<h4><i class="fa fa-fw fa-birthday-cake"></i> Feliz cumplea&ntilde;os </h4>
      </div>
      <div class="panel-body">
       <div align="center">
<!-- Begin DWUser_EasyRotator -->
  <!--script type="text/javascript" src="http://c520866.r66.cf2.rackcdn.com/1/js/easy_rotator.min.js"></script-->
<div class="dwuserEasyRotator" style="width: 126px; height: 167px; position:relative; text-align: left;" data-erconfig="{autoplayEnabled:false, lpp:'102-105-108-101-58-47-47-47-67-58-47-85-115-101-114-115-47-109-109-101-110-101-115-101-115-47-68-111-99-117-109-101-110-116-115-47-69-97-115-121-82-111-116-97-116-111-114-80-114-101-118-105-101-119-47-112-114-101-118-105-101-119-95-115-119-102-115-47', wv:1}" data-ername="TEst" data-erTID="{fdgl16q6605988756841}">
  <div data-ertype="content" style="display: none;"><ul data-erlabel="Main Category">
	<li>
		<img class="main" src="img/birthday/Selection_001.png" />
		<img class="thumb" src="img/birthday/Selection_001.png" />
	</li>
	<li>
		<img class="main" src="img/birthday/Selection_003.png" />
		<img class="thumb" src="img/birthday/Selection_003.png" />
	</li>
	<li>
		<img class="main" src="img/birthday/Selection_002.png" />
		<img class="thumb" src="img/birthday/Selection_002.png" />
	</li>
</ul>
</div>
  <div data-ertype="layout" data-ertemplatename="NONE" style="">		<div class="erimgMain" style="position: absolute; left:0;right:0;top:0;bottom:0;" data-erConfig="{__numTiles:3, scaleMode:'scaleDown', imgType:'main', __loopNextButton:false, __arrowButtonMode:'rollover'}">
			<div class="erimgMain_slides" style="position: absolute; left:0; top:0; bottom:0; right:0;">
				<div class="erimgMain_slide">
					<div class="erimgMain_img" style="position: absolute; left: 0; right: 0; top: 0; bottom: 0;"></div>
				</div>
			</div>
			<div class="erimgMain_arrowLeft" style="position:absolute; left: -50px; top: 50%; margin-top: -15px;" data-erConfig="{image:'circleSmall', image2:'circleSmall'}"></div>
			<div class="erimgMain_arrowRight" style="position:absolute; right: -50px; top: 50%; margin-top: -15px;" data-erConfig="{image:'circleSmall', image2:'circleSmall'}"></div>
		</div><div class="erabout erFixCSS3" style="color: #FFF; text-align: left; background: #000; background:rgba(0,0,0,0.93); border: 2px solid #FFF; padding: 20px; font: normal 11px/14px Verdana,_sans; width: 300px; border-radius: 10px; display:none;"> This <a style="color:#FFF;" href="http://www.dwuser.com/easyrotator/" target="_blank">jQuery slider</a> was created with the free <a style="color:#FFF;" href="http://www.dwuser.com/easyrotator/" target="_blank">EasyRotator</a> software from DWUser.com. <br />
        <br />
      Use WordPress? The free <a style="color:#FFF;" href="http://www.dwuser.com/easyrotator/wordpress/" target="_blank">EasyRotator for WordPress</a> plugin lets you create beautiful <a style="color:#FFF;" href="http://www.dwuser.com/easyrotator/wordpress/" target="_blank">WordPress sliders</a> in seconds. <br />
      <br />
      <a style="color:#FFF;" href="#" class="erabout_ok">OK</a> </div>
    <noscript>
      Rotator powered by <a href="http://www.dwuser.com/easyrotator/">EasyRotator</a>, a free and easy jQuery slider builder from DWUser.com.  Please enable JavaScript to view.
    </noscript>
    <script type="text/javascript">/*Avoid IE gzip bug*/(function(b,c,d){try{if(!b[d]){b[d]="temp";var a=c.createElement("script");a.type="text/javascript";a.src="http://easyrotator.s3.amazonaws.com/1/js/nozip/easy_rotator.min.js";c.getElementsByTagName("head")[0].appendChild(a)}}catch(e){alert("EasyRotator fail; contact support.")}})(window,document,"er_$144");</script>
  </div>
</div>
<!-- End DWUser_EasyRotator -->
       </div>
       <div align="center"><br />
            <a href="#" class="btn btn-default">Ver m&aacute;s </a> 
           </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
<div class="panel panel-default">
<div class="panel-heading">
<h4><i class="fa fa-fw fa-gift"></i> Noticias anteriores </h4>
      </div>
      <div class="panel-body">
<p>
	<i class="fa fa-fw fa-circle fa-1x"></i>Camiones Volkswagen a PRECIOS ESPECIALES o TASAS DE INTER&Eacute;S desde 9.7%<br>
	<i class="fa fa-fw fa-circle fa-1x"></i>Responsabilidad entera por tu cami&oacute;n o autob&uacute;s.
</p>
      <a href="#" class="btn btn-default">Ver m&aacute;s noticias </a> </div>
    </div>
  </div>
  <div class="col-md-3">
<div class="panel panel-default">
<div class="panel-heading">
<h4><i class="fa fa-fw fa-briefcase"></i> Aplicaciones MTB </h4>
      </div>
      <div class="panel-body">
<p><a href="http://192.168.2.90/tickets" target="_blank">Sistemas de Tickets MTB</a><br>
<a href="http://192.168.2.90/directorioman" target="_blank">Directorio MTB M�xico</a><br>
<a href="http://192.168.2.90/reciboNomina" target="_blank">Recibo de n�mina</a></p>
      </div>
    </div>
  </div>
</div>
<!-- /.row -->
<!-- #termina modulo dos -->
<!-- Features Section -->
<div class="row">
<div class="col-lg-12">
<h2 class="page-header">Corporativo</h2>
  </div>
  <div class="col-md-6">
<p align="justify">Con un poco m&aacute;s de 10 a&ntilde;os de presencia en el mercado mexicano con las marcas VW Camiones y Autobuses y MAN, estamos orgullosos de ofrecer las mejores soluciones del transporte de carga y pasaje en M&eacute;xico. MAN Truck &amp; Bus M&eacute;xico siempre preocupado por la satisfacci&oacute;n de nuestros clientes, cuenta con l&iacute;neas de ensamble en la Ciudad de Quer&eacute;taro, donde los mejores camiones y autobuses son fabricados.</p>
    <p align="justify">Llevar soluciones a la medida y la mejor relaci&oacute;n calidad-precio a sus clientes en M&eacute;xico MAN Truck &amp; Bus M&eacute;xico, cuenta con diferentes certificaciones de calidad de la industria Automotriz.<br>
      <br>
MAN Truck &amp; Bus M&eacute;xico ofrece una l&iacute;nea completa de camiones y autobuses marca Volkswagen y marca MAN, con m&aacute;s de 16 modelos disponibles comercializados en todo nuestro pa&iacute;s.</p>
    <p>&nbsp;</p>
  </div>
  <div class="col-md-6"> <img src="img/307112700convencion.jpg" alt="" width="700" height="450" class="img-responsive"> </div>
</div>
<!-- /.row -->
<hr>
<!-- Call to Action Section -->
<div class="well">
  <div class="row">
    <div class="col-md-8">
      <p>De acuerdo a lo Previsto en la &ldquo;Ley Federal de  Protecci&oacute;n de Datos Personales en Posesi&oacute;n de los Particulares&rdquo;, declara MAN  TRUCK &amp; BUS M&Eacute;XICO, S.A. DE C.V., ser una empresa legalmente constituida de  conformidad con las leyes mexicanas, con domicilio en Avenida Santa Rosa de  Viterbo S/N, Lote 7, Manzana II, Parque Industrial Finsa, El Marqu&eacute;s,  Quer&eacute;taro, C.P. 76246, y como responsable del tratamiento de sus datos personales,  hace de su conocimiento que la informaci&oacute;n&nbsp;  de nuestros clientes es tratada de forma estrictamente confidencial por  lo que al proporcionar sus datos personales</p>
    </div>
    <div class="col-md-4"> <a class="btn btn-lg btn-default btn-block"  href="#">Ver aviso de privacidad </a> </div>
  </div>
</div>
<hr>
<!-- Footer -->
<footer>
<div class="row">
<div class="col-lg-12">
<p>Copyright &copy; MTB M&eacute;xico 2017</p>
    </div>
  </div>
</footer>
</div>
<!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
</body>
</html>
<?php
mysql_free_result($rsPoliticas);
?>
