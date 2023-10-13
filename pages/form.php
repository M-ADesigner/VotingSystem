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
            <input type="text" class="form-control" name="nombreApellido" id="nombreApellido" value="maicol" required>
        </div>
    </div>
    <div class="mb-1 row">
        <label for="alias" class="col-sm-6 col-form-label">Alias</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="alias" name="alias" value="tego1">
        </div>
    </div>
    <div class="mb-1 row">
        <label for="rut" class="col-sm-6 col-form-label">Rut</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" placeholder="Rut a validar, ej: 11111111-1" id="rut" name="rut" value="20040916-7">
        </div>
    </div>
    <div class="mb-1 row">
        <label for="email" class="col-sm-6 col-form-label">Email</label>
        <div class="col-sm-6">
            <input type="email" id="email" name="email" class="form-control" value="andresavilamf@gmail.com">
        </div>
    </div>
    <div class="mb-1 row">
        <label for="region" class="col-sm-6 col-form-label">Region</label>
        <div class="col-sm-6">
            <select name="region" id="region" class="form-select">
                <!-- <option selected></option> -->
                <option value="metropolitana">Metropolitana</option>
                <option value="1">Región de Arica y Parinacota </option>
                <option value="2">Región de Tarapacá</option>
                <option value="3">Región de Antofagasta</option>
                <option value="4">Región de Atacama</option>
                <option value="5">Región de Coquimbo</option>
                <option value="6">Región de Valparaíso</option>
                <option value="7">Región Metropolitana de Santiago</option>
                <option value="8">Región del Libertador General Bernardo O'Higgins</option>
                <option value="9">Región del Maule</option>
                <option value="10">Región de Ñuble</option>
                <option value="11">Región del Biobío</option>
                <option value="12">Región de La Araucanía</option>
                <option value="13">Región de Los Ríos</option>
                <option value="14">Región de Los Lagos</option>
                <option value="15">Región de Aysén del General Carlos Ibáñez del Camp</option>
                <option value="16">Región de Magallanes y de la Antártica Chilena</option>
            </select>
        </div>
    </div>
    <div class="mb-1 row">
        <label for="comuna" class="col-sm-6 col-form-label">Comuna</label>
        <div class="col-sm-6">
            <select name="comuna" id="comuna" class="form-select">
                <!-- <option selected></option> -->
                <option value="1"> Arica </option>
                <option value="2"> Iquique </option>
                <option value="3"> Antofagasta </option>
                <option value="4"> Copiapó </option>
                <option value="5"> La Serena</option>
                <option value="6"> Valparaíso </option>
                <option value="7"> Santiago </option>
                <option value="8"> Rancagua </option>
                <option value="9"> Talca </option>
                <option value="10"> Chillán </option>
                <option value="11"> Concepción </option>
                <option value="12"> Temuco </option>
                <option value="13"> Valdivia </option>
                <option value="14"> Puerto </option>
                <option value="15"> Coyhaique </option>
                <option value="16"> Punta </option>
            </select>
        </div>
    </div>
    <div class="mb-1 row">
        <label for="candidato" class="col-sm-6 col-form-label">Candidato</label>
        <div class="col-sm-6">
            <select name="candidato" id="candidato" class="form-select" required>
                <option value="" selected>Opciones</option>
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
            <input id="web" name="chekbox1" value="web" type="checkbox">
            <label for="web">Web</label>
            <input id="tv" name='chekbox2' value="tv" type="checkbox">
            <label for="tv">TV</label>
            <input id="redesSociales" name='chekbox3' value="redes sociales" type="checkbox">
            <label for="redesSociales">Redes sociales</label>
            <input id="amigo" name="chekbox4" value="amigo" type="checkbox">
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

        if (selectedOptions.length !== 2) {
            alert('Debe elegir al menos dos opciones de como se entero de nosotros');
        } else {
            const selectedValues = [];
            selectedOptions.forEach((checkbox) => {
                selectedValues.push(checkbox.value);
            });
            data.checkboxSelecionados = selectedValues;
        }

        const booleanAlias = validarAlias(data.alias);
        if (!booleanAlias) return alert('El alias debe contener al menos 1 número y 1 letra');

        const booleanRut = Fn.validaRut(data.rut);
        if (booleanRut) {
            $.ajax({
                type: "POST",
                url: 'http://localhost/php/sistemaVotacion/pages/actions.php',
                data: data,
                dataType: 'json',
                success: function(response) {

                    if (response === 209) {
                        Swal.fire('El usuario ya ah votado!')
                    } else {
                        Swal.fire('Usuario a votado correctamente!')
                    }
                },
                error: function(err) {
                    console.log(err.responseText);

                    console.error("Error: ", err);
                }
            });
        } else {
            alert('Debe cumplir con el formato del rut.');
        }
    });
</script>