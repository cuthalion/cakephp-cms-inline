CMS Inline em CakePHP
==================

CMS para administra��o de sites, sem painel de administra��o (???)

Pessoal,

INSTALA��O
==================


01 - Baixar o sistema no servidor.

02 - Colocar permiss�o de leitura em app/tmp e app/webroot/img

03 - Configurar o banco de dados no app/Config/database.php

Um detalhe aqui � que caso o banco de dados seja Mysql ou Postgresql voc� n�o precisa fazer mais nada, ele configura o banco de dados sozinho, caso contr�rio execute no console do cakephp:

Console/cake schema create

Com isso ele j� gera o banco de dados corretamente!

04 - Acessar o site no servidor (ele vai criar as tabelas sozinho)

05 - Depois disso ele vai pedir pra criar um usu�rio e alguns dados do site e assim que salvar vai pra tela de login

06 - Depois de logado ele mostra como criar a primeira p�gina (home), os pain�is s�o arrast�veis, se atrapalhar, tira de cima

07 - Ele funciona normalmente, ou seja, pra criar um site personalizado, � s� criar um tema em app/View/Themed ou alterar o /app/Layout/Default

Depois posto um tutorial de como criar temas.

Lembrando que ainda est� em fase de cria��o e tem alguns bugs (99% j� to sabendo), se voc�s acharem postem aqui, mas n�o fica xingando t�.