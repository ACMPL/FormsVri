<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registrar Docente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <main>
                <div class="container py-1">
                    @if ($errors->any())
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    
                    <form action="{{url('docentes')}}" method="post" enctype="multipart/form-data">
                        
                        @csrf
                        <div class="mb-2 row">
                            <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="nombre" id="nombre" value="{{old('nombre')}}" required>
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label for="apellido" class="col-sm-2 col-form-label">Apellido:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="apellido" id="apellido" value="{{old('apellido')}}" required>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <a href="{{url('docentes')}}" class="btn btn-secondary">Regresar</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
      </div>
    </div>
  </div>
  