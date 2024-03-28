<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      @php
        $AllChatUserCount = App\Models\ChatModel::getAllChatUserCount()
      @endphp
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link"  href="{{url('chat')}}">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">{{ !empty($AllChatUserCount) ? $AllChatUserCount : ''}}</span>
        </a>        
      </li>
      <!-- Notifications Dropdown Menu -->       
    </ul>
  </nav>  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ url('public/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Student MS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      @if (Auth::user()->user_type==1) 

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">       
          <img src="{{Auth::user()->getProfileDirect()}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{url('admin/account')}}" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
          
            <li class="nav-item">
            <a href="{{ url('admin/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/admin/list')}}" class="nav-link ">
              <i class="nav-icon far fa-user"></i>
              <p>
                Teacher lists
              </p>
            </a>
          </li>   
          <li class="nav-item">
            <a href="{{url('admin/student/list')}}" class="nav-link ">
              <i class="nav-icon far fa-user"></i>
              <p>
                Student lists
              </p>
            </a>
          </li>   
          <li class="nav-item">
            <a href="#" class = "nav-link">
              <i class= "nav-icon fas fa-table"></i>
              <p>
                Homework
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/homework/homework')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Homework</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/homework/challenge')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Challenge</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/change_password')}}" class="nav-link ">
              <i class="nav-icon far fa-user"></i>
              <p>
                Change Password
              </p>
            </a>
          </li> 

          @elseif(Auth::user()->user_type==2)  
           
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{Auth::user()->getProfileDirect()}}" class="img-circle elevation-2" alt="User Image">
            </div>
           <div class="info">
             <a href="{{url('student/account')}}" class="d-block">{{Auth::user()->name}}</a>
            </div>
         </div>  
         <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">   
            <li class="nav-item">
            <a href="{{ url('student/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('student/list')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                User Lists
              </p>
            </a>
          </li>   
          <li class="nav-item">
            <a href="{{url('student/change_password')}}" class="nav-link ">
              <i class="nav-icon far fa-user"></i>
              <p>
                Change Password
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="#" class = "nav-link">
              <i class= "nav-icon fas fa-table"></i>
              <p>
                Homework
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('student/my_homework')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>My Homework</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('student/my_submitted_homework')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>My Submitted Homework</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('student/challenge')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Challenge</p>
                </a>
              </li>
            </ul>
          </li>

          @endif             

          <li class="nav-item">
            <a href="{{url('chat')}}" class="nav-link">
            <i class="nav-icon far fa-envelope"></i>
              <p>
                Message Chat
              </p>
            </a>
          </li>  
          <li class="nav-item">
            <a href="{{url('logout')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Logout
              </p>
            </a>
          </li>  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>