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

        #canvas-container {
            position: relative;
            width: 500px;
            height: 500px;

            margin: 10px auto;
            border: 0px;
        }
        #canvas-container.over {
            border: 5px dashed cyan;
        }
        #images img.img_dragging {
            opacity: 0.4;
        }
        /*
        Styles below based on  http://www.html5rocks.com/en/tutorials/dnd/basics/
        */

        /* Prevent the text contents of draggable elements from being selectable. */
        [draggable] {
            -moz-user-select: none;
            -khtml-user-select: none;
            -webkit-user-select: none;
            user-select: none;
            /* Required to make elements draggable in old WebKit */
            -khtml-user-drag: element;
            -webkit-user-drag: element;
            cursor: move;
        }
    </style>

</head>
<body>

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <p>&nbsp;</p>


        </div>
    </div>
    <div class="row">

        <div class="col-lg-6">
            <div id="canvas-container">
                <canvas id="c" width="500" height="500" style="border:1px solid #aaa"></canvas>
            </div>
        </div>
        <div class="col-lg-6">
            <div id="images">
                <img draggable="true" src="/mat/images/site/fuji_mats.png" />
                <br/>
                <img draggable="true" src="/mat/images/site/black_mat.jpg" style="width:25%; height:25%" />
                <img draggable="true" src="/mat/images/site/red_mat.jpg" style="width:25%; height:25%" />

            </div>

        </div>
    </div>
</div>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>
<script src="/mat/js/fuji-mats/fabric.min.js"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->

<!-- @todo move code out of html layer -->
<script src="/mat/js/bootstrap.min.js"></script>
<!-- fuji js libs -->


<script>
    gridId = "fujiCanvas";




    var canvas = new fabric.Canvas('c');

    /*
     NOTE: the start and end handlers are events for the <img> elements; the rest are bound to
     the canvas container.
     */

    function handleDragStart(e) {
        [].forEach.call(images, function (img) {
            img.classList.remove('img_dragging');
        });
        this.classList.add('img_dragging');
    }

    function handleDragOver(e) {
        if (e.preventDefault) {
            e.preventDefault(); // Necessary. Allows us to drop.
        }

        e.dataTransfer.dropEffect = 'copy'; // See the section on the DataTransfer object.
        // NOTE: comment above refers to the article (see top) -natchiketa

        return false;
    }

    function handleDragEnter(e) {
        // this / e.target is the current hover target.
        this.classList.add('over');
    }

    function handleDragLeave(e) {
        this.classList.remove('over'); // this / e.target is previous target element.
    }

    function handleDrop(e) {
        // this / e.target is current target element.

        if (e.stopPropagation) {
            e.stopPropagation(); // stops the browser from redirecting.
        }

        var img = document.querySelector('#images img.img_dragging');

        console.log('event: ', e);

        var newImage = new fabric.Image(img, {
            width: img.width,
            height: img.height,
            // Set the center of the new object based on the event coordinates relative
            // to the canvas container.
            left: e.layerX,
            top: e.layerY
        });
        canvas.add(newImage);

        return false;
    }

    function handleDragEnd(e) {
        // this/e.target is the source node.
        [].forEach.call(images, function (img) {
            img.classList.remove('img_dragging');
        });
    }

    $(document).ready(function() {
        if (Modernizr.draganddrop) {
            // Browser supports HTML5 DnD.

            // Bind the event listeners for the image elements
            var images = document.querySelectorAll('#images img');
            [].forEach.call(images, function (img) {
                img.addEventListener('dragstart', handleDragStart, false);
                img.addEventListener('dragend', handleDragEnd, false);
            });
            // Bind the event listeners for the canvas
            var canvasContainer = document.getElementById('canvas-container');
            canvasContainer.addEventListener('dragenter', handleDragEnter, false);
            canvasContainer.addEventListener('dragover', handleDragOver, false);
            canvasContainer.addEventListener('dragleave', handleDragLeave, false);
            canvasContainer.addEventListener('drop', handleDrop, false);
        } else {
            // Replace with a fallback to a library solution.
            alert("This browser doesn't support the HTML5 Drag and Drop API.");
        }
    });

</script>
</body>
</html>