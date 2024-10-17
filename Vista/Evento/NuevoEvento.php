<?php
include_once '../../configuracion.php';
$link = "";
$linkMenu = "../";
$titulo = "Nuevo evento";
include_once '../Estructura/Header.php';
?>

<div class="container d-flex justify-content-center">
    <div class="col-md-5">
        <br>
        <div class="d-flex justify-content-center">
            <h3>Nuevo evento</h3>
        </div>
        <div>
            <form name="formEvento" id="formEvento" method="post" action="Accion/AccionNuevoEvento.php" enctype="multipart/form-data" class="needs-validation" novalidate>
                <label class="form-label text-muted" for="summary">Evento</label>
                <input type="text" name="summary" id="summary" class="form-control" required><br>
                <!---->
                <label class="form-label text-muted" for="start">Fecha de comienzo</label>
                <input type="date" name="start" id="start" class="form-control" required><br>
                <!---->
                <label class="form-label text-muted" for="end">Fecha de finalizaci&oacute;n</label>
                <input type="date" name="end" id="end" class="form-control" required><br>
                <!---->
                <label class="form-label text-muted" for="startTime">Hora de comienzo</label>
                <input type="time" name="startTime" id="startTime" class="form-control" required><br>
                <!---->
                <label class="form-label text-muted" for="endTime">Hora de finalizaci&oacute;n</label>
                <input type="time" name="endTime" id="endTime" class="form-control" required><br>
                <!---
                <label class="form-label text-muted" for="mask">Pintar calendario</label><br>
                <input type="radio" name="mask" id="si" class="form-radio" required><span class="text-muted"> Si</span><br>
                <input type="radio" name="mask" id="no" class="form-radio" required><span class="text-muted"> No</span><br><br>-->

                <div class="d-flex justify-content-center">
                    <input type="submit" value="Aceptar" class="btn btn-success col-md-5">
                </div>
                <br>
            </form>
        </div>
    </div>
</div>

<?php
$src = "../JS/NuevoEvento.js";
include_once '../Estructura/footer.php';
?>