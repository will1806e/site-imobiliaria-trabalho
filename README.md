# Sistema Web para Imobiliaria

Trabalho pratico em PHP, MySQL, HTML, CSS e Bootstrap para gerenciamento de imoveis.

## Como executar

1. Copie o projeto para a pasta `htdocs` do XAMPP.
2. Inicie Apache e MySQL no painel do XAMPP.
3. Se ja existir outro MySQL usando a porta 3306, configure o MySQL do XAMPP na porta `3307`.
4. Abra o phpMyAdmin e importe o arquivo `banco.sql`.
5. Acesse `http://localhost/site-imobiliaria-trabalho/html/index.php`.
6. Acesse a area administrativa em `http://localhost/site-imobiliaria-trabalho/html/admin.php`.

## Funcionalidades

- Pagina inicial com listagem dos imoveis cadastrados.
- Pagina de detalhes para abrir cada imovel individualmente.
- Area administrativa para cadastrar, listar, editar e excluir imoveis.
- Login administrativo protegido por sessao. Senha padrao: `admin`.
- Tema claro e tema escuro com preferencia salva no navegador.
- Formulario com texto, textarea, select, radio, upload de imagem principal e upload de imagens adicionais.
- Armazenamento das imagens enviadas na pasta `uploads`.
- Banco MySQL com tabelas `imoveis` e `imovel_imagens`.
- Layout com CSS proprio, Bootstrap e responsividade basica.
