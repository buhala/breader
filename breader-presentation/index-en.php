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
                <h1 >What is it?</h1>
                <ul>
                <li>An easier way to get informed</li>
                <li>A better way of choosing what to read</li>
                <li>It's a <b>better news reader</b></li></ul>
            </div>
            <div class='step' data-x='3000'>
                <h1>How does it work?</h1>
                <ul>
                    <li>You choose what you are interested in.</li>
                    <li>Based on your interests, the system picks up similar news </li>
                    <li>The more you read, the more accurate it gets :)</li>
                </ul>
            </div>
            <div class="step" data-x="4500">
                <h1>What is behind it?</h1>
                <ul>
                    <li>bFrame(http://goo.gl/ac6Yy)</li>
                    <li>A lot of reliable news sources(http://goo.gl/HrGCG)</li>
                    <li>Lots and lots of code</li>
                </ul>
            </div>
            <div class="step" data-x="6000">
                <h1><a href="http://breader.eu">Demo!</a></h1>
            </div>
            <div class="step" data-x="7500">
                <h1>10x for watching!</h1>
                Do we have more time...?
            </div>
            <div class="step" data-x="9000">
                <h1>Open source</h1>
                <a href="http://goo.gl/9qGql">http://goo.gl/9qGql</a>
            </div>
            <div class="step" id="design" data-x="10500">
                <h1>Test the new design</h1>
                ?betterdesign
            </div>
            <div class="step" data-x="12000">
                <h1>Baiii(for real this time)</h1>
                <img src="sad.jpg"><br>
                (by the way, you can ask questions.. or look at the kitty)
            </div>
            
        </div>
        <div id="timer"><div id="minutes">0</div>:<div id="seconds">00</div></div>

    </body>
<script src="impress.js"></script>
<script>impress().init();</script>
</html>
