
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="css2.css">
</head>

<body>


<!--<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload " name="submit">
</form>-->



<div class="signupSection">
    <div class="info">
        <h2>Mission to ....</h2>
        <ion-icon  name="folder-outline"></ion-icon>
        <p></p>
    </div>
    <form action="upload.php<?php echo"?id=".$_GET['id']."&testid=".$_GET['testid']."&row=".$_GET['row']?>" method="POST" class="signupForm" name="signupform" enctype="multipart/form-data">
        <h2>Select a file to upload:</h2>
        <ul class="noBullet">
            <li>
                <label for="username"></label>
                <input type="text" class="inputFields" id="username" name="name" placeholder="File Name" value="" />
            </li>
            <li>
                <!--<label for="File"></label>
                <input type="file" name="fileToUpload" id="fileToUpload">-->
                <div class="file-input">
                    <input type="file" name="fileToUpload" id="file" class="file">
                    <label for="file">
                        Select file
                        <p class="file-name"></p>
                    </label>
                </div>
            </li>

            <li id="center-btn">
                <input type="submit" id="join-btn"  alt="Join"  value="Upload " name="submit">
            </li>
        </ul>
    </form>
</div>
<a class="button circle" href="http://147.175.98.97/Z1">Home</a>

<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
<script src="js2.js"></script>
</body>

</html>