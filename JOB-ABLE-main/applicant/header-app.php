<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mohave:ital,wght@0,300..700;1,300..700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">
    <style>

        header{
            width: 100%;
            height: fit-content;
            position: fixed;
            top: 0;
            
            display: flex;
            justify-content: space-between;
            align-items: center;

            background-color: #FFFFFF;
            color: #09164E;
            box-shadow: -1px 10px 20px -5px #05166d38;

            font-family: 'Mohave';
            font-size: 1.6em;

            margin: 0;
            padding: 1%;
        }

        .web-name{
            padding-left: 20px;
            display: flex;
            align-items: center;

            font-family: 'Montserrat';
            font-weight: 700;
            font-size: 2em;
        }

        .able{
            color: #FFC83C;
        }

        .nav{
            display: flex;
            align-items: center;
            gap: 100px;

            padding-right: 50px;
        }

        .options{
            display: flex;
            gap: 40px;

            margin: 5px;
        }

        .options a{
            text-decoration: none;
            
            font-family: 'Mohave' !important;
            font-size: 1em !important; 
            font-weight: 600;
            color: #09164E;
        }

        .icons{
            display: flex;
            align-items: center;
            right: 0;
        }

        .icons .notif{
            width: 45%;
            height: 45%;
        }

        .icons .profile{
            width: 80%;
            height: 80%;
        }

    </style>
</head>
<body>
    <header>
        <div class="web-name">
            <img src="../assets/logo placeholder.png" alt="JOB-ABLE"> JOB-<span class="able">ABLE</span>
        </div>

        <div class="nav">
            <div class="options">
                <a href="home_page_applicant.php">HOME</a>
                <a href="browse_page_applicant.php">BROWSE</a>
            </div>

            <div class="icons">
                <a href="Profile-Applicant-View.php"><img class="profile" src="../assets/account icon.png" alt="Account"></a>
            </div>
        </div>
    </header>
</body>
</html>