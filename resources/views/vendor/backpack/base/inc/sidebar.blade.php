@if (Auth::check())
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('backpack::base.administration') }}</li>
            <!-- ================================================ -->
            <!-- ==== Recommended place for admin menu items ==== -->
            <!-- ================================================ -->
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
            
            {{-- OPERASIONAL CRUD --}}
            @role('observer')
            <li class="treeview">
                <a href="#"><i class="wi wi-earthquake"></i><span>Gempabumi</span></a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ url('admin/pengamatan/gempabumi') }}"><i class="wi wi-earthquake"></i> <span>Gempabumi</span></a>
                    </li>
                    <li>
                        <a href="{{ url('admin/pengamatan/import/gempabumi') }}"><i class="wi wi-earthquake"></i> <span>Import Gempabumi</span></a>
                    </li>
                </ul>
            </li>
            {{-- MAGNETBUMI --}}
            <li class="treeview">
                <a href="#"><i class="fa fa-magnet"></i><span>Magnetbumi</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/pengamatan/komponen-h') }}"><i class="fa fa-magnet"></i><span>Komponen H</span></a></li>
                    <li><a href="{{ url('admin/pengamatan/komponen-d') }}"><i class="fa fa-magnet"></i><span>Komponen D</span></a></li>
                    <li><a href="{{ url('admin/pengamatan/komponen-i') }}"><i class="fa fa-magnet"></i><span>Komponen I</span></a></li>
                    <li><a href="{{ url('admin/pengamatan/komponen-z') }}"><i class="fa fa-magnet"></i><span>Komponen Z</span></a></li>
                    <li><a href="{{ url('admin/pengamatan/komponen-f') }}"><i class="fa fa-magnet"></i><span>Komponen F</span></a></li>
                    <li><a href="{{ url('admin/pengamatan/k-index') }}"><i class="fa fa-magnet"></i><span>K Index</span></a></li>
                    <li><a href="{{ url('admin/pengamatan/prekursor') }}"><i class="fa fa-magnet"></i><span>Prekursor</span></a></li>
                    <li><a href="{{ url('admin/pengamatan/absolut') }}"><i class="fa fa-magnet"></i><span>Absolut</span></a></li>
                    <li>
                        <a href="{{ url('admin/pengamatan/import/magnetbumi') }}"><i class="fa fa-magnet"></i> <span>Import Data Magnetbumi</span></a>
                    </li>
                </ul>
            </li>
            {{-- LISTRIK UDARA --}}
            <li class="treeview">
                <a href="#"><i class="wi wi-lightning"></i> <span>Listrik Udara</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/pengamatan/summary') }}"><i class="wi wi-lightning"></i><span> Summary</span></a></li>
                    <li><a href="{{ url('admin/pengamatan/cgplus') }}"><i class="wi wi-lightning"></i><span> CG +</span></a></li>
                    <li><a href="{{ url('admin/pengamatan/cgminus') }}"><i class="wi wi-lightning"></i><span> CG -</span></a></li>
                    <li><a href="{{ url('admin/pengamatan/sambaran') }}"><i class="wi wi-lightning"></i><span> CG Sebelum Nov 2014</span></a></li>
                </ul>
            </li>
            {{-- HUJAN --}}
            <li class="treeview">
                <a href="#"><i class="wi wi-cloud"></i> <span>Kualitas Udara</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/pengamatan/hujan') }}"><i class="wi wi-cloud"></i><span> Hujan</span></a></li>
                    <li><a href="{{ url('admin/pengamatan/kah') }}"><i class="wi wi-cloud"></i><span> KAH</span></a></li>
                    <li><a href="{{ url('admin/pengamatan/spm') }}"><i class="wi wi-cloud"></i><span> SPM</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-th-list"></i> <span>Jadwal</span></a>
                <ul class="treeview-menu">
                    <li class=""><a href="{{ url('admin/pengamatan/jadwal-spm') }}"><i class="fa fa-th-list"></i> <span>Pengambilan sampel debu</span></a></li>
                    <li class=""><a href="{{ url('admin/pengamatan/jadwal-kah') }}"><i class="fa fa-th-list"></i> <span>Pengambilan sampel air hujan</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-tasks"></i> <span>Check list Peralatan</span></a>
                <ul class="treeview-menu">
                    <li class=""><a href="{{ url('admin/pengamatan/checklist-accelerograph') }}"><i class="fa fa-tasks"></i> <span>Accelerograph</span></a></li>
                    <li class=""><a href=""><i class="fa fa-tasks"></i> <span>Pengambilan sampel air hujan</span></a></li>
                </ul>
            </li>
            @endrole
            <li><a href="{{ url('admin/page') }}"><i class="fa fa-file-o"></i> <span>Pages</span></a></li>
            <!--FILE MANAGER-->
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/elfinder') }}"><i class="fa fa-files-o"></i> <span>File manager</span></a></li>
            {{-- TATA USAHA --}}
            @role('tatausaha')
            <li class="treeview">
                <a href="#"><i class="fa fa-magnet"></i><span>Tata Usaha</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/pengamatan/komponen-h') }}"><i class="fa fa-magnet"></i><span>Surat Masuk</span></a></li>
                    <li><a href="{{ url('admin/pengamatan/komponen-d') }}"><i class="fa fa-magnet"></i><span>Surat Keluar</span></a></li>
                    <li><a href="{{ url('admin/pengamatan/komponen-i') }}"><i class="fa fa-magnet"></i><span>Diklat</span></a></li>
                    <li><a href="{{ url('admin/pengamatan/komponen-z') }}"><i class="fa fa-magnet"></i><span>Tugas Belajar</span></a></li>
                    <li><a href="{{ url('admin/pengamatan/komponen-f') }}"><i class="fa fa-magnet"></i><span></span></a></li>
                    <li><a href="{{ url('admin/pengamatan/k-index') }}"><i class="fa fa-magnet"></i><span>K Index</span></a></li>
                    <li><a href="{{ url('admin/pengamatan/prekursor') }}"><i class="fa fa-magnet"></i><span>Prekursor</span></a></li>
                    <li><a href="{{ url('admin/pengamatan/absolut') }}"><i class="fa fa-magnet"></i><span>Absolut</span></a></li>
                    <li>
                        <a href="{{ url('admin/pengamatan/import/magnetbumi') }}"><i class="fa fa-magnet"></i> <span>Import Data Magnetbumi</span></a>
                    </li>
                </ul>
            </li>
            @endrole
            <!--MENU KHUSU ADMIN-->
            @role('admin')
            <li class="treeview">
                <a href="#"><i class="fa fa-cgs"></i><span>Advanced</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/backup') }}"><i class="fa fa-hdd-o"></i> <span>Backups</span></a></li>
                    <li><a href="{{ url('admin/log') }}"><i class="fa fa-terminal"></i> <span>Logs</span></a></li>
                    <li><a href="{{ url('admin/setting') }}"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-group"></i> <span>Users, Roles, Permissions</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('admin/user') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
                    <li><a href="{{ url('admin/role') }}"><i class="fa fa-group"></i> <span>Roles</span></a></li>
                    <li><a href="{{ url('admin/permission') }}"><i class="fa fa-key"></i> <span>Permissions</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-globe"></i> <span>Translations</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/language') }}"><i class="fa fa-flag-checkered"></i> Languages</a></li>
                    <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/language/texts') }}"><i class="fa fa-language"></i> Site texts</a></li>
                </ul>
            </li>
            @endrole
            <!-- ======================================= -->
            <li class="header">{{ trans('backpack::base.user') }}</li>
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
@endif