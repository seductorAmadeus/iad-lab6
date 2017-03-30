<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Лабораторная работа №6</title>
    <style>
        body {
            background-size: cover;
            background-color: #300016;
            margin: 0;
            color: rgba(192, 193, 216, 0.6);
        }

        footer.footer-text {
            color: #c0c1d8;
        }

        H4 {
            color: rgba(192, 193, 216, 0.6);
            text-shadow: 2px 2px 3px rgba(255, 255, 255, 0.1);
        }

        form {
            margin: 0;
        }

        td, th {
            color: #c0c1d8;
        }

        table tr td:nth-child(3) {
            width: 15%;
            word-wrap: break-word;
            padding-right: 5%;
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

<table width="100%" cellpadding="5" cellspacing="0">
    <tr>
        <td width="50%" id="columnForm">
            <table border="1" width="10em" cellpadding="10" cellspacing="0">
                <tr>
                    <td bgcolor="#4f4f4f" colspan="4">
                        <form name="form" action="action_page.php" onsubmit="return validateForm()" method="post">
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
                            Введите Y: <input type="text" name="y">
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
                        </form>
                    </td>
                </tr>

                <tr>
                    <th>Попал?</th>
                    <th>X</th>
                    <th>Y</th>
                    <th>R</th>
                </tr>
                <?php
                if (isset($answer)) {
                    echo $answer;
                }
                ?>
            </table>
        </td>
        <td width="50%" id="columnGraph">
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
