<!DOCTYPE html>
<html lang="en">

<x-head></x-head>

<body>
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
                <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                    <a class="navbar-brand brand-logo" href="index.html"><img src="images/logo.svg" alt="logo" /></a>
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg"
                            alt="logo" /></a>
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-sort-variant"></span>
                    </button>
                </div>
            </div>
            <x-header-sidebar></x-header-sidebar>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <x-sidebar></x-sidebar>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="d-flex justify-content-between flex-wrap">
                                <div class="d-flex align-items-end flex-wrap">
                                    <div class="mr-md-3 mr-xl-5">
                                        <h2>Settings</h2>
                                    </div>
                                    <div class="d-flex">
                                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                                        <p class="text-primary mb-0 hover-cursor">&nbsp;/&nbsp;Settings&nbsp;</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body dashboard-tabs p-0">
                                    <ul class="nav nav-tabs px-4" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link {{ request('tab') === null || request('tab') === 'change-password' ? 'active' : '' }}"
                                                id="change-password-tab" data-toggle="tab" href="#change-password"
                                                role="tab" aria-controls="change-password"
                                                aria-selected="true">Change Password</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ request('tab') === 'create-user' ? 'active' : '' }}"
                                                id="create-user-tab" data-toggle="tab" href="#create-user"
                                                role="tab" aria-controls="create-user" aria-selected="false">Create
                                                User</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ request('tab') === 'users' ? 'active' : '' }}"
                                                id="users-tab" data-toggle="tab" href="#users" role="tab"
                                                aria-controls="users" aria-selected="false">List User</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content py-0 px-0">
                                        <div class="tab-pane fade show px-5 py-4 {{ request('tab') === null || request('tab') === 'change-password' ? 'active' : '' }}"
                                            id="change-password" role="tabpanel" aria-labelledby="change-password-tab">
                                            <form class="forms-sample" action="{{ route('change-password') }}"
                                                method="post" autocomplete="off">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="username">Username</label>
                                                            <input name="username" type="text" class="form-control"
                                                                id="username" placeholder="Username"
                                                                value="{{ $userSession->username ?? '-' }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="password">Password</label>
                                                            <input name="password" type="password" name="password"
                                                                class="form-control" id="password"
                                                                placeholder="Password">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-6">
                                                        <button type="submit"
                                                            class="btn btn-primary mr-2">Submit</button>

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- Create User Tab -->
                                        <div class="px-5 py-4 tab-pane fade {{ request('tab') === 'create-user' ? 'show active' : '' }}"
                                            id="create-user" role="tabpanel" aria-labelledby="create-user-tab">
                                            <form class="forms-sample" action="{{ route('create-user') }}"
                                                method="post" autocomplete="off">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="username">Username</label>
                                                            <input name="username" type="text"
                                                                class="form-control" id="username"
                                                                placeholder="Username">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="password">Password</label>
                                                            <input name="password" type="password"
                                                                class="form-control" id="password"
                                                                placeholder="Password">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="form-group">
                                                        <label for="role">Role</label>
                                                        <input name="role" type="text" class="form-control"
                                                            id="role" placeholder="Role">
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-6">
                                                        <button type="submit"
                                                            class="btn btn-primary mr-2">Submit</button>
                                                        <button type="reset" class="btn btn-danger">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- Users Tab -->
                                        <div class="px-5 py-5 tab-pane fade {{ request('tab') === 'users' ? 'active' : '' }}"
                                            id="users" role="tabpanel" aria-labelledby="users-tab">
                                            <table id="example"
                                                class="table table-striped table-bordered table-hover"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Username</th>
                                                        <th>Role</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($users as $user)
                                                        <!-- Modal Delete -->
                                                        <div class="modal fade" id="deleteModal{{ $user->id }}"
                                                            tabindex="-1" aria-labelledby="deleteModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="deleteModalLabel">
                                                                            Confirm Deletion</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Are you sure you want to delete the user
                                                                        <strong>{{ $user->username }}</strong>?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <form action="{{ route('delete-user') }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $user->id }}">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">Cancel</button>
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Delete</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <tr>
                                                            <td>{{ $user->id }}</td>
                                                            <td>{{ $user->username }}</td>
                                                            <td>{{ $user->role }}</td>
                                                            <td>
                                                                <!-- Button to trigger Modal -->
                                                                <button class="btn btn-danger" data-toggle="modal"
                                                                    data-target="#deleteModal{{ $user->id }}"><i
                                                                        class="fa-solid fa-trash"></i></button>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="8" class="text-center fw-bold py-3 fs-6">
                                                                No users found</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <x-footer></x-footer>
                </div>
            </div>
        </div>

        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <script src="js/data-table.js"></script>
    <script src="js/jquery.dataTables.js"></script>
    <script src="js/dataTables.bootstrap4.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>
