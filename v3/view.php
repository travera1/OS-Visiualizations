

<?php function display() { ?>
<table class="table is-bordered is-striped is-hoverable">
    <tr>
        <th>Algorithm</th>
        <th>Input</th>
    </tr>
    <tbody>
        <tr>
            <th>Page Replacement</th>
            <th><?php echo readfile("/var/www/projects/f21-13/html/files/replace.txt"); ?> <a href="#">(edit)</a></th>
        </tr>
        <tr>
            <th>Memory Allocation</th>
            <th><?php echo readfile("/var/www/projects/f21-13/html/files/memory.txt"); ?> <a href="#">(edit)</th>
        </tr>
        <tr>
            <th>CPU Scheduling</th>
            <th><?php echo readfile("/var/www/projects/f21-13/html/files/CPU.txt"); ?> <a href="#">(edit)</th>
        </tr>
        <tr>
            <th>Disk Scheduling (CLOOK, LOOK, SSTF)</th>
            <th><?php echo readfile("/var/www/projects/f21-13/html/files/CLOOK.txt"); ?> <a href="#">(edit)</th>
        </tr>
        <tr>
            <th>Disk Scheduling (SCAN)</th>
            <th><?php echo readfile("/var/www/projects/f21-13/html/files/CSCAN.txt"); ?> <a href="#">(edit)</th>
        </tr>
        <tr>
            <th>Disk Scheduling (FCFS)</th>
            <th><?php echo readfile("/var/www/projects/f21-13/html/files/FCFS.txt"); ?> <a href="#">(edit)</th>
        </tr>
        <tr>
            <th>File Allocation (Contiguous)</th>
            <th><?php echo readfile("/var/www/projects/f21-13/html/files/contin.txt"); ?> <a href="#">(edit)</th>
        </tr>
        <tr>
            <th>File Allocation (Linked)</th>
            <th><?php echo readfile("/var/www/projects/f21-13/html/files/link.txt"); ?> <a href="#">(edit)</th>   
        </tr>
        <tr>
            <th>File Allocation (Indexed)</th>
            <th><?php echo readfile("/var/www/projects/f21-13/html/files/index.txt"); ?> <a href="#">(edit)</th>
        </tr>
    </tbody>
</table>
<?php } ?>

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
    <?php include 'templates/navbar.php'; ?>
    <?php
    session_start();
    if(TRUE) {
        echo "Welcome back!";
        display();

    } else {
        echo "Sorry, you are not logged in. Go to the log-in page.";
    } ?>
    
</body>
</html>