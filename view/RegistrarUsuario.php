{{>header}}
<body>
<div class="w3-top">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">
        <a href="#home" class="w3-bar-item w3-button w3-hover-orange"><b>NV</b> Nova</a>
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right">
            <a href="#projects" class="w3-bar-item w3-button w3-hover-orange w3-hide-small">Flota</a>
            <a href="#contact" class="w3-bar-item w3-button w3-hover-orange w3-hide-small">Contacto</a>
            <button id="login" class="w3-bar-item w3-button w3-hover-orange">Login</button>
            <div id="login-despegable" class="login-content w3-container w3-center w3-round-large">
                <form method='post' action=''>
                    <input class='user margin-top w3-black w3-round-large' type='text' required=' ' placeholder='User Name' name='user'>
                    <input class='pass margin-top w3-black w3-round-large' type='password' required=' ' placeholder='Password' name='password'>
                    <input class='submit margin-top w3-black w3-round-large' type='submit' value='Login'>
                    <button class='submit createAccount w3-round-large margin-top w3-black'><a href='Users/register.html'>Sing In</a></button>
                </form>
            </div>

        </div>
    </div>
</div>
<div class="w3-container w3-display-container" >
    <img src="img/motor.jpg" class="responsive w3-circle" id="motor">
    <div class="datos w3-card-4 w3-display-right w3-hide-small">
        <div class="w3-container w3-orange w3-opacity w3-hide-small" >
            <h2>Registrar Usuario</h2>
        </div>
        <form class="w3-container " action="index.php?module=registrarUsuario&action=procesarRegistroUsuario" method="POST">
            <p>
                <label class="w3-text-orange w3-opacity"><b>DNI:</b></label>
                <input class="w3-input w3-border w3-sand w3-opacity w3-hide-small" name="dni" type="number" required></p>
            <p>
            <p>
                <label class="w3-text-orange w3-opacity"><b>Nombre:</b></label>
                <input class="w3-input w3-border w3-sand w3-opacity w3-hide-small" name="name" type="text" required></p>
            <p>
                <label class="w3-text-orange w3-opacity"><b>Apellido:</b></label>
                <input class="w3-input w3-border w3-sand w3-opacity w3-hide-small" name="surname" type="text" required></p>
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