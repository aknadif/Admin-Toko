<div class="col-md-10">
<link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>


<script type="text/javascript">
        function date_time(id)
{
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
        d = date.getDate();
        day = date.getDay();
        days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        h = date.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        result = ''+days[day]+' '+months[month]+' '+d+' '+year;
        result1 = h+':'+m+':'+s;
        document.getElementById(id).innerHTML = result1;
        setTimeout('date_time("'+id+'");','1000');
        return true;
}
</script>
    <body>
<style>
.jam {
    color: #337AB7;
    font-size: 72px;
    font-family: Orbitron;
    margin-left: 450px;
}
.flex-container {
        display: flex;
        flex-direction: row;
        justify-content: center;
        
}
.card {
        
        margin-right: 50px;
        margin-left: 50px;
        margin-top: 50px;
}
.card h4{
        text-align: center;
}

</style>
            <span id="date_time" class="jam"></span>
            <script type="text/javascript">window.onload = date_time('date_time');</script>
<?php 
include '../functions.php';
$sql= mysqli_query($conn, "SELECT * FROM barang WHERE sisa <= '20'");
// $data = $sql->fetch_assoc();
while($data = mysqli_fetch_array($sql)){ ?>
<?php if( $data['sisa'] <= 20 && $data['sisa'] >= 1 ){ ?>
<div class="alert alert-warning fade in text-center">Stok <?= $data['nama_barang']; ?> Tinggal <?= $data['sisa']; ?>, Silahkan tambah stok secepat mungkin.</div> 

<?php } if($data['sisa'] == 0){ ?>
<div class="alert alert-danger fade in text-center">Stok <?= $data['nama_barang']; ?> Telah Habis, Silahkan tambah stok secepat mungkin.</div> 
<?php } ?>
<?php } ?>

<div class="flex-container">
<a href="">
<div class="card text-center" style="width: 30rem; height: 25rem;">
  <div class="card-body">
    <h4 class="card-title">DATA BARANG</h4>
    <p class="card-text"><span class="glyphicon glyphicon-briefcase" style="font-size : 100px; margin-top:20px;"></span></p>
  </div>
</div>
</a>
<a href="#entry">
<div class="card text-center" style="width: 30rem; height: 25rem;">
  <div class="card-body">
    <h4 class="card-title">ENTRY PENJUALAN</h4>
    <p class="card-text"><span class="glyphicon glyphicon-pencil" style="font-size : 100px; margin-top:20px;"></span></p>
  </div>
</div>
</a>
<a href="">
<div class="card text-center" style="width: 30rem; height: 25rem;">
  <div class="card-body">
    <h4 class="card-title">PROFILE</h4>
    <p class="card-text"><span class="glyphicon glyphicon-user" style="font-size : 100px;margin-top:20px;"></span></p>
  </div>
</div>
</a>
</div>



    </body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</div>
