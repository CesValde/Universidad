
    const stars = document.querySelectorAll(".stars i") ; 
    
    stars.forEach((star, i) => {
        star.addEventListener("click", () => {
            stars.forEach((star, j) => {
                i >= j ? star.classList.add("active") : star.classList.remove("active") ; 
            })
        }) ; 
    }) ; 