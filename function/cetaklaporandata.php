<html>
<head>
	<title>DATABASE TOKO</title>
</head>
<body>
 
	<center>
 
		<h2>DATA LAPORAN BARANG</h2>
		<h4>TOKO</h4>
 
	</center>
 
	<?php 
	include '../functions.php';
	?>
 
	<table border="1" style="width: 100%">
		<tr>
			<th width="1%">No</th>
			<th>Nama Barang</th>
            <th>Harga Jual</th>
			<th width="5%">Jumlah</th>
            <th>Sisa</th>
			<th>Tanggal Input</th>
		</tr>
		<?php 
		$no = 1;
		$sql = mysqli_query($conn,"select * from barang");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $data['nama_barang']; ?></td>
			<td><?php echo $data['harga_jual']; ?></td>
			<td><?php echo $data['jumlah']; ?></td>
            <td><?php echo $data['sisa']; ?></td>
            <td><?php echo $data['tanggal_input']; ?></td> 
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