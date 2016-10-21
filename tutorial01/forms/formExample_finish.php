<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Favorite Color!</title>
    <style>
        label{
            display: block;
        }
    </style>
</head>
<body>
<?php
if(isset($_POST['color'])) {
    echo "<p>Your favorite color is " . $_POST['color'] . "</p>";
}
else{
    ?>
    <p>Please pick your favorite color:</p>
    <form action="formExample_finish.php" method="post" enctype="multipart/form-data">
        <label>
            <input  type="radio" name="color"
                    value="red" />
            Red
        </label>
        <label>
            <input  type="radio" name="color"
                    value="green" />
            Green
        </label>
        <label>
            <input  type="radio" name="color"
                    value="blue" />
            Blue
        </label>
        <input type="submit" name="submit"
               value="Save">
    </form>
<?php } ?>
</body>
</html>