<?php

    # Function to identify the type of data from the file
    Function fileTypeData($fileData)
    {
        foreach($fileData as $row => $data) {
            if (is_numeric($data)) {
               echo "Is a Number ".$data.'<br />';
            } else {
               echo "Is a File ".$data.'<br />';
            }
        }  
    }
    #Function to read the first File
    function fileReader($firstFile)
    {
        # now we open the file and covert it into an Array
        $fileData = file($firstFile, FILE_IGNORE_NEW_LINES);
        fileTypeData($fileData);
    }

    fileReader('A.txt');