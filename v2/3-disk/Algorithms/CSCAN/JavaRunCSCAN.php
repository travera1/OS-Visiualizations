<?php
    system("javac randomize.java", $output); 
    system("java randomize", $output);
    system("javac CSCAN.java", $output); 
    system("java CSCAN", $output);
    echo $output;
?> 