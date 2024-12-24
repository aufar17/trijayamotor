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
                                        <h2>Detail Transaction</h2>
                                    </div>
                                    <div class="d-flex">
                                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                                        <p class="text-primary mb-0 hover-cursor">Detail Transaction</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <x-card>
                        <a class="btn btn-primary mb-4" href="{{ route('transaction') }}"
                            style="display: inline-flex; align-items: center; gap: 5px; white-space: nowrap; padding: 8px 16px; max-width: max-content;">
                            <i class="fa-solid fa-arrow-left"></i>
                        </a>

                        <div class="mb-5"
                            style="border: 1px solid #ccc; border-radius: 8px; padding: 20px; background-color: #f9f9f9;">
                            <div
                                style="display: grid; grid-template-columns: 150px 10px 1fr; row-gap: 10px; column-gap: 10px; align-items: center;">
                                <h6 style="font-weight: bold; margin: 0;">Transaction Code</h6>
                                <span style="margin: 0;">:</span>
                                <span style="font-weight: 500; margin: 0;">{{ $transactions->code }}</span>

                                <h6 style="font-weight: bold; margin: 0;">Date</h6>
                                <span style="margin: 0;">:</span>
                                <span style="font-weight: 500; margin: 0;">{{ $transactions->date }}</span>

                                <h6 style="font-weight: bold; margin: 0;">No. Polisi</h6>
                                <span style="margin: 0;">:</span>
                                <span style="font-weight: 500; margin: 0;">{{ $transactions->vehicle->nopol }}</span>

                                <h6 style="font-weight: bold; margin: 0;">Notes</h6>
                                <span style="margin: 0;">:</span>
                                <span style="font-weight: 500; margin: 0;">{{ $transactions->notes }}</span>

                                <h6 style="font-weight: bold; margin: 0;">Total</h6>
                                <span style="margin: 0;">:</span>
                                <span style="font-weight: 500; margin: 0;">{{ $transactions->Total }}</span>
                            </div>
                        </div>




                    </x-card>
                    <x-card>
                        <div class="mb-3 py-3 px-4"
                            style="border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
                            <h5>Spareparts</h5>
                        </div>
                        <table id="spareparts" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Code</th>
                                    <th>Sparepart</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse (($transactions->transactionInventory ?? [])
                                    as $inven_usage)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $inven_usage->inventory->code }}</td>
                                        <td>{{ $inven_usage->inventory->name }}</td>
                                        <td>{{ $inven_usage->qty }}</td>
                                        <td>Rp
                                            {{ number_format($price = $inven_usage->inventory->sell * $inven_usage->qty, 0, ',', '.') }}
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center fw-bold py-3 fs-6">Empty
                                            spareparts in warehouse</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr class="text-bold">
                                    <td class="text-center fw-bold fs-6" colspan="4">Total</td>
                                    <td class="text-center fw-bold fs-6">{{ $transactions->TotalSpareparts }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </x-card>
                    <x-card>
                        <div class="mb-5 py-3 px-4"
                            style="border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
                            <h5>Services</h5>
                        </div>

                        <table id="services" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Code</th>
                                    <th>Service</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse (($transactions->transactionService ?? [])
                                as $service_usage)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $service_usage->service->code }}</td>
                                        <td>{{ $service_usage->service->name }}</td>
                                        <td>{{ $service_usage->service->PriceService }}</td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center fw-bold py-3 fs-6">Empty
                                            spareparts in warehouse</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="text-center fw-bold fs-6" colspan="3">Total</td>
                                    <td class="text-center fw-bold fs-6">{{ $transactions->TotalServices }}</td>
                                </tr>
                            </tfoot>
                        </table>
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
            $('#spareparts').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#services').DataTable();
        });
    </script>


    <!-- End custom js for this page-->
</body>

</html>
