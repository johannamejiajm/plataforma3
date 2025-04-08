@extends('admin.plantilla.layout')

@section('title', 'Panel General')

@section('content')
    <!--  Header Start -->
    <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link " href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="ti ti-bell"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
              <div class="dropdown-menu dropdown-menu-animate-up" aria-labelledby="drop1">
                <div class="message-body">
                  <a href="javascript:void(0)" class="dropdown-item">
                    Item 1
                  </a>
                  <a href="javascript:void(0)" class="dropdown-item">
                    Item 2
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <a href="https://www.wrappixel.com/templates/flexy-bootstrap-admin-template/?ref=376" target="_blank"
                class="btn btn-primary">Check Pro Template</a>
              <li class="nav-item dropdown">
                <a class="nav-link " href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
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
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="body-wrapper-inner">
        <div class="container-fluid">
          <!--  Row 1 -->
          <div class="row">

            <div class="col-12 p-3">
                <h1>Panel General</h1>
            </div>

          {{--   <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="d-md-flex align-items-center">
                    <div>
                      <h4 class="card-title">Listado de Eventos</h4>
                      <p class="card-subtitle">
                        Gestionar Eventos
                      </p>
                    </div>
                    <div class="ms-auto mt-3 mt-md-0">
                      <select class="form-select theme-select border-0" aria-label="Default select example">
                        <option value="1">March 2025</option>
                        <option value="2">March 2025</option>
                        <option value="3">March 2025</option>
                      </select>
                    </div>
                  </div>
                  <div class="table-responsive mt-4">
                    <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                      <thead>
                        <tr>
                          <th scope="col" class="px-0 text-muted">
                            Assigned
                          </th>
                          <th scope="col" class="px-0 text-muted">Name</th>
                          <th scope="col" class="px-0 text-muted">
                            Priority
                          </th>
                          <th scope="col" class="px-0 text-muted text-end">
                            Budget
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="px-0">
                            <div class="d-flex align-items-center">
                              <img src="../assets/images/profile/user-3.jpg" class="rounded-circle" width="40"
                                alt="flexy" />
                              <div class="ms-3">
                                <h6 class="mb-0 fw-bolder">Sunil Joshi</h6>
                                <span class="text-muted">Web Designer</span>
                              </div>
                            </div>
                          </td>
                          <td class="px-0">Elite Admin</td>
                          <td class="px-0">
                            <span class="badge bg-info">Low</span>
                          </td>
                          <td class="px-0 text-dark fw-medium text-end">
                            $3.9K
                          </td>
                        </tr>
                        <tr>
                          <td class="px-0">
                            <div class="d-flex align-items-center">
                              <img src="../assets/images/profile/user-5.jpg" class="rounded-circle" width="40"
                                alt="flexy" />
                              <div class="ms-3">
                                <h6 class="mb-0 fw-bolder">
                                  Andrew McDownland
                                </h6>
                                <span class="text-muted">Project Manager</span>
                              </div>
                            </div>
                          </td>
                          <td class="px-0">Real Homes WP Theme</td>
                          <td class="px-0">
                            <span class="badge text-bg-primary">Medium</span>
                          </td>
                          <td class="px-0 text-dark fw-medium text-end">
                            $24.5K
                          </td>
                        </tr>
                        <tr>
                          <td class="px-0">
                            <div class="d-flex align-items-center">
                              <img src="../assets/images/profile/user-6.jpg" class="rounded-circle" width="40"
                                alt="flexy" />
                              <div class="ms-3">
                                <h6 class="mb-0 fw-bolder">
                                  Christopher Jamil
                                </h6>
                                <span class="text-muted">SEO Manager</span>
                              </div>
                            </div>
                          </td>
                          <td class="px-0">MedicalPro WP Theme</td>
                          <td class="px-0">
                            <span class="badge bg-warning">Hight</span>
                          </td>
                          <td class="px-0 text-dark fw-medium text-end">
                            $12.8K
                          </td>
                        </tr>
                        <tr>
                          <td class="px-0">
                            <div class="d-flex align-items-center">
                              <img src="../assets/images/profile/user-7.jpg" class="rounded-circle" width="40"
                                alt="flexy" />
                              <div class="ms-3">
                                <h6 class="mb-0 fw-bolder">Nirav Joshi</h6>
                                <span class="text-muted">Frontend Engineer</span>
                              </div>
                            </div>
                          </td>
                          <td class="px-0">Hosting Press HTML</td>
                          <td class="px-0">
                            <span class="badge bg-danger">Low</span>
                          </td>
                          <td class="px-0 text-dark fw-medium text-end">
                            $2.4K
                          </td>
                        </tr>
                        <tr>
                          <td class="px-0">
                            <div class="d-flex align-items-center">
                              <img src="../assets/images/profile/user-8.jpg" class="rounded-circle" width="40"
                                alt="flexy" />
                              <div class="ms-3">
                                <h6 class="mb-0 fw-bolder">Micheal Doe</h6>
                                <span class="text-muted">Content Writer</span>
                              </div>
                            </div>
                          </td>
                          <td class="px-0">Helping Hands WP Theme</td>
                          <td class="px-0">
                            <span class="badge bg-success">Low</span>
                          </td>
                          <td class="px-0 text-dark fw-medium text-end">
                            $9.3K
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div> --}}

          </div>
          <div class="py-6 px-6 text-center">
            <p class="mb-0 fs-4">Design and Developed by Juan Castro</p>
          </div>
        </div>
      </div>
@endsection
