<?php
session_start();
if(!isset($_SESSION['user'])) {
  header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>AYBSTORE</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
                <a class="navbar-brand" href="#page-top"><h1>AYBSTORE</h1></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <a href="keranjang.php" class="nav-link"><img src="data:image/zzpng;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQZJREFUSEvNlcsRwjAMRHc7gU5IJ+QKRQBFwJVQCXQCnSzxTJwRSfwJYAZfHetppZVCFD4sHB+/A0hSp+YB4EJy/w11vQID8HErkrdPIaMSSVoDOAO4kaxKABYA7l3gj1VMNlmSU+CUvHseJJfucQhgVbwDiQNcREnXtg8rADXJJodilB+8C4NzYJrdZ5OCGCcuSTq7hwdN0qxmm4QakrVPJjrJ7ey5YdsBeHk0pSRU0hTAq0iWyZeHbfFtAsldZDLrGzdUEFOaA3BOco7KOaPBTAI6y/pexCCTqyULkJN66JssgKQjgA2AE8mtDRa7i87BIIj/V2DoErvmh3dzAGUVFO/BXwOe8siAGao/xXMAAAAASUVORK5CYII="/></a>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Product</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                        <a href="profil.php" class="nav-link"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAAXNSR0IArs4c6QAAAntJREFUWEftV21SQjEMTG8iJ1FOopxEPYlwEvAkcpP4lkmYvDTpB/xhHDvDoI++drO7SdNCDzbKg+GhvwGImV+I6ImIXuUbf2Oc5fO9PN+XUvD/1JhiiJnfiOhdQIxsdCKiAxGdRsENARJGAATM3DIAbDcCqgtIwBwDFHsigjTX6JkZ0qmUKqt9FaDwXjqagJj5a/EEZJpaVCcz84fxmT7+LKXgeThSQOIXANIBJrazeglrYFiNjyVSUCGgQKYQjDDwLN66ZljEQMD2JvJUBujHRFSBkajBXmZygNv6DZnZrhvOqQBJ1MgojHMpZeNlYmZI0Mu46t1AvsrkESAbRaV14K3LHNlM65TGUG3YC3gFSBYFoFF2og0BSpMh854NeuUlDwjpqHKFmeB8UBlzMChbTlb7eEDWG2ER6wECtbzoopqVRc/AgymLHlBKpSl2FnTPYzhgdwEg1KTQGh5QMzKJ3kaH1D3MmNoEFu51C0OIrlWDupW95bNpQMJSD1RY9Aw7w5J1Te0WhXxDR4f1kTuaVqWhlfahIRODrh73+h5XHJtpj+PA9j7hATjQOTY7RVsWlqTIC6P4Iz06klai1ZFUXpo6OgSQrdZ4dInAZYYF4Rt52/fovGyNqo4NtR/oh0VKu1najgaSXphy5SLsJDJA2Nh2eVjQgkGvA5+kI5B3aI1WC+ul082bPbFL72yNlN1ekx8tCPmG7lnOwGmPZIMYuQZlUeI6g0ug9k4wvl59UCz9bQXz7rsGmaqMjXB+RRnUspL+Bv8ATNN3mNxlyHli9ioNIPBc83I4JVkUvkgD1iCNsoZvAFAW0JZ0GfHrTzE0os29c/4B9Rj8BXPBmTSkLmggAAAAAElFTkSuQmCC"/></a>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To Our Store!</div>
                <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
                <a class="btn btn-primary btn-xl text-uppercase" href="#portfolio">Buy Now!</a>
            </div>
        </header>
        </div>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light  " class="container mx-auto px-6 py-10" id="portfolio">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">OUR PRODUCT </h2>
                    <h3 class="section-subheading text-muted">Menyediakan Berbagai Macam Warna</h3>
                </div>
                <div class="container">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                        <?php

                        include 'koneksi.php';

                        $query = "SELECT * FROM produk  ";
                        $hasil = mysqli_query ($koneksi, $query);
                        while ($data = mysqli_fetch_array ($hasil)){
                         ?>

                                <div class= "">
                                    <img class="img-fluid" src="produk/<?php echo $data['foto']?>" alt=""/>
                                    </div>
                                    <div class="portfolio-caption">
                                        <h1 class="text-slate-500 font-semibold"><?php echo $data['nama'] ?></h1>
                                        <p class="text-slate-500 font-semibold "><?php echo $data['harga'] ?></p>
                                        <div class="btn-group">
                                        <a href="detail.php?id=<?php echo $data['id']?>" type="button" class="btn btn-sm btn-outline-secondary ">view</a>
                                            </div>
                                        </div>
                                        <?php
                                     } ?>
                                    
                                </div>
        </section>
            </div>
        </section>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Hubungi Kami Jika ada kendala</h3>
                </div>
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- Name input-->
                                <input class="form-control" id="name" type="text" placeholder="Your Name *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <div class="form-group">
                                <!-- Email address input-->
                                <input class="form-control" id="email" type="email" placeholder="Your Email *" data-sb-validations="required,email" />
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <div class="form-group mb-md-0">
                                <!-- Phone number input-->
                                <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <!-- Message input-->
                                <textarea class="form-control" id="message" placeholder="Your Message *" data-sb-validations="required"></textarea>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                        </div>
                    </div>
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center text-white mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">Send Message</button></div>
                </form>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2024</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="https://x.com/arfnyzeed_?t=HSfbP9wPfyXEd2VBWWZxSg&s=08" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/arfnyzeed_?igsh=b3FhN21mdnhrcGV0"><img class="btn btn-dark btn-social mx-2"src="./produk/6.png" alt=""></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
