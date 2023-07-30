// Aguarde o carregamento completo do documento
document.addEventListener("DOMContentLoaded", function() {
    // Seletor do elemento de opções de pagamento
    var opcoesPagamento = document.querySelector("#opcoes-pagamento");
  
    // Manipulador de evento de clique para o elemento "Continuar Pagamento"
    document.querySelector(".dropdown_car").addEventListener("click", function() {
      opcoesPagamento.classList.toggle("show");
    });
  
    // Manipulador de evento de alteração para os radio buttons
    var radioButtons = document.querySelectorAll("input[type='radio'][name='opcao-pagamento']");
    radioButtons.forEach(function(radioButton) {
      radioButton.addEventListener("change", function() {
        var conteudoOpcao = document.getElementById("conteudo-opcao-" + this.value);
        var todosConteudos = document.querySelectorAll(".conteudo-opcao");
        todosConteudos.forEach(function(conteudo) {
          conteudo.classList.remove("show");
        });
        conteudoOpcao.classList.add("show");
      });
    });
  });
  