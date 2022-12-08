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
                monospace" id="question">

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

    $('#btnStart').click(function()
    {
        $(this).hide();
        GetQuestions();
        GetShortcut();
    })
    function GetQuestions()
    {
        $.ajax({
            url: 'questions.php',
            type: 'get',
            success: function($data1){
                // console.log($data2);
                $('#question').html($data1);
                // $('#shortcut_answer').html($data2);
            }
        })
    }
    function GetShortcut()
    {
        $.ajax({
            url: 'shortcut.php',
            type: 'get',
            success: function($data2){
                console.log($data2);
                $('#shortcut_answer').html($data2);
            }
        })
    };
</script>

</html>