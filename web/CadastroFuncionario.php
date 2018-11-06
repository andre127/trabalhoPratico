<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv=Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Cadastro Funcionario</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  
  <div class="container">
	<div class="section">
		<div class="row">
      <form id="Formulario" action="action.php">
  			<div class="col s6 offset-s3">
          <div class="row">
            <div class="input-field col s12">
              <input type="text" class="form validate">
              <label for="nome">Digite o nome do funcionario</label>
            </div>          
          </div>
		  
		            <div class="row">
            <div class="input-field col s12">
              <input type="text" class="form validate">
              <label for="nome">Digite o RG</label>
            </div>          
          </div>
		  
		            <div class="row">
            <div class="input-field col s12">
              <input type="text" class="form validate">
              <label for="nome">Digite o CPF</label>
            </div>          
          </div>
		  
		            <div class="row">
            <div class="input-field col s12">
              <input type="text" class="form validate">
              <label for="nome">Digite o Endereço</label>
            </div>          
          </div>
		  
		  <p>
      <label>
        <input type="checkbox" class="filled-in" checked="checked" />
        <span>Funcionario</span>
      </label>
    </p>
	
	<p>
      <label>
        <input type="checkbox" class="filled-in" checked="checked" />
        <span>Supervisor</span>
      </label>
    </p>
		  
		  <label for="nome">Data de Emissão</label>
          <div class="row">
            <div class="col s12">
             <input id="dataNasc" name="dataNasc" type="text" class="datepicker form">
           </div>
          </div>
		  
		  <label for="nome">Data de Demissão</label>
          <div class="row">
            <div class="col s12">
             <input id="dataNasc" name="dataNasc" type="text" class="datepicker form">
           </div>
          </div>
		  
		  <div class="row">
            <div class="input-field col s12">
              <input id="nome" name="nome" type="text" class="form validate">
              <label for="nome">Nome do funcionario a ser Demitido</label>
            </div>          
          </div>
		  
		  <label for="nome">Data de Demissão do funcionario</label>
          <div class="row">
            <div class="col s12">
             <input id="dataNasc" name="dataNasc" type="text" class="datepicker form">
           </div>
          </div>
		  
          <div class="row">
            <button class="btn waves-effect waves-light" type="submit" name="action">Submeter
              <i class="material-icons right">send</i>
            </button>
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
