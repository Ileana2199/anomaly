@extends('adminlte::page')

@section('title', 'Administrador')

@section('content_header')
    <h1>Equipo</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success">
<strong>{{session('info')}}</strong>
</div>
@endif

<div class="content">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
        Añadir equipo
    </button>
<br><br>
<div class="modal fade" id="createModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fs-5" id="exampleModalLabel">Registro de Equipo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.equipments.store')}}" method="POST">
           @csrf

           <div class="mb-3">
            <label for="exampleInputEmail1"  class="form-label">Unidad</label>
            <select  class="form-control select2" name="unit_id" id="unit_id">
              @foreach ($units as $unit)
              <option value="{{$unit->id}}">{{$unit->title}}</option>
              @endforeach
            </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1"  class="form-label">Area</label>
                <select  class="form-control select2" name="area_id" id="area_id">
                  @foreach ($areas as $area)
                  <option value="{{$area->id}}">{{$area->title}}</option>
                  @endforeach
                </select>
              </div>
             

              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Equipo</label>
                <input type="text" name="title" required class="form-control" id="exampleInputPassword1">
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
                <th>Equipo</th>
                <th>Area</th>
                <th>Acciones</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>



            @foreach ($equipments as $equipment)
                <tr>
                    <td>{{$equipment->id}}</td>
                    <td>{{$equipment->title}}</td>
                    <td>{{$equipment->area->title}}</td>
                    <td width="15px"> <a data-toggle="modal" data-target="#editModal{{$equipment->id}}" class="btn btn-info" ><i class="fas fa-edit"></i></a>
                    </td>
               
                    <div class="modal fade" id="editModal{{$equipment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title fs-5" id="exampleModalLabel">Editar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                          </div>
                          <div class="modal-body">
                            <form action="{{url('/admin/equipments/updateModal')}}" method="POST" >
                              @csrf

                              <div class="mb-3">
                                <label for="" class="form-label">No.</label>
                                <input readonly type="text" name="id" class="form-control" id="" aria-describedby="emailHelp" value="{{$equipment->id}}">
                              </div>
                              

                             {{-- <div class="mb-3">
                                <label for="" class="form-label">Unidad</label>
                                <input type="text" name="unit_id" required class="form-control" id="" value="{{$equipment->unit->title}}">
                              </div> --}}
                              
                              <div class="mb-3">
                                <label for="" class="form-label">Area</label>
                                <input type="text" name="area_id" readonly class="form-control" id="" value="{{$equipment->area->title}}">
                              </div> 
                              
                              
                              <div class="mb-3">
                                <label for="" class="form-label">Equipo</label>
                                <input type="text" name="title" required class="form-control" id="" value="{{$equipment->title}}">
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
                        <form class="btn-eliminar" action="{{route('admin.equipments.destroy',$equipment)}}" method="POST">
                        
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

