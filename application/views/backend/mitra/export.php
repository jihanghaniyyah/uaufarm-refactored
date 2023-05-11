<h4>Data Mitra</h4>
 <table>
                            <thead>
                                    <tr>
                                      
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nama Toko</th>
                                        <th scope="col">Nomor HP</th>
                                        <th scope="col">Id_kategori</th>
                                        <th scope="col">Koordinat</th>
                                       
                                    </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($mitra as $m) : ?>
                                    <tr>
      
                                        <td><?= $m['nama'];     ?></td>
                                        <td><?= $m['nama_toko'];   ?></td>
                                        <td><?= $m['nomor_hp']; ?></td>
                                        <td><?= $m['id_kategori']; ?></td>
                                        <td><?= $m['koordinat']; ?></td>
                                       
                                    </tr>
                                    <?php endforeach; ?>
                            </tbody>
                        </table>
