<div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp">Featured Pets</h1>
      
      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
         
        @foreach ($product as $products )  
        
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="{{ ('productimage/'.$products->image ) }}" alt="">
              <div class="meta">
                <a href="#"><span class="mai-call"></span></a>
                <a href="#"><span class="mai-logo-whatsapp"></span></a>
              </div>
            </div>
            <div class="card">
              <h2>{{ $products->name }}</h2>
              <span class="float-start">selling price:{{ $products->selling_price }}</span>
              <span class="float-end">original price:<s>{{ $products->original_price }}</s></span>
            </div>
          </div>
        </div>
      
        
        @endforeach
      </div>
    </div>
     
  </div>
 </div>
 <div class="page-section">
  <div class="container">
    <h1 class="text-center mb-5 wow fadeInUp">Trending Pets</h1>
    
    <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
       
      @foreach ($trending as $trend )
        
      <div class="item">
        
        <a href="{{ url('view_category/'.$trend->slug) }}">
        <div class="card-doctor">
          <div class="header">
            <img height="{{ asset('categoryimage/'.$trend->image) }}"alt="">
            <div class="meta">
              <a href="#"><span class="mai-call"></span></a>
              <a href="#"><span class="mai-logo-whatsapp"></span></a>
            </div>
          </div>
          <div class="card">
            <h2>{{ $trend->name }}</h2>
          
          </div>
        </div>
      </a>
   
      </div>
      @endforeach
      
    
    </div>
  </div>
   
</div>
</div>

 