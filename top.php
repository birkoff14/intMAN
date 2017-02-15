<?php require_once('Connections/oConn.php'); ?>
<?php
mysql_select_db($database_oConn, $oConn);
$query_rsAreas = "SELECT * FROM mtbAreas";
$rsAreas = mysql_query($query_rsAreas, $oConn) or die(mysql_error());
mysql_query("SET NAMES 'utf8'");
$row_rsAreas = mysql_fetch_assoc($rsAreas);
$totalRows_rsAreas = mysql_num_rows($rsAreas);

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


// loune 25/3/2006, updated 22/08/2009
// For more information see:
// http://siphon9.net/loune/2007/10/simple-lightweight-ntlm-in-php/
//
// This script is obsolete, you should see
// http://siphon9.net/loune/2009/09/ntlm-authentication-in-php-now-with-ntlmv2-hash-checking/
//

// NTLM specs http://davenport.sourceforge.net/ntlm.html

$headers = apache_request_headers();

if (!isset($headers['Authorization'])){
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: NTLM');
    exit;
}

$auth = $headers['Authorization'];

if (substr($auth,0,5) == 'NTLM ') {
    $msg = base64_decode(substr($auth, 5));
    if (substr($msg, 0, 8) != "NTLMSSP\x00")
        die('error header not recognised');

    if ($msg[8] == "\x01") {
        $msg2 = "NTLMSSP\x00\x02\x00\x00\x00".
            "\x00\x00\x00\x00". // target name len/alloc
            "\x00\x00\x00\x00". // target name offset
            "\x01\x02\x81\x00". // flags
            "\x00\x00\x00\x00\x00\x00\x00\x00". // challenge
            "\x00\x00\x00\x00\x00\x00\x00\x00". // context
            "\x00\x00\x00\x00\x00\x00\x00\x00"; // target info len/alloc/offset

        header('HTTP/1.1 401 Unauthorized');
        header('WWW-Authenticate: NTLM '.trim(base64_encode($msg2)));
        exit;
    }
    else if ($msg[8] == "\x03") {
        function get_msg_str($msg, $start, $unicode = true) {
            $len = (ord($msg[$start+1]) * 256) + ord($msg[$start]);
            $off = (ord($msg[$start+5]) * 256) + ord($msg[$start+4]);
            if ($unicode)
                return str_replace("\0", '', substr($msg, $off, $len));
            else
                return substr($msg, $off, $len);
        }
        $user = get_msg_str($msg, 36);
        $domain = get_msg_str($msg, 28);
        $workstation = get_msg_str($msg, 44);

        //print "You are $user from $domain/$workstation";
    }
}

mysql_select_db($database_oConn, $oConn);
$query_rsUsuario = "SELECT * FROM mtbUsuarios WHERE Usuario = '$user'";
$rsUsuario = mysql_query($query_rsUsuario, $oConn) or die(mysql_error());
$row_rsUsuario = mysql_fetch_assoc($rsUsuario);
$totalRows_rsUsuario = mysql_num_rows($rsUsuario);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<!--meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /-->
<link rel="shortcut icon" href="img/man.ico" type="image/x-icon" >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Intranet MTB M&eacute;xico</title>	

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<style type="text/css">
	<!--
	.littleFont {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 6px;
	}
	-->
	</style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="52%"><img src="img/DualBrand_ESP03_logo_fundo_branco1.jpg" /></td>
			<td width="48%"><div align="right"><font color="#FFFFFF"><?php echo $row_rsUsuario['Nombre']; ?>&nbsp;</font></div></td>
	  </tr>
	</table>
		</div>
        <!-- /.container -->		
		<table class="littleFont" width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td bgcolor="#E40045">
		  <font color="#E40045" class="littleFont">.</font>
		  </td>
        </tr>		
	</table>	
    </nav>
	
	
	<!-- -->
	
	
	<!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <!--ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol-->

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url(img/Carga-Pasaje.jpg);"></div>
                <!--div class="carousel-caption">
                    <h2>Caption 1</h2>
                </div-->
            </div>
            <!--div class="item">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Two');"></div>
                <div class="carousel-caption">
                    <h2>Caption 2</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Three');"></div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                </div>
            </div-->
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>
	
		
    <!-- Page Content -->
    <div class="container">	
		<!-- Page Heading/Breadcrumbs -->
        <!--div class="row"-->		
            <!--div class="col-lg-12"-->
                <ol class="breadcrumb">
                    <li>
						<a href="index.php" class="active">Home</a>					</li>
                    <?php do { ?>
                      <li><?php echo $row_rsAreas['Descripcion']; ?></li>
                    <?php } while ($row_rsAreas = mysql_fetch_assoc($rsAreas)); ?>
				</ol>
            <!--/div-->
        <!--/div-->
        <!-- /.row -->
        <?php
mysql_free_result($rsAreas);

mysql_free_result($rsUsuario);
?>
