<!DOCTYPE html>
<html lang="en">

<x-head></x-head>
<style>
    body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 30px 0;
        background-color: #f4f4f4;
    }

    .container {
        width: 800px;
        border: 1px solid #ddd;
        padding: 20px;
        background-color: #f9f9f9;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo {
        width: 100px;
        height: 100px;
    }

    .header-text {
        display: flex;
        align-items: center;
    }

    .header-text h3 {
        margin-left: 10px;
    }

    .date {
        margin-left: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th,
    table td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }

    table thead th {
        background-color: #D9DFC6;
        color: black;
    }

    .total-section {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        font-weight: bold;
        margin-right: 30px;
        font-size: 20px;
    }

    .notes div {
        border: 1px solid black;
        height: 60px;
        padding: 10px;
        background-color: #f9f9f9;
    }
</style>

<body>

    <div class="container">
        <div class="header">
            <div class="header-text">
                <img class="logo" src="{{ asset('images/logo.png') }}" alt="Tri Jaya Motor Logo">
                <h3>Tri Jaya Motor</h3>
            </div>
            <h6 class="date mr-3">{{ $transactions->date }}</h6>
        </div>
        <hr class="mx-3">
        <div class="row mb-1 mx-3">
            <div class="col-12">
                <h6 class="fw-bold">Kepada Yth,</h6>
            </div>
        </div>
        <div class="row mx-3 mb-1 mt-3">
            <div class="col-6" id="nama"
                style="display: grid; grid-template-columns: 100px 10px 1fr; row-gap: 10px; column-gap: 10px; align-items: center;">
                <h6 style="font-weight: bold; margin: 0;">Nama</h6>
                <span style="margin: 0;">:</span>
                <span style="font-weight: 500; margin: 0;">{{ $transactions->vehicle->customer->name }}</span>
            </div>
            <div class="col-6" id="nopol"
                style="display: grid; grid-template-columns: 100px 10px 1fr; row-gap: 10px; column-gap: 10px; align-items: center;">
                <h6 style="font-weight: bold; margin: 0;">No. Polisi</h6>
                <span style="margin: 0;">:</span>
                <span style="font-weight: 500; margin: 0;">{{ $transactions->vehicle->nopol }}</span>
            </div>
        </div>
        <div class="row mx-3 my-1">
            <div class="col-6" id="merk"
                style="display: grid; grid-template-columns: 100px 10px 1fr; row-gap: 10px; column-gap: 10px; align-items: center;">
                <h6 style="font-weight: bold; margin: 0;">Merk</h6>
                <span style="margin: 0;">:</span>
                <span style="font-weight: 500; margin: 0;">{{ $transactions->vehicle->merk }}</span>
            </div>
            <div class="col-6" id="no_chasis"
                style="display: grid; grid-template-columns: 100px 10px 1fr; row-gap: 10px; column-gap: 10px; align-items: center;">
                <h6 style="font-weight: bold; margin: 0;">No. Chasis</h6>
                <span style="margin: 0;">:</span>
                <span style="font-weight: 500; margin: 0;">{{ $transactions->vehicle->chasis_number }}</span>
            </div>
        </div>
        <div class="row mx-3 my-1">
            <div class="col-6" id="model"
                style="display: grid; grid-template-columns: 100px 10px 1fr; row-gap: 10px; column-gap: 10px; align-items: center;">
                <h6 style="font-weight: bold; margin: 0;">Model</h6>
                <span style="margin: 0;">:</span>
                <span style="font-weight: 500; margin: 0;">{{ $transactions->vehicle->model }}</span>
            </div>
        </div>

        <div class="row mx-4 mt-4">
            <div class="col-2 py-2 px-2"
                style="border: 1px solid black;color:black;display:flex;align-items: center;justify-content: center">
                <h5>{{ $transactions->code }}</h5>
            </div>
        </div>
        <div class="row mx-3 mt-2">
            <div class="col-12">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Spareparts</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions->transactionInventory ?? [] as $sparepart)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sparepart->inventory->name }}</td>
                                <td>{{ $sparepart->qty }}</td>
                                <td>{{ $sparepart->inventory->SellRupiah }}</td>
                                <td>Rp
                                    {{ number_format($price = $sparepart->inventory->sell * $sparepart->qty, 0, ',', '.') }}
                                </td>

                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="4"><b>Jumlah</b></td>
                            <td><b>{{ $transactions->total_spareparts }}</b></td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th colspan="3">Services</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions->transactionService ?? [] as $services)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td colspan="3">{{ $services->service->name }}</td>
                                <td>{{ $services->service->PriceService }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4"><b>Jumlah</b></td>
                            <td><b>{{ $transactions->total_services }}</b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="total-section mt-4">
            <div>TOTAL</div>
            <div class="ml-3 px-2 py-2 text-center" style="border: 1px solid black;width:160px">
                {{ $transactions->total }}</div>
        </div>
        <div class="row mx-3">
            <div class="col-12">
                <h6>Notes</h6>
            </div>
        </div>
        <div class="row mx-4">
            <div class="col-12 py-2" style="border: 1px solid black;height:60px">{{ $transactions->notes }}
            </div>
        </div>
        <div class="row mx-3 mt-4">
            <div class="col-6 text-center">
            </div>
            <div class="col-6 text-center">
                <p style="margin-bottom:50px">Penerima</p>
                <div style="border-top: 1px solid black; width: 80%; margin: 0 auto; padding-top: 10px;">
                    <p style="margin: 0;">({{ $transactions->vehicle->customer->name }})</p>
                </div>
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
</body>

</html>
