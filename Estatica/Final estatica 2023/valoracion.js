
    const stars = document.querySelectorAll(".stars i");
    const button = document.getElementById("califica");
    const textarea = document.getElementById("mostrar");

    button.addEventListener("click", () => {
    const nombre = prompt("Ingrese su nombre");

        if(nombre) {
            textarea.value += `\nNombre: ${nombre} \nCalificación: `;
            
            let calificacion = "";
            for(let i = 0; i < stars.length; i++) {
                if(stars[i].classList.contains("active")) {
                    calificacion += "⭐" ; 
                }
            }
            textarea.value += calificacion;
            textarea.value += "\n";
        }
    });

    stars.forEach((star, i) => {
        star.addEventListener("click", () => {
            stars.forEach((star, j) => {
                i >= j ? star.classList.add("active") : star.classList.remove("active");
            });
        });
    });