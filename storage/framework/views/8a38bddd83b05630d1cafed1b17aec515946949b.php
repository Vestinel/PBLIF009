<nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-down"
    >
      <div class="container">
        <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
          <img height="80px" src="images/LOGO5.png" alt="" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo e(route('home')); ?>">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('categories')); ?>">Categories</a>
            </li>
          </ul>
        </div>
      </div>
    </nav><?php /**PATH C:\laragon\www\laboran\resources\views/includes/navbar-auth.blade.php ENDPATH**/ ?>