<?php
include 'ventas/functions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();

$stmt = $pdo->prepare('SELECT * FROM materiales ORDER BY id ');
$stmt->execute();
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($contacts as $hora) {
  echo $hora["id"];
}

?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="nuevoModal" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="nuevoModalLabel">Comprar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-xs-4">
          <h3>Facturado a:</h3>
          <br>
          <strong>Cliente:</strong>

          <ul class="list-unstyled">
            <select class="form-control" name="cliente" id="consulCliente">
              <option value="" selected disabled>Seleccione el Cliente...</option>
              <?php foreach ($contacts as $fila) : ?>
                <option value="<?php echo $fila['id'] ?>"> <?php echo $fila['nombre']; ?> </option>
              <?php endforeach; ?>
            </select>
          </ul>
          <div class="col-xs-10">
          </div>
        </div>
        <div class="col-xs-4">
          <ul class="list-unstyled">
            <div class="list-unstyled" id="consulta"></div>
          </ul>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>