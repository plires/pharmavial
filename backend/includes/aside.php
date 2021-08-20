<?php
echo "
<script type='application/javascript'> 
  var sessionId = '".isset($_SESSION['user']['id']) ."'
  var sessionUser = '".isset($_SESSION['user']['user']) ."'
  var sessionEmail = '".isset($_SESSION['user']['email']) ."'
</script>
";
?>

<!-- Aside -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../img/backend/logo-joker-backend.gif" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text text-center font-weight-light">Pharmavial</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">

            <?php $active = $current == 'products' ? 'active' : ''; ?>
            <a href="productos.php" class="nav-link <?= $active; ?>">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                PRODUCTOS
                <i class="right far fa-edit"></i>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <?php $active = $current == 'images' ? 'active' : ''; ?>
            <a href="imagenes.php" class="nav-link <?= $active; ?>">
              <i class="nav-icon fas fa-database"></i>
              <p>
                IMAGENES
                <i class="right fas fa-eye"></i>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <?php $active = $current == 'user' ? 'active' : ''; ?>
            <a href="#" class="nav-link <?= $active; ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                USUARIO
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="user.php" class="nav-link">
                  <i class="fas fa-user-edit nav-icon"></i>
                  <p>Editar datos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="change_pass.php" class="nav-link">
                  <i class="fas fa-lock nav-icon"></i>
                  <p>Cambiar Pass</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="php/logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                SALIR
              </p>
            </a>
          </li>

        </ul>
      </nav>
      
    </div>
   
</aside>
<!-- Aside end -->