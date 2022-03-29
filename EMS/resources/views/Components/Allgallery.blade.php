
      <section id="gallery" class="gallery section">
      <div class="row no-gutter">
        @foreach ($GallaryPage as $GallaryPage)
        <div class="col-lg-3 col-md-6 col-sm-6 work"> <a href="{{$GallaryPage->gallery_photo_location}}" class="work-box"> <img src="{{$GallaryPage->gallery_photo_location}}" alt="">

          <div class="overlay">
            <div class="overlay-caption">
              <p><span class="icon icon-magnifying-glass"></span></p>
            </div>
          </div>
          <!-- overlay -->
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </section>
