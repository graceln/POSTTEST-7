<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>urfavmovies</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="./img/icon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body>
    
    <section id="home">
        <img src="img/movies.jpg" id="movies">
        <div class="box">
            <div class="heading">
                <h2>Unlimited movies you can watch!
                    <p id="h5">Watch anywhere. Watch anytime</p>
                    <p id="p">Ready to watch? search your favorite movies in here</p>
                </h2>
            </div>
            <div class="search">
                <input type="text" name="" placeholder="Search movie">
                <a href="">search</a>
            </div>
        </div>
    </section>

    <header>
        <div class="logo"><i class="fa fa-film"> urfavmovies</i></div>
        <nav>
            <ul>
                <li><a href="#home" class="active">Home</a></li>
                <li><a href="#movie">Movies</a></li>
                <li><a href="#aboutUs">About Us</a></li>
                <li><a href="signin.php">Sign In</a></li>
            </ul>
                <input type="checkbox" id="checkbox" class="checkbox">
        </nav>
    </header>

    <section id="movie">
        <h2 style="text-align: center;">Recommended movies just for you</h2>
      <div class="container">
        <div class="slider">
            <input type="radio" class="radio" name="images" id="radio-1" checked>
            <input type="radio" class="radio" name="images" id="radio-2">
            <input type="radio" class="radio" name="images" id="radio-3">
            <input type="radio" class="radio" name="images" id="radio-4">
            <div class="slide" id="slide-1">
                <img src="img/1.jpg" alt="">
            </div>
            <div class="slide" id="slide-2">
                <img src="img/2.jpg" alt="">
            </div>
            <div class="slide" id="slide-3">
                <img src="img/3.jpg" alt="">
            </div>
            <div class="slide" id="slide-4">
                <img src="img/4.jpg" alt="">
            </div>
            <div class="dots">
                <label for="radio-1" id="label-1"></label>
                <label for="radio-2" id="label-2"></label>
                <label for="radio-3" id="label-3"></label>
                <label for="radio-4" id="label-4"></label>
            </div>
        </div>
      </div>
    </section>

    <section id="aboutUs">
        <div class="card">
            <h2 id="aboutUs">About Us</h2>
            <p>Whatever your taste</p>
            <p>No matter where you live</p>
            <p id="text">We provide the best movies so you can enjoy them anytime</p>
        </div>               
    </section>

    <footer>
        <div class="upper">
            <h3><i class="fa fa-film"> urfavmovies</i></h3>
            <p>Let's go to our social media for better service</p>
            <ul class="socials">
                <li><i class="fa fa-facebook"></i></a></li>
                <li><i class="fa fa-twitter"></i></a></li>
                <li><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>
        <div class="bottom">
            <p>Copyright &copy; 2022 urfavmovies. All right reserved</p>
        </div>
    </footer>
</body>
</html>

<script src="./js/script.js"></script>
