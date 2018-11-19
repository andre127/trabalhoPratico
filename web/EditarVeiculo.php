<!DOCTYPE html>
<?php
   include "utils.php";
   
?>
<html lang="en">
    
<head>
  <meta http-equiv=Content-Type" content="text/html; "/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Formulário Editar Cadastro Veículo</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="shortcut icon" type="image/ico" href="form.ico"/>
</head>

<body>  
    <div class="container">
        <div class="section">
	    <div class="card-panel z-depth-5" >
                <form  method="POST" id="FormVei" action="UploadVeiculo.php" enctype="multipart/form-data">
                    <h4>Formulário Editar Cadastro Veículo</h4>
		    <div class="col s6 offset-s3">
			<div class="row">
			    <div class="input-field col s6">
				<input id="placa" name="placa" type="text" class="form validate">
				<label for="placa">Placa</label>
			    </div>          
			</div>
		        <div class="row">
			    <div class="input-field col s6">
				<input id="nome" name="nome" type="text" class="form validate">
				<label for="nome">Nome</label>
			    </div>          
			</div>
			<div class="row">
			    <div class="input-field col s6">
				<input id="marca" name="marca" type="text" class="form validate">
				<label for="marca">Marca</label>
			    </div>          
			</div>
			<div class="row">
			    <div class="input-field col s6">
				<input id="modelo" name="modelo" type="text" class="form validate">
				<label for="modelo">Modelo</label>
			    </div>          
			</div>
                        <div class="row">
			    <div class="input-field col s6">
				<input id="cor " name="cor" type="text" class="form validate">
				<label for="cor">Cor</label>
			    </div>          
			</div>
			<div class="row">
			    <div class="input-field col s6">
				<input id="valorSeguro" name="valorSeguro" type="text" class="form validate">
				<label for="valorSeguro">Valor Seguro</label>
			    </div>          
			</div>
			<div class="row">
			    <div class="input-field col s6">
				<input id="valorLocacao" name="valorLocacao" type="text" class="form validate">
				<label for="valorLocacao">Valor Locação</label>
			    </div>          
			</div>
                        <div class="row">
                            <div class="input-field col s6">
                                <select id="ativo" name="ativo">
                                    <option value="" disabled selected>Status</option>
                                    <option value="1">Ativo</option>
                                    <option value="0">Desativado</option>
                                </select>
                            </div>       
			</div>
                        <div class="row">
                            <div class="input-field col s6">
                                <label for="img">Imagem</label><br><br>
				<input id="img" name="img" type="file" class="form validate">
			    </div>          
			</div>
			<div class="row">
			    <button class="btn waves-effect waves-light" type="submit" name="acao" value="salvar">Salvar</button>
			    <button class="btn waves-effect waves-light" type="reset" name="limparVei">Limpar</button>
			    <button class="btn waves-effect waves-light" type="back" name="voltarVei">Voltar</button>
                        
			</div>
		    </div>
		</form>
	    </div>
	</div>
    </div>
    <!--  Scripts <script src="js/jquery-3.3.1.js"></script>-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
    <script src="js/init.js"></script>
</body>

</html>
