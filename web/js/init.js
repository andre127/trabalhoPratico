(function ($) {
    $(function () {
        $('.modal-trigger').leanModal();
        $('.parallax').parallax();
        $('.carousel').carousel();
        $('.slider').slider();
        $('.sidenav').sidenav();
    });
    $('#teste').click(function (){
        $('#nomeCliente').val('teste');
    });
    
    $(function(){
         $('.linhas').click(function (){
          var linha = $(this);
          if(confirm("Deseja mesmo exluir "+$(this).find(":nth-child(2)").html()+"?")){
            //Exclui a pessoa
              $.post('GerenciamentoCliente.php',{tipo:"funcionario",acao:'excluir',id:$(this).children().first().html()}).done(function (data) {
                  if(data==""){
                    linha.remove();
                  }
              });
          }
      });
     
  }); // end of document ready
 

    
    

})(jQuery); // end of jQuery name space
