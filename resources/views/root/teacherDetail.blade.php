@section('title')
    {{ 'Teachers' }}
@endsection
@extends('.root.layout')
@section('content')

    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
      <div class="container py-5">
          <div class="row justify-content-center">
              <div class="col-lg-10 text-center">
                  <h1 class="display-3 text-white animated slideInDown">Teachers</h1>
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb justify-content-center">
                          <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                          <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                          <li class="breadcrumb-item text-white active" aria-current="page">Teacher</li>
                      </ol>
                  </nav>
              </div>
          </div>
      </div>
  </div>
  <!-- Header End -->


  <!-- Categories Start -->
  <div class="container-xxl py-5 category">
      <div class="container">
          <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
              <h6 class="section-title bg-white text-center text-primary px-3">Biodata</h6>
              <h1 class="mb-5">Instruktur {{ $teacher->name }}</h1>
          </div>
          <div class="row g-3">
              <div class="col-lg-6 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 250px;">

                <img src="{{ asset('img/'.$teacher->img) }}" class="img-thumbnail" alt="" style="width: 60%;height:auto">
                  {{-- <div class="row g-3">
                      <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                          <a class="position-relative d-block overflow-hidden" href="">
                              <img class="img-fluid" src="img/cat-1.jpg" alt="">
                              <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                  <h5 class="m-0">Web Design</h5>
                                  <small class="text-primary">49 Courses</small>
                              </div>
                          </a>
                      </div>
                  </div> --}}
              </div>
              <div class="col-lg-6 col-md-6 wow zoomIn p-2" data-wow-delay="0.7s" style="min-height: 350px; position: relative;">
                <h5 class="m-0 fs-3">{{ $teacher->name }}</h5>
                <small class="text-primary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum ex error optio architecto voluptates nam quam neque aliquid nostrum quibusdam cupiditate non, nobis distinctio, temporibus nulla repellendus ab nihil velit inventore quod magnam, debitis eum tempora. Temporibus ut beatae id veritatis magnam, fuga voluptas aspernatur commodi porro! Sapiente ut molestiae officiis explicabo recusandae voluptatibus quasi, esse facilis at, enim possimus animi porro id numquam odio! Error ipsum soluta provident eum accusantium labore ducimus laudantium corrupti consequuntur quibusdam. Itaque mollitia ex quam repellat dolorum sed ipsum provident, eius cumque eum earum, porro hic ratione quae. Quos esse quis adipisci animi dolore!</small>
                
                <div class="text-center position-absolute bottom-0 start-0 py-2 px-3" style="margin: 1px;">
                    <a href="/biaya" class="btn btn-primary">Daftar Sekarang</a>
                </div>
            </div>
            
          </div>
      </div>
  </div>
  <!-- Categories Start -->

      
@endsection