<!-- layout.php -->
<nav class="navbar navbar-expand-lg bg-warning sticky-top">
  <div class="container">
    <a class="navbar-brand text-dark fw-bold fs-3" href="#">CR7</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-5">
        <li class="nav-item">
          <a class="nav-link text-dark" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link text-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Skills
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Goles</a></li>
            <li><a class="dropdown-item" href="#">Otra habilidad</a></li>
            <li><hr class="dropdown-divider" /></li>
            <li><a class="dropdown-item" href="#">Habilidades</a></li>
          </ul>
        </li>
      </ul>

      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
        <button class="btn btn-dark fw-bold" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
