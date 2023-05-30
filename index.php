<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazon</title>
    <link rel="icon" href="./Image/Logo.jpg">
    <link rel="stylesheet" href="./CSS/Style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2e64c661d0.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <!-- NAVBAR -->

    <header class="header">
        <a name="nav-top"></a>
        <nav class="header-nav">
        <div class="header-container">

            <a href="./index.php" class="amazon-logo">
                <img src="https://mlsvc01-prod.s3.amazonaws.com/fd4e81f3101/a77159a6-cbf4-46a1-a731-522b77da3e42.png?ver=1649349594000" class="amazon-logo" style="cursor:pointer">
            </a>

            <div class="header-search">
                <input class="search-input" type="text"/>
                <button class="search-button">
                    <svg xmlns="" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>

            <div class="header-cart">
                <div>
                    <a href="./Cart.html">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"> <path style="cursor:pointer" d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/>
                        </svg>
                    </a>
                </div>
                <p>Cart</p>
            </div>
        </nav>
    </header>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">

            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
          
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
            aria-label="Slide 4"></button>
            
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
            aria-label="Slide 5"></button>
            
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5"
            aria-label="Slide 6"></button>

        </div>

        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="./Image/Slideshow/1.jpg" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block"></div>
            </div>

            <div class="carousel-item active">
                <img src="./Image/Slideshow/2.jpg" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block"></div>
            </div>

            <div class="carousel-item">
                <img src="./Image/Slideshow/3.jpg" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block"></div>
            </div>

            <div class="carousel-item">
                <img src="./Image/Slideshow/4.jpg" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block"></div>
            </div>

            <div class="carousel-item">
                <img src="./Image/Slideshow/5.jpg" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block"></div>
            </div>

            <div class="carousel-item">
                <img src="./Image/Slideshow/6.jpg" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block"></div>
            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>

    <!-- SECTION 1 -->
    <section class="section-1">
        <div class="section-1-container">

            <div class="section-1-column">
                <h3>Top picks for your home</h3>
                <img style="cursor:pointer" src="./Image/Section1/1.jpg" alt=""/>
                <a href="">See more </a>
            </div>

            <div class="section-1-column">
                <h3>Top rated, premium quality</h3>
                <img style="cursor:pointer" src="./Image/Section1/3.jpg" alt="" />
                <a href="">See more </a>
            </div>

            <div class="section-1-column">
                <h3>Shop & Pay | Earn rewards daily</h3>
                <img style="cursor:pointer" src="./Image/Section1/2.jpg" alt="" />
                <a href="">See more </a>
            </div>

            <div class="section-1-column"><br>
                <h3>Sign in for your best experience</h3><br>
                <button><a href="./Customer/Customer_Login.php">Sign In</a></button>
            </div>

        </div>
    </section>

    

    <script> document.getElementById("year").innerHTML = new Date().getFullYear(); </script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>    

</body>
</html>