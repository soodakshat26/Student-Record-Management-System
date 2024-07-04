<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <!-- Include necessary CSS and JS files here -->
</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#"><b>SRMS </b></a>
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li><a><i class="icon-user icon-large"></i> Welcome: <strong><?php echo htmlspecialchars($_SESSION['SESS_LAST_NAME'] ?? ''); ?></strong></a></li>
                    <li><a><i class="icon-calendar icon-large"></i>
                            <?php
                            $today = date('Y-m-d');
                            $new = date('l, F d, Y', strtotime($today));
                            echo htmlspecialchars($new);
                            ?>
                        </a></li>
                    <li><a href="../index.php"><font color="red"><i class="icon-off icon-large"></i></font> Log Out</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<!-- Other HTML content or PHP logic as needed -->

</body>
</html>
