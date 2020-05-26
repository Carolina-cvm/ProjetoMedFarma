<!-------------------------------------------------------------------------------
Oficina Desenvolvimento Web
PUCPR

MENU.PHP

Profa. Cristina V. P. B. Souza
Novembro/2018
---------------------------------------------------------------------------------->
	<!-- Top -->
	<style>
	.myButton {
	box-shadow:inset 0px 1px 0px 0px #ffffff;
	background:linear-gradient(to bottom, #ffffff 5%, #f6f6f6 100%);
	background-color:#ffffff;
	border:1px solid #dcdcdc;
	display:inline-block;
	cursor:pointer;
	color:#666666;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:8px 34px;
	text-decoration:none;
	text-shadow:0px 1px 0px #ffffff;
}
.myButton:hover {
	background:linear-gradient(to bottom, #f6f6f6 5%, #ffffff 100%);
	background-color:#f6f6f6;
}
.myButton:active {
	position:relative;
	top:1px;
}
.css-input { border-width:2px;
	 border-color:#cccccc; 
	 border-style:solid;
	  padding:4px; 
	  font-size:16px; 
	  box-shadow: 0px 0px 5px 0px rgba(42,42,42,.75);  
	  width:600px;} 
		 .css-input:focus { outline:none; } 

        



 
    </style>
	
	<div class="w3-top">
		<div class="w3-row w3-white w3-padding">
			<div class="w3-half" style="margin:4px 0 6px 0"><a href="."><img src='Imagens/Logo1.png' alt=' IE Exemplo '></a>
			</div>
			<div class="w3-half w3-margin-top w3-wide w3-hide-medium w3-hide-small">
				<div class="w3-right">MedFarma</div>
			</div>
		</div>
		<div class="w3-bar w3-theme w3-large" style="z-index:4;">
			<a class="w3-bar-item w3-button w3-left w3-hide-large w3-hover-white w3-large w3-theme w3-padding-16" href="javascript:void(0)" onclick="w3_open()">☰</a>
			<a class="w3-bar-item w3-button w3-hide-medium w3-hide-small w3-hover-white w3-padding-16" href="javascript:void(0)" onclick="w3_show_nav('menuProf')">Medicamentos </a>
			
			
			
			
			
		</div>
	</div>

	<!-- Sidebar -->
	<div class="w3-sidebar w3-bar-block w3-collapse w3-animate-left" style="z-index:3;width:270px" id="mySidebar">
		<div class="w3-bar w3-hide-large w3-large">
			<a href="javascript:void(0)" onclick="w3_show_nav('menuProf')"
			   class="w3-bar-item w3-button w3-theme w3-hover-white w3-padding-16" style="width:50%">Ofertas</a>
			<a href="javascript:void(0)" onclick="w3_show_nav('menuDisc')"
			   class="w3-bar-item w3-button w3-theme w3-hover-white w3-padding-16" style="width:50%">Medicamentos</a>
			
		</div>
		<a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-right w3-xlarge w3-hide-large"
		   title="Close Menu">×</a>
		<div id="menuProf" class="myMenu">
			<div class="w3-container">
				<h3>Medicamentos</h3>
			</div>
			<a class="w3-bar-item w3-button" href="profListar.php">Relação dos Medicamentos</a>
			<a class="w3-bar-item w3-button" href="Ofertas.php">Relação de Ofertas</a>
			


		</div>
		<div id="menuDisc" class="myMenu" >
			<div class="w3-container">
				
			</div>
			

		</div>
		<div id="menuTurma" class="myMenu" >
			<div class="w3-container">
				
			</div>
			
		</div>
	</div>

