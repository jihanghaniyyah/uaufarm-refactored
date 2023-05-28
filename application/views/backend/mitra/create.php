<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Data</h1>

    <!-- card untuk tambah data -->
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                  
                </div>
                <div class="card-body">
                    <form action="<?= base_url('mitra/create'); ?>" method="post">
                    <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="<?= set_value('nama'); ?>">
                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="nama_toko">Nama Toko</label>
                            <input type="text" class="form-control" name="nama_toko" id="nama_toko" value="<?= set_value('nama_toko'); ?>">
                            <?= form_error('nama_toko', '<small class="text-danger">', '</small>'); ?>
                        </div>


                        <div class="form-group">
                            <label for="nomor_hp">Nomor HP</label>
                            <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" value="<?= set_value('nomor_hp'); ?>">
                            <?= form_error('nomor_hp', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <label for="id_kategori">ID Kategori</label>
                        <select name="id_kategori" class="custom-select">
                            <option value="1" selected>1 : Perikanan</option>      
                            <option value="2" selected>2 : Pertanian</option>                           
                                                                          
                                                     
                        </select>
                        <?= form_error('id_kategori', '<small class="text-danger pl-3">', '</small>'); ?>

                        <div class="form-group">
                            <label for="nama">Koordinat</label>
                            <input type="text" class="form-control" name="koordinat" id="koordinat" value="<?= set_value('koordinat'); ?>">
                            <?= form_error('koordinat', '<small class="text-danger">', '</small>'); ?>
                        </div>
                       
                       
                        <a href="<?= base_url('mitra'); ?>" class="btn btn-success float-left" type="submit" name="submit">Kembali</a>
                        <button class="btn btn-primary float-right" type="submit" name="submit">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir card -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->