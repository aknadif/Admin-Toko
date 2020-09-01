
<?php  
include '../functions.php';
 if(isset($_POST["barang_id"]))  
 {  
      $output = '';   
      $query = "SELECT * FROM barang WHERE id = '".$_POST["barang_id"]."'";  
      $result = mysqli_query($conn, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Id</label></td>  
                     <td width="70%">'.$row["id"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Nama</label></td>  
                     <td width="70%">'.$row["nama_barang"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Harga Jual</label></td>  
                     <td width="70%">'.$row["harga_jual"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Jumlah</label></td>  
                     <td width="70%">'.$row["jumlah"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Sisa</label></td>  
                     <td width="70%">'.$row["sisa"].'</td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>Tanggal Inputan</label></td>  
                     <td width="70%">'.$row["tanggal_input"].'</td>  
                </tr>  
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>
