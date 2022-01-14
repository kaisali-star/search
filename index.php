<?php require('linksfunctions.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Links</title>
    <script defer src="all.min.js"></script>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="bootstrap.min.js"></script>


    <style>
        .wrapper {
            width: 80%;
            margin: 0 auto;
        }

        table tr td:last-child {
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>

    <?php
    if (isset($_POST['search'])) :
        $keyword = $_POST['keyword'];
        $links = getlinks();

        foreach ($links as $link) :
            $add = "/?s=";
            if ($link["link"] == "https://www.mutaz.net") : $add = "/search/?query=";
            endif;
            $keyword = str_replace(" ", "+", $keyword);
            $newlink = $link["link"] . $add . $keyword;
            echo '<script> window.open("' . $newlink . '" ) </script>';
        endforeach;


    endif;
    ?>


    <div class="wrapper">
        <div class="container-fluid">
            <h2 class="pull-left">Links Search</h2>
            <form action="index.php" method="POST">
                <div class="row justify-content-end">
                    <div class=" col-6">
                        <div class="input-group ">
                            <span class="input-group-text" id="inputGroup-sizing">Search Keyword</span>
                            <input type="text" name="keyword" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                        </div>
                    </div>
                    <div class="col-3 ">
                        <input type="submit" name="search" class="btn btn-warning pull-right " value="Search in all sites">
                    </div>
                    <div class="col-3 ">
                        <a href="linkcreate.php" class="btn btn-success pull-right "><i class="fa fa-plus"></i> Add New link</a>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-md-12">
                </div>
                <div class="container">

                    <table class="table ">
                        <thead class="table-dark">
                            <tr>
                                <th hidden> date </th>
                                <th> No </th>
                                <th> link </th>
                                <th> Notes </th>
                                <th> action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $rows = getlinks();
                            $i = 0;
                            foreach ($rows as $row) : ?>
                                <tr>
                                    <td hidden> <?php echo $row["date"];
                                                $url = str_replace('https://www.youtube.com/watch?v=', '', $row["link"]); ?> </td>
                                    <td> <a><?php $i += 1;
                                            echo $i ?></a> </td>
                                    <td> <a href="<?php echo $row["link"] ?>" target="_blank"><?php echo $row["link"] ?></a> </td>

                                    <td> <?php echo $row["notes"] ?> </td>
                                    <td>

                                        <a href="linkupdate.php?date=<?php echo $row["date"] ?>" class="btn btn-sm btn-outline-secondary"><i class="fas fa-edit"></i></a>
                                        <a href="linkdelete.php?date=<?php echo $row["date"] ?>" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>

</body>

</html>