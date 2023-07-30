$(document).ready(function() {
    $('.quantidade-produto').on('click', '.btn-quantidade', function() {
      var inputQuantidade = $(this).siblings('.input-quantidade');
      var action = $(this).data('action');
      var quantidade = parseInt(inputQuantidade.val());
  
      if (action === 'decrement' && quantidade > 1) {
        quantidade--;
      } else if (action === 'increment') {
        quantidade++;
      }
  
      inputQuantidade.val(quantidade);
    });
});
  
$(document).ready(function() {
    $('.quantidade-produto').on('click', '.btn-quantidade', function() {
      var inputQuantidade = $(this).siblings('.input-quantidade');
      var action = $(this).data('action');
      var quantidade = parseInt(inputQuantidade.val());
  
      if (action === 'decrement' && quantidade > 1) {
        quantidade--;
      } else if (action === 'increment' && quantidade < 10) {
        quantidade++;
      }
  
      inputQuantidade.val(quantidade);
    });
  
    $('.quantidade-produto').on('input', '.input-quantidade', function() {
      var quantidade = parseInt($(this).val());
      if (quantidade < 1) {
        $(this).val(1);
      } else if (quantidade > 10) {
        $(this).val(10);
      }
    });
});
  