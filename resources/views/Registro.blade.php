<!DOCTYPE html>
<html>
<head>
    <title>Registrar Comic</title>
</head>
<body>

<h2>Registrar Comic</h2>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('computer') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="titulo">Título:</label><br>
    <input type="text" id="titulo" name="titulo" required><br><br>

    <label for="autor">Autor:</label><br>
    <input type="text" id="autor" name="autor"><br><br>

    <label for="sinopsis">Sinopsis:</label><br>
    <textarea id="sinopsis" name="sinopsis"></textarea><br><br>

    <label for="anio_publicacion">Año de Publicación:</label><br>
    <input type="text" id="anio_publicacion" name="anio_publicacion" required><br><br>
    <!-- Puedes cambiar el tipo de entrada a "number" si deseas que el campo solo acepte números -->

    <label for="portada">Portada:</label><br>
    <input type="file" id="portada" name="portada" accept="image/*" required><br><br>

    <label for="codigosCategoria">Categorías:</label><br>
    <select id="codigosCategoria" name="codigosCategoria[]" multiple required>
        <option value="1">Terror</option>
        <option value="2">Acción</option>
        <option value="3">Ciencia Ficción</option>
        <option value="4">Romance</option>
    </select><br><br>

    <button type="submit">Registrar Comic</button>
</form>

</body>
</html>
