<!DOCTYPE html>
<html lang="en">

<x-head></x-head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <x-header-sidebar></x-header-sidebar>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <x-sidebar></x-sidebar>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="d-flex justify-content-between flex-wrap">
                                <div class="d-flex align-items-end flex-wrap">
                                    <div class="mr-md-3 mr-xl-5">
                                        <h2>Detail Supplier</h2>
                                    </div>
                                    <div class="d-flex">
                                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                                        <p class="text-primary mb-0 hover-cursor">Detail Supplier</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <x-card>
                        <div class="px-3" style="font-size: 18px;">
                            <div class="row mb-2">
                                <div class="col-3 fw-bold">Code</div>
                                <div class="col-auto">:</div>
                                <div class="col">{{ $supplier->code }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3 fw-bold">Name</div>
                                <div class="col-auto">:</div>
                                <div class="col">{{ $supplier->name }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3 fw-bold">Email</div>
                                <div class="col-auto">:</div>
                                <div class="col">{{ $supplier->email }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3 fw-bold">Phone</div>
                                <div class="col-auto">:</div>
                                <div class="col">{{ $supplier->phone }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3 fw-bold">Address</div>
                                <div class="col-auto">:</div>
                                <div class="col">{{ $supplier->address }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3 fw-bold">Province</div>
                                <div class="col-auto">:</div>
                                <div class="col">{{ $supplier->province }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3 fw-bold">Cities</div>
                                <div class="col-auto">:</div>
                                <div class="col">{{ $supplier->cities }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3 fw-bold">Bank</div>
                                <div class="col-auto">:</div>
                                <div class="col">{{ $supplier->bank }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3 fw-bold">Bank Account</div>
                                <div class="col-auto">:</div>
                                <div class="col">{{ $supplier->bank_account }}</div>
                            </div>
                        </div>
                    </x-card>
                </div>
                <x-footer></x-footer>
            </div>
        </div>
    </div>



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


    <!-- End custom js for this page-->
</body>

</html>
