<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ひとこと</title>
        <style type="text/css">
        .errorMessage {
            border: 1px solid #ff0000;
            color: #ff0000;
            padding: 10px;
            margin: 10px 0;
        }
        </style>
    </head>
    <body>
        <?php
            $template_name = Controller::getTemplateName();
            require ($template_name);
        ?>
    </body>
</html>