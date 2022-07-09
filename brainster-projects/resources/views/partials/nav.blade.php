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
                              Академја за<br>Програмирање</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="https://brainster.co/marketing/" target="_blank">
                              Академја за<br>Маркетиинг</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="https://brainster.co/graphic-design/" target="_blank">
                              Академја за<br>Дизајн</a>
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
                          <li class="nav-item">
                              <a href="{{ route('auth.logout') }}" class="nav-link btn btn-danger text-white">
                                  Одјави се
                              </a>
                          </li>
                      @endauth
                  </ul>
              </div>
          </nav>
      </div>

      {{-- hire student modal --}}
      <div class="modal fade" id="hireStudentModal" tabindex="-1">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Вработи наши студенти</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <p class="text-secondary">Внесете ваши информации за да стапиме во контакт:</p>
                      <form>
                          <div class="form-group">
                              <label for="company_email" class="col-form-label">Е-пошта:</label>
                              <input type="text" class="form-control" name="company_email" id="company_email">
                          </div>
                          <div class="form-group">
                              <label for="company_phone" class="col-form-label">Телефон:</label>
                              <input type="text" class="form-control" name="company_phone" id="company_phone">
                          </div>
                          <div class="form-group">
                              <label for="company_name" class="col-form-label">Компанија:</label>
                              <input type="text" class="form-control" name="company_name" id="company_name">
                          </div>
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-warning btn-block">Испрати</button>
                  </div>
              </div>
          </div>
      </div>
