<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imobiliária</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <header>
    <!--Cabeçalho do site-->
        <img src="../icones/menu.png" alt="Menu" width="50">
        <img src="../icones/logo.png" alt="Logo" width="150">
        <img src="../icones/account_circle.png" alt="Usuario">
        <hr>
    </header>
    <aside hidden>
<!--Fazer o menu aqui (vou deixar como hidden por enquanto)-->

    </aside>
    <main>
        <div><img src="../imagens/image.png" class="rounded" alt="" width="100%" height="800px"></div>
        <br>

        <div>
            <h1>Transformando imóveis em lares e sonhos em realidade.</h1>
            <hr>
        </div>

    <!--Carrossel bootstrap (dei uma alterada)-->
        <section>
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" style="width: 800px;">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="../imagens/modern-childrens-room.png" class="d-block w-100" alt="..." height="400">
                </div>
                <div class="carousel-item">
                <img src="../imagens/mid-century-modern-dining-area.png" class="d-block w-100" alt="..." height="400">
                </div>
                <div class="carousel-item">
                <img src="../imagens/interior-of-living-room.png" class="d-block w-100" alt="..." height="400">
                </div>
                <div class="carousel-item">
                <img src="../imagens/interior-of-living-room-at-night-with-illuminated-tv-and-ceiling.png" class="d-block w-100" alt="..." height="400">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
        </section>


    </main>
    <!--Rodapé do site-->
    <footer>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>