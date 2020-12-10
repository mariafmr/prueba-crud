inicio (LISTA DE LOS USUARIOS)

@if(Session::has('Mensaje')){{
        Session::get('Mensaje')
}}
    
@endif
<a href="{{ url('usuarios/create') }}">Crear usuarios</a>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>NOMBRES</th>
            <th>APELLIDOS</th>
            <th>CORREO</th>
            <th>FOTO</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($usuarios as $usuario)
        <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$usuario->Nombres}}</td>
        <td>{{$usuario->Apellidos}}</td>
        <td>{{$usuario->Correo}}</td>
        <td>
            <img src=" {{ asset('storage').'/'.$usuario->Foto}}" alt="" width="80px">
            
           </td>
        <td>
        <a href="{{ url('/usuarios/'.$usuario->id.'/edit')}}">Editar</a>
          
        <form method="post" action="{{ url('/usuarios/'.$usuario->id) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
        <button type="submit" onclick="return confirm('borrar usuarios');">Eliminar</button>
        </form>
            
        </td>
        </tr>
    @endforeach
        <tr>
            <td></td>
        </tr>
    </tbody>
</table>