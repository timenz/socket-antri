<?php require_once "../setting.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>00</title>

    <!-- Bootstrap core CSS -->
    <link href="./libs/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/style.css" rel="stylesheet">

</head>

<body>

<div class="container">

    <div class="row">
        <div class="col-xs-6">
            <div id="number" style="font-weight: bold; font-size: 120px;"></div>
        </div>
        <div class="col-xs-6">
            <button class="btn btn-lg" id="button">NEXT</button>
            <br>
            <br>
            <br>
            <br>
            <a href="display.php" target="_blank">buka display</a>
        </div>
    </div>

</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="./libs/jquery/dist/jquery.min.js"></script>
<script src="./libs/bootstrap/dist/js/bootstrap.min.js"></script>


<script src="<?php echo $baseUrl; ?>/socket.io/socket.io.js"></script>


<script>
    var socket = io('<?php echo $baseUrl; ?>');

    if(socket){
        $('#button').click(function(){
            socket.emit('add', []);
        });

        socket.on('display', function(data){
            console.log(data);
            $('#number').html(data)
        })
    }

</script>

</body>
</html>
