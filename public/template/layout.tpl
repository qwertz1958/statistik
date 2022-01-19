<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Map: Layout</title>

        <meta charset="utf-8" />

        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="/assets/favicon.ico" />


        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        
        
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Simple line icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/styles.css" rel="stylesheet" />
    </head>
    <body id="start">

        <!-- Navigation-->
        <a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>
        <nav id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="#start">Start</a></li>

                <li class="sidebar-nav-item"><a href="#map">> interaktive Karte</a></li>
                <li class="sidebar-nav-item"><a href="#statistic">> statistische Zusammenfassung</a></li>
                <li class="sidebar-nav-item"><a href="#description">> Projektbeschreibung</a></li>
                <li class="sidebar-nav-item"><a href="#portfolio">> Portfolio</a></li>
                <li class="sidebar-nav-item"><a href="#contact">> Kontakt</a></li>

                <li class="sidebar-nav-item"><a href="#detailDescription">>> Beschreibung</a></li>
                <li class="sidebar-nav-item"><a href="#example">>> Beispiel</a></li>
            </ul>
        </nav>

        <!-- Header-->
        <header class="masthead d-flex align-items-center">
            <div class="container px-4 px-lg-5 text-center">
                <h1 class="mb-1">Daten im Überblick</h1>
                <h3 class="mb-5"><em>Schnelle und kostengünstige Information</em></h3>
                <a class="btn btn-primary btn-xl" href="#map">mehr erfahren</a>
            </div>
        </header>
        

        {% include subTemplate ~ '.tpl' %}

         <!-- Footer -->
        <footer class="content-section bg-primary text-white">
            <div class="container px-4 px-lg-5">
                <!-- Kontaktmöglichkeit -->
                
                <p>
                    Copyright &copy; Stephan Krauß 2022
                </p>

                <p>
                    Mail: info@stephankrauss.de <br>
                    Mobil: 0152 / 097 203 78
                </p>

            </div>
        </footer>

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#start"><i class="fas fa-angle-up"></i></a>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="/js/scripts.js"></script>

    </body>
</html>