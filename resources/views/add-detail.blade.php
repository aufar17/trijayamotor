<!DOCTYPE html>
<html lang="en">

<x-head></x-head>
<style>
    .form-control {
        border-color: #B7B7B7;
    }

    .form-control:focus {
        font-weight: 500;

    }
</style>

<body>
    <div class="container-scroller">
        <x-header-sidebar></x-header-sidebar>
        <div class="container-fluid page-body-wrapper">
            <x-sidebar></x-sidebar>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="d-flex justify-content-between flex-wrap">
                                <div class="d-flex align-items-end flex-wrap">
                                    <div class="mr-md-3 mr-xl-5">
                                        <h2>Restock Inventory</h2>
                                    </div>
                                    <div class="d-flex">
                                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                                        <p class="text-muted mb-0 hover-cursor">Inventory/&nbsp;</p>
                                        <p class="text-primary mb-0 hover-cursor">Restock Inventory</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <x-card>
                        <form class="forms-sample" action="{{ route('detail-post') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputCode1">Sparepart Code</label>
                                        <input disabled name="code" type="number" class="form-control"
                                            id="exampleInputName1" placeholder="Code"
                                            value="{{ $get_inventory->code }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputCode1">Name</label>
                                        <input disabled name="name" type="text" class="form-control"
                                            id="exampleInputName1" placeholder="Name"
                                            value="{{ $get_inventory->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group position-relative">
                                        <label for="exampleFormControlSelect2">Supplier</label>
                                        <select class="form-control" id="exampleFormControlSelect2" name="supplier_id"
                                            required>
                                            <option value="" selected disabled>Pilih Supplier</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->code }} -
                                                    {{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                        <i class="fas fa-chevron-down position-absolute"
                                            style="top: 70%; right: 1rem; transform: translateY(-50%); pointer-events: none; margin-right: 10px;"></i>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Quantity</label>
                                        <input name="qty" type="text" class="form-control"
                                            id="exampleInputQuantity1" placeholder="Quantity">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleInputConfirmPurchase1">Purchase</label>
                                        <input name="purchase" type="text" class="form-control"
                                            id="exampleInputPurchase1" placeholder="Purchase">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleInputConfirmPurchase1">Date</label>
                                        <input name="supply_date" type="date" class="form-control"
                                            id="exampleInputPurchase1" placeholder="Date">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <input hidden type="number" name="inventory_id" value="{{ $get_inventory->id }}">
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <a href="{{ route('inventory') }}" class="btn btn-danger">Cancel</a>

                        </form>
                </div>
            </div>
            </x-card>
        </div>
        <x-footer></x-footer>
    </div>
    </div>
    </div>

    <script src="vendors/base/vendor.bundle.base.js"></script>
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
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
