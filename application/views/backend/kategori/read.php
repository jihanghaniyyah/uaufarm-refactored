<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- card untuk view data -->
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    Detail Data
                </div>
                <!-- Untuk memanggil data kemudian ditampilkan ke detail -->
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Nama Kategori        :</b>      <?= $kategori['nama_kategori'];     ?></li>
                              
                        <li class="list-group-item"><a href="<?= base_url('kategori'); ?>" class="btn btn-primary float-right">Kembali</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir card -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->