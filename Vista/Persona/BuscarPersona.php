<?php
$link = "";
$linkMenu = "../";
$titulo = "Buscar persona";
include_once "../Estructura/Header.php";
?>

<div class="container d-flex justify-content-center">
    <div class="col-md-5">
        <br>
        <div class="d-flex justify-content-center">
            <h3>Buscar persona</h3>
        </div>
        <div>
            <form name="formBuscarPersona" id="formBuscarPersona" method="post" action="Accion/AccionBuscarPersona.php"
                enctype="multipart/form-data" class="needs-validation" novalidate>
                <label class="form-label text-muted" for="NroDni">DNI</label>
                <input type="number" name="NroDni" id="NroDni" class="form-control" required><br><br>
                <div class="d-flex justify-content-center">
                    <input type="submit" value="Buscar" class="btn btn-success col-md-3">
                </div>
                <br>
            </form>
        </div>
    </div>
</div>

<?php
$src = "../JS/BuscarPersona.js";
include_once "../Estructura/footer.php";
?>
