<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="3" aria-label="Slide 4"></button>
      
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="2000">
        <img src="{{asset('images/a.jpg')}}" class="d-block w-100" style="height:300px">
        <div class="carousel-caption d-none d-md-block">  image1 </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="{{asset('images/b.jpg')}}" class="d-block w-100" style="height:300px">
        <div class="carousel-caption d-none d-md-block">  image2 </div>
          </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="{{asset('images/c.jpeg')}}" class="d-block w-100" style="height:300px">
        <div class="carousel-caption d-none d-md-block">  image3 </div>

     </div>
     <div class="carousel-item" data-bs-interval="2000">
        <img src="{{asset('images/d.jpg')}}" class="d-block w-100" style="height:300px">
        <div class="carousel-caption d-none d-md-block">  image4 </div>

     </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>