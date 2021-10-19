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

ps = [];
ms = [];
mcs = [];

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
    //$('#procsarea').html('');
    procshtml = '';
    memshtml = '';
    ps.forEach(function (val, index) {
        val2 = index + 1;
        procshtml += "<div id=\"p" + val2 + "\"\r\nstyle=\"display: inline-block; width: 100px; height: 50px; background-color: #E0DDD8; position: absolute; left: 35px; top: " + (100 + (60 * index)) + "px; z-index: 99999;\">\r\n" +
            "<div class=\"align-items-center justify-content-center\"\r\n" +
            "style=\"display: inline-flex; width: 100%; height: 100%; text-align: center; height: 100%;\">\r\n" +
            "<span id=\"p" + val2 + "span\">P" + val2 + ": " + val + "<\/span>\r\n" +
            "<span id=\"p" + val2 + "hide\" class=\"badge badge-light\" style=\"right: 0; bottom: 0;position: absolute; background-color: red; display: none;\">0<\/span>\r\n            <\/div>\r\n        <\/div>";
    }, this);

    ms.forEach(function (val, index) {
        val2 = index + 1;
        memshtml += "<tr id=\"m" + val2 + "\" style=\"height: 70px;\">\r\n<td id=\"m" + val2 + "span\"\r\nstyle=\"text-align: center; border-right: 1px solid; border-bottom: 1px solid; width: 80px;\">M" + val2 + ": " + val[0] + "\r\n<\/td>\r\n" +
            "<td id=\"m" + val2 + "slot\"\r\nstyle=\"vertical-align:bottom; text-align: center; width: 100px; border-bottom: 1px solid;\"><\/td>\r\n<\/tr>";
    }, this);

    $('#procsarea').html(procshtml);
    $('#memtbl').html(memshtml);
}

$(document).ready(function () {
    memtblpos = $('#memdiv').position();

    /* fileobj = $('#inputGroupFile01').prop('files')[0];

    fr = new FileReader();
    fr.readAsText(fileobj);
    var count = 0;
    var memcount = 0;
    fr.onload = function () {
        lines = fr.result.split('\r\n');
        lines.forEach(function (line) {
            //console.log(line + ' ' + line.length);
            if (count == 0) {
                memcount = parseInt(line);
            }
            nums = line.split(' ');
            if (count <= memcount && count > 0) {
                ms.push([parseInt(nums[1]) - parseInt(nums[0]), false]);
                startend.push([nums[0], nums[1]]);
            }

            if (count >= memcount + 2)
                ps.push(parseInt(nums[1]));
            count++;
        }, this);

        displayProcsnMems();
    }; */

    $.ajax({
        async: true,   // this will solve the problem
        type: "GET",
        url: "../../files/memory.txt",
        dataType: "text",
        success: function (res) {
            console.log(res);
            lines = res.split('\r\n');
            console.log('lines: ' + lines[0]);
            lines.forEach(function (line, count) {
                //console.log(line + ' ' + line.length);
                if (count == 0) {
                    memcount = parseInt(line);
                }
                nums = line.split(' ');
                if (count <= memcount && count > 0) {
                    ms.push([parseInt(nums[1]) - parseInt(nums[0]), false]);
                    startend.push([nums[0], nums[1]]);
                }

                if (count >= memcount + 2)
                    ps.push(parseInt(nums[1]));
                count++;
            }, this);
            displayProcsnMems();
        }
    });
    
    /* var rawFile = new XMLHttpRequest();
    rawFile.open("GET", 'input.txt', false);
    rawFile.onreadystatechange = function () {
        if (rawFile.readyState === 4) {
            if (rawFile.status === 200 || rawFile.status == 0) {
                var allText = rawFile.responseText;
                lines = allText.split('\r\n');
                lines.forEach(function (line) {
                    //console.log(line + ' ' + line.length);
                    if (count == 0) {
                        memcount = parseInt(line);
                    }
                    nums = line.split(' ');
                    if (count <= memcount && count > 0) {
                        ms.push([parseInt(nums[1]) - parseInt(nums[0]), false]);
                        startend.push([nums[0], nums[1]]);
                    }

                    if (count >= memcount + 2)
                        ps.push(parseInt(nums[1]));
                    count++;
                }, this);
            }
        }
    }; */

    $('#rndData').click(function () {
        p1 = Math.floor(Math.random() * 1000);
        p2 = Math.floor(Math.random() * 1000);
        p3 = Math.floor(Math.random() * 1000);

        m1 = Math.floor(Math.random() * 1000);
        m2 = Math.floor(Math.random() * 1000);
        m3 = Math.floor(Math.random() * 1000);
        ms = [];
        ps = [];
        var rndNum = Math.floor(Math.random() * 10) + 1;
        for(i = 0; i < rndNum; i++) {
            ms.push([Math.floor(Math.random() * 1000), false]);
            ps.push(Math.floor(Math.random() * 1000));
        }
        
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
        if (animLock || startLock) return;
        animSpeed = 1000;
        paused = false;
        //while(currStep < 3 && paused == false) {
        animate(0);
        //}
    });
    $('#pause').click(function () {
        //if (animLock) return;
        //console.log('pausing: ' + paused);
        paused = true;
        //console.log(paused);
    });
    $('#end').click(function () {
        if (animLock || startLock) return;
        paused = false;
        animSpeed = 100;
        //while(currStep < 3 && paused == false) {
        animate(0);
    });

    $('#firstfit').click(function () {
        if (animLock) return;
        fit = 1;
    });
    $('#bestfit').click(function () {
        if (animLock) return;
        fit = 2;
    });
    $('#worstfit').click(function () {
        if (animLock) return;
        fit = 3;
    });
    $('#uploadbtn').click(function () {
        uploadedmems = [];
        fileobj = $('#inputGroupFile01').prop('files')[0];

        fr = new FileReader();
        fr.readAsText(fileobj);
        var count = 0;
        var memcount = 0;
        fr.onload = function () {
            lines = fr.result.split('\r\n');
            lines.forEach(function (line) {
                //console.log(line + ' ' + line.length);
                if (count == 0) {
                    memcount = parseInt(line);
                }
                nums = line.split(' ');
                if (count <= memcount && count > 0) {
                    ms.push([parseInt(nums[1]) - parseInt(nums[0]), false]);
                    startend.push([nums[0], nums[1]]);
                }

                if (count >= memcount + 2)
                    ps.push(parseInt(nums[1]));
                count++;
            }, this);

            displayProcsnMems();
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
        //console.log(text);
    });
});

uploadedmems = [];
startend = [];


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
    //console.log(proc + ' ' + mem);
    if (occupied[loc] != true) {
        if (mem >= proc) {
            return mem;
        } else return 0;
    } else return 0;
}

function getBestFit(proc) {
    var bestmem = 0;

    for (index = 0; index < ms.length; index++) {
        var val = ms[index];

        mem = val[0];
        occ = val[1];

        console.log('mem: ' + mem + 'occ: ' + occ);

        if (mem >= proc && occ == false) {
            if (bestmem != 0) {
                if (mem < memCheck(proc, ms[bestmem - 1][0], 0)) {
                    bestmem = index + 1;
                }
            } else {
                bestmem = index + 1;
            }
        }

        console.log('Curr bestmem: ' + bestmem);
    }

    return bestmem;
}

function getWorstFit(proc) {
    var worstmem = 0;
    for (index = 0; index < ms.length; index++) {
        var val = ms[index];

        mem = val[0];
        occ = val[1];

        console.log('mem: ' + mem + 'occ: ' + occ);

        if (mem >= proc && occ == false) {
            if (worstmem != 0) {
                if (mem > memCheckW(proc, ms[worstmem - 1][0], 0)) {
                    worstmem = index + 1;
                }
            } else {
                worstmem = index + 1;
            }
        }

        console.log('Curr worstmem: ' + worstmem);
    }

    return worstmem;
}



function animate(type) {
    //console.log("Step: " + currStep);
    if (paused) return;
    if (currStep > (ps.length - 1)) return;
    if (type == 0) {
        run = 1;
        if (fit == 1) {
            var exec = 0;
            for (index = 0; index < ms.length; index++) {
                val = ms[index];
                console.log('this is val: ' + val);
                console.log('this is index: ' + index);
                console.log('this is ms: ' + ms.length);
                if (val[0] >= ps[currStep] && val[1] == false) {
                    moveProcToMem(('p' + (currStep + 1)), ('m' + (index + 1)), parseInt(val[0]) - parseInt(ps[currStep]));
                    ms[index][1] = true;
                    exec = 1;
                    break;
                }

            }
            if (exec == 0) {
                animList.push({ proc: $('#p' + (currStep + 1)), mem: 'dot', top: $('#p' + (currStep + 1)).position().top });
                displayDot('p' + (currStep + 1));
                run = 0;
            }
        }
        if (fit == 2) {
            //console.log(ps.sort().reverse());
            psrev = ps.slice();
            psrev.sort().reverse();
            var bestmem = getBestFit(psrev[currStep]);
            //console.log("index: " + ps.indexOf());
            exec = 0;
            if (bestmem != 0) {
                moveProcToMem(('p' + (ps.indexOf(psrev[currStep]) + 1)), ('m' + (bestmem)), parseInt(ms[bestmem - 1][0]) - parseInt(psrev[currStep]));
                ms[bestmem - 1][1] = true;
                exec = 1;
            }

            if (exec == 0) {
                animList.push({ proc: $('#p' + (currStep + 1)), mem: 'dot', top: $('#p' + (currStep + 1)).position().top });
                displayDot('p' + (currStep + 1));
                run = 0;
            }

        }
        if (fit == 3) {
            psrev = ps.slice();
            psrev.sort();
            var worstmem = getWorstFit(psrev[currStep]);
            //console.log("index: " + ps.indexOf());
            exec = 0;
            if (worstmem != 0) {
                moveProcToMem(('p' + (ps.indexOf(psrev[currStep]) + 1)), ('m' + (worstmem)), parseInt(ms[worstmem - 1][0]) - parseInt(psrev[currStep]));
                ms[worstmem - 1][1] = true;
                exec = 1;
            }

            if (exec == 0) {
                animList.push({ proc: $('#p' + (currStep + 1)), mem: 'dot', top: $('#p' + (currStep + 1)).position().top });
                displayDot('p' + (currStep + 1));
                run = 0;
            }
        }
        //sleep(1000);

        currStep++;
        if (run < 1) {
            animate(0);
        }
        //}
    }
}

function moveProcToMem(proc, mem, rem, chck) {
    //console.log("proc: " + proc + " mem: " + mem + " rem: " + rem);
    animLock = true;
    $('#' + proc).css({ backgroundColor: getRandomColor() });
    var clonedProc = $('#' + proc).clone();
    $('#animarea').append(clonedProc);
    var procs = 0;
    animList.forEach(function (val, index, arr) {
        if (val.mem == mem) procs++;
    }, this);
    animList.push({ org: $('#' + proc), proc: clonedProc, mem: mem, top: clonedProc.position().top });
    clonedProc.animate({ left: memtblpos.left + $('#' + mem).position().left + 80, top: memtblpos.top + $('#' + mem).position().top + (procs * 50) }, animSpeed, function () {
        animLock = false;
        $('#' + mem + 'slot').text('' + rem);
        if (currStep > (ps.length - 1)) return;
        animate(0);
    });
    if (rem > 0) {
        //$('#' + mem).animate({ height: $('#' + mem).height() + 50 });
    }
}

function displayDot(proc) {
    //console.log("displayig dot: " + proc);
    $('#' + proc + 'hide').show();
}

function hideDot(proc) {
    //console.log("hiding dot: " + proc);
    $('#' + proc + 'hide').hide();
}

function Undo(anim, rem) {
    //console.log(anim);
    animLock = true;
    if (currStep > 0)
        currStep--;
    //console.log('proc mem: ' + anim.mem);
    //console.log(parseInt(anim.mem.slice(1)));
    if (anim.mem != 'dot')
        ms[parseInt(anim.mem.slice(1)) - 1][1] = false;
    //console.log("undoing: " + anim.top + " " + anim.proc);
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