@extends('layouts.main')
@section('main-content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

        <section id="boton">
            <br>
            <div class="registroventa-container">
                <h1 class="my-4">REGISTRO VENTA</h1>
                <hr>
                <br>
            </div>
        </section>
<hr>
        <div class="container">
                <div class="row">
                    <div class="col-sm p-1 text-center border">
                        <form method="post">
                            @csrf
                            <label for="barcode"><b>Buscar por Codigo de Barra:</b></label>
                            <input type="text" name="barcode" id="barcode" placeholder="Ingrese Codigo">
                            <button class="btn btn-success" type="button" onclick="agregarProducto()">Buscar</button>
                            <div id="errores" class="alert alert-danger" style="display: none;"></div>
                        </form>
                        <br>
                <table class="table table-bordered hidden" id="tablaProductos" style="display: none">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Codigo de Barra</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
                    <div class="col-sm border-1 ">
                        <h1>Costo de la Venta</h1>
                            <hr>
                            <br>
                        <h2 id="deudatotal">Total:</h2>
                            <br>
                            <br>
                    </div>
            </div>    
    </div>

@push('js')
    
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script >
        var totalPrecio = 0;
    function agregarProducto() {
        var barcode = $("#barcode").val();

        // Realizar una petición AJAX para obtener la información del producto
        $.ajax({
            type: "POST",
            url: "{{ route('buscarProducto') }}",
            data: { _token: "{{ csrf_token() }}", barcode: barcode },
            success: function(data) {
                $("#tablaProductos").show();
                $("#barcode").val("");
                // Agregar el producto a la tabla
                if (data) {
                    $("#tablaProductos tbody").append("<tr><td>" + data.barcode + "</td><td>" + data.name + "</td><td>" + data.price + "</td></td><td><button class='btn btn-danger' onclick='eliminarProducto(this)'>Eliminar</button></td></tr>");
                    $("#errores").text("").hide();

                            totalPrecio += parseFloat(data.price);
                            $("#deudatotal").text("Total: $" + totalPrecio);
                } else {
                    mostrarError("Producto no encontrado");
                }
            },
            error: function() {
                mostrarError("Producto no encontrado");
            }
        });
    }

    function eliminarProducto(button) {
        var row = $(button).closest("tr");

        var precioEliminado = parseFloat(row.find("td:eq(2)").text());

        totalPrecio -= precioEliminado;


        $("#deudatotal").text("Total: $" + totalPrecio);
        row.remove();

        if ($("#tablaProductos tbody tr").length === 0) {
            $("#tablaProductos").hide();
        }
    }

    function mostrarError(mensaje) {
        // Mostrar el div de errores y establecer el mensaje
        $("#errores").text(mensaje).show();
    }
</script>
@endpush

    </main>

@endsection


