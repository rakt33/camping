<!-- Menu -->

<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo htmlspecialchars($_SESSION["username"]); ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">

                <li class="header">HOOFD NAVIGATIE</li>
				<li id="index"><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
				<li id="reserveren"><a href="reserveren.php"><i class="fa fa-paste"></i> <span>Reserveren</span></a></li>
				<li id="Reserveringen"><a href="reserveringen.php"><i class="fa fa-paste"></i> <span>reserveringen</span></a></li>
				
                <li class="header">INSTELLINGEN</li>
                <li id="profile"><a href="profile.php"><i class="fa fa-user"></i> <span>Profiel</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>