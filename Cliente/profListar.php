<!DOCTYPE html>
    <!--
     Desenvolvimento Web
     PUCPR
     Profa. Cristina V. P. B. Souza
     Abril/2020
    -->
    <html>
    <head>
    <title>MedFarma</title>
    <link rel="icon" type="image/png" href="imagens/IE_favicon.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .w3-theme {
            color: #ffff !important;
            background-color: #c53135 !important
        }

        .w3-code {
            border-left: 4px solid #c53135
        }

        .myMenu {
            margin-bottom: 150px
        }
    </style>
    </head>
    <body  onload="w3_show_nav('menuProf')">
    <!-- Inclui MENU.PHP  -->
    <?php require 'menu.php'; ?>

    <!-- Conteúdo Principal: deslocado para direita em 270 pixels quando a sidebar é visível -->
    <div class="w3-main w3-container" style="margin-left:270px;margin-top:117px;">

        <div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
            <h1 class="w3-xxlarge">Relação dos Medicamentos</h1>
            <form method="POST" action="pesquisar.php">


            <input type="text" class="css-input" name="pesquisar" placeholder="Pesquisar Medicamento">
            <input type="submit" class="myButton" value="ENVIAR">

            </form>
			
  			


 

 

            <p class="w3-large">
            <p>
            <div class="w3-code cssHigh notranslate">
                <!-- Acesso em:-->
                <?php

                    date_default_timezone_set("America/Sao_Paulo");
                    $data = date("d/m/Y H:i:s", time());
                    echo "<p class='w3-small' > ";
                    echo "Acesso em: ";
                    echo $data;
                    echo "</p> "
                ?>

                <!-- Acesso ao BD-->
                <?php
                    $servername = "localhost:3306";
                    $username = "root";
                    $password = "rany";
                    $database = "MedFarma";

                    // Cria conexão
                    $conn = mysqli_connect($servername, $username, $password, $database);
                    
                    // Verifica conexão 
                    if (!$conn) {
                        echo "</table>";
                        echo "</div>";
                        die("Falha na conexão com o Banco de Dados: " . mysqli_connect_error());
                    }
                    
                    // Configura para trabalhar com caracteres acentuados do português
                    mysqli_query($conn,"SET NAMES 'utf8'");
                    mysqli_query($conn,"SET NAMES 'utf8'");
                    mysqli_query($conn,'SET character_set_connection=utf8');
                    mysqli_query($conn,'SET character_set_client=utf8');
                    mysqli_query($conn,'SET character_set_results=utf8');
                    

                    // Faz Select na Base de Dados
                    $sql = "SELECT * FROM medicamento";
                    if ($result = mysqli_query($conn, $sql)) {
                        echo "<table class='w3-table-all'>";
                        echo "	<tr>";
                        
                        echo "	  <th> Id Medicamento</th>";
                      
                        echo "	  <th>Nome</th>";
                        echo "	  <th>Gramagem</th>";
                       
                        echo "	  <th>Valor</th>";
                         echo "	  <th>Endereço</th>";
                        echo "	  <th> </th>";
                        echo "	  <th> </th>";
                        echo "	</tr>";
                        if (mysqli_num_rows($result) > 0) {
                            // Apresenta cada linha da tabela
                            while ($row = mysqli_fetch_assoc($result)) { 
                                $cod = $row["idMedicamento"];
                                echo "<tr>";
                                echo "<td>";
                                echo $cod;
                                echo "</td><td>";
                                echo $row["Nome"];
                                echo "</td><td>";
                                echo $row["Gramagem"];                    
                                echo "</td><td>";
                                echo "R$";
                                echo $row["Valor"];
                                echo "</td><td>";
                                echo $row["Endereco"];
                                echo "</td><td>";
                                //Atualizar e Excluir registro de prof
                ?>
                            
                            <a href='compra.php?id=<?php echo $cod; ?>'><img src='imagens/Edit.png' title='Realizando Comprar' width='32'></a>
                            </td><td>
                <?php
                            }
                        }
                            echo "</table>";
                            echo "</div>";
                    } else {
                        echo "Erro executando SELECT: " . mysqli_error($conn);
                    }

                    mysqli_close($conn);



                ?>
            </div>
        </div>


        <footer class="w3-panel w3-padding-32 w3-card-4 w3-light-grey w3-center w3-opacity">
            <p>
                <nav>
                    <a class="w3-button w3-theme w3-hover-white"
                    onclick="document.getElementById('id01').style.display='block'">Sobre</a>
                </nav>
            </p>
        </footer>

    <!-- FIM PRINCIPAL -->
    </div>
    <!-- Inclui RODAPE.PHP  -->
    <?php require 'rodape.php';?>
    </body>
    </html>
