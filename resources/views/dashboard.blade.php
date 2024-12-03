<div class="d-flex flex-column gap-4">
    <div class="card">
        <div class="card-header">SUMMARY</div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Transaksi</h5>
                            <h4><span class="badge text-bg-secondary">{{ number_format($transaksi_count, 0, '.', '.') }}</span></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Item Terjual</h5>
                            <h4><span class="badge text-bg-secondary">{{ number_format($item_terjual_count, 0, '.', '.') }}</span></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Pendapatan</h5>
                            <h4><span class="badge text-bg-secondary">{{ number_format($total_pendapatan, 0, '.', '.') }}</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>