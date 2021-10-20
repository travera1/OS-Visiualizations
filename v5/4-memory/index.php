<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Memory Allocation</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src='main.js'></script>
</head>

<body>

    <?php include '../../templates/navbar.php'; ?>

    <br>
    <div class="d-flex align-items-center justify-content-center">
        <h1 id="title">Memory Allocation</h1><br>
    </div>
    <!-- <div class="d-flex align-items-center justify-content-center">
        <h5>Input Data</h2>
    </div>
    <div class="d-flex align-items-center justify-content-center"
        style="max-width: 300px; align-items: center; margin: 0 auto;">
        <div class="input-group mb-12">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01"
                    aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>
    </div>
    <br>
    <div class="d-flex align-items-center justify-content-center"
        style="max-width: 300px; align-items: center; margin: 0 auto;">
        <div class="input-group-postpend">
            <Button id="uploadbtn" class="btn btn-primary">Upload</Button>
        </div>
    </div>
    <br>
    <div class="d-flex align-items-center justify-content-center"
        style="max-width: 300px; align-items: center; margin: 0 auto;">
        OR
    </div> -->
    <div class="d-flex align-items-center justify-content-center"
        style="max-width: 300px; align-items: center; margin: 0 auto;">
        <button id="rndData" type="button" class="btn btn-secondary">Randomized Data</button>
    </div>
    <br>
    <div class="d-flex align-items-center justify-content-center">
        <h5>Allocation Method</h2>
    </div>
    <div class="d-flex align-items-center justify-content-center">
        <form id="fits">
            <input type="radio" class="btn-check" name="schedule" value="fcfs" id="firstfit" autocomplete="off">
            <label class="btn btn-primary" for="firstfit">First Fit</label>
            <input type="radio" class="btn-check" name="schedule" value="sjf" id="bestfit" autocomplete="off">
            <label class="btn btn-primary" for="bestfit">Best Fit</label>
            <input type="radio" class="btn-check" name="schedule" value="ps" id="worstfit" autocomplete="off">
            <label class="btn btn-primary" for="worstfit">Worst Fit</label>

        </form>
    </div>
    <br>
    <div class="d-flex align-items-center justify-content-center">
        <h5>Allocation Animation</h2>
    </div>
    <div class="d-flex align-items-center justify-content-center">
        <input style="border-color: #4CAF50;" class="btn btn-primary" type="button" value="Start" id="start">
        <input style="border-color: #4CAF50;" class="btn btn-primary" type="button" value="Next" id="next">
        <input style="border-color: #4CAF50;" class="btn btn-primary" type="button" value="Back" id="back">
        <input style="border-color: #4CAF50;" class="btn btn-primary" type="button" value="Play" id="play">
        <input style="border-color: #4CAF50;" class="btn btn-primary" type="button" value="Pause" id="pause">
        <input style="border-color: #4CAF50;" class="btn btn-primary" type="button" value="End" id="end">
    </div>
    <div id="animarea"
        style="position: relative; width: 800px; height: 70vh; border-top: 1px solid; border-left: 1px solid; border-right: 1px solid; margin: auto; margin-top: 20px;">
        <span style="display: inline; float: left; margin: 50px 0px 0px 50px;">Processes</span>
        <span style="display: inline; float: right; margin: 50px 50px 0px 0px;">Memory Slots</span>
        <!-- Procs -->
        <div id="procsarea">
            <div id="p1"
                style="display: inline-block; width: 100px; height: 50px; background-color: #E0DDD8; position: absolute; left: 35px; top: 100px; z-index: 99999;">
                <div class="align-items-center justify-content-center"
                    style="display: inline-flex; width: 100%; height: 100%; text-align: center; height: 100%;">
                    <span id="p1span">P1: </span>
                    <span id="p1hide" class="badge badge-light"
                        style="right: 0; bottom: 0;position: absolute; background-color: red; display: none;">0</span>
                </div>
            </div>
            <div id="p2"
                style="display: inline-block; width: 100px; height: 50px; background-color: #E0DDD8; position: absolute; left: 35px; top: 160px; z-index: 99999;">
                <div class="align-items-center justify-content-center"
                    style="display: inline-flex; width: 100%; height: 100%; text-align: center; height: 100%;">
                    <span id="p2span">P2: </span>
                    <span id="p2hide" class="badge badge-light"
                        style="right: 0; bottom: 0;position: absolute; background-color: red; display: none;">0</span>
                </div>
            </div>
            <div id="p3"
                style="display: inline-block; width: 100px; height: 50px; background-color: #E0DDD8; position: absolute; left: 35px; top: 220px; z-index: 99999;">
                <div class="align-items-center justify-content-center"
                    style="display: inline-flex; width: 100%; height: 100%; text-align: center; height: 100%;">
                    <span id="p3span">P3: </span>
                    <span id="p3hide" class="badge badge-light"
                        style="right: 0; bottom: 0;position: absolute; background-color: red; display: none;">0</span>
                </div>
            </div>
        </div>
        <!-- Slots -->
        <div id="memdiv"
            style="display: inline-block; width: 180px; background-color: #E0DDD8; position: absolute; right: 45px; top: 100px;">
            <table id="memtbl" style="width:180px">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr id="m1" style="height: 70px;">
                    <td id="m1span"
                        style="text-align: center; border-right: 1px solid; border-bottom: 1px solid; width: 80px;">M1:
                    </td>
                    <td id="m1slot"
                        style="vertical-align:bottom; text-align: center; width: 100px; border-bottom: 1px solid;"></td>
                </tr>
                <tr id="m2" style="height: 70px;">
                    <td id="m2span" style="text-align: center; border-right: 1px solid; border-bottom: 1px solid;">M2:
                    </td>
                    <td id="m2slot" style="vertical-align:bottom; text-align: center; border-bottom: 1px solid;"></td>
                </tr>
                <tr id="m3" style="height: 70px;">
                    <td id="m3span" style="text-align: center; border-right: 1px solid; border-bottom: 1px solid;">M3:
                    </td>
                    <td id="m3slot" style="vertical-align:bottom; text-align: center; border-bottom: 1px solid;"></td>
                </tr>
            </table>
        </div>

    </div>
</body>

</html>