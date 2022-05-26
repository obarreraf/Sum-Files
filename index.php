<?php

    function fileReader($firstFile)
    {
        # now we open the file and covert it into an Array
        $fileData = file($firstFile);


        print_r($fileData);

      
    }


    fileReader('A.txt');