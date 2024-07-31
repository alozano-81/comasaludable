<!DOCTYPE html>

<?php

include 'ventas/functions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 5;

// Prepare the SQL statement and get records from our contacts table, LIMIT will determine the page
//$stmt = $pdo->prepare('SELECT * FROM productos ORDER BY id LIMIT :current_page, :record_per_page');
$stmt = $pdo->prepare('select * from (SELECT m.id,m.nombre,sum(m.50g) as c1,sum(m.125g) c2,sum(m.250g) as c3,sum(m.500g) as c4,sum(m.1000g) as c5,m.tipo as t,0 as margen FROM materiales m group by m.tipo UNION SELECT p.id,p.nombre, p.50g,p.125g,p.250g,p.500g,p.1000g, p.img ,p.margen as margen FROM productos p) as todo LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page - 1) * $records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of contacts, this is so we can determine whether there should be a next and previous button
$num_contacts = $pdo->query('SELECT COUNT(*) FROM productos')->fetchColumn();
$productos2 = $pdo->query('select * from (SELECT m.id,m.nombre,sum(m.50g) as c1,sum(m.125g) c2,sum(m.250g) as c3,sum(m.500g) as c4,sum(m.1000g) as c5,m.tipo as t,0 as margen FROM materiales m group by m.tipo UNION SELECT p.id,p.nombre, p.50g,p.125g,p.250g,p.500g,p.1000g, p.img ,p.margen as margen FROM productos p) as todo')->fetchAll(PDO::FETCH_ASSOC);
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Coma Saludable</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">Coma Saludable</a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#portfolio">Productos</a></li>
                    <!--li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="ventas/index.php">Ventas</a></li-->
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">Sobre Nosotros</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#whatsapp">Contáctanos</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
            <img class="masthead-avatar mb-5" src="assets/img/crema.png" alt="..." />
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0">Coma Saludable</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->
            <p class="masthead-subheading font-weight-light mb-0">Coma - Saludable</p>
        </div>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/img/productos/varios_carrousel.jpg" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                    <img src="assets/img/productos/canela_carrousel.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="assets/img/productos/arandano_deshidratado_carrousel.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </header>
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"><img class="masthead-avatar mb-5" src="assets/img/productos/varios.jpg" alt="..." /></h2>
            <!-- Icon Divider-->
         
            <!-- Portfolio Grid Items-->

            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            Empaque café
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                        <div class="accordion-body">

                            <div class="row justify-content-center">
                                <!-- Portfolio Item 1-->
                                <div class="content read table-responsive scrollme">
                                    <table class="mt-4" id="tabla">
                                        <thead>
                                            <tr>
                                                <td>#</td>
                                                <td>Nombre</td>
                                                <td>50g</td>
                                                <td>125G</td>
                                                <td>250G</td>
                                                <td>500G</td>
                                                <td>1000G</td>
                                                <td>IMG</td>

                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!--?php print_r(array_values($productos));?-->

                                            <!--?php var_dump($productos2)?-->

                                            <?php foreach ($productos as $prods => $pp) : ?>

                                                <!--?php echo ($productos2[1]['c1'])?-->
                                                <?php if ($pp['nombre'] != 'Bolsa') : ?>

                                                    <tr>
                                                        <td><?= $pp['id'] ?></td>
                                                        <td><?= $pp['nombre'] ?></td>
                                                        <td>$<?= number_format(round((($pp['c1'] + $productos2[0]['c1']) * ($pp['margen'] / 100) + ($pp['c1'] + $productos2[0]['c1']))), 2) ?></td>
                                                        <td>$<?= number_format(round((($pp['c2'] + $productos2[0]['c2']) * ($pp['margen'] / 100) + ($pp['c2'] + $productos2[0]['c2']))), 2) ?></td>
                                                        <td>$<?= number_format(round((($pp['c3'] + $productos2[0]['c3']) * ($pp['margen'] / 100) + ($pp['c3'] + $productos2[0]['c3']))), 2) ?></td>
                                                        <td>$<?= number_format(round((($pp['c4'] + $productos2[0]['c4']) * ($pp['margen'] / 100) + ($pp['c4'] + $productos2[0]['c4']))), 2) ?></td>
                                                        <td>$<?= number_format(round((($pp['c5'] + $productos2[0]['c5']) * ($pp['margen'] / 100) + ($pp['c5'] + $productos2[0]['c5']))), 2) ?></td>
                                                        <td><img class="masthead-avatar mb-5" src="<?= $pp['t'] ?>" alt="..." width="70" height="70" /></td>

                                                        <td class="actions">
                                                            <a class="btn btn-success btn-social mx-1" title="Para realizar su compra dar clik y contactar por whatsApp" href="https://wa.me/573118237370" target="_blank"><i class="fab fa-fw fa-whatsapp"></i></a>
                                                            <!--a href="#" class="edit" title="Para realizar su compra dar clik y contactar por whatsApp" data-bs-toggle="modal" data-bs-target="#nuevoModal"><i class="fa-solid fa-cart-shopping"></i></a-->
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>


                                    <div class="pagination">
                                        <?php if ($page > 1) : ?>
                                            <a href="index.php?page=<?= $page - 1 ?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
                                        <?php endif; ?>
                                        <?php if ($page * $records_per_page < $num_contacts) : ?>
                                            <a href="index.php?page=<?= $page + 1 ?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
                                        <?php endif; ?>
                                    </div>
                                    <a href=index.php>Inicio</a>
                                </div>
                                <?= template_footer() ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            Empaque transparente
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            
            <div class="row justify-content-center">
                <!-- Portfolio Item 1-->
                <div class="content read">
                    <table class="mt-4" id="tabla">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Nombre</td>
                                <td>50g</td>
                                <td>125G</td>
                                <td>250G</td>
                                <td>500G</td>
                                <td>1000G</td>
                                <td>IMG</td>

                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <!--?php print_r(array_values($productos));?-->

                            <!--?php var_dump($productos2)?-->
                            
                            <?php foreach ($productos as $prods => $pp) : ?>

                                <!--?php echo ($productos2[1]['c1'])?-->
                                <?php if ($pp['nombre'] != 'Bolsa') : ?>
                                                                        
                                    <tr>
                                        <td><?= $pp['id'] ?></td>
                                        <td><?= $pp['nombre'] ?></td>
                                        <td>$<?= number_format( round((($pp['c1'] + $productos2[1]['c1']) * ($pp['margen'] / 100) + ($pp['c1'] + $productos2[1]['c1']))),2 ) ?></td>
                                        <td>$<?= number_format(round((($pp['c2'] + $productos2[1]['c2']) * ($pp['margen'] / 100) + ($pp['c2'] + $productos2[1]['c2']))),2 ) ?></td>
                                        <td>$<?= number_format(round((($pp['c3'] + $productos2[1]['c3']) * ($pp['margen'] / 100) + ($pp['c3'] + $productos2[1]['c3']))),2 ) ?></td>
                                        <td>$<?= number_format(round((($pp['c4'] + $productos2[1]['c4']) * ($pp['margen'] / 100) + ($pp['c4'] + $productos2[1]['c4']))),2 ) ?></td>
                                        <td>$<?= number_format(round((($pp['c5'] + $productos2[1]['c5']) * ($pp['margen'] / 100) + ($pp['c5'] + $productos2[1]['c5']))),2 ) ?></td>
                                        <td><img class="masthead-avatar mb-5" src="<?= $pp['t'] ?>" alt="..." /></td>

                                        <td class="actions">
                                        <a class="btn btn-success btn-social mx-1" title="Para realizar su compra dar clik y contactar por whatsApp" href="https://wa.me/573118237370" target="_blank"><i class="fab fa-fw fa-whatsapp"></i></a>
                                            <!--a href="#" class="edit" title="Para realizar su compra dar clik y contactar por whatsApp" data-bs-toggle="modal" data-bs-target="#nuevoModal"><i class="fa-solid fa-cart-shopping"></i></a-->
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


                    <div class="pagination">
                        <?php if ($page > 1) : ?>
                            <a href="index.php?page=<?= $page - 1 ?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
                        <?php endif; ?>
                        <?php if ($page * $records_per_page < $num_contacts) : ?>
                            <a href="index.php?page=<?= $page + 1 ?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
                        <?php endif; ?>
                    </div>
                    <a href=index.php>Inicio</a>
                </div>
                <?= template_footer() ?>

            </div>
                        </div>
                    </div>
                </div>

            </div>


    </section>
    <!-- About Section-->
    <section class="page-section bg-primary text-white mb-0" id="about">
        <div class="container">
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-white">Quienes Somos</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- About Section Content-->
            <div class="row">
                <div class="col-lg-4 ms-auto">
                    <p class="lead">En Coma Saludable nos dedicamos a comercializar cereales, leguminosas y frutos secos de la más alta calidad, porque sabemos que la verdadera riqueza de la tierra está en sus frutos.</p>
                </div>
                <div class="col-lg-4 me-auto">
                    <p class="lead">Somos un equipo apasionado por la alimentación saludable y sostenible, y creemos que cada semilla tiene el poder de nutrir a tu cuerpo y transformar tu vida.</p>
                </div>
            </div>
            <!-- About Section Button-->

        </div>


        <div>
            <a href="#" class="btn btn-primary" title="Para realizar su compra dar clik y contactar por whatsApp" data-bs-toggle="modal" data-bs-target="#nuevoModal"><i class="fa-solid fa-cart-shopping"></i>Modal</a>
        </div>














    </section>
    <!-- Contact Section-->

    <!-- Footer-->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Ubicación</h4>
                    <p class="lead mb-0">
                        Candelaria II Cajicá
                        <br />
                        Calle 4 · 2 - 100
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0" id="whatsapp">
                    <h4 class="text-uppercase mb-4">Pedidos por</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="https://wa.me/573118237370" target="_blank"><i class="fab fa-fw fa-whatsapp"></i></a>

                </div>
                <!-- Footer About Text-->
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">Catálogo</h4>
                    <p class="lead mb-0">
                        En construcción
                        <a href="#portfolio">Productos</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright &copy; https://comasaludable.000webhostapp.com/comasaludable 2024</small></div>
    </div>
    <!-- Portfolio Modals-->


    <!-- Portfolio Modal 1-->

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/modal.js"></script>
    <script src="js/scripts.js"></script>

    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

</body>


</html>




<!-- Modal -->
<div class="modal fade" id="nuevoModal" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="nuevoModalLabel">Calcular</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center pb-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <!-- Portfolio Modal - Title-->
                            <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Calcular</h2>

                            <div class="col-xs-4">


                                <ul class="list-unstyled">
                                    <select class="form-control" name="cliente" id="consulCliente">
                                        <option value="" selected disabled>Seleccione el Cliente...</option>
                                        <?php foreach ($productos as $fila) : ?>
                                            <option value="<?php echo $fila['id'] ?>"> <?php echo $fila['nombre']; ?> </option>
                                        <?php endforeach; ?>
                                    </select>
                                </ul>

                                <div class="">
                                    <form class="form-control w-50">
                                        <div class="form-control border-white">

                                            <div class="form-control border-white">
                                                <label for="">Id :</label>
                                                <input type="text" class="form-control w-25">
                                            </div>
                                            <div class="form-control border-white">
                                                <label for="">Nombre :</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="form-control border-white">
                                                <label for="">Price :</label>
                                                <input type="number" class="form-control w-25">
                                            </div>
                                            <div class="form-control border-white">
                                                <label for="">Quantity :</label>
                                                <input type="number" class="form-control w-25">
                                            </div>
                                            <div class="form-control border-white">
                                                <button class="btn btn-primary">Save!</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <ul class="list-unstyled">
                                    <div class="list-unstyled" id="consulta"></div>
                                </ul>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>