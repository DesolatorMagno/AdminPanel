<div class="sidebar sidebar-style-2" data-background-color="dark2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('atlantis/assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            Hizrian
                            <span class="user-level">Administrator</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="dashboard">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="../demo1/index.html">
                                    <span class="sub-item">Dashboard 1</span>
                                </a>
                            </li>
                            <li>
                                <a href="../demo2/index.html">
                                    <span class="sub-item">Dashboard 2</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>

                <li class="nav-item">
                    <a data-toggle="collapse" href="#companies">
                        <i class="fas fa-building"></i>
                        <p>Companies</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="companies">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('companies.index') }}">
                                    <i class="fas fa-list"></i>
                                    <span>@lang('general.listing')</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('employees.create') }}">
                                    <i class="fas fa-plus"></i>
                                    <span class="">{{ trans('general.new', ['model' => trans('general.company')]) }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#employees">
                        <i class="fas fa-users"></i>
                        <p>Employees</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="employees">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('employees.index') }}">
                                    <i class="fas fa-list"></i>
                                    <span>@lang('general.listing')</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('employees.create') }}">
                                    <i class="fas fa-plus"></i>
                                    <span>{{ trans('general.new', ['model' => trans('general.employee')]) }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
