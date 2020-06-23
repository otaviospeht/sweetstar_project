<!-- ========== Left Sidebar Start ========== -->

<div class="left side-menu">

    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">
                    Menu Principal
                </li>
                <li>
                    <a href="{{ route('home') }}" class="waves-effect waves-primary">
                        <i class="mdi mdi-home"></i><span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}" class="waves-effect waves-primary">
                        <i class="mdi mdi-shopping"></i><span>Produtos</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('contato.index') }}" class="waves-effect waves-primary">
                        <i class="mdi mdi-email"></i><span>Contato</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('sobre.index') }}" class="waves-effect waves-primary">
                        <i class="mdi mdi-information-variant"></i><span>Sobre nós</span>
                    </a>
                </li>
                {{--<li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect waves-primary">
                        <i class="mdi mdi-view-dashboard"></i> <span>Adminstrativo</span> <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{ route('admin.products.index') }}" class="waves-effect waves-primary">
                                <span>Produtos</span>
                            </a>
                        </li>
                    </ul>
                </li>--}}
            </ul>

            <div class="clearfix"></div>

        </div>

        <div class="clearfix"></div>

    </div>

</div>
<!-- Left Sidebar End -->