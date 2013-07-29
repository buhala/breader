<!DOCTYPE html>
<html>
    <head>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link href="timer.css" rel="stylesheet" type="text/css">
        <script src="jquery.js"></script>
        <script src="timer.js"></script>
        <script>startTimer();</script>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <div id="impress">
            <div class="step">
                <h1>bReader-the better RSS reader</h1>
                http://breader.eu
            </div>
            <div class="step" data-x="1500">
                <h1 >Какво е?</h1>
                <ul>
                <li>По-лесният начин да се информираш</li>
                <li>По-добрият начин да избереш какво да четеш</li>
                <li>То е <b>по-добрият четец за новини</b></li></ul>
            </div>
            <div class='step' data-x='3000'>
                <h1>Как работи?</h1>
                <ul>
                    <li>Избираш от какво се интересуваш.</li>
                    <li>На база на интересите, получаваш новини </li>
                    <li>Колкото повече четеш, толкова по-точно става</li>
                </ul>
            </div>
            <div class="step" data-x="4500">
                <h1>Какво е зад системата?</h1>
                <ul>
                    <li>bFrame(http://goo.gl/ac6Yy)</li>
                    <li>Много (добри) сайтове за новини(http://goo.gl/HrGCG)</li>
                    <li>iUI(http://goo.gl/13zh1)</li>
					<li>PHP/HTML/CSS/jQuery/Python</li>
                </ul>
            </div>
            <div class="step" data-x="6000">
                <h1><a href="http://breader.eu">Демо!</a></h1>
            </div>
            <div class="step" data-x="7500">
                <h1>10x 4e ma slushahte!</h1>
               Имаме ли време?
            </div>
            <div class="step" data-x="9000">
                <h1>Open source</h1>
                <a href="http://goo.gl/9qGql">http://goo.gl/9qGql</a>
            </div>
			<div class="step" data-x="10500">
                <h1>Излизате?</h1>
                <img src="mobile.png" height="400">
            </div>
            <div class="step" id="design" data-x="12000">
                <h1>Пробвай новия дизайн</h1>
                ?betterdesign
            </div>
            <div class="step" data-x="13500">
                <h1>Чаоооо(този път наистина)</h1>
                <img src="sad.jpg"><br>
                (Между другото, може да питате въпроси.. Или да гледате котето)
            </div>
            
        </div>
        <div id="timer"><div id="minutes">0</div>:<div id="seconds">00</div></div>

    </body>
<script src="impress.js"></script>
<script>impress().init();</script>
</html>
