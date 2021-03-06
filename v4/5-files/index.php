<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>File Allocation</title>
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
    <script src='filemain.js'></script>
    <style>
        #disktable {
            border-spacing: 30px;
            border-collapse: separate;
        }
        #disktable td {
            width: 50px;
            height: 50px;
            text-align: center;
            border: 1px solid;
        }
        #disktable th {
            width: 30px;
            height: 0px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php include '../../templates/navbar.php'; ?>

    <br>
    <div class="d-flex align-items-center justify-content-center">
        <h1 id="title">File Allocation</h1><br>
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
    </div> -->
    <div class="d-flex align-items-center justify-content-center">
        <form id="fits">
            <input type="radio" class="btn-check" name="schedule" value="fcfs" id="contig" autocomplete="off">
            <label class="btn btn-primary" for="contig">Contiguous</label>
            <input type="radio" class="btn-check" name="schedule" value="sjf" id="linked" autocomplete="off">
            <label class="btn btn-primary" for="linked">Linked</label>
            <input type="radio" class="btn-check" name="schedule" value="ps" id="indexed" autocomplete="off">
            <label class="btn btn-primary" for="indexed">Indexed</label>

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
        style="position: relative; width: 800px; height: 800px; border: 1px solid; margin: auto; margin-top: 20px;">
        <!-- data -->
        <div id="dataarea">
            <span id="step" style="display: inline; float: left; margin: 50px 0px 0px 50px;">Step: 0</span>
            <div id="directory" style="display: inline; float: left; margin: 30px 0px 0px 50px;">
                <div class="d-flex align-items-center justify-content-center"
                    style="align-items: center; margin: 0 auto;">
                    <span style="text-align: center; display: inline; float: right;">Directory</span>
                </div>
                <table id="dir" style="width:180px; border: 1px solid; text-align: center;">
                    <tr>
                        <th id="file">File</th>
                        <th id="start">Start</th>
                        <th id="len">Length</th>
                    </tr>
                    
                </table>
            </div>
        </div>
        <!-- Files -->
        <div id="filearea">
            <!-- <span id="step" style="display: inline; float: left; margin: 190px 0px 0px -280px;">name</span>
            <table id='fileblock' style="border: 1px solid;display: inline; float: left; margin: 220px 0px 0px -280px;">
                <tr>
                    <th style="width: 30px; height: 30px; background-color: green;border-right: 1px solid;"></th>
                    <th style="width: 30px; height: 30px; background-color: green;border-right: 1px solid;"></th>
                </tr>
            </table> -->
        </div>
        <div id="diskarea">
            <!-- <img src="./cyl.png"  style="display: inline; float: right; margin: 10px 50px 0px 0px; width: 280px;"/> -->
            <table id="disktable" style="display: inline; float: right; margin: 0px 0px 0px 100px; width: 350px; height: 350px; position: absolute;">
               
                <tr>
                    <td id="1">1</td>
                    <td id="2">2</td>
                    <td id="3">3</td>
                    <td id="4">4</td>
                </tr> 
                <tr> 
                    <td id="5">5</td>
                    <td id="6">6</td>
                    <td id="7">7</td>
                    <td id="8">8</td>
                </tr> 
                <tr> 
                    <td id="9">9</td>
                    <td id="10">10</td>
                    <td id="11">11</td>
                    <td id="12">12</td>
                </tr>
                <tr> 
                    <td id="13">13</td>
                    <td id="14">14</td>
                    <td id="15">15</td>
                    <td id="16">16</td>
                </tr> 
                <tr> 
                    <td id="17">17</td>
                    <td id="18">18</td>
                    <td id="19">19</td>
                    <td id="20">20</td>
                </tr> 
                <tr> 
                    <td id="21">21</td>
                    <td id="22">22</td>
                    <td id="23">23</td>
                    <td id="24">24</td>
                </tr> 
                <tr> 
                    <td id="25">25</td>
                    <td id="26">26</td>
                    <td id="27">27</td>
                    <td id="28">28</td>
                </tr> 
                <tr> 
                    <td id="29">29</td>
                    <td id="30">30</td>
                    <td id="31">31</td>
                    <td id="32">32</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>