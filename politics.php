<?php require_once('Connections/oConn.php'); ?>
<?php
$colname_rsPolitica = "-1";
if (isset($_GET['IDPolitica'])) {
  $colname_rsPolitica = (get_magic_quotes_gpc()) ? $_GET['IDPolitica'] : addslashes($_GET['IDPolitica']);
}
mysql_select_db($database_oConn, $oConn);
$query_rsPolitica = sprintf("SELECT * FROM mtbPoliticas WHERE IDPolitica = %s", $colname_rsPolitica);
$rsPolitica = mysql_query($query_rsPolitica, $oConn) or die(mysql_error());
$row_rsPolitica = mysql_fetch_assoc($rsPolitica);
$totalRows_rsPolitica = mysql_num_rows($rsPolitica);
?>
<?php
	include_once("top.php");
?>

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Políticas
                    <small>MTB México </small>
          </div>
        </div>
        <!-- /.row -->

        <!-- Intro Content -->
        <div class="row">
            <div class="col-md-6">
                <img class="img-responsive" src="http://placehold.it/750x450" alt="">
            </div>
            <div class="col-md-6">
                <h2><?php echo $row_rsPolitica['Titulo']; ?></h2>
                <?php echo $row_rsPolitica['Descripcion']; ?>
				
				<div align="center"><br />
        			<a href="<?php echo $row_rsPolitica['RutaDocumento']; ?>" class="btn btn-default">Ver Archivo </a>            
		      	</div>
				
				
          </div>
        </div>
        <!-- /.row -->
        
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; MTB México 2017</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
<?php
mysql_free_result($rsPolitica);
?>
