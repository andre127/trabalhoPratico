<!DOCTYPE html>
<?php
   include "utils.php";
?>
<html lang="en">
<head>
  <meta http-equiv=Content-Type" content="text/html; "/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Cadastro Veiculo</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="shortcut icon" type="image/ico" href="form.ico"/>
</head>
<body>  
<div class="container">
	<div class="section">
	    <div class="row">
                <form id="FormularioVei" method="POST" id="FormVei">
			    <div class="col s6 offset-s3">
					<div class="row">
						<div class="input-field col s12">
							<input id="placa" name="placa" type="text" class="form validate">
							<label for="placa">Placa</label>
						</div>          
					</div>
				    <div class="row">
						<div class="input-field col s12">
							<input id="nome" name="nome" type="text" class="form validate">
							<label for="nome">Nome</label>
						</div>          
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="marca" name="marca" type="text" class="form validate">
							<label for="marca">Marca</label>
						</div>          
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="modelo" name="modelo" type="text" class="form validate">
							<label for="modelo">Modelo</label>
						</div>          
					</div>
                                        <div class="row">
						<div class="input-field col s12">
							<input id="cor " name="cor " type="text" class="form validate">
							<label for="cor">Cor</label>
						</div>          
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="seguro" name="seguro" type="text" class="form validate">
							<label for="seguro">Valor Seguro</label>
						</div>          
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="valor" name="valor" type="text" class="form validate">
							<label for="valor">Valor Locação</label>
						</div>          
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="cor" name="cor" type="text" class="form validate">
							<label for="cor">Cor</label>
						</div>          
					</div>
					<div class="row">
						<button class="btn waves-effect waves-light" type="submit" name="acao" value="salvarVei">Salvar</button>
						<button class="btn waves-effect waves-light" type="reset" name="limparVei">Limpar</button>
						<button class="btn waves-effect waves-light" type="back" name="voltarVei">Voltar</button>
					</div>
			    </div>
		    </form>
		</div>
	</div>
  </div>

  <!--  Scripts-->
  <script src="js/jquery-3.3.1.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
