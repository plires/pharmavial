<?php 

  require '../vendor/autoload.php';

  include_once('../includes/config.inc.php');
  include_once('../includes/funciones_validar.php');
  require_once("../clases/app.php");

  session_start();

  $errors = [];
  $errorsCV = [];
  $name = '';
  $email = '';
  $comments = '';
  $origin = 'Consulta desde Formulario Web-EN';
  $originFile = 'CV Enviado desde el formulario Web-EN';
  $_SESSION['lang'] = 'en';

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Instituto Biológico Contemporáneo SA (IBC) is an Argentine-owned company dedicated exclusively to the production of injectable medicinal specialties for the national and international pharmaceutical industry Since its foundation, in the Autonomous City of Buenos Aires in 1989, IBC has developed a policy based on growth and continuous improvement.">
    <meta name="author" content="Pablo Lires">

    <!-- Favicons -->
    <?php include('../includes/favicon-en.inc.php'); ?>

    <!-- Normalize -->
    <link rel="stylesheet" href="../node_modules/normalize.css/normalize.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- Animate -->
    <link rel="stylesheet" href="../css/animate.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">

    <!-- Custom -->
    <link rel="stylesheet" href="../css/app.css">

    <title>Contemporary Biological Institute</title>
  </head>
  <body>

    <!-- Mensajes -->
    <div id="message" class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Successful Send!</strong> We will contact you shortly.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <!-- Mensajes end -->

    <!-- Mensajes Error -->
    <div id="message-error" class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>error sending!</strong> please try later.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <!-- Mensajes end -->
    
    <!-- Header -->
    <header>

	  		<div class="menu_bar">
          <img class="logo" src="../img/header/logo-ibc.png" alt="logo ibc">
	  			<button class="transition" id="btn-menu-mobile" type="button"><i class="fas fa-bars"></i></button>
	  		</div>

        <nav class="transition">
	  			<img class="logo logo_desktop" src="../img/header/logo-ibc.png" alt="logo ibc">
          <ul>
            <li class="nav-item">
              <a class="link-item transition btn_to" href="#institucional"><i class="fas fa-university"></i>INSTITUTIONAL</a>
            </li>
            <li class="nav-item">
              <a class="link-item transition btn_to" href="#servicios"><i class="fas fa-concierge-bell"></i>SERVICES</a>
            </li>
            <li class="nav-item">
              <a class="link-item transition btn_to" href="#planta"><i class="fas fa-industry"></i>PLANT</a>
            </li>
            <li class="nav-item">
              <a class="link-item transition btn_to" href="#contacto"><i class="fas fa-envelope"></i>CONTACT</a>
            </li>
            <li class="nav-item">
              <a href="#" target="_blank" rel="noopener noreferrer" class="pharmavial_mobile">
                <img class="img-fluid transition" src="./../img/header/logo-pharmavial-mobile.png" alt="logo pharmavial">
              </a>
            </li>
          </ul>

          <div class="language">
            <a href="#" target="_blank" rel="noopener noreferrer" class="pharmavial_desktop">
              <img class="img-fluid transition" src="./../img/header/logo-pharmavial.png" alt="logo pharmavial">
            </a>
            <a class="transition" href="../">Spanish</a>
            <a class="transition active" href="./">English</a>
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
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item slide-1 active">
            <img src="../img/header/transparent.png" class="d-block" alt="slide">
            <div class="carousel-caption">
              <h5>Injectable forms </h5>
              <p>under contract to the world</p>
            </div>
          </div>
          <div class="carousel-item slide-2">
            <img src="../img/header/transparent.png" class="d-block" alt="slide">
            <div class="carousel-caption">
              <h5>Injectable forms </h5>
              <p>under contract to the world</p>
            </div>
          </div>
          <div class="carousel-item slide-3">
            <img src="../img/header/transparent.png" class="d-block" alt="slide">
            <div class="carousel-caption">
              <h5>Injectable forms </h5>
              <p>under contract to the world</p>
            </div>
          </div>
          <div class="carousel-item slide-4">
            <img src="../img/header/transparent.png" class="d-block" alt="slide">
            <div class="carousel-caption">
              <h5>Injectable forms </h5>
              <p>under contract to the world</p>
            </div>
          </div>
          <div class="carousel-item slide-5">
            <img src="../img/header/transparent.png" class="d-block" alt="slide">
            <div class="carousel-caption">
              <h5>Injectable forms </h5>
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
      <img data-wow-delay="0.3s" class="img-fluid figura_izq wow fadeInLeft" src="../img/header/figura-a.png" alt="figura a">
      <img data-wow-delay="0.6s" class="img-fluid figura_der wow fadeInRight" src="../img/header/figura-b.png" alt="figura b">
      <div class="container">
        <div class="row">
          <div class="col-md-10 offset-md-1 wow fadeInUp">
            <h3>Injectable forms under contract to the world</h3>
            <p>Instituto Biológico Contemporáneo S.A. (IBC) is a company of Argentine capital exclusively dedicated to the elaboration of injectable medicinal specialties for the national and international pharmaceutical industry..</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Faja Azul end -->

    <!-- Servicios -->
    <section id="servicios" class="servicios">
      
      <div class="container-fluid">
        <div class="row">
          <div class="mark"></div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-8 offset-md-2 text-center mb-4">
            <h2 class="wow fadeInUp">Services</h2>

            <h3 class="last_title wow fadeInUp">Elaboration to Third Parties</h3>
            <p class="wow fadeInUp">
              Laboratorio Instituto Biológico Contemporáneo S.A (IBC) provides production services for the following sterile pharmaceutical forms:
            </p>

          </div>
        </div>

        <div class="row tabla">

          <div data-wow-delay="0.3s" class="col-md-4 wow fadeIn">
            <!-- <img class="img-fluid" src="../img/servicios/vacunas.jpg" alt="vacunas"> -->
            <h5>Lyophilized</h5>
            <ul>
              <li>• Acyclovir 500 mg / 250 mg</li>
              <li>• Amphotericin B 50 mg</li>
              <li>• Clarithromycin 500 mg</li>
              <li>• Diliazem 25 mg</li>
              <li>• Esomeprazole 40 Mg</li>
              <li>• Ganciclovir 500 mg</li>
              <li>• Hydrocortisone 100 mg / 250 mg / 500 mg</li>
              <li>• Ibuprofen 400 mg</li>
              <li>• Indomethacin 50 mg</li>
              <li>• Calcium Leucovorin 50 mg</li>
              <li>• Methylprednisolone 500 mg / 1g</li>
              <li>• Sodium Nitroprusside 50 mg</li>
              <li>• Omeprazole Sodium 40 mg</li>
              <li>• Sodium Pamindronate 30 mg / 60 mg / 90 mg</li>
              <li>• Pantoprazole 40 mg</li>
              <li>• Pridinol 2 mg / 400 mg </li>
              <li>• Piroxicam 20 mg</li>
              <li>• Remifentanil 1 mg, 2 mg, 5 mg</li>
              <li>• Succinylcholine 100 mg / 500 mg</li>
              <li>• Teicoplanin 200 mg / 400 mg</li>
              <li>• Vancomycin 500 mg</li>
              <li>• Vecuronium Bromide 4 mg / 10 mg</li>
              <li>• Vitamin B12 10 mg / 20 mg</li>
              <li>• Interferon Alpha 2a / 2b</li>
            </ul>
          </div>

          <div data-wow-delay="0.6s" class="col-md-4 wow fadeIn">
            <!-- <img class="img-fluid" src="../img/servicios/ampollas.jpg" alt="ampollas"> -->
            <h5>Injectable Solutions</h5>
            <ul>
              <li>• Amikacin 100 mg / 250 mg / 500 mg</li>
              <li>• Atracurium 50 mg</li>
              <li>• Betamethasone 4 mg / 1ml</li>
              <li>• Bupivacaine HCl 5%</li>
              <li>• Ciprofloxacin 2 mg /  100 ml</li>
              <li>• Clindamycin 300 mg / 600 mg</li>
              <li>• Lysine Clonixinate</li>
              <li>• Dobutamine 250 mg / 20 ml</li>
              <li>• Dexamethasone Sodium Phosphate 4 mg / ml</li>
              <li>• Diclofenac Na 75 mg / 3 ml</li>
              <li>• Diclofenac K 75 mg / 5 ml</li>
              <li>• Diazepam 10 mg / 2 ml</li>
              <li>• Dipyrone 2.5 gr / 5 ml</li>
              <li>• Erythropoietin 1000 IU / 2000 IU / 4000 IU</li>
              <li>• Ethylephrine HCll 10 mg</li>
              <li>• Filgrastim 300 mcg / 480 mcg</li>
              <li>• Fluconazole 2mg / ml * 100ml</li>
              <li>• Sodium Heparin 10,000 IU </li>
              <li>• Nalbuphine 10 mg</li>
              <li>• Levofloxacin 500 mg</li>
              <li>• Lidocaine 1% and 2%</li>
              <li>• Lidocaine with Epinephrine</li>
              <li>• Midazolam 5 mg / 15 mg</li>
              <li>• Ranitidine 50 mg</li>
              <li>• Pancuronium Bromide 4 mg / 2 ml</li>
              <li>• Ondansetron 4 mg / 8 mg</li>
              <li>• Tramadol HCl 100 mg</li>
              <li>• Vit. B1, B12 (Vit. B1, B6, B12)</li>
              <li>• Sol. Chlorinated</li>
              <li>• Sol. Glucose</li>
              <li>• Sol. Physiological (0.9% P / V sodium chloride solution)</li>
            </ul>
          </div>

          <div data-wow-delay="0.9s" class="col-md-4 wow fadeIn">
            <!-- <img class="img-fluid" src="../img/servicios/dosis.jpg" alt="polvos esteriles"> -->
            <h5>Sterile powders (Beta-lactams and Carbapenems)</h5>
            <ul>
              <li>• Ampicillin 500 mg / 1000 mg</li>
              <li>• Amoxicillin 1g / 500 mg</li>
              <li>• Amoxicillin + Clavulanic 600 mg / 1.2 g</li>
              <li>• Ceftriaxone 1 g</li>
              <li>• Ceftazidime 1 g</li>
              <li>• Ampicillin + Sulbactam 1.5 g</li>
              <li>• Cephalothin Sodium 1g</li>
              <li>• Cefotaxime 1g</li>
              <li>• Cefazolin 1g</li>
              <li>• Cefoperazone 1g</li>
              <li>• Piperacillin + Tazobactam 4.5 g</li>
              <li>• Meropenem 500 mg / 1g</li>
              <li>• Imipenem + Cilastatin 500 mg</li>
              <li>• Cefepime + L-Arginine (1 g - 0.750 mg)</li>
              <li>• Cefepime + L-Arginine (2 g - 1,450 g)</li>
            </ul>
          </div>

        </div>

        <div class="row">
          <div class="col-md-8 offset-md-2 text-center mb-4">

            <h3 class="wow fadeInUp">Essays</h3>
            
            <h4 class="wow fadeInUp">TOC test</h4>
            <p class="wow fadeInUp">
              Among the services we offer is the TOC test. Both for purified water and for water for injection and in cleaning validation studies developed using this technique.
            </p>
            
            <h4 class="wow fadeInUp">Subvisible Particle Test (F.A)</h4>
            <p class="wow fadeInUp">
              Light blocking test for water-based samples.
            </p>
            <p class="wow fadeInUp">
              At the customer's request, our services include the secondary conditioning of the product.
            </p>
            
          </div>
        </div>

        <div class="row logos wow fadeInUp">
          <div class="col-6 col-sm-3">
            <img class="img-fluid" src="../img/servicios/gmp.gif" alt="gmp">
          </div>
          <div class="col-6 col-sm-3">
            <img class="img-fluid" src="../img/servicios/anmat.gif" alt="anmat">
          </div>
          <div class="col-6 col-sm-3">
            <img class="img-fluid" src="../img/servicios/mercosur.gif" alt="mercosur">
          </div>
          <div class="col-6 col-sm-3">
            <img class="img-fluid" src="../img/servicios/invima.gif" alt="invima">
          </div>
        </div>

      </div>

    </section>
    <!-- Servicios end -->

    <!-- Institucional -->
    <section id="institucional" class="institucional">

      <div class="mark"></div>

      <div class="container-fluid institucional_lg p-0">

        <div class="container">

          <div class="row h-100">

            <div class="col-md-12">
              <h2 class="wow fadeInUp">Institutional</h2>
              <div id="general" class="transition content-inst-lg wow fadeInUp show">
                <p>
                  Instituto Biológico Contemporáneo S.A. (IBC) is a company of Argentine capital exclusively dedicated to the elaboration of injectable medicinal specialties for the national and international pharmaceutical industry
                </p>

                <p> 
                  Since its foundation in the Autonomous City of Buenos Aires in 1989, IBC has developed a policy based on growth and continuous improvement.
                </p>

                <p>                  
                  The current Pharmaceutical Plant is located in the District of Ituzaingo, province of Buenos Aires. It has an area of 12,650 m2 of which 7,500 m2 are covered.
                </p>

                <p>                  
                  Our pharmaceutical plants are equipped with the latest technology. One of them on 2,900 m2 covered, dedicated to the production of lyophilized products and injectable solutions in ampoules and ampoule bottle of general assets and the other segregated plant on 2,000 m2 for the exclusive production of injectable products in the form of sterile beta-lactam powders.
                </p>

                <p>                   
                  In the central building of 1,400 m2 covered in addition to the production plant of general assets, there are the offices of the Board of Directors, and the Administrative, Planning, HR, Regulatory Affairs, Quality and Technical Management. Physically separated with a covered area of 1,500 m2 are located the warehouse for raw materials and finished products and general supplies and the areas of revision and conditioning.
                  The antibiotic products manufacturing plant is located in a separate building of 2,000 m2 covered and on the first floor with a clear separation of the antibiotics plant with an area of 440 m2 covered are located the Department of Quality and Microbiological Control and the Galenic Department and Analytical Development.
                </p>

                <p>                   
                  IBC has had since its inception the constant vocation to provide excellence in quality in all its pharmaceutical services.
                  IBC has a staff of highly trained professionals, in addition to having machinery, facilities and necessary instruments that allow it to carry out its activity under strict GMP (Good Manufacturing Practices) and GLP (Good Laboratory Practices) standards, which govern our activity. pharmaceutical. For this, IBC, since 1997 has developed an Investment Plan in equipment and facilities that have allowed it to optimize responses for its market in Latin American and Asian countries, currently having local, ANMAT, and international certifications such as MERCOSUR and INVIMA (Colombia).
                </p>
              </div>

            </div>

          </div>

        </div>

      </div>

      <div class="container">
        <div id="planta" class="row planta_produccion">
          <div class="col-md-12">
            <h2 class="wow fadeInUp">Production plant</h2>
            <p class="wow fadeInUp">
              The plant has a module dedicated exclusively to the production of injectables with general assets in lyophilized injectable pharmaceutical forms and solution in a covered area of 2,900 m2. For this, it has two freeze-drying equipment with a capacity of 150 liters with productions between 7,000 and 26,000 units, two new freeze-drying equipment with a capacity of 300 liters for the manufacture of between 20,000 and 65,000 units, and a modern dosing equipment for injectable solutions with capacities between 4,000 and 18,000 units hours. The latter two are equipped with a continuous production line with a washing / depyrogenating / dosing tunnel for bottles and ampoules that ensure the aseptic quality of the product at high production levels.
            </p>
            <p class="wow fadeInUp">
              The plant for the preparation of sterile and lyophilized injectable solutions have areas classified according to international quality standards and state-of-the-art automatic equipment.The segregated plant for beta-lactam and carbapenemic antibiotics has a covered area of 2,000 m2 and has a continuous production line of washing / depyrogenation / dosing / checking and packaging of sterile powders that guarantee optimal levels of production for a production of 10,000 units hours
            </p>

            <h4 class="wow fadeInUp">Annual production capacity</h4>

            <div class="capacidad_anual wow fadeInUp">
              <span>Blisters</span>
              <span>24 million units</span>        
            </div>

            <div class="capacidad_anual wow fadeInUp">
              <span>Liquid vials</span>
              <span>50 million units</span>        
            </div>

            <div class="capacidad_anual wow fadeInUp">
              <span>Lyophilized</span>
              <span>10 million units</span>        
            </div>

          </div>
        </div>
      </div>

    </section>
    <!-- Institucional end -->

    <!-- Nuestros Equipos -->
    <section class="nuestros_equipos">

      <div class="max-width-lg">

        <div class="row">

          <div class="col-md-12 text-center wow fadeInUp">
            <h2>Production lines</h2>          
          </div>

          <div class="content wow fadeInUp">

            <div class="col-md-6 text-center datos">
              <h4>Module 1</h4>
              <h5>TELSTAR line</h5>
              <div class="row">
                <div class="col-lg-10 offset-lg-1">
                  <p>
                   Freeze dryers with a condenser capacity of 150 liters mounted in an aseptic area with a full panel of high efficiency filters, and an individual sealing area.
                  </p>
                </div>
              </div>
            </div>

            <div class="col-md-6 text-center imagen">
              <div id="modulo1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="../img/nuestros-equipos/maquina-1-a.jpg" alt="slide maquina 1 a">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="../img/nuestros-equipos/maquina-1-b.jpg" alt="slide maquina 1 b">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="../img/nuestros-equipos/maquina-1-c.jpg" alt="slide maquina 1 c">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#modulo1" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#modulo1" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>

          </div>

          <div class="content wow fadeInUp">

            <div class="col-md-6 text-center imagen">
              <div id="modulo2" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="../img/nuestros-equipos/maquina-2-a.jpg" alt="slide maquina 2 a">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="../img/nuestros-equipos/maquina-2-b.jpg" alt="slide maquina 2 b">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="../img/nuestros-equipos/maquina-2-c.jpg" alt="slide maquina 2 c">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#modulo2" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#modulo2" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>

            <div class="col-md-6 text-center datos">
              <h4>Module 2</h4>
              <h5>TOFFLON line</h5>
              <div class="row">
                <div class="col-lg-10 offset-lg-1">
                  <p>
                    Freeze dryers with a condenser capacity of 300 liters that are part of a continuous and fully automatic line for dosing, loading / unloading of vials and sealing, performing all operations under cabinets equipped with high-efficiency filters.
                  </p>
                </div>
              </div>
            </div>
            
          </div>

          <div class="content wow fadeInUp">

            <div class="col-md-6 text-center datos">
              <h4>Ampoules Line</h4>
              <h5>TRUKING line</h5>
              <div class="row">
                <div class="col-lg-10 offset-lg-1">
                  <p>
                    Ampoule dispenser between 4,000 and 18,000 units / h that is part of a continuous and fully automatic dispensing line under cabinets equipped with high-efficiency filters.
                  </p>
                </div>
              </div>
            </div>

            <div class="col-md-6 text-center imagen">
              <div id="modulo3" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="../img/nuestros-equipos/maquina-3-a.jpg" alt="slide maquina 3 a">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="../img/nuestros-equipos/maquina-3-b.jpg" alt="slide maquina 3 b">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="../img/nuestros-equipos/maquina-3-c.jpg" alt="slide maquina 3 c">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#modulo3" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#modulo3" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
            
          </div>

          <div class="content wow fadeInUp">

            <div class="col-md-6 text-center imagen">
              <div id="modulo4" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="../img/nuestros-equipos/maquina-4-a.jpg" alt="slide maquina 4 a">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="../img/nuestros-equipos/maquina-4-b.jpg" alt="slide maquina 4 b">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="../img/nuestros-equipos/maquina-4-c.jpg" alt="slide maquina 4 c">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#modulo4" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#modulo4" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>

            <div class="col-md-6 text-center datos">
              <h4>Beta-lactams </h4>
              <h5>NKP line</h5>
              <div class="row">
                <div class="col-lg-10 offset-lg-1">
                  <p>
                    8,000 units / h vial dispenser that is part of a continuous and fully automatic dispensing line under cabinets equipped with high-efficiency filters.
                  </p>
                </div>
              </div>
            </div>
            
          </div>

        </div>
        
      </div>

    </section>
    <!-- Nuestros Equipos end -->

    <!-- Contacto -->
    <section id="contacto" class="contacto wow fadeInLeft">

      <div class="mark"></div>

      <div class="container">

        <div class="row">

          <div class="col-lg-6 formulario">

            <div class="content">
              <h2>Contact</h2>

              <form id="send" method="post" class="needs-validation" novalidate>

                <!-- Errores Formulario -->
                <?php if ($errors): ?>
                  <div id="error" class="alert alert-danger alert-dismissible fade show fadeInLeft" role="alert">
                    <strong>¡Please verify the data!</strong>
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
                  <input required type="text" class="form-control transition" name="name" value="<?= $name ?>" placeholder="Full Name">
                  <div class="invalid-feedback">
                    Enter your name.
                  </div>
                </div>

                <div class="form-group">
                  <input required type="email" class="form-control transition" name="email" value="<?= $email ?>" placeholder="E-mail">
                  <div class="invalid-feedback">
                    Enter your email.
                  </div>
                </div>

                <div class="form-group">
                  <textarea required class="form-control transition" name="comments" rows="3" placeholder="Comments"><?= $comments ?></textarea>
                  <div class="invalid-feedback">
                    Enter your comments.
                  </div>
                </div>

                <button type="submit" name="send" class="btn btn-primary transition">Send</button>
              </form>
            </div>

          </div>

          <div class="col-lg-6 text-center mapa">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3282.705845621898!2d-58.7156788847694!3d-34.63687308045091!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcbfb5e45f0e35%3A0xb5e88aff5478cb8!2sGral.%20Mart%C3%ADn%20Rodr%C3%ADguez%204093%2C%20B1714JEW%20Ituzaing%C3%B3%2C%20Provincia%20de%20Buenos%20Aires!5e0!3m2!1ses-419!2sar!4v1602553293401!5m2!1ses-419!2sar" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>

        </div>

      </div>

    </section>
    <!-- Contacto end -->

    <!-- Oportunidades Laborales -->
    <section class="oportunidades_laborales">
      <div class="container">
        <div class="row">

          <div class="col-md-6">
            <h2>International market</h2>
            <img class="img-fluid" src="../img/oportunidades-laborales/laboratorio-ibc.jpg" alt="laboratorio ibc">
            <p>
              IBC Laboratory offers its services internationally For more information: <a class="transition" href="mailto:comex@laboratorioibc.com.ar">comex@laboratorioibc.com.ar</a>
            </p>
          </div>

          <div class="col-md-6">
            <h2>Job opportunities</h2>
            <p>
              At IBC we have various job opportunities for all of our areas. Attach your CV in Word or PDF format with your contact details
            </p>

            <?php
              require_once("../php/sendForm.php");
              require_once("../php/sendFile.php");
            ?>

            <!-- Errores Envio CV -->
            <?php if ($errorsCV): ?>
              <div id="error" class="alert alert-danger alert-dismissible fade show fadeInLeft" role="alert">
                <strong>¡Please verify the data!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <ul style="padding: 0;">
                  <?php foreach ($errorsCV as $errorCV) { ?>
                    <li>- <?php echo $errorCV; ?></li>
                  <?php } ?>
                </ul>
              </div>
            <?php endif ?>
            <!-- Errores Envio CV end -->

            <form id="cv" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
              <input type="hidden" name="origin" value="Formulario Oportunidades Laborales">

              <div class="form-group">
                <div class="custom-file">
                  <input required type="file" lang="en" data-browse="Select File" class="custom-file-input" name="cv" id="customFile">
                  <label class="custom-file-label" for="customFile">Select File</label>
                  <small id="customFilelHelp" class="form-text text-muted">(máx: 2mb) (PDF, XLS, XLSX, DOC, DOCX, JPG, PNG & GIF).</small>
                  <div class="invalid-feedback">
                    Upload a CV (máx: 2mb) (PDF, XLS, XLSX, DOC, DOCX, JPG, PNG & GIF).
                  </div>
                </div>
              </div>

              <button type="submit" name="sendFile" class="btn btn-primary transition">Enviar</button>
            </form>
          </div>

        </div>
      </div>
    </section>
    <!-- Oportunidades Laborales end -->

    <!-- Footer -->
    <footer class="container-fluid">
      <div class="container">

        <div class="row">
          
          <div class="col-md-5 datos">
            <img class="img-fluid logo" src="../img/footer/logo-footer.png" alt="logo ibc footer">
            <p>
              All rights reserved &copy; <?= date('Y'); ?> <br>
              IBC – Instituto Biológico Contemporáneo. <br>
              Gral. Martín Rodriguez 4093, B1714JEU <br>
              Ituzaingó, Buenos Aires, Argentina |  <a class="transition" href="tel:1152319900">Phone: +54 011 2035-2500</a>
            </p>
          </div>

          <div class="col-md-7 menu">
            <diw class="row">

              <div class="col-sm-4">
                <ul>
                  <li><a class="transition btn_to" href="#servicios">Services</a></li>
                  <li class="pl-2 pb-1">Essays</li>
                  <li class="pl-2 pb-1">Elaboration to Third Parties</li>
                  <li class="pl-2 pb-1">• Lyophilized</li>
                  <li class="pl-2 pb-1">• Injectable Solutions</li>
                  <li class="pl-2 pb-1">• Sterile powders</li>
                </ul>
              </div>

              <div class="col-sm-4">
                <ul>
                  <li><a class="transition btn_to" href="#institucional">Institutional</a></li>
                  <li class="pl-2 pb-1">General</li>
                  <li class="pl-2 pb-1">Quality assurement</li>
                  <li class="pl-2 pb-1">International market</li>
                  <li class="pl-2 pb-1">Job opportunities</li>
                  <li class="pl-2 pb-1">Presentation</li>
                </ul>
              </div>

              <div class="col-sm-4">
                <ul>
                  <li class="pb-1"><a class="transition btn_to" href="#planta">Production plant</a></li>
                  <li class="pb-1"><a class="transition btn_to" href="#contacto">Contact</a></li>
                  <li class="pb-1">
                    <a class="transition btn_to" href="#">
                      <img class="pharmacovial_footer" src="../img/header/logo-pharmavial.png" alt="logo footer pharmacovial">
                    </a>
                  </li>
                </ul>
              </div>

            </diw>
          </div>

        </div>
        
      </div>      
    </footer>
    <!-- Footer end -->

  </body>
  <script src="../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../node_modules/wowjs/dist/wow.min.js"></script>
  <script src="../node_modules/jquery.easing/jquery.easing.min.js"></script>
  <script src="../js/app.js"></script>
</html>