<section id="gallery" class="gallery section" style="margin-bottom: -20px; margin-top: -20px;">
    <div class="container-fluid" style="border: 1px solid;margin-top: 20px;">
      <div class="section-header">
        <h2 class="fadeInDown animated">Gallery</h2>
      </div>
      <div class="row no-gutter">

        @foreach ($HomeGallaryData as $HomeGallaryData)
        <div class="col-lg-3 col-md-6 col-sm-6 work"> <a href="{{$HomeGallaryData->gallery_photo_location}}" class="work-box"> <img src="{{$HomeGallaryData->gallery_photo_location}}" alt="">
          <div class="overlay">
            <div class="overlay-caption">
              <p><span class="icon icon-magnifying-glass"></span></p>
            </div>
          </div>
          </a>
        </div>
        @endforeach
      </div>
      <div id="loadMore" style="">
        <a href="{{'/gallery'}}">Load More</a>
      </div>
    </div>
    </div>
</section>
