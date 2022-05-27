<?php

    # Function to identify the type of data from the file
    Function fileTypeData($fileData,$firstFile)
    {
        #Directory of the firstfile
        $fileRealativeDir = dirname($firstFile);
        echo $fileRealativeDir.'<br/>';

        #Name of the File
        $fileRealName = basename($firstFile);
        echo $fileRealName.'<br/>';

        #New Array to save the numbers to sum
        $dataNumberArray = [];

        #New Array to save the data of the new files
        $dataNameArray = [];

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
        #Test for Results
        #print_r($dataNameArray);
        #print_r($dataNumberArray);

        #Sum of the number in the file
        $totalFile[$fileRealName] = array_sum($dataNumberArray);

        #print_r($totalFile);

        /*foreach($totalFile as $initialFile => $initialVal)
        {
            foreach($totalFile as $otherFile => $otherVal)
            {
                $initialVal =+ $otherVal;
                $totalFile[$initialFile] = $initialVal;
            }
        }}*/

        $sumArray = array();

foreach ($dataNumberArray as $k => $subArray) {
    foreach ($subArray as $id => $value) {
        $sumArray[$id]+=$value;
        }
    }

    print_r($sumArray);

        #New Loop for the file name inside the original file
        foreach($dataNameArray as $rowname => $fileName)
        {
            fileReader($fileRealativeDir. "/" . $fileName);
        }


    }

    function anotherfileChecker()
    {
        fileTypeData($fileData);
    }
    
    #Function to read the first File
    function fileReader($firstFile)
    {
        # now we open the file and covert it into an Array
        $fileData = file($firstFile, FILE_IGNORE_NEW_LINES);
        fileTypeData($fileData,$firstFile);
    }

    fileReader('A.txt');