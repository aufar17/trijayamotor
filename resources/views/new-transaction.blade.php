<!DOCTYPE html>
<html lang="en">

<x-head></x-head>
<style>
    .thick-hr {
        height: 3px;
        background-color: black;
        border: none;
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
                                        <h2>New Transaction</h2>
                                    </div>
                                    <div class="d-flex">
                                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                                        <p class="text-muted mb-0 hover-cursor">Transaction/&nbsp;</p>
                                        <p class="text-primary mb-0 hover-cursor">New Transaction</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <x-card>
                        <form class="forms-sample" action="{{ route('transaction-post') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="exampleInputCode1">Transaction Code</label>
                                        <input name="code" type="text" class="form-control" id="exampleInputName1"
                                            placeholder="Code">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group position-relative">
                                        <label for="exampleFormControlSelect2">Vehicle</label>
                                        <select class="form-control" id="exampleFormControlSelect2" name="vehicle_id"
                                            required>
                                            <option value="" selected disabled>Pilih Vehicle</option>
                                            @foreach ($vehicles as $vehicle)
                                                <option value="{{ $vehicle->id }}">{{ $vehicle->id }} -
                                                    {{ $vehicle->merk }} {{ $vehicle->model }} -
                                                    {{ $vehicle->nopol }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputDate1">Date</label>
                                        <input name="date" type="date" class="form-control" id="exampleInputDate1"
                                            placeholder="Date">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleTextarea1">Notes</label>
                                <textarea name="notes" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                            </div>

                            <hr class="thick-hr mt-3 mb-5">


                            <div class="mb-3 py-3 px-4"
                                style="border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
                                <h5>Spareparts</h5>
                            </div>
                            <div id="sparepartContainer"></div>
                            <button type="button" class="btn btn-success mt-2" id="addSparepartButton"><i
                                    class="fa-solid fa-plus"></i> Add Sparepart</button>

                            <hr class="thick-hr mt-3 mb-5">

                            <div class="mb-3 py-3 px-4"
                                style="border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
                                <h5>Services</h5>
                            </div>
                            <div id="serviceContainer"></div>
                            <button type="button" class="btn btn-success mt-2" id="addServiceButton"><i
                                    class="fa-solid fa-plus"></i> Add Service</button>

                            <hr class="thick-hr mt-3 mb-4">

                            <div class="row mt-3">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <a href="{{ route('transaction') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </x-card>
                </div>
                <x-footer></x-footer>
            </div>
        </div>
    </div>


    <script src="vendors/base/vendor.bundle.base.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Modal HTML -->
    <div class="modal fade" id="stockModal" tabindex="-1" role="dialog" aria-labelledby="stockModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="stockModalLabel">Insufficient Stock</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalMessage">
                    <!-- Dynamic message will go here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let sparepartCount = 0;
            let serviceCount = 0;

            // Tambahkan sparepart
            $('#addSparepartButton').click(function() {
                sparepartCount++;
                const sparepartHTML = `
                <div class="form-group row mt-3" id="sparepart-${sparepartCount}">
                    <div class="col-8">
                        <div class="form-group position-relative">
                            <label for="sparepartSelect-${sparepartCount}">Spareparts</label>
                            <select class="form-control sparepart-select" id="sparepartSelect-${sparepartCount}" name="inventory_id[]" data-index="${sparepartCount}" required>
                                <option value="" selected disabled>Choose Spareparts</option>
                                @foreach ($inventories as $inventory)
                                    <option value="{{ $inventory->id }}" data-price="{{ $inventory->sell_price }}" data-stock="{{ $inventory->stock }}">
                                        {{ $inventory->code }} - {{ $inventory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <label for="sparepartQty-${sparepartCount}">Quantity</label>
                        <input type="number" class="form-control" id="sparepartQty-${sparepartCount}" name="qty[]" placeholder="Qty">
                    </div>
                    <div class="col-1">
                        <label>Action</label>
                        <button type="button" class="btn btn-danger btn-block" onclick="removeSparepart(${sparepartCount})"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </div>
            `;
                $('#sparepartContainer').append(sparepartHTML);
            });

            // Tambahkan service
            $('#addServiceButton').click(function() {
                serviceCount++;
                const serviceHTML = `
                <div class="form-group row mt-3" id="service-${serviceCount}">
                    <div class="col-11">
                        <div class="form-group position-relative">
                            <label for="serviceSelect-${serviceCount}">Services</label>
                            <select class="form-control service-select" id="serviceSelect-${serviceCount}" name="service_id[]" required>
                                <option value="" selected disabled>Choose Services</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}" data-price="{{ $service->price }}">
                                        {{ $service->code }} - {{ $service->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-1">
                        <label>Action</label>
                        <button type="button" class="btn btn-danger btn-block" onclick="removeService(${serviceCount})"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </div>
            `;
                $('#serviceContainer').append(serviceHTML);
            });

            // Pengecekan stok sebelum submit form
            $('form').submit(function(event) {
                let isValid = true;
                // Cek semua sparepart yang ditambahkan
                $('select[name="inventory_id[]"]').each(function() {
                    const selectedOption = $(this).find('option:selected');
                    const availableStock = parseInt(selectedOption.data(
                        'stock')); // Ambil stok dari data-stock
                    const qty = parseInt($('#sparepartQty-' + $(this).data('index'))
                        .val()); // Ambil quantity dari input

                    if (qty > availableStock) {
                        alert('Stock tidak mencukupi untuk barang ' + selectedOption.text());
                        isValid = false;
                        return false; // Hentikan pengecekan lebih lanjut
                    }
                });

                if (!isValid) {
                    event.preventDefault(); // Cegah form submit jika stok tidak mencukupi
                }
            });
        });

        function removeSparepart(id) {
            $(`#sparepart-${id}`).remove();
        }

        function removeService(id) {
            $(`#service-${id}`).remove();
        }
    </script>

</body>

</html>
