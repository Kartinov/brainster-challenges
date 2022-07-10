      {{-- navbar --}}
      <div class="container">
          <nav class="navbar navbar-expand-lg navbar-light">
              <a class="navbar-brand" href="{{ route('home') }}">
                  <img src="{{ asset('img/Logo.svg') }}" alt="Brainster Logo">
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
                  <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarMenu">
                  <ul class="navbar-nav mx-auto align-items-lg-center">
                      <li class="nav-item">
                          <a class="nav-link" href="https://brainster.co/full-stack/" target="_blank">
                              Академја за<br> Програмирање</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="https://brainster.co/marketing/" target="_blank">
                              Академја за<br> Маркетиинг</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="https://brainster.co/graphic-design/" target="_blank">
                              Академја за<br> Дизајн</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="https://blog.brainster.co/">
                              Блог
                          </a>
                      </li>
                      <li class="nav-item">
                          <button class="nav-link" data-toggle="modal" data-target="#hireStudentModal">
                              Вработи наши<br> студенти
                          </button>
                      </li>
                      @auth
                          <li class="nav-item d-flex align-items-center">
                              <a href="{{ route('projects.index') }}" class="nav-link btn btn-info text-white mr-3 px-3">
                                  Панел
                              </a>

                              <a href="{{ route('auth.logout') }}" class="nav-link btn btn-danger text-white px-3">
                                  Одјави се
                              </a>
                          </li>
                      @endauth
                  </ul>
              </div>
          </nav>
      </div>

@include('partials.hire-student-modal')
