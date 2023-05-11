<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Kaegori</h1>
    <?php if ($this->session->flashdata('message')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Data<strong> berhasil!</strong> <?= $this->session->flashdata('message'); ?><button type="button" class="close" data-dismiss="alert" arial-label="Close">
            <span arial-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col">

            <div class="card mt-4">
                <div class="card-header">
                    <a href="<?= base_url('kategori/create') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm my-2"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" style="width: 100%;">
                            <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Kategori</th>
                                        
                                    </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kategori as $k) : ?>
                                    <tr>
                                        <th scope="row"><?= ++$start; ?></th>
                                        <td><?= $k['nama_kategori'];     ?></td>
                                        
                                        <td>
                                            <a href="<?= base_url('kategori/read/') . $k['id_kategori']; ?>" class="badge badge-warning">Detail</a>
                                            <a href="<?= base_url('kategori/update/') . $k['id_kategori']; ?>" class="badge badge-success">Update</a>
                                            <a href="<?= base_url('kategori/delete/') . $k['id_kategori']; ?>" class="badge badge-danger" onclick="return confirm('yakin mau didelete?');">Delete</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?= $this->pagination->create_links(); ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
