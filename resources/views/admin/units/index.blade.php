@extends('adminlte::page')

@section('title', 'Administrador')

@section('content_header')
    <h1>Unidad</h1>
@stop

@section('content')


@if (session('info'))
<div class="alert alert-success">
<strong>{{session('info')}}</strong>
</div>
@endif

<div class="content">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">

    Añadir unidad
   </button>
   <br><br>
   
  <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fs-5" id="exampleModalLabel">Registro de unidad</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.units.store')}}" method="POST">
           @csrf
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Unidad</label>
              <input type="text" name="title" required class="form-control" id="">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Registrar</button>
            </div>

          </form>
        </div>
        
      </div>
    </div>
  </div>

 


    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Unidad</th>
                    <th>Acciones</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($units as $unit)
                    <tr>
                        <td>{{$unit->id}}</td>
                        <td>{{$unit->title}}</td>
                        <td width="15px"> <a data-toggle="modal" data-target="#editModal{{$unit->id}}" class="btn btn-info" ><i class="fas fa-edit"></i></a>
                        </td>
                   
                        <div class="modal fade" id="editModal{{$unit->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title fs-5" id="exampleModalLabel">Editar</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                              </div>
                              <div class="modal-body">
                                <form action="{{url('/admin/units/updateModal')}}" method="POST" >
                                  @csrf
                                 
                                  <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">No.</label>
                                    <input readonly type="text" name="id" class="form-control" id="" aria-describedby="emailHelp" value="{{$unit->id}}">
                                    
                                  </div>
                                  <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Unidad</label>
                                    <input type="text" name="title" required class="form-control" id="" value="{{$unit->title}}">
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                  </div>

                                </form>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                      
                        
                        <td width="15px">
                            <form class="btn-eliminar" action="{{route('admin.units.destroy',$unit)}}" method="POST">
                            
                                @method('delete')
                                @csrf

                                <button type="submit" class="btn btn-danger" ><i class="fas fa-trash-alt"></i></button>
                 


                            </form>

                        </td>
                    </tr>
                @endforeach



                
            </tbody>
        </table>
    </div>
</div>
@endsection



@section('js')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@if(session('eliminar') == 'ok')

<script>

          Swal.fire(
            '¡Eliminado!',
            'El registro se eliminó con éxito',
            'success'
          )

  
</script>

@endif
  <script>

      $('.btn-eliminar').submit(function(e){

        e.preventDefault();

        Swal.fire({
        title: '¿Estas seguro?',
        text: "Este registro se eliminará definitivamente",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Si, eliminar!'
      }).then((result) => {
        if (result.value) {
          
      this.submit();

        }
      })

      });

</script>

@endsection


