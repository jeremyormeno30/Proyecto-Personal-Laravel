@extends('layouts.main')
@section('main-content')


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="container">
        {{-- aca va todo el contenido de la pagina --}}
<h1>INICIO</h1>
<hr>
<div class="owl-carousel owl-theme">
    <div class="item"><img src="{{ asset('img/1.png')}}" alt="Imagen 1"></div>
    <div class="item"><img src="{{ asset('img/2.webp')}}" alt="Imagen 2"></div>
    <div class="item"><img src="{{ asset('img/3.jpg')}}" alt="Imagen 3"></div>
    <!-- Agrega más elementos según sea necesario -->
</div>
    </div>

    <!-- Secciones de Misión, Visión y Valores -->
<div class="container mt-5">
    <div class="row">
      <!-- Misión -->
      <div class="col-md-4 border border-black" id="mision">
        <h2>Misión</h2>
        <p class="justificado lead">
            es una empresa joven que se ha comprometido con cada uno de sus clientes
             en brindarles el mejor servicio posible para atender sus necesidades administrativas, 
             este compromiso se traduce día a día en el trabajo y esfuerzo de una empresa que Evoluciona y se 
             mantiene a la Vanguardia permitiéndonos permanecer en la preferencia de nuestros clientes.
        </p>
      </div>
      <!-- Visión -->
      <div class="col-md-4  border border-black" id="vision">
        <h2>Visión</h2>
        <p class="justificado lead">
            nos hemos esforzado a un nivel superior para poder ofrecer a todos nuestros usuarios 
            y clientes los mejores sistemas informáticos  con las herramientas necesarias para facilitar 
            la administración diaria de su empresa.
        </p>
      </div>
      <!-- Valores -->
      <div class="col-md-4  border border-black" id="valores">
        <h2>Valores</h2>
        <p class="justificado lead">
            Desde sus inicios nuestra empresa se ha caracterizado por 
            ofrecer a sus clientes una relación basada en valores profesionales, 
            los cuales nos han hecho acreedores de la confianza de nuestros clientes.  
        </p>
      </div>
    </div>
  </div>

</main>

<!-- jQuery (asegúrate de incluirlo antes de Owl Carousel) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: true,
            autoplayTimeout: 2000, // Duración entre slides (2 segundos)
            autoplaySpeed: 500, // Velocidad de transición (0.5 segundos)
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    });
</script>

@endsection