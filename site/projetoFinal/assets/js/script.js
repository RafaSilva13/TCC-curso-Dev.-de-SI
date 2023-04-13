$(function() {
    $("#cpf").mask("999.999.999-99");
    
    $('#loginCheck1').click(function() {

        var checkbox = $('#loginCheck1');

        if (checkbox.is(":checked")) {

            $('#senha').prop('type', 'text');

        } else {

            $('#senha').prop('type', 'password');

        }

    });

    $("#msgVazio").hide();
    
    $('#loginCheck2').click(function() {
        
        var checkbox = $('#loginCheck2');

        if (checkbox.is(":checked")) {
            
            $('#senhaCliente2').prop('type', 'text');
            
            $('#senhaCliente3').prop('type', 'text');
            
        } else {
            
            $('#senhaCliente2').prop('type', 'password');
            
            $('#senhaCliente3').prop('type', 'password');
            
        }
    });
    
    $('#loginCheck3').click(function() {
        
        var checkbox = $('#loginCheck3');

        if (checkbox.is(":checked")) {
            
            $('#senhaFuncionario2').prop('type', 'text');
            
            $('#senhaFuncionario3').prop('type', 'text');
            
        } else {
            
            $('#senhaFuncionario2').prop('type', 'password');
            
            $('#senhaFuncionario3').prop('type', 'password');
            
        }
    });
    
    $('#loginCheck4').click(function() {
    
        var checkbox = $('#loginCheck4');
    
        if (checkbox.is(":checked")) {
    
            $('#senhaCliente').prop('type', 'text');
    
        } else {
    
            $('#senhaCliente').prop('type', 'password');
    
        }
    
    });
    
    $('#nome_motoboy').attr('disabled', 'disabled');
    $('#cpf_motoboy').attr('disabled', 'disabled');
    $('#placa_motoboy').attr('disabled', 'disabled');
    $('#telefone_motoboy').attr('disabled', 'disabled');
    $('#email_motoboy').attr('disabled', 'disabled');
    $('#senha_motoboy').attr('disabled', 'disabled');
    
    $('#nome_cliente').attr('disabled', 'disabled');
    $('#cpf_cliente').attr('disabled', 'disabled');
    $('#usuario_cliente').attr('disabled', 'disabled');
    $('#telefone_cliente').attr('disabled', 'disabled');
    $('#email_cliente').attr('disabled', 'disabled');
    $('#senha_cliente').attr('disabled', 'disabled');

    $('.btnContinuarMapa').attr('disabled', 'disabled');
    $('.btnConcluirPedido').attr('disabled', 'disabled');
    $("#simboloConfimMetPag1").css("display", "none");
    $("#simboloConfimMetPag2").css("display", "none");
    $("#selecionarCartao").css("display", "none");

    $("#badgeAcaminho").removeClass("d-none");
    $("#badgeAguardando").addClass("d-none");

    
    new QRCode(document.getElementById("qrcode"), "https://www.youtube.com/watch?v=ale_Y1MtRFQ&ab_channel=BaguaRecords");

    const btnCopy = document.querySelector('button.copy');
    const textArea = document.querySelector('.txtInputPix');

    btnCopy.addEventListener('click', (e) => {
        e.preventDefault();
        
        $(".pixCopiado").toast('show'); 

        navigator.clipboard.writeText(textArea.value);
    });

    // Owl Carrousel
    $('.owl-carousel1').owlCarousel({
        loop:true,
        margin: 165,
        responsiveClass:true,
        nav: false,
        autoplay:true,
        autoplayTimeout:4000,
        // dots: false,
        responsive:{
            0:{
                items:1
            },
            392:{
                items:2,
                margin: 280
            },
            820:{
                items:2.5,
                margin: 90
            },
            1000:{
                items:3,
                margin: 165
            },
            1280:{
                items:4,
                margin: 80
            }
        }
    });
    
    $(".image-upload").bind("dragover", function() {
        $(".image-upload").addClass("image-dropping");
    });
    $(".image-upload").bind("dragleave", function() {
        $(".image-upload").removeClass("image-dropping");
    });
    
    $(".image-upload2").bind("dragover", function() {
        $(".image-upload2").addClass("image-dropping");
    });
    $(".image-upload2").bind("dragleave", function() {
        $(".image-upload2").removeClass("image-dropping");
    });

});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $(".file-upload-image").attr("src", e.target.result);
            $(".file-upload-content").show();

            $(".image-title").html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        removeUpload();
    }
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $(".file-upload-image2").attr("src", e.target.result);
            $(".file-upload-content").show();

            $(".image-title").html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        removeUpload();
    }
}


