<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    try{
        $conn = new PDO("mysql:host=$servername; dbname=web_ass", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>

<?php
    $sql = $conn->prepare("SELECT * from question ORDER BY RAND()");
    $sql->execute();
    $index = 1;
    $data1 = '<div class="row" style="margin-left: 20px">';
    while($result = $sql->fetch(PDO::FETCH_ASSOC))
    {
        $data1.=  '<p style="font-size: medium; font-weight: bold"><span class="text-warning " style="text-decoration: underline ">Câu '.$index.':</span> '.$result['Content'].'</p>';
        $data1.=  '<fieldset id="question'.$index.'">';
        $data1 .=     '<div class="form-check">';
        $data1.=        ' <input class="form-check-input" type="radio" name="question'.$index.'" value=""">';
        $data1.=        ' <label class="form-check-label" for="$data = "><span class="text-danger">A: </span>';
        $data1.=         $result['Option_A'];
        $data1.=         '</label>';
        $data1.=     '</div>';
        $data1.=     '<div class="form-check">';
        $data1.=         '<input class="form-check-input" type="radio" name="question'.$index.'" value="">';
        $data1.=        ' <label class="form-check-label" for="QuestionB"><span class="text-danger" style="font-weight: bold">B: </span>';
        $data1.=         $result['Option_B'];
        $data1.=         '</label>';
        $data1.=     '</div>';
        $data1.=     '<div class="form-check">';
        $data1.=         '<input class="form-check-input" type="radio" name="question'.$index.'"value=""">';
        $data1.=         '<label class="form-check-label" for="QuestionC"><span class="text-danger">C: </span>';
        $data1.=         $result['Option_C'];
        $data1.=         '</label>';
        $data1.=     '</div>';
        $data1.=     '<div class="form-check">';
        $data1.=         '<input class="form-check-input" type="radio" name="question'.$index.'" value="">';
        $data1.=         '<label class="form-check-label" for="QuestionD"><span class="text-danger">D: </span>';
        $data1.=         $result['Option_D'];
        $data1.=         '</label>';
        $data1.=     '</div>';
        $data1.=    '</fieldset>';
        $data1.=    '<input type="hidden" name="" value="'.$result['Answer'].'">';
        $index++;
    }
        $data1 .= '<div class="col-sm-12 text-center mb-2">';
    $data1 .=      '<button id="btnSubmit" type="submit" name="submit" class="btn btn-warning"">Submit</button>';
    $data1 .= '</div>';
//        // SHORCUT
//        $data2.=        '<div class="row">';
//        $data2.=            '<div class="col-2 m-2">';
//        $data2.=           ' <button type="button" class="btn btn-outline-dark">'.$index.'</button>';
//        $data2.=            '</div>';
//        $data2.=        '</div>';
//        $index++;
//    }
//    $data2 .= '</div>';

    echo $data1;
?>