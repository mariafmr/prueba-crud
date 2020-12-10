seccion para crear usuarios

<form action="{{url('/usuarios')}}" method="post" enctype="multipart/form-data">
   {{ csrf_field()}}
    <label for="Nombres">{{'Nombres'}}</label>
    <input type="text" name="Nombres" id="Nombres" value="">
    <br/>
    <label for="Apellidos">{{'Apellidos'}}</label>
    <input type="text" name="Apellidos" id="Apellidos" value="">
    <br/>
    <label for="Correo">{{'Correo'}}</label>
    <input type="email" name="Correo" id="Correo" value="">
    <br/>
    <label for="Foto">{{'Foto'}}</label>
    <input type="file" name="Foto" id="Foto" value="">
    <br/>
    <input type="submit" value="Agregar"><a href="{{ url('usuarios') }}">Regresar</a>
</form>