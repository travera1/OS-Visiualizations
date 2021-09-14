<?php
    system("javac randomize.java", $output); 
    system("java randomize", $output);
    system("javac SSTF.java", $output); 
    system("java SSTF", $output);
    echo $output;
?> 