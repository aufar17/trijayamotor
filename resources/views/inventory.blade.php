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
                    <h2>Inventory</h2>
                  </div>
                  <div class="d-flex">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                    <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                    <p class="text-primary mb-0 hover-cursor">Inventory</p>
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
            <div class="col-md-12 stretch-card">
              <div class="card px-4 py-3" style="box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);">
                <a href="{{ route('new-inventory') }}"
                  class="btn btn-success d-flex align-items-center justify-content-center gap-2 mb-4 mt-2"
                  style="height: 50px; width: 130px; font-size: 18px;box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);">
                  <i class="fa-solid fa-plus"></i>
                  <span>New Data</span>
                </a>
                <table id="example" class="table table-striped" style="width:100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Code</th>
                      <th>Sparepart</th>
                      <th>Stock</th>
                      <th>Sell</th>
                      <th>Location</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($inventories as $inventory)

                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $inventory->code }}</td>
                      <td>{{ $inventory->name }}</td>
                      <td>{{ $inventory->stock }}</td>
                      <td>{{ $inventory->SellRupiah }}</td>
                      <td>{{ $inventory->location }}</td>
                      <td>
                        <a class="btn btn-info" href=""><i class="fa-solid fa-circle-info"></i></a>
                        <a class="btn btn-warning" href="{{ route('edit-inventory', ['id' => $inventory->id]) }}"><i
                            class="fa-solid fa-pen-to-square"></i></a>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"
                          data-id="{{ $inventory->id }}"><i class="fa-solid fa-trash"></i></button>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="6" class="text-center fw-bold py-3 fs-6">Empty spareparts in warehouse</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <x-footer></x-footer>
      </div>
    </div>
  </div>


  {{-- MODAL DELETE --}}
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this sparepart?
        </div>
        <div class="modal-footer">
          <form id="deleteForm" action="{{ route('delete-inventory') }}" method="POST">
            @csrf
            <input hidden type="text" name="id" id="productId" value="{{ $inventory->id }}">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
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
  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>


  <!-- End custom js for this page-->
</body>

</html>