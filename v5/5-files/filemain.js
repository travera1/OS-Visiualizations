var animList = [];

var paused = false;

var fit = 0;

var p1 = 0;
var p2 = 0;
var p3 = 0;

var m1 = 0;
var m2 = 0;
var m3 = 0;

var m1c = 0;
var m2c = 0;
var m3c = 0;

var animSpeed = 1000;
var animLock = false;
var startLock = false;

var memtblpos;

function sleep(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) > milliseconds) {
            break;
        }
    }
}

function displayProcsnMems() {
    $('#p1span').text('P1: ' + p1);
    $('#p2span').text('P2: ' + p2);
    $('#p3span').text('P3: ' + p3);

    $('#m1span').text('M1: ' + m1);
    $('#m2span').text('M2: ' + m2);
    $('#m3span').text('M3: ' + m3);
}

$(document).ready(function () {
    memtblpos = $('#disktable').position();
    $('#rndData').click(function () {
        p1 = Math.floor(Math.random() * 1000);
        p2 = Math.floor(Math.random() * 1000);
        p3 = Math.floor(Math.random() * 1000);

        m1 = Math.floor(Math.random() * 1000);
        m2 = Math.floor(Math.random() * 1000);
        m3 = Math.floor(Math.random() * 1000);

        displayProcsnMems();
    });
    $('#start').click(function () {
        if (animLock) return;
        startLock = true;
        for (i = animList.length - 1; i >= 0; i--) {
            Undo(animList[i]);
        }
        currStep = 0;
        animLock = false;
        occupied = [false, false, false];
        setTimeout(function () {
            startLock = false;
        }, 1000);
    });
    $('#next').click(function () {
        if (animLock) return;
        paused = false;
        animate(0);
        paused = true;
    });
    $('#back').click(function () {
        if (animLock) return;
        if (animList.length < 1) return;
        Undo(animList[animList.length - 1], 1);
    });
    $('#play').click(function () {
        if (animLock || startLock || fit == 0) return;
        animSpeed = 1000;
        paused = false;
        //while(currStep < 3 && paused == false) {
        animate(0);
        //}
    });
    $('#pause').click(function () {
        //if (animLock) return;
        console.log('pausing: ' + paused);
        paused = true;
        console.log(paused);
    });
    $('#end').click(function () {
        if (animLock || startLock) return;
        paused = false;
        animSpeed = 100;
        //while(currStep < 3 && paused == false) {
        animate(0);
    });

    $('#contig').click(function () {
        if (animLock) return;
        fit = 1;
        $.ajax({
            async: true,   // this will solve the problem
            type: "GET",
            url: "../../files/p5-file-input-continuous.txt",
            dataType: "text",
            success: function (res) {
                console.log(res);
                lines = res.split('\r\n');
                var i = 0;
                lines.forEach(function (line, index) {
                    i++;
                    console.log(line + ' ' + line.length);
                    if (index == 0) {
                        slotcount = parseInt(line);
                    }
                    if (index == 1)
                        slots = line.split(',');
                    if (index == 2) {
                        filecount = parseInt(line);
                    }
                    if (index > 2) {
                        filedata = line.split(',');
                        files.push([filedata[0], filedata[1], filedata[2]]);
                    }
                }, this);
                updateFileSlots();
            }
        });
    });
    $('#linked').click(function () {
        if (animLock) return;
        fit = 2;
        $.ajax({
            async: true,   // this will solve the problem
            type: "GET",
            url: "../../files/p5-file-input-linked.txt",
            dataType: "text",
            success: function (res) {
                console.log(res);
                lines = res.split('\r\n');
                var i = 0;
                lines.forEach(function (line, index) {
                    i++;
                    console.log(line + ' ' + line.length);
                    if (index == 0) {
                        slotcount = parseInt(line);
                    }
                    if (index == 1)
                        slots = line.split(',');
                    if (index == 2) {
                        filecount = parseInt(line);
                    }
                    if (index > 2) {
                        filedata = line.split(',');
                        files.push([filedata[0], filedata[1], filedata[2]]);
                    }
                }, this);
                updateFileSlots();
            }
        });
    });
    $('#indexed').click(function () {
        if (animLock) return;
        fit = 3;
        $.ajax({
            async: true,   // this will solve the problem
            type: "GET",
            url: "../../files/p5-file-input-indexed.txt",
            dataType: "text",
            success: function (res) {
                console.log(res);
                lines = res.split('\r\n');
                var i = 0;
                lines.forEach(function (line, index) {
                    i++;
                    console.log(line + ' ' + line.length);
                    if (index == 0) {
                        slotcount = parseInt(line);
                    }
                    if (index == 1)
                        slots = line.split(',');
                    if (index == 2) {
                        filecount = parseInt(line);
                    }
                    if (index > 2) {
                        filedata = line.split(',');
                        files.push([filedata[0], filedata[1], filedata[2]]);
                    }
                }, this);
                updateFileSlots();
            }
        });
    });

    slots = [];
    files = [];

    slotcount = 0;

    filecount = 0;

    $('#uploadbtn').click(function () {
        uploadedmems = [];
        fileobj = $('#inputGroupFile01').prop('files')[0];
        fr = new FileReader();
        fr.readAsText(fileobj);
        var count = 0;
        fr.onload = function () {
            lines = fr.result.split('\r\n');
            var i = 0;
            lines.forEach(function (line, index) {
                i++;
                console.log(line + ' ' + line.length);
                if (index == 0) {
                    slotcount = parseInt(line);
                }
                if (index == 1)
                    slots = line.split(',');
                if (index == 2) {
                    filecount = parseInt(line);
                }
                if (index > 2) {
                    filedata = line.split(',');
                    files.push([filedata[0], filedata[1], filedata[2]]);
                }
            }, this);
            updateFileSlots();
            console.log(slots);
            console.log(files);
        };
    });
    $('#dwnld').click(function () {
        var text = [];
        var c = 0;
        animList.forEach(function (anim) {
            if (anim.mem == 'm1') {
                text += startend[0][0] + ' ' + startend[0][1] + ' ' + anim.proc.attr('id')[1] + '\n';
            }
            if (anim.mem == 'm2') {
                text += startend[1][0] + ' ' + startend[1][1] + ' ' + anim.proc.attr('id')[1] + '\n';
            }
            if (anim.mem == 'm3') {
                text += startend[2][0] + ' ' + startend[2][1] + ' ' + anim.proc.attr('id')[1] + '\n';
            }
            c++;
        }, this);
        var data = new Blob([text], { type: 'text/plain' });
        textFile = window.URL.createObjectURL(data);
        var a = document.createElement("a");
        document.body.appendChild(a);
        a.style = "display: none";
        a.href = textFile;
        a.download = 'output.txt';
        a.click();
        console.log(text);
    });
});

uploadedmems = [];
startend = [];

function updateFileSlots() {
    tablehtml = '';
    odd = slotcount % 4;
    loop = slotcount / 4;

    for (i = 0; i <= loop; i++) {
        tablehtml += "<tr>\r\n";
        for (i2 = 1; (i * 4 + i2) <= slotcount; i2++) {
            tablehtml += "<td id=\"" + (i * 4 + i2) + "\">" + (i * 4 + i2) + "<\/td>";
            if (i2 >= 4) break;
        }
        tablehtml += "\r\n<\/tr>";
    }
    $('#disktable').html(tablehtml);
}

function updateDirectory(mfile) {
    if (fit == 1 || fit == 2) {
        $('#dir tr:last').after('<tr><td>' + mfile[1] + '</td>' + '<td>' + (parseInt(slots.indexOf(mfile[0])) + 1) + '</td>' + '<td>' + (parseInt(slots.indexOf(mfile[0])) + parseInt(mfile[2])) + '</tr>');
        //$('#step').text('Step: ' + currStep);
    }
}

function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

var currStep = 0;
var occupied = [false, false, false];

function memCheck(proc, mem, loc) {
    console.log(proc + ' ' + mem);
    if (occupied[loc] != true) {
        if (mem >= proc) {
            return mem;
        } else return 99999;
    } else return 99999;

}
function memCheckW(proc, mem, loc) {
    console.log(proc + ' ' + mem);
    if (occupied[loc] != true) {
        if (mem >= proc) {
            return mem;
        } else return 0;
    } else return 0;
}

function getBestFit(proc) {
    console.log("checking: " + proc + "mem: " + m1);
    var bestmem = 0;
    if (m1 >= proc && m1 <= memCheck(proc, m2, 1) && m1 <= memCheck(proc, m3, 2) && occupied[0] != true) bestmem = 1;
    if (m2 >= proc && m2 <= memCheck(proc, m1, 0) && m2 <= memCheck(proc, m3, 2) && occupied[1] != true) bestmem = 2;
    if (m3 >= proc && m3 <= memCheck(proc, m1, 0) && m3 <= memCheck(proc, m2, 1) && occupied[2] != true) bestmem = 3;

    return bestmem;
}

function getWorstFit(proc) {
    var worstmem = 0;
    if (m1 >= proc && m1 >= memCheckW(proc, m2, 1) && m1 >= memCheckW(proc, m3, 2) && occupied[0] != true) worstmem = 1;
    if (m2 >= proc && m2 >= memCheckW(proc, m1, 0) && m2 >= memCheckW(proc, m3, 2) && occupied[1] != true) worstmem = 2;
    if (m3 >= proc && m3 >= memCheckW(proc, m1, 0) && m3 >= memCheckW(proc, m2, 1) && occupied[2] != true) worstmem = 3;

    return worstmem;
}

function animate(type) {
    console.log("Step: " + currStep);
    if (animLock || startLock) return;
    if (paused) return;
    if (currStep >= files.length) return;

    $('#step').html("Step: " + (currStep + 1));
    updateDirectory(files[currStep]);

    var blocks = [];
    files[currStep].push(getRandomColor());
    console.log(files[currStep][3]);
    for (i = 0; i <= (parseInt(files[currStep][2]) - 1); i++) {
        blocks += "<td " + "id=" + (files[currStep][1] + (i + 1)) + " style=\"width: 30px; height: 30px; background-color:" + files[currStep][3] + ";border-right: 1px solid;\"><\/td>";
    }

    $('#filearea').append("<span id=\"step\" style=\"display: inline; float: left; margin:" + (190 + (70 * currStep)) + "px 0px 0px -280px;\">" + files[currStep][1] + "<\/span>\r\n<table id=\'fileblock\' style=\"border: 1px solid;display: inline; float: left; margin: " + (220 + (70 * currStep)) + "px 0px 0px -280px;\">\r\n<tr>\r\n" + blocks + "\r\n<\/tr>\r\n<\/table>");
    if (fit == 1) {
        for (i = 0; i <= (files[currStep][2] - 1); i++) {
            moveProcToMem(files[currStep][1] + (i + 1), parseInt(slots.indexOf(files[currStep][0])) + i + 1, i);
        }
    }

    if (fit == 2) {
        for (i = 0; i <= (files[currStep][2] - 1); i++) {
            console.log("Inds: " + getInds(files[currStep][0], i));
            moveProcToMem(files[currStep][1] + (i + 1), getInds(files[currStep][0], i) + 1, i);
        }
    }

    if (fit == 3) {
        for (i = 0; i <= (files[currStep][2] - 1); i++) {
            //console.log("Inds: " + getInds(files[currStep][0], i));
            moveProcToMem(files[currStep][1] + (i + 1), getInds(files[currStep][0], i) + 1, i);
        }
    }

    currStep++;
    //}

}

function getInds(id, num) {
    var count = 0;
    //console.log('id: ' + id + ' num: ' + num);
    if (num == 0) return slots.indexOf(id);

    for (index = 0; index < slots.length; index++) {
        if (slots[index] == id) count++;
        if (count > num) return index;
    }

}

function moveProcToMem(proc, mem, rem, chck) {
    console.log('proc: ' + proc + ' mem: ' + mem);
    animLock = true;
    col = getRandomColor();
    if (fit == 3 && rem == 0) {
        $('#' + proc).css({ backgroundColor: col });
    }
    //$('#' + proc).css({ backgroundColor: getRandomColor() });
    var clonedProc = $('#' + proc).clone();
    var cloned = "<div id=\"" + (proc + 'cloned') + "\" style=\"display: inline-block;position: absolute;height: 30px; width:30px;border: 1px solid;\"></div>";
    //$('#animarea').append(cloned);
    $('#' + proc).append(cloned);
    animList.push({ org: $('#' + proc), proc: clonedProc, mem: mem, top: clonedProc.position().top });
    $('#' + (proc + 'cloned')).css('background-color', files[currStep][3]);
    if (fit == 3 && rem == 0) {
        $('#' + (proc + 'cloned')).css('background-color', col);
    } else {
        $('#' + (proc + 'cloned')).css('background-color', files[currStep][3]);
    }
    $('#' + (proc + 'cloned')).animate({ left: memtblpos.left + $('#' + mem).position().left + 100, top: memtblpos.top + $('#' + mem).position().top, width: 50, height: 50 }, animSpeed, function () {
        animLock = false;
        if (rem > 0) return;
        //$('#' + mem + 'slot').text('' + rem);
        if (currStep > filecount) return;
        animate(0);
    });
    if (rem > 0) {
        //$('#' + mem).animate({ height: $('#' + mem).height() + 50 });
    }
}

function displayDot(proc) {
    console.log("displayig dot: " + proc);
    $('#' + proc + 'hide').show();
}

function hideDot(proc) {
    console.log("hiding dot: " + proc);
    $('#' + proc + 'hide').hide();
}

function Undo(anim, rem) {
    animLock = true;
    if (currStep > 0)
        currStep--;
    console.log('proc mem: ' + anim.mem);
    switch (anim.mem) {
        case 'm1': occupied[0] = false; break;
        case 'm2': occupied[1] = false; break;
        case 'm3': occupied[2] = false; break;
    }
    console.log("undoing: " + anim.top + " " + anim.proc);
    var procs = 0;
    animList.forEach(function (val, index, arr) {
        if (val.mem == anim.mem) procs++;
    }, this);
    if (anim.mem == 'dot')
        hideDot(anim.proc.attr('id'));
    anim.proc.animate({ left: 35, top: anim.top }, animSpeed, function () {
        animLock = false;
        animList.pop();
        anim.proc.css({ backgroundColor: "#E0DDD8" });
        if (anim.mem != 'dot') {
            anim.proc.remove();
            anim.org.css({ backgroundColor: '#E0DDD8' });
        }
        procs = 0;
        animList.forEach(function (val, index, arr) {
            if (val.mem == anim.mem) procs++;
        }, this);
        if (procs >= 1) {
            $('#' + anim.mem + 'slot').text('' + rem);
        } else if (procs < 1) {
            $('#' + anim.mem + 'slot').text(' ');
        }
    });
    if (procs >= 1) {
        //$('#' + anim.mem).animate({ height: $('#' + anim.mem).height() - 50 });
    }
}