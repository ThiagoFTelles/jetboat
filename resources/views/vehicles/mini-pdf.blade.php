<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>MarinaWave</title>
    <style>
        @page {
            margin: 0;
            padding: 0;
        }

        html {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>


    <?php
    $name = $vehicle->owner_name;
    $uuid = $vehicle->uuid;
    $logo = 'https://lh3.googleusercontent.com/Ll03Qc3IebzIoZoyzAEGP0U4tunFEyjbD-XQEHMgThlOpH3WnHJz9R28wjRwauPnd5OZgWXyGkKd1IXhdN7zdAZXxLeQ5nPkZ-NKh-E3wDnrboURHnef1hLtWRReifJYawsue1ysrZVfBrIUN9dQTz3hZQXxzoL6gG6AOneWPc19XyWz2YvTm5Glgpf7VndLI_7u6jOcVJdfQvi6RcVGmqcpMharuPky4x7TtfKP2rX0VIs4EJghb5UwAiPWaGsPtOHnApz0WhIiSb68chllabXsEZna13JvhCxSlQCTrlqxnO5G2IkyNEz2x74eoA-cArS4xUEPXwsTY_Sul3EyGmw--sv-TPDC7ZtjB2GQvwo5HU3AotDk3dR9IYi9z_KY4MEaPC7Y4hwlZcHbgzKUW2lBL-yKnopEM0HgIwgXtUfUjX2yciFSc9sRJT7DNQoG6eSPQ_QdoGJq-1Th6HaS_UFC12RWCLOgQFufL4hhLpq4IESGGkXeebr6_n-pVaO8Oge5Ui_fEGcRT7JdW2zen9y8MvBAq7B57Z-QF507nlhORquyuVjAgurDGCGMrR2ogWSkoRoeNEYaB7gm0BbESC0m3nqm3Vi2D-k3Pcw=w1600-h758';
    $style = "<div style=\"position: absolute; left:0;top:0;display:block;margin:0; padding:0; border:0;font-family: Arial, Helvetica, sans-serif; text-transform: uppercase; font-size:20px; text-align:center; width:100%; height:100%\"><br><div style = \"margin:0; padding:0; border:0;\">$name</div><img stye=\"\" ";

    echo $style;
    echo " src=\"data:image/png;base64, ";
    echo base64_encode(QrCode::format('png')->merge($logo, 0.2, true)->size(236)->errorCorrection('L')->margin(1)->generate($uuid));
    echo "\"></div>";

    ?>



</body>

</html>