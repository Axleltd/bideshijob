<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Bideshi') }} | @yield('title') </title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/materialize.css')}}">
    <link rel="stylesheet" href="{{asset('stylesheets/animate.css')}}">
    <link rel="stylesheet" href="{{asset('stylesheets/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('stylesheets/slick.css')}}">
    <link rel="stylesheet" href="{{asset('stylesheets/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('stylesheets/admin.css')}}">
    
</head>
<body>     
    <div id="app" class="Dashboard row">          
        <header class="header">

          <ul class="left-nav">
           {{-- <a class='dropdown-button btn' href='#' data-activates='dropdown1' data-beloworigin="true">Drop Me!</a>

            <ul id='dropdown1' class='dropdown-content'>
              <li><a href="#!">one</a></li>
              <li><a href="#!">two</a></li>
              <li class="divider"></li>
              <li><a href="#!">three</a></li>
            </ul> --}}
        

            <li class="hover-div">
              @if(count($notifications)>0 && isset($notifications))                
              <a class='dropdown-button' href='#' data-activates='noti' data-beloworigin="true">
                <i class="fa fa-bell-o" > @if($countUserUnRead>0)<span class="badges">{{$countUserUnRead}}</span>@endif</i>                
              
              </a>
               


              <ul id='noti' class="dropdown-content submenu">
                <li class="title row">
                  <p class="left">Notification</p>
                  <a href="/profile/notification" class="right">View all</a>
                </li>
                
                
                  @foreach($notifications as $notification)                  
                      @if(($notification->data['for'] == 'user'))
                    <li>     
                      <a href="/profile/notification/{{$notification->id}}/read" class="{{ ($notification->read_at) ?'read': 'notread' }}">{{$notification->data['message']}}</a>                                                               
                    </li>
                    @endif
                  @endforeach                              
              </ul>
              @endif 
            </li>

             @if(Shinobi::isRole('admin'))
            <li class="hover-div">
              <a class='dropdown-button' href='#' data-activates='admin-noti' data-beloworigin="true">
                  <i class="fa fa-bell-o">                
                    @if($adminCountUnRead>0)<span class="badges">{{$adminCountUnRead}}</span>@endif
                  </i>
              </a>
              <ul id='admin-noti' class="dropdown-content submenu">
                <li class="title row">
                  <p class="left">Notification</p>
                  <a href="/dashboard/all-notification" class="right">View all</a>
                </li>
                
                
              
                  @if(count($allNotifications)>0 && isset($notifications))
                    @foreach($allNotifications as $notification)
                      @if($notification->data['for'] == 'admin')                      
                      <li>
                        <a href="{{ url('dashboard/company')}}" class="{{ ($notification->read_at) ?'read': 'notread' }}">{{$notification->data['message']}}</a>
                      </li>
                      @endif
                    @endforeach
                  @endif
                
              </ul>
            </li>                                      
            <li class="hover-div">       
               <a class='dropdown-button' href='#' data-activates='mess' data-beloworigin="true">    
                  <i class="fa fa-envelope-o">
                    @if($messageCount>0)<span class="badges">{{$messageCount}}</span>@endif
                  </i>
                </a>
              <ul id='mess' class="dropdown-content submenu">
                <li class="title row">
                  <p class="left">Messages</p>
                  <a href="/dashboard/messages" class="right">View all</a>
                </li>
                
                  @foreach($messages as $message)
                      
                    <li>                        
                      <a href="/dashboard/messages" class="{{($message->seen) ? 'read':'notread'}}">You Have Received Message From {{$message->name}}</a>
                    </li>

                  @endforeach                
                  
                
              </ul>
            </li>            
                                
            <li class="hover-div">

              <a class='dropdown-button' href='#' data-activates='apply' data-beloworigin="true">  
                <i class="fa fa-folder-open-o">
                   @if($countUserUnReadSubscription>0)<span class="badges">{{$countUserUnReadSubscription}}</span>@endif
                </i>
              </a>
              <ul id="apply" class="dropdown-content submenu">


                <li class="title row">
                  <p class="left">Applications</p>
                  <a href="/dashboard/user-subscription" class="right">View all</a>
                </li>

                @if(count($user_subscription)>0 && isset($user_subscription))                
                  @foreach($user_subscription as $user)
                      
                    <li>                        
                      <a href="{{ url('/dashboard/user-subscription')}}" class="">Apply
                          @if($user->applicable_type =='App\\Job') 
                              For Job
                          @elseif($user->applicable_type =='App\\Training')
                            For Training  
                          @endif
                          From {{$user->full_name}}
                          
                      </a>
                    </li>

                  @endforeach
                @endif                
              </ul>
            </li>
          @endif
        
          </ul>          
          <div class="right-nav">
            <div class="hover-div">
              <a class='dropdown-button' href='#' data-activates='use' data-beloworigin="true">  
                <i class="fa fa-user"></i>
              </a>
              <ul id="use" class="dropdown-content user-info">
                <li class="img">
                  @if((Auth::user()->profile) && (Auth::user()->profile->logo))
                    <img src="{{asset('image/profile/'.Auth::user()->profile->logo)}}" alt="">
                  @else
                    <img src="{{asset('image/no-image.png')}}" alt="">
                  @endif
                </li>
                <li><a href="/profile/user" class="name">
                  @if(Auth::user()->profile)
                    {{Auth::user()->profile->first_name}}
                  @else
                    {{Auth::user()->name}}
                  @endif
                </a>
              </li>
                @if(isset($profile))
                  <li><a href="{{url('/profile/user/'.$profile->id.'/edit')}}"><i class="fa fa-settings"></i>Settings</a></li>
                  @else
                    <li><a href="{{url('/profile/user/create')}}"><i class="fa fa-settings"></i>Settings</a></li>
                @endif
                <li><a href="/logout"><i class="fa fa-exit"></i>Logout</a></li>
              </ul>
            </div>
          </div>
          
         {{--  <ul class="right-nav">
            @if(Auth::check())
              @if(Shinobi::isRole('admin'))
                <li><a href="/dashboard">@lang('site.dashboard')</a></li>
              @endif
              <li><a href="/logout">@lang('site.logout')</a></li>
            @else
              <li><a href="/profile">profile</a></li>              

            @endif
              <li><a href="/locale/en">@lang('site.english')</a></li>
              <li><a href="/locale/np">@lang('site.nepali')</a></li>
          </ul>     --}}      
        </header>
        <div class="sidenav">
          <div class="wrap">
            <div class="logo-div">
              <a href="/"><img src="{{asset('images/logo.png')}}" alt=""></a>
              <div class="nav-toggle">
                <i class="ti-menu"></i>
              </div>
            </div>
            <ul class="navs"> 
                  @if(Shinobi::isRole('admin'))                                                       
                    <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i>Dashboard</a></l
                      >                        
                  @else
                    <li><a href="{{url('/profile')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                  @endif                                                 
              <li class="accordian">
                <a href="/profile/company"><i class="fa fa-plane"></i>All Agencies</a>
                <ul class="submenu">
                  <li><a href="{{url('/company/create')}}">Add new agency</a></li>
                  <li><a href="{{url('/profile/company')}}">View my agency</a></li>
                  @if(Shinobi::isRole('admin'))
                                        
                    <li><a href="{{url('/dashboard/company')}}">View all agency</a></l
                      >                    
                  @endif                  

                </ul>
              </li>
              <li class="accordian">
                <a href="/profile/job"><i class="fa fa-suitcase"></i> All jobs</a>
                <ul class="submenu">
                  <li><a href="{{url('/profile/company')}}">Add new job</a></li>
                  <li><a href="{{url('/profile/job')}}">View my jobs</a></li>
                  @if(Shinobi::isRole('admin'))
                                        
                    <li><a href="{{url('/dashboard/job')}}">View all jobs</a></l
                      >                    
                  @endif                  
                </ul>
              </li>
              <li class="accordian">
                <a href="/profile/training"><i class="fa fa-graduation-cap"></i> All Trainings</a>
                <ul class="submenu">
                  <li><a href="{{url('/profile/company')}}">Add new training</a></li>
                  <li><a href="{{url('/profile/training')}}">View my trainings</a></li>
                  @if(Shinobi::isRole('admin'))
                                        
                    <li><a href="{{url('/dashboard/training')}}">View all trainings</a></l
                      >                    
                  @endif                  
                </ul>
              </li>
              @if(Shinobi::isRole('admin'))
                <li><a href="/watchtower/user"><i class="fa fa-group"></i> All users</a></li>              
                <li class="accordian sites">
                  <a href="#"><i class="fa fa-pencil-square-o"></i>Edit site</a>
                  <ul class="submenu">
                    <li><a href="/dashboard/about"><i class="fa fa-home"></i> About Us</a></li>
                    <li><a href="/dashboard/faq"><i class="fa fa-home"></i> FAQ</a></li>                    
                    <li><a href="/dashboard/posts"><i class="fa fa-home"></i> Blog</a></li>
                  </ul>
                </li>
              @endif
            </ul>
          </div>
        </div>
        <div class="page-wrap">            
            @yield('content')
        </div>
    </div>
    <script src="{{asset('js/jquery-3.1.0.js')}}"></script>
    <script src="{{asset('js/materialize.js')}}"></script>
    <script src="{{asset('js/pace.js')}}"></script>
    <script src="{{asset('js/slick.js')}}"></script>
    <script src="{{asset('js/particles.js')}}"></script>
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script src="{{asset('js/admin.js')}}"></script>
    @stack('script')


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>

    </script>
    <!-- Scripts -->
    
    <script>
        $(document).ready(function() {
            $('select').material_select();
          });
    </script>
</body>
</html>

