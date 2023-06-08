<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Update Data</h1>

<!-- card untuk edit data -->
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
             
            </div>
                
            <div class="card-body">
            <form action="" method="post">
            <input type="hidden" name="id" value="<?= $kategori['id_kategori']?>" />
          
                       <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" value="<?= set_value('nama_kategori') ?: $kategori["nama_kategori"]; ?>">
                            <?= form_error('nama_kategori', '<small class="text-danger">', '</small>'); ?>
                        </div>

                       
                    <a href="<?= base_url('adminkategori'); ?>" class="btn btn-success float-left" type="submit" name="submit">Kembali</a>
                    <button class="btn btn-primary float-right" type="submit" name="submit">Simpan Data</button>
                    
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