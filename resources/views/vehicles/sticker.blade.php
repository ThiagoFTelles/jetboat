<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>MarinaWave</title>
</head>

<body>
    <div>
        <div
            style="font-family: Arial, Helvetica, sans-serif; text-transform: uppercase; font-size:55px; text-align:center; width:100%;">
            <h1 style="margin:0;">{{ $vehicle->owner_name }}</h1>
            <?php
                $uuid = $vehicle->uuid;
                $logo = 'https://lh3.googleusercontent.com/Ll03Qc3IebzIoZoyzAEGP0U4tunFEyjbD-XQEHMgThlOpH3WnHJz9R28wjRwauPnd5OZgWXyGkKd1IXhdN7zdAZXxLeQ5nPkZ-NKh-E3wDnrboURHnef1hLtWRReifJYawsue1ysrZVfBrIUN9dQTz3hZQXxzoL6gG6AOneWPc19XyWz2YvTm5Glgpf7VndLI_7u6jOcVJdfQvi6RcVGmqcpMharuPky4x7TtfKP2rX0VIs4EJghb5UwAiPWaGsPtOHnApz0WhIiSb68chllabXsEZna13JvhCxSlQCTrlqxnO5G2IkyNEz2x74eoA-cArS4xUEPXwsTY_Sul3EyGmw--sv-TPDC7ZtjB2GQvwo5HU3AotDk3dR9IYi9z_KY4MEaPC7Y4hwlZcHbgzKUW2lBL-yKnopEM0HgIwgXtUfUjX2yciFSc9sRJT7DNQoG6eSPQ_QdoGJq-1Th6HaS_UFC12RWCLOgQFufL4hhLpq4IESGGkXeebr6_n-pVaO8Oge5Ui_fEGcRT7JdW2zen9y8MvBAq7B57Z-QF507nlhORquyuVjAgurDGCGMrR2ogWSkoRoeNEYaB7gm0BbESC0m3nqm3Vi2D-k3Pcw=w1600-h758';
                
                echo "<img src=\"data:image/png;base64, "; 
                echo base64_encode(QrCode::format('png')->merge($logo, 0.2, true)->size(1000)->errorCorrection('H')->margin(1)->generate($uuid));
                echo "\">";
                
            ?>
            <h4 style="margin: 0;">www.MarinaWave.com.br</h4>
        </div>
    </div>

</body>

</html>