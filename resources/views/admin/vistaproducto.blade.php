@extends('layouts.main')
@section('main-content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">
            {{-- aca va todo el contenido de la pagina --}}
            <h1>Productos</h1>
            <hr>

            {{-- Formulario de selección de categoría --}}
            {{-- Formulario de selección de categoría --}}
            <form id="categoryFilterForm">
                <div class="mb-3">
                    <label for="categorySelect" class="form-label">Filtrar por Categoría:</label>
                    <select class="form-select" id="categorySelect" name="category_id">
                        <option value="">Todas las Categorías</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="button" class="btn btn-info" onclick="applyCategoryFilter()">Aplicar Filtro</button>
            </form>

            <br>

            {{-- Tabla de productos --}}
            <table id="tabla-productos" class="table table-bordered datatable-table">
                <thead>
                    <tr>
                        <th style="visibility:collapse; display:none;" scope="col">id</th>
                        <th scope="col">Codigo de Barra</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr data-category="{{ $product->category_id }}">
                            <td style="visibility:collapse; display:none;" scope="row">{{ $product->category_id }}</td>
                            <td>{{ $product->barcode }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->stocks . ' unidades' }}</td>
                            <td>{{ '$ ' . $product->price }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>
                                <form action="{{ route('products.delete', ['id' => $product->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>


    {{-- scripts de plugins para DataTable --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>

    {{-- script configuracion de Datatable --}}
    <script>
        $(document).ready(function() {
            var dataTable = $('#tabla-productos').DataTable({
                language: {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                },
                pageLength: 10,
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        text: 'Exportar a Excel',
                        className: 'btn btn-success btn-sm',
                        exportOptions: {
                            columns: ':visible:not(:last-child)'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        text: 'Exportar a PDF',
                        className: 'btn btn-danger btn-sm',
                        exportOptions: {
                            columns: ':visible:not(:last-child)'
                        }
                    }
                ],
                // Configuración para centrar los campos
                columnDefs: [{
                    targets: [0, 1, 2, 3, 4, 5,
                        6
                    ], // Índices de las columnas a centrar (ajusta según tu estructura)
                    className: 'text-center'
                }]
            });

            // Función para aplicar el filtro por categoría
            window.applyCategoryFilter = function() {
                var categoryId = $('#categorySelect').val();
                dataTable.columns(0).search(categoryId).draw();
            };
        });
    </script>
@endsection
