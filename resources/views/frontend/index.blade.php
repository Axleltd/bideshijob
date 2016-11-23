@extends('layouts.app')

@section('title')
Homepage
@stop

@section('content')

<div class="page-wrap">
  <section class="banner">
    <div class="bg-div">
      <div class="particle-div"></div>
    </div>
    <div class="content-div">
      <div class="search-box wow fadeIn">
        <form action="">
          <input type="text" class="title" placeholder="Job / Training">
          <input type="text" class="location" placeholder="country">
          <button class="search-btn"><i class="fa fa-search"></i></button>
        </form>
      </div>

      <div class="subscribe-box">
        <h3 class="wow fadeIn">subscribe with us</h3>
        <form action="" class="wow fadeIn">
          <input type="text" placeholder="Full Name">
          <input type="text" placeholder="email">
          <input type="text" placeholder="Contact number">
          <div class="file-field input-field">
            <div class="btn">
              <span>Upload CV</span>
              <input type="file">
            </div>
          </div>
          <button class="btn">Subscribe</button>
        </form>
      </div>
    </div>
  </section>

  <section class="jobs row">
    <div class="wrap">
      <div class="section-title">
        <h3 class="wow fadeIn">Featured Jobs</h3>
      </div>
    </div>
    <div class="section-content">
      <ul class="lists">
        <li class="wow fadeInUp">
          <div class="wrap row">
            <div class="img-wrap">
              <img src="" alt="">
            </div>
            <div class="text-wrap">
              <h5>Jobs Title</h5>
              <div class="row">
                <div class="s6 m4 col"><i class="fa fa-globe"></i>Country</div>
                <div class="s6 m4 col"><i class="fa fa-globe"></i>Salary</div>
                <div class="s6 m4 col"><i class="fa fa-globe"></i>Requirement</div>
                <div class="s6 m4 col"><i class="fa fa-globe"></i>Facilities</div>
                <div class="s6 m4 col"><i class="fa fa-globe"></i>Cost</div>
                <div class="s6 m4 col"><i class="fa fa-globe"></i>Duty Hours</div>
              </div>
              <div class="row">
                <p class="social">
                  Share on <a href="#"><i class="ti-facebook"></i></a> <a href="#"><i class="ti-twitter"></i></a> <a href="#"><i class="ti-googleplus"></i></a>
                </p>
              </div>
            </div>
            <div class="btn-wrap">
              <button class="btn weaves-effect">Apply Now</button><br>
              <a href="#">More info</a>
            </div>
          </div>
        </li>
        <li class="wow fadeInUp">
          <div class="wrap row">
            <div class="img-wrap">
              <img src="" alt="">
            </div>
            <div class="text-wrap">
              <h5>Jobs Title</h5>
              <div class="row">
                <div class="s6 m4 col"><i class="fa fa-globe"></i>Country</div>
                <div class="s6 m4 col"><i class="fa fa-globe"></i>Salary</div>
                <div class="s6 m4 col"><i class="fa fa-globe"></i>Requirement</div>
                <div class="s6 m4 col"><i class="fa fa-globe"></i>Facilities</div>
                <div class="s6 m4 col"><i class="fa fa-globe"></i>Cost</div>
                <div class="s6 m4 col"><i class="fa fa-globe"></i>Duty Hours</div>
              </div>
              <div class="row">
                <p class="social">
                  Share on <a href="#"><i class="ti-facebook"></i></a> <a href="#"><i class="ti-twitter"></i></a> <a href="#"><i class="ti-googleplus"></i></a>
                </p>
              </div>
            </div>
            <div class="btn-wrap">
              <button class="btn weaves-effect">Apply Now</button><br>
              <a href="#">More info</a>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </section>

  <section class="row training">
    <div class="wrap">
      <div class="section-title">
        <h3 class="wow fadeIn">Recent Trainings</h3>
      </div>
      <div class="section-content">
        <ul class="lists row">
          <li class="s12 m6 l4 col wow fadeInUp">
            <div class="wrap">
              <div class="img-wrap">
                <img src="#" alt="">
              </div>
              <div class="text-wrap">
                <h5>Training Title</h5>
                <p><i class="fa fa-globe"></i>Location</p>
                <p><i class="fa fa-time"></i>Duration</p>
                <p>Lorem ipsum dolor sit.</p>
                <a href="#" class="right">More info</a>
              </div>
            </div>
          </li>
          <li class="s12 m6 l4 col wow fadeInUp" data-wow-delay="0.2s">
            <div class="wrap">
              <div class="img-wrap">
                <img src="#" alt="">
              </div>
              <div class="text-wrap">
                <h5>Training Title</h5>
                <p><i class="fa fa-globe"></i>Location</p>
                <p><i class="fa fa-time"></i>Duration</p>
                <p>Lorem ipsum dolor sit.</p>
                <a href="#" class="right">More info</a>
              </div>
            </div>
          </li>
          <li class="s12 m6 l4 col wow fadeInUp" data-wow-delay="0.4s">
            <div class="wrap">
              <div class="img-wrap">
                <img src="#" alt="">
              </div>
              <div class="text-wrap">
                <h5>Training Title</h5>
                <p><i class="fa fa-globe"></i>Location</p>
                <p><i class="fa fa-time"></i>Duration</p>
                <p>Lorem ipsum dolor sit.</p>
                <a href="#" class="right">More info</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <section class="services">
    <div class="wrap row">
      <div class="section-title">
        <h3 class="wow fadIn">Our Services</h3>
      </div>
      <div class="row section-content">
        <div class="s12 m4 col wow fadeInUp">
          <i class="fa fa-umbrella"></i>
          <h4>Insurance</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem modi molestias dolorem harum inventore. Vel!</p>
        </div>
        <div class="s12 m4 col wow fadeInUp">
          <i class="fa fa-user-md"></i>
          <h4>Medical</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem modi molestias dolorem harum inventore. Vel!</p>
        </div>
        <div class="s12 m4 col wow fadeInUp">
          <i class="fa fa-flag"></i>
          <h4>immigration</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem modi molestias dolorem harum inventore. Vel!</p>
        </div>
      </div>
    </div>
  </section>

  <section class="all-lists">
    <div class="wrap row">
      <div class="row">
        <div class="section-title row">
          <h4 class="left">Jobs</h4>
          <a class="right" href="#">view all</a>
        </div>
        <ul>
          <li><a href="#">Jobs title</a></li>
          <li><a href="#">Jobs title</a></li>
          <li><a href="#">Jobs title</a></li>
          <li><a href="#">Jobs title</a></li>
          <li><a href="#">Jobs title</a></li>
        </ul>
      </div>
      <hr>
      <div class="row">
        <div class="section-title row">
          <h4 class="left">Trainings</h4>
          <a class="right" href="#">view all</a>
        </div>
        <ul>
          <li><a href="#">Training title</a></li>
          <li><a href="#">Training title</a></li>
          <li><a href="#">Training title</a></li>
          <li><a href="#">Training title</a></li>
          <li><a href="#">Training title</a></li>
        </ul>
      </div>
      <hr>
      <div class="row">
        <div class="section-title row">
          <h4 class="left">Agencies</h4>
          <a class="right" href="#">view all</a>
        </div>
        <ul>
          <li><a href="#">Agencies title</a></li>
          <li><a href="#">Agencies title</a></li>
          <li><a href="#">Agencies title</a></li>
          <li><a href="#">Agencies title</a></li>
          <li><a href="#">Agencies title</a></li>
        </ul>
      </div>
    </div>
  </section>

  <section class="footer">
    
  </section>
</div>

@stop