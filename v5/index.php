<html lang="en">
<head>
  <title>OS Visualizations</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="/p/f21-13/files/favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style>
  .footer {
   	position: fixed;
   	left: 0;
   	bottom: 0;
   	width: 100%;
  	color: white;
   	text-align: center;
}
.bg {
  /* The image used */
  background-color: #F0FFF0;
  
  /* Full height */
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover
}
.container-fluid90{
      width: 90%
 }
</style>

</head>
<body>

<div class = "bg">

<?php include '../templates/navbar.php'; ?>

<div class="container p-3 my-3 border bg-light rounded">
	<div class = "pt-3 pr-3 pl-3">
  
    <style>
        .bouncing{
            width: 100%;
            height: 20%;
            background: white;
            -webkit-font-smoothing: antialiased;
            display: flex;
            justify-content: center;
            align-items:middle center;
            margin-top: 20px; 
            padding: 10px;
            border-radius:5px;
        }
  
        h1 {
            height: 10px;
        }
  
        h1 span {
            position: relative;
            top: 10px;
            display: inline-block;
            animation: bounce .3s ease infinite alternate;
            font-family: 'Titan One'cursive;
            font-size:60px;
            color: #0000cd;
            text-shadow: 0 1px yellow,
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
        
        <span>O</span>
        <span>S</span>
        <span></span>
        <span>V</span>
        <span>I</span>
        <span>S</span>
        <span>U</span>
        <span>A</span>
        <span>L</span>
        <span>I</span>
        <span>Z</span>
        <span>A</span>
        <span>T</span>
        <span>I</span>
        <span>O</span>
        <span>N</span>
        <span>S</span>
        
        
    </h1>
    </div>
    </div>

    <br><br>

  <div class="row">
	
 	 <div class="col-4">

	<div class="card">
     	   <div class="card-body">
     	    <h5 class="card-title">Page Replacement</h5>
             <p>
                Visualizations for our Page Replacement Algorithms.
            </p>
            <a type="button" class="btn btn-primary" href="http://cs.newpaltz.edu/p/f21-13/v5/2-replace/index.php" style="float: right;">Page Replacement</a>
 	 </div>
	</div>

	<br>

  <div class="card">
     	   <div class="card-body">
     	    <h5 class="card-title">CPU Scheduling</h5>
             <p>
                Visualizations for our CPU Scheduling Algorithms.
            </p>
            <a type="button" class="btn btn-dark" href="http://cs.newpaltz.edu/p/f21-13/v5/1-cpu/index.php" style="float: right;">CPU Scheduling</a>
 	 </div>
	</div>

</div>

<div class="col-4">

	<div class="card">
     	   <div class="card-body">
     	    <h5 class="card-title">Disk Scheduling</h5>
             <p>
                Visualizations for our Disk Scheduling Algorithms.
            </p>
            <a type="button" class="btn btn-dark" href="http://cs.newpaltz.edu/p/f21-13/v5/3-disk/index.php" style="float: right;">Disk Scheduling</a>
 	 </div>
	</div>

	<br>

  <div class="card">
     	   <div class="card-body">
     	    <h5 class="card-title">Memory Allocation</h5>
             <p>
                Visualizations for our Memory Allocation Algorithms.
            </p>
            <a type="button" class="btn btn-info" href="http://cs.newpaltz.edu/p/f21-13/v5/4-memory/index.php" style="float: right;">Memory Allocation</a>
 	 </div>
	</div>

</div>

<div class="col-4">

	<div class="card">
     	   <div class="card-body">
     	    <h5 class="card-title">File Allocation</h5>
             <p>
                Visualizations for our File Allocation Algorithms.
            </p>
            <a type="button" class="btn btn-info" href="http://cs.newpaltz.edu/p/f21-13/v5/5-files/index.php" style="float: right;">File Allocation</a>
 	 </div>
	</div>

	<br>

 	<div class="card">
     	   <div class="card-body">
     	    <h5 class="card-title">Address Translation</h5>
             <p>
                Visualizations for our Address Translations.
            </p>
            <a type="button" class="btn btn-primary" href="http://cs.newpaltz.edu/p/f21-13/v5/6-address/AddressTranslation.php" style="float: right;">Address Translation</a>
 	 </div>
	</div>

</div>

  </div>
</div>

<br>
<br>

<div class="footer bg-info container-fluid">
  <p>Webpage made by: Group 6 | Matthew Morfea | Henry Murillo | Charles Agudelo | Joshua Morris | Tevin Skeete</p>
</div>

</body>
</html>
