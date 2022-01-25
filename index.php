<!DOCTYPE html>
<html>

<head>
    <title>My Simple Project Management | phpGrid</title>
    <style>
        .back{
            background-color: rgba(0, 255, 255, 0.5);
        }
        .centered {
            margin: 0;
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .footer {
            position: fixed;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 1rem;
            background-color: #efefef;
            text-align: center;
        }
    </style>
</head>

<body class="back">

    <div class="centered">
        <h1>My Simple Project Management</h1>
        <!-- <a href="manager/clients.php" target="_new">Login as manager</a> | <a href="employee/tasks.php" target="_new">Login as employee</a> -->
        <button onclick="login.php"><a href="login.php">Login</a></button>
    </div>

    <div class="footer"><strong>Build-From-Scratch Series</strong> | phpGrid &copy; <?php echo date('Y'); ?>.</div>

</body>

</html>