@extends('publico.plantilla.plantilla')

<script>

    {{ Js::from(['csrf_token' => csrf_token()]) }};

    document.addEventListener('DOMContentLoaded', function() {
    const publicacionesCache = {};
         $('#quienesSomos').addClass('active');
    function cargarPublicacion(publicacionId) {
        if (publicacionesCache[publicacionId]) {
            mostrarPublicacionEnModal(publicacionesCache[publicacionId]);
            return;
        }

        const publicacionElement = document.querySelector(`.publicacion-item[data-id="${publicacionId}"]`);

        if (publicacionElement) {
            const titulo = publicacionElement.querySelector('.preview-title').textContent;
            const contenido = publicacionElement.querySelector('.preview-excerpt').getAttribute('data-contenido-completo') ||
                             publicacionElement.querySelector('.preview-excerpt').textContent;
            const tipo = publicacionElement.querySelector('.preview-tipo').textContent;
            const fecha = publicacionElement.querySelector('.preview-fecha').textContent.replace(/.*(\d{2}\/\d{2}\/\d{4}).*/, '$1');

            const autor = publicacionElement.getAttribute('data-autor') || 'Anónimo';
            const autorEmail = publicacionElement.getAttribute('data-autor-email') || '';

            const publicacion = {
                id: publicacionId,
                titulo: titulo,
                contenido: contenido,
                tipo: { tipo: tipo },
                fecha: fecha,
                usuario: {
                    name: autor,
                    email: autorEmail
                },
                fotos: []
            };

            const previewImage = publicacionElement.querySelector('.preview-image');
            if (previewImage) {
                publicacion.fotos = [{
                    imagen: previewImage.getAttribute('src')
                }];
            }

            publicacionesCache[publicacionId] = publicacion;
            mostrarPublicacionEnModal(publicacion);
            return;
        }

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

    function mostrarPublicacionEnModal(publicacion) {
        document.getElementById('modalPublicacionLabel').textContent = publicacion.titulo;

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
                            <img src="${foto.imagen}" alt="${publicacion.titulo}" class="detalle-imagen d-block w-100">
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

        document.getElementById('modalContenido').innerHTML = html;

        if (publicacion.fotos && publicacion.fotos.length > 1) {
            $('#carouselModal').carousel();
        }
    }

    function formatearFecha(fechaStr) {
        try {
            let fecha;

            if (/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(fechaStr)) {
                const parts = fechaStr.split('/');
                fecha = new Date(parts[2], parts[1] - 1, parts[0]);
            }
            else {
                fecha = new Date(fechaStr);
            }

            if (isNaN(fecha.getTime())) {
                return fechaStr;
            }

            return fecha.toLocaleDateString('es-ES', { day: '2-digit', month: '2-digit', year: 'numeric' });
        } catch (error) {
            console.error("Error al formatear fecha:", error);
            return fechaStr;
        }
    }

    function formatearContenido(contenido) {
        return contenido.replace(/\n/g, '<br>');
    }

    function route(name, params = {}) {
        const routes = {
            'publicaciones.show': `/publicaciones/${params}`
        };

        return routes[name] || '#';
    }

    document.querySelectorAll('.publicacion-preview').forEach(item => {
        item.addEventListener('click', function() {
            const publicacionId = this.getAttribute('data-publicacion-id');
            cargarPublicacion(publicacionId);
        });
    });

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

    window.compartirPublicacion = function(id, titulo) {
        alert(`Compartiendo: ${titulo}`);

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
