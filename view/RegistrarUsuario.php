{{>header}}

<body>
<div class="w3-container form-flota">
    <img src="img/motor.jpg" class="responsive w3-circle" id="motor">
    <div class="datos w3-card-4 w3-display-right form-full-on-small">
        <div class="w3-container w3-orange w3-opacity">
            <h2>Registrar Usuario</h2>
        </div>
        <form class="w3-container" action="index.php?module=usuario&action=procesarRegistroUsuario" method="POST">
            <div class="w3-padding-32">
                <div class="w3-row-padding">
                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>DNI:</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity" name="dni" type="number" required="">
                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>Nombre:</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity" name="name" type="text" required="">
                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>Apellido:</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity" name="surname" type="text" required="">
                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>Fecha nacimiento:</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity" name="nacimiento" type="date" required="">
                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>Email:</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity" name="email" type="email" required="">
                    </div>

                    <div class="w3-half w3-margin-bottom">
                        <label class="w3-text-orange w3-opacity"><b>Password:</b></label>
                        <input class="w3-input w3-border w3-sand w3-opacity" name="password" type="password"
                               required="">
                    </div>
                </div>

                <div class="w3-panel w3-section">
                    <input class="w3-btn w3-orange w3-opacity" type="submit" value="Registrarse">
                </div>
            </div>
        </form>
    </div>
</div>
</body>
{{>footer}}