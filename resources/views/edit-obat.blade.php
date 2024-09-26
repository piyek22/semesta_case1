<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tambah obat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header"> Edit Obat</div>
            @if (Session::has('fail'))
            <span class="alert alert-danger p-2">{{ Session::get('fail') }}</span>
            @endif
            <div class="card-body">
                <form action="{{ route('EditObat') }}" method="post">
                    @csrf
                    <input type="hidden" name="obat_id" id="" value="{{ $obat->id }}">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Nama Obat</label>
                        <input type="text" name="nama_obat" value="{{ $obat->nama_obat }}" class="form-control" id="formGroupExampleInput" placeholder="Masukan Nama Obat">
                        @error('nama_obat')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                      <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Kode Obat</label>
                        <input type="text" name="kode_obat" value="{{ $obat->kode_obat }}" class="form-control" id="formGroupExampleInput2" placeholder="masukan kode obat">
                        @error('kode_obat')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                      <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Harga</label>
                        <input type="number" name="harga" value="{{ $obat->harga }}" class="form-control" id="formGroupExampleInput2" placeholder="masukan Harga">
                        @error('harga')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                      <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Stok</label>
                        <input type="number" name="stok" value="{{ $obat->stok }}" class="form-control" id="formGroupExampleInput2" placeholder="Masukan Stok">
                        @error('stok')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
