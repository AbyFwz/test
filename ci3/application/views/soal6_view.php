<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 5</title>

    <!-- Jquery Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <span>Harga sebelum markup: &nbsp;</span>
    <input type="number" name="harga_sebelum_markup" id="harga_sebelum_markup" placeholder="Inputkan total harga">
    <br><br>
    <span>Markup persen: &nbsp;</span>
    <input type="number" name="markup_persen" id="markup_persen" placeholder="Inputkan persenan markup">
    <br><br>
    <span>Share persen: &nbsp;</span>
    <input type="number" name="share_persen" id="share_persen" placeholder="Inputkan persenan share">
    <br><br>
    <button type="submit" id="submit"><b>Submit</b></button>
    <br><br>
    <div id="detail">

    </div>
</body>
<script>
    $('#submit').click(function() {
        let harga_sebelum_markup = $("#harga_sebelum_markup").val();
        let markup_persen = $("#markup_persen").val();
        let share_persen = $("#share_persen").val();

        $.ajax({
            url: '/ci3/ajax-request-soal6',
            type: 'POST',
            data: {
                harga_sebelum_markup: harga_sebelum_markup,
                markup_persen: markup_persen,
                share_persen: share_persen
            },
            error: function() {
                console.log("Something is wrong!");
            },
            success: function(data) {
                // Get data dari controller
                let result = $.parseJSON(data);
                console.log(result);
                // Memasukkan data yang awalnya array menjadi variable tunggal
                let net_untuk_resto = result.net_untuk_resto;
                let share_untuk_ojol = result.share_untuk_ojol;
                // Destroy elemen detail
                $("#output").remove();
                // Show nilai dari perhitungan pajak
                $("#detail").append("<div id='output'><span>Net untuk resto: Rp. " + net_untuk_resto + "</span><br><span>Share untuk ojol: Rp. " + share_untuk_ojol + "</span></div>");
            }
        })
    });
</script>

</html>