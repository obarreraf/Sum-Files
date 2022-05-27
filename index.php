<?php
    $multiDimenArray = [];
    # Function to identify the type of data from the file
    Function fileTypeData($fileData,$firstFile)
    {
        #Directory of the firstfile
        $fileRealativeDir = dirname($firstFile);
        #echo $fileRealativeDir.'<br/>';

        #Name of the File
        $fileRealName = basename($firstFile);
        #echo $fileRealName.'<br/>';

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
        #print_r($dataNameArray)."<br />";
        #print_r($dataNumberArray)."<br />";

        filenameChecker($dataNameArray,$fileRealativeDir);

        fileSum($dataNumberArray,$fileRealName);


    }

    function filenameChecker($dataNameArray,$fileRealativeDir){
        #Checked there is not duplicated
        array_unique($dataNameArray);

        #print_r($dataNameArray);

        foreach($dataNameArray as $rowname => $fileName)
        {
            fileReader($fileRealativeDir. "/" . $fileName);
        }
    }

    function fileSum($dataNumberArray,$fileRealName)
    {
        $GLOBALS['multiDimenArray'][$fileRealName] = array_sum($dataNumberArray);
        foreach($GLOBALS['multiDimenArray'] as $initialFile  => $initiaVal) {
            foreach($GLOBALS['multiDimenArray'] as $otherFile => $otherVal) {
                if (in_array($otherFile, file($initialFile, FILE_IGNORE_NEW_LINES))) {
                    $initiaVal += $otherVal;
                    $GLOBALS['multiDimenArray'][$initialFile] = $initiaVal;
                }
            }
    
        }

        #print_r($GLOBALS['multiDimenArray'][$initialFile]);
    }

    
    function fileResult() {
        foreach(array_reverse($GLOBALS['multiDimenArray']) as $initialFile => $initiaVal) {
            echo "$initialFile - $initiaVal" . "<br>";
        }
    }


    #Function to read the first File
    function fileReader($firstFile)
    {
        # now we open the file and covert it into an Array
        $fileData = file($firstFile, FILE_IGNORE_NEW_LINES);
        fileTypeData($fileData,$firstFile);

        fileResult();

    }

    fileReader('A.txt');