<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"> </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!--  para Datatable -->
    <title></title>
     
     <script src="https://cdn.datatables.net/2.0.0/js/dataTables.min.js"> </script>
     <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css">

     <style>
        .form-select{
            width: 200px;
        }

        .select{
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .select{
            align-items: center;
        }
     </style>

     
  </head>
  <body>
    <section>
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Api</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                </div>
            </div>
            </nav>
    </section>

    <form id="searchForm">
    <div class="container-select">
        <div class="select">
        <?php
            require_once ("../frontApi/config.php");
            if ($err) {
	            echo "cURL Error #:" . $err;
            } else {
	            $objeto = json_decode($response);
	            //print_r($objeto);
            ?>
            <select class="form-select" aria-label="Default select example" name="user" require="" width="100px">
                <option selected>Seleccionar</option>
            <?php 
                foreach ($objeto as $reg) {?>
            <option value="<?php echo $reg->id; ?>"><?php echo "Nombre: ", $reg->name; ?></option>
            <?php } ?>
    </select>
    <button class="btn btn-primary" name='search' type="submit">Buscar</button>
<?php
}
?>
    </form>

        </div>
    </div>
    <div class="container">
        <?php
            include("listar.php");
        ?>
    </div>

    <script>
    $(document).ready(function() {
        $('#searchForm').on('submit', function(e) {
            e.preventDefault(); // Evitar que el formulario recargue la página
            $.ajax({
            type: 'POST',
            url: '../frontApi/listar.php', 
            data: $(this).serialize(), // Enviar los datos del formulario
            success: function(data) {
                // Actualizar el contenedor de la tabla con los nuevos datos
                $('.container').html(data);
            }
        });
    });
});
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    -->
  </body>
</html>