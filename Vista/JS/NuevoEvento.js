$('#formEvento').validate({
    rules: {
        summary: {
            maxlength: 30,
            soloNumeros: false,
            required: true
        },
        start: {
            fechaValida: true,
            required: true
        },
        end: {
            fechaFinValida: true,
            fechaValida: true,
            required: true
        },
        startTime: {
            required: true,
            horaInicioValida: true,
        },
        endTime: {
            required: true,
            horaFinValida: true
        }
    },
    messages: {
        summary: {
            maxlength: "Por favor, ingrese hasta 30 dígitos",
            soloNumeros: "Debe ingresar letras",
            required: "Por favor, ingrese el nombre del evento"
        },
        start: {
            required: "Por favor, ingrese la fecha de inicio"
        },
        end: {
            required: "Por favor, ingrese la fecha de finalización"
        },
        startTime: {
            required: "Por favor, ingrese la hora de inicio"
        },
        endTime: {
            required: "Por favor, ingrese la hora de finalización"
        }
    }
});

$.validator.addMethod("fechaValida", function(valor) {
    var partes = valor.split('-');
    var fecha = new Date(partes[0], partes[1] - 1, partes[2]);
    var hoy = new Date();
    hoy.setHours(0, 0, 0, 0);
    return fecha >= hoy;
}, "La fecha no puede ser menor a la fecha actual");

$.validator.addMethod("fechaFinValida", function(valor) {
    var partesFin = valor.split('-');
    var fechaFin = new Date(partesFin[0], partesFin[1] - 1, partesFin[2]);

    var fechaInicio = $('#start').val();
    var partesInicio = fechaInicio.split('-');
    var fechaInicioObj = new Date(partesInicio[0], partesInicio[1] - 1, partesInicio[2]);
    return fechaFin >= fechaInicioObj;
}, "La fecha de finalización no puede ser menor a la fecha de inicio");

$.validator.addMethod("horaInicioValida", function(valor) {
    horaValida = false
    var partesHora = valor.split(':');
    var horasInput = parseInt(partesHora[0], 10);
    var minutosInput = parseInt(partesHora[1], 10);

    var ahora = new Date();
    var horasActual = ahora.getHours();
    var minutosActual = ahora.getMinutes();

    if (horasInput >= horasActual && minutosInput >= minutosActual) {
        horaValida = true
    }
    
    return horaValida;
}, "La hora de inicio no puede ser menor a la hora actual");

$.validator.addMethod("horaFinValida", function(valor) {
    var horaInicio = $('#startTime').val();
    var fechaInicio = new Date("1970-01-01T" + horaInicio + ":00");
    var fechaFin = new Date("1970-01-01T" + valor + ":00");
    return fechaFin >= fechaInicio;
}, "La hora de finalización no puede ser menor a la hora de inicio");