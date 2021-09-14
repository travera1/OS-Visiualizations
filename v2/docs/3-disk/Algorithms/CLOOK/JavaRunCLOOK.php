<?php
    system("javac randomize.java", $output); 
    system("java randomize", $output);
    system("javac CLOOK.java", $output); 
    system("java CLOOK", $output);
    echo $output;
?> 