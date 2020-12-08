$(document).ready(function(){
    $('#add_cidades').hide();
});

$(document).ready(function(){
    $("#estados").change(function(){
        $('#add_cidades').show();

        var valor = $('#estados').val();
        $('#cidades').load('cidades.php?estado=' + valor);
    });
});