    function validar() {
        var nombre = document.getElementById('nombre');
        var apellido = document.getElementById('apellido');
        var email = document.getElementById('email');
        var dia = document.getElementById('dia');
        var mes = document.getElementById('mes');
        var anio = document.getElementById('anio');
    
        var validacionNombre = true;
        var validacionApellido = true;
        var validacionEmail = true;
        var validacionDia = true;
        var validacionMes = true;
        var validacionAnio = true;
    
        if (nombre.value.trim() === '' || !isNaN(nombre.value)) {
            campoInvalido(nombre);
            validacionNombre = false;
        } else {
            campoValido(nombre);
        }
    
        if (apellido.value.trim() === '' || !isNaN(apellido.value)) {
            campoInvalido(apellido);
            validacionApellido = false;
        } else {
            campoValido(apellido);
        }
    
        if (email.value.trim() === '') {
            campoInvalido(email);
            validacionEmail = false;
        } else {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email.value)) {
                campoInvalido(email);
                validacionEmail = false;
            } else {
                campoValido(email);
            }
        }
    
        var valido = validarFecha(dia.value, mes.value, anio.value);
        if(!valido) {
            campoInvalido(dia);
            campoInvalido(mes);
            campoInvalido(anio);
            validacionDia = false;
            validacionMes = false;
            validacionAnio = false;
        } else {
            campoValido(dia);
            campoValido(mes);
            campoValido(anio);
        }
    
        if (
            validacionNombre &&
            validacionApellido &&
            validacionEmail &&
            validacionDia &&
            validacionMes &&
            validacionAnio
        ) {
            return true;
        } else {
            alert("Complete los campos obligatorios.");
            return false;
        }
    }
    
    function validarFecha(dia, mes, anio) {
        dia = parseInt(dia, 10);
        mes = parseInt(mes, 10);
        anio = parseInt(anio, 10);
    
        if (isNaN(dia) || isNaN(mes) || isNaN(anio)) {
            return false;
        }
    
        var fecha = new Date(anio, mes - 1, dia);
        if (
            fecha.getDate() !== dia ||
            fecha.getMonth() !== mes - 1 ||
            fecha.getFullYear() !== anio
        ) {
            return false;
        }
    
        if (anio > 2023) {
            return false;
        }
            return true;
    }
    
    function campoInvalido(elemento) {
        elemento.style.borderColor = '#D40030';
    }
    
    function campoValido(elemento) {
        elemento.style.borderColor = '##31BDBD';
    }