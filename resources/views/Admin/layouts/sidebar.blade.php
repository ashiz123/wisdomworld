@section('sidebar')
    {{--<style>--}}
        {{--. main-sidebar--}}
        {{--{--}}
            {{--background: #F3F6D3 !important;--}}
        {{--}--}}
    {{--</style>--}}

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header" style="color:gray; margin-left:5px;">MAIN NAVIGATION</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>School Info</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="fa fa-circle-o"></i> Create School-info</a></li>
                    <li><a href=""><i class="fa fa-circle-o"></i> View School-info</a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Banner</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="fa fa-circle-o"></i> Create Banner</a></li>
                    <li><a href=""><i class="fa fa-circle-o"></i> View Banner</a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Members</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="fa fa-circle-o"></i> Create Member</a></li>
                    <li><a href=""><i class="fa fa-circle-o"></i> View Member</a></li>

                </ul>
            </li>



            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>News & Blog</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="fa fa-circle-o"></i> Create News</a></li>
                    <li><a href=""><i class="fa fa-circle-o"></i> View News</a></li>
                    <li><a href=""><i class="fa fa-circle-o"></i> Categories</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Services</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href=""><i class="fa fa-circle-o"></i> Create Service</a></li>
                    <li><a href=""><i class="fa fa-circle-o"></i> View Services</a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cog"></i> <span>Settings</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>

                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>Category</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> View Services</a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>About us</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>Messages</span>
                </a>
            </li>




        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

    @endsection