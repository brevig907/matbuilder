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
            <p>Testing draw feature.</p>
            <p>jquery disabled - Note: add jq no conflict to jquery. this may override <strong>$</strong>    conflicts</p>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-6">
            <canvas id="c" width="500" height="500" style="border:1px solid #aaa"></canvas>
        </div>
        <div class="col-lg-6">
            <div style="display: inline-block; margin-left: 10px">
                <button id="drawing-mode" class="btn btn-info">Cancel drawing mode</button><br>
                <button id="clear-canvas" class="btn btn-info">Clear</button><br>

                <div id="drawing-mode-options">
                    <label for="drawing-mode-selector">Mode:</label>
                    <select id="drawing-mode-selector">
                        <option>Pencil</option>

                    </select><br>

                    <label for="drawing-line-width">Line width:</label>
                    <span class="info">2</span><input type="range" value="2" min="0" max="150" id="drawing-line-width"><br>

                    <label for="drawing-color">Line color:</label>
                    <input type="color" value="#000000" id="drawing-color"><br>
<!--
                    <label for="drawing-shadow-color">Shadow color:</label>
                    <input type="color" value="#005E7A" id="drawing-shadow-color"><br>

                    <label for="drawing-shadow-width">Shadow width:</label>
                    <span class="info">0</span><input type="range" value="0" min="0" max="50" id="drawing-shadow-width"><br>

                    <label for="drawing-shadow-offset">Shadow offset:</label>
                    <span class="info">0</span><input type="range" value="0" min="0" max="50" id="drawing-shadow-offset"><br>
                    -->
                </div>
            </div>
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

    var c_canvas = document.getElementById('c');
    var gcontext = c_canvas.getContext("2d");

    for (var x = 0.5; x < 800; x += 50) {
        gcontext.moveTo(x, 0);
        gcontext.lineTo(x, 800);

    }
    for (var y = 0.5; y < 800; y += 50) {
        gcontext.moveTo(0, y);
       gcontext.lineTo(800, y);
    }

    gcontext.strokeStyle = "#eee";
    gcontext.stroke();


    (function() {
        var $ = function(id){return document.getElementById(id)};

        var canvas = this.__canvas = new fabric.Canvas('c', {
            isDrawingMode: true
        });

        fabric.Object.prototype.transparentCorners = false;

        var drawingModeEl = $('drawing-mode'),
            drawingOptionsEl = $('drawing-mode-options'),
            drawingColorEl = $('drawing-color'),
            drawingShadowColorEl = $('drawing-shadow-color'),
            drawingLineWidthEl = $('drawing-line-width'),
            drawingShadowWidth = $('drawing-shadow-width'),
            drawingShadowOffset = $('drawing-shadow-offset'),
            clearEl = $('clear-canvas');

        clearEl.onclick = function() { canvas.clear() };

        drawingModeEl.onclick = function() {
            canvas.isDrawingMode = !canvas.isDrawingMode;
            if (canvas.isDrawingMode) {
                drawingModeEl.innerHTML = 'Cancel drawing mode';
                drawingOptionsEl.style.display = '';
            }
            else {
                drawingModeEl.innerHTML = 'Enter drawing mode';
                drawingOptionsEl.style.display = 'none';
            }
        };

        if (fabric.PatternBrush) {
            var vLinePatternBrush = new fabric.PatternBrush(canvas);
            vLinePatternBrush.getPatternSrc = function() {

                var patternCanvas = fabric.document.createElement('canvas');
                patternCanvas.width = patternCanvas.height = 10;
                var ctx = patternCanvas.getContext('2d');

                ctx.strokeStyle = this.color;
                ctx.lineWidth = 5;
                ctx.beginPath();
                ctx.moveTo(0, 5);
                ctx.lineTo(10, 5);
                ctx.closePath();
                ctx.stroke();

                return patternCanvas;
            };

            var hLinePatternBrush = new fabric.PatternBrush(canvas);
            hLinePatternBrush.getPatternSrc = function() {

                var patternCanvas = fabric.document.createElement('canvas');
                patternCanvas.width = patternCanvas.height = 10;
                var ctx = patternCanvas.getContext('2d');

                ctx.strokeStyle = this.color;
                ctx.lineWidth = 5;
                ctx.beginPath();
                ctx.moveTo(5, 0);
                ctx.lineTo(5, 10);
                ctx.closePath();
                ctx.stroke();

                return patternCanvas;
            };

            var squarePatternBrush = new fabric.PatternBrush(canvas);
            squarePatternBrush.getPatternSrc = function() {

                var squareWidth = 10, squareDistance = 2;

                var patternCanvas = fabric.document.createElement('canvas');
                patternCanvas.width = patternCanvas.height = squareWidth + squareDistance;
                var ctx = patternCanvas.getContext('2d');

                ctx.fillStyle = this.color;
                ctx.fillRect(0, 0, squareWidth, squareWidth);

                return patternCanvas;
            };

            var diamondPatternBrush = new fabric.PatternBrush(canvas);
            diamondPatternBrush.getPatternSrc = function() {

                var squareWidth = 10, squareDistance = 5;
                var patternCanvas = fabric.document.createElement('canvas');
                var rect = new fabric.Rect({
                    width: squareWidth,
                    height: squareWidth,
                    angle: 45,
                    fill: this.color
                });

                var canvasWidth = rect.getBoundingRectWidth();

                patternCanvas.width = patternCanvas.height = canvasWidth + squareDistance;
                rect.set({ left: canvasWidth / 2, top: canvasWidth / 2 });

                var ctx = patternCanvas.getContext('2d');
                rect.render(ctx);

                return patternCanvas;
            };

            var img = new Image();
            img.src = '../assets/honey_im_subtle.png';

            var texturePatternBrush = new fabric.PatternBrush(canvas);
            texturePatternBrush.source = img;
        }

        $('drawing-mode-selector').onchange = function() {

            if (this.value === 'hline') {
                canvas.freeDrawingBrush = vLinePatternBrush;
            }
            else if (this.value === 'vline') {
                canvas.freeDrawingBrush = hLinePatternBrush;
            }
            else if (this.value === 'square') {
                canvas.freeDrawingBrush = squarePatternBrush;
            }
            else if (this.value === 'diamond') {
                canvas.freeDrawingBrush = diamondPatternBrush;
            }
            else if (this.value === 'texture') {
                canvas.freeDrawingBrush = texturePatternBrush;
            }
            else {
                canvas.freeDrawingBrush = new fabric[this.value + 'Brush'](canvas);
            }

            if (canvas.freeDrawingBrush) {
                canvas.freeDrawingBrush.color = drawingColorEl.value;
                canvas.freeDrawingBrush.width = parseInt(drawingLineWidthEl.value, 10) || 1;
                canvas.freeDrawingBrush.shadowBlur = parseInt(drawingShadowWidth.value, 10) || 0;
            }
        };

        drawingColorEl.onchange = function() {
            canvas.freeDrawingBrush.color = this.value;
        };
        drawingShadowColorEl.onchange = function() {
            canvas.freeDrawingBrush.shadowColor = this.value;
        };
        drawingLineWidthEl.onchange = function() {
            canvas.freeDrawingBrush.width = parseInt(this.value, 10) || 1;
            this.previousSibling.innerHTML = this.value;
        };
        drawingShadowWidth.onchange = function() {
            canvas.freeDrawingBrush.shadowBlur = parseInt(this.value, 10) || 0;
            this.previousSibling.innerHTML = this.value;
        };
        drawingShadowOffset.onchange = function() {
            canvas.freeDrawingBrush.shadowOffsetX =
                canvas.freeDrawingBrush.shadowOffsetY = parseInt(this.value, 10) || 0;
            this.previousSibling.innerHTML = this.value;
        };

        if (canvas.freeDrawingBrush) {
            canvas.freeDrawingBrush.color = drawingColorEl.value;
            canvas.freeDrawingBrush.width = parseInt(drawingLineWidthEl.value, 10) || 1;
            canvas.freeDrawingBrush.shadowBlur = 0;
        }
    })();


</script>
</body>
</html>