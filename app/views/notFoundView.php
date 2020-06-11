<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERROR 404</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,700,900">
    <link rel="stylesheet" href="<?=CSS?>notfound.css">
    <style>
        #back-btn{
            padding: 10px;
            margin: 10px auto;
            border: 1px solid #581863;
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="img-box">
            <img src="<?=IMG?>404.jpg" alt="error 404"/>
        </div>
        <div class="content">
            <h1>4<span>0</span>4</h1>
            <h2>Page <span>not</span> found</h2>
            <a id="back-btn" href="../../../../">BACK TO MAIN PAGE</a>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="<?=JS?>notfound.js"></script>
</body>
</html>
