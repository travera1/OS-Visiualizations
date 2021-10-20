<?php 
      
      if(isset($_POST['submit'])){
        if(empty($_POST['input'])){
        } else {
            $filename="../../files/p6-disk-input-fcfs.txt";
            $newData = $_POST['input'];
            file_put_contents($filename, $newData);
           
            
        }
        if(empty($_POST['output'])){
        } else {
            $filename="../../files/p6-disk-output-fcfs.txt";
            $newData = $_POST['output'];
            file_put_contents($filename, $newData);
        }
        
        header('Location: ../view.php');
       
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
        $output = file_get_contents("/var/www/projects/f21-13/html/files/p6-disk-output-fcfs.txt");
        $input = file_get_contents("/var/www/projects/f21-13/html/files/p6-disk-input-fcfs.txt"); ?>
    
    <div class="section" style="display: inline;" >
        <div>
            <form action="editFCFS.php" method="POST">
                <div>
                    <div class="columns">
                        <div class="field column" style="max-width: 500px;">
                            <label for="input"><span><strong>Input: (Example Data: </strong></span> <?php echo htmlentities($input);?><span><strong> )</strong></span></label>
                            <textarea name="input" id="input" cols="10" rows="10" class="textarea"><?php echo htmlentities($input); ?></textarea>
                        </div>
                        <div class="field column" style="max-width: 500px;">
                            <label for="output">Output fcfs:</label>
                            <textarea name="output" id="output" cols="10" rows="10" class="textarea"><?php echo htmlentities($output); ?></textarea>
                        </div>
                    </div>
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