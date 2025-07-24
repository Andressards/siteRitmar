<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ritmar Academy</title>
    <link rel="stylesheet" href="css/style_site.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
<header>
    <div class="container">
        <div class="logo">
            <img src="\img\logo-ritmar-academy-amarela-removebg-preview.png" alt="Logo">
        </div>

        <!-- Ícone do menu hambúrguer -->
        <div class="menu-toggle" id="menu-toggle">
            <i class="fas fa-bars"></i>
        </div>

        <nav class="menu" id="menu">
            <ul class="menu-underline">
                <li><a href="#catalogo-section">Cursos</a></li>
                <li><a href="#sobre">Sobre</a></li>
                <li><a href="#rodape">Contato</a></li>
                <li>
                    @if(auth()->check())
                        <form action="/logout" method="POST" class="d-inline">
                            @csrf
                            <a href="/logout" class="nav-link" 
                               onclick="event.preventDefault();
                               this.closest('form').submit();">Sair</a>
                        </form>
                    @else
                        <a href="/login" class="nav-link">Painel Administrativo</a>
                    @endif
                </li>
            </ul>
        </nav>
    </div>
</header>


<a href="https://wa.me/5599999999999" target="_blank" class="whatsapp-button">
    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
</a>

<!--
    <section id="inicio-section">
        <div class="inicio-container">
            <img class="image-banner" src="img\UMG_Latin_1920x600_No_Logo_FINAL.jpg" alt="Banner Ritmar Academy">
        </div>
    </section>
!-->
    <section id="historia" class="section">
        <div class="historia-carrossel">
            <div class="carrossel">
                <div class="carrossel-imagens">
                    <img src="img/imagem1.jpg" alt="Imagem 1">
                    <img src="img/imagem2.jpg" alt="Imagem 2">
                    <img src="img/imagem3.jpg" alt="Imagem 3">
                    <img src="img/imagem4.jpg" alt="Imagem 4">
                    <img src="img/imagem5.jpg" alt="Imagem 5">
                </div>
            </div>
            <div class="historia-texto">
                <h1>Viva a Música, Sinta a Emoção!</h1>
                <p>Transforme sua paixão em talento! Na Ritmar, você aprende com os melhores e vive a música de forma única. Seja qual for seu sonho musical, estamos aqui para torná-lo realidade!</p>
                <a href="#cursos" class="btn btn-primary">Descubra Nossos Cursos</a>
            </div>
            
    </section>  

    <section id="catalogo-section">
        <div class="catalogo-header">
            <h3 class="titulo"><strong>Conheça Nossos Cursos em Destaque</strong></h3>

            <div class="filtro-container">
                <form action="{{ route('site.buscar') }}" method="GET" class="form-busca">
                    <input type="text" name="search" placeholder="Buscar curso..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-secondary">Buscar</button>
                </form>
            </div>
        </div>

        <div class="cursos-container" id="cursos">
            @foreach($cursos as $curso)
                <div class="curso-card">
                <img src="{{ url('storage/' . $curso->imagem) }}" alt="{{ $curso->nome }}" class="curso-imagem">
                    <h4>{{ $curso->nome }}</h4>
                    <p>R${{ $curso->preco }}</p>
                    <a href="{{ route('site.show', $curso->id) }}" class="btn btn-primary">Saiba Mais</a>
                </div>
            @endforeach
        </div>

    </section>

<section id="sobre" class="section-sobre">
    <div class="container-sobre">
        <div class="card-sobre">
            <h1>Missão</h1>
            <p>Oferecer ensino musical de qualidade e acessível, proporcionando aos nossos alunos a oportunidade de desenvolver habilidades artísticas, culturais e sociais através da música. Buscamos inspirar a criatividade, a disciplina e o amor pela música, formando músicos completos e preparados para o mercado e para a vida.</p>
        </div>
        <div class="card-sobre">
            <h1>Visão</h1>
            <p>Ser reconhecida como a escola de música referência na formação de músicos, inovando no ensino e estimulando a paixão pela música em todas as suas formas, para todas as idades e níveis. Buscamos expandir nosso impacto, alcançando mais comunidades e transformando vidas por meio da música.</p>
        </div>
        <div class="card-sobre">
            <h1>Valores</h1>
            <ul>
                <li><strong>Excelência no ensino:</strong> Compromisso com a qualidade no processo de aprendizagem, oferecendo conteúdos atualizados e abordagens inovadoras.</li>
                <li><strong>Acessibilidade:</strong> Tornar o ensino musical acessível a pessoas de todas as idades, origens e níveis de habilidade.</li>
                <li><strong>Criatividade e expressão:</strong> Incentivar a individualidade e a criatividade de cada aluno, permitindo que eles se expressem musicalmente de forma única.</li>
                <li><strong>Desenvolvimento contínuo:</strong> Apoiar o crescimento pessoal e profissional dos alunos, incentivando a prática constante e a evolução musical.</li>
            </ul>
        </div>
    </div>
</section>
    
<footer id="rodape" class="rodape">
    <div class="rodape-container">
        <div class="rodape-info">
            <h3>Entre em Contato</h3>
            <p><strong>📍 Endereço:</strong> Rua da Música, 123 - Cidade, Estado</p>
            <p><strong>📞 Telefone:</strong> (00) 1234-5678</p>
            <p><strong>📧 E-mail:</strong> contato@ritmar.com</p>
        </div>

        <div class="rodape-redes">
            <h3>Nos Siga</h3>
            <div class="redes-sociais">
                <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
                <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="#" target="_blank"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>

    <div class="rodape-direitos">
        <p>&copy; 2025 Ritmar. Todos os direitos reservados.</p>
    </div>
</footer>


</body>

<script>document.addEventListener("DOMContentLoaded", function () {
    const sections = document.querySelectorAll("section");
    const menuLinks = document.querySelectorAll(".menu-underline a");

    function ativarMenu() {
        let scrollY = window.scrollY;

        sections.forEach((section) => {
            let sectionTop = section.offsetTop - 80;
            let sectionHeight = section.offsetHeight;
            let sectionId = section.getAttribute("id");

            if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
                menuLinks.forEach((link) => {
                    link.classList.remove("active");
                    if (link.getAttribute("href").includes(sectionId)) {
                        link.classList.add("active");
                    }
                });
            }
        });
    }

    window.addEventListener("scroll", ativarMenu);
});

document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.getElementById("menu-toggle");
    const menu = document.getElementById("menu");

    menuToggle.addEventListener("click", function () {
        menu.style.display = menu.style.display === "block" ? "none" : "block";
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const cards = document.querySelectorAll(".card-sobre");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add("aparecer");
                }, index * 300); // Adiciona um delay para cada card
            }
        });
    }, { threshold: 0.2 }); // Ajuste para quando o card começar a aparecer na tela

    cards.forEach(card => observer.observe(card));
});

document.addEventListener("DOMContentLoaded", function() {
        if (window.location.search.includes("search=")) {
            const section = document.getElementById("cursos");
            if (section) {
                section.scrollIntoView({ behavior: "smooth" });
            }
        }
    });

</script>