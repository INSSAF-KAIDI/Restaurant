<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Les Délices Gourmands </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('img/favicon.png')}}" rel="icon">
  <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendorr CSS Files -->
  <link href="{{asset('vendorr/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendorr/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('vendorr/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendorr/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('vendorr/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendorr/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendorr/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Restaurantly
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>+212 642 984 053</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span>Lundi-Dimanche: 11AM - 23PM</span></i>
      </div>

      <div class="languages d-none d-md-flex align-items-center">
        <ul>
          <li>Fr</li>
          <li><a href="#">En</a></li>
        </ul>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.html">Les Délices Gourmands</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="{{asset('img/logo.png')}}" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
          <!-- <li><a class="nav-link scrollto" href="#specials">Specials</a></li> -->
          <li><a class="nav-link scrollto" href="#events">Events</a></li>
          <li><a class="nav-link scrollto" href="#chefs">Chefs</a></li>
          <li><a class="nav-link scrollto" href="login">Connexion</a></li>

    @yield('content')
</div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Welcome to <span>Les Délices Gourmands</span></h1>
          <h2>Delivering great food for more than 18 years!</h2>

          <div class="btns">
            <a href="#menu" class="btn-menu animated fadeInUp scrollto">Notre Menu</a>
            <a href="#book-a-table" class="btn-book animated fadeInUp scrollto">Reserver une Table</a>
          </div>
        </div>
        <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in" data-aos-delay="200">
          <a href="https://www.youtube.com/watch?v=u6BOC7CDUTQ" class="glightbox play-btn"></a>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="{{ asset('img/about.jpg')}}" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Un lieu où la passion culinaire rencontre l'art de la gastronomie.</h3>
            <p class="fst-italic">
            Situé au cœur de la ville, notre restaurant est l'endroit idéal pour les amateurs de bonne cuisine et les épicuriens en quête de saveurs exquises.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Chaque plat, une œuvre d'art.</li>
              <li><i class="bi bi-check-circle"></i> Restaurant au cœur de la ville.</li>
              <li><i class="bi bi-check-circle"></i> Service attentionné et professionnel.</li>
            </ul>
            <p>
            Nous sommes ravis de vous accueillir chez Les Délices Gourmands et de partager avec vous notre passion pour la
            cuisine. Venez nous rendre visite et laissez-nous vous faire découvrir un voyage gustatif exceptionnel.
            Réservez dès maintenant votre table et préparez-vous à vous délecter des délices que nous avons à vous offrir.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pourquoi nous</h2>
          <p>Pourquoi choisir notre Restaurant ?</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
              <span>01</span>
              <h4>Une expérience culinaire exceptionnelle</h4>
              <p>Notre restaurant s'engage à offrir une expérience exceptionnelle à tous nos
                 clients. Nous mettons un accent particulier sur la qualité des ingrédients et
                la préparation soignée de nos plats. Chaque assiette est conçue avec passion et
                créativité.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="200">
              <span>02</span>
              <h4>Ambiance chaleureuse et service attentionné</h4>
              <p> Nous nous efforçons de créer une atmosphère accueillante où vous vous sentirez
                 à l'aise et pris en charge. Que ce soit pour une occasion spéciale ou une simple
                 sortie entre amis, notre personnel attentif veillera à ce que votre expérience
                 soit agréable</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in" data-aos-delay="300">
              <span>03</span>
              <h4>Engagement envers la qualité et la durabilité</h4>
              <p>Nous nous engageons à privilégier la qualité et la durabilité. Nous sélectionnons
                soigneusement nos fournisseurs pour garantir des ingrédients frais et de première
                qualité.De plus,nous sommes soucieux de l'impact environnemental et nous adoptons
                des pratiques durables.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Menu</h2>
          <p>Savourez les plats de notre appétissant menu</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
              <li data-filter="*" class="filter-active">Tout</li>
              <li data-filter=".filter-pizzas">PIZZAS</li>
              <li data-filter=".filter-burgers">BURGERS</li>
              <li data-filter=".filter-pasta">PASTA</li>
              <li data-filter=".filter-paninis">PANINIS</li>
              <li data-filter=".filter-salades">SALADES</li>
              <li data-filter=".filter-desserts">DESSERTS</li>
              <li data-filter=".filter-boissons">BOISSONS</li>
              <li data-filter=".filter-glaces">GLACES</li>
            </ul>
          </div>
        </div>

        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-6 menu-item filter-pizzas">
            <img src="{{ asset('img/menu/pizza4.jpg') }}" class="menu-img" alt="">
            <div class="menu-content">
                <a href="#">Supreme Pizza</a><span>34 DH</span>
            </div>
            <div class="menu-ingredients">
                red & green pepper, red onion, black olives, mozzarella
            </div>
            <div class="menu-actions">
                <form action="{{ route('add_to_cart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="item_name" value="Supreme Pizza">
                    <input type="hidden" name="item_price" value="34">
                    <label for="quantity">Quantité:</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" class="quantity-input">
                    <button type="submit" class="add-to-cart-btn">Ajouter au panier</button>

                </form>
            </div>
        </div>

          <div class="col-lg-6 menu-item filter-pizzas">
            <img src="{{ asset('img/menu/pizza1.jpg')}}" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#"> Veggie Pizza</a><span>30 DH</span>
            </div>
            <div class="menu-ingredients">
              Lorem, deren, trataro, filede, nerada
            </div>
            <div class="menu-actions">
                <form action="{{ route('add_to_cart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="item_name" value="Supreme Pizza">
                    <input type="hidden" name="item_price" value="34">
                    <label for="quantity">Quantité:</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" class="quantity-input">
                    <button type="submit" class="add-to-cart-btn">Ajouter au panier</button>
                </form>
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-salades">
            <img src="{{ asset('img/menu/pizza4.jpg')}}" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Bread Barrel</a><span>6.95 DH</span>
            </div>
            <div class="menu-ingredients">
              Lorem, deren, trataro, filede, nerada
            </div>
            <div class="menu-actions">
                <form action="{{ route('add_to_cart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="item_name" value="Supreme Pizza">
                    <input type="hidden" name="item_price" value="34">
                    <label for="quantity">Quantité:</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" class="quantity-input">
                    <button type="submit" class="add-to-cart-btn">Ajouter au panier</button>
                </form>
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-starters">
            <img src="{{ asset('img/menu/cake.jpg')}}" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Crab Cake</a><span>27 DH</span>
            </div>
            <div class="menu-ingredients">
              A delicate crab cake served on a toasted roll with lettuce and tartar sauce
            </div>
            <div class="menu-actions">
                <form action="{{ route('add_to_cart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="item_name" value="Supreme Pizza">
                    <input type="hidden" name="item_price" value="34">
                    <label for="quantity">Quantité:</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" class="quantity-input">
                    <button type="submit" class="add-to-cart-btn">Ajouter au panier</button>
                </form>
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-salads">
            <img src="{{ asset('img/menu/pizza4.jpg')}}" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Caesar Selections</a><span>8.95 DH</span>
            </div>
            <div class="menu-ingredients">
              Lorem, deren, trataro, filede, nerada
            </div>
            <div class="menu-actions">
                <form action="{{ route('add_to_cart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="item_name" value="Supreme Pizza">
                    <input type="hidden" name="item_price" value="34">
                    <label for="quantity">Quantité:</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" class="quantity-input">
                    <button type="submit" class="add-to-cart-btn">Ajouter au panier</button>
                </form>
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <img src="{{ asset('img/menu/pizza4.jpg')}}" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Tuscan Grilled</a><span>9.95 DH</span>
            </div>
            <div class="menu-ingredients">
              Grilled chicken with provolone, artichoke hearts, and roasted red pesto
            </div>
            <div class="menu-actions">
                <form action="{{ route('add_to_cart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="item_name" value="Supreme Pizza">
                    <input type="hidden" name="item_price" value="34">
                    <label for="quantity">Quantité:</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" class="quantity-input">
                    <button type="submit" class="add-to-cart-btn">Ajouter au panier</button>
                </form>
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-starters">
            <img src="{{ asset('img/menu/pizza4.jpg')}}" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Mozzarella Stick</a><span>4.95 DH</span>
            </div>
            <div class="menu-ingredients">
              Lorem, deren, trataro, filede, nerada
            </div>
            <div class="menu-actions">
                <form action="{{ route('add_to_cart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="item_name" value="Supreme Pizza">
                    <input type="hidden" name="item_price" value="34">
                    <label for="quantity">Quantité:</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" class="quantity-input">
                    <button type="submit" class="add-to-cart-btn">Ajouter au panier</button>
                </form>
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-salads">
            <img src="{{ asset('img/menu/greek-salad.jpg')}}" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Greek Salad</a><span>9.95 DH</span>
            </div>
            <div class="menu-ingredients">
              Fresh spinach, crisp romaine, tomatoes, and Greek olives
            </div>
            <div class="menu-actions">
                <form action="{{ route('add_to_cart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="item_name" value="Supreme Pizza">
                    <input type="hidden" name="item_price" value="34">
                    <label for="quantity">Quantité:</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" class="quantity-input">
                    <button type="submit" class="add-to-cart-btn">Ajouter au panier</button>
                </form>
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-salads">
            <img src="{{ asset('img/menu/spinach-salad.jpg')}}" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Spinach Salad</a><span>9.95 DH</span>
            </div>
            <div class="menu-ingredients">
              Fresh spinach with mushrooms, hard boiled egg, and warm bacon vinaigrette
            </div>
            <div class="menu-actions">
                <form action="{{ route('add_to_cart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="item_name" value="Supreme Pizza">
                    <input type="hidden" name="item_price" value="34">
                    <label for="quantity">Quantité:</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" class="quantity-input">
                    <button type="submit" class="add-to-cart-btn">Ajouter au panier</button>
                </form>
            </div>
          </div>

          <div class="col-lg-6 menu-item filter-specialty">
            <img src="{{ asset('img/menu/lobster-roll.jpg')}}" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Lobster Roll</a><span>12.95 DH</span>
            </div>
            <div class="menu-ingredients">
              Plump lobster meat, mayo and crisp lettuce on a toasted bulky roll
            </div>
            <div class="menu-actions">
                <form action="{{ route('add_to_cart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="item_name" value="Supreme Pizza">
                    <input type="hidden" name="item_price" value="34">
                    <label for="quantity">Quantité:</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" class="quantity-input">
                    <button type="submit" class="add-to-cart-btn">Ajouter au panier</button>
                </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Menu Section -->

    <style>
        .menu-actions {
            margin-top: 10px;
        }

        .quantity-input {
            width: 60px;
            margin-right: 10px;
        }

        .add-to-cart-btn {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .add-to-cart-btn:hover {
            background-color: #218838;
        }
    </style>

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Events</h2>
          <p>Organize Your Events in our Restaurant</p>
        </div>

        <div class="events-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="{{ asset('img/event-birthday.jpg')}}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Birthday Parties</h3>
                  <div class="price">
                    <p><span>189 DH</span></p>
                  </div>
                  <p class="fst-italic">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua.
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                    <li><i class="bi bi-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                    <li><i class="bi bi-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                  </ul>
                  <p>
                    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                    velit esse cillum dolore eu fugiat nulla pariatur
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="{{ asset('img/event-private.jpg')}}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Private Parties</h3>
                  <div class="price">
                    <p><span>290 DH</span></p>
                  </div>
                  <p class="fst-italic">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua.
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                    <li><i class="bi bi-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                    <li><i class="bi bi-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                  </ul>
                  <p>
                    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                    velit esse cillum dolore eu fugiat nulla pariatur
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="row event-item">
                <div class="col-lg-6">
                  <img src="{{ asset('img/event-custom.jpg')}}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>Custom Parties</h3>
                  <div class="price">
                    <p><span>99 DH</span></p>
                  </div>
                  <p class="fst-italic">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua.
                  </p>
                  <ul>
                    <li><i class="bi bi-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                    <li><i class="bi bi-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                    <li><i class="bi bi-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                  </ul>
                  <p>
                    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                    velit esse cillum dolore eu fugiat nulla pariatur
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Events Section -->

    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Reservation</h2>
          <p>Reserver une Table</p>
        </div>

        <form  action="{{ route('reservation.create') }}"   method="get"  >
          <div class="row">

            <button type="submit" >Reserver une table</button>
          </div>
        </form>

      </div>
    </section><!-- End Book A Table Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p>What they are saying about us</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{ asset('img/testimonials/testimonials-1.jpg')}}" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{ asset('img/testimonials/testimonials-2.jpg')}}" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{ asset('img/testimonials/testimonials-3.jpg')}}" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{ asset('img/testimonials/testimonials-4.jpg')}}" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{ asset('img/testimonials/testimonials-5.jpg')}}" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Gallery</h2>
          <p>Some photos from Our Restaurant</p>
        </div>
      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{asset('img/gallery/gallery-1.jpg')}}" class="gallery-lightbox" data-gall="gallery-item">
                <img src="{{asset('img/gallery/gallery-1.jpg')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{asset('img/gallery/gallery-2.jpg')}}" class="gallery-lightbox" data-gall="gallery-item">
                <img src="{{asset('img/gallery/gallery-2.jpg')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{asset('img/gallery/gallery-3.jpg')}}" class="gallery-lightbox" data-gall="gallery-item">
                <img src="{{asset('img/gallery/gallery-3.jpg')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{asset('img/gallery/gallery-4.jpg')}}" class="gallery-lightbox" data-gall="gallery-item">
                <img src="{{asset('img/gallery/gallery-4.jpg')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{asset('img/gallery/gallery-5.jpg')}}" class="gallery-lightbox" data-gall="gallery-item">
                <img src="{{asset('img/gallery/gallery-5.jpg')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{asset('img/gallery/gallery-6.jpg')}}" class="gallery-lightbox" data-gall="gallery-item">
                <img src="{{asset('img/gallery/gallery-6.jpg')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{asset('img/gallery/gallery-7.jpg')}}" class="gallery-lightbox" data-gall="gallery-item">
                <img src="{{asset('img/gallery/gallery-7.jpg')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{asset('img/gallery/gallery-8.jpg')}}" class="gallery-lightbox" data-gall="gallery-item">
                <img src="{{asset('img/gallery/gallery-8.jpg')}}" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Chefs</h2>
          <p>Our Proffesional Chefs</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <img src="{{ asset('img/chefs/chefs-1.jpg')}}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Walter White</h4>
                  <span>Master Chef</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="200">
              <img src="{{ asset('img/chefs/chefs-2.jpg')}}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Sarah Jhonson</h4>
                  <span>Patissier</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="300">
              <img src="{{ asset('img/chefs/chefs-3.jpg')}}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>William Anderson</h4>
                  <span>Cook</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Chefs Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>
      </div>

      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p> 12345 ,Morabitine street Marrakech, Maroc</p>
              </div>

              <div class="open-hours">
                <i class="bi bi-clock"></i>
                <h4>Open Hours:</h4>
                <p>
                  Lundi-Dimanche:<br>
                  11:00 AM - 23:00 PM
                </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>gourmand@delice.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+212 642 984 053</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="8" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Restaurantly</h3>
              <p>
               12345 ,Morabitine
               street Marrakech,
               Maroc <br><br>
                <strong>Phone:</strong>+212 642 984 053<br>
                <strong>Email:</strong>gourmand@delice.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span> Les Délices Gourmands</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <a href="https://bootstrapmade.com/"></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendorr JS Files -->
  <script src="{{ asset('vendorr/aos/aos.js')}}"></script>
  <script src="{{ asset('vendorr/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('vendorr/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{ asset('vendorr/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{ asset('vendorr/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{ asset('vendorr/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('jss/main.js')}}"></script>

</body>

</html>

