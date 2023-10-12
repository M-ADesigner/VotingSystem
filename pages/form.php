<?php

$votante = new Votante();
$jsonData = $votante->getVotante();
$data = json_decode($jsonData);

?>
<h1 class="mb-5 text-white">Formulario de votaciòn</h1>

<form id="form" name="form" method="post" class="row" style="width: 500px; color:white">
    <div class="mb-1 row">
        <label for="nombreApellido" class="col-sm-6 col-form-label">Nombre y Apellido</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="nombreApellido" id="nombreApellido" required>
        </div>
    </div>
    <div class="mb-1 row">
        <label for="alias" class="col-sm-6 col-form-label">Alias</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="alias" name="alias">
        </div>
    </div>
    <div class="mb-1 row">
        <label for="rut" class="col-sm-6 col-form-label">Rut</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" placeholder="Rut a validar, ej: 11111111-1" id="rut" name="rut">
        </div>
    </div>
    <div class="mb-1 row">
        <label for="email" class="col-sm-6 col-form-label">Email</label>
        <div class="col-sm-6">
            <input type="email" id="email" name="email" class="form-control">
        </div>
    </div>
    <div class="mb-1 row">
        <label for="region" class="col-sm-6 col-form-label">Region</label>
        <div class="col-sm-6">
            <select name="region" id="region" class="form-select">
                <option selected></option>
                <option value="metropolitana">Metropolitana</option>
            </select>
        </div>
    </div>
    <div class="mb-1 row">
        <label for="comuna" class="col-sm-6 col-form-label">Comuna</label>
        <div class="col-sm-6">
            <select name="comuna" id="comuna" class="form-select">
                <option selected></option>
                <option value="San Bernardo">San Bernardo</option>
                <option value="El Bosque">El Bosque</option>
            </select>
        </div>
    </div>
    <div class="mb-1 row">
        <label for="candidato" class="col-sm-6 col-form-label">Candidato</label>
        <div class="col-sm-6">
            <select name="candidato" id="candidato" class="form-select" required>
                <option selected>Opciones</option>
                <?php
                foreach ($data as $candidato) {
                ?>
                    <option value="<?= $candidato->candidato ?>"><?= $candidato->candidato ?></option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>


    <div class="d-flex text-xl row mt-3">
        <p class="col-sm-6">
            Como se entero de nosotros?
        </p>
        <div class="col-sm-6">
            <input id="web" name="web" value="web" type="checkbox">
            <label for="web">Web</label>
            <input id="tv" name='tv' value="tv" type="checkbox">
            <label for="tv">TV</label>
            <input id="redesSociales" name='redesSociales' value="redes sociales" type="checkbox">
            <label for="redesSociales">Redes sociales</label>
            <input id="amigo" name="amigo" value="amigo" type="checkbox">
            <label for="amigo">Amigo</label>
        </div>
    </div>
    <input type="submit" class="btn btn-primary w-50 mt-3" value="Votar">
</form>

<script src="http://localhost/php/sistemaVotacion/includes/js/validarRut.js"></script>
<script src="http://localhost/php/sistemaVotacion/includes/js/validarAlias.js"></script>
<script>
    document.getElementById('form').addEventListener('submit', (e) => {
        e.preventDefault();
        const data = Object.fromEntries(new FormData(e.target));
        const selectedOptions = document.querySelectorAll('input[type="checkbox"]:checked');


        const booleanAlias = validarAlias(data.alias)
        const booleanRut = Fn.validaRut(data.rut)
        if (selectedOptions.length < 2) return alert('Debe elegir al menos dos opciones de como se entero de nosotros')

        booleanAlias && booleanRut ?
            $.ajax({
                type: "POST",
                url: 'http://localhost/php/sistemaVotacion/pages/actions.php',
                data: data,
                dataType: 'json',
                success: function(response) {
                    // Manejar la respuesta exitosa
                    console.log("Respuesta exitosa: ", response);
                },
                error: function(err) {
                    console.error("Error: ", err);
                }
            }) :
            alert('Por favor, cumpla con los requisitos para votar.')
    });
</script>