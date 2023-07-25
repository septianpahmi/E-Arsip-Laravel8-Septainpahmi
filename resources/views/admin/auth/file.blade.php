<base href="/public">
@include('admin.layout.head')
@include('admin.layout.navbar')
@include('admin.layout.sidebar')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Download File</h1>
    </div><!-- End Page Title -->
    <br>
    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <div class="card">
              <div class="card-body">
        
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
                          <a type="button" href="dokumen/{{ $item->dokumen }}" class="btn btn-success">Download</a>
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
  </main><!-- End #main -->
@include('admin.layout.footer')