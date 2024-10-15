$('#formPersona').validate({
    rules: {
        NroDni: {
            number: true,
            minlength: 8,
            maxlength: 10,
            min: 0,
            required: true
        },
        Apellido: {
            soloLetras: true,
            maxlength: 25,
            required: true
        },
        Nombre: {
            soloLetras: true,
            maxlength: 25,
            required: true
        },
    },
    messages: {
        NroDni: {
            number: "Por favor, ingrese un número válido",
            minlength: "Por favor, ingrese al menos 8 dígitos",
            maxlength: "Por favor, ingrese hasta 10 dígitos",
            min: "Por favor, ingrese un número válido",
            required: "Por favor, ingrese su DNI"
        },
        Apellido: {
            soloLetras: "El apellido solo debe contener letras",
            maxlength: "Por favor, ingrese hasta 30 dígitos",
            required: "Por favor, ingrese su apellido"
        },
        Nombre: {
            soloLetras: "El nombre solo debe contener letras",
            maxlength: "Por favor, ingrese hasta 30 dígitos",
            required: "Por favor, ingrese su nombre"
        }
    }
});

$.validator.addMethod("soloLetras", function (valor) {
    return /^[a-zA-Z\s]+$/.test(valor);
}, "Solo debe contener letras")

$.validator.addMethod("soloNumeros", function (valor) {
    return /^[0-9]+$/.test(valor);
}, "Solo debe contener números");

