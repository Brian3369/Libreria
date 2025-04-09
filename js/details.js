async function showBookModal(id) {
    try {
      // Realizar una solicitud AJAX para obtener los detalles del libro
      const response = await fetch(`controlador/GetDetails.php?id=${id}`);
      const product = await response.json();
  
      if (product) {
        const modalBody = document.getElementById("productModalBody");
        modalBody.innerHTML = `
          <div class="row">
            <div class="col-md-6">
              <img src="assets/img/portfolio/fullsize/libro.png" alt="" class="img-fluid" style="max-height:400px; object-fit:contain;">
            </div>
            <div class="col-md-6">
              <h3>${product.titulo}</h3>
              <p>${product.descripcion || "Sin descripción disponible."}</p>
              <h4>$${product.precio}</h4>
              <p><strong>Tipo:</strong> ${product.tipo}</p>
              <p><strong>Fecha de Publicación:</strong> ${product.fecha_pub}</p>
              <p><strong>Notas:</strong> ${product.notas || "Sin notas disponibles."}</p>
            </div>
          </div>
        `;
        const myModal = new bootstrap.Modal(
          document.getElementById("productModal")
        );
        myModal.show();
      } else {
        alert("No se encontraron detalles para este libro.");
      }
    } catch (error) {
      console.error("Error al obtener los detalles del libro:", error);
      alert("Ocurrió un error al cargar los detalles del libro.");
    }
  }
