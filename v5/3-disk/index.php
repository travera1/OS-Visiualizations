<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Disk Scheduling</title>
    <style>

    .grid-container {
    display: grid;
    grid-template-columns: auto auto auto;
    padding: 10px;
    border-radius: 5px;
    background-color: white;
    margin-left: 5%;
    margin-right: 5%;

    }

    .grid-container > div {
    text-align: center;
    padding: 20px ;
    }

    canvas {
    padding-left: 0;
    padding-right: 0;
    margin-left: auto;
    margin-right: auto;
    display: block;
    background-color:white ;
    border:1px solid #d3d3d3; 
    border-radius: 3px;
    }

    img{
    padding-left: 0;
    padding-right: 0;
    margin-left: auto;
    margin-right: auto;
    display: block;
    }

    body{
        background-color: #F0FFF0;
    }

    .headerText{
        text-align:center;
        font-family:"Courier New", Courier, monospace;
        font-size: 40px;
        font-weight:normal;
    }
    .subheaderText{
        text-align:center;
        font-size: 20px;
    }
    .containerFluid{
        margin: 5%;
        border-radius: 10px;
        font-family:Arial, Helvetica, sans-serif;
    }
    .data{
        text-align:center;
        font-size: 20px;
        font-weight:bold;
    }
    </style>
</head>
<body>

    <?php include '../../templates/navbar.php'; ?>
      
    <div class="containerFluid p-3 my-3 border bg-light">

    <div class="center">
        <p class="headerText">Disk Scheduling Algorithms</p>
        <div class="text-center align-items-center justify-content-center">
            <button class="btn btn-secondary" type="button" id="" onclick="randomizeInputs();">Randomize Queues</button>
            <p><i></i></p>
	<p class="subheaderText">Select an Algorithm:</p>
        </div>
        <br>
        <div class="text-center align-items-center justify-content-center">
            <button class="btn btn-primary" type="button" id="FCFS" onclick="FCFS();">FCFS</button>
            <button class="btn btn-primary"type="button" id="SSTF" onclick="SSTF();">SSTF</button>
            <button class="btn btn-primary" type="button" id="CSCAN" onclick="CSCAN();">CSCAN </button>
            <button class="btn btn-primary" type="button" id="LOOK" onclick="LOOK();">LOOK </button>
            <button class="btn btn-primary" type="button" id="CLOOK" onclick="CLOOK();">CLOOK </button>
        </div>
    <div class="containerFluid">
        <p class = "text-center">Current Algorithm: <span id="algorithm-name"></span></p>
        <h4 class="text-center">Queue and Requests</h4>

    <div class="grid-container border">
      <div class="item1">
        <p>Queue: <span class="data" id="the-queue">Queue</span></p>
      </div>
      <div class="item2">
        <p>Head: <span class ="data" id="the-head">Head</span></p>
      </div>
      <div class="item3">
        <p>Current Request (in Queue): <span class = "data" id="timer-text"></span></p>
      </div>
    </div>

        <br>
        <div class="">
        <h3 class="text-center">Control Panel</h3>
        <div class="text-center align-items-center justify-content-center">
            <button class="btn btn-info" type="button" id="Previous" onclick=" clearLine();">Previous</button>
            <button class="btn btn-info" type="button" id="Next" onclick="displayLine();">Next </button>
            _
            <button class="btn btn-info" type="button" id="btn-start" onclick="">Play </button>
            <button class="btn btn-info" type="button" id="btn-pause" onclick="">Pause </button>
            _
            <button class="btn btn-info" type="button" id="Start" onclick="clearAll();">Start </button>
            <button class="btn btn-info" type="button" id="End" onclick="displayAll();">End </button>
            _
            <button class="btn btn-info" type="button" id="Reset" onclick="Reset();">Reset </button>
        </div>
        <br>
        <img src="Capture.JPG" alt="Lines" width="704">
        <canvas id="myCanvas" width="700" height="500">
            Your browser does not support the HTML5 canvas tag.
        </canvas>
        <img src="Capture2.JPG" alt="Lines" width="704">
        </div>
    </div>
    </div>

</div>
</div>
<script>

    initalValues = [];
    initalValues2 = [];
    values = [];
    index = 0; 
    head = 0;
    verticalindex = 0;
    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");
    ctx.beginPath();

    var procHandler = [];
    var procLoad = [];
    var numberString = '';
    var nextNum;
    var numCount = 0;
    
    var procHandlerOut = [];
    var procLoadOut = [];
    var numCountout = 0;



    const timerText = document.getElementById("timer-text");
    const btnStart = document.getElementById("btn-start");
    const btnPause = document.getElementById("btn-pause");

    const btnRand = document.getElementById("btn-rand");

    var count = 0;
    var intervalID;

    btnStart.addEventListener("click", function(){
        intervalID = setInterval(function(){
            if(count <= values.length)
            {
            displayLinePlay(count);
            count += 1;
            timerText.textContent = values[count - 1];
            }
        },1000);

    });

    btnPause.addEventListener("click", function(){
        clearInterval(intervalID);
    });

    /*btnRand.addEventListener("click", function(){
        
        $.ajax({
    url: 'http://localhost/Project-V4/Algorithms/CLOOK/JavaRunCLOOK.php',
    success: function(data) {
    $('.result').html(data);
    console.log(data);
     }
    });
    $.ajax({
    url: 'http://localhost/Project-V4/Algorithms/CSCAN/JavaRunCSCAN.php',
    success: function(data) {
    $('.result').html(data);
    //console.log(data);
     }
    });
    $.ajax({
    url: 'http://localhost/Project-V4/Algorithms/FCFS/JavaRunFCFS.php',
    success: function(data) {
    $('.result').html(data);
    //console.log(data);
     }
    });
    $.ajax({
    url: 'http://localhost/Project-V4/Algorithms/SSTF/JavaRunSSTF.php',
    success: function(data) {
    $('.result').html(data);
    //console.log(data);
     }
    });
    $.ajax({
    url: 'http://localhost/Project-V4/Algorithms/LOOK/JavaRunLOOK.php',
    success: function(data) {
    $('.result').html(data);
    //console.log(data);
     }
    });

    });*/


function Reset(){
    values = [];
    index = 0;
    head = 50;
    verticalindex = 0;
    count = 0;
    document.getElementById("algorithm-name").innerHTML = "";
    document.getElementById("the-queue").innerHTML = "";
    document.getElementById("the-head").innerHTML = "";
    ctx.clearRect(0, 0, 700, 500);
    ctx.beginPath();
     procHandler = [];
     procLoad = [];
     numberString = '';
     nextNum;
     numCount = 0;

     count = 0;
     timerText.textContent = "";
    
     procHandlerOut = [];
     procLoadOut = [];
     numCountout = 0;
     clearInterval(intervalID);
     initalValues = [];
}

function FCFS(){
    resetTextReader();
    readInputTextFile("../../files/p6-disk-input-fcfs.txt");
    readOutputTextFile("../../files/p6-disk-output-fcfs.txt");
    document.getElementById("algorithm-name").innerHTML = "FCFS (First Come First Serve)";
    document.getElementById("the-queue").innerHTML = initalValues;
    document.getElementById("the-head").innerHTML = head;

    //console.log("Inital Values: "+ initalValues);
    //console.log("Head: " + head);
}

function SSTF(){
    resetTextReader(); 
    readInputTextFile("../../files/p6-disk-input-clooklooksstf.txt");
    readOutputTextFile("../../files/p6-disk-output-sstf.txt");
    document.getElementById("algorithm-name").innerHTML = " SSTF (Shortest Seek Time First)";
    document.getElementById("the-queue").innerHTML = initalValues;
    document.getElementById("the-head").innerHTML = head;
}

function CSCAN(){
    resetTextReader();
    readInputTextFile("../../files/p6-disk-input-cscan.txt");
    readOutputTextFile("../../files/p6-disk-output-cscan.txt");
    document.getElementById("algorithm-name").innerHTML = "CSCAN";
    document.getElementById("the-queue").innerHTML = initalValues;
    document.getElementById("the-head").innerHTML = head;
}

function LOOK(){
    resetTextReader();
    readInputTextFile("../../files/p6-disk-input-clooklooksstf.txt");
    readOutputTextFile("../../files/p6-disk-output-look.txt");
    document.getElementById("algorithm-name").innerHTML = "LOOK";
    document.getElementById("the-queue").innerHTML = initalValues;
    document.getElementById("the-head").innerHTML = head;
}

function CLOOK(){
    resetTextReader();
    readInputTextFile("../../files/p6-disk-input-clooklooksstf.txt");
    readOutputTextFile("../../files/p6-disk-output-clook.txt");
    document.getElementById("algorithm-name").innerHTML = "CLOOK";
    document.getElementById("the-queue").innerHTML = initalValues;
    document.getElementById("the-head").innerHTML = head;
}


function randomizeInputs(){
    $.ajax({
    url: 'http://cs.newpaltz.edu/p/s21-06/files/Algorithms/CLOOK/JavaRunCLOOK.php',
    success: function(data) {
    $('.result').html(data);
    console.log(data);
     }
    });
    $.ajax({
    url: 'http://cs.newpaltz.edu/p/s21-06/files/Algorithms/CSCAN/JavaRunCSCAN.php',
    success: function(data) {
    $('.result').html(data);
    //console.log(data);
     }
    });
    $.ajax({
    url: 'http://cs.newpaltz.edu/p/s21-06/files/Algorithms/FCFS/JavaRunFCFS.php',
    success: function(data) {
    $('.result').html(data);
    //console.log(data);
     }
    });
    $.ajax({
    url: 'http://cs.newpaltz.edu/p/s21-06/files/Algorithms/SSTF/JavaRunSSTF.php',
    success: function(datas) {
    $('.result').html(data);
    //console.log(data);
     }
    });
    $.ajax({
    url: 'http://cs.newpaltz.edu/p/s21-06/files/Algorithms/LOOK/JavaRunLOOK.php',
    success: function(data) {
    $('.result').html(data);
    //console.log(data);
     }
    });
}

function resetTextReader()
{
    procHandler = [];
    procLoad = [];
    numberString = '';
    nextNum=null;
    numCount = 0;
    
    procHandlerOut = [];
    procLoadOut = [];
    numCountout = 0;
}

function readInputTextFile(file)
{
    var rawFile = new XMLHttpRequest();
     rawFile.open("GET", file, false);
     console.log(file);
     rawFile.onreadystatechange = function ()
     {
         if(rawFile.readyState === 4)
         {
              if(rawFile.status === 200 || rawFile.status == 0)
             {
                var allText = rawFile.responseText;
                allText.split('\n').forEach(function(line) {
                    numberString = line;
                    numberString.split(' ').forEach(function(number){
                        nextNum = Number(number);
                        procLoad.push(nextNum);
                        //console.log(nextNum);
                        if(numCount == 2)
                        {
                            head = nextNum;
                        }
                        if(numCount >= 3)
                        {
                            procHandler.push(procLoad[numCount]);
                            //console.log(procLoad[numCount]);
                        }
                        numCount++;
                    });
                });
                initalValues = procHandler;
                initalValues.pop(initalValues.length);
                //console.log(initalValues);
            }
        }
    }
    rawFile.send(null);
}

function readOutputTextFile(file)
{
    var rawFile = new XMLHttpRequest();
     rawFile.open("GET", file, false);
     rawFile.onreadystatechange = function ()
     {
         if(rawFile.readyState === 4)
         {
              if(rawFile.status === 200 || rawFile.status == 0)
             {
                var allText = rawFile.responseText;
                allText.split('\n').forEach(function(line) {
                    numberString = line;
                    numberString.split(' ').forEach(function(number){
                        nextNum = Number(number);
                        procLoadOut.push(nextNum);
                        ///console.log(nextNum);
                        if(numCountout == 2)
                        {
                            head = nextNum;
                        }
                        if(numCountout >= 3)
                        {
                            procHandlerOut.push(procLoadOut[numCountout]);
                            //console.log(procLoadOut[numCountout]);
                        }
                        numCountout++;
                    });
                });
                //remove the weird leftover zero
                procHandlerOut.pop(initalValues.length);
                //console.log(procHandlerOut);
                values = procHandlerOut;
            }
        }
    }
    rawFile.send(null);
}

function displayLine() {
    ctx.beginPath();
    if(index == 0){
        ctx.moveTo(head, 0);
    }else{
        ctx.moveTo(values[index - 1], verticalindex);
    }
    verticalindex = verticalindex + 25;
    ctx.lineTo(values[index], verticalindex);
    ctx.stroke();   
    index++;
    count += 1;
    timerText.textContent = values[count - 1];
}

function displayLinePlay(cnt) {
    ctx.beginPath();
    if(cnt == 0){
        ctx.moveTo(head, 0);
    }else{
        ctx.moveTo(values[cnt - 1], verticalindex);
    }
    verticalindex = verticalindex + 25;
    ctx.lineTo(values[cnt], verticalindex);
    ctx.stroke();
}

function displayAll() {
    ctx.beginPath();

    localverticalindex = 25;
        for(var i = 0; i < values.length; i++)
        {
            if(i == 0){
                ctx.moveTo(head, 0);
                ctx.lineTo(values[i],localverticalindex);
            }else{
                ctx.moveTo(values[i - 1],localverticalindex);
                localverticalindex = localverticalindex + 25; 
                ctx.lineTo(values[i], localverticalindex);
            }
        }   
        ctx.stroke();
        localverticalindex = 25;
}

function clearLine() {
    if(values[index - 1] == undefined)
    {
        if(head < values[index]){
        ctx.clearRect(head, verticalindex, values[index], verticalindex + 25);
        }else{
            ctx.clearRect(values[index], verticalindex, head, verticalindex + 25);
        }
        verticalindex = 25;
    }
    if(values[index - 1] < values[index]){
    ctx.clearRect(values[index - 1], verticalindex, values[index], verticalindex + 25);
    }else{
        ctx.clearRect(values[index], verticalindex, values[index -1], verticalindex + 25);
    }
    verticalindex = verticalindex - 25;   
    index--;
    //console.log("values[index - 1]:" + values[index-1]  + " verticalindex:" + verticalindex + " values[index]:" + values[index] + " verticalindex + 25:" + (verticalindex + 25));
    count -= 1;
    timerText.textContent = values[count - 1];
}

function clearAll() {
    ctx.clearRect(0, 0, 700, 500);
    index = 0;
    verticalindex = 0;
    count = 0;
    timerText.textContent = "";
}
</script>

</body>
</html>

