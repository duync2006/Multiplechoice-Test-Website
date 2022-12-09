<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <!-- CSS -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/body.css">
    <!-- Bootstrap 3 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Icon Package -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- FA Package -->
    <script src="https://kit.fontawesome.com/8accce40a8.js" crossorigin="anonymous"></script>

    <!-- jQuery -->
</head>
<?php include "header.html"?>
<body>
    <div class="container">
    <div class="row">
        <div class="col-1">

        </div>
        <div class="col-8">
            <div class="panel-group">
                <div class="panel panel-info">
                    <div class="panel-heading">Do Test</div>
                    <div class="panel-body"></div>
                </div>
            </div>
            <div class="card mx-auto" style="width: 100%">
                <div class="card-header">
                    <h1>Do test</h1>
                </div>
                <div class="card-body">
                    <h4>You have 50 minutes to do! </h4>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button style="width: 100px" class="btn btn-success me-md-2" type="button" id="btnStart">Start</button>
                    </div>
                </div>
                <div style="font-family: source-code-pro, Menlo, Monaco, Consolas, 'Courier New',
                monospace" id="question"></div>
                <div class="col-sm-12 text-center mb-2">
                    <button id="btnSubmit" type="hidden" name="submit" class="btn btn-warning"">Submit</button>
                </div>
                <div class="col-sm-12 text-center mb-2">
                    <h4 id="score"></h4>
                </div>
            </div>
        </div>
        <div class="col-3" id="shortcut_answer">
<!--            <div class="card">-->
<!--                <div class="card-header bg-info">-->
<!--                    <h3>Test Name</h3>-->
<!--                </div>-->
<!--                <div class="row">-->
<!--                    <div class="col-2 m-2">-->
<!--                    <button type="button" class="btn btn-outline-dark">1</button>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>
    </div>
</body>
<script type="text/javascript">
    document.getElementById('btnSubmit').style.display = "none";
    var questions;
    $('#btnStart').click(function()
    {
        $(this).hide();
        GetQuestions();
        GetShortcut();
        $('#btnSubmit').show();
    })
    function GetQuestions()
    {
        $.ajax({
            url: 'questions.php',
            type: 'get',
            success: function(data){
                // console.log($data2)
                questions = jQuery.parseJSON(data);
                console.log(questions);
                $index = 1;
                $string = '';
                $.each(questions, function (k,v) {
                    $string+= '<div class="row" style="margin-left: 20px" id="question'+v['ID']+'">';
                    $string+=  '<p id="'+v['ID']+'" style="font-size: medium; font-weight: bold"><span class="text-danger " style="text-decoration: underline ">Câu '+$index+':</span> '+v['Content']+'</p>';
                    $string+=  '<fieldset id="'+v['ID']+'">';
                    $string+=     '<div class="form-check">';
                    $string+=        ' <input class="Option_A" type="radio" name="'+v['ID']+'" value=""">';
                    $string+=        ' <label class="A" class="form-check-label" for="$data = "><span class="text-danger">A: </span>';
                    $string+=         v['Option_A'];
                    $string+=         '</label>';
                    $string+=     '</div>';
                    $string+=     '<div class="form-check">';
                    $string+=         '<input class="Option_B" type="radio" name="'+v['ID']+'" value="">';
                    $string+=        ' <label class="B" class="form-check-label" for="QuestionB"><span class="text-danger" style="font-weight: bold">B: </span>';
                    $string+=         v['Option_B'];
                    $string+=         '</label>';
                    $string+=     '</div>';
                    $string+=     '<div class="form-check">';
                    $string+=         '<input class="Option_C" type="radio" name="'+v['ID']+'" value="">';
                    $string+=        ' <label class="C" class="form-check-label" for="QuestionB"><span class="text-danger" style="font-weight: bold">C: </span>';
                    $string+=         v['Option_C'];
                    $string+=         '</label>';
                    $string+=     '</div>';
                    $string+=     '<div class="form-check">';
                    $string+=         '<input class="Option_D" type="radio" name="'+v['ID']+'" value="">';
                    $string+=        ' <label class="D" class="form-check-label" for="QuestionB"><span class="text-danger" style="font-weight: bold">D: </span>';
                    $string+=         v['Option_D'];
                    $string+=         '</label>';
                    $string+=     '</div>';
                    $string+=    '</fieldset>';
                    $string+=     '</div>';
                    $index++;
                })
                $('#question').html($string);
            }
        })
    }
    function GetShortcut()
    {
        $.ajax({
            url: 'shortcut.php',
            type: 'get',
            success: function($data2){
                // console.log($data2);
                $('#shortcut_answer').html($data2);
            }
        })
    };

    $('#btnSubmit').click(function()
    {
        $(this).hide();
        $('#btnStart').hide();
        checkResult();
    })
    function checkResult(){
        //Get the answer of questiosn
        let score = 0;
        $('#question div.row').each(function (k,v){
            let id = $(v).find('p').attr('id');
            let question = questions.find(x=>x.ID == id);
            let answer = question['Answer']
            console.log(answer);

            //Get answer of user
            let user = $(v).find('fieldset input[type="radio"]:checked').attr('class');
            console.log(user);
            let choice='';
            switch (user){
                case 'Option_A':
                    choice = 'A'
                    break;
                case 'Option_B':
                    choice = 'B'
                    break;
                case 'Option_C':
                    choice = 'C'
                    break;
                case 'Option_D':
                    choice = 'D'
                    break;
            }
            if(choice == answer){
                console.log("Question have id: "+id+" is correct.");
                score+= 10;
            }
            else {
                console.log("Question have id: "+id+" is not correct.");
            }
            console.log('#question > #question'+v['id']+' > fieldset > div > label.'+answer+'');
            $('#question > #question'+id+' > fieldset > div > label.'+answer+'').css("background-color", "yellow");
            $('#score').text('Your score is: '+score);
        })
    }
</script>

</html>