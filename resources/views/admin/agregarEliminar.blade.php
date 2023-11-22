@extends('layouts.main')
@section('main-content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="container">

            <!-- ... Tu contenido actual ... -->

            <h1 class="my-4">AGREGAR</h1>
            <hr />

            @if ($errors->any())
                <div class="alert alert-danger my-4" role="alert">
                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                </div>
            @endif

            {{-- creacion de categorias --}}
            <section class="section-separator">
                <h5>Crear nueva categoria</h5>
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="input-group mb-1">
                        <input name="name" type="text" class="form-control" placeholder="Ingrese Categoria"
                            aria-label="Ingrese Categoria">
                        <button class="btn btn-info" type="submit">Crear Categoría</button>
                    </div>
                </form>
            </section>
            <hr />

            <section class="section-separator">
                <h5>Agregar un Nuevo Producto</h5>
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    <span>Categorias</span>

                    <select class="form-select" name="category_id">
                        <option hidden selected>Selecciona una opción</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <div class="input-group mt-2">
                        <span class="input-group-text">Codigo de barra</span>
                        <input type="number" class="form-control" name="barcode">
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text">Nombre</span>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="input-group mt-2">
                        <span class="input-group-text">Cantidad</span>
                        <input type="number" class="form-control" name="stocks">
                    </div>

                    <div class="input-group mt-2">
                        <span class="input-group-text">Precio</span>
                        <input type="number" class="form-control" name="price">
                    </div>
                    <input type="submit" value="Agregar Producto" class="btn btn-primary mt-4">
                </form>
            </section>
        </div>
    @endsection


    </div>
</main>





@push('css')
    <style>
        .section-separator {
            margin-top: 80px;
        }
    </style>
@endpush
