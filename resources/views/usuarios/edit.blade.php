editar usuarios

<form action="{{ url('/usuarios/'.$usuario->id )}}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  {{ method_field('PATCH') }}
     <label for="Nombres">{{'Nombres'}}</label>
     <input type="text" name="Nombres" id="Nombres" value="{{ $usuario->Nombres }}">
     <br/>
     <label for="Apellidos">{{'Apellidos'}}</label>
     <input type="text" name="Apellidos" id="Apellidos" value="{{ $usuario->Apellidos }}">
     <br/>
     <label for="Correo">{{'Correo'}}</label>
     <input type="email" name="Correo" id="Correo" value="{{ $usuario->Correo}}">
     <br/>
     <label for="Foto">{{'Foto'}}</label>
     <br/>
     <img src=" {{ asset('storage').'/'.$usuario->Foto}}" alt="" width="80px">
            
     <br/>
     <input type="file" name="Foto" id="Foto" value="">
     <br/>
     <input type="submit" value="Editar"><a href="{{ url('usuarios') }}">Regresar</a>
 </form>