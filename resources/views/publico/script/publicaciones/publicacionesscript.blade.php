@extends('publico.plantilla.plantilla')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS Bundle (incluye Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script personalizado para manejar el modal de publicaciones -->
<script>
    {{ Js::from(['csrf_token' => csrf_token()]) }}; // Opcional si usas AJAX

    document.addEventListener('DOMContentLoaded', function() {
    // Cache de las publicaciones cargadas por AJAX
    const publicacionesCache = {};
    
    // Función para cargar la publicación en el modal
    function cargarPublicacion(publicacionId) {
        // Si ya tenemos la publicación en cache, la usamos
        if (publicacionesCache[publicacionId]) {
            mostrarPublicacionEnModal(publicacionesCache[publicacionId]);
            return;
        }
        
        // Si no está en cache, intentamos obtener la información directamente del DOM
        const publicacionElement = document.querySelector(`.publicacion-item[data-id="${publicacionId}"]`);
        
        if (publicacionElement) {
            // Intentar extraer datos básicos del DOM
            const titulo = publicacionElement.querySelector('.preview-title').textContent;
            const contenido = publicacionElement.querySelector('.preview-excerpt').getAttribute('data-contenido-completo') || 
                             publicacionElement.querySelector('.preview-excerpt').textContent;
            const tipo = publicacionElement.querySelector('.preview-tipo').textContent;
            const fecha = publicacionElement.querySelector('.preview-fecha').textContent.replace(/.*(\d{2}\/\d{2}\/\d{4}).*/, '$1');
            
            // Construir objeto de publicación simplificado
            const publicacion = {
                id: publicacionId,
                titulo: titulo,
                contenido: contenido,
                tipo: { tipo: tipo },
                fecha: fecha,
                fotos: []
            };
            
            // Buscar si hay imágenes
            const previewImage = publicacionElement.querySelector('.preview-image');
            if (previewImage) {
                publicacion.fotos = [{
                    imagen: previewImage.getAttribute('src')
                }];
            }
            
            // Usar la publicación simplificada
            publicacionesCache[publicacionId] = publicacion;
            mostrarPublicacionEnModal(publicacion);
            return;
        }
        
        // Si no podemos extraer los datos del DOM, mostrar un mensaje de error
        document.getElementById('modalContenido').innerHTML = `
            <div class="modal-detalle p-4">
                <div class="alert alert-info">
                    <h5>Información de publicación</h5>
                    <p>Para ver el detalle completo de esta publicación, por favor haga clic en el botón de abajo.</p>
                    <a href="/publicaciones/${publicacionId}" class="btn btn-primary">
                        <i class="fas fa-external-link-alt mr-2"></i> Ver publicación completa
                    </a>
                </div>
            </div>
        `;
    }
    
    // Función para mostrar la publicación en el modal
    function mostrarPublicacionEnModal(publicacion) {
        // Actualizar el título del modal
        document.getElementById('modalPublicacionLabel').textContent = publicacion.titulo;
        
        // Preparar el contenido HTML para el modal
        let html = `
            <div class="modal-detalle">
                <!-- Metadatos -->
                <div class="detalle-metadatos">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="detalle-metadato-item">
                                <i class="fas fa-tag"></i>
                                <span class="detalle-metadato-label">Tipo:</span>
                                <span>${publicacion.tipo ? publicacion.tipo.tipo : 'Sin tipo'}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="detalle-metadato-item">
                                <i class="fas fa-user"></i>
                                <span class="detalle-metadato-label">Autor:</span>
                                <span>${publicacion.usuario ? publicacion.usuario.name : 'Anónimo'}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="detalle-metadato-item">
                                <i class="fas fa-calendar-alt"></i>
                                <span class="detalle-metadato-label">Fecha:</span>
                                <span>${formatearFecha(publicacion.fecha)}</span>
                            </div>
                        </div>
                    </div>
                </div>`;
        
        // Galería de imágenes
        if (publicacion.fotos && publicacion.fotos.length > 0) {
            if (publicacion.fotos.length === 1) {
                html += `
                    <div class="detalle-galeria text-center">
                        <img src="${publicacion.fotos[0].imagen}" alt="${publicacion.titulo}" class="detalle-imagen fadeIn">
                    </div>`;
            } else {
                html += `
                    <div class="detalle-galeria">
                        <div id="carouselModal" class="carousel slide carousel-modal" data-ride="carousel">
                            <ol class="carousel-indicators">`;
                
                for (let i = 0; i < publicacion.fotos.length; i++) {
                    html += `<li data-target="#carouselModal" data-slide-to="${i}" class="${i === 0 ? 'active' : ''}"></li>`;
                }
                
                html += `</ol>
                            <div class="carousel-inner">`;
                
                publicacion.fotos.forEach((foto, index) => {
                    html += `
                        <div class="carousel-item ${index === 0 ? 'active' : ''}">
                        </div>`;
                });
                
                html += `
                            </div>
                            <a class="carousel-control-prev" href="#carouselModal" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Anterior</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselModal" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Siguiente</span>
                            </a>
                        </div>
                    </div>`;
            }
        }
        
        // Contenido
        html += `
                <div class="detalle-contenido">
                    ${formatearContenido(publicacion.contenido)}
                </div>
                
                <!-- Botón para ver la publicación completa o compartir -->
                <div class="text-center mt-4">
                    <button class="btn btn-outline-secondary ml-2" onclick="compartirPublicacion(${publicacion.id}, '${publicacion.titulo}')">
                        <i class="fas fa-share-alt mr-2"></i> Compartir
                    </button>
                </div>
            </div>`;
        
        // Actualizar el contenido del modal
        document.getElementById('modalContenido').innerHTML = html;
        
        // Reinicializar componentes de Bootstrap en el modal si es necesario
        if (publicacion.fotos && publicacion.fotos.length > 1) {
            $('#carouselModal').carousel();
        }
    }
    
    // Función auxiliar para formatear la fecha
    function formatearFecha(fechaStr) {
    try {
        // Intentar varios formatos de fecha comunes
        let fecha;
        
        // Si el formato es dd/mm/yyyy (como "15/04/2023")
        if (/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(fechaStr)) {
            const parts = fechaStr.split('/');
            fecha = new Date(parts[2], parts[1] - 1, parts[0]);
        } 
        // Si el formato es ISO o similar (2023-04-15)
        else {
            fecha = new Date(fechaStr);
        }
        
        // Verificar si la fecha es válida
        if (isNaN(fecha.getTime())) {
            return fechaStr; // Devolver el string original si no se pudo parsear
        }
        
            return fecha.toLocaleDateString('es-ES', { day: '2-digit', month: '2-digit', year: 'numeric' });
        } catch (error) {
            console.error("Error al formatear fecha:", error);
            return fechaStr; // En caso de error, devolver el string original
        }
    }
    
    // Función auxiliar para formatear el contenido (convertir saltos de línea)
    function formatearContenido(contenido) {
        return contenido.replace(/\n/g, '<br>');
    }
    
    // Helper para generar rutas de Laravel en JavaScript
    function route(name, params = {}) {
        // URLs predefinidas para rutas comunes
        const routes = {
            'publicaciones.show': `/publicaciones/${params}`
        };
        
        return routes[name] || '#';
    }
    
    // Evento para abrir el modal y cargar la publicación
    document.querySelectorAll('.publicacion-preview').forEach(item => {
        item.addEventListener('click', function() {
            const publicacionId = this.getAttribute('data-publicacion-id');
            cargarPublicacion(publicacionId);
        });
    });
    
    // Filtro por tipo (solo si existe el elemento)
    const filtroTipo = document.getElementById('filtroTipo');
    if (filtroTipo) {
        filtroTipo.addEventListener('change', function() {
            const tipoSeleccionado = this.value;
            const publicaciones = document.querySelectorAll('.publicacion-item');
            
            publicaciones.forEach(pub => {
                if (!tipoSeleccionado || pub.getAttribute('data-tipo') === tipoSeleccionado) {
                    pub.style.display = 'block';
                } else {
                    pub.style.display = 'none';
                }
            });
        });
    }
    
    // Botón para volver arriba
    const btnBackToTop = document.getElementById('btnBackToTop');
    
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            btnBackToTop.classList.add('show');
        } else {
            btnBackToTop.classList.remove('show');
        }
    });
    
    btnBackToTop.addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
    
    // Función para compartir la publicación (dummy)
    window.compartirPublicacion = function(id, titulo) {
        // Aquí podría ir la lógica para compartir en redes sociales
        // Por ahora, simplemente mostraremos un alert
        alert(`Compartiendo: ${titulo}`);
        
        // Implementación real podría usar la Web Share API
        if (navigator.share) {
            navigator.share({
                title: titulo,
                url: route('publicaciones.show', id)
            })
            .catch(error => console.error('Error al compartir:', error));
        }
    };
});

</script>
