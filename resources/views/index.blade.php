<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Royal</title>
    <link rel="icon" type="image/icon" href="svgexport-13.svg">
    <style>
        .vertical-center {
            margin: 0;
            position: absolute;
            animation: 2s mymove forwards;
            top: 60%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        @keyframes mymove {
            from {
                top: 60%;
                opacity: 0;
            }
            to {
                top: 50%;
                opacity: 1;
            }
        }@keyframes delete {
            from {
                opacity: 0;
                filter: grayscale(0%);
            }
            to {
                opacity: 1;
                filter: grayscale(100%);
            }
        }
        .back {
            z-index: -1;
            animation: 2s delete forwards;
            position: absolute;
            width: 100%;
            overflow:hidden;
            height: 100vh;
            opacity: 0;
            background-color: #cccccc;
            filter: grayscale(0%);
        }
        body{
            margin: 0;
        }

        @media(min-width: 1388px){
        .back img {
            height: 100%;
            width: 100%;
        }

        }
        .logo {
            align-items: center;
            vertical-align: center;
            width: 40%;
            opacity: 0;

        }
    </style>
</head>
<body>
<div class="back">
    <img class="" src="/image.jpg">
</div>
<img class="logo vertical-center" src="svgexport-1.svg"/>
</body>
</html>
