var mylevel = 1;
var mabai = 4;

function check() {
    var s1 = $("#final_span").text().toLowerCase()
    var s2 = $("#nd").text().toLowerCase()
    s2 = s2.replace(/[&\/\\#,+()$~%.'":*?<>{}]/g, "")
    s2 = s2.replace(/\s{2,}/g, ' ');
    console.log(s1)
    console.log(s2)
    $.ajax({
        url: "checkspeak.php",
        dataType: "json",
        data: {"action": "check", "s1": s1, "s2": s2, "level": mylevel, "mabai": mabai},
        type: 'post',
        success: function (output) {
            console.log(output);
            if (output.done) {
                $('.modal-confirm .btn').css('background', '#82ce34');
                $('.modal-confirm .icon-box').css('background', '#82ce34');
                $('.material-icons').html('&#xE876;');
                $('.modal-title').html('Awesome!');
                $('#modal-btn').text('Go to next level');
                $('#modal-mark').html(output.percent + "/100");
                $('#modal-btn').attr("href", "speak.php?level=" + output.next);
                $('#modal-msg').html('Congratulations! You have finished level ' + mylevel + '.');
                //show button next + change tag in list-group if modal is closed
            }
            else {
                $('.modal-confirm .btn').css('background', '#ef513a');
                $('.modal-confirm .icon-box').css('background', '#ef513a');
                $('.material-icons').html('&#xE5CD;');
                $('.modal-title').html('Sorry!');
                $('#modal-msg').html('Please go back and do again. Try your best.');
                $('#modal-btn').text('OK');
                $('#modal-mark').html(output.percent + "/100");
                $('#modal-btn').attr("href", "speak.php?level=" + output.next);
                //clear input
            }
            $('#myModal').modal('show');
        }
    });
}

function getListLevels() {
    var level = getUrlParameter('level');
    $.ajax({
        url: "inispeak.php",
        dataType: "json",
        data: {action: "getlist", level: level},
        type: 'post',
        success: function (output) {
            console.log(output.type);
            var arr = output.levels;
            var count = output.count;
            var doing = output.levelspeak;
            for (i = 1; i <= count; i++) {
                if (i == doing)
                    $('#list-level').append('<a href="speak.php?level=' + i + '" class="list-group-item list-group-item-action">\n' +
                        '                            Level ' + i + '\n' +
                        '                            <span class="label label-primary pull-right">Doing</span>\n' +
                        '                        </a>');
                else if (arr[i] == "false") $('#list-level').append('<a href="speak.php?level=' + i + '" class="list-group-item list-group-item-action disabled">Level ' + i + '</a>');
                else
                    $('#list-level').append('<a href="speak.php?level=' + i + '" class="list-group-item list-group-item-action">\n' +
                        '                            Level ' + i + '\n' +
                        '                            <span class="label pull-right"><img src="Image/checked.png" class="img-responsive"></span>\n' +
                        '                        </a>');
            }
            if (output.type == 1) getContent1();
            else if (output.type == 2) getContent2(level);
            else if (output.type == 3) getContent3(level);
            else getContent4(level);
        }
    });
}

function getContent1() {
    $('.content').replaceWith('<div class="panel-body content">' +
        '<table><tr>' +
        '<td><img src="Image/sorry.gif" alt="">' +
        '</td>' +
        '<td><div style="font-size: larger; font-style: italic; font-weight: bold; font-family:\'Courier New\'">' +
        'Sorry!<br>Our system doesn\'t have this lesson. We will update soon. Let keep supporting us.<br>Thank you!' +
        '</div></td></tr></table></div>');
}

function getContent2(level) {
    $.ajax({
        url: "inispeak.php",
        dataType: "json",
        data: {action: "getcontenttype2", level: level},
        type: 'post',
        success: function (output) {
            $('#title').text(output.TieuDe);
            $('#needtolearn').text(output.NoiDung);
            $('#nd').text(output.Transcript);
            $('#ktra').hide();
            $('#announce').replaceWith('<div id="announce"><div class="alert alert-warning" role="alert">' +
                '<img src="Image/Warning.png" style="float: left">' +
                '<div style="font-size: larger; color: red; font-weight: bold">You just can do this exercise if you finish all of your previous levels.</div>' +
                '</div></div>');
        }
    });
}

function getContent3(level) {
    $.ajax({
        url: "inispeak.php",
        dataType: "json",
        data: {action: "getcontenttype3", level: level},
        type: 'post',
        success: function (output) {
            $('#title').text(output.TieuDe);
            $('#needtolearn').text(output.NoiDung);
            $('#nd').text(output.Transcript);
            $('#ktra').hide();
            $('#announce').replaceWith('<div id="announce" class="alert alert-success"><table width="100%"><tr>' +
                '<td rowspan="2"><img src="Image/badge" class="img-responsive"></td>' +
                '<td class="text-center" style="font-size: larger">Congrat! You have passed this level at ' + output.Time + '</td>' +
                '</tr><tr><td>' +
                '<div class="progress" style="width: 100%">\n' +
                '<div class="progress-bar progress-bar-striped active" role="progressbar"\n' +
                '  aria-valuenow="' + output.Diem + '" aria-valuemin="0" aria-valuemax="100" style="width: ' + output.Diem + '%">\n' +
                output.Diem + '%\n' +
                '  </div></div></td></tr></table></div><button name="doagain" id="redo" class="btn" onclick="redo()">Redo</button>');
            mabai = output.MaBai;
            mylevel = level;
        }
    });
}

function getContent4(level) {
    $.ajax({
        url: "inispeak.php",
        dataType: "json",
        data: {action: "getcontenttype4", level: level},
        type: 'post',
        success: function (output) {
            $('#title').text(output.TieuDe);
            $('#needtolearn').text(output.NoiDung);
            $('#nd').text(output.Transcript);
            mabai = output.MaBai;
            mylevel = level;
        }
    });
}

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
}

function redo() {
    $('#ktra').show();
    $('#announce').hide();
}