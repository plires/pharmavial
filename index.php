<?php 
  
  require __DIR__ . '/vendor/autoload.php';
  include_once __DIR__ . '/includes/config.inc.php';
  include_once __DIR__ . '/includes/funciones_validar.php';
  include_once __DIR__ . '/clases/app.php';
  
  session_start();

  $errors = [];
  $name = '';
  $company = '';
  $phone = '';
  $email = '';
  $comments = '';
  $origin = 'Consulta desde Formulario Web-ES';
  $_SESSION['lang'] = 'es';

  echo "
  <script>
    var lang = 'es';
  </script>
  ";

?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Pharmavial - Instituto Biológico Contemporáneo S.A. (IBC) es una Empresa de capitales argentinos dedicada exclusivamente a la elaboración de especialidades medicinales inyectables para la industria farmacéutica nacional e internacional Desde su fundación, en la Ciudad Autónoma de Buenos Aires en el año 1989, IBC ha desarrollado una política basada en el crecimiento y mejoramiento continuo.">
    <meta name="author" content="Pablo Lires">

    <!-- Favicons -->
    <?php include('includes/favicon.inc.php'); ?>

    <!-- Normalize -->
    <link rel="stylesheet" href="node_modules/normalize.css/normalize.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- Animate -->
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">

    <!-- Custom -->
    <link rel="stylesheet" href="css/app.css">

    <title>Pharmavial - Instituto Biológico Contemporaneo</title>
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
        <strong>Envio Exitoso!</strong> Nos comunicaremos con usted a la brevedad.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Mensajes end -->

      <!-- Mensajes Error -->
      <div id="message-error" class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error al enviar!</strong> Por favor intente mas tarde.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Mensajes end -->
      
      <!-- Header -->
      <header>

  	  		<div class="menu_bar">
            <img class="logo" src="img/header/header-logo-pharmavial.png" alt="logo pharmavial">
  			    <button class="transition" id="btn-menu-mobile" type="button"><i class="fas fa-bars"></i></button>
  	  		</div>

          <nav class="transition">
            <a class="logo_desktop" href="./">
  	  			  <img class="logo" src="img/header/header-logo-pharmavial.png" alt="logo pharmavial nav">
            </a>
            <ul>
              <li class="nav-item">
                <a class="link-item transition btn_to" href="#productos"><i class="fas fa-dolly-flatbed mr-1"></i></i>PRODUCTOS</a>
              </li>
              <li class="nav-item">
                <a class="link-item transition btn_to" href="#institucional"><i class="fas fa-users"></i></i>SOBRE NOSOTROS</a>
              </li>
              <li class="nav-item">
                <a class="link-item transition btn_to" href="#planta"><i class="fas fa-industry"></i>PLANTA</a>
              </li>
              <li class="nav-item">
                <a class="link-item transition btn_to" href="#contacto"><i class="fas fa-envelope"></i>CONTACTO</a>
              </li>
              <li class="nav-item">
                <a href="http://www.laboratorioibc.com.ar/" target="_blank" rel="noopener noreferrer" class="pharmavial_mobile">
                  <img class="img-fluid transition" src="img/header/logo-ibc-mobile.png" alt="logo ibc">
                </a>
              </li>
            </ul>

            <div class="language">
              <div>
                <a class="transition active" href="./">Español</a>
                <a class="transition" href="./en">Ingles</a>
              </div>
              <a href="http://www.laboratorioibc.com.ar/" target="_blank" rel="noopener noreferrer" class="pharmavial_desktop">
                <img class="img-fluid transition" src="img/header/logo-ibc.png" alt="logo pharmavial">
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
              <img src="img/header/transparent.png" class="d-block" alt="slide">
              <div class="carousel-caption">
                <h5>Formas inyectables </h5>
                <p>bajo contrato hacia el mundo</p>
              </div>
            </div>
            <div class="carousel-item slide-1">
              <img src="img/header/transparent.png" class="d-block" alt="slide">
              <div class="carousel-caption">
                <h5>Formas inyectables </h5>
                <p>bajo contrato hacia el mundo</p>
              </div>
            </div>
            <div class="carousel-item slide-2">
              <img src="img/header/transparent.png" class="d-block" alt="slide">
              <div class="carousel-caption">
                <h5>Formas inyectables </h5>
                <p>bajo contrato hacia el mundo</p>
              </div>
            </div>
            <div class="carousel-item slide-3">
              <img src="img/header/transparent.png" class="d-block" alt="slide">
              <div class="carousel-caption">
                <h5>Formas inyectables </h5>
                <p>bajo contrato hacia el mundo</p>
              </div>
            </div>
            <div class="carousel-item slide-4">
              <img src="img/header/transparent.png" class="d-block" alt="slide">
              <div class="carousel-caption">
                <h5>Formas inyectables </h5>
                <p>bajo contrato hacia el mundo</p>
              </div>
            </div>
            <div class="carousel-item slide-5">
              <img src="img/header/transparent.png" class="d-block" alt="slide">
              <div class="carousel-caption">
                <h5>Formas inyectables </h5>
                <p>bajo contrato hacia el mundo</p>
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
              <h3>Formas inyectables bajo contrato hacia el mundo</h3>
              <p>Instituto Biológico Contemporáneo S.A. (IBC) es una Empresa de capitales argentinos dedicada exclusivamente a la elaboración de especialidades medicinales inyectables para la industria farmacéutica nacional e internacional.</p>
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
              <h2 class="wow fadeInUp">Productos</h2>

              <h3 class="last_title wow fadeInUp">Linea Hospitalaria Pharmavial</h3>
              <p class="wow fadeInUp">
                Laboratorio IBC cuenta con su propia línea de productos de uso hospitalarios PHARMAVIAL, de producción y comercialización directa. PHARMAVIAL ofrece al mercado una alternativa de calidad garantizada con un variado portfolio de productos en las formas farmacéuticas liofilizados, soluciones líquidas inyectables y polvos estériles.
              </p>

            </div>
          </div>

          <div class="row">

            <div data-wow-delay="0.3s" class="col-md-12 wow fadeIn">
              <p class="filtrar">Filtrar por:</p>
              <div class="content_filters">

                  <select 
                    v-on:change="filterSelect()" 
                    v-model="therapeuticAction" 
                    class="custom-select my-1 mr-sm-2" 
                    id="therapeuticAction"
                    name="therapeuticAction">

                    <option class="first_option" value="" selected>Líneas Terapéuticas (Todos)</option>
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

                    <option class="first_option" value="" selected>Principios Activos (Todos)</option>
                    <option 
                      v-for="(activePrinciple, index) in selectActivePrinciple" 
                      :key="index" 
                      :value="activePrinciple">
                      {{ activePrinciple }}
                    </option>
                    
                  </select>

                  <div class="content_button">
                    <button @click="cleanFilters" class="btn btn-primary transition">Limpiar filtros</button>
                  </div>
              </div>
            </div>
          
          </div>

          <div v-if="filteredProducts.length != 0" class="row">

            <div v-for="(product, index) in filteredProducts" :key="product.id" class="col-sm-6 col-md-4">
              <div class="content_producto">

                <div v-if="filteredImages(product.id).length == 0">
                  <img 
                    src="img/productos/no-image.gif" 
                    class="img-fluid" 
                    :alt="'sin imagen producto - ' + index">
                </div>

                <div v-else-if="filteredImages(product.id).length > 1" :id="'carousel_' + product.id" class="carousel slide" data-ride="carousel">

                  <div class="carousel-inner" class="carousel-item active">

                    <div
                      v-for="(image, index_image) in filteredImages(product.id)" 
                      :key="image.id"
                      v-bind:class="[index_image == 0 ? 'active' : '', 'carousel-item']">
                      <img 
                        :src="'img/productos/' + image.url" class="d-block w-100" 
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
                    :src="'img/productos/' + filteredImages(product.id).url" 
                    class="img-fluid" 
                    :alt="'producto - ' + ' - ' + product.id">
                </div>

                <div class="datos_producto">
                  <h3>{{ product.name }}</h3>
                  <p class="principio_activo"><span>Principio activo: </span> {{ product.active_principle }}</p>
                  <p class="presentacion"><span>Presentación: </span> {{ product.presentation }}</p>
                  <p class="unidades_caja"><span>Unidad por caja: </span> {{ product.units_per_box }}</p>
                  <p class="linea_terapeutica"><span>Línea terapeutica: </span> {{ product.therapeutic_line }}</p>
                  <a 
                    v-if="product.link" 
                    class="transition" 
                    :href="'prospectos/' + product.link" 
                    target="_blank" 
                    rel="noopener noreferrer">Descargar prospecto</a>
                </div>  
                
              </div>
              
            </div>
            
          </div>

          <div v-else class="row">
            <div class="col-sm-6 col-md-4">
              <p>No hay productos para mostrar</p>
            </div>
          </div>

          <div class="row logos wow fadeInUp">
            <div class="col-6 col-sm-3">
              <img class="img-fluid" src="img/servicios/gmp.gif" alt="gmp">
            </div>
            <div class="col-6 col-sm-3">
              <img class="img-fluid" src="img/servicios/anmat.gif" alt="anmat">
            </div>
            <div class="col-6 col-sm-3">
              <img class="img-fluid" src="img/servicios/mercosur.gif" alt="mercosur">
            </div>
            <div class="col-6 col-sm-3">
              <img class="img-fluid" src="img/servicios/invima.gif" alt="invima">
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
                <h2 class="wow fadeInUp">Sobre nosotros</h2>
                <div id="general" class="transition content-inst-lg wow fadeInUp show">
                  <p>
                    Instituto Biológico Contemporáneo S.A. (IBC) es una Empresa de capitales argentinos dedicada exclusivamente a la elaboración de especialidades medicinales inyectables para la industria farmacéutica nacional e internacional
                    Desde su fundación, en la Ciudad Autónoma de Buenos Aires en el año 1989, IBC ha desarrollado una política basada en el crecimiento y mejoramiento continuo. 
                  </p>
                  <p>
                    La actual Planta Farmacéutica esta situada en el Partido de Ituzaingo, provincia de Buenos Aires. Cuenta con una superficie de 12.650 m2  de los cuales 7.500 m2 son cubiertos. 
                    Nuestras plantas farmacéuticas están equipadas con tecnología de última generación. Una de ellas sobre 2.900 m2 cubiertos dedicada a la producción de productos liofilizados y soluciones inyectables en ampollas y frasco ampolla de activos generales y la otra planta segregada sobre 2.000 m2 para la producción exclusiva de productos inyectables bajo la forma de polvos estériles beta-lactámicos.
                  </p>
                  <p>
                    En el edificio central de 1.400 m2 cubiertos además de la planta productiva de activos generales, se encuentran las oficinas del Directorio, y las Gerencias Administrativa, Planificación, RRHH, Asuntos Regulatorios, Calidad y Dirección Técnica. Físicamente separadas con una superficie de 1.500 m2 cubiertos se ubican el almacén de materias primas y productos terminados e insumos generales y las áreas de revisado y acondicionamientos.
                  </p>
                  <p>
                    En un edificio separado de 2.000 m2 cubiertos se encuentra la planta de fabricación de productos antibióticos y en el primer piso con una neta separación de la planta de antibióticos con una superficie de 440 m2 cubiertos se ubican  el Departamento de Control de Calidad y Microbiológica y el Departamento Galénico y Desarrollo Analítico. 
                    IBC ha tenido desde sus comienzos la constante vocación por brindar  excelencia en calidad en todos sus servicios farmacéuticos.
                    IBC cuenta con un plantel de profesionales altamente capacitados, además de contar con maquinarias, instalaciones e instrumental necesario que le permiten desarrollar su actividad bajo estrictas normas de GMP (Buenas Prácticas de Manufactura) y GLP (Buenas Prácticas de Laboratorios) , que rigen  nuestra actividad farmacéutica. Para ello IBC, desde el año 1997 ha desarrollado un Plan de Inversiones en equipamiento e instalaciones que le han permitido optimizar respuestas para su mercado en países de Latinoamérica y Asia contando en la actualidad con certificaciones a nivel local, ANMAT, e internacionales como MERCOSUR e INVIMA (Colombia).
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
            <img class="img-fluid" src="img/institucional/slide-1.jpg" alt="slide institucional">
          </div>
        </div>
      </section>
      <!-- Imagen end --> 

      <!-- Planta -->
      <section>
        <div class="container">
          <div id="planta" class="row planta_produccion">
            <div class="col-md-12">
              <h2 class="wow fadeInUp">Planta de producción</h2>
              <p class="wow fadeInUp">
                La planta cuenta con un módulo destinado exclusivamente a la producción de inyectables con activos generales en las formas farmacéuticas inyectables liofilizado y solución en una superficie de 2.900 m2 cubiertos. Para ello cuenta con dos equipos liofilizadores de 150 litros de capacidad con  producciones entre 7.000 y 26.000 unidades, dos  nuevos equipos liofilizadores de 300 litros de capacidad para la fabricación entre 20.000 a 65.000 unidades y un  equipo dosificador moderno de soluciones inyectables con capacidades entre 4.000 y 18.000 unidades horas. Estos dos últimos equipados con una línea continua de producción con túnel de lavado/despirogenado/dosificado de frascos y ampollas que aseguran la calidad aséptica del producto en altos niveles de producción.
              </p>
              <p class="wow fadeInUp">
                Las Planta de elaboraciones de soluciones inyectables estériles y liofilizados poseen áreas clasificadas según los estándares de calidad internacional y equipos automáticos de última generación tecnológica 
                La planta segregada para antibióticos beta-lactámicos y carbapenémicos posee una superficie de 2.000 m2 cubiertos  cuenta con una línea continua de producción de lavado/despirogenado/dosificado/revisado y empaque de polvos estériles que garantizan óptimos niveles de producción para una producción de 10.000 unidades horas.
              </p>

              <h4 class="wow fadeInUp">Capacidad anual de producción</h4>

              <div class="capacidad_anual wow fadeInUp">
                <span>Ampollas</span>
                <span>24 millones de unidades</span>        
              </div>

              <div class="capacidad_anual wow fadeInUp">
                <span>Viales líquidos</span>
                <span>50 millones de unidades</span>        
              </div>

              <div class="capacidad_anual wow fadeInUp">
                <span>Liofilizados</span>
                <span>10 millones de unidades</span>        
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
                <img class="img-fluid" src="img/farmacovigilancia/farmacovigilancia.jpg" alt="farmacovigilancia">
              </div>

              <div class="col-md-6 datos">
                <div class="row">
                  <div class="col-md-10 offset-md-1">
                    <h4>Farmacovigilancia</h4>
                    <h5>ACTIVIDADES DE FARMACOVIGILANCIAEN IBC</h5>
                    <p>
                      Cualquier situación de la Farmacovigilancia referida a las especialidades medicinales comercializadas en Argentina por Laboratorio IBC es tratada por profesionales de la salud dentro del marco regulatorio nacional vigente y de acuerdo a las Buenas Prácticas de Farmacovigilancia.
                    </p>

                    <p>
                      Las actividades de recepción de notificaciones, referidas a eventos adversos y otras situaciones especiales de reporte se validan, documentan y recopilan cumpliendo la regulación de aplicación vigente y los acuerdos de Farmacovigilancia entre el Laboratorio IB C y sus licenciantes.
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
                <h2>Contacto</h2>

                <form id="send" method="post" class="needs-validation" novalidate>

                  <?php require_once("php/sendForm.php"); ?>

                  <!-- Errores Formulario -->
                  <?php if ($errors): ?>
                    <div id="error" class="alert alert-danger alert-dismissible fade show fadeInLeft" role="alert">
                      <strong>¡Por favor verificá los datos!</strong>
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
                      <option disabled>Dirigido a:</option>
                      <option selected value="rrhh@laboratorioibc.com.ar">RRHH</option>
                      <option value="compras@laboratorioibc.com.ar">Compras</option>
                      <option value="comex@laboratorioibc.com.ar">Ventas</option>
                      <option value="farmacovigilancia@laboratorioibc.com.ar">Farmacovigilancia</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <input required type="text" class="form-control transition" name="name" value="<?= $name ?>" placeholder="Nombre y Apellido">
                    <div class="invalid-feedback">
                      Ingrese su nombre y apellido.
                    </div>
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control transition" name="company" value="<?= $company ?>" placeholder="Empresa">
                    <div class="invalid-feedback">
                      Ingrese el nombre de la empresa.
                    </div>
                  </div>

                  <div class="form-group">
                    <input required type="text" class="form-control transition" name="phone" value="<?= $phone ?>" placeholder="Teléfono">
                    <div class="invalid-feedback">
                      Ingrese un teléfono.
                    </div>
                  </div>

                  <div class="form-group">
                    <input required type="email" class="form-control transition" name="email" value="<?= $email ?>" placeholder="E-mail">
                    <div class="invalid-feedback">
                      Ingrese un email válido.
                    </div>
                  </div>

                  <div class="form-group">
                    <textarea required class="form-control transition" name="comments" rows="3" placeholder="Consulta"><?= $comments ?></textarea>
                    <div class="invalid-feedback">
                      Ingrese su consulta.
                    </div>
                  </div>

                  <button type="submit" name="send" class="btn btn-primary transition">Enviar</button>
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
              <img class="img-fluid logo" src="img/footer/logo-footer.png" alt="logo ibc footer">
              <p>
                Todos los derechos reservados &copy; <?= date('Y'); ?> <br>
                IBC – Instituto Biológico Contemporáneo. <br>
                Gral. Martín Rodriguez 4093, B1714JEU <br>
                Ituzaingó, Buenos Aires, Argentina |  <a class="transition" href="tel:1152319900">Tel: +54 011 2035-2500</a>
              </p>
            </div>

            <div class="col-md-7 menu">
              <div class="row">

                <div class="col-sm-4">
                  <ul>
                    <li><a class="transition btn_to" href="#servicios">Servicios</a></li>
                    <li class="pl-2 pb-1">Ensayos</li>
                    <li class="pl-2 pb-1">Elaboración a Terceros</li>
                    <li class="pl-2 pb-1">• Liofilizados</li>
                    <li class="pl-2 pb-1">• Soluciones inyectables</li>
                    <li class="pl-2 pb-1">• Polvos estériles</li>
                  </ul>
                </div>

                <div class="col-sm-4">
                  <ul>
                    <li><a class="transition btn_to" href="#institucional">Institucional</a></li>
                    <li class="pl-2 pb-1">General</li>
                    <li class="pl-2 pb-1">Aseguramiento de Calidad</li>
                    <li class="pl-2 pb-1">Mercado internacional</li>
                    <li class="pl-2 pb-1">Oportunidades Laborales</li>
                    <li class="pl-2 pb-1">Presentación</li>
                  </ul>
                </div>

                <div class="col-sm-4">
                  <ul>
                    <li class="pb-1"><a class="transition btn_to" href="#planta">Planta de producción</a></li>
                    <li class="pb-1"><a class="transition btn_to" href="#contacto">Contacto</a></li>
                    <li class="pb-1">
                      <a class="transition btn_to" href="#">
                        <img class="pharmacovial_footer" src="img/header/logo-ibc.png" alt="logo footer ibc">
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
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="node_modules/wowjs/dist/wow.min.js"></script>
  <script src="node_modules/vue/dist/vue.js"></script>
  <script src="node_modules/axios/dist/axios.min.js"></script>
  <script src="node_modules/jquery.easing/jquery.easing.min.js"></script>
  <script src="js/app-vue.js"></script>
  <script src="js/app.js"></script>
</html>