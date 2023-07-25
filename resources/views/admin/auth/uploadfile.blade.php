<base href="/public">
@include('admin.layout.head')
@include('admin.layout.navbar')
@include('admin.layout.sidebar')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Upload File</h1>
    </div><!-- End Page Title -->
    <br>
    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <div class="card">
              <div class="card-body">
                <br>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#largeModal">
                    Tambah
                  </button>
  
                <!-- Default Table -->
                <table class="table">
                  <thead>
                    <tr align="center">
                      <th scope="col">#</th>
                      <th scope="col">Nama File</th>
                      <th scope="col">Jenis File</th>
                      <th scope="col">Tanggal dibuat</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  @foreach ($data as $item)
                  <tbody>
                    <tr align="center">
                      <th>{{ $loop->iteration }}</th>
                      <td>{{ $item->name_file }}</td>
                      <td>{{ $item->dokumen }}</td>
                      <td>{{ $item->created_at }}</td>
                      <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal1">
                            Edit
                          </button>
                          <a href="{{ url('/arsip/uploadfile/delfile', $item->id) }}" onclick="return confirm('Yakin ingin menghapus?')" type="button" class="btn btn-danger">Hapus</a>
                        </td>
                      
                    </tr>
                  </tbody>
                  @endforeach
                  <tfoot>
                    <tr align="center">
                        <th scope="col">#</th>
                        <th scope="col">Nama File</th>
                        <th scope="col">Jenis File</th>
                        <th scope="col">Tanggal dibuat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                  </tfoot>
                </table>
          </div>
        </div><!-- End Left side columns -->
        
      </div>
    </section>
    <!-- Large Modal -->
      <div class="modal fade" id="largeModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Upload File</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('/arsip/uploadfile/savefile') }}" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    <div class="col-md-12">
                      <input type="text" class="form-control" name="name" placeholder="File Name" required>
                    </div>
                    <div class="col-md-6">
                      <input type="file" class="form-control" name="file" placeholder="file" required>
                    </div>
                    <p>Input file dengan ekstensi <br><b>PDF, D0C, DOCX, PPT, PPTX, XLS, XLSX, DLL</b><br>Maks. 5Mb</p>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  </form>
            </div>
          </div>
        </div>
      </div><!-- End Large Modal-->

      <!-- Large Modal -->
      <div class="modal fade" id="largeModal1" tabindex="-1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit File</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('/arsip/uploadfile/editfile', $data->id) }}" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    <div class="col-md-12">
                      <input type="text" class="form-control" name="name" placeholder="File Name" required>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  </form>
            </div>
          </div>
        </div>
      </div><!-- End Large Modal-->
  </main><!-- End #main -->
@include('admin.layout.footer')