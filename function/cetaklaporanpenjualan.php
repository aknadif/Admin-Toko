<html>
<head>
	<title>DATABASE TOKO</title>
</head>
<body>
 
	<center>
 
		<h2>DATA LAPORAN PENJUALAN BARANG</h2>
		<h4>TOKO</h4>
 
	</center>
 
	<?php 
	include '../functions.php';
	?>
 
	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>Tanggal Entry</th>
			<th>Nama Barang</th>
			<th width="5%">Jumlah</th>
            <th>Harga Jual</th>
            <th>Total Harga</th>
		</tr>
		<?php 
		$no = 1;
		$sql = mysqli_query($conn,"SELECT * FROM penjualan, barang WHERE penjualan.id=barang.id ORDER BY id_penjualan desc");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
            <td><?php echo $data['tanggal_terjual']; ?></td> 
			<td><?php echo $data['nama_barang']; ?></td>
			<td><?php echo $data['jumlah_terjual']; ?></td>
			<td><?php echo $data['harga_jual']; ?></td>
            <td><?php echo $data['total_harga']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
 
	<script>
		window.print();
	</script>
 
</body>
</html>