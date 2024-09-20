@extends('website.masterLayouts')
@section('content')
<div style="height: 113px;"></div>

    <div>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-1"></div>
          <div class="col-10" data-aos="fade">
              <div class="ftco-search" dir="rtl">
                <div class="row">
                  <center>
                  <div class="col-md-12 nav-link-wrap" >
                    <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                      <br></br>
                    </div>
                  </div>
                </center>
                  <div class="col-md-12 tab-wrap">

                    <div class="tab-content p-4" id="v-pills-tabContent" style="height: 400px; border: 2px solid orange">
                      <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
                        <form method="POST" action="{{ route('searchOrder') }}" class="search-job">
                          {{ csrf_field() }}
                          <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                              <div class="form-group">
                                <div class="form-field">
                                  <center><h5>لطفا کد پیگیری پست تان را در زیر وارد کنید.</h5><center> <br></br>
                                  <input type="text" name="q" class="form-control" placeholder="XXXXXXXXXXXXX لطفا کد پیگیری پست تان را در زیر وارد کنید." style="height: 50px">
                                </div>
                              </div>
                            </div>
                          </div>
                          <br></br>
                          <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <div class="form-field">
                                  <button type="submit" name="submit" class="btn btn-warning btn-block waves-effect waves-light" style="height: 50px">
                                      جستجوی وضعیت سفارش
                                      &nbsp &nbsp<i class="icon-search float-xs-right"></i>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2 class="mb-5">خدمات ما</h2>
          </div>
        </div>
        <div class="row" dir="rtl">
          @foreach($services as $service)
          <div class="col-sm-6 col-md-4 col-lg-3 mb-3" data-aos="fade-up" data-aos-delay="100">
            <a href="#" class="h-100 feature-item">
              <span class="d-block icon  mb-3 text-primary"><img src="/uploadedImages/services/{{$service->photo}}" alt="" style="height: 100px"/></span>
              <h2>{{$service->title}}</h2>
              <span class="counting">جزئیات</span>
            </a>
          </div>
        @endforeach
        </div>
      </div>
    </div>



    <div class="site-blocks-cover overlay inner-page" style="background-image: url('/website/images/IMG-20210727-WA0005.jpg');" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6 text-center" data-aos="fade">
            <h1 class="h3 mb-0">خوش آمدید</h1>
            <p class="h3 text-white mb-5">ما را از نظرات نیک تان آگاه سازید</p>
            <p><a href="{{route('about')}}" class="btn btn-outline-warning py-3 px-4">درباره ما</a> <a href="{{route('contactUs')}}" class="btn btn-warning py-3 px-4">تماس باما</a></p>
          </div>
        </div>
      </div>
    </div>





    <div class="site-section block-15">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2>همکاران / شکارای ما</h2>
          </div>
        </div>


        <div class="nonloop-block-15 owl-carousel">
          @foreach($companies as $company)
            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                <a href="#" class="image-play">
                  <img src="/uploadedImages/companies/{{$company->image}}" alt="" class="img-fluid" style="height: 250px">
                </a>
              </div>
              <center>
              <h2 class="heading mb-0 h5"><a href="#">{{$company->companyName}}</a></h2>
              <span class="mb-3 d-block post-date"><a href="#">{{$company->activity}}</a></span>
            </center>
            </div>
          @endforeach
        </div>
        <div class="row">
        </div>
      </div>
    </div>
@endsection
