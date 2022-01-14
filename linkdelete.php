<?php
require('linksfunctions.php');


$linkdate = $_GET['date'];

$linkdata = getlinkBydate($linkdate);
$date = $linkdata['date'];
$link = $linkdata['link'];
$notes = $linkdata['notes'];
$pos = strpos($link, "=", 5) + 1;
$emmbd = substr($link, $pos);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    deletelink($date);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Delete Link </title>

</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Delete Link</h2>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

                        <table class="table table-striped">


                            <tbody>
                                <tr>
                                    <td> <b> date: </b> <label for="">"<?php echo $date ?>"</label> </th>
                                </tr>
                                <tr>
                                    <td> <b> Notes: </b> <label for="">"<?php echo $notes ?>"</label> </th>
                                </tr>
                                <tr>

                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo ($emmbd); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                </tr>

                            </tbody>
                        </table>
                        <br>
                        <input type="submit" class="btn btn-danger" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>