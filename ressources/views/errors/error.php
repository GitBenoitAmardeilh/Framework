<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>

    <style>
    body{ background-color:rgb(220,220,220); margin:0; }
    .container{ text-align:center; width:100%; margin:auto; padding-top:300px; }
    .div_error_message{ background-color: rgb(244,70,66); padding: 1px; }
    </style>

    <div class='container'>
        <div>

            <h1><?php echo self::$vars['message']; ?></h1>
        </div>
        <div class='div_error_message'>
            <p style='background-color:rgb(248,78,82); font-size: 17px; color:white; padding:10px;'>La route <span style='color:black'><strong><?php echo self::$vars['code']; ?></strong></span> n'existe pas dans dans table <span style='color:black'><strong>listRoutes[]</strong></span></p>
        </div>
    </div></br>

    </body>
</html>
