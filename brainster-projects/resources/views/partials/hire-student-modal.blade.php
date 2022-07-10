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

                      @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif

                      @if (session()->has('success_email'))
                          <div class="alert alert-success">
                              {{ session('success_email') }}
                          </div>
                      @endif

                      <form action="{{ route('mails.hireStudent') }}" method="POST">
                          @csrf
                          <div class="form-group">
                              <label for="company_email" class="col-form-label">Е-пошта:</label>
                              <input type="text" class="form-control" name="company_email" id="company_email"
                                  value="{{ old('company_email') }}">
                          </div>
                          <div class="form-group">
                              <label for="company_phone" class="col-form-label">Телефон:</label>
                              <input type="text" class="form-control" name="company_phone" id="company_phone"
                                  value="{{ old('company_phone') }}">
                          </div>
                          <div class="form-group">
                              <label for="company_name" class="col-form-label">Компанија:</label>
                              <input type="text" class="form-control" name="company_name" id="company_name"
                                  value="{{ old('company_name') }}">
                          </div>
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-warning btn-block">Испрати</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
