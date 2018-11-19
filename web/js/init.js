(function ($) {
    $(function () {
        $('.modal-trigger').leanModal();
        $('.parallax').parallax();
        $('.carousel').carousel();
        $('.slider').slider();
        $('.sidenav').sidenav();
    });
    
    // end of document ready
    $('.linhas').click(function () {
       // var linha = $(this);
       // if (confirm("Deseja mesmo exluir " + $(this).find(":nth-child(1)").html() + "?")) {
           
   
            window.open("http://localhost/trabalhoPratico/web/CadastroCliente.php");
             $('nomeCliente').val('teste');
           
           // $.post('acoes.php', {tipo: "cliente", acao: 'editar', id: $(this).children().first().html()})//.done(function (data) {
           
      
 // 
// if (data == "") {
                   // linha.remove();
                //}
           // });
     //   }
    });
    
    $(function(){
        $('').val(' ')
        
    });

})(jQuery); // end of jQuery name space
