<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imobiliária</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <header>
    <!--Cabeçalho do site-->
        <div class="sim">
            <img class="menu-icone" src="../icones/menu.png" alt="Menu">
            <img class="logo" src="../icones/logo.png" alt="Logo">
            <img class="icone-usuario" src="../icones/account_circle.png" alt="Usuario"">
        </div>
        <hr>
    </header>
    <aside hidden>
        <!--Fazer o menu aqui (vou deixar como hidden por enquanto)-->
    </aside>
    <main>
        <div><img src="../imagens/image.png" class="rounded" alt="" width="100%" height="800px"></div>
        <br>

        <div class="h1-hr">
            <h1 class="sim">Transformando imóveis em lares e sonhos em realidade.</h1>
            <hr class="linha-h1">
        </div>

    <!--Carrossel bootstrap (dei uma alterada)-->
        <section class="carrossel-section">
            <div id="carouselExampleAutoplaying" class="carousel slide carrossel" data-bs-ride="carousel" style="width: 800px;">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="../imagens/modern-childrens-room.png" class="d-block w-100 imagem-carrossel" alt="..." height="400">
                    </div>
                    <div class="carousel-item">
                    <img src="../imagens/mid-century-modern-dining-area.png" class="d-block w-100 imagem-carrossel" alt="..." height="400">
                    </div>
                    <div class="carousel-item">
                    <img src="../imagens/interior-of-living-room.png" class="d-block w-100 imagem-carrossel" alt="..." height="400">
                    </div>
                    <div class="carousel-item">
                    <img src="../imagens/interior-of-living-room-at-night-with-illuminated-tv-and-ceiling.png" class="d-block w-100 imagem-carrossel" alt="..." height="400">
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
        <h3 class="veja">Veja Alguns De Nossos Imóveis</h3>
        <section class="banners-container">
            <article class="banner-imoveis">
                <img class="banner-imagem" src="../imagens/interior-of-living-room.png" alt="">
                <div class="banner-div">
                    <div class="preco-titulo">
                        <h4>R$ 1.100.000</h4>
                        <h4>TITULO DO IMOVEL</h4>
                    </div>
                    <div class="banner-categorias">
                        <span class="tipo-imovel">Tipo do Imovel (Casa, Apartamento, Sobrado)</span>
                        <div>
                        <!--Categorias (tamanho, quantidade de banheiros e quartos etc...)-->
                        <div class="banner-categorias-img">
                            <div class="cat-num"><img class="categorias-img" src="../icones/single_bed.png" alt="Quantidade de quartos" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Quantidade de quartos" title="Quantidade de quartos"> <span>6</span></div> 
                            <div  class="cat-num"><img class="categorias-img" src="../icones/shower.png" alt="Quantidade de banheiros" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Quantidade de banheiros" title="Quantidade de banheiros"><span>7</span></div>
                            <div  class="cat-num"><img class="categorias-img" src="../icones/comodos.png" alt="Quantidade de cômodos" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Quantidade de cômodos" title="Quantidade de cômodos"><span>2</span></div>
                            <div  class="cat-num"><img class="categorias-img" src="../icones/directions_car.png" alt="Espaço para carros" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Espaço para carros" title="Espaço para carros"><span>1</span></div>
                            <div  class="cat-num"><img class="categorias-img" src="../icones/square_foot.png" alt="Medida em m²" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Medida em m²" title="Medida em m²"><span>41,2</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="banner-spans"><span>311</span><span>, </span><span>Renato Gonçalves</span><span>, </span><span>Barreiras</span><span>, </span><span>Bahia</span><span>, </span><span>00000-000</span></div>
                </div>
            </article>
            <article class="banner-imoveis">
                <img class="banner-imagem" src="../imagens/interior-of-living-room.png" alt="">
                <div class="banner-div">
                    <div class="preco-titulo">
                        <h4>R$ 1.100.000</h4>
                        <h4>TITULO DO IMOVEL</h4>
                    </div>
                    <div class="banner-categorias">
                        <span class="tipo-imovel">Tipo do Imovel (Casa, Apartamento, Sobrado)</span>
                        <div>
                        <!--Categorias (tamanho, quantidade de banheiros e quartos etc...)-->
                        <div class="banner-categorias-img">
                            <div class="cat-num"><img class="categorias-img" src="../icones/single_bed.png" alt="Quantidade de quartos" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Quantidade de quartos" title="Quantidade de quartos"> <span>6</span></div> 
                            <div  class="cat-num"><img class="categorias-img" src="../icones/shower.png" alt="Quantidade de banheiros" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Quantidade de banheiros" title="Quantidade de banheiros"><span>7</span></div>
                            <div  class="cat-num"><img class="categorias-img" src="../icones/comodos.png" alt="Quantidade de cômodos" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Quantidade de cômodos" title="Quantidade de cômodos"><span>2</span></div>
                            <div  class="cat-num"><img class="categorias-img" src="../icones/directions_car.png" alt="Espaço para carros" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Espaço para carros" title="Espaço para carros"><span>1</span></div>
                            <div  class="cat-num"><img class="categorias-img" src="../icones/square_foot.png" alt="Medida em m²" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Medida em m²" title="Medida em m²"><span>41,2</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="banner-spans"><span>311</span><span>, </span><span>Renato Gonçalves</span><span>, </span><span>Barreiras</span><span>, </span><span>Bahia</span><span>, </span><span>00000-000</span></div>
                </div>
            </article>
            <article class="banner-imoveis">
                <img class="banner-imagem" src="../imagens/interior-of-living-room.png" alt="">
                <div class="banner-div">
                    <div class="preco-titulo">
                        <h4>R$ 1.100.000</h4>
                        <h4>TITULO DO IMOVEL</h4>
                    </div>
                    <div class="banner-categorias">
                        <span class="tipo-imovel">Tipo do Imovel (Casa, Apartamento, Sobrado)</span>
                        <div>
                        <!--Categorias (tamanho, quantidade de banheiros e quartos etc...)-->
                        <div class="banner-categorias-img">
                            <div class="cat-num"><img class="categorias-img" src="../icones/single_bed.png" alt="Quantidade de quartos" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Quantidade de quartos" title="Quantidade de quartos"> <span>6</span></div> 
                            <div  class="cat-num"><img class="categorias-img" src="../icones/shower.png" alt="Quantidade de banheiros" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Quantidade de banheiros" title="Quantidade de banheiros"><span>7</span></div>
                            <div  class="cat-num"><img class="categorias-img" src="../icones/comodos.png" alt="Quantidade de cômodos" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Quantidade de cômodos" title="Quantidade de cômodos"><span>2</span></div>
                            <div  class="cat-num"><img class="categorias-img" src="../icones/directions_car.png" alt="Espaço para carros" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Espaço para carros" title="Espaço para carros"><span>1</span></div>
                            <div  class="cat-num"><img class="categorias-img" src="../icones/square_foot.png" alt="Medida em m²" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Medida em m²" title="Medida em m²"><span>41,2</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="banner-spans"><span>311</span><span>, </span><span>Renato Gonçalves</span><span>, </span><span>Barreiras</span><span>, </span><span>Bahia</span><span>, </span><span>00000-000</span></div>
                </div>
            </article>
            <article class="banner-imoveis">
                <img class="banner-imagem" src="../imagens/interior-of-living-room.png" alt="">
                <div class="banner-div">
                    <div class="preco-titulo">
                        <h4>R$ 1.100.000</h4>
                        <h4>TITULO DO IMOVEL</h4>
                    </div>
                    <div class="banner-categorias">
                        <span class="tipo-imovel">Tipo do Imovel (Casa, Apartamento, Sobrado)</span>
                        <div>
                        <!--Categorias (tamanho, quantidade de banheiros e quartos etc...)-->
                        <div class="banner-categorias-img">
                            <div class="cat-num"><img class="categorias-img" src="../icones/single_bed.png" alt="Quantidade de quartos" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Quantidade de quartos" title="Quantidade de quartos"> <span>6</span></div> 
                            <div  class="cat-num"><img class="categorias-img" src="../icones/shower.png" alt="Quantidade de banheiros" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Quantidade de banheiros" title="Quantidade de banheiros"><span>7</span></div>
                            <div  class="cat-num"><img class="categorias-img" src="../icones/comodos.png" alt="Quantidade de cômodos" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Quantidade de cômodos" title="Quantidade de cômodos"><span>2</span></div>
                            <div  class="cat-num"><img class="categorias-img" src="../icones/directions_car.png" alt="Espaço para carros" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Espaço para carros" title="Espaço para carros"><span>1</span></div>
                            <div  class="cat-num"><img class="categorias-img" src="../icones/square_foot.png" alt="Medida em m²" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Medida em m²" title="Medida em m²"><span>41,2</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="banner-spans"><span>311</span><span>, </span><span>Renato Gonçalves</span><span>, </span><span>Barreiras</span><span>, </span><span>Bahia</span><span>, </span><span>00000-000</span></div>
                </div>
            </article>
            <article class="banner-imoveis">
                <img class="banner-imagem" src="../imagens/interior-of-living-room.png" alt="">
                <div class="banner-div">
                    <div class="preco-titulo">
                        <h4>R$ 1.100.000</h4>
                        <h4>TITULO DO IMOVEL</h4>
                    </div>
                    <div class="banner-categorias">
                        <span class="tipo-imovel">Tipo do Imovel (Casa, Apartamento, Sobrado)</span>
                        <div>
                        <!--Categorias (tamanho, quantidade de banheiros e quartos etc...)-->
                        <div class="banner-categorias-img">
                            <div class="cat-num"><img class="categorias-img" src="../icones/single_bed.png" alt="Quantidade de quartos" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Quantidade de quartos" title="Quantidade de quartos"> <span>6</span></div> 
                            <div  class="cat-num"><img class="categorias-img" src="../icones/shower.png" alt="Quantidade de banheiros" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Quantidade de banheiros" title="Quantidade de banheiros"><span>7</span></div>
                            <div  class="cat-num"><img class="categorias-img" src="../icones/comodos.png" alt="Quantidade de cômodos" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Quantidade de cômodos" title="Quantidade de cômodos"><span>2</span></div>
                            <div  class="cat-num"><img class="categorias-img" src="../icones/directions_car.png" alt="Espaço para carros" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Espaço para carros" title="Espaço para carros"><span>1</span></div>
                            <div  class="cat-num"><img class="categorias-img" src="../icones/square_foot.png" alt="Medida em m²" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Medida em m²" title="Medida em m²"><span>41,2</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="banner-spans"><span>311</span><span>, </span><span>Renato Gonçalves</span><span>, </span><span>Barreiras</span><span>, </span><span>Bahia</span><span>, </span><span>00000-000</span></div>
                </div>
            </article>
            <article class="banner-imoveis">
                <img class="banner-imagem" src="../imagens/interior-of-living-room.png" alt="">
                <div class="banner-div">
                    <div class="preco-titulo">
                        <h4>R$ 1.100.000</h4>
                        <h4>TITULO DO IMOVEL</h4>
                    </div>
                    <div class="banner-categorias">
                        <span class="tipo-imovel">Tipo do Imovel (Casa, Apartamento, Sobrado)</span>
                        <div>
                        <!--Categorias (tamanho, quantidade de banheiros e quartos etc...)-->
                        <div class="banner-categorias-img">
                            <div class="cat-num"><img class="categorias-img" src="../icones/single_bed.png" alt="Quantidade de quartos" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Quantidade de quartos" title="Quantidade de quartos"> <span>6</span></div> 
                            <div  class="cat-num"><img class="categorias-img" src="../icones/shower.png" alt="Quantidade de banheiros" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Quantidade de banheiros" title="Quantidade de banheiros"><span>7</span></div>
                            <div  class="cat-num"><img class="categorias-img" src="../icones/comodos.png" alt="Quantidade de cômodos" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Quantidade de cômodos" title="Quantidade de cômodos"><span>2</span></div>
                            <div  class="cat-num"><img class="categorias-img" src="../icones/directions_car.png" alt="Espaço para carros" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Espaço para carros" title="Espaço para carros"><span>1</span></div>
                            <div  class="cat-num"><img class="categorias-img" src="../icones/square_foot.png" alt="Medida em m²" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Medida em m²" title="Medida em m²"><span>41,2</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="banner-spans"><span>311</span><span>, </span><span>Renato Gonçalves</span><span>, </span><span>Barreiras</span><span>, </span><span>Bahia</span><span>, </span><span>00000-000</span></div>
                </div>
            </article>
            <article class="banner-imoveis">
                <img class="banner-imagem" src="../imagens/interior-of-living-room.png" alt="">
                <div class="banner-div">
                    <div class="preco-titulo">
                        <h4>R$ 1.100.000</h4>
                        <h4>TITULO DO IMOVEL</h4>
                    </div>
                    <div class="banner-categorias">
                        <span class="tipo-imovel">Tipo do Imovel (Casa, Apartamento, Sobrado)</span>
                        <div>
                        <!--Categorias (tamanho, quantidade de banheiros e quartos etc...)-->
                        <div class="banner-categorias-img">
                            <div class="cat-num"><img class="categorias-img" src="../icones/single_bed.png" alt="Quantidade de quartos" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Quantidade de quartos" title="Quantidade de quartos"> <span>6</span></div> 
                            <div  class="cat-num"><img class="categorias-img" src="../icones/shower.png" alt="Quantidade de banheiros" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Quantidade de banheiros" title="Quantidade de banheiros"><span>7</span></div>
                            <div  class="cat-num"><img class="categorias-img" src="../icones/comodos.png" alt="Quantidade de cômodos" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Quantidade de cômodos" title="Quantidade de cômodos"><span>2</span></div>
                            <div  class="cat-num"><img class="categorias-img" src="../icones/directions_car.png" alt="Espaço para carros" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Espaço para carros" title="Espaço para carros"><span>1</span></div>
                            <div  class="cat-num"><img class="categorias-img" src="../icones/square_foot.png" alt="Medida em m²" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Medida em m²" title="Medida em m²"><span>41,2</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="banner-spans"><span>311</span><span>, </span><span>Renato Gonçalves</span><span>, </span><span>Barreiras</span><span>, </span><span>Bahia</span><span>, </span><span>00000-000</span></div>
                </div>
            </article>
            <article class="banner-imoveis">
                <img class="banner-imagem" src="../imagens/interior-of-living-room.png" alt="">
                <div class="banner-div">
                    <div class="preco-titulo">
                        <h4>R$ 1.100.000</h4>
                        <h4>TITULO DO IMOVEL</h4>
                    </div>
                    <div class="banner-categorias">
                        <span class="tipo-imovel">Tipo do Imovel (Casa, Apartamento, Sobrado)</span>
                        <div>
                        <!--Categorias (tamanho, quantidade de banheiros e quartos etc...)-->
                        <div class="banner-categorias-img">
                            <div class="cat-num"><img class="categorias-img" src="../icones/single_bed.png" alt="Quantidade de quartos" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Quantidade de quartos" title="Quantidade de quartos"> <span>6</span></div> 
                            <div  class="cat-num"><img class="categorias-img" src="../icones/shower.png" alt="Quantidade de banheiros" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Quantidade de banheiros" title="Quantidade de banheiros"><span>7</span></div>
                            <div  class="cat-num"><img class="categorias-img" src="../icones/comodos.png" alt="Quantidade de cômodos" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Quantidade de cômodos" title="Quantidade de cômodos"><span>2</span></div>
                            <div  class="cat-num"><img class="categorias-img" src="../icones/directions_car.png" alt="Espaço para carros" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Espaço para carros" title="Espaço para carros"><span>1</span></div>
                            <div  class="cat-num"><img class="categorias-img" src="../icones/square_foot.png" alt="Medida em m²" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-custom" data-bs-placement="bottom" data-bs-title="Medida em m²" title="Medida em m²"><span>41,2</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="banner-spans"><span>311</span><span>, </span><span>Renato Gonçalves</span><span>, </span><span>Barreiras</span><span>, </span><span>Bahia</span><span>, </span><span>00000-000</span></div>
                </div>
            </article>
        </section>

    </main>
    <!--Rodapé do site-->
    <footer>
        <hr>
        <img src="../icones/logo.png" alt="Logo" width="150">
        <div>
            <h3>Contatos</h3>
            <ul>
                <li>Whatsapp</li>
                <li>Instagram</li>
                <li>Facebook</li>
                <li>X</li>
            </ul>
        </div>
        <hr>
        Todos os Direitos Reservados &copy;
        <br>
        <br>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <script>
        document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
            new bootstrap.Tooltip(el);
        });
    </script>
</body>
</html>