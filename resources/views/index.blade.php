<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="MisServices, Prestação de Serviços.">
  <meta name="keywords" content="serviços, prestação de serviços, profissional, contratar serviço">
  <meta name="robots" content="index, follow">
  <meta name="author" content="Jonatas Lopes e Leonardo Santos">
  <title>MisServices</title>

  <base href="/">

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
  <link rel="icon" href="images/icone-misservices.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="images/icone-misservices.ico" type="image/x-icon" />

</head>
<body>
<header class="cabecalho container">
           <a href="index.html"><h1 class="logo"> NodeProp - Especializada em Soluções Digitais </h1></a>
           <button class="btn-menu bg-gradient"><i class="fa fa-bars fa-lg"></i></button>
           <nav class="menu">
               <a class="btn-close"><i class="fa fa-times"></i></a>
               <ul>
                   <li><a href="#">Inicio</a></li>
                   <li><a href="#">Serviços</a></li>
                   <li><a href="#">Como Funciona</a></li>
                   <li><a href="#">Contato</a></li>
                   <li><a href="#">Acesse</a></li>
               </ul>
           </nav>          
        </header>
        <!-- BANNER --> 
        <div class="banner container">
            <div class="title">
                <h2> Encontre seu serviço! </h2>
                <h3> Aqui você escolhe qual profissional se adequa melhor
                  à sua necessidade.</h3>
            </div>
            <div class="buttons">
                <button class="btn btn-cadastrar bg-white radius"> Cadastrar <i class="fa fa-arrow-circle-right"></i></button>
                <button class="btn btn-sobre bg-black radius"> Sobre <i class="fa fa-question-circle"></i></button>
            </div>
        </div>
        <!-- SERVICOS --> 
        <main class="servicos container">
            <article class="servico bg-white radius">
               <a href="#"><img src="" alt="Cliente ou Profissional"></a>
               <div class="inner">
                   <a href="#"> Seja um cliente ou profissional </a>
                   <h4>Utilize o MisServices como desejar</h4>
                   <p>No processo de cadastro, você pode optar por, além de ser um cliente e contratar 
                     outros profissionais, você também pode ser um profissional
                     que presta seus serviços atravésdo MisServices.
                   </p>
               </div>
            </article>
            <article class="servico bg-white radius">
               <a href="#"><img src="" alt="Avalie o serviço"></a>
               <div class="inner">
                   <a href="#"> Avalie o serviço </a>
                   <h4>Dê seu feedback sobre o serviço prestado</h4>
                   <p>Assim que um profissional contratado terminou a realização do 
                     serviço, o cliente pode avaliar suas características e/ou adicionar
                     comentários sobre a realização do serviço.
                   </p>
               </div>
            </article>
            <article class="servico bg-white radius">
               <a href="#"><img src="" alt="Profissional no MisServices"></a>
               <div class="inner">
                   <a href="#"> Profissional no MisServices </a>
                   <h4> Vantagens de ser Profissional no MisServices </h4>
                   <p>
                     Ganhe mais clientes com o MisServices! Ser profissional no MisServices te garante um
                     maior alcance de clientes para os seus serviços. Consulte a página de 
                     "Como Funciona" no menu acima e saiba mais!
                   </p>
               </div>
            </article>
        </main>
        <!-- NEWSLETTER -->
        <section class="newsletter container bg-black">
           <h2> Inscreva-se agora! </h2>
           <h3>  Receba novidades, dicas e muito mais </h3>
           <form>
              <input class="bg-black radius" type="email" name="email" placeholder="Seu email">
              <button class="bg-white radius"> Cadastrar </button>
           </form>
        </section>
        <!-- RODAPÉ -->
        <footer class="rodape container bg-gradient">
          <div class="social-icons">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
          </div>
          <p class="copyright">
            Copyright © MisServices 2017. Todos os direitos reservados.
        </footer>       
        
        <!-- JQUERY --> 
        <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>
        $(".btn-menu").click(function(){
          $(".menu").show();
        });
        $(".btn-close").click(function(){
          $(".menu").hide();
        });
        </script>
</body>

</html>