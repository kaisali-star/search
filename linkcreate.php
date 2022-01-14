<?php
require('linksfunctions.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    createlink($_POST);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create link</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 100%;
            margin: 0 auto;
        }

        .input {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Link</h2>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

                        <table class="table table-striped">


                            <tbody>

                                <tr>
                                    <th> Link </th>
                                    <td><input name="link" class="input" value="" calss="form-control"></td>
                                </tr>

                                <tr>
                                    <th> Notes </th>
                                    <td><input name="notes" class="input" value="" calss="form-control"></td>
                                </tr>
                                <tr>

                            </tbody>
                        </table>







                        <br>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>