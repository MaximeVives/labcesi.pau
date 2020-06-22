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
                <p class="center_logo"><img class="logo" src="image/logo_LabCESI.png" alt="logo LabCESI"></p>
                <div class="navigate">
                    <a href="/">Accueil</a>
                    <a href="/products">Produits</a>
                    {{-- ================ --}}
                    <?php
                        if (!(Auth::check())) {
                        }
                        elseif ((Auth::check()) && (Auth::user()->admin == 1)) {
                            ?>
                    <a href="/admi">Administration</a>
                    <?php
                        }
                        else {
                            ?>
                            <a href="/mes-commandes">Mes commandes</a>
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
                        <?php 
                            if (Auth::check()) {
                                ?>
                                <a href="/myaccount">Paramètres du compte</a>
                                <?php
                            }
                        ?>                       
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
                <p>Bonjour <span class="name_connected"><?php echo(Auth::user()->firstname);?></span></p>
                <a class="logout" href="/logout">Déconnecter</a>
            </div>
                <?php
            }
        ?>
        </div>
        
        
    </header>
    <main>
        <div class="title"><a href="/"><img class="logo" src="image/logo_LabCESI.png" alt="logo LabCESI"></a></div>
        @yield('content')
    </main>

    <script lang="javascript">
        /* Set the width of the side navigation to 250px */
        function openNav() {
            document.getElementById("mySidenav").style.width = "325px";
        }

        /* Set the width of the side navigation to 0 */
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }

    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script> --}}
</body>
</html>