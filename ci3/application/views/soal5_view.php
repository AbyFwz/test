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
    <span>Total harga: &nbsp;</span>
    <input type="number" name="total" id="total" placeholder="Inputkan total harga">
    <br><br>
    <span>Persen pajak: &nbsp;</span>
    <input type="number" name="persen_pajak" id="persen_pajak" placeholder="Inputkan persenan pajak">
    <br><br>
    <button type="submit" id="submit"><b>Submit</b></button>
    <br><br>
    <div id="detail">

    </div>
</body>
<script>
    $('#submit').click(function() {
        let total = $("#total").val();
        let persen_pajak = $("#persen_pajak").val();

        $.ajax({
            url: '/ci3/ajax-request-soal5',
            type: 'POST',
            data: {
                total: total,
                persen_pajak: persen_pajak
            },
            error: function() {
                console.log("Something is wrong!");
            },
            success: function(data) {
                // Get data dari controller
                let result = $.parseJSON(data);
                console.log(result);
                // Memasukkan data yang awalnya array menjadi variable tunggal
                let net_sales = result.net_sales;
                let pajak_rp = result.pajak_rp;
                // Destroy elemen detail
                $("#output").remove();
                // Show nilai dari perhitungan pajak
                $("#detail").append("<div id='output'><span>Net Sales: " + net_sales + "</span><br><span>Pajak: " + pajak_rp + "</span></div>");
            }
        })
    });
</script>

</html>