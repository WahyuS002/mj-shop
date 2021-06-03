<ul class="navbar-item flex-row ml-auto">

    <li class="nav-item align-self-center search-animated">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-search toggle-search">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
        <form class="form-inline search-full form-inline search" role="search">
            <div class="search-bar">
                <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
            </div>
        </form>
    </li>

    <li class="nav-item dropdown message-dropdown">
        <a href="#" class="nav-link" data-toggle="tooltip" title="Feedback Pengunjung" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-mail">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                <polyline points="22,6 12,13 2,6"></polyline>
            </svg><span class="badge badge-primary">3</span>
        </a>
    </li>

    <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
        <a href="#" class="nav-link dropdown-toggle user" id="userProfileDropdown"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-user">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
        </a>
        <div class="dropdown-menu position-absolute e-animated e-fadeInUp" aria-labelledby="userProfileDropdown">
            <div class="user-profile-section">
                <div class="media mx-auto">
                    <img src="{{ getUserProfilePicture() }}" class="img-fluid mr-2" style="max-width: 90px; max-height: 90px" alt="{{ auth()->user()->name }}">
                    <div class="media-body">
                        <h5>{{ getAdminName() }}</h5>
                        <p>Admin</p>
                    </div>
                </div>
            </div>
            <div class="dropdown-item">
                <a href="{{ route('admin.profile') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-user">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg> <span>Profil</span>
                </a>
            </div>

            <div class="dropdown-item">
                <a href="#" class="logout-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-log-out">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg> <span>Log Out</span>
                </a>
            </div>
        </div>
    </li>
</ul>
