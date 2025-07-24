<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ritmar Academy</title>
    <link rel="stylesheet" href="{{ asset('css/style_detalhe.css') }}">
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
            <nav class="menu">
                <ul class="menu-underline">
                    <li><a href="{{ route('site') }}">Voltar Para a Página Inicial</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <a href="https://wa.me/5599999999999" target="_blank" class="whatsapp-button">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
    </a>

    <section class="content">
    <div class="curso-container">
        <!-- Imagem do curso à esquerda -->
        <div class="curso-imagem">
            <img src="{{ asset('storage/' . $curso->imagem) }}" alt="{{ $curso->nome }}">
        </div>

        <!-- Detalhes do curso à direita -->
        <div class="curso-detalhes">
            <!-- Nome do curso -->
            <h1 class="curso-nome">{{ $curso->nome }}</h1>
            
            <!-- Descrição do curso -->
            <p class="curso-descricao">{{ $curso->descricao }}</p>

            <!-- Preço -->
            <p class="curso-preco">R$ {{ $curso->preco }}</p>
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
        <p>&copy; 2025 Ritmar Academy. Todos os direitos reservados.</p>
    </div>
</footer>


</body>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const elements = document.querySelectorAll(".curso-container > div, .curso-nome, .curso-descricao, .curso-preco");
    
    elements.forEach((element, index) => {
        element.style.opacity = 0;
        element.style.transform = "translateY(20px)";
    });
    
    function animateElements() {
        elements.forEach((element, index) => {
            setTimeout(() => {
                element.style.opacity = 1;
                element.style.transform = "translateY(0)";
                element.style.transition = "opacity 0.6s ease-out, transform 0.6s ease-out";
            }, index * 300);
        });
    }
    
    setTimeout(animateElements, 200);
});


</script>