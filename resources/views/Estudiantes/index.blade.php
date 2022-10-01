<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CRUD Estudiantes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <style>
        body{
    min-height: 100vh;
    margin: 0;
    display: flex;
    flex-direction: column;
    }

.footer{
    margin-top: auto;
    display: table;
    width: 100%;
    height: 13vh;
    text-align: center;
    }

    </style>
<header>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark text-white>
    <div class="container-fluid">
      <a class="navbar-brand" href="/">&nbsp;&nbsp;RV</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="https://github.com/GhostManV/CRUD_LARAVEL.git"><i class="bi bi-github"></i>&nbsp;Codigo Github</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  </header>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Laravel CRUD Estudiantes</h2>
                    <!-- The Modal -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Datos del Estudiante</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="" method="Post" id="formulario" name="formulario" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3 mt-3">
                                            <label for="text" class="form-label">Id:</label>
                                            <input type="text" class="form-control" id="txt_id" name="id" placeholder="0" readonly />
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="text" class="form-label">Carne:</label>
                                            <input type="text" class="form-control" id="txt_carne" name="carne" placeholder="E001" onchange="carnetValidation(this);" required />
                                            @error('carne')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="text" class="form-label">Nombres:</label>
                                            <input type="text" class="form-control" id="txt_nombres" name="nombres" placeholder="Ingrese Nombres" required />
                                            @error('nombres')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="text" class="form-label">Apellidos:</label>
                                            <input type="text" class="form-control" id="txt_apellidos" name="apellidos" placeholder="Ingrese Apellidos" required />
                                            @error('apellidos')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="text" class="form-label">Direccion:</label>
                                            <input type="text" class="form-control" id="txt_direccion" name="direccion" placeholder="Ingrese Direccion" required />
                                            @error('direccion')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="text" class="form-label">Telefono:</label>
                                            <input type="text" class="form-control" id="txt_telefono" name="telefono" placeholder="Ingrese Telefono" required />
                                            @error('telefono')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="text" class="form-label">Email:</label>
                                            <input type="text" class="form-control" id="txt_email" name="correo_electronico" placeholder="Ingrese Email" required />
                                            @error('correo_electronico')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="text" class="form-label">Tipo de Sangre:</label>
                                            <select name="id_tipo_sangre" id="txt_tipo_sangre" class="form-select" required />
                                            <option selected>Seleccione el tipo de sangre</option>
                                            @foreach ($Sangre as $blood)
                                            <option value="{{ $blood->id }}">{{ $blood->sangre }}</option>
                                            @endforeach

                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="text" class="form-label">Fecha Nacimiento:</label><br>
                                            <input type="date" class="form-control" id="txt_fecha_nacimiento" name="fecha_nacimiento" placeholder="Ingrese Fecha Nacimiento Formato (YYYY-MM-DD)" required />
                                            @error('fecha_nacimiento')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <button type="submit" class="btn btn-success" id="btn_agregar" name="btn_agregar" value="agregar">Agregar</button>

                                        <button type="submit" class="btn btn-danger" id="btn_eliminar" name="btn_eliminar" onclick="javascript:if(!confirm('Desea Eliminar Este Estudiante?')) return false" value="borrar">Eliminar</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="pull-right mb-2">
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="container mt-3">

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal" onclick="limpiarForm();" data-bs-placement="right" title="Agregar Estudiante Nuevo" id="nuevo">
                Nuevo Estudiante
            </button>
            <br>
            <br>
            <table class="table table-dark table-hover pb-5 text-center">
                <thead>
                    <tr>
                        <th>carne</th>
                        <th>nombres</th>
                        <th>apellidos</th>
                        <th>direccion</th>
                        <th>telefono</th>
                        <th>correo_electronico</th>
                        <th>Tipo Sangre</th>
                        <th>fecha_nacimiento</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody id="tbl_estudiantes" style="cursor: pointer;">
                    @foreach ($estudiantes as $student)
                    @include('estudiantes.ModalEditar');
                    <tr data-id_estudiante="{{ $student->id }}" data-id_tipo_sangre="{{ $student->id_tipo_sangre }}">
                        <td>{{ $student->carne }}</td>
                        <td>{{ $student->nombres }}</td>
                        <td>{{ $student->apellidos }}</td>
                        <td>{{ $student->direccion }}</td>
                        <td>{{ $student->telefono }}</td>
                        <td>{{ $student->correo_electronico }}</td>
                        <td>{{ $student->sangre }}</td>
                        <td>{{ $student->fecha_nacimiento }}</td>
                        <td style="text-align: center;display:flex;">

                            <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#editStudent{{ $student->id }}">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#quitarStudent{{ $student->id }}">
                            <i class="bi bi-trash3-fill"></i>
                            </button>


                        </td>
                    </tr>
                    <!--Ventana Modal para Actualizar--->
                    @include('estudiantes.ModalEliminar');

                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
        <div class="mt-5 p-4 bg-dark text-white text-center footer">
<p>CRUD de la tabla Estudiantes realizado con Node.js </p>
<p>© Copyright 2022 R.V.Enterprises</p>
</div>
        <script>
            function carnetValidation(textbox) {
                const pattern = /(^E{1})([0-9]{3})$/;
                if (textbox.value === "") {
                    textbox.setCustomValidity('Ingrese el Carnet');
                } else if (!pattern.test(textbox.value)) {
                    textbox.setCustomValidity('Ingrese un carnet Valido: E001-E999');
                } else {
                    textbox.setCustomValidity('');
                }
                return true;
            }

            function limpiarForm() {
                $('#txt_id').val(0);
                $("#txt_carne").val("");
                $("#txt_nombres").val("");
                $("#txt_apellidos").val("");
                $("#txt_direccion").val("");
                $("#txt_telefono").val("");
                $("#txt_email").val("");
                $("#txt_tipo_sangre").val("Seleccione el tipo de sangre");
                $("#txt_fecha_nacimiento").val("");
                $("#btn_agregar").show();
                $("#btn_modificar").hide();
                $("#btn_eliminar").hide();
            }
        </script>
        <script>
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        </script>

        <script>
            const nuevo = document.getElementById('nuevo');
            nuevo.addEventListener('click', () => {
                document.getElementById('formulario').setAttribute('action', "{{ route('Estudiantes.store') }}");
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
