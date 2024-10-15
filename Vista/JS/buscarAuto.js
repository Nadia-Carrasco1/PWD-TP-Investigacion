$("#formBuscarAuto").validate({
    rules:{
        Patente: {
            minlength: 7,
            maxlength: 7,
            formatoPatenteValido: true,
            required: true
        }
    },
    messages: {
        Patente: {
            formatoPatenteValido: "Formato de patente: DKR (mayúsculas) 675",
            minlength: "Formato de patente: DKR 675",
            maxlength: "Formato de patente: DKR 675",
            required: "Por favor, ingrese la patente"
        }
    }  
});


$.validator.addMethod("formatoPatenteValido", function(valor) {
    return /^[A-Z]{3} \d{3}$/.test(valor);
}, "Formato de patente válido");


$("#formAccionBuscarAuto").validate({
    rules: {
        Marca: {
            required: true,
            marcaValida:true,
            maxlength:15
        },
        Modelo: {
            number:true,
            required: true,
            modeloValido:true,
            maxlength:4,
            min:0
        }
    },
    messages: {
        Marca: {
            required: "Por favor, ingrese una marca",
            maxlength:"Ha superado la cantidad máxima de carácteres"
        },
        Modelo: {
            required: "Por favor, ingrese el modelo",
            modeloValido:"Por favor, ingrese un número válido",
            maxlength:"Ingresar hasta 4 dígitos",
            number: "Por favor, ingrese un número válido",
            min: "Por favor, ingrese un número válido"
        }
    }
});
$.validator.addMethod("marcaValida", function (valor) {
    return /^[a-zA-Z0-9\s]+$/.test(valor) && !/^\d+$/.test(valor);
}, "Por favor, ingrese letras, números y espacios (no se permiten solo números)");


  $.validator.addMethod("modeloValido", function (valor) {
    return !isNaN(valor) && Number(valor) > 0;
}, "Por favor, ingrese un número positivo.");

$.validator.addMethod("soloNumeros", function (valor) {
    return /^[0-9]+$/.test(valor);
}, "Solo debe contener números");