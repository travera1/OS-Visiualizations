<?php 
      
      if(isset($_POST['submit'])){
        if(empty($_POST['data'])){
        } else {
            $filename="../../files/index.txt";
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
        include '../../templates/navbar.php'; 
         $data = file_get_contents("/var/www/projects/f21-13/html/files/index.txt");?>
    
    <div class="section">
        <div class="block">
            <div class="columns">
                <div class="column is-one-fifth">
                    <p><strong>Example Data:</strong> </p>
                </div>
                <div class="column is-four-fifths">
                    <p class="has-text-grey-dark">
                    <?php echo htmlentities($data);?>
                    </p>
                </div>
            </div>
        </div>
        <div class="block">
            <form action="editIndexed.php" method="POST">
                <div class="field" style="max-width: 600px;">
                    <textarea name="data" id="" cols="8" rows="10" class="textarea"
                    ><?php echo htmlentities($data);?></textarea>
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