<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>MarinaWave</title>
</head>

<body>
    <div style="width: 1000px; height:auto">
        <div
            style="font-family: Arial, Helvetica, sans-serif; text-transform: uppercase; font-size:55px; text-align:center; width:100%;">
            <h1>{{ $vehicle->owner_name }}</h1>
        </div>

        <div
            style="width: 1000px; height:1000px;background: url('https://www.qrcoder.co.uk/api/v1/?text={{ $vehicle->uuid }}&size=500&padding=1'); ">

            <img src="https://lh3.googleusercontent.com/QWXKIDRpsWdM8T78fsBqK7vy4uiUtyakIrbQBO38YZ-XYyTMUXcBd-4CQPmo_DQBC1jiXVYE_iwZGd3YrmHkozj2KaEvOwxdJl14YTAXOINu-H_Gj1FbqcdrcYjryaTrHeX5CuBfYFu6CdL0gg7SCZsYUwaL7ulNWMEax7i3j1gizucjV8gCwFf-j2Fo6gP10mDqcyzQsMTX2pvow-dpMJs4EhBU6jpPViyRvaS58Iq9jvPAS2d-PZJpKK8A6LMg5G7Mn_HjZVmJU5hW_1hLGdXs1qf7G-QnqlVx7m1jiARdpev4gQc5GG8utWxPR1X2LrehSnrq2-q9jskdkk2g9-gzRbI30KnIrgdcCa4kYXMK7VQW-JKyg3Xtl9MJv-Cq_DSSndlNHJP3j175ogXDGELGPNLO2QguPBeetlcclBspUI8taRGTkYRW66xr3jt2K74fvcYLR0xX4ywYkn9mKata9ydm9aaWZ8GLaPVm2bixReANFIAjfO52p-i5e3YBtWG5wrMg_7R-c9ceqk5WtOY59hM86ATF2cMTY8Vi9YlrYCEA4q04xg1xV0zfCD6DGBhEgNJnXyuLt6yVGDLrAmoHNweQHQy-3_xLUFY=w1600-h489"
                style="background-color:#ffffff; width:20%;position: relative;
    top: 50%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%)" />
        </div>

    </div>
<!-- <div style="position:relative">
instruções:
1 - aperte control+p para imprimir
2 - caso não apareça o QR code na impressão,
clique em "Mais definições" e marque a opção "gráficos de segundo plano"
3 - imprima em PDF e envie para uma gráfica fazer o adesivo no tamanho desejado.
sugerimos que o adesivo tenha no mínimo 10cm de largura.
</div> -->
</body>

</html>