
                    <!-- ======= Hero Section ======= -->
                    <section id="hero" class="d-flex align-items-center">
            
            <div class="container">
            <div class="row">
                      <!-- ======= Pemetaan ======= -->
                      <section id="pemetaan" class="about">
                      <div class="container" >
                                
                        <div id="map"></div>

                        <script>

                          
                          navigator.geolocation.getCurrentPosition(function(location) {
                          var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);
                          var map = L.map('map').setView([-7.274661803990384, 112.79350037199407],13);

                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                            }).addTo(map);
                            
                            
                             // CSS untuk menampikan icon 
                             var icon = new L.Icon({
                             iconUrl     :     'icon/img/mart.png',
                             shadowUrl   :     'icon/img/marker-shadow.png',
                             iconSize    :     [40, 40],
                             iconAnchor  :     [30, 41],
                             popupAnchor :     [1, -34],
                             shadowSize  :     [41, 41]
                          });
                            // Looping data
                            var markers = L.markerClusterGroup();
                          

                            <?php foreach ($mitra as $m):  ?>
                            {
                              
                              var lokasi = L.marker([<?= $m['koordinat']; ?>], {icon: icon}).addTo(map)
                              .bindPopup("<b>Nama : <?= $m['nama'];      ?>" +
                              "<br>Nama Toko   : <?= $m['nama_toko'];  ?>" +
                              "<br>Nomor HP    : <?= $m['nomor_hp'];  ?>" +
                              "<br>Kategori    : <?= $m['nama_kategori'];  ?>" +
                              "<br><center><a href='https://www.google.com/maps/dir/?api=1&origin="  +
				                      location.coords.latitude + "," + location.coords.longitude + "&destination=<?= $m['koordinat']; ?>' class='btn btn-sm btn-outline-success' target='_blank'>Rute</a></center>");
                            }
                                markers.addLayer(lokasi);
                                map.addLayer(markers);
                                map.fitBounds(map.getBounds());
      
                        
                            <?php endforeach; ?>
                           
                              // CSS untuk menampikan icon 
                          var icon = new L.Icon({
                             iconUrl     :     'icon/img/admin.png',
                             shadowUrl   :     'icon/img/marker-shadow.png',
                             iconSize    :     [40, 40],
                             iconAnchor  :     [30, 41],
                             popupAnchor :     [1, -34],
                             shadowSize  :     [41, 41]
                          });
                            // Looping data
                            var markers = L.markerClusterGroup();
                          

                            <?php foreach ($user as $u):  ?>
                            {
                              
                              var lokasi = L.marker([<?= $u['koordinat']; ?>], {icon: icon}).addTo(map)
                              .bindPopup("<b>Nama : <?= $u['nama'];      ?>" +
                              "<br>Nomor HP    : <?= $m['nomor_hp'];  ?>" +
                              "<br><center><a href='https://www.google.com/maps/dir/?api=1&origin="  +
				                      location.coords.latitude + "," + location.coords.longitude + "&destination=<?= $m['koordinat']; ?>' class='btn btn-sm btn-outline-success' target='_blank'>Rute</a></center>");
                            }
                                markers.addLayer(lokasi);
                                map.addLayer(markers);
                                map.fitBounds(map.getBounds());
      
                        
                            <?php endforeach; ?>
                           
                         


                        });
                          
                        </script>

                        </div>
                      </section><!-- End Pemetaan Section -->
  
            </div>
            </div>

            </section><!-- End Hero -->

            <main id="main">
           
        </div>
        <!-- /.container-fluid -->