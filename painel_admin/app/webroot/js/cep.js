 $(document).ready(function() {

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
    }
    
    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#rua").val("Carregando...");
                $("#bairro").val("Carregando...");
                $("#cidade").val("Carregando...");
                $("#uf").val("Carregando...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        document.getElementById("rua").disabled = false;
                        document.getElementById("numero").disabled = false;
                        document.getElementById("bairro").disabled = false;
                        document.getElementById("complemento").disabled = false;
                        document.getElementById("cidade").disabled = false;
                        document.getElementById("uf").disabled = false;
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                        $('#numero').focus();
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });                
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });

    //Quando o campo numero perde o foco.
    $("#numero").blur(function() {
        //Consulta webservice maps para pegar coordenadas geográficas/  
        var end = $("#rua").val() + ", numero " + 
                    $("#numero").val() + " - " + 
                    $("#bairro").val() + ", " +                     
                    $("#cidade").val() + " - " + 
                    $("#uf").val();
        $.getJSON("https://maps.googleapis.com/maps/api/geocode/json?address="+end+"&key=AIzaSyAcSWtNDWRyJ_DERHgP5yWv2QkacKeqaYU", function(dados) {
            var latitude = dados.results[0].geometry.location.lat;
            var longitude = dados.results[0].geometry.location.lng;
            $("#lat").val(parseFloat(latitude));
            $("#lng").val(parseFloat(longitude));
        });
    });
});