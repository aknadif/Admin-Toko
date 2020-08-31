<?php 
include '../functions.php';
?>
<div class="container-fluid">
                <h1 class="mt-4"><span class="glyphicon glyphicon-copy"></span> Entry Penjualan Barang</h1>              
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#entryModal">
<span class="glyphicon glyphicon-pencil"></span> Entry Penjualan
</button>

<div class="modal fade" id="entryModal" tabindex="-1" aria-labelledby="entryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="entryModalLabel">Entry Penjualan Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="function/entry_penjualan.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Barang</label>
                        <select class="form-control" id="exampleFormControlSelect1" name='id'>
<?php foreach($barang as $row) : ?>
                        <option value="<?= $row['id']; ?>"><?= $row['nama_barang']; ?></option>
<?php endforeach; ?>
                        </select>
                    </div>
					<div class="form-group">
						<label for="jumlah_terjual">Jumlah Terjual</label>
						<input name="jumlah_terjual" id="jumlah_terjual" type="text" class="form-control" placeholder="Jumlah Barang Terjual ..">
					</div>												
		</div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
      </div>
    </div>
  </div>
</div>


<a href="function/cetaklaporanpenjualan.php" target="_blank"><button type="button" class="cetak btn btn-light" ><span class='glyphicon glyphicon-print'></span> Cetak</button></a>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">No</th>
      <th scope="col">ID Penjualan</th>
      <th scope="col">Tanggal Entry</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Harga Jual</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Total Harga</th>
      <th scope="col">Opsi</th>
    </tr>
  </thead>
  <tbody>
<?php 
$i = 1;
$sql= mysqli_query($conn, "SELECT * FROM penjualan, barang WHERE penjualan.id=barang.id ORDER BY id_penjualan desc");
while ($data = $sql->fetch_assoc()){
?>

    <tr>
      <th scope="row"><?= $i++; ?></th>
      <td><?= $data["id_penjualan"]; ?></td>
      <td><?= $data["tanggal_terjual"]; ?></td>
      <td><?= $data["nama_barang"]; ?></td>
      <td>Rp.<?= $data["harga_jual"]; ?>,-</td>
      <td><?= $data["jumlah_terjual"]; ?></td>
      <td><?= $data["total_harga"]; ?></td>
      <td>
<!-- Button trigger modal -->

<a href="function/hapusentry.php?id=<?= $data["id_penjualan"]; ?>"><button type="button" class="btn btn-danger btn-sm">Hapus</button></> 

<!-- End Button trigger modal -->

      </td>
    </tr>
<?php } ?>
  </tbody>
</table>

</div>