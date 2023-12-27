<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                   
                </li>
                <!-- User Profile-->
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/') }}" aria-expanded="false">
                            <i class="icon-Home"></i>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                  
                </li>

                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Apps</span>
                </li>
               
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Keuangan Perkara</span>
                </li>
                <li class="sidebar-item">
                   
                   
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('cash/1') }}" aria-expanded="false">
                            <i class="icon-User"></i>
                            <span class="hide-menu">Masuk</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('cash/-1') }}" aria-expanded="false">
                            <i class="icon-Line-Chart3"></i>
                            <span class="hide-menu">Keluar</span>
                        </a>
                    </li>
                  
                </li>
                <li class="nav-small-cap">
                    <i class="mdi mdi-dots-horizontal"></i>
                    <span class="hide-menu">Referensi</span>
                </li>
                <li class="sidebar-item">
                   
                   
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('reference.transaction_account') }}" aria-expanded="false">
                            <i class="icon-Money"></i>
                            <span class="hide-menu">Sub Transaksi</span>
                        </a>
                    </li>
                    
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('reference.balance') }}" aria-expanded="false">
                            <i class="icon-Line-Chart"></i>
                            <span class="hide-menu">Saldo Awal</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('reference.employee') }}" aria-expanded="false">
                            <i class="icon-User"></i>
                            <span class="hide-menu">Pejabat</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('reference.user') }}" aria-expanded="false">
                            <i class="icon-Add-User"></i>
                            <span class="hide-menu">Akun</span>
                        </a>
                    </li>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('logout') }}" aria-expanded="false">
                        <i class="mdi mdi-directions"></i>
                        <span class="hide-menu">Log Out</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>