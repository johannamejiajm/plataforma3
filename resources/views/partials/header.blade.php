<div class="app-topstrip bg-dark py-6 px-3 w-100 d-lg-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center justify-content-center gap-5 mb-2 mb-lg-0">
      <a class="d-flex justify-content-center" href="https://www.wrappixel.com/" target="_blank">
        <img src="{{ asset('assets/images/logos/logo-wrappixel.svg') }}" alt="" width="150">
      </a>

      <div class="d-none d-xl-flex align-items-center gap-3">
        <a href="https://support.wrappixel.com/"
          class="btn btn-outline-primary d-flex align-items-center gap-1 border-0 text-white px-6">
          <i class="ti ti-lifebuoy fs-5"></i>
          Support
        </a>
        <a href="https://www.wrappixel.com/"
          class="btn btn-outline-primary d-flex align-items-center gap-1 border-0 text-white px-6">
          <i class="ti ti-gift fs-5"></i>
          Templates
        </a>
        <a href="https://www.wrappixel.com/hire-us/"
          class="btn btn-outline-primary d-flex align-items-center gap-1 border-0 text-white px-6">
          <i class="ti ti-briefcase fs-5"></i>
          Hire Us
        </a>
      </div>
    </div>

    <div class="d-lg-flex align-items-center gap-2">
      <div class="d-flex align-items-center justify-content-center gap-2">
        <a class="nav-link " href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
          aria-expanded="false">
          <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt="" width="35" height="35" class="rounded-circle">
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
          <div class="message-body">
            <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
              <i class="ti ti-user fs-6"></i>
              <p class="mb-0 fs-3">My Profile</p>
            </a>
            <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
              <i class="ti ti-mail fs-6"></i>
              <p class="mb-0 fs-3">My Account</p>
            </a>
            <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
              <i class="ti ti-list-check fs-6"></i>
              <p class="mb-0 fs-3">My Task</p>
            </a>
            <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
