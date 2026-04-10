<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shinigami Vault</title>

    <!-- stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="assets/logo.png" />
</head>

<body>

    <!-- Header -->
    <?php include "header.php"; ?>

    <!-- carousel -->
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active d-flex justify-content-around align-items-center"
                data-bs-interval="12000">
                <div class="d-flex justify-content-around align-items-center">
                    <div class="col-7" style="padding: 0 20px;">
                        <h1>New Ryomen Sukuna oversized tees out now !!</h1>
                        <h4>Grab your Tee before it's late</h4>
                        <div class="mt-lg-5 d-flex justify-content-center">
                            <div class="col-4">
                                <button class="red-btn">View Collection</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="carousel-item-image">
                            <img src="assets/carousel-1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="12000">
                <div class="d-flex justify-content-around align-items-center">
                    <div class="col-4">
                    <div class="carousel-item-image">
                        <img src="assets/carousel-2.png" alt="">
                    </div>
                </div>
                <div class="col-7" style="padding: 0 20px;">
                    <h1>JUJUTSU KAISEN <br>
                        x <br>
                        streetware oversized tees</h1>
                    <h4>Fashion Beyond the Ordinary</h4>
                    <div class="mt-lg-5 d-flex justify-content-center">
                        <div class="col-4">
                            <button class="red-btn">View Collection</button>
                        </div>
                    </div>
                </div>
                </div>
                
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- footer -->
    <?php include "footer.php"; ?>

    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>

<style>
    .carousel {
        width: 100%;
        height: fit-content;
    }

    .carousel-item {
        height: 85vh;
        width: 100%;
        overflow-y: hidden;
        background-color: var(--hero-bg);
    }

    .carousel-item h1 {
        font-family: 'header';
        font-size: 3.4rem;
        text-align: center;
        color: var(--black);
    }

    .carousel-item h4 {
        margin-top: 1.7rem;
        text-align: center;

    }

    .carousel-item-image {
        width: 100%;
        max-height: 35rem;
    }

    .carousel-item-image img {
        width: 100%;
        height: auto;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        height: 30px;
        width: 30px;
        padding: 10px;
        border-radius: 50%;
    }

    .carousel-control-prev-icon:hover,
    .carousel-control-next-icon:hover {
        background-color: var(--red);
    }
</style>