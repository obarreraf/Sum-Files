<?php

    # Function to identify the type of data from the file
    Function fileTypeData($fileData)
    {
        #New Array to save the data of the new files
        $dataNameArray = [];

        #New Array to save the numbers to sum
        $dataNumberArray = [];

        #Loop to separate the values and push it into a new array
        foreach($fileData as $row => $data) {
            if (is_numeric($data)) {
                echo "Is a Number ".$data.'<br />';
                array_push($dataNumberArray, (int)$data);
            } else {
                echo "Is a File ".$data.'<br />';
                array_push($dataNameArray, $data);
            }
        }  

        print_r($dataNameArray);

        print_r($dataNumberArray);
    }
    #Function to read the first File
    function fileReader($firstFile)
    {
        # now we open the file and covert it into an Array
        $fileData = file($firstFile, FILE_IGNORE_NEW_LINES);
        fileTypeData($fileData);
    }

    fileReader('A.txt');