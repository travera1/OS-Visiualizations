<?php 
      
      if(isset($_POST['submit'])){
        if(empty($_POST['data'])){
        } else {
            $filename="../../files/contin.txt";
            $newData = $_POST['data'];
            file_put_contents($filename, $newData);
            echo 'successful file data change';
            header('Location: ../view.php');
        }
       // echo 'no data added successfully';
      }
      
    ?>


<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>View Files</title>
    <style>
        body { background-color: #F0FFF0; }
    </style>
</head>
<body>
    
    <?php 
        //include '/var/www/p/f21-13/html/templates/navbar.php'; 
        include '../../templates/navbar.php'; ?>
    
    <div class="section">
        <div class="block">
            <div class="columns">
                <div class="column is-one-fifth">
                    <p><strong>Example Data:</strong> </p>
                </div>
                <div class="column is-four-fifths">
                    <p class="has-text-grey-dark">
                    32 <br>
                    1,1,0,2,2,2,2,0,0,0,0,0,,3,3,3,3,0,0,0,0,0,0,0,4,4,4,0,0,0,0,0 <br>
                    4 <br>1,count,2 <br>2,tr,4 <br>3,yum,4 <br>4,hyd,3
                    </p>
                </div>
            </div>
        </div>
        <div class="block">
            <form action="editContinuous.php" method="POST">
                <div class="field" style="max-width: 600px;">
                    <textarea name="data" id="" cols="8" rows="10" class="textarea"
                    placeholder="32&#10;1,1,0,2,2,2,2,0,0,0,0,0,,3,3,3,3,0,0,0,0,0,0,0,4,4,4,0,0,0,0,0&#10;4&#10;1,count,2&#10;2,tr,4&#10;3,yum,4&#10;4,hyd,3"></textarea>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit" name="submit">Submit</button> 
                        <a class="button is-link is-light" href="../view.php">Cancel</a> 
                    </div>
                </div>
            </form> 
        </div>
    </div>   

</body>
</html>