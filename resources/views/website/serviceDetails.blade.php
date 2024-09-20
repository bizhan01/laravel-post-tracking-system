@extends('website.masterLayouts')
@section('content')
<div style="height: 113px;"></div>
<div class="unit-5 overlay" style="background-image: url('/website/images/hero_2.jpg');" style="height: 400px">
    <div class="container text-center">
      <h2 class="mb-0">خدمات ما</h2>
      <p class="mb-0 unit-6"><a href="index.html">خانه</a> <span class="sep">></span> <span>خدمات ما</span></p>
    </div>
  </div>


  <div class="site-section" dir="rtl">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center mb-5 section-heading">
          <h2 class="mb-5">جزئیات خدمات</h2>
        </div>
      </div>
      <center>
        <div class="col-sm-6 col-md-4 col-lg-5 mb-3" data-aos="fade-up" data-aos-delay="100">
          <a href="" class="h-100 feature-item">
            <span class="d-block icon  mb-3 text-primary"><img src="../uploadedImages/services/<?php echo $service[0]->photo; ?>" alt="" style="height: 100px"/></span>
            <h2><?php echo $service[0]->title; ?></h2>
            <span class="counting"><?php echo $service[0]->description;?></span>
          </a>
        </div>
      </center>
    </div>
  </div>
@endsection
