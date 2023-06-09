
    function validar() { 
        var nombre = document.getElementById('nombre');
        var apellido = document.getElementById('apellido');
        var email = document.getElementById('email');
        var obrasSociales = document.getElementById('obras_sociales');
        var dia = document.getElementById('dia');
        var mes = document.getElementById('mes');
        var anio = document.getElementById('anio')

        if(nombre.value.trim() === '' || !isNaN(nombre.value)) {
            campoInvalido(nombre) ;
            validacionNombre = false ; 
        } else {
            campoValido(nombre) ;
            validacionNombre = true ; 
        }

        if(apellido.value.trim() === '' || !isNaN(apellido.value)) {
            campoInvalido(apellido) ; 
            validacionApellido = false ;
        } else {
            campoValido(apellido) ;
            validacionApellido = true ;
        }

        if(email.value.trim() === '') {
            campoInvalido(email) ;
            validacionEmail = false; 
        } else {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if(!emailRegex.test(email.value)) {
                campoInvalido(email);
                validacionEmail = false; 
            } else {
                campoValido(email) ;
                validacionEmail = true; 
            }
        }

        if(obrasSociales.value === '') {
            campoInvalido(obrasSociales) ; 
            validacionObrasSociales = false ;
        } else {
            campoValido(obrasSociales) ; 
            validacionObrasSociales = true ;
        }
    
        // Validar fecha de nacimiento
        valido = validarFecha(dia.value, mes.value, anio.value) ; 
            if(!valido) {
                campoInvalido(dia);
                campoInvalido(mes);
                campoInvalido(anio);
                validacionDia = false ;
                validacionMes = false ;
                validacionAnio = false ; 
            } else {
                campoValido(dia);
                campoValido(mes);
                campoValido(anio);
                validacionDia = true ;
                validacionMes = true ;
                validacionAnio = true ; 
            }
    
        // Si todas las validaciones pasan, mostrar mensaje de éxito
            if(validacionNombre) {
                if(validacionApellido) {
                    if(validacionObrasSociales) {
                        if(validacionDia) {
                            if(validacionMes) {
                                if(validacionAnio) {
                                    if(validacionEmail) {
                                        alert("Todos los datos son correctos") ;    
                                    } 
                                }
                            }
                        }
                    }
                }
            } 
    }

    function validarFecha(dia, mes, anio) {
        valido = true ; 
        dia = parseInt(dia, 10);
        mes = parseInt(mes, 10);
        anio = parseInt(anio, 10);
    
        if(isNaN(dia) || isNaN(mes) || isNaN(anio)) {
            valido = false ; 
        }
    
        var fecha = new Date(anio, mes -1, dia);
        if(fecha.getDate() !== dia || fecha.getMonth() !== mes -1 || fecha.getFullYear() !== anio) {
            valido = false ; 
        }
        if(anio > 2023) {
            valido = false ; 
        }
    
        return valido; 
    }
    
    function campoInvalido(elemento) {
        elemento.style.borderColor = 'red';
    }
    
    function campoValido(elemento) {
        elemento.style.borderColor = 'green';
    }