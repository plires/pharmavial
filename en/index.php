<?php 
  
  require __DIR__ . '/../vendor/autoload.php';
  include_once __DIR__ . '/../includes/config.inc.php';
  include_once __DIR__ . '/../includes/funciones_validar.php';
  include_once __DIR__ . '/../clases/app.php';
  
  session_start();

  $errors = [];
  $name = '';
  $company = '';
  $phone = '';
  $email = '';
  $comments = '';
  $origin = 'Consulta desde Formulario Web-EN';
  $_SESSION['lang'] = 'en';

  echo "
  <script>
    var lang = 'en';
  </script>
  ";

?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Pharmavial - Instituto Biológico Contemporáneo SA (IBC) is a company of Argentine capital exclusively dedicated to the elaboration of injectable medicinal specialties for the national and international pharmaceutical industry Since its foundation, in the Autonomous City of Buenos Aires in 1989, IBC has developed a policy based on growth and continuous improvement.">
    <meta name="author" content="Pablo Lires">

    <!-- Favicons -->
    <?php include('../includes/favicon-en.inc.php'); ?>

    <!-- Normalize -->
    <link rel="stylesheet" href="/../node_modules/normalize.css/normalize.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="/../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- Animate -->
    <link rel="stylesheet" href="/../css/animate.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/../node_modules/bootstrap/dist/css/bootstrap.min.css">

    <!-- Custom -->
    <link rel="stylesheet" href="/../css/app.css">

    <title>Pharmavial - Contemporary Biological Institute</title>
  </head>

  <body>

    <div id="app">

      <div id="spinner">
        <div class="spinner-border text-primary" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>

      <!-- Mensajes -->
      <div id="message" class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successful Shipping! </strong> We will contact you shortly.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Mensajes end -->

      <!-- Mensajes Error -->
      <div id="message-error" class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong> Submit failed! </strong> Please try again later.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Mensajes end -->
      
      <!-- Header -->
      <header>

  	  		<div class="menu_bar">
            <img class="logo" src="/../img/header/header-logo-pharmavial.png" alt="logo pharmavial">
  			    <button class="transition" id="btn-menu-mobile" type="button"><i class="fas fa-bars"></i></button>
  	  		</div>

          <nav class="transition">
            <a class="logo_desktop" href="./">
  	  			  <img class="logo" src="/../img/header/header-logo-pharmavial.png" alt="logo pharmavial nav">
            </a>
            <ul>
              <li class="nav-item">
                <a class="link-item transition btn_to" href="#productos"><i class="fas fa-dolly-flatbed mr-1"></i></i>PRODUCTS</a>
              </li>
              <li class="nav-item">
                <a class="link-item transition btn_to" href="#institucional"><i class="fas fa-users"></i></i>ABOUT US</a>
              </li>
              <li class="nav-item">
                <a class="link-item transition btn_to" href="#planta"><i class="fas fa-industry"></i>PLANT</a>
              </li>
              <li class="nav-item">
                <a class="link-item transition btn_to" href="#contacto"><i class="fas fa-envelope"></i>CONTACT</a>
              </li>
              <li class="nav-item">
                <a href="http://www.laboratorioibc.com.ar/" target="_blank" rel="noopener noreferrer" class="pharmavial_mobile">
                  <img class="img-fluid transition" src="/../img/header/logo-ibc-mobile.png" alt="logo ibc">
                </a>
              </li>
            </ul>

            <div class="language">
              <div>
                <a class="transition" href="./../">Spanish</a>
                <a class="transition active" href="./">English</a>
              </div>
              <a href="http://www.laboratorioibc.com.ar/" target="_blank" rel="noopener noreferrer" class="pharmavial_desktop">
                <img class="img-fluid transition" src="/../img/header/logo-ibc.png" alt="logo pharmavial">
              </a>
            </div>
          </nav>

    	</header>
      <!-- Header end -->
      
      <!-- Slide Principal -->
      <section class="slide_mb">
        <div id="carouselCaptions" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselCaptions" data-slide-to="1"></li>
            <li data-target="#carouselCaptions" data-slide-to="2"></li>
            <li data-target="#carouselCaptions" data-slide-to="3"></li>
            <li data-target="#carouselCaptions" data-slide-to="4"></li>
            <li data-target="#carouselCaptions" data-slide-to="5"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item slide-6 active">
              <img src="/../img/header/transparent.png" class="d-block" alt="slide">
              <div class="carousel-caption">
                <h5>Injectable forms</h5>
                <p>under contract to the world</p>
              </div>
            </div>
            <div class="carousel-item slide-1">
              <img src="/../img/header/transparent.png" class="d-block" alt="slide">
              <div class="carousel-caption">
                <h5>Injectable forms</h5>
                <p>under contract to the world</p>
              </div>
            </div>
            <div class="carousel-item slide-2">
              <img src="/../img/header/transparent.png" class="d-block" alt="slide">
              <div class="carousel-caption">
                <h5>Injectable forms</h5>
                <p>under contract to the world</p>
              </div>
            </div>
            <div class="carousel-item slide-3">
              <img src="/../img/header/transparent.png" class="d-block" alt="slide">
              <div class="carousel-caption">
                <h5>Injectable forms</h5>
                <p>under contract to the world</p>
              </div>
            </div>
            <div class="carousel-item slide-4">
              <img src="/../img/header/transparent.png" class="d-block" alt="slide">
              <div class="carousel-caption">
                <h5>Injectable forms</h5>
                <p>under contract to the world</p>
              </div>
            </div>
            <div class="carousel-item slide-5">
              <img src="/../img/header/transparent.png" class="d-block" alt="slide">
              <div class="carousel-caption">
                <h5>Injectable forms</h5>
                <p>under contract to the world</p>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>          
        <div class="gradient"></div>
      </section>
      <!-- Slide Principal end -->

      <!-- Faja Azul -->
      <div class="container-fluid section_blue">
        <div class="container">
          <div class="row">
            <div class="col-md-10 offset-md-1 wow fadeInUp">
              <h3>Injectable forms under contract to the world</h3>
              <p>Instituto Biológico Contemporáneo S.A. (IBC) is a company of Argentine capital exclusively dedicated to the elaboration of injectable medicinal specialties for the national and international pharmaceutical industry.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- Faja Azul end -->

      <!-- Productos -->
      <section id="productos" class="productos">
        
        <div class="container">
          <div class="row">
            <div class="col-md-8 offset-md-2 text-center mb-4">
              <h2 class="wow fadeInUp">Products</h2>

              <h3 class="last_title wow fadeInUp">Pharmavial Hospital Line</h3>
              <p class="wow fadeInUp">
                Laboratorio IBC has its own line of products for hospital use PHARMAVIAL, direct production and marketing. PHARMAVIAL offers the market a guaranteed quality alternative with a varied portfolio of products in lyophilized pharmaceutical forms, injectable liquid solutions and sterile powders.
              </p>

            </div>
          </div>

          <div class="row">

            <div data-wow-delay="0.3s" class="col-md-12 wow fadeIn">
              <p class="filtrar">Filter by:</p>
              <div class="content_filters">

                  <select 
                    v-on:change="filterSelect()" 
                    v-model="therapeuticAction" 
                    class="custom-select my-1 mr-sm-2" 
                    id="therapeuticAction"
                    name="therapeuticAction">

                    <option class="first_option" value="" selected>Therapeutic Lines (All)</option>
                    <option 
                      v-for="(therapeuticAction, index) in selectTherapeuticAction" 
                      :key="index" 
                      :value="therapeuticAction">
                      {{ therapeuticAction }}
                    </option>
                    
                  </select>

                  <select 
                    v-on:change="filterSelect()" 
                    v-model="activePrinciple" 
                    class="custom-select my-1 mr-sm-2" 
                    id="activePrinciple"
                    name="activePrinciple">

                    <option class="first_option" value="" selected>Active Ingredients (All)</option>
                    <option 
                      v-for="(activePrinciple, index) in selectActivePrinciple" 
                      :key="index" 
                      :value="activePrinciple">
                      {{ activePrinciple }}
                    </option>
                    
                  </select>

                  <div class="content_button">
                    <button @click="cleanFilters" class="btn btn-primary transition">clean filters</button>
                  </div>
              </div>
            </div>
          
          </div>

          <div v-if="filteredProducts.length != 0" class="row">

            <div v-for="(product, index) in filteredProducts" :key="product.id" class="col-sm-6 col-md-4">
              <div class="content_producto">

                <div v-if="filteredImages(product.id).length == 0">
                  <img 
                    src="./../img/productos/no-image.gif" 
                    class="img-fluid" 
                    :alt="'not product image - ' + index">
                </div>

                <div v-else-if="filteredImages(product.id).length > 1" :id="'carousel_' + product.id" class="carousel slide" data-ride="carousel">

                  <div class="carousel-inner" class="carousel-item active">

                    <div
                      v-for="(image, index_image) in filteredImages(product.id)" 
                      :key="image.id"
                      v-bind:class="[index_image == 0 ? 'active' : '', 'carousel-item']">
                      <img 
                        :src="'./../img/productos/' + image.url" class="d-block w-100" 
                        :alt="'Laboratorio IBC ' + image.alt + ' - ' + image.id">
                    </div>

                  </div>

                  <a class="carousel-control-prev" :href="'#carousel_' + product.id" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" :href="'#carousel_' + product.id" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>

                <div v-else>
                  <img 
                    :src="'./../img/productos/' + filteredImages(product.id).url" 
                    class="img-fluid" 
                    :alt="'producto - ' + ' - ' + product.id">
                </div>

                <div class="datos_producto">
                  <h3>{{ product.name }}</h3>
                  <p class="principio_activo"><span>Active Ingredients: </span> {{ product.active_principle }}</p>
                  <p class="presentacion"><span>Presentación: </span> {{ product.presentation }}</p>
                  <p class="unidades_caja"><span>Unit per box: </span> {{ product.units_per_box }}</p>
                  <p class="linea_terapeutica"><span>Therapeutic line: </span> {{ product.therapeutic_line }}</p>
                  <a 
                    v-if="product.link" 
                    class="transition" 
                    :href="'./../prospectos/' + product.link" 
                    target="_blank" 
                    rel="noopener noreferrer">Download</a>
                </div>  
                
              </div>
              
            </div>
            
          </div>

          <div v-else class="row">
            <div class="col-sm-6 col-md-4">
              <p>There are no products to display</p>
            </div>
          </div>

          <div class="row logos wow fadeInUp">
            <div class="col-6 col-sm-3">
              <img class="img-fluid" src="/../img/servicios/gmp.gif" alt="gmp">
            </div>
            <div class="col-6 col-sm-3">
              <img class="img-fluid" src="/../img/servicios/anmat.gif" alt="anmat">
            </div>
            <div class="col-6 col-sm-3">
              <img class="img-fluid" src="/../img/servicios/mercosur.gif" alt="mercosur">
            </div>
            <div class="col-6 col-sm-3">
              <img class="img-fluid" src="/../img/servicios/invima.gif" alt="invima">
            </div>
          </div>

        </div>

      </section>
      <!-- Productos end -->

      <!-- Institucional -->
      <section id="institucional" class="institucional">

        <div class="container-fluid institucional_lg p-0">

          <div class="container">

            <div class="row">

              <div class="col-md-12">
                <h2 class="wow fadeInUp">About us</h2>
                <div id="general" class="transition content-inst-lg wow fadeInUp show">
                  <p>
                    Instituto Biológico Contemporáneo S.A. (IBC) is a company of Argentine capital dedicated exclusively to the elaboration of injectable medicinal specialties for the national and international pharmaceutical industry
                    Since its foundation, in the Autonomous City of Buenos Aires in 1989, IBC has developed a policy based on growth and continuous improvement.
                  </p>
                  <p>
                    The current Pharmaceutical Plant is located in the district of Ituzaingo, province of Buenos Aires. It has an area of ​​12,650 m2 of which 7,500 m2 are covered.
                    Our pharmaceutical plants are equipped with state-of-the-art technology. One of them on 2,900 m2 covered dedicated to the production of lyophilized products and injectable solutions in ampoules and ampoule bottles of general assets and the other segregated plant on 2,000 m2 for the exclusive production of injectable products in the form of sterile beta-lactam powders.
                  </p>
                  <p>
                    In the central building of 1,400 m2 covered, in addition to the production plant of general assets, there are the offices of the Board of Directors, and the Administrative, Planning, HR, Regulatory Affairs, Quality and Technical Management. Physically separated with a covered area of ​​1,500 m2 are located the warehouse of raw materials and finished products and general supplies and the areas of inspection and conditioning.
                  </p>
                  <p>
                    The antibiotic products manufacturing plant is located in a separate building of 2,000 m2 covered and on the first floor with a clear separation of the antibiotics plant with an area of ​​440 m2 covered are located the Department of Quality and Microbiological Control and the Galenic Department and Analytical Development.
                    IBC has had since its inception the constant vocation to provide excellence in quality in all its pharmaceutical services.
                    IBC has a staff of highly trained professionals, in addition to having the necessary machinery, facilities and instruments that allow it to carry out its activity under strict GMP (Good Manufacturing Practices) and GLP (Good Laboratory Practices) standards, which govern our activity. pharmaceutical. For this, IBC, since 1997 has developed an Investment Plan in equipment and facilities that have allowed it to optimize responses for its market in Latin American and Asian countries, currently having local, ANMAT, and international certifications such as MERCOSUR and INVIMA (Colombia).
                  </p>
                </div>

              </div>

            </div>

          </div>

        </div>
      </section>
      <!-- Institucional end -->

      <!-- Imagen -->
      <section class="container-fluid p-0 mb-5">
        <div class="row">
          <div class="col-md-12">
            <img class="img-fluid" src="/../img/institucional/slide-1.jpg" alt="slide institucional">
          </div>
        </div>
      </section>
      <!-- Imagen end --> 

      <!-- Planta -->
      <section>
        <div class="container">
          <div id="planta" class="row planta_produccion">
            <div class="col-md-12">
              <h2 class="wow fadeInUp">Production plant</h2>
              <p class="wow fadeInUp">
                The plant has a module dedicated exclusively to the production of injectables with general active ingredients in lyophilized injectable pharmaceutical forms and solution in a covered area of ​​2,900 m2. For this, it has two 150-liter capacity freeze-drying equipment with productions between 7,000 and 26,000 units, two new 300-liter freeze-drying equipment for the manufacture of between 20,000 and 65,000 units and a modern dosing equipment for injectable solutions with capacities between 4,000 and 18,000 units hours. The latter two are equipped with a continuous production line with a washing / depyrogenating / dosing tunnel for bottles and ampoules that ensure the aseptic quality of the product at high production levels.
              </p>
              <p class="wow fadeInUp">
                The plant for the preparation of sterile and lyophilized injectable solutions have areas classified according to international quality standards and state-of-the-art technological automatic equipment.
                The segregated plant for beta-lactam and carbapenemic antibiotics has a covered area of ​​2,000 m2 and has a continuous production line for washing / depyrogenating / dosing / checking and packaging of sterile powders that guarantee optimal production levels for a production of 10,000 units hours .
              </p>

              <h4 class="wow fadeInUp">Annual production capacity</h4>

              <div class="capacidad_anual wow fadeInUp">
                <span>Ampoules</span>
                 <span>24 million units</span>
              </div>

              <div class="capacidad_anual wow fadeInUp">
                <span>Viales líquidos</span>
                <span>50 million units</span>        
              </div>

              <div class="capacidad_anual wow fadeInUp">
                <span>Liofilizados</span>
                <span>10 million units</span>        
              </div>

            </div>
          </div>
        </div>
      </section>
      <!-- Planta end -->      
      
      <!-- Farmacovigilancia -->
      <section id="farmacovigilancia" class="farmacovigilancia  wow fadeInUp">

        <div class="max-width-lg">

          <div class="row">

            <div class="content">

              <div class="col-md-6 text-center imagen">
                <img class="img-fluid" src="/../img/farmacovigilancia/farmacovigilancia.jpg" alt="farmacovigilancia">
              </div>

              <div class="col-md-6 datos">
                <div class="row">
                  <div class="col-md-10 offset-md-1">
                    <h4>Pharmacovigilance</h4>
                    <h5>PHARMACOVIGILANCE ACTIVITIES AT IBC</h5>
                    <p>
                      Any Pharmacovigilance situation related to medicinal specialties marketed in Argentina by Laboratorio IBC is treated by health professionals within the current national regulatory framework and in accordance with Good Pharmacovigilance Practices.
                     </p>

                     <p>
                      The activities for receiving notifications, referring to adverse events and other special reporting situations, are validated, documented and compiled in compliance with the current applicable regulation and the Pharmacovigilance agreements between the IBC Laboratory and its licensors.
                     </p>
                  </div>
                </div>
              </div>

            </div>

          </div>

        </div>

      </section>
      <!-- Farmacovigilancia end -->

      <!-- Contacto -->
      <section id="contacto" class="contacto wow fadeInLeft">

        <div class="container">

          <div class="row">

            <div class="col-lg-6 formulario">

              <div class="content">
                <h2>Contact</h2>

                <form id="send" method="post" class="needs-validation" novalidate>

                  <?php require_once("./../php/sendForm.php"); ?>

                  <!-- Errores Formulario -->
                  <?php if ($errors): ?>
                    <div id="error" class="alert alert-danger alert-dismissible fade show fadeInLeft" role="alert">
                      <strong>Please verify the data!</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <ul style="padding: 0;">
                        <?php foreach ($errors as $error) { ?>
                          <li>- <?php echo $error; ?></li>
                        <?php } ?>
                      </ul>
                    </div>
                  <?php endif ?>
                  <!-- Errores Formulario end -->

                  <input type="hidden" name="origin" value="<?= $origin ?>">

                  <div class="form-group">
                    <select required class="custom-select" name="to">
                      <option disabled>Addressed to:</option>
                      <option selected value="rrhh@laboratorioibc.com.ar">RRHH</option>
                      <option value="compras@laboratorioibc.com.ar">Purchases</option>
                      <option value="comex@laboratorioibc.com.ar">Sales</option>
                      <option value="farmacovigilancia@laboratorioibc.com.ar">Pharmacovigilance</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <input required type="text" class="form-control transition" name="name" value="<?= $name ?>" placeholder="Nombre y Apellido">
                    <div class="invalid-feedback">
                      Enter your name.
                    </div>
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control transition" name="company" value="<?= $company ?>" placeholder="Empresa">
                  </div>

                  <div class="form-group">
                    <input required type="text" class="form-control transition" name="phone" value="<?= $phone ?>" placeholder="Teléfono">
                    <div class="invalid-feedback">
                      Enter a phone.
                    </div>
                  </div>

                  <div class="form-group">
                    <input required type="email" class="form-control transition" name="email" value="<?= $email ?>" placeholder="E-mail">
                    <div class="invalid-feedback">
                      Enter a valid email.
                    </div>
                  </div>

                  <div class="form-group">
                    <textarea required class="form-control transition" name="comments" rows="3" placeholder="Consulta"><?= $comments ?></textarea>
                    <div class="invalid-feedback">
                      Enter your query.
                    </div>
                  </div>

                  <button type="submit" name="send" class="btn btn-primary transition">Send</button>
                </form>
              </div>

            </div>

            <div class="col-lg-6 text-center mapa">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3282.705845621898!2d-58.7156788847694!3d-34.63687308045091!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcbfb5e45f0e35%3A0xb5e88aff5478cb8!2sGral.%20Mart%C3%ADn%20Rodr%C3%ADguez%204093%2C%20B1714JEW%20Ituzaing%C3%B3%2C%20Provincia%20de%20Buenos%20Aires!5e0!3m2!1ses-419!2sar!4v1602553293401!5m2!1ses-419!2sar" width="100%" height="711" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>

          </div>

        </div>

      </section>
      <!-- Contacto end -->

      <!-- Footer -->
      <footer class="container-fluid">
        <div class="container">

          <div class="row">
            
            <div class="col-md-5 datos">
              <img class="img-fluid logo" src="/../img/footer/logo-footer.png" alt="logo ibc footer">
              <p>
                All rights reserved &copy; <?= date ('Y'); ?> <br>
                 IBC - Contemporary Biological Institute. <br>
                 Gral. Martín Rodriguez 4093, B1714JEU <br>
                 Ituzaingó, Buenos Aires, Argentina | <a class="transition" href="tel:1152319900"> Tel: +54 011 2035-2500 </a>
               </p>
            </div>

            <div class="col-md-7 menu">
              <div class="row">

                <div class="col-sm-4">
                  <ul>
                    <li><a class="transition btn_to" href="#services">Services</a> </li>
                    <li class="pl-2 pb-1">Essays </li>
                    <li class="pl-2 pb-1">Third Party Elaboration </li>
                    <li class="pl-2 pb-1">• Freeze-dried </li>
                    <li class="pl-2 pb-1">• Injectable solutions </li>
                    <li class="pl-2 pb-1">• Sterile powders </li>
                  </ul>
                </div>

                <div class="col-sm-4">
                  <ul>
                     <li> <a class="transition btn_to" href="#institutional"> Institutional </a> </li>
                     <li class="pl-2 pb-1">General </li>
                     <li class="pl-2 pb-1">Quality Assurance </li>
                     <li class="pl-2 pb-1">International market </li>
                     <li class="pl-2 pb-1">Job Opportunities </li>
                     <li class="pl-2 pb-1">Presentation </li>
                   </ul>
                </div>

                <div class="col-sm-4">
                  <ul>
                    <li class="pb-1"><a class="transition btn_to" href="#planta">Production plant</a></li>
                    <li class="pb-1"><a class="transition btn_to" href="#contacto">Contact</a></li>
                    <li class="pb-1">
                      <a class="transition btn_to" href="#">
                        <img class="pharmacovial_footer" src="/../img/header/logo-ibc.png" alt="logo footer ibc">
                      </a>
                    </li>
                  </ul>
                </div>

              </div>
            </div>

          </div>
          
        </div>      
      </footer>
      <!-- Footer end -->

    </div>

  </body>
  <script src="/../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="/../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="/../node_modules/wowjs/dist/wow.min.js"></script>
  <script src="/../node_modules/vue/dist/vue.js"></script>
  <script src="/../node_modules/axios/dist/axios.min.js"></script>
  <script src="/../node_modules/jquery.easing/jquery.easing.min.js"></script>
  <script src="/../js/app-vue.js"></script>
  <script src="/../js/app.js"></script>
</html>