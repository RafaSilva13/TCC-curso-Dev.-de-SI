<style>
    .areaVerificacao {
        margin-bottom: 0;
        margin-top: -3.69rem;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }
    .areaVerificacao2 {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #ebebeb;
    }
    :where(.containerVerificacao, form, .input-field, header) {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .containerVerificacao {
        background: #fff;
        padding: 30px 65px;
        border-radius: 12px;
        row-gap: 20px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }
    .containerVerificacao header {
        height: 65px;
        width: 65px;
        background: #4070f4;
        color: #fff;
        font-size: 2.5rem;
        border-radius: 50%;
    }
    .containerVerificacao h4 {
        font-size: 1.25rem;
        color: #333;
        font-weight: 500;
    }
    form .input-field {
        flex-direction: row;
        column-gap: 10px;
    }
    .input-field input {
        height: 45px;
        width: 42px;
        border-radius: 6px;
        outline: none;
        font-size: 1.125rem;
        text-align: center;
        border: 1px solid #ddd;
    }
    .input-field input:focus {
        box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
    }
    .input-field input::-webkit-inner-spin-button,
    .input-field input::-webkit-outer-spin-button {
        display: none;
    }
    form button {
        margin-top: 25px;
        width: 100%;
        color: #fff;
        font-size: 1rem;
        border: none;
        padding: 9px 0;
        cursor: pointer;
        border-radius: 6px;
        pointer-events: none;
        background: #6e93f7;
        transition: all 0.2s ease;
    }
    form button.active {
        background: #4070f4;
        pointer-events: auto;
    }
    form button:hover {
        background: #0e4bf1;
    }
</style>

<div class="areaVerificacao">

    <div class="areaVerificacao2">

        <div class="containerVerificacao">

            <header>
                <i class="bx bxs-check-shield"></i>
            </header>

            <h4>Código</h4>
            
            <form id="formVerificaCodCliente">

                <input type="hidden" name="email_cliente" value="<?php echo $email_cliente?>" required>

                <div class="input-field">

                    <input type="number" id="numeroVerif1"/>
                    <input type="number" id="numeroVerif2" disabled />
                    <input type="number" id="numeroVerif3" disabled />
                    <input type="number" id="numeroVerif4" disabled />

                </div>

                <input type="hidden" name="cod_verificacao" id="cod_verificacao" placeholder="Insira seu codigo" required/>

                <button type="submit" name="verificar_email" id="btnVerificarNumeros">Verificar</button>

            </form>

        </div>

    </div>

</div>

<script>
    const inputs = document.querySelectorAll("input"),
    button = document.querySelector("button");

    // iterate over all inputs
    inputs.forEach((input, index1) => {
        input.addEventListener("keyup", (e) => {
        // This code gets the current input element and stores it in the currentInput variable
        // This code gets the next sibling element of the current input element and stores it in the nextInput variable
        // This code gets the previous sibling element of the current input element and stores it in the prevInput variable
        const currentInput = input,
            nextInput = input.nextElementSibling,
            prevInput = input.previousElementSibling;
    
        // if the value has more than one character then clear it
        if (currentInput.value.length > 1) {
            currentInput.value = "";
            return;
        }
        // if the next input is disabled and the current value is not empty
        //  enable the next input and focus on it
        if (nextInput && nextInput.hasAttribute("disabled") && currentInput.value !== "") {
            nextInput.removeAttribute("disabled");
            nextInput.focus();
        }
    
        // if the backspace key is pressed
        if (e.key === "Backspace") {
            // iterate over all inputs again
            inputs.forEach((input, index2) => {
            // if the index1 of the current input is less than or equal to the index2 of the input in the outer loop
            // and the previous element exists, set the disabled attribute on the input and focus on the previous element
            if (index1 <= index2 && prevInput) {
                input.setAttribute("disabled", true);
                input.value = "";
                prevInput.focus();
            }
            });
        }
        //if the fourth input( which index number is 3) is not empty and has not disable attribute then
        //add active class if not then remove the active class.
        if (!inputs[3].disabled && inputs[3].value !== "") {
            button.classList.add("active");
            return;
        }
        button.classList.remove("active");
        });
    });
    
    //focus the first input which index is 0 on window load
    window.addEventListener("load", () => inputs[0].focus());

    $("#numeroVerif1").keyup(function () {

        var numero = $("#numeroVerif1").val() + $("#numeroVerif2").val() + $("#numeroVerif3").val() + $("#numeroVerif4").val();

        $("#cod_verificacao").val(numero);

    });

    $("#numeroVerif2").keyup(function () {

        var numero = $("#numeroVerif1").val() + $("#numeroVerif2").val() + $("#numeroVerif3").val() + $("#numeroVerif4").val();

        $("#cod_verificacao").val(numero);

    });

    $("#numeroVerif3").keyup(function () {

        var numero = $("#numeroVerif1").val() + $("#numeroVerif2").val() + $("#numeroVerif3").val() + $("#numeroVerif4").val();

        $("#cod_verificacao").val(numero);

    });

    $("#numeroVerif4").keyup(function () {

        var numero = $("#numeroVerif1").val() + $("#numeroVerif2").val() + $("#numeroVerif3").val() + $("#numeroVerif4").val();

        $("#cod_verificacao").val(numero);

        if($("#numeroVerif4").val() != "")
        {
            $("#btnVerificarNumeros").addClass('active');
        }
        else 
        {
            $("#btnVerificarNumeros").removeClass('disabled');
        }

    });

</script>