{{>header}}


<body>

<div class="w3-container w3-display-container w3-section w3-section" style="margin-top: 5rem !important;">


    <div class="w3-cell-row w3-section" style="height: 32.339rem;">

        <div class="w3-container w3-half" style="height: 32.339rem;">
            <img class="w3-image" src="img/nova.png" alt="Architecture"
                 style="height: 100%; object-fit: cover; object-position: left;">
        </div>

        <div class="w3-container w3-light-grey w3-half w3-center w3-padding-64"
             style="height: 100%; display: flex; flex-direction: column; justify-content: space-between;">

            {{#datos}}
            <div>
                <h2 class="w3-section" style="font-weight: bold; ">{{0}}</h2>
                <h5>{{1}}</h5>
            </div>
            {{/datos}}

            <div class="w3-center">
                <a href="index.php" class="w3-button w3-black w3-hover-orange" style="width: 50%;">Volver al
                    <b>inicio</b></a>
            </div>
        </div>

    </div>
</div>
</body>


{{>footer}}