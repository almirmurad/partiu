<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Document</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:arial, verdana, sans-serif;
            font-size:16px;
            list-style:none;
            text-decoration:none;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            background-color:#DCDCDC;
            height:100vh;
        }
        .container{
            width:500px;
            height:500px;
            display:flex;
            flex-direction:column;
            justify-content:space-around;
            box-shadow:2px 2px 20px 10px rgba(0,0,0,0.3);
            border-radius:70px 5px 5px 5px;
            background-color:#fff;
            padding:50px;
        }
        .logo{

            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
        }
        .logo h1{
            color:#736F36;
            font-size:2.8em;
            font-weight:bold;
        }
        .logo h2{
            color:#F29F05;
            font-size:1em;
        }
        .content{
            text-align:center;
        }
        ul{
            display:flex;
            flex-direction:column;
            width:100%;
            padding:10px;
        }
        li{
            margin-top:5px;
            width:100%;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <h1>Partiu!</h1>
            <h2>Viagens e Turismo</h2>
        </div>
            <div class="content">
            <p>Em breve uma grande novidade para quem quer novidades e informações sobre o turismo paranaense!<br>
                <strong>AGUARDE!</strong>
            </p>
        </div>
        <div class="foot">
            <div class="title-foot">
                <h3>Social</h3>
            </div>

            <ul class="info">
                <li>Whatsapp<br/><a href="">(41) 98533-2397</a></li>
                <li>Facebook<br/><a href="">Partiu!</a></li>
                <li>Instagran<br/><a href="">@parituviagenseturismo</a></li>
                <li>mail<br/><a href="">contato@parituviagenseturismo.com.br</a></li>
            </ul>
        </div>
    </div>
</body>
</html>