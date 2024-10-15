<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JavaScript Digital Clock</title>
    <link rel="stylesheet" href="css/watch.css">
    <script src="css/script.js" defer></script>
    <style>
        video {
            position: fixed;
            top: 2px;
            left: 345px;
            width: 100%;
            height: 100vh;
            object-fit: cover;
        }

        .title-wrapper {
            width: 100%;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            justify-items: center;
        }
    </style>
</head>

<body>
    <video src="img/22.mp4" muted loop autoplay></video>

    <div class="title-wrapper">
        <div>
            <marquee>🙏 नमस्ते, Welcome to koseli.com <?php echo $_SESSION['user']['username'] ?></marquee>
        </div>
        <div class="container">
            <span id="hours">00</span>
            <span>:</span>
            <span id="minutes">00</span>
            <span>:</span>
            <span id="seconds">00</span>
            <span id="session">AM</span>
        </div>

    </div>


</body>

</html>