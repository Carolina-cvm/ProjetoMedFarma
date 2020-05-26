<!-------------------------------------------------------------------------------
Oficina Desenvolvimento Web
PUCPR

RODAPE.PHP

Profa. Cristina V. P. B. Souza
Novembro/2018
---------------------------------------------------------------------------------->

    <!-- Sobre -->

    <div id="id01" class="w3-modal w3-animate-opacity">
        <div class="w3-modal-content">
            <header class="w3-container w3-theme">
                <span onclick="document.getElementById('id01').style.display='none'"
                      class="w3-button w3-display-topright">&times;</span>
                <center><h2>MedFarma</h2></center>
            </header>
            <div class="w3-container">
                <p>Descrição:A MedFarma é um Site Web de consultas e compras de medicamentos com o melhor custo-beneficio, levando em conta a localização do cliente com as farmácias. Também temos o diferencial das promoções do dia, que com apenas um qr code, o cliente obtém descontos especiais.
            Disponibilizamos as informações sobre cada medicamento, para garantir um melhor conhecimento do produto.
Esse site foi realizado para facilitar a consulta e compra de medicamentos, sem sair de casa!  </b></p>
                
           </div>
            <footer class="w3-container w3-theme ">
                <p> </p>
            </footer>
        </div>
    </div>


    <script>
        // Script para abrir e fechar o sidebar
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }

        function w3_show_nav(name) {
            document.getElementById("menuProf").style.display = "none";
            document.getElementById("menuDisc").style.display = "none";
			document.getElementById("menuTurma").style.display = "none";
            document.getElementById(name).style.display = "block";

        }
    </script>

