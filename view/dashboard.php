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

</style>
            <span id="date_time" class="jam"></span>
            <script type="text/javascript">window.onload = date_time('date_time');</script>
    </body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</div>
