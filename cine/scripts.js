async function cargarPeliculas() {
    try {
        const response = await fetch('conexion.php');
        const peliculas = await response.json();
        const peliculasDiv = document.getElementById('peliculas');
        peliculasDiv.innerHTML = '';
        peliculas.forEach(pelicula => {
            peliculasDiv.innerHTML += `
                <div class="pelicula">
                    <h3>${pelicula.titulo}</h3>
                    <p>${pelicula.descripcion}</p>
                    <button onclick="reservarAsiento('${pelicula.titulo}')">Reservar</button>
                </div>
            `;
        });
    } catch (error) {
        console.error('Error al cargar las películas:', error);
    }
}

window.onload = cargarPeliculas;
