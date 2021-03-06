<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CPU Scheduling</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
        <style>
            gantt th {
                background: linear-gradient(WhiteSmoke, lightgray);
                text-align: left;
                border: 1px solid black;
                height: 400 px;
            }
            gantt td {
                border: 1px solid black;
                border-bottom: 0;
                height: 20px;
                text-align: left;
            }
            body {
                background-color: #F0FFF0;
            }
            #title {
                font-family: 'Orbitron', sans-serif;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <?php include '../templates/navbar.php'; ?>

        <br>
        <div class="d-flex align-items-center justify-content-center">
            <h1 id="title">CPU Scheduler</h1><br>
        </div>


        <form method="POST" action="default.php">
            <div class="d-flex align-items-center justify-content-center">
                <input class="btn btn-primary" type="submit" value="Default">
            </div>
        </form><br>

        
        <form method="POST" action="../files/random.php">
            <div class="d-flex align-items-center justify-content-center">
                <input type="text" name="AlgoID" value="1">
                <input class="btn btn-primary" type="submit" value="Random">
            </div>
        </form><br>


       
        <div class="d-flex align-items-center justify-content-center">
            <form id="preType">
                <input type="radio" name="preType" value="nonpre" checked/> Non-Preemptive<br/>
                <input type="radio" name="preType" value="pre"/> Preemptive<br/>
            </form>
        </div><br>

        <div class="d-flex align-items-center justify-content-center">
            <input style="border-color: #4CAF50;" class="btn btn-primary" type="button" value="First Come First Serve" id="fcfs" onclick="fcfs();">
            <input style="border-color: #4CAF50;" class="btn btn-primary" type="button" value="Shortest Job First" id="sjf" onclick="sjf();">
            <input style="border-color: #4CAF50;" class="btn btn-primary" type="button" value="Priority" id="prio" onclick="prio();">
            <input style="border-color: #4CAF50;" class="btn btn-primary" type="button" value="Round Robin" id="rr" onclick="rr();">
        </div><br>

       
        <div class="d-flex align-items-center justify-content-center" id="timeSlice">
            
        </div>

        <div class="container">
            <table border="3" class="table" id="processTable">
                <tbody id="procArea">
                    <tr style="background-color: lightgrey;">
                        <th>Process ID</th>
                        <th>Arrival Time</th>
                        <th>Burst Time</th>
                        <th>Priority</th>
                    </tr>
                </tbody>
            </table>
        </div>
        <br> 
        <div class="d-flex align-items-center justify-content-center">
            <input style="border-color: #4CAF50;" class="btn btn-primary" type="button" value="Refresh Animation" 
                id="refresh" onclick="refreshAnim();">
        </div><br>

        <div class="d-flex align-items-center justify-content-center">
            <input style="border-color: #4CAF50;" class="btn btn-primary" type="button" value="Start" id="start" onclick="startAnim();">
            <input style="border-color: #4CAF50;" class="btn btn-primary" type="button" value="Next" id="next" onclick="nextAnim();">
            <input style="border-color: #4CAF50;" class="btn btn-primary" type="button" value="Back" id="back" onclick="backAnim();">
            <input style="border-color: #4CAF50;" class="btn btn-primary" type="button" value="Play" id="play">
            <input style="border-color: #4CAF50;" class="btn btn-primary" type="button" value="Pause" id="pause">
            <input style="border-color: #4CAF50;" class="btn btn-primary" type="button" value="End" id="end" onclick="endAnim();">
        </div> 
        <br> <br>

        <gantt id="gantt" >
            <div class="d-flex align-items-center justify-content-center">
            <table id="animationResult">
                <tbody id="holder">
                    <tr id="head"></tr>
                    <tr id="body"></tr>
                </tbody>
            </table>
            </div>
        </gantt>
        <br><br><br><br><br><br>
        <br><br><br><br><br><br>
        <br><br><br><br><br>

 


        

        <script>
            var table = document.getElementById("processTable");
            var procBody = document.getElementById("procArea");

            var procHandler = [];
            var procLoad = [];
            var numberString = '';
            var nextNum;
            function readInputTextFile(file)
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
                            console.log(allText);
                            // for loop, on each newline
                            allText.split('\n').forEach(function(line) {
                                numberString = line;
                                // // for loop, on each newline for each comma
                                numberString.split(',').forEach(function(number){
                                    nextNum = Number(number);
                                    procLoad.push(nextNum);
                                    // <ProcessID, Arrival, Burst, Priority>
                                    if(procLoad.length == 4) {
                                        procHandler.push(procLoad);
                                        procLoad = [];
                                    }
                                });
                            });
                        }
                    }
                }
                rawFile.send(null);
                console.log(procHandler);
            }
            readInputTextFile("input.txt");
            console.log(procHandler);

            var numberOfProcesses = procHandler.length;
            const processInfo = 4;

            for(i = 0; i < numberOfProcesses; i++) {
                var newRow = document.createElement('tr');
                newRow.setAttribute('id', 'row'+i);
                procBody.appendChild(newRow);
                newRow.style.cssText = 'background-color: lightgrey;';
                for(j = 0; j < processInfo; j++) {
                    var cell = newRow.insertCell();
                    cell.innerHTML = procHandler[i][j];
                }
            }


            var preemptive = false;
            $('input[type=radio][name=preType]').change(function () {
                if (this.value == 'nonpre') {
                    preemptive = false;
                }
                else if (this.value == 'pre'){
                    preemptive = true;
                }
            });




            
            var sorted = [];
            var sortedLine = [];

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
                                numberString.split(',').forEach(function(number){
                                    nextNum = Number(number);
                                    sortedLine.push(nextNum);
                                    // <ProcessID, Start Time, End Time>
                                    if(sortedLine.length == 3) {
                                        sorted.push(sortedLine);
                                        sortedLine = [];
                                    }
                                });
                            });
                        }
                    }
                }
                rawFile.send(null);
            }

            function fcfs(){
                sorted = [];
                sortedLine = [];
                readOutputTextFile("FCFS/output.txt");
                console.log(sorted);
                var slice = document.getElementById("slice");
                if(slice != null)
                    slice.remove();
            }

            function sjf(){
                sorted = [];
                sortedLine = [];
                if(preemptive == false)
                    readOutputTextFile("SJF/NONPREEMPTIVE/output.txt");
                else if (preemptive == true)
                    readOutputTextFile("SJF/PREEMPTIVE/output.txt");
                console.log(sorted);
                var slice = document.getElementById("slice");
                if(slice != null)
                    slice.remove();
            }

            function prio(){
                sorted = [];
                sortedLine = [];
                if(preemptive == false)
                    readOutputTextFile("PRIORITY/NONPREEMPTIVE/output.txt");
                else if (preemptive == true)
                    readOutputTextFile("PRIORITY/PREEMPTIVE/output.txt");
                console.log(sorted);
                var slice = document.getElementById("slice");
                if(slice != null)
                    slice.remove();
            }

            function rr(){
                sorted = [];
                sortedLine = [];
                var slice = document.createElement("span");
                slice.setAttribute('id','slice');
                var spot = document.getElementById("timeSlice");
                spot.appendChild(slice);
                slice.innerText = "Time Slice: 4";
                readOutputTextFile("RR/output.txt");
                console.log(sorted);
            }

            console.log(sorted);



            var procIndex = 0;
            const proc = 0;
            const arrive = 1;
            const burst = 2;
            
            var table = document.getElementById("animationResult");
            var head = document.getElementById("head");
            var body = document.getElementById("body");

            function refreshAnim(){
                var count = document.getElementById('animationResult').rows[1].cells.length;
                for(var i = 0; i < count; i++) {
                    $("#animationResult").find("td:last-child").remove();
                    $("#animationResult").find("th:last-child").remove();
                }

                var row = document.getElementById("row"+i);
                for(var i = 0; i < numberOfProcesses; i++){
                    var row = document.getElementById("row"+i);
                    row.style.cssText = 'background-color: lightgrey;';
                }

                procIndex = 0;
                procNum = -1;
            }


            function startAnim(){
                var count = document.getElementById('animationResult').rows[0].cells.length;
                var head = document.getElementById("head");
                var body = document.getElementById("body");

                var newHead = document.createElement('th');
                var newStart = document.createElement('td');
                var newFinish = document.createElement('td');
                if(count == 0) {
                    refreshAnim();
                    newHead.style.cssText = 'height: 60px; width: ' + sorted[0][burst] * 20 + 'px;';
                    newHead.innerText = 'P' + sorted[0][proc];
                    newStart.innerText = sorted[0][arrive];
                    newFinish.innerText = sorted[0][burst];

                    head.appendChild(newHead);
                    body.appendChild(newStart);
                    body.appendChild(newFinish);
                } else {
                    refreshAnim();
                    newHead.style.cssText = 'height: 60px; width: ' + sorted[0][burst] * 20 + 'px;';
                    newHead.innerText = 'P' + sorted[0][proc];
                    newStart.innerText = sorted[0][arrive];
                    newFinish.innerText = sorted[0][burst];

                    head.appendChild(newHead);
                    body.appendChild(newStart);
                    body.appendChild(newFinish);

                }

                var firstProc = sorted[0][0];
                firstProc--;
                var firstRow = document.getElementById("row"+firstProc);
                for(var i = 0; i < numberOfProcesses; i++){
                    if(i==firstProc)
                        firstRow.style.cssText= 'background-color: lightgreen;';
                    else {
                        var nextRow = document.getElementById("row"+i);
                        nextRow.style.cssText= 'background-color: yellow;';
                    }
                }
                procIndex = 1;
            }

            function nextAnim(){
                var table = document.getElementById("animationResult");
                var head = document.getElementById("head");
                var body = document.getElementById("body");
                var newHead = document.createElement('th');
                var newStart = document.createElement('td');
                var newFinish = document.createElement('td');
                var newBurst = sorted[procIndex][burst] - sorted[procIndex][arrive];
                newHead.style.cssText = 'height: 60px; width: ' + newBurst * 20 + 'px;';
                newHead.innerText = 'P' + sorted[procIndex][proc];
                newFinish.innerText = sorted[procIndex][burst];

                head.appendChild(newHead);
                body.appendChild(newFinish);

                var currentProc = sorted[procIndex][0];
                currentProc--;
                var currentRow = document.getElementById("row"+currentProc);
                for(var i = 0; i < numberOfProcesses; i++){
                    if(i==currentProc)
                        currentRow.style.cssText= 'background-color: lightgreen;';
                    else {
                        var nextRow = document.getElementById("row"+i);
                        nextRow.style.cssText= 'background-color: yellow;';
                    }
                }

                procIndex++;
            }

            function backAnim() {
                $("#animationResult").find("td:last-child").remove();
                $("#animationResult").find("th:last-child").remove();
                procIndex--;

                var currentProc = sorted[procIndex][0];
                currentProc -= 2;
                var currentRow = document.getElementById("row"+currentProc);
                for(var i = 0; i < numberOfProcesses; i++){
                    if(i==currentProc)
                        currentRow.style.cssText= 'background-color: lightgreen;';
                    else {
                        var nextRow = document.getElementById("row"+i);
                        nextRow.style.cssText= 'background-color: yellow;';
                    }
                }
            }

            function endAnim(){
                refreshAnim();
                var table = document.getElementById("animationResult");
                var head = document.getElementById("head");
                var body = document.getElementById("body");
               
                for(i = 0; i < sorted.length; i++) {
                    if(i == 0) {
                        var newHead = document.createElement('th');
                        var newStart = document.createElement('td');
                        var newFinish = document.createElement('td');
                        newHead.style.cssText = 'height: 60px; width: ' + sorted[i][burst] * 20 + 'px;';
                        newHead.innerText = 'P' + sorted[i][proc];
                        newStart.innerText = sorted[i][arrive];
                        newFinish.innerText = sorted[i][burst];

                        head.appendChild(newHead);
                        body.appendChild(newStart);
                        body.appendChild(newFinish);
                    } else {
                        var newHead = document.createElement('th');
                        var newStart = document.createElement('td');
                        var newFinish = document.createElement('td');
                        var newBurst = sorted[i][burst] - sorted[i][arrive];
                        newHead.style.cssText = 'height: 60px; width: ' + newBurst * 20 + 'px;';
                        newHead.innerText = 'P' + sorted[i][proc];
                        newFinish.innerText = sorted[i][burst];

                        head.appendChild(newHead);
                        body.appendChild(newFinish);
                    }
                }

                var lastProc = procHandler.length;
                lastProc--;

                var chosenProc = sorted[lastProc][0];
                chosenProc--;
                var chosenRow = document.getElementById("row"+chosenProc);
                for(var i = 0; i < numberOfProcesses; i++){
                    if(i==chosenProc)
                        chosenRow.style.cssText= 'background-color: lightgreen;';
                    else {
                        var nextRow = document.getElementById("row"+i);
                        nextRow.style.cssText= 'background-color: yellow;';
                    }
                }

                var count = document.getElementById('animationResult').rows[0].cells.length;
                procIndex = count;
            }

            var timeInterval;
            var procNum = -1;

            var start = document.getElementById("play");
            start.addEventListener("click", function(){
                timeInterval = setInterval(function(){
                    procNum += 1;
                    var table = document.getElementById("animationResult");
                    var head = document.getElementById("head");
                    var body = document.getElementById("body");
                    var newHead = document.createElement('th');
                    var newStart = document.createElement('td');
                    var newFinish = document.createElement('td');

                    if(procNum == 0) {
                        newHead.style.cssText = 'height: 60px; width: ' + sorted[procNum][burst] * 20 + 'px;';
                        newHead.innerText = 'P' + sorted[procNum][proc];
                        newStart.innerText = sorted[procNum][arrive];
                        newFinish.innerText = sorted[procNum][burst];

                        head.appendChild(newHead);
                        body.appendChild(newStart);
                        body.appendChild(newFinish);
                    } else {
                        var newBurst = sorted[procNum][burst] - sorted[procNum][arrive];
                        newHead.style.cssText = 'height: 60px; width: ' + newBurst * 20 + 'px;';
                        newHead.innerText = 'P' + sorted[procNum][proc];
                        newFinish.innerText = sorted[procNum][burst];

                        head.appendChild(newHead);
                        body.appendChild(newFinish);
                    }

                    var currentProc = sorted[procNum][0];
                    currentProc--;
                    var currentRow = document.getElementById("row"+currentProc);
                    for(var i = 0; i < numberOfProcesses; i++){
                        if(i==currentProc)
                            currentRow.style.cssText= 'background-color: lightgreen;';
                        else {
                            var nextRow = document.getElementById("row"+i);
                            nextRow.style.cssText= 'background-color: yellow;';
                        }
                    }
                    //procIndex += 1;
                }, 1000)
            });

            var pause = document.getElementById("pause");
            pause.addEventListener("click", function(){
                clearInterval(timeInterval);
            })

        </script>
    </body>
</html>
