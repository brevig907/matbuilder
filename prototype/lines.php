<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fuji Test v 0.0.1</title>

    <!-- Bootstrap -->
    <link href="/mat/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        #drawing-mode {
            margin-bottom: 10px;
            vertical-align: top;
        }
        #drawing-mode-options {
            display: inline-block;
            vertical-align: top;
            margin-bottom: 10px;
            margin-top: 10px;
            background: #f5f2f0;
            padding: 10px;
        }
        label {
            display: inline-block; width: 130px;
        }
        .info {
            display: inline-block;
            width: 25px;
            background: #ffc;
        }
        #bd-wrapper {
            min-width: 1500px;
        }
    </style>

</head>
<body>

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <p>&nbsp;</p>
            <p>Testing straight lines .</p>

        </div>
    </div>
    <div class="row">

        <div class="col-lg-6">
            <canvas id="c" width="500" height="500" style="border:1px solid #aaa"></canvas>
        </div>
        <div class="col-lg-6">

            <p>Click inside box to begin drawing.</p>
            <p>Todo: snap lines together and fix line double click feature.</p>

        </div>
    </div>
</div>
</div>




<script src="/mat/js/fuji-mats/fabric.min.js"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed
<script src="/mat/js/bootstrap.min.js"></script> -->

<!-- fuji js libs -->




<script>
    gridId = "fujiCanvas";
    //testing

    // var canvas = new fabric.Canvas('c', { selection: false });


    var canvas = new fabric.Canvas('c', { selection: false });

    var line, isDown;

    canvas.on('mouse:down', function(o){
        isDown = true;
        var pointer = canvas.getPointer(o.e);
        var points = [ pointer.x, pointer.y, pointer.x, pointer.y ];
        line = new fabric.Line(points, {
            strokeWidth: 5,
            fill: 'black',
            stroke: 'black',
            originX: 'center',
            originY: 'center'
        });
        canvas.add(line);
    });

    canvas.on('mouse:move', function(o){
        if (!isDown) return;
        var pointer = canvas.getPointer(o.e);
        line.set({ x2: pointer.x, y2: pointer.y });
        canvas.renderAll();
    });

    canvas.on('mouse:up', function(o){
        isDown = false;
    });


</script>
</body>
</html>