$("#formDni").validate({
    rules: {
        NroDni: {
            number: true,
            minlength: 8,
            maxlength: 10,
            min: 10000000,
            required: true
        }
    },
    messages: {
        NroDni: {
            number: "Por favor, ingrese un número válido",
            minlength: "Por favor, ingrese al menos 8 dígitos",
            maxlength: "Por favor, ingrese hasta 10 dígitos",
            min: "Por favor, ingrese un número válido",
            required: "Por favor, ingrese el DNI"
        }
    }  
});