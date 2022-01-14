<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>

</head>

<body>
    <?php

    require('linksfunctions.php');

    $linkdate = $_GET['date'];

    $row = getlinkBydate($linkdate);

    ?>
    <div class="float-container">

        <div class="float-child" style="width: 45%;float: left;padding: 20px;">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h3> View link </h3>
                    </div>
                    <div class="card-body">
                        <?php
                        $url = str_replace('https://www.youtube.com/watch?v=', '', $row["link"]); ?>

                        <a class="btn btn-outline-info" href="javascript:CopyToClipboard('<?php echo ($url) ?>')"> Copy link</a>
                        <a href="linkupdate.php?date=<?php echo $row["date"] ?>" class="btn btn-outline-success">Update</i></a>
                        <a class="btn btn-outline-danger" href="linkdelete.php?date=<?php echo $row["date"] ?>"> Delete</a>
                        <a class="btn btn-outline-secondary" href="index.php"> Back</a>

                    </div>
                </div>


                <table class="table">


                    <tbody>
                        <tr>
                            <th> date </th>
                            <td><?php echo $row['date'] ?></td>
                        </tr>
                        <tr>
                            <th> Link </th>
                            <td><?php echo $row['link'];
                                $pos = strpos($row['link'], "=", 5) + 1;
                                $emmbd = substr($row['link'], $pos);

                                ?></td>
                        </tr>



                        <tr>
                            <th> Notes </th>
                            <td><?php echo $row['notes'] ?></td>
                        </tr>
                        <tr>
                            <th> id </th>
                            <td><?php echo $row['id'] ?></td>
                        </tr>
                        <tr>
                            <th> Image </th>
                            <td><a href="<?php echo $row['thumbnail'] ?>"><img src="<?php echo $row['thumbnail'] ?>" alt=""></a></td>
                        </tr>
                        <tr>
                            <th> title </th>
                            <td><?php echo $row['title'] ?></td>
                        </tr>
                        <tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    </div>


    <div class="float-child" style="width: 50%;float: left;padding: 20px;">

        <div class="mapouter" style="position: relative;
            float: left; width:100%">
            <div class="gmap_canvas">
                <h3>Youtube link</h3>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo ($emmbd); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


            </div>
        </div>

    </div>
    </div>
    </div>
    </div>

</body>

</html>