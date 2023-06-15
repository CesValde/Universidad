
    const form = document.getElementById('form'); 
    const nombre = document.getElementById('nombre'); 
    const email = document.getElementById('email'); 
    const password = document.getElementById('password'); 

    form.addEventListener('submit', e => {
        e.preventDefault() ; 
        checkInputs() ; 
    })

    function checkInputs() {
        const nombreValue = nombre.value.trim()
        const emailValue = email.value.trim()
        const passwordValue = password.value.trim()

            if(nombreValue === '') {
                setErrorFor(nombre, 'Debe ingresar un nombre!') ; 
            } else {
                setSuccessFor(nombre) ; 
            }

            if(emailValue === '') {
                setErrorFor(email, 'Debe ingresar un email!');
            } else if (!isEmail(emailValue)) {
                setErrorFor(email, 'No ingreso un email válido!');
            } else {
                setSuccessFor(email);
            }
            
            if(passwordValue === '') {
                setErrorFor(password, 'Debe ingresar una password!');
            } else {
                setSuccessFor(password);
            }
            
    }

    function setErrorFor(input, message) {
        const formControl = input.parentElement; 
        const small = formControl.querySelector('small') ; 
        formControl.className = 'form-control error' ; 
        small.innerText = message ; 
    }

    function setSuccessFor(input) {
        const formControl = input.parentElement; 
        formControl.className = 'form-control success'; setErrorFor ; 
    }

    function isEmail(email) {
        return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
    }