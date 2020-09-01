<?php 

require '../functions.php';
$barang = query("SELECT * FROM barang"); 
$query = "SELECT * FROM barang";  
$result = mysqli_query($conn, $query);  

//  Konfigurasi Pagination
// $jumlahDataPerHalaman = 3;
$jumlahData = count(query("SELECT * FROM barang"));
// $jumlahHalaman = ceil($jumlahData/$jumlahDataPerHalaman);
// $halamanAktif = ( isset($_GET["halaman"])) ? $_GET["halaman"] : 1 ;
// $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
// $barang = query("SELECT * FROM barang LIMIT $awalData, $jumlahDataPerHalaman");
//  End Pagination

?>


<div class="container-fluid">
<h1><span class="glyphicon glyphicon-briefcase"></span> Data Barang</h1>

<!-- Tambah Barang -->

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
<span class="glyphicon glyphicon-plus"></span> Tambah Barang
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="function/tambah.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
					<div class="form-group">
						<label for="nama">Nama Barang</label>
						<input name="nama" id='nama' type="text" class="form-control" placeholder="Nama Barang ..">
					</div>
					<div class="form-group">
						<label for="harga">Harga Jual</label>
						<input name="harga" id="harga" type="text" class="form-control" placeholder="Harga Jual Barang ..">
					</div>
					<div class="form-group">
						<label for="jumlah">Jumlah</label>
						<input name="jumlah" id="jumlah" type="text" class="form-control" placeholder="Jumlah ..">
					</div>													
		</div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>
</div>

<!-- End Tambah Barang -->
<div class="jml">
<p>Jumlah Record &nbsp;&nbsp;&nbsp;: <?= $jumlahData; ?> </p>
<!-- <p>Jumlah Halaman : <?= $jumlahHalaman; ?></p> -->
</div>
<a href="function/cetaklaporandata.php" target="_blank"><button type="button" class="cetak btn btn-light" ><span class='glyphicon glyphicon-print'></span> Cetak</button></a>
<!-- <div class="md-form active-cyan-2 mb-3 search">
  <input class="form-control " type="text" placeholder="Search" aria-label="Search">
</div> -->
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Id Barang</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Harga Jual</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Sisa</th>
      <th scope="col">Opsi</th>
    </tr>
  </thead>
  <tbody>

<?php $i = 1 ?>
<?php foreach($barang as $row) :  ?>
    <tr>
      <th scope="row"><?= $i; ?></th>
      <td><?= $row["id"]; ?></td>
      <td><?= $row["nama_barang"]; ?></td>
      <td>Rp.<?= $row["harga_jual"]; ?>,-</td>
      <td><?= $row["jumlah"]; ?></td>
      <td><?= $row["sisa"]; ?></td>
      <td>
<!-- Button trigger modal -->

<input type="button" name="view" value="Detail" id="<?= $row["id"]; ?>" class="btn btn-info btn-sm view_data" data-toggle="modal" data-target="#detailModal"/>
<a href="#" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubahModal<?php echo $row['id']; ?>">Ubah</a>
<a href="function/hapusdata.php?id=<?= $row["id"]; ?>"><button type="button" class="btn btn-danger btn-sm">Hapus</button></a> 

<!-- End Button trigger modal -->

      </td>
    </tr>
<?php $i++ ?>
<?php endforeach; ?>
  </tbody>
</table>

<!-- Nav Pagination -->
<!-- 
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
        <?php if($i == $halamanAktif) : ?>
          <li class="page-item active"><a class="page-link" href="?halaman=<?= $i;?>"><?= $i;?></a></li>
        <?php else : ?>
          <li class="page-item"><a class="page-link" href="?halaman=<?= $i;?>"><?= $i;?></a></li>
        <?php endif; ?>
    <?php endfor; ?>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav> -->


<!-- End Nav Pagination -->

</div>
<!-- Detail Modal  -->
<div id="detailModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <h4 class="modal-title">Detail Barang</h4>  
                </div>  
                <div class="modal-body" id="barang_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
<!-- End Detail Modal -->
<!-- Ubah Modal -->
<?php 
          $query = mysqli_query($conn, "SELECT * FROM barang");
          $no = 1;
         
          while ($data = mysqli_fetch_assoc($query)) 
          {
            
          ?>
            <!-- Modal Edit Mahasiswa-->
            <div class="modal fade" id="ubahModal<?php echo $data['id']; ?>" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Barang</h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="function/ubah.php" method="post">
                        <?php
                        $id = $data['id']; 
                        $query_edit = mysqli_query($conn, "SELECT * FROM barang WHERE id='$id'");
                        while ($row = mysqli_fetch_array($query_edit)) {  
                        ?>
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <div class="form-group">
                          <label>Nama</label>
                          <input type="text" name="nama_barang" class="form-control" value="<?php echo $row['nama_barang']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Harga</label>
                          <input type="text" name="harga_jual" class="form-control" value="<?php echo $row['harga_jual']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Jumlah</label>
                          <input type="text" name="jumlah" class="form-control" value="<?php echo $row['jumlah']; ?>">      
                        </div>
                        <div class="form-group">
                          <label>Sisa</label>
                          <input type="text" name="sisa" class="form-control" value="<?php echo $row['sisa']; ?>">      
                        </div>
                        <div class="modal-footer">  
                          <button type="submit" name="submit" class="btn btn-success">Update</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        <?php 
                        }
                        ?>        
                      </form>
                  </div>
                </div>
              </div>
            </div>
          <?php               
          } 
          ?>
<!-- End Ubah Modal -->
<!-- Script Detail Modal -->
     <script>  
     $(document).ready(function(){  
          $('.view_data').click(function(){  
               var barang_id = $(this).attr("id");  
               $.ajax({  
                    url:"function/detail.php",  
                    method:"post",  
                    data:{barang_id:barang_id},  
                    success:function(data){  
                         $('#barang_detail').html(data);  
                         $('#detailModal').modal("show");  
                    }  
               });  
          });  
     });  
     </script>
<!-- End Script Detail Modal -->

