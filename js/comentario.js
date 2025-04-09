document.addEventListener("DOMContentLoaded", function () {
    cargarComentarios();
});

function cargarComentarios() {
    fetch('controlador/GetComentarios.php')
        .then(response => response.json())
        .then(data => {
            const comentariosBody = document.getElementById('comentariosBody');
            comentariosBody.innerHTML = ''; // Limpiar contenido previo

            if (data.error) {
                comentariosBody.innerHTML = `<p class="text-danger">${data.error}</p>`;
                return;
            }

            data.forEach(comentario => {
                const comentarioHTML = `
                    <div class="contenedor-comentario mb-3 p-2 border rounded">
                        <img src="assets/img/fotoDePerfil.png" alt="Foto de perfil" width="50px" height="50px">
                        <div class="nombre-ycomentario ps-2">
                            <h5>${comentario.nombre}</h5>
                            <p>${comentario.mensaje}</p>
                            <p class="text-secondary" style="font-size: 12px;">${comentario.fecha}</p>
                        </div>
                    </div>
                `;
                comentariosBody.innerHTML += comentarioHTML;
            });
        })
        .catch(error => {
            console.error('Error al cargar los comentarios:', error);
            const comentariosBody = document.getElementById('comentariosBody');
            comentariosBody.innerHTML = `<p class="text-danger">Error al cargar los comentarios.</p>`;
        });
}