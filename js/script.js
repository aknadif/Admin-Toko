$(document).ready(function() {
    $('.klik_menu').click(function() {
        var menu = $(this).attr('id');
        if (menu == "dashboard") {
            $('.badan').load('view/dashboard.php');
        } else if (menu == "data") {
            $('.badan').load('view/data.php');
        } else if (menu == "entry") {
            $('.badan').load('view/entry.php');
        } else if (menu == "profile") {
            $('.badan').load('view/profile.php');
        }
    });
    // halaman yang di load default pertama kali
    $('.badan').load('view/dashboard.php');



});