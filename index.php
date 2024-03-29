<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>postWatch-Home</title>

    <style>
    #clock {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        border: 10px solid white;
        position: relative;
        margin: auto;
    }

    #hour-hand {
        width: 6px;
        height: 50px;
        background-color: white;
        position: absolute;
        top: 50%;
        left: 50%;
        transform-origin: bottom;
        transform: translate(-50%, -100%) rotate(0deg);
        transition: transform 0.5s ease-in-out;
    }

    #minute-hand {
        width: 4px;
        height: 80px;
        background-color: white;
        position: absolute;
        top: 50%;
        left: 50%;
        transform-origin: bottom;
        transform: translate(-50%, -100%) rotate(0deg);
        transition: transform 0.5s ease-in-out;
    }

    #clock-face {
        width: 12px;
        height: 12px;
        background-color: white;
        position: absolute;
        top: 50%;
        left: 50%;
        border-radius: 50%;
        transform: translate(-50%, -50%);
    }

    #clock-time {
        font-size: 36px;
        font-weight: bold;
        text-align: center;
        margin-top: 20px;
    }

    .animated-text {
        opacity: 0;
        animation-name: fadeIn;
        animation-duration: 2s;
        animation-fill-mode: forwards;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }
    </style>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ff48066121.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="./css/styles.css" />

    <nav class="navbar navbar-expand-lg navbar-light bg-white static-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./img/logo.png" alt="..." height="80" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminSignIn.php">Admin</a>
                    </li>
                    <li>
                        <a href="signin.php">
                            <button type="button" class="btn btn-outline-secondary btn-sm px-4">
                                Sign In
                            </button></a>
                    </li>
                    <li class="nav-item dropdown"></li>
                </ul>
            </div>
        </div>
    </nav>
</head>
<main>

    <body onload="startTime()">
        <div class="px-4 py-5 my-2 text-center container">


            <div class="p-4 p-md-5 mb-4 rounded text-bg-dark">
                <div class="col-md-6 mx-auto text-center">
                    <div id="clock">
                        <div id="hour-hand"></div>
                        <div id="minute-hand"></div>
                        <div id="clock-face"></div>
                    </div>
                    <h2 class="lead my-3 animated-text">It's time to join a community of watch enthusiasts</h2>


                </div>
            </div>
            <section class="featured-collections">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner my-5">
                        <div class="carousel-item active">
                            <img src="./img/watchH1.jpg" class="d-block w-100 rounded" alt="...">
                            <div class="carousel-caption d-none d-md-block blocki">
                                <h5>"What's your favorite watch brand and why?"</h5>
                                <p> In this thread, members can discuss their favorite watch brands and models, and
                                    explain what makes them stand out. From luxury brands like Rolex and Omega, to
                                    independent watchmakers and microbrands, there are plenty of options to choose from.
                                    Share your thoughts and discover new watches to add to your collection.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="./img/watchH2.jpg" class="d-block w-100 rounded" alt="...">
                            <div class="carousel-caption d-none d-md-block blocki">
                                <h5>"Vintage watch finds"</h5>
                                <p> Hunting for vintage watches can be a thrilling experience for many watch
                                    enthusiasts. In this discussion, members can share their latest finds and discuss
                                    the unique characteristics of vintage watches. From rare models to obscure brands,
                                    there's always something new to discover in the world of vintage watches.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="./img/watchH3.jpg" class="d-block w-100 rounded" alt="...">
                            <div class="carousel-caption d-none d-md-block blocki">
                                <h5>"Watch photography tips"</h5>
                                <p>Taking great photos of watches can be a challenge, but it's an important skill for
                                    anyone who wants to show off their collection. In this thread, members can share
                                    their tips and tricks for capturing the beauty of their watches on camera. From
                                    lighting and composition to editing techniques, there's a lot to explore when it
                                    comes to watch photography. Join the discussion and learn how to make your watches
                                    look their best.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </section>

            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">
                    PostWatch is a place where watch enthusiasts can come together to
                    share their passion, connect with like-minded individuals, and
                    discover new timepieces.
                </p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center" style="margin-bottom: 50px;">
                    <a href="posts.php" class="btn btn-primary btn-lg px-4 gap-3">
                        See Posts
                    </a>
                </div>
            </div>
        </div>

        <hr class="my-4" />

        <div class="container px-4 py-5 text-center">
            <h2 class="pb-2 border-bottom">Features</h2>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
                <div class="col d-flex align-items-start">
                    <div>
                        <i class="fa-sharp fa-solid fa-folder fa-2x"></i>
                        <h3 class="fw-bold mb-0 fs-4">
                            Personalized Watch Collections:
                        </h3>
                        <p>
                            With PostWatch, users can create their own personalized watch
                            collections to showcase their favorite timepieces. They can
                            upload photos and descriptions, and share their collections.
                        </p>
                    </div>
                </div>
                <div class="col d-flex align-items-start">
                    <div>
                        <i class="fa-sharp fa-solid fa-circle-nodes fa-2x"></i>
                        <h3 class="fw-bold mb-0 fs-4">Social Networking:</h3>
                        <p>
                            PostWatch is a community-driven site where users can connect
                            with other watch enthusiasts from around the world. Users can
                            view and like other user collections, and leave comments or
                            feedback.
                        </p>
                    </div>
                </div>
                <div class="col d-flex align-items-start">
                    <div>
                        <i class="fa-sharp fa-solid fa-user fa-2x"></i>
                        <h3 class="fw-bold mb-0 fs-4">User Profiles:</h3>
                        <p>
                            Each user has their own profile page where they can display
                            their watch collections, and view their feed, and access their
                            account settings.
                        </p>
                    </div>
                </div>
                <div class="col d-flex align-items-start">
                    <div>
                        <i class="fa-sharp fa-solid fa-mobile fa-2x"></i>
                        <h3 class="fw-bold mb-0 fs-4">Mobile-Friendly:</h3>
                        <p>
                            PostWatch is optimized for mobile devices, making it easy to
                            access and use on the go.
                        </p>
                    </div>
                </div>
            </div>
            <hr class="my-5" />
        </div>
        <div class="container px-4 py-5">
            <h2 class="pb-2 border-bottom text-center">Community Guidelines</h2>
            <br>

            <div class="container">
                <p>
                    At PostWatch, we value mutual respect and aim to create a positive and welcoming environment for
                    all watch enthusiasts. To ensure a safe and enjoyable experience for everyone, we ask that all
                    users follow our community guidelines:
                </p>
                <ol>
                    <li class="float-start">
                        <strong>Respect:</strong> Discrimination, harassment, or hate speech will not be tolerated.
                    </li>
                    <br>
                    <li class="float-start">
                        <strong>Authenticity:</strong> All content should be genuine and original.
                    </li>
                    <br>
                    <li class="float-start">
                        <strong>Appropriate Content:</strong> Avoid explicit or offensive language, images, or
                        videos.
                    </li>
                    <br>
                    <li class="float-start">
                        <strong>Copyright:</strong> Do not post copyrighted material without permission or give
                        credit where credit is due.
                    </li>
                    <br>
                    <li class="float-start">
                        <strong>Commercial Use:</strong> Do not use PostWatch to advertise products or services or
                        solicit others for financial gain.
                    </li>
                    <br>
                    <li class="float-start">
                        <strong>Moderation:</strong> The PostWatch team reserves the right to moderate content and
                        remove any material that violates these guidelines or is deemed inappropriate.
                    </li>
                </ol>
                <br>
                <p>
                    By following these guidelines, we can create a positive and welcoming community where watch
                    enthusiasts can connect, share their passion, and discover new timepieces.
                </p>
            </div>
            <hr class="my-5">
        </div>
        <script>
        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            h = checkTime(h);
            m = checkTime(m);
            s = checkTime(s);
            var hourHand = document.getElementById('hour-hand');
            var minuteHand = document.getElementById('minute-hand');

            var hourDegrees = h * 30 + m * 0.5;
            var minuteDegrees = m * 6;

            hourHand.style.transform = 'translate(-50%, -100%) rotate(' + hourDegrees + 'deg)';
            minuteHand.style.transform = 'translate(-50%, -100%) rotate(' + minuteDegrees + 'deg)';

            document.getElementById('clock-time').innerHTML =
                h + ":" + m + ":" + s;
            var t = setTimeout(startTime, 1000);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            };
            return i;
        }
        </script>
    </body>
</main>
<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted">&copy; 2023 PostWatch</p>

        <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item">
                <a href="#" class="nav-link px-2 text-muted">Home</a>
            </li>
            <li class="nav-item">
                <a href="FAQ.php" class="nav-link px-2 text-muted">FAQs</a>
            </li>
            <li class="nav-item">
                <a href="About.php" class="nav-link px-2 text-muted">About</a>
            </li>
        </ul>
    </footer>
    <hr class="my-2" />
</div>

</html>