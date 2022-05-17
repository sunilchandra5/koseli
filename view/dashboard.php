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
video{
    position: fixed;
    top: 2px;
    left:345px;
    
    object-fit: cover;
}
        </style>
</head>
<body>
    
<video src="img/22.mp4" muted loop autoplay></video>
    <div class="container">
        <span id="hours">00</span>
        <span>:</span>
        <span id="minutes">00</span>
        <span>:</span>
        <span id="seconds">00</span>
        <span id="session">AM</span>
</div>

    <marquee>Namaste Welcome to koseli.com <?php echo $_SESSION['user']['username'] ?></marquee>

</body>
</html>