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
                                        <h2>New Service</h2>
                                    </div>
                                    <div class="d-flex">
                                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                                        <p class="text-muted mb-0 hover-cursor">Service/&nbsp;</p>
                                        <p class="text-primary mb-0 hover-cursor">New Service</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <x-card>
                        <form class="forms-sample" action="{{ route('update-service') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputCode1">Service Code</label>
                                <input readonly name="code" type="text" class="form-control"
                                    id="exampleInputName1" placeholder="Code" value="{{ $services->code }}">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Name</label>
                                        <input name="name" type="text" class="form-control" id="exampleInputName1"
                                            placeholder="Name" value="{{ $services->name }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputConfirmPrice1">Price</label>
                                        <input name="price" type="text" class="form-control"
                                            id="exampleInputPrice1" placeholder="Price" value="{{ $services->price }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmDescription1">Description</label>
                                <textarea name="description" class="form-control" id="exampleTextarea1" rows="4"> {{ $services->description }}</textarea>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <input hidden type="number" name="id" value="{{ $services->id }}">
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <a href="{{ route('service') }}" class="btn btn-danger">Cancel</a>
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
