$(document).ready(function() {
 
    function resetInputs() {
        $('#altura').val('');
        $('#largura').val('');
        $('#profundidade').val('');
        $('#diametro').val('');
    
    }

    $('#enviar').on('click', function () {
        console.log("Botão clicado");

        //$("#BtnUpload").show();
        //$("#btnAdicionar").hide();

        var nome = $('#nome').val();
        console.log("Nome: " + nome);

        $.ajax({
            url: 'assets/ajax/carregar_antenas_info.php',
            type: 'POST',
            data: {modelo_id: modeloID},
            dataType: 'json', // Especifica o tipo de dados esperado na resposta
            success: function(response) {
                console.log(response.altura);                    
                $('#altura').val(response.altura);
                $('#largura').val(response.largura);
                $('#profundidade').val(response.profundidade);
                $('#diametro').val(response.diametro);
                console.log(tipoID);

                if (response.altura != null && tipoID == 1) {
                    console.log("not null e tipo 1");
                    $("#altura").addClass('form_input_readonly').prop('readonly', true);
                    $("#largura").addClass('form_input_readonly').prop('readonly', true);
                    $("#profundidade").addClass('form_input_readonly').prop('readonly', true);
                    $("#diametro").addClass('form_input_readonly').prop('readonly', true);
                } else {
                    console.log("null ou tipo diferente de 1");
                    resetInputs()
                }                    
                
            }
        });

    })

});