@extends('layouts.app')

@section('content')
<h2>Edit Transaksi</h2>
<div class="card">
    <div class="card-header bg-white">
        <a href="{{ route('transaksi.index') }}" class="btn btn-outline-danger">Kembali</a>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('transaksi.update', $transaksi->id) }}">
            @csrf
            @method('PUT')
            <div class="d-flex flex-column gap-4 mb-4">
                <div class="form-group">
                    <label for="tanggal_pembelian">Tanggal Pembelian</label>
                    <input type="date" class="form-control @error('tanggal_pembelian') is-invalid @enderror" id="tanggal_pembelian" name="tanggal_pembelian" value="{{ old('tanggal_pembelian', $transaksi->tanggal_pembelian) }}" required>
                    @error('tanggal_pembelian')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="total_harga">Total Harga</label>
                    <input type="number" class="form-control @error('total_harga') is-invalid @enderror" id="total_harga" name="total_harga" value="{{ old('total_harga', $transaksi->total_harga) }}" required>
                    @error('total_harga')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bayar">Bayar</label>
                    <input type="number" class="form-control @error('bayar') is-invalid @enderror" id="bayar" name="bayar" value="{{ old('bayar', $transaksi->bayar) }}" required>
                    @error('bayar')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kembalian">Kembalian</label>
                    <input type="number" class="form-control @error('kembalian') is-invalid @enderror" id="kembalian" name="kembalian" value="{{ old('kembalian', $transaksi->kembalian) }}" readonly>
                    @error('kembalian')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

{{--customjs--}}
<script>
    $(document).ready(function() {
        function calculateKembalian() {
            const total_harga = parseInt($('input[name="total_harga"]').val()) || 0;
            const bayar = parseInt($('input[name="bayar"]').val()) || 0;
            const kembalian = bayar - total_harga;
            $('input[name="kembalian"]').val(kembalian);
        }

        $('input[name="bayar"]').on('input', function() {
            calculateKembalian();
        });
    });
</script>
@endsection