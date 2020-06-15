<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('meta-description')">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="css/style.css">
    @yield('currentpage-css')

    <script src="https://kit.fontawesome.com/fb3e250c04.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

            <div class="lign-grid">
                <p class="center_logo"><img class="logo" src="image/logo_LabCESI.png" alt=""></p>
                <div class="navigate">
                    <a href="/">Accueil</a>
                    <a href="/products">Produits</a>
                    {{-- ================ --}}
                    <?php
                        if (!(Auth::check())) {
                        }
                        elseif ((Auth::check()) && (Auth::user()->admin == 1)) {
                            ?>
                    <a href="#">Administration</a>
                    <?php
                        }
                        else {
                            ?>
                            <a href="#">Mes commandes</a>
                        <?php
                        }
                    ?>
                    {{-- ================ --}}
                    <a href="/sponsors">Sponsors</a>
                </div>
                

                <div class="nav-footer">
                    <div class="left-part">
                        <a href="#">Mentions légales</a>
                        <a href="/condition">Conditions d'utilisations</a>
                        <a href="/vente">Conditions de ventes</a>
                        <a href="#">Crédits</a>
                    </div>
                    <div class="right-part">
                        <a href="#">Cesi</a>
                        <a href="#">A propos</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="navbar">
            <!-- Use any element to open the sidenav -->
            <span class="menu" onclick="openNav()"><i class="fas fa-bars"></i></span>
            <?php
                if (!(Auth::check())) {
            ?>
            <div class="nothing">
                {{-- <a href=""><i class="fas fa-shopping-cart"></i></a> --}}
            </div>
            <div class="nav-auth">
                <a href="/login">Se Connecter</a>
                <span>|</span>
                <a href="/register">S'inscrire</a>
            </div>
            <?php
            }
            else{
                ?>
            <div class="cart">
                <a href=""><i class="fas fa-shopping-cart"></i></a>
            </div>
            <div class="connected">
                <a class="logout" href="/logout">Déconnecter</a>
                <p>Bonjour <span class="name_connected"><?php echo(Auth::user()->firstname);?></span></p>
            </div>
                <?php
            }
        ?>
        </div>
        
        
    </header>
    <main>
        <h1>@yield('page-title')</h1>
        @yield('content')
    </main>

    <script lang="javascript">
        /* Set the width of the side navigation to 250px */
        function openNav() {
            document.getElementById("mySidenav").style.width = "325px";
            document.body.style.backgroundImage = "url('../image/background_darker.jpg')";
        }

        /* Set the width of the side navigation to 0 */
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.body.style.backgroundImage = "url('../image/background.jpg')";
        }

    </script>
</body>
</html>