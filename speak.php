<script>
    (function (e, p) {
        var m = location.href.match(/platform=(win8|win|mac|linux|cros)/);
        e.id = (m && m[1]) ||
            (p.indexOf('Windows NT 6.2') > -1 ? 'win8' : p.indexOf('Windows') > -1 ? 'win' : p.indexOf('Mac') > -1 ? 'mac' : p.indexOf('CrOS') > -1 ? 'cros' : 'linux');
        e.className = e.className.replace(/\bno-js\b/, 'js');
    })(document.documentElement, window.navigator.userAgent)
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>2Beginner</title>
    <link href="Image/hi.png" rel="icon" type="image/ico">
    <!-- Bootstrap CSS + jQuery library -->
    <link href="https://plus.google.com/100585555255542998765" rel="publisher">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="//www.google.com/js/gweb/analytics/autotrack.js"></script>
    <script>
        new gweb.analytics.AutoTrack({
            profile: 'UA-26908291-1'
        });
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php include "head.php" ?>
<div class="container-fluid">
    <div class="row">
        <div class="sidenav">
            Danh sách bài nói
        </div>
        <div class="content">
            <div id="ndhoc">
                <p>Content</p>
            </div>
            <p>Let practice with this exercise. Try your best.</p>
            <div id="ktra">
                <div id="speaker">
                    <button id="start_listen" onclick="start_listen()"><img src="Image/audio.png"></button>
                </div>
                <div id="ndcandoc">
                    <p id="nd">Hello World. My name is Panda.
                    <p>
                </div>
            </div>
            <div id="info">
                <p id="info_start">
                    Click on the microphone icon and begin speaking for as long as you like.
                </p>
                <p id="info_speak_now" style="display:none">
                    Speak now.
                </p>
                <p id="info_no_speech" style="display:none">
                    No speech was detected. You may need to adjust your
                    <a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">microphone
                        settings</a>.
                </p>
                <p id="info_no_microphone" style="display:none">
                    No microphone was found. Ensure that a microphone is installed and that
                    <a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">
                        microphone settings</a> are configured correctly.
                </p>
                <p id="info_allow" style="display:none">
                    Click the "Allow" button above to enable your microphone.
                </p>
                <p id="info_denied" style="display:none">
                    Permission to use microphone was denied.
                </p>
                <p id="info_blocked" style="display:none">
                    Permission to use microphone is blocked. To change, go to
                    chrome://settings/contentExceptions#media-stream
                </p>
                <p id="info_upgrade" style="display:none">
                    Web Speech API is not supported by this browser. Upgrade to <a href=
                                                                                   "//www.google.com/chrome">Chrome</a>
                    version 25 or later.
                </p>
            </div>
            <div id="div_start">
                <button id="start_button" onclick="startButton(event)"><img id="start_img" src="Image/mic.png">
                </button>
            </div>
            <div id="results">
                <span class="final" id="final_span"></span>
                <span class="interim" id="interim_span"></span>
            </div>
            <div class="compact marquee" id="div_language">
                <label for="select_dialect">Choose your accent</label>
                <select id="select_dialect">
                </select>
            </div>
            <form name = "chech" action="xuli.php" method="POST">
                <textarea hidden name="results" id="listenressult"></textarea>
                <button name="checkspeak" class="btn btn-success" >Check</button>
            </form>
        </div>
    </div>
    <div class="row">
        <?php include "footer.php"; ?>
    </div>
</div>
</body>
</html>

<script>
    $('#final_span').onchange(function () {
        $('#listenressult').val("hihi");
    })
    function start_listen() {
        var msg = new SpeechSynthesisUtterance();
        var voices = speechSynthesis.getVoices();
        msg.voice = voices[1]; // giọng người đọc
        msg.voiceURI = 'native';
        msg.volume = 1; // 0 đến 1
        msg.rate = 1; // 0.1 đến 10
        msg.pitch = 2; // 0 đến 2
        msg.text = document.getElementById('nd').innerHTML;
        console.log(document.getElementById('nd').innerHTML)
        msg.lang = select_dialect.value; // ngôn ngữ
        speechSynthesis.speak(msg);
    }

    var chrmMenuBar = new chrm.ui.MenuBar();
    chrmMenuBar.decorate('nav');
    var chrmLogo = new chrm.ui.Logo('logo');
    var chrmscroll = new chrm.ui.SmoothScroll('scroll');
    chrmscroll.init();

    window.___gcfg = {lang: 'en'};
    (function () {
        var po = document.createElement('script');
        po.type = 'text/javascript';
        po.async = true;
        po.src = 'https://apis.google.com/js/plusone.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(po, s);
    })();

    var doubleTracker = new gweb.analytics.DoubleTrack('floodlight', {
        src: 2542116,
        type: 'clien612',
        cat: 'chrom0'
    });
    doubleTracker.track();

    doubleTracker.trackClass('doubletrack', true);
</script>
<script>
    var langs =
        {
            'en-AU': 'Australia',
            'en-CA': 'Canada',
            'en-IN': 'India',
            'en-KE': 'Kenya',
            'en-TZ': 'Tanzania',
            'en-GH': 'Ghana',
            'en-NZ': 'New Zealand',
            'en-NG': 'Nigeria',
            'en-ZA': 'South Africa',
            'en-PH': 'Philippines',
            'en-GB': 'United Kingdom',
            'en-US': 'United States'
        };

    updateDialect();
    select_dialect.selectedIndex = 11;
    showInfo('info_start');

    function updateDialect() {
        var sel = document.getElementById("select_dialect");
        for (index in langs) {
            var option = document.createElement("option");
            option.value = index;
            option.text = langs[index];
            sel.add(option);
        }
    }

    var final_transcript = '';
    var recognizing = false;
    var ignore_onend;
    var start_timestamp;
    if (!('webkitSpeechRecognition' in window)) {
        upgrade();
    } else {
        start_button.style.display = 'inline-block';
        var recognition = new webkitSpeechRecognition();
        recognition.continuous = true;
        recognition.interimResults = true;

        recognition.onstart = function () {
            recognizing = true;
            showInfo('info_speak_now');
            start_img.src = 'Image/mic-animate.gif';
        };

        recognition.onerror = function (event) {
            if (event.error == 'no-speech') {
                start_img.src = 'Image/mic.png';
                showInfo('info_no_speech');
                ignore_onend = true;
            }
            if (event.error == 'audio-capture') {
                start_img.src = 'Image/mic.png';
                showInfo('info_no_microphone');
                ignore_onend = true;
            }
            if (event.error == 'not-allowed') {
                if (event.timeStamp - start_timestamp < 100) {
                    showInfo('info_blocked');
                } else {
                    showInfo('info_denied');
                }
                ignore_onend = true;
            }
        };

        recognition.onend = function () {
            recognizing = false;
            if (ignore_onend) {
                return;
            }
            start_img.src = 'Image/mic.png';
            if (!final_transcript) {
                showInfo('info_start');
                return;
            }
            showInfo('');
            if (window.getSelection) {
                window.getSelection().removeAllRanges();
                var range = document.createRange();
                range.selectNode(document.getElementById('final_span'));
                window.getSelection().addRange(range);
            }
        };

        recognition.onresult = function (event) {
            var interim_transcript = '';
            if (typeof(event.results) == 'undefined') {
                recognition.onend = null;
                recognition.stop();
                upgrade();
                return;
            }
            for (var i = event.resultIndex; i < event.results.length; ++i) {
                if (event.results[i].isFinal) {
                    final_transcript += event.results[i][0].transcript;
                } else {
                    interim_transcript += event.results[i][0].transcript;
                }
            }
            final_transcript = capitalize(final_transcript);
            final_span.innerHTML = linebreak(final_transcript);
            interim_span.innerHTML = linebreak(interim_transcript);
        };
    }

    function upgrade() {
        start_button.style.visibility = 'hidden';
        showInfo('info_upgrade');
    }

    var two_line = /\n\n/g;
    var one_line = /\n/g;

    function linebreak(s) {
        return s.replace(two_line, '<p></p>').replace(one_line, '<br>');
    }

    var first_char = /\S/;

    function capitalize(s) {
        return s.replace(first_char, function (m) {
            return m.toUpperCase();
        });
    }

    function startButton(event) {
        if (recognizing) {
            recognition.stop();
            return;
        }
        final_transcript = '';
        recognition.lang = select_dialect.value;
        recognition.start();
        ignore_onend = false;
        final_span.innerHTML = '';
        interim_span.innerHTML = '';
        start_img.src = 'Image/mic-slash.gif';
        showInfo('info_allow');
        start_timestamp = event.timeStamp;
    }

    function showInfo(s) {
        if (s) {
            for (var child = info.firstChild; child; child = child.nextSibling) {
                if (child.style) {
                    child.style.display = child.id == s ? 'inline' : 'none';
                }
            }
            info.style.visibility = 'visible';
        } else {
            info.style.visibility = 'hidden';
        }
    }
</script>