@extends('publico.script.publicaciones.publicacionesscript')
@session('titulo')
    <title>Publicaciones</title>
@endsession

@section('tituloprincipal')
<style>
    :root {
        --primary-color: rgb(0, 10, 102);
        --secondary-color: #ff0000;
        --text-color: #333333;
        --light-bg: rgb(204, 204, 204);
        --white: #ffffff;
        --gray: #dddddd;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Times New Roman', Times, serif, sans-serif;
    }

    body {
        color: var(--text-color);
        background-color: var(--light-bg);
        line-height: 1.6;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    header {
        background-color: var(--white);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.9);
        padding: 20px 0;
        position: sticky;
        top: 0;
        z-index: 100;
    }

    .header-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo {
        font-size: 24px;
        font-weight: bold;
        color: var(--primary-color);
        text-decoration: none;
    }

    .logo span {
        color: var(--secondary-color);
    }

    nav ul {
        display: flex;
        list-style: none;
    }

    nav ul li {
        margin-left: 20px;
    }

    nav ul li a {
        text-decoration: none;
        color: var(--text-color);
        font-weight: 500;
        transition: color 0.3s ease;
    }

    nav ul li a:hover {
        color: var(--primary-color);
    }

    .hero {
        background-color: var(--primary-color);
        color: var(--white);
        padding: 50px 0;
        text-align: center;
    }

    .hero h1 {
        color: white;
        font-size: 86px;
        margin-bottom: 20px;
    }

    .hero p {
        font-size: 18px;
        max-width: 800px;
        margin: 0 auto;
    }

    .publications-container {
        padding: 50px 0;
    }

    .filters {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .filter-categories {
        display: flex;
        gap: 10px;
    }

    .filter-btn {
        padding: 8px 16px;
        background-color: var(--white);
        border: 1px solid var(--gray);
        border-radius: 20px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .filter-btn:hover,
    .filter-btn.active {
        background-color: var(--primary-color);
        color: var(--white);
        border-color: var(--primary-color);
    }

    .search-box {
        position: relative;
    }

    .search-box input {
        padding: 10px 40px 10px 15px;
        border: 1px solid var(--gray);
        border-radius: 20px;
        outline: none;
        width: 250px;
    }

    .search-box button {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        cursor: pointer;
    }

    .publications-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
        gap: 30px;
    }

    .publication-card {
        background-color: var(--white);
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .publication-card:hover {
        transform: translateY(-5px);
    }

    .card-image {
        height: 200px;
        overflow: hidden;
    }

    .card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .publication-card:hover .card-image img {
        transform: scale(1.05);
    }

    .card-content {
        padding: 20px;
    }

    .card-category {
        display: inline-block;
        background-color: var(--secondary-color);
        color: var(--white);
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 12px;
        margin-bottom: 10px;
    }

    .card-title {
        font-size: 18px;
        margin-bottom: 10px;
        font-weight: bold;
    }

    .card-excerpt {
        color: #666;
        margin-bottom: 15px;
        font-size: 14px;
    }

    .card-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 12px;
        color: #888;
    }

    .read-more {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: bold;
        display: inline-block;
        margin-top: 10px;
        transition: color 0.3s ease;
    }

    .read-more:hover {
        color: var(--secondary-color);
    }

    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 50px;
        gap: 10px;
    }

    .pagination-btn {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid var(--gray);
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .pagination-btn:hover,
    .pagination-btn.active {
        background-color: var(--primary-color);
        color: var(--white);
        border-color: var(--primary-color);
    }

    .featured-publication {
        margin-bottom: 40px;
        background-color: var(--white);
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }

    .featured-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
    }

    .featured-image {
        height: 400px;
    }

    .featured-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .featured-text {
        padding: 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .featured-label {
        background-color: var(--secondary-color);
        color: var(--white);
        padding: 5px 12px;
        border-radius: 15px;
        display: inline-block;
        margin-bottom: 15px;
        font-weight: bold;
    }

    .featured-title {
        font-size: 26px;
        margin-bottom: 15px;
    }

    .featured-excerpt {
        margin-bottom: 20px;
        font-size: 16px;
        line-height: 1.8;
    }

    footer {
        background-color: #222;
        color: var(--white);
        padding: 40px 0;
    }

    .footer-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
    }

    .footer-section h3 {
        font-size: 18px;
        margin-bottom: 20px;
        color: var(--secondary-color);
    }

    .footer-links {
        list-style: none;
    }

    .footer-links li {
        margin-bottom: 10px;
    }

    .footer-links a {
        color: var(--white);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-links a:hover {
        color: var(--secondary-color);
    }

    .social-links {
        display: flex;
        gap: 15px;
        margin-top: 20px;
    }

    .social-btn {
        width: 40px;
        height: 40px;
        background-color: #444;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.3s ease;
    }

    .social-btn:hover {
        background-color: var(--secondary-color);
    }

    .copyright {
        text-align: center;
        margin-top: 40px;
        padding-top: 20px;
        border-top: 1px solid #444;
    }

    @media (max-width: 768px) {
        .featured-content {
            grid-template-columns: 1fr;
        }

        .featured-image {
            height: 250px;
        }

        .filters {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
        }

        .publications-grid {
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        }
    }
</style>

<section class="hero">
    <div class="container">
        <h1>Publicaciones</h1>
        <p>Mantente al día con las últimas noticias, historias de éxito y actualizaciones de la fundación Pacho's Club.</p>
    </div>
</section>

@endsection

@section('contenido')
<main class="container publications-container">

    <div class="featured-publication">
        <div class="featured-content">
            <div class="featured-image">
                <img src="https://scontent-bog2-1.xx.fbcdn.net/v/t39.30808-6/464403941_3365677940235119_6766360689866814311_n.jpg?stp=dst-jpg_s960x960_tt6&_nc_cat=100&ccb=1-7&_nc_sid=2285d6&_nc_ohc=Ix86eOECYSwQ7kNvwHASCD4&_nc_oc=AdnfhynJHNOSFZrWUEmLC_wEFxsB8fm_u-Yyk8C4205M3lhSSw-_l5IEGYs-36rFJzM&_nc_zt=23&_nc_ht=scontent-bog2-1.xx&_nc_gid=rq6PA9Q78SrKdSYUAbTqCA&oh=00_AfE-6zkaQdeF0TP5ay7YggkyEoUNfp81QgCi3ivsqZNvBQ&oe=67FB92C3" alt="Torneo de fútbol juvenil">
            </div>
            <div class="featured-text">
                <span class="featured-label">DESTACADO</span>
                <h2 class="featured-title">Gran éxito en el Torneo Regional Juvenil 2025</h2>
                <p class="featured-excerpt">Más de 500 jóvenes deportistas participaron en nuestro torneo anual, demostrando talento, disciplina y espíritu deportivo. El evento culminó con una emotiva ceremonia donde se reconoció el esfuerzo de todos los participantes.</p>
                <a href="#" class="read-more">Leer más →</a>
            </div>
        </div>
    </div>

    <div class="filters">
        <div class="filter-categories">
            <button class="filter-btn active">Todos</button>
            <button class="filter-btn">Noticias</button>
            <button class="filter-btn">Eventos</button>
            <button class="filter-btn">Historias</button>
            <button class="filter-btn">Proyectos</button>
        </div>
        <div class="search-box">
            <input type="text" placeholder="Buscar publicaciones...">
            <button>🔍</button>
        </div>
    </div>

    <div class="publications-grid">
        <div class="publication-card">
            <div class="card-image">
                <img src="https://scontent-bog2-1.xx.fbcdn.net/v/t1.6435-9/72875724_2309910566005869_5801658109952786432_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=127cfc&_nc_ohc=BANQa1ZtykwQ7kNvwEjAUtX&_nc_oc=AdmOagzleXy1swA__bY_cZQ7ZSn_oh7rKP6NNkpKnbBfgbHUEMFjJ-Y3CscfZnQrDjo&_nc_zt=23&_nc_ht=scontent-bog2-1.xx&_nc_gid=D_AkKpUMaXgL_J_pLIRc1A&oh=00_AfFm-AfsK7S9m0z2_v4nwXbyZx2HyZn1rZjf4wlDOFbgIw&oe=681D3221" alt="Entrenamiento de fútbol">
            </div>
            <div class="card-content">
                <span class="card-category">Noticias</span>
                <h3 class="card-title">Nuevos programas de entrenamiento para jóvenes deportistas</h3>
                <p class="card-excerpt">Pacho's Club implementa metodologías innovadoras para el desarrollo integral de los atletas en formación.</p>
                <div class="card-meta">
                    <span>15 de marzo, 2025</span>
                    <a href="#" class="read-more">Leer más</a>
                </div>
            </div>
        </div>

        <div class="publication-card">
            <div class="card-image">
                <img src="https://scontent-bog2-2.xx.fbcdn.net/v/t1.6435-9/65531325_2235281120135481_7380174834522652672_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=833d8c&_nc_ohc=LOb_I1DLz7sQ7kNvwFUusPi&_nc_oc=AdmtP1GSOZb9D_TQMQ7S1hogkpJA7DL5jq2_zlcOA_eGQURkLBrwdX8jheti8L8luvM&_nc_zt=23&_nc_ht=scontent-bog2-2.xx&_nc_gid=radHChgIpizlRiGG9IxN1g&oh=00_AfHO316NoyHifJ7iobCWJvVmTX32cm3vC7vyUzQ3b5YxIA&oe=681D2C1F" alt="Donación de equipamiento">
            </div>
            <div class="card-content">
                <span class="card-category">Proyectos</span>
                <h3 class="card-title">Donación de equipamiento deportivo a escuelas rurales</h3>
                <p class="card-excerpt">La fundación entregó material deportivo a 10 escuelas de zonas rurales, beneficiando a más de 1,200 niños.</p>
                <div class="card-meta">
                    <span>2 de marzo, 2025</span>
                    <a href="#" class="read-more">Leer más</a>
                </div>
            </div>
        </div>

        <div class="publication-card">
            <div class="card-image">
                <img src="https://scontent-bog2-2.xx.fbcdn.net/v/t1.6435-9/62545469_2221186494878277_3489315445125677056_n.jpg?stp=dst-jpg_s600x600_tt6&_nc_cat=109&ccb=1-7&_nc_sid=833d8c&_nc_ohc=ya_ZYfPT0acQ7kNvwFvT3PW&_nc_oc=Admk8WPTecB4Zqae_eM1Gbcyof1eb95dwGpMvhI6NAV1RVBGTEtimC1nA--c1xo1Er0&_nc_zt=23&_nc_ht=scontent-bog2-2.xx&_nc_gid=ak7HR7DYQVRPLRYLkst5lA&oh=00_AfH6mtfJqZj5bBeIs8AYPwCqY7ph2gPUWYR2EQFqWVRb9A&oe=681D52BA" alt="Historia de superación">
            </div>
            <div class="card-content">
                <span class="card-category">Historias</span>
                <h3 class="card-title">De Pacho's Club a la selección nacional: la historia de Carlos Mendoza</h3>
                <p class="card-excerpt">Conoce cómo este joven atleta superó obstáculos y alcanzó su sueño gracias a su talento y al apoyo de la fundación.</p>
                <div class="card-meta">
                    <span>25 de febrero, 2025</span>
                    <a href="#" class="read-more">Leer más</a>
                </div>
            </div>
        </div>

        <div class="publication-card">
            <div class="card-image">
                <img src="https://scontent-bog2-1.xx.fbcdn.net/v/t1.6435-9/56513048_2173054353024825_6063837984740868096_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=833d8c&_nc_ohc=AoxkcFSVzS0Q7kNvwEBzzjX&_nc_oc=Adnq__4UYcxndSBg4gX8hBgNxw8Y1eDldTQCd5OCBLlvK6-rLSHLkvRTkuCaYrmcHPY&_nc_zt=23&_nc_ht=scontent-bog2-1.xx&_nc_gid=VSoWDaLb9RCpAiVcuaeL7g&oh=00_AfFJWUygSyXy55AcuEXsDQ0JBdhjdCT6XvK0VMFLFwIzkg&oe=681D3925" alt="Convenio educativo">
            </div>
            <div class="card-content">
                <span class="card-category">Noticias</span>
                <h3 class="card-title">Nuevo convenio con universidades para becas deportivas</h3>
                <p class="card-excerpt">Pacho's Club firma acuerdos con tres universidades para ofrecer becas académicas a deportistas destacados.</p>
                <div class="card-meta">
                    <span>18 de febrero, 2025</span>
                    <a href="#" class="read-more">Leer más</a>
                </div>
            </div>
        </div>

        <div class="publication-card">
            <div class="card-image">
                <img src="https://scontent-bog2-2.xx.fbcdn.net/v/t1.6435-9/53110792_2153541874976073_2149212557020233728_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=536f4a&_nc_ohc=VvOGmkv6LRwQ7kNvwE9zMYR&_nc_oc=Adlz8D8luuKEDeyHqmJj_5sGp9Vpi4w8SwMBiJZKvcA_-gkZHGNmn5g3R02oQuZGCH4&_nc_zt=23&_nc_ht=scontent-bog2-2.xx&_nc_gid=YVcwpoXYzmmc6gBxaCIWfQ&oh=00_AfEujNJOnst9FqSUFIv75LD9d2AmhGUbu4D62AnbyG1WEg&oe=681D4ABB" alt="Taller de nutrición">
            </div>
            <div class="card-content">
                <span class="card-category">Eventos</span>
                <h3 class="card-title">Taller de nutrición deportiva para familias</h3>
                <p class="card-excerpt">Especialistas compartieron conocimientos sobre alimentación saludable para optimizar el rendimiento deportivo.</p>
                <div class="card-meta">
                    <span>10 de febrero, 2025</span>
                    <a href="#" class="read-more">Leer más</a>
                </div>
            </div>
        </div>

        <div class="publication-card">
            <div class="card-image">
                <img src="https://scontent-bog2-1.xx.fbcdn.net/v/t1.6435-9/53136649_2153540971642830_2170982122746019840_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=536f4a&_nc_ohc=wsAcmozl2UkQ7kNvwEOhS0F&_nc_oc=AdkJuttZ25QkOzQ-WTnbiNZaIh0af1PZZl72_nzjYtWIbs4mq2Yap2PyV3ksquItDig&_nc_zt=23&_nc_ht=scontent-bog2-1.xx&_nc_gid=YVcwpoXYzmmc6gBxaCIWfQ&oh=00_AfErNjQgnQqHcV8haeReBAGsu8MQ_YzhwXL_SH19hvEn1g&oe=681D5055" alt="Competencia internacional">
            </div>
            <div class="card-content">
                <span class="card-category">Eventos</span>
                <h3 class="card-title">Equipo juvenil representará al país en torneo internacional</h3>
                <p class="card-excerpt">Los jóvenes talentos de Pacho's Club competirán en el prestigioso torneo Copa Amistad en Brasil.</p>
                <div class="card-meta">
                    <span>5 de febrero, 2025</span>
                    <a href="#" class="read-more">Leer más</a>
                </div>
            </div>
        </div>
    </div>

    <div class="pagination">
        <a href="#" class="pagination-btn">1</a>
        <a href="#" class="pagination-btn">2</a>
        <a href="#" class="pagination-btn">3</a>
        <a href="#" class="pagination-btn">→</a>
    </div>

</main>
@endsection