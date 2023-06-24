<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSULTOR DE DNI | RENIEC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="icon" href="dni.ico">
</head>
<body>
    <center>
    <h3>CONSULTA EL DNI</h3>
    <div class="btn-group">
    <input type="text" id="buscador" class="form-control" placeholder="Ingresar numero de dni">
    <button id="buscar" type="button" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
        <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018Z"/>
        <path d="M13 6.5a6.471 6.471 0 0 1-1.258 3.844c.04.03.078.062.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1.007 1.007 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5ZM6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Z"/>
    </svg></button>
    </div>
    <br><br>
    <div  class="row">
        <div class="col-sm-4">
            <label for="">Nombres:</label>
            <input type="text" id="nombres" class="form-control" disabled>
        </div>
        <div class="col-sm-4">
            <label for="">Apellido paterno:</label>
            <input type="text" id="apellidop" class="form-control" disabled>
        </div>
        <div class="col-sm-4">
            <label for="">Apellido materno:</label>
            <input type="text" id="apellidom" class="form-control" disabled>
        </div>

    </center>
</body>
<script>
    $('#buscar').click(function() {
        dni=$('#buscador').val();
        $.ajax({
            url: 'Controller/consultarDNI.php',
            type: 'post',
            data: 'dni='+dni,
            dataType: 'json',
            success: function(r) {
                if(r.numeroDocumento == dni) 
                {
                    $('#nombres').val(r.nombres);
                    $('#apellidop').val(r.apellidoPaterno);
                    $('#apellidom').val(r.apellidoMaterno);
                    alert('Su consulta se ha realizado con exito.');
                }
                else
                {
                    alert('El error se debe a que el Dni no existe, no puso la cantidad de digitos indicada (8 digitos) o introdujo letras.');
                }
            }
        });
    });

</script>
</html>