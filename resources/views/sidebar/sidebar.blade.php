
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="{{set_active(['home','em/dashboard'])}} submenu">
                    <a href="#" class="{{ set_active(['home','em/dashboard']) ? 'noti-dot' : '' }}">
                        <i class="la la-dashboard"></i>
                        <span> Dashboard</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                        <li><a class="{{set_active(['home'])}}" href="{{ route('home') }}">Admins Dashboard</a></li>
                        <li><a class="{{set_active(['em/dashboard'])}}" href="{{ route('em/dashboard') }}">Serveurs Dashboard</a></li>
                    </ul>
                </li>
                @if (Auth::user()->role_name=='Admin')
                    <li class="{{set_active(['search/user/list','userManagement','activity/log','activity/login/logout'])}} submenu">
                        <a href="#" class="{{ set_active(['search/user/list','userManagement','activity/log','activity/login/logout']) ? 'noti-dot' : '' }}">
                            <i class="la la-user-secret"></i> <span> Utilisateurs</span> <span class="menu-arrow"></span>
                        </a>
                        <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                            <li><a class="{{set_active(['search/user/list','userManagement'])}}" href="{{ route('userManagement') }}">All Users</a></li>
                            <li><a class="{{set_active(['activity/log'])}}" href="{{ route('activity/log') }}">Journal d'activité</a></li>
                            {{-- <li><a class="{{set_active(['activity/login/logout'])}}" href="{{ route('activity/login/logout') }}">Activity User</a></li> --}}
                        </ul>
                    </li>

                @endif
                <li class="{{set_active(['all/employee/list','all/employee/list','all/employee/card','form/holidays/new','form/leaves/new',
                    'form/leavesemployee/new','form/leavesettings/page','attendance/page',
                    'attendance/employee/page','form/departments/page','form/designations/page',
                    'form/timesheet/page','form/shiftscheduling/page','form/overtime/page'])}} submenu">
                    <a href="#" class="{{ set_active(['all/employee/list','all/employee/card','form/holidays/new','form/leaves/new',
                    'form/leavesemployee/new','form/leavesettings/page','attendance/page',
                    'attendance/employee/page','form/departments/page','form/designations/page',
                    'form/timesheet/page','form/shiftscheduling/page','form/overtime/page']) ? 'noti-dot' : '' }}">
                        <i class="la la-user"></i> <span> Serveurs</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                        <li><a class="{{set_active(['all/employee/list','all/employee/card'])}}" href="{{ route('all/employee/card') }}">Tous Serveurs</a></li>
                        <li><a class="{{set_active(['form/holidays/new'])}}" href="{{ route('form/holidays/new') }}">congés </a></li>
                        <li><a class="{{set_active(['form/leaves/new'])}}" href="{{ route('form/leaves/new') }}">Congés (Admin)<span class="badge badge-pill bg-primary float-right">1</span></a></li>
                        <li><a class="{{set_active(['form/leavesemployee/new'])}}" href="{{route('form/leavesemployee/new')}}">Congés (Serveur)</a></li>
                        <li><a class="{{set_active(['form/leavesettings/page'])}}" href="{{ route('form/leavesettings/page') }}">Paramètres Congés </a></li>
                        <li><a class="{{set_active(['attendance/page'])}}" href="{{ route('attendance/page') }}">Présence (Admin)</a></li>
                        <li><a class="{{set_active(['attendance/employee/page'])}}" href="{{ route('attendance/employee/page') }}">Présence (Serveur)</a></li>
                        <li><a class="{{set_active(['form/timesheet/page'])}}" href="{{ route('form/timesheet/page') }}">Timesheet</a></li>
                        <li><a class="{{set_active(['form/shiftscheduling/page'])}}" href="{{ route('form/shiftscheduling/page') }}">Emploi du Temps</a></li>
                        <li><a class="{{set_active(['form/overtime/page'])}}" href="{{ route('form/overtime/page') }}">Overtime</a></li>
                    </ul>
                </li>
                <li class="{{set_active(['clients/create','clients/index'])}} submenu">
                    <a href="#" class="{{ set_active(['clients/create','clients/index']) ? 'noti-dot' : '' }}"><i class="la la-files-o"></i>
                    <span> Clients </span><span class="menu-arrow"></span></a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                        <li><a class="@active('clients.create')" href="{{ route('clients.create') }}">Nouveau Client</a></li>
                        <li><a class="@active('clients.index')" href="{{ route('clients.index') }}">Liste des Clients</a></li>
                    </ul>
                </li>

                <li class="{{set_active(['commande/create','commande/index'])}} submenu">
                    <a href="#" class="{{ set_active(['commande/create','commande/index']) ? 'noti-dot' : '' }}"><i class="la la-money"></i>
                    <span> Commande </span> <span class="menu-arrow"></span></a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                        <li><a class="{{set_active(['commande.create'])}}" href="{{ route('commande.create') }}"> Ajouter Commande </a></li>
                        <li><a class="{{set_active(['commande.index'])}}" href="{{ route('commande.index') }}"> Liste Commandes </a></li>
                    </ul>
                </li>
                <li class="{{set_active(['form/expense/reports/page','form/invoice/reports/page','form/leave/reports/page','form/daily/reports/page'])}} submenu">
                    <a href="#" class="{{ set_active(['form/expense/reports/page','form/invoice/reports/page','form/leave/reports/page','form/daily/reports/page']) ? 'noti-dot' : '' }}"><i class="la la-pie-chart"></i>
                    <span> Rapports </span> <span class="menu-arrow"></span></a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                        <li><a class="{{set_active(['form/expense/reports/page'])}}" href="{{ route('form/expense/reports/page') }}"> Rapport de dépenses </a></li>
                        <li><a class="{{set_active(['form/invoice/reports/page'])}}" href="{{ route('form/invoice/reports/page') }}"> Rapport de facturation </a></li>
                        <li><a class="{{set_active([''])}}" href="payments-reports.html"> Rapport Payments </a></li>
                        <li><a class="{{set_active([''])}}" href="employee-reports.html"> Rapport Serveur </a></li>
                        <li><a class="{{set_active([''])}}" href="payslip-reports.html"> Bulletin de paie </a></li>
                        <li><a class="{{set_active([''])}}" href="attendance-reports.html"> Rapport de présence </a></li>
                        <li><a class="{{set_active(['form/leave/reports/page'])}}" href="{{ route('form/leave/reports/page') }}"> Rapport de congés </a></li>
                        <li><a class="{{set_active(['form/daily/reports/page'])}}" href="{{ route('form/daily/reports/page') }}"> Rapport quotidien </a></li>
                    </ul>
                </li>
                <li class="{{set_active(['form/performance/indicator/page','form/performance/page','form/performance/appraisal/page'])}} submenu">
                    <a href="#" class="{{ set_active(['form/performance/indicator/page','form/performance/page','form/performance/appraisal/page']) ? 'noti-dot' : '' }}"><i class="la la-graduation-cap"></i>
                    <span> Performance </span> <span class="menu-arrow"></span></a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                        <li><a class="{{set_active(['form/performance/indicator/page'])}}" href="{{ route('form/performance/indicator/page') }}"> Performance Indicator </a></li>
                        <li><a class="{{set_active(['form/performance/page'])}}" href="{{ route('form/performance/page') }}"> Performance Review </a></li>
                        <li><a class="{{set_active(['form/performance/appraisal/page'])}}" href="{{ route('form/performance/appraisal/page') }}"> Performance Appraisal </a></li>
                    </ul>
                </li>
                <li class="{{set_active(['form/training/list/page','form/trainers/list/page'])}} submenu">
                    <a href="#" class="{{ set_active(['form/training/list/page','form/trainers/list/page']) ? 'noti-dot' : '' }}"><i class="la la-edit"></i>
                    <span> Training </span> <span class="menu-arrow"></span></a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                        <li><a class="{{set_active(['form/training/list/page'])}}" href="{{ route('form/training/list/page') }}"> Training List </a></li>
                        <li><a class="{{set_active(['form/trainers/list/page'])}}" href="{{ route('form/trainers/list/page') }}"> Trainers</a></li>
                        <li><a class="{{set_active(['form/training/type/list/page'])}}" href="{{ route('form/training/type/list/page') }}"> Training Type </a></li>
                    </ul>
                </li>

                <li class="{{set_active(['employee/profile/*'])}} submenu">
                    <a href="#"><i class="la la-user"></i>
                        <span> Profil </span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a class="{{set_active(['employee/profile/*'])}}" href="{{ route('all/employee/list') }}"> Serveur Profil </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
