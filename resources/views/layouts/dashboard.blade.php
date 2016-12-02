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
            <li class="hover-div">
              <i class="fa fa-bell-o"></i>
              <ul class="submenu">
                <li class="title row">
                  <p class="left">Notification</p>
                  <a href="/dashboard/all-notification" class="right">View all</a>
                </li>
                
                @if(count($notifications)>0 && isset($notifications))                
                  @foreach($notifications as $notification)                  
                      @if(($notification->data['for'] == 'user'))
                    <li>                                              
                      <a href="/dashboard/{{$notification->data['name']}}" class="{{ ($notification->read_at) ?'read': 'notread' }}">{{$notification->data['message']}}</a>
                    </li>
                    @endif
                  @endforeach
                @endif
               @if(Shinobi::isRole('admin'))
                  @if(count($allNotifications)>0 && isset($notifications))
                    @foreach($allNotifications as $notification)                      
                      <li>
                        <a href="{{ url('dashboard/company')}}" class="{{ ($notification->read_at) ?'read': 'notread' }}">{{$notification->data['message']}}</a>
                      </li>

                    @endforeach
                  @endif
                @endif
              </ul>
            </li>
            @if(Shinobi::isRole('admin'))                
            <li class="hover-div">              
              <i class="fa fa-envelope-o"></i>
              <ul class="submenu">
                <li class="title row">
                  <p class="left">Messages</p>
                  <a href="/dashboard/messages" class="right">View all</a>
                </li>
                
                  @foreach($messages as $message)
                      
                    <li>                        
                      <a href="#" class="{{($message->seen) ? 'read':'notread'}}">You Have Received Message From {{$message->name}}</a>
                    </li>

                  @endforeach                
                  
                
              </ul>
            </li>
            @endif
        
          @if(Shinobi::isRole('admin'))                
            <li class="hover-div">
              <i class="fa fa-folder-open-o"></i>
              <ul class="submenu">
                <li class="title row">
                  <p class="left">Applications</p>
                  <a href="/dashboard/user-subscription" class="right">View all</a>
                </li>

                @if(count($user_subscription)>0 && isset($user_subscription))                
                  @foreach($user_subscription as $user)
                      
                    <li>                        
                      <a href="{{ url('/dashboard/user-subscription')}}" class="">Apply From {{$user->full_name}}</a>
                    </li>

                  @endforeach
                @endif                
              </ul>
            </li>
          @endif
        
          </ul>

          <div class="right-nav">
            <div class="hover-div">
              <i class="fa fa-user"></i>
              <ul class="user-info submenu">
                <li class="img"><img src="#" alt=""></li>
                <li><a href="/profile/user" class="name">{{Auth::user()->name}}</a></li>
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
                <li><a href="/watchtower/users"><i class="fa fa-group"></i> All users</a></li>              
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

