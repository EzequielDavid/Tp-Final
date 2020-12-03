{{>header}}

<body>

<div class="w3-container w3-display-container" >
    <img src="img/motor.jpg" class="responsive w3-circle" id="motor">
    <div class="datos w3-card-4 w3-display-right w3-hide-small">
        <div class="w3-container w3-orange w3-opacity w3-hide-small" >
            <h2>Registrar Usuario</h2>
        </div>
        <form class="w3-container " action="index.php?module=usuario&action=procesarRegistroUsuario" method="POST">
            <p>
                <label class="w3-text-orange w3-opacity"><b>DNI:</b></label>
                <input class="w3-input w3-border w3-sand w3-opacity w3-hide-small" name="dni" type="number" required></p>


            <p id="licencia" style="display: none">
                <label class="w3-text-orange w3-opacity" ><b>Licencia conducir:</b></label>
                <input class="w3-input w3-border w3-sand w3-opacity w3-hide-small" name="licencia" type="number" ></p>

            <p>
                <label class="w3-text-orange w3-opacity"><b>Nombre:</b></label>
                <input class="w3-input w3-border w3-sand w3-opacity w3-hide-small" name="name" type="text" required></p>
            <p>
                <label class="w3-text-orange w3-opacity"><b>Apellido:</b></label>
                <input class="w3-input w3-border w3-sand w3-opacity w3-hide-small" name="surname" type="text" required></p>
            <p>
                <label class="w3-text-orange w3-opacity"><b>fecha nacimiento:</b></label>
                <input class="w3-input w3-border w3-sand w3-opacity w3-hide-small" name="nacimiento" type="date" required></p>

            <p>
                <label class="w3-text-orange w3-opacity"><b>email:</b></label>
                <input class="w3-input w3-border w3-sand w3-opacity w3-hide-small" name="email" type="email" required></p>
            <p>
                <label class="w3-text-orange w3-opacity"><b>password:</b></label>
                <input class="w3-input w3-border w3-sand w3-opacity w3-hide-small" name="password" type="password" required></p>
            <p>
                <input class="w3-btn w3-orange w3-opacity" type="submit" value="Enviar"></p>
        </form>
    </div>
</div>
</body>
{{>footer}}