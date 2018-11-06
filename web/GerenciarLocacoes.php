<html lang="en">
<head>
  <meta http-equiv=Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Locacao</title>

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
      <form id="Formulario" action="action.php">
  			<div class="col s6 offset-s3">
          <div class="row">
            <div class="input-field col s12">
              <input id="numero" name="numero" type="text" class="form validate">
              <label for="numero">Numero</label>
            </div>          
          </div>
		  <div class="row">
            <div class="input-field col s12">
              <input id="placa" name="placa" type="text" class="form validate">
              <label for="placa">Placa do carro</label>
            </div>          
          </div>
                            <!--
          <div class="row">
             <div class="input-field col s12">
                <select id="sexo" name="sexo" class="form">              
                  <option value="1" selected>Masculino</option>
                  <option value="2">Feminino</option>
                  <option value="3">Outros</option>
                </select>
                <label>Sexo</label>
              </div>
          </div>   -->
          <div class="row">
            <div class="input-field col s4">
             <input id="dataLoc" name="dataLoc" type="text" class="datepicker form">
			 <label for="dataLoc">Data retirada </label>
			</div>
			<div class="input-field col s4">
			 <input id="horaRetirada" name="horaRetirada" type="text" class="form validate">
              <label for="horaRetirada">Hora de retirada</label>
           </div>
              <div class="input-field col s4">
			 <input id="KmRetirada" name="KmRetirada" type="text" class="form validate">
              <label for="KmRetirada">Km na retirada</label>
           </div>
        </div>
          <div class="row">
            <div class="input-field col s4">
             <input id="dataDevolucao" name="dataDevolucao" type="text" class="datepicker form">
			 <label for="dataDevolucao">Data devolucao </label>
			</div>
			<div class="input-field col s4">
			 <input id="horaDevolucao" name="horaDevolucao" type="text" class="form validate">
              <label for="horaDevolucao">Hora devolucao</label>
           </div>
              <div class="input-field col s4">
			 <input id="KmDevolucao" name="KmDevolucao" type="text" class="form validate">
              <label for="KmDevolucao">Km na devolucao</label>
           </div>
        </div>
<!--           <div class="row">
            <div class="input-field col s12">
              <input id="email" type="email" name="email" class="validate form">
              <label for="email">Email</label>
            </div>
          </div> -->
          <div class="row">
              <div class="col s2">
            <button class="btn waves-effect waves-light" type="submit" name="action">Confirmar
              <i class="material-icons right">send</i>
            </button>
             </div>
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
