<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="/customersearch" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="phone_no" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
            @csrf
        </form>

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a class="nav-link" href="/">
               <i class="fa fa-dashboard"></i>Dashboard
              </a>
            </li>
            <li>
                <a class="nav-link" href="/customer"><i class="fa fa-users"></i> Customer </a>
            </li>
            <li>
                <a class="nav-link" href="/custcase"><i class="fa fa-list"></i> Case</a>
            </li>
            <li>
                <a class="nav-link" href="/users"><i class="fa fa-user-circle"></i> User</a>
            </li>
            <li>
                <a class="nav-link" href="/software"><i class="fa fa-server"></i> Software</a>
            </li>
            <ul class="treeview-menu">
                <li><a href="invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                <li><a href="profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                <li><a href="login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                <li><a href="register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                <li><a href="lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                <li><a href="404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                <li><a href="500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                <li class="active"><a href="blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                <li><a href="pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
            </ul>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>