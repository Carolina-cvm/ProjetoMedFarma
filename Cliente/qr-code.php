<html lang="pt">
<!-------------------------------------------------------------------------------
Oficina Desenvolvimento Web
PUCPR

INDEX.PHP

Profa. Cristina V. P. B. Souza
Novembro/2018
*** Para o correto funcionamento do CSS, o equipamento precisa de internet ***
---------------------------------------------------------------------------------->
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

		.myFont {
			font-max-size: 8px
		}
		
		
	</style>

	<body  onload="w3_show_nav('menuProf')">

		<!-- Inclui MENU.PHP  -->
		<?php require 'menu.php'; ?>


		<!-- Conteúdo PRINCIPAL: deslocado para direita em 270 pixels quando a sidebar é visível -->
		<div class="w3-main w3-container" style="margin-left:120px;margin-top:117px;">

			<div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
			<center>
				<h1 class="w3-xxlarge">Cupom de Desconto</h1></center>
				
				<center>
				    <img src="imagens/frame.png"  width="320" height="320" >

					<div class="w3-main w3-container" style="margin-left:120px;margin-top:117px;">
			<?php
		
				$servername = "localhost:3306";
				$username = "root";
				$password = "rany";
				$database = "medfarma";
				$id=$_GET['id'];
				
				// Cria conexão
				$conn = mysqli_connect($servername, $username, $password, $database);

				// Verifica conexão
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}
				// Configura para trabalhar com caracteres acentuados do português
				mysqli_query($conn,"SET NAMES 'utf8'");
				mysqli_query($conn,"SET NAMES 'utf8'");
				mysqli_query($conn,'SET character_set_connection=utf8');
				mysqli_query($conn,'SET character_set_client=utf8');
				mysqli_query($conn,'SET character_set_results=utf8');
				
				// Faz Select na Base de Dados
				$sql = "SELECT idOfertas, Nome, Informacoes,Valor,Endereco FROM ofertamedicamento WHERE idOfertas = $id";
				
				if ($result = mysqli_query($conn, $sql)) {
						if (mysqli_num_rows($result) > 0) {
						// Apresenta cada linha da tabela
							while ($row = mysqli_fetch_assoc($result)) {
								
				?>
								
								</div>
								<form class="w3-container" action="qr-code_exe.php" method="post" onsubmit="return check(this.form)">
									<input type="hidden" id="Id" name="Id" value="<?php echo $row['idOfertas']; ?>">
									<p>
									<label class="w3-text-deep-purple"><b>Nome: </b> <?php echo $row['Nome']; ?> </label></p>
									<p>
									<label class="w3-text-deep-purple"><b>Informaçoes:R$</b><?php echo $row['Informacoes']; ?></label></p>
									<p>
									
									<label class="w3-text-deep-purple"><b>Valor:R$</b><?php echo $row['Valor']; ?></label></p>
									<p>
									<p>
									
									<label class="w3-text-deep-purple"><b>Endereço:</b><?php echo $row['Endereco']; ?></label></p>
									<p>
									<input type="submit" value="Confirmar Pedido?" class="w3-btn w3-red" >
									<input type="button" value="Cancelar" class="w3-btn w3-theme" onclick="window.location.href='Ofertas.php'"></p>
								</form>
			<?php 
						}
					}
			}
			else {
				echo "Erro executando DELETE: " . mysqli_error($conn);
			}
			echo "</div>"; //Fim form
			mysqli_close($conn);  //Encerra conexao com o BD

		?>

		</div>
	</p>
</div>


                </div>
				<footer class="w3-panel w3-padding-32 w3-card-4 w3-light-grey w3-center w3-opacity">
					<p>
						<nav>
						<center>	<a class="w3-button w3-theme w3-hover-white" style="margin-left:120px;margin-top:117px;
							   onclick="document.getElementById('id01').style.display='block'">Sobre</a></center>
						</nav>
					</p>
				</footer>

		<!-- FIM PRINCIPAL -->
			</div>

		<!-- Inclui RODAPE.PHP  -->
		<?php require 'rodape.php';?>
	</body>
</html>