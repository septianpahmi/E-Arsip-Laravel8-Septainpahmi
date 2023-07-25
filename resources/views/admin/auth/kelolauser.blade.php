<base href="/public">
@include('admin.layout.head')
@include('admin.layout.navbar')
@include('admin.layout.sidebar')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Kelola Akun</h1>
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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
                    Tambah
                  </button>
  
                <!-- Default Table -->
                <table class="table">
                  <thead>
                    <tr align="center">
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">email</th>
                      <th scope="col">Hak Akses</th>
                      <th scope="col">Tanggal dibuat</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  @foreach ($data as $item)
                  <tbody>
                    <tr align="center">
                      <th>{{ $loop->iteration }}</th>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->email }}</td>
                      <td>{{ $item->role }}</td>
                      <td>{{ $item->created_at }}</td>
                      <td>
                        <a href="{{ url('/arsip/kelola-user/del', $item->id) }}" onclick="return confirm('Yakin ingin menghapus?')" type="button" class="btn btn-danger">Hapus</a>
                      </td>
                    </tr>
                  </tbody>
                  @endforeach
                  <tfoot>
                    <tr align="center">
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">email</th>
                      <th scope="col">Hak Akses</th>
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
              <h5 class="modal-title">Tambah Akun</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('/arsip/kelola-user/save') }}" class="row g-3">
                    @csrf
                    <div class="col-md-12">
                      <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="col-md-6">
                      <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="col-md-6">
                      <select id="inputState" name="role" class="form-select" required>
                        <option selected>Hak Akses</option>
                        <option value="Admin">Admin</option>
                        <option value="Guru">Guru</option>
                        <option value="Siswa">Siswa</option>
                      </select>
                    </div>
                    <div class="col-md-12">
                      <input type="password" name="password" class="form-control" placeholder="Password" required>
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