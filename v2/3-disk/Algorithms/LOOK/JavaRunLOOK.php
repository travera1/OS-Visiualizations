<?php
    system("javac randomize.java", $output); 
    system("java randomize", $output);
    system("javac LOOK.java", $output); 
    system("java LOOK", $output);
    echo $output;
?> 