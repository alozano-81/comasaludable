<?php
include 'functions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();

$stmt = $pdo->prepare('SELECT * FROM materiales ORDER BY id ');
$stmt->execute();
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($contacts as $hora){
    echo $hora["id"];
}

?>

<?=template_header('Home')?>

<div class="content">
	<h2>MER Ventas</h2>
	<p>Administracion Ventas Team</p>
	<a href=read.php>Consultar</a>
	<a href=create.php>Creacion</a>
	<a href=update.php>Actualizar</a>
	<a href=delete.php>Borrar</a>
	
</div>


<div class="col-xs-4">
    <h3>Facturado a:</h3>
    <br>
	 <strong>Cliente:</strong>
       
    <ul class="list-unstyled">
        <select class="form-control" name="cliente" id="consulCliente">
            <option value="" selected disabled>Seleccione el Cliente...</option>         
			<?php foreach ($contacts as $fila): ?>
                    <option value="<?php echo $fila['id'] ?>">  <?php echo $fila['nombre']; ?> </option>           
			<?php endforeach; ?>
        </select>         
    </ul>
    <div class="col-xs-10" >
    </div>
</div>
<div class="col-xs-4">
    <ul class="list-unstyled">
        <div class="list-unstyled" id="consulta"></div>
    </ul>
</div>




<?=template_footer()?>