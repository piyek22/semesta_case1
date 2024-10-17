<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Obat</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                STOK OBAT
                <a href="/add/obat" class="btn btn-success btn-sm float-end">Tambahkan Obat</a>
            </div>

            <!-- Notifikasi umum -->
            @if (Session::has('success'))
            <span class="alert alert-success p-2">{{ Session::get('success') }}</span>
            @endif
            @if (Session::has('fail'))
            <span class="alert alert-danger p-2">{{ Session::get('fail') }}</span>
            @endif

            <!-- Notifikasi Stok Obat Menipis -->
            @if (count($obatsMenipis) > 0)
            <div class="alert alert-warning">
                <strong>Perhatian!</strong> Stok obat berikut hampir habis:
                <ul>
                    @foreach ($obatsMenipis as $obat)
                    <li>{{ $obat->nama }} (Stok: {{ $obat->stok }})</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Tabel Obat -->
            <div class="card-body">
                <table class="display" id="my-table">
                    <thead>
                        <th>No</th>
                        <th>Nama Obat</th>
                        <th>Kode Obat</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if (count($all_obats) > 0)
                        @foreach ($all_obats as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->kode_obat }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>
                                <a href="/edit/{{ $item->id }}" class="btn btn-primary btn-sm">Edit</a>
                                <!-- Tambahkan konfirmasi sebelum penghapusan -->
                                <a href="/delete/{{ $item->id }}"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Apakah Anda yakin ingin menghapus obat ini?')">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6">No Obat Found!</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Load jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>

    <script>
        $(document).ready(function () {
            $('#my-table').DataTable();
        });
    </script>
</body>
</html>
