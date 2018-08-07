<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>How to Use Webcam In PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <link href="https://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">
    
</head>

<body>
<div class="row">
    <div class="col-lg-4">
        <div id="camera"></div>

    </div>
</div>

<button id="take_snapshots" class="btn btn-success btn-sm">Verify Identity</button>


</body>
</html>
<style>
    #camera {

        height: 480px;
    }

</style>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="jpeg_camera/jpeg_camera_with_dependencies.min.js" type="text/javascript"></script>
<script>


    var options = {
        shutter_ogg_url: "jpeg_camera/shutter.ogg",
        shutter_mp3_url: "jpeg_camera/shutter.mp3",
        swf_url: "jpeg_camera/jpeg_camera.swf",
    };
    var camera = new JpegCamera("#camera", options);

    $('#take_snapshots').click(function () {
        setInterval(function () {
            var snapshot = camera.capture();
            snapshot.show();

            snapshot.upload({api_url: "action.php"}).done(function (response) {
                $('#imagelist').prepend("<tr><td><img src='" + response + "' width='100px' height='100px'></td><td>" + response + "</td></tr>");
            }).fail(function (response) {
                alert("Upload failed with status " + response);
            })
        }, 600000);

    });


</script>