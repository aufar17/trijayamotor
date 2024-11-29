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
                                        <h2>Edit Inventory</h2>
                                    </div>
                                    <div class="d-flex">
                                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                                        <p class="text-muted mb-0 hover-cursor">Inventory/&nbsp;</p>
                                        <p class="text-primary mb-0 hover-cursor">Edit Inventory</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <x-card>
                        <form class="forms-sample" action="{{ route('update-inventory') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputCode1">Sparepart Code</label>
                                        <input name="code" type="number" class="form-control" id="exampleInputName1"
                                            placeholder="Code" value="{{ $inventory->code }}" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Supplier</label>
                                        <select class="form-control" id="exampleFormControlSelect2" name="supplier_id"
                                            required>
                                            <option value="" disabled>Pilih Supplier</option>
                                            @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}" {{ $inventory->supplier_id ==
                                                $supplier->id ? 'selected' : '' }}>
                                                {{ $supplier->code }} - {{ $supplier->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <i class="fas fa-chevron-down position-absolute"
                                            style="top: 50%; right: 1rem; transform: translateY(-50%); pointer-events: none;margin-right:10px"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Name</label>
                                        <input name="name" type="text" class="form-control" id="exampleInputName1"
                                            placeholder="Name" value="{{ $inventory->name }}" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputStock1">Stock</label>
                                        <input name="stock" type="number" class="form-control" id="exampleInputStock1"
                                            placeholder="Stock" value="{{ $inventory->stock }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputConfirmPurchase1">Purchase</label>
                                        <input name="purchase" type="number" class="form-control"
                                            id="exampleInputPurchase1" placeholder="Purchase"
                                            value="{{ $inventory->purchase }}" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputSell1">Sell</label>
                                        <input name="sell" type="number" class="form-control" id="exampleInputSell1"
                                            placeholder="Sell" value="{{ $inventory->sell }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputConfirmDescription1">Description</label>
                                <textarea name="description" class="form-control" id="exampleTextarea1" rows="4"
                                    required>{{ $inventory->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmLocation1">Location</label>
                                <input name="location" type="text" class="form-control" id="exampleInputLocation1"
                                    placeholder="Location" value="{{ $inventory->location }}" required>
                            </div>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <input hidden type="number" name="id" value="{{ $inventory->id }}">
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <a href="{{ route('inventory') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </form>


                </div>
            </div>
            </x-card>
        </div>
        <x-footer></x-footer>
    </div>
    </div>
    </div>

    <!-- plugins:js -->
    <script src="{{ url('vendors/base/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{ url('vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ url('vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ url('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ url('js/off-canvas.js') }}"></script>
    <script src="{{ url('js/hoverable-collapse.js') }}"></script>
    <script src="{{ url('js/template.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ url('js/dashboard.js') }}"></script>
    <script src="{{ url('js/data-table.js') }}"></script>
    <script src="{{ url('js/jquery.dataTables.js') }}"></script>
    <script src="{{ url('js/dataTables.bootstrap4.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
    });
    </script>


    <!-- End custom js for this page-->
</body>

</html>