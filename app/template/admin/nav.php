<div class="wrapper" id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header pull-right">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Stats"><i class="fa fa-bar-chart-o"></i>
                        </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$this->getSession('user_name')?><i style="margin-left:10px" class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?=$this->mainURL.'admin_hash_logout'?>"><i class="fa fa-fw fa-power-off"></i> تسجيل الخروج</a></li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?=$this->mainURL?>admin_hash_dashboard"><i class="fas fa-chart-line"></i> لوحة البيانات</a>
                    </li>
                    <li>
                        <a href="<?=$this->mainURL?>admin_hash_add_anime"><i class="fas fa-plus-circle"></i>إضافة انمي</a>
                    </li>
                    <li>
                        <a href="<?=$this->mainURL?>admin_hash_all_anime"><i class="fas fa-film"></i>الانميات المتواجده</a>
                    </li>
                    <li>
                        <a href="<?=$this->mainURL?>admin_hash_add_img"><i class="fas fa-images"></i>إضافة صور</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>