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
            <p>Testing rec.</p>
            <p>click to drag or resize.</p>

        </div>
    </div>
    <div class="row">

        <div class="col-lg-6">
            <canvas id="c" width="500" height="500" style="border:1px solid #aaa"></canvas>
        </div>
        <div class="col-lg-6">
            <p>form disabled. </p>
            <p>note: function updateRec() can't find group array.</p>
           <div class="row">
               <div class="col-md-12"><label>left: <input type="text" name="left" id="left" value="100" disabled/></label> </div>
           </div>
            <div class="row">
               <div class="col-md-3"><label>top: <input type="text" name="top" id="top" value="50" disabled/></label> </div>
            </div>
            <div class="row">
               <div class="col-md-3"><label>width: <input type="text" name="width" id="width" value="100" disabled/></label> </div>
            </div>

            <div class="row">
                <div class="col-md-3"><label>height: <input type="text" name="height" id="height" value="100" disabled/></label> </div>
            </div>

            <div class="row">
                <div class="col-md-3"> <input name="update" id="update" value="update" type="button" class="btn" disabled  onclick="updateRec();"/> </div>
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







        var canvas = this.__canvas = new fabric.Canvas('c');
        fabric.Object.prototype.transparentCorners = false;

        var rect = new fabric.Rect({
        left: 100,
        top: 50,
        width: 100,
        height: 100,
        fill: 'black',
        angle: 0,
        padding: 10
        });

        var group = new fabric.Group([rect]);

        canvas.add(group);


/**
        canvas.on('after:render', function() {
            canvas.contextContainer.strokeStyle = '#555';

            canvas.forEachObject(function(obj) {
                var bound = obj.getBoundingRect();

                canvas.contextContainer.strokeRect(
                    bound.left + 0.5,
                    bound.top + 0.5,
                    bound.width,
                    bound.height
                );
            })
        });
 **/


    function updateRec(){
        group.item(0).set({fill:'red'});
    }


</script>
</body>
</html>