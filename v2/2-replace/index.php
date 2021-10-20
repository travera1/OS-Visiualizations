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
                background-color: #e8c717;
            }
            #title {
                font-family: 'Orbitron', sans-serif;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    
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
                background-color: #e8c717;
            }
            #title {
                font-family: 'Orbitron', sans-serif;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
     <?php include '../templates/navbar.php'; ?>
<style type="text/css">
#slideshow {
  margin: 50px auto;
  position: relative;
  width: 900px;
  height: 450px;
  padding: 10px;
}
#slideshow > div {
  position: absolute;
  top: 10px;
  left: 10px;
  right: 10px;
  bottom: 10px;
}
#slideshow > div > img {
  width: 100%;
}
#button {
  text-align: center;
}
</style>

</head>
<body>
       
        <br>
 
 <div>
 
 <head>
    
  
    
	<div class = "pt-3 pr-3 pl-3">
  
    <style>
        .bouncing{
            width: 100%;
            height: 20%;
            background: e8c717;
            -webkit-font-smoothing: antialiased;
            display: flex;
            justify-content: center;
            align-items:middle center;
            margin-top: 10px; 
            padding: 10px;
            border-radius:5px;
        }
  
        h1 {
            height: 10px;
        }
  
        h1 span {
            position: relative;
            top: 10x;
            display: inline-block;
            animation: bounce .3s ease infinite alternate;
            font-family: 'Titan One'cursive;
            font-size:60px;
            color: #00BFFF;
            text-shadow: 0 1px blue,
                0 2px 0 green,
                0 3px 0 green,
                0 4px 0 green,
                0 5px 0 green,
                0 6px 0 transparent,
                0 7px 0 transparent,
                0 8px 0 transparent,
                0 9px 0 transparent,
                0 10px 10px rgba(0, 0, 0, 0.4);
        }
  
        h1 span:nth-child(2) {
            animation-delay: .1s;
        }
  
        h1 span:nth-child(3) {
            animation-delay: .2s;
        }
  
        h1 span:nth-child(4) {
            animation-delay: .3s;
        }
  
        h1 span:nth-child(5) {
            animation-delay: .4s;
        }
  
        h1 span:nth-child(6) {
            animation-delay: .5s;
        }
  
        h1 span:nth-child(7) {
            animation-delay: .6s;
        }
  
        h1 span:nth-child(8) {
            animation-delay: .7s;
        }
        h1 span:nth-child(9) {
            animation-delay: .8s;
        }
  
        h1 span:nth-child(11) {
            animation-delay: .9s;
        }
  
        h1 span:nth-child(12) {
            animation-delay: 1.0s;
        }
  
        h1 span:nth-child(13) {
            animation-delay: 1.1s;
        }
         h1 span:nth-child(14) {
            animation-delay: 1.2s;
        }
  
        h1 span:nth-child(15) {
            animation-delay: 1.3s;
        }
        h1 span:nth-child(16) {
            animation-delay: 1.4s;
        }
        @keyframes bounce {
            100% {
                top: -20px;
                text-shadow: 0 1px 0 #CCC,
                    0 2px 0 #CCC,
                    0 3px 0 #CCC,
                    0 4px 0 #CCC,
                    0 5px 0 #CCC,
                    0 6px 0 #CCC,
                    0 7px 0 #CCC,
                    0 8px 0 #CCC,
                    0 9px 0 #CCC,
                    0 50px 25px rgba(0, 0, 0, 0.2);
            }
        }
    </style>
</head>
    <div class="bouncing">
    <h1>
        
        <span>P</span>
        <span>A</span>
        <span>G</span>
        <span>E</span>
        <span></span>
        <span>R</span>
        <span>E</span>
        <span>P</span>
        <span>L</span>
        <span>A</span>
        <span>C</span>
        <span>E</span>
        <span>M</span>
        <span>E</span>
        <span>N<span>
        <span>T<span>
       
        
        
    </h1>
    </div>
    </div>


    </style>
</head>
  

 </div>
 
 
 
 
<br><br>

        
            </div>
        </form>
<div class="d-flex align-items-center justify-content-center">
           
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <form id="preType">
                
            </form>
        </div><br>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  width: 400px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
</head>
<body>

<div class="d-flex align-items-center justify-content-center">
<h2>Click On Algorithm To See The Strategy For Page Replacement</h2>
</div>
<div class="d-flex align-items-center justify-content-center">
<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">FIFO</button>&nbsp;&nbsp;&nbsp;
  <div id="myDropdown" class="dropdown-content">
    <a href="#home">Oldest page in main memory is the one which will be selected for replacement.</a>
   
  </div>
  
</div>
<div class="dropdown">
  <button onclick="myFunction1()" class="dropbtn">LRU</button>&nbsp;&nbsp;&nbsp;
  <div id="myDropdown1" class="dropdown-content">
    <a href="#home">We look to the left of the table, that we have created we choose the further most page to get replaced.</a>
 </div>
  
</div>
<div class="dropdown">
  <button onclick="myFunction2()" class="dropbtn">Optimal</button>&nbsp;&nbsp;&nbsp;
  <div id="myDropdown2" class="dropdown-content">
    <a href="#home">Replace the page that will not be used for the longest period of time. We look to the right further most.</a>
 
  </div>
</div>
<div class="dropdown">
  <button onclick="myFunction3()" class="dropbtn">LFU</button>&nbsp;&nbsp;&nbsp;
  <div id="myDropdown3" class="dropdown-content">
    <a href="#home">In current stack at any iteration we choose that element for replacement which has smallest count in the incoming page stream.</a>
   
  </div>
</div>
<div class="dropdown">
  <button onclick="myFunction4()" class="dropbtn">MFU</button>&nbsp;&nbsp;&nbsp;
  <div id="myDropdown4" class="dropdown-content">
    <a href="#home">In current stack at any iteration we choose that element for replacement which has highest count in the incoming page stream.</a>
    
  </div>
</div>
</div>

  
        
<br><br>



<div class="container">
   <div class="table-responsive">
   <br>
    <h2 align="center">Display Input from File on Server</h2>
    <br />
    <div align="center">
     <button type="button" name="load_data" id="load_data" class="btn btn-info">Load Data</button>
    </div>
    <br />
    <div id="input_table">
    </div>
   </div>
  </div>
  <script>
$(document).ready(function(){
 $('#load_data').click(function(){
  $.ajax({
   url:"../../files/p4-page-input.txt",
   dataType:"text",
   success:function(data)
   {
    var pagereference_data = data.split(/\r?\n|\r/);
    var table_data = '<table class="table table-bordered table-striped">';
    for(var count = 0; count<pagereference_data.length; count++)
    {
     var cell_data = pagereference_data[count].split(",");
     table_data += '<tr>';
     for(var cell_count=0; cell_count<cell_data.length; cell_count++)
     {
      if(count === 0)
      {
       table_data += '<th>'+cell_data[cell_count]+'</th>';
      }
      else
      {
       table_data += '<td>'+cell_data[cell_count]+'</td>';
      }
     }
     table_data += '</tr>';
    }
    table_data += '</table>';
    $('#input_table').html(table_data);
   }
  });
 });
 
});
</script>
</div>

        <div class="container">
     
        
    </body>




<body>
<div class="container">
  <h2>Select the Algorithm:</h2>
    <div class="d-flex align-items-center justify-content-center">
            <form id="schedule">
                <input type="radio" class="btn-check" name="schedule" value="FIFO" id="option1" autocomplete="off">
                    <label class="btn btn-info" for="option1" onclick="return StartImage()">First In First Out</label>
                <input type="radio" class="btn-check" name="schedule" value="LRU" id="option2" autocomplete="off">
                    <label class="btn btn-secondary" for="option2" onclick="return StartImageLRU()">Least Recently Used</label>
                <input type="radio" class="btn-check" name="schedule" value="Opt" id="option3" autocomplete="off">
                    <label class="btn btn-danger" for="option3" onclick="return StartImageOPT()">Optimal</label>
                <input type="radio" class="btn-check" name="schedule" value="LFU" id="option4" autocomplete="off">
                    <label class="btn btn-warning" for="option4" onclick="return StartImageLFU()">Least Frequently Used</label>
				<input type="radio" class="btn-check" name="schedule" value="MFU" id="option5" autocomplete="off">
                   <label class="btn btn-light" for="option5" onclick="return StartImageMFU()">Most Frequently Used</label>
				
            </form>
        </div>
            <div class="d-flex align-items-center justify-content-center" id="timeSlice">
                
            </div>
  

 
   
</div>

<div class="container">

  <h2>CONTROL PANEL:</h2>
  <div class="d-flex align-items-center justify-content-center">
  
<a href="#" class="btn btn-dark" role="button" onclick="return StartImage()">START</a>&nbsp;&nbsp;&nbsp;
<a href="#" class="btn btn-dark" role="button" onclick="return previousImage()">BACK</a>&nbsp;&nbsp;&nbsp;
<a href="#" class="btn btn-dark" role="button" onclick="return setTimer()">PLAY/PAUSE</a>&nbsp;&nbsp;&nbsp;
<a href="#" class="btn btn-dark" role="button" onclick="return nextImage()">NEXT</a>&nbsp;&nbsp;&nbsp;
<a href="#" class="btn btn-dark" role="button" onclick="return EndImage()">END</a>&nbsp;&nbsp;&nbsp;
</div>

</div>
 


<div id="slideshow">
  <div>
     <img name="slide" id="imgSlideshow"  src="http://cs.newpaltz.edu/p/s21-06/s21-v2/PageReplacement3/BeforeTable.PNG">
  </div>
</div>
<div class="container">
  
</div>
</body>
</html>



<script language="javascript" type="text/javascript">
var imgNumber =0;
var path = [
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO1.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO2.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO3.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO4.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO5.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO6.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO7.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO8.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO9.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO10.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO1.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO2.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO3.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO4.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO5.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/LRU6.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/LRU7.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/LRU8.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/LRU9.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/LRU10.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO1.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO2.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO3.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO4.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO5.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/OPT6.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/OPT7.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/OPT8.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/OPT9.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/OPT10.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO1.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO2.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO3.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO4.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO5.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/OPT6.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/OPT7.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/LFU8.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/LFU9.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/LFU10.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO1.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO2.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/FIFO3.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/MFU4.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/MFU5.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/MFU6.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/MFU7.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/MFU8.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/MFU9.PNG",
  "http://cs.newpaltz.edu/p/s21-06/s21-v4/2-replace/Images/MFU10.PNG",
  
    
];
var numberOfImg = path.length;
var timer = null;

function slide() {
  imgNumber = (imgNumber + 1) % path.length;
  console.log(imgNumber);
  document.getElementById("imgSlideshow").src = path[imgNumber];
  changeCounter(imgNumber + 1, numberOfImg);
}

function setTimer() {
  if (timer) {
    clearInterval(timer);
    timer = null;
  } else {
    timer = setInterval(slide, 2000);
  }
  return false;
}

function StartImage(){
  imgNumber = 0;
  if (imgNumber < 0) {
    imgNumber = numberOfImg ;
  }
  document.getElementById("imgSlideshow").src = path[imgNumber];
  changeCounter(imgNumber + 1, numberOfImg);
  return false;
}
function StartImageLRU() {
  imgNumber = 10;
  if (imgNumber < 0) {
    imgNumber = numberOfImg ;
  }
  document.getElementById("imgSlideshow").src = path[imgNumber];
  changeCounter(imgNumber + 1, numberOfImg);
  return false;
}

function StartImageOPT() {
  imgNumber = 20;
  if (imgNumber < 0) {
    imgNumber = numberOfImg ;
  }
  document.getElementById("imgSlideshow").src = path[imgNumber];
  changeCounter(imgNumber + 1, numberOfImg);
  return false;
}
function StartImageLFU() {
  imgNumber = 30;
  if (imgNumber < 0) {
    imgNumber = numberOfImg ;
  }
  document.getElementById("imgSlideshow").src = path[imgNumber];
  changeCounter(imgNumber + 1, numberOfImg);
  return false;
}
function StartImageMFU() {
  imgNumber = 40;
  if (imgNumber < 0) {
    imgNumber = numberOfImg ;
  }
  document.getElementById("imgSlideshow").src = path[imgNumber];
  changeCounter(imgNumber + 1, numberOfImg);
  return false;
}
function previousImage() {
  --imgNumber;
 if (imgNumber == 39)
 {
    imgNumber = 49; 
}
 else if (imgNumber ==29) 
 {
    imgNumber = 39;
  }
  else if (imgNumber == 19) 
  {
    imgNumber = 29;
  }
  else if (imgNumber == 9)
  {
    imgNumber = 19;
  }
  else if (imgNumber < 0) 
  {
    imgNumber = 9;
  }
  
  
  document.getElementById("imgSlideshow").src = path[imgNumber];
  changeCounter(imgNumber + 1, numberOfImg);
  return false;
}

function nextImage() {
  ++imgNumber;
  if (imgNumber ==10)
  {
    imgNumber = 0;
  }
  else if (imgNumber ==20)
  {
    imgNumber = 10;
  }
    else if (imgNumber ==30)
    {
    imgNumber = 20;
    }
    else if (imgNumber ==40)
    {
    imgNumber = 30;
    }
    else if (imgNumber >49) {
    imgNumber = 40;
  }
  document.getElementById("imgSlideshow").src = path[imgNumber];
  changeCounter(imgNumber + 1, numberOfImg);
  return false;
}

function EndImage() {
  imgNumber;
  
  if (imgNumber < 10) 
  {
    imgNumber = 9;
  }
  else if (imgNumber < 20)
  {
    imgNumber = 19;   
  }
  else if (imgNumber < 30)
  {
    imgNumber = 29;   
  }
  else if (imgNumber < 40)
  {
    imgNumber = 39;   
  }
  else if (imgNumber < 50)
  {
    imgNumber = 49;   
  }
  document.getElementById("imgSlideshow").src = path[imgNumber];
  changeCounter(imgNumber + 1, numberOfImg);
  return false;
}
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
function myFunction1() {
  document.getElementById("myDropdown1").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
function myFunction2() {
  document.getElementById("myDropdown2").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
function myFunction3() {
  document.getElementById("myDropdown3").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
function myFunction4() {
  document.getElementById("myDropdown4").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

</script>
