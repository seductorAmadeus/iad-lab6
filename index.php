<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Лабораторная работа №6</title>
    <style>
        body {
            background-size: cover;
            background-color: #300016;
            margin: 0;
        }

        footer.footer-text {
            color: #c0c1d8;
        }

        H4 {
            color: rgba(192, 193, 216, 0.6);
            text-shadow: 2px 2px 3px rgba(255, 255, 255, 0.1);
        }

        /* create two columns of the same width */
        table {
            table-layout: fixed;
            width: 100%;
        }

        td, th {
            width: 100%;
        }

        .footer-text {
            text-align: center;
        }

        .header-bg {
            text-align: justify;
            height: 6.5em;
            padding: 1em 2%;
            background: #3d0913;
        }

        .header-font {
            font-family: cursive;
            font-size: 18px;
            color: #c0c1d8;
        }

        .img {
            display: block;
            margin: 0 auto;
            border: 3px solid #4f4f4f;
        }

        #columnForm {
            background-color: #4f4f4f;
            height: 45em;
        }

        #columnGraph {
            background-color: #c0c1d8;
            text-align: center;
        }

        a:link {
            color: #8685e1;
        }
    </style>
    <script type="text/javascript" src="validateForm.js"></script>
</head>

<body>

<header>
    <div class="header-bg">
        <div class="header-font">
            <H2>Лабораторная работа №6</H2>
            <H4>Райла Мартин, гр.P3211, вариант №3010</H4>
        </div>
    </div>
</header>

<table width="90%" cellpadding="5" cellspacing="0">
    <tr>
        <td id="columnForm">
            <table width="10em" cellpadding="30" cellspacing="0">
                <tr>
                    <td bgcolor="#4f4f4f">
                        <form name="form" action="/action_page.php" onsubmit="return validateForm()" method="post">
                            Выберите X: <select name="x">
                                <option value="-4">-4</option>
                                <option value="-3">-3</option>
                                <option value="-2">-2</option>
                                <option value="-1">-1</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <br><br>
                            Введите Y: <input type="text" name="y" value="0">
                            <br><br>
                            Выберите R: <select name="radius">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <br><br>
                            <button type="submit" onclick="validateForm()">Проверить</button>
                            <p id="answerValid"></p>
                            <input id="hiddenAnswerValid" type="hidden" name="hideAnswer" value="2">
                        </form>
                    </td>
                </tr>
                <tr>
                    <!-- TODO: Добавить условие для проверки валидности ответа в hideAnswer -->
                    <td bgcolor="#f9f9f9">
                        <?php
                        // begin the session
        //                        session_start();
                        // loop through the session array with foreach
                        foreach($_SESSION['answer'] as $key=>$value)
                        {
                            // and print out the values
                            echo 'The value of $_SESSION['."'".$key."'".'] is '."'".$value."'".' <br />';
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </td>
        <td id="columnGraph">
            <p><img class="img" src="images/figure.png" alt="Фигура" width="420" height="350"></p>
        </td>
    </tr>
</table>

<footer class="footer-text">
    <p>Posted by: seductorAmadeus</p>
    <p>Contact information:
        <a href="mailto:seductorAmadeus@gmail.com">
            seductorAmadeus@gmail.com</a>
    </p>
</footer>

</body>

</html>