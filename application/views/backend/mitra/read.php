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
                        <li class="list-group-item"><b>Nama         :</b>      <?= $mitra['nama'];     ?></li>
                        <li class="list-group-item"><b>Nama Toko    :</b>      <?= $mitra['nama_toko'];   ?></li>
                        <li class="list-group-item"><b>Nomor HP     :</b>      <?= $mitra['nomor_hp']; ?></li>
                        <li class="list-group-item"><b>ID Kategori  :</b>      <?= $mitra['id_kategori'];  ?></li>
                        <li class="list-group-item"><b>Koordinat    :</b>      <?= $mitra['koordinat'];?></li>
                    
                      
                        <li class="list-group-item"><a href="<?= base_url('adminmitra'); ?>" class="btn btn-primary float-right">Kembali</a></li>
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