CMS Inline em CakePHP
==================

CMS para administração de sites, sem painel de administração (???)

Pessoal,

INSTALAÇÃO
==================


01 - Baixar o sistema no servidor.

02 - Colocar permissão de leitura em app/tmp e app/webroot/img

03 - Configurar o banco de dados no app/Config/database.php

Um detalhe aqui é que caso o banco de dados seja Mysql ou Postgresql você não precisa fazer mais nada, ele configura o banco de dados sozinho, caso contrário execute no console do cakephp:

Console/cake schema create

Com isso ele já gera o banco de dados corretamente!

04 - Acessar o site no servidor (ele vai criar as tabelas sozinho)

05 - Depois disso ele vai pedir pra criar um usuário e alguns dados do site e assim que salvar vai pra tela de login

06 - Depois de logado ele mostra como criar a primeira página (home), os painéis são arrastáveis, se atrapalhar, tira de cima

07 - Ele funciona normalmente, ou seja, pra criar um site personalizado, é só criar um tema em app/View/Themed ou alterar o /app/Layout/Default

Depois posto um tutorial de como criar temas.

Lembrando que ainda está em fase de criação e tem alguns bugs (99% já to sabendo), se vocês acharem postem aqui, mas não fica xingando tá.