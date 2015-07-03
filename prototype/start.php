<?php echo "[message:'updating scripts']";
echo '<br/ >';
echo date('Y-m-d'); exit;
?>

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


        .top-header {
            margin-top:4px;
            margin-botton:8px;
        }

        .info-email {
            font-size: 10px;
            position: absolute;
            top: 5px;
            right: 1px;
        }

        #canvas-row {
            display:none;
        }
    </style>

</head>
<body>

<!-- Body -->
<div class="container top-header">
    <div class="row">
        <div class="col-lg-1">
            <img src="/mat/images/site/fuji_mats.png" alt="Fuji Mats"/>
        </div>
        <div class="col-lg-offset-11"></div>
    </div>


    <div class="row">
        <div class="row" id="canvas-row">
            <div class="col-md-6">
                <canvas id="c" width="500" height="500" style="border:1px solid #aaa"></canvas>
            </div>
            <div class="col-md-6">
                <div role="tabpanel">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist" id="tab-options">
                        <li role="presentation" class="active"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Mats</a></li>
                        <li role="presentation"><a href="#colors" aria-controls="colors" role="tab" data-toggle="tab">Colors</a></li>
                        <li role="presentation"><a href="#upload-logo" aria-controls="upload-logo" role="tab" data-toggle="tab">Upload Logo</a></li>
                        <li role="presentation"><a href="#quote" aria-controls="quote" role="tab" data-toggle="tab">Get Quote</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="settings">[place mats here]</div>
                        <div role="tabpanel" class="tab-pane" id="colors">[place color selector here]</div>
                        <div role="tabpanel" class="tab-pane" id="upload-logo">[html5 upload /display /edit here]</div>
                        <div role="tabpanel" class="tab-pane" id="quote">
                            <div class="row" id="quoteForm">
                                <div class="col-md-offset-1"></div>
                                <div class="col-md-10">

                                <form >
                                    <div class="form-group">
                                        <label for="leadName">Contact Name</label>
                                        <input type="text" class="form-control" id="leadName" placeholder="John Doe" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="emailAddress">Email</label>
                                        <input type="email" class="form-control" id="emailAddress" placeholder="johndoe@mygym.com" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="leadPhone">Phone</label>
                                        <input type="email" class="form-control" id="leadPhone">
                                    </div>
                                    <hr/>
                                    <div class="form-group">
                                        <label for="leadCity">City</label>
                                        <input type="text" class="form-control" id="leadCity">
                                    </div>
                                    <div class="form-group">
                                        <label for="leadState">State</label>
                                        <input type="text" class="form-control" id="leadState">
                                    </div>
                                    <div class="form-group">
                                        <label for="leadPostalCode">Postal Code</label>
                                        <input type="text" class="form-control" id="leadPostalCode">
                                    </div>
                                    <hr/>
                                    <div class="checkbox">
                                        <p><strong>Product of interest</strong></p>
                                        <label class="checkbox">
                                            <input type="checkbox" name="products[mma]"> MMA Mat
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="products[tatami]"> Tatami Mat
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="products[wallPads]"> Wall Pads
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="products[wallPadsPrintedLogos]"> Wall Pads Printed Logos
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="products[heavyBags]"> Heavy Bags
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="products[customGiAndGearBags]"> Custom Gis & Gear Bags
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="products[ballRacks]"> Ball Racks
                                        </label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="products[installation]"> Installation
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </form>
                                    </div>
                                <div class="col-md-offset-1"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row" id="start-row">
            <input type="button" class="btn btn-primary" id="start-application" value="Start App"/>
        </div>

    </div>

</div>
<!-- /Body -->


<!-- Settings -->







<!-- modal -->
<div class="modal fade" id="start-app-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="start-app-modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">FUJI Mat Builder</h4>
            </div>
            <div class="modal-body">



                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="measurement" class="col-sm-2 control-label">Measurement</label>
                            <div class="col-sm-9">
                                <select id="measurement" name="measurement"  class="form-control">
                                    <option value="metric">Metric</option>
                                   <!--  <option value="feet">Feet</option> -->
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="length" class="col-sm-2 control-label">Length</label>
                            <div class="col-sm-9">
                                <select id="length" name="length"  class="form-control">
                                    <?php
                                    for ($i=3; $i<=100; $i++) {
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="width" class="col-sm-2 control-label">Width</label>
                            <div class="col-sm-9">
                                <select id="width" name="width"  class="form-control">
                                   <?php
                                    for ($i=3; $i<=100; $i++) {
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="client-email" class="col-sm-2 control-label">Email <span class="glyphicon glyphicon-info-sign info-email" data-toggle="tooltip" data-placement="right" title="friendly tool tip"></span></label>
                            <div class="col-sm-9">
                                <input class="form-control" type="email" name="client-email" id="client-email" required placeholder="Email Address"/>
                            </div>
                            <div class="col-sm-1">

                            </div>
                        </div>
                    </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="init_app()">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->









<script src="/mat/js/fuji-mats/fabric.min.js"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->

<!-- @todo move code out of html layer -->
<script src="/mat/js/bootstrap.min.js"></script>

<script>



    function bind_start_button() {
        $("#start-application").bind('click', function(){
            $(this).unbind();

            $('#start-app-modal').modal({
                keyboard: false
            })

        });
    }

    function bind_tabs() {
        $('#tab-options a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        })
    }

    function hide_modal() {
        $("#start-app-modal").modal('hide');
    }

    function show_canvas(){
        $("#canvas-row").show();
        $("#start-row").hide();
    }

    function init_app()
    {
        hide_modal();
        show_canvas();
        bind_tabs();

        var rect_width = $('#width').val() * 20,
            rect_length = $('#length').val() * 20;


        var canvas = this.__canvas = new fabric.Canvas('c');
        fabric.Object.prototype.transparentCorners = false;

        var rect = new fabric.Rect({
            left: 10,
            top: 30,
            width: rect_width,
            height: rect_length,
            fill: 'white',
            stroke: 'black',
            strokeWidth: 1,
            hasRotatingPoint: false,
            angle: 0,
            padding: 10
        });

        var group = new fabric.Group([rect]);

        canvas.add(group);

    }



    $(document).ready(function(){

        bind_start_button();

       //tool tips
        $('[data-toggle="tooltip"]').tooltip();

    });
</script>
</body>
</html>