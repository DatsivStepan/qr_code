<?php
    use yii\helpers\Html;
    use yii\widgets\LinkPager;
    use yii\bootstrap\Alert;
?>
<div class="row wrap">
    <h2>Working Show</h2>
    <div class="col-sm-12">
        <?php
        if(($modelOrder->user_id == Yii::$app->user->id) && ($modelOrder->stan)){
            //echo $modelOrder->id;
            //echo $modelOrder->stan;
            //echo $modelOrder->user_id;
        ?>
        <div class="col-sm-12">
            <a style="float:right;" id="save" class="btn btn-default">Save</a>
        </div>
        <div id="QR-Code" class="container" style="width:100%" data-id='<?= $modelOrder->id;?>'>
            <div class="panel panel-primary">
                <div class="panel-heading" style="display: inline-block;width: 100%;">
                    <h4 style="width:50%;float:left;">QrCodeCam</h4>
                    <div style="width:50%;float:right;margin-top: 5px;margin-bottom: 5px;text-align: right;">
                        <select id="cameraId" class="form-control" style="display: inline-block;width: auto;"></select>
                        <!--<button id="save" type="button" class="btn btn-info btn-sm disabled"><span class="glyphicon glyphicon-picture"></span></button> -->
                        <button id="play" type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-play"></span></button>
                        <button id="stop" type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-stop"></span></button>
                    </div>
                </div>
                <div class="panel-body">
                  <div class="col-md-6" style="text-align: center;">
                      <div class="well" style="position: relative;display: inline-block;">
                          <canvas id="qr-canvas" width="320" height="240"></canvas>       
                          <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                          <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                          <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                          <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                      </div>
                      <div class="well" style="position: relative;" >
                          <label id="zoom-value" width="100">Zoom: 2</label>
                          <input type="range" id="zoom" value="20" min="10" max="30" onchange="changeZoom();"/>
                          <!-- <label id="brightness-value" width="100">Brightness: 0</label>
                          <input type="range" id="brightness" value="0" min="0" max="128" onchange="changeBrightness();"/>
                          <label id="contrast-value" width="100">Contrast: 0</label>
                          <input type="range" id="contrast" value="0" min="0" max="64" onchange="changeContrast();"/>
                          <label id="threshold-value" width="100">Threshold: 0</label>
                          <input type="range" id="threshold" value="0" min="0" max="512" onchange="changeThreshold();"/>
                          <label id="sharpness-value" width="100">Sharpness: off</label>
                          <input type="checkbox" id="sharpness" onchange="changeSharpness();"/>
                          <label id="grayscale-value" width="100">grayscale: off</label>
                          <input type="checkbox" id="grayscale" onchange="changeGrayscale();"/> -->
                      </div>
                  </div>
                  <div class="col-md-6" style="text-align: center;">
                    <div id="result" class="thumbnail">
                      <div class="well" style="position: relative;display: inline-block;">
                        <img id="scanned-img" src="" width="320" height="240">
                      </div>
                      <div class="caption">
                        <h3>Scanned result</h3>
                        <p id="scanned-QR"></p>
                      </div>
                    </div>
                  </div>
              </div>
            <div class="panel-footer">

            </div>
        </div>
    </div>
    </div>
</div>
<?php
        }else{
            ?>
            <div class="col-sm-12">
            <?php
            echo Alert::widget([
                'options' => [
                    'class' => 'alert-warning',
                ],
                'body' => 'Problem! maybe orders is not your or orders is done!',
            ]);
            ?>
            </div>   
            <div class="col-sm-12" style="height:200px;">
            </div>
            <?php
        }
?>