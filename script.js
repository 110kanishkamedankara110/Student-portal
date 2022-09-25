var showmenu = false;

function showMenu() {

    var menu = document.getElementById("menu");
    var menubut = document.getElementById("menu-but");

    if (showmenu) {

        menu.style = "width:0;height:0";
        menubut.style = "transform: rotate(0deg);";
        showmenu = false;
        document.getElementById("men").style.marginLeft = "100px";
        menu.style.padding = "0";


    } else {

        menu.style = "width:300px;height:fit-content";
        menubut.style = "transform: rotate(180deg);";
        showmenu = true;
        document.getElementById("men").style.marginLeft = "0";
        menu.style.padding = "10px";

    }
}



function show(x) {
    if (x == "student") {

        document.getElementById("teacher").style.display = "none";
        document.getElementById("admin").style.display = "none";
        document.getElementById("academic").style.display = "none";



    } else if (x == "teacher") {

        document.getElementById("student").style.display = "none";
        document.getElementById("admin").style.display = "none";
        document.getElementById("academic").style.display = "none";

    } else if (x == "admin") {

        document.getElementById("teacher").style.display = "none";
        document.getElementById("student").style.display = "none";
        document.getElementById("academic").style.display = "none";

    } else if (x == "academic") {

        document.getElementById("teacher").style.display = "none";
        document.getElementById("admin").style.display = "none";
        document.getElementById("student").style.display = "none";

    }
    document.getElementById(x).style.display = "block";
}

function admin_login() {
    var email = document.getElementById("admin_email").value;
    var password = document.getElementById("admin_password").value;
    // alert(email);
    // alert(password);

    var f = new FormData();
    f.append("email", email);
    f.append("password", password);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text != "") {

                if (text == "Sucess") {
                    window.location = "admin_page.php";
                } else {
                    document.getElementById("admin-error").innerHTML = text;
                }
            }
        }
    };
    r.open("POST", "admin_login.php", true);
    r.send(f);
}

function teacher_login() {
    var email = document.getElementById("teacher_email").value;
    var password = document.getElementById("teacher_password").value;
    // alert(email);
    // alert(password);

    var f = new FormData();
    f.append("email", email);
    f.append("password", password);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text != "") {

                if (text == "Sucess") {
                    window.location = "teacher_page.php";
                } else if (text == "notvf") {
                    document.getElementById("teacher_vf").style.display = "grid";
                    document.getElementById("vf_b").setAttribute("onclick", "vf_teacher('" + email + "');");
                } else {
                    document.getElementById("teacher-error").innerHTML = text;

                }
            }
        }
    };
    r.open("POST", "teacher_login.php", true);
    r.send(f);
}

function student_login() {
    var email = document.getElementById("student_email").value;
    var password = document.getElementById("student_password").value;
    // alert(email);
    // alert(password);

    var f = new FormData();
    f.append("email", email);
    f.append("password", password);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text != "") {

                if (text == "Sucess") {
                    window.location = "student_page.php";
                } else if (text == "notvf") {
                    document.getElementById("student_vf").style.display = "grid";
                    document.getElementById("vf_st").setAttribute("onclick", "vf_student('" + email + "');");
                } else if (text == "exp") {
                    document.getElementById("student-error").innerHTML = "Your Trial Period Has Expired";
                } else {
                    document.getElementById("student-error").innerHTML = text;

                }
            }
        }
    };
    r.open("POST", "student_login.php", true);
    r.send(f);
}

function acadamic_login() {
    var email = document.getElementById("acadamic_email").value;
    var password = document.getElementById("acadamic_password").value;
    // alert(email);
    // alert(password);

    var f = new FormData();
    f.append("email", email);
    f.append("password", password);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text != "") {

                if (text == "Sucess") {
                    window.location = "acadamic_page.php";
                } else if (text == "notvf") {
                    document.getElementById("acadamic_vf").style.display = "grid";
                    document.getElementById("vf_b_ac").setAttribute("onclick", "vf_acadamic('" + email + "');");
                } else {
                    document.getElementById("acadamic-error").innerHTML = text;

                }
            }
        }
    };
    r.open("POST", "acadamic_login.php", true);
    r.send(f);
}


function vf_teacher(x) {
    var coade = document.getElementById("vf_coade").value;
    var f = new FormData();
    f.append("email", x);
    f.append("coade", coade);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "sucess") {
                window.location = "teacher_page.php";
            } else {
                document.getElementById("tm").innerHTML = text;
            }
        }
    };
    r.open("POST", "teacher_veryfy.php", true);
    r.send(f);
}

function vf_student(x) {
    var coade = document.getElementById("vf_coade_st").value;
    var f = new FormData();
    f.append("email", x);
    f.append("coade", coade);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "sucess") {
                window.location = "student_page.php";
            } else {
                document.getElementById("ste").innerHTML = text;
            }
        }
    };
    r.open("POST", "student_veryfy.php", true);
    r.send(f);
}

function vf_acadamic(x) {
    var coade = document.getElementById("vf_coade_ac").value;
    var f = new FormData();
    f.append("email", x);
    f.append("coade", coade);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "sucess") {
                window.location = "acadamic_page.php";
            } else {
                document.getElementById("ae").innerHTML = text;
            }
        }
    };
    r.open("POST", "acadamic_veryfy.php", true);
    r.send(f);
}

function up_stu_gra(x) {
    document.getElementById("student_g_up").style.display = "grid";
    var gr = document.getElementById("gr").value;
    var f3 = new FormData();
    f3.append("grade", gr);



    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            document.getElementById("sg").innerHTML = r.responseText;

        }
    };
    r.open("POST", "set_grade.php", true);
    r.send(f3);

}

function up_stu_fee(x) {
    var fee = document.getElementById("fee").value;
    var id = x;
    var f = new FormData();
    f.append("id", id);
    f.append("fee", fee);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            window.location = "student_info.php?id=" + x;
            // alert(text);
        }
    };
    r.open("POST", "updatefee.php", true);
    r.send(f);

}

function addte() {
    var name = document.getElementById("tname").value;
    var email = document.getElementById("temail").value;
    var password = document.getElementById("tpw").value;
    var subject = document.getElementById("tsub").value;
    var grade = document.getElementById("tgr").value;

    var f = new FormData();
    f.append("name", name);
    f.append("email", email);
    f.append("password", password);
    f.append("subject", subject);
    f.append("grade", grade);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Enter_name" || text == "Enter Email" || text == "Invalid Email" || text == "Enter Password") {
                document.getElementById('tm').innerHTML = text;
            } else {


                em(text, email, password);

                document.getElementById('tm').innerHTML = "";
                document.getElementById("tname").value = "";
                document.getElementById("temail").value = "";
                document.getElementById("tpw").value = "";
                document.getElementById("tsub").value = "";
                document.getElementById("tgr").value = "";
                window.location = "manage_teachers.php";
            }
        }
    };
    r.open("POST", "addteacher.php", true);
    r.send(f);

}

function addac() {
    var name = document.getElementById("aname").value;
    var email = document.getElementById("aemail").value;
    var password = document.getElementById("apw").value;


    var f = new FormData();
    f.append("name", name);
    f.append("email", email);
    f.append("password", password);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Enter_name" || text == "Enter Email" || text == "Invalid Email" || text == "Enter Password") {
                document.getElementById('ae').innerHTML = text;
            } else {


                em(text, email, password);

                document.getElementById('ae').innerHTML = "";
                document.getElementById("aname").value = "";
                document.getElementById("aemail").value = "";
                document.getElementById("apw").value = "";

                window.location = "manage_acadamics.php";
            }
        }
    };
    r.open("POST", "addacadamic.php", true);
    r.send(f);

}

function em(x, y, z) {


    var f2 = new FormData();
    f2.append("c", x);
    f2.append("em", y);
    f2.append("p", z);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            alert(r.responseText);

        }
    };
    r.open("POST", "email.php", true);
    r.send(f2);




}

function set_grade() {
    var x = document.getElementById('g').value
    var f3 = new FormData();
    f3.append("grade", x);



    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            document.getElementById("su").innerHTML = r.responseText;

        }
    };
    r.open("POST", "set_grade.php", true);
    r.send(f3);
}

function check(x) {

    var val = document.getElementById("ch_" + x);
    if (val.checked) {
        document.getElementById("sel_" + x).disabled = false;



        // var f3 = new FormData();
        // f3.append("sub", x);



        // var r = new XMLHttpRequest();
        // r.onreadystatechange = function() {
        //     if (r.readyState == 4) {
        //         alert(r.responseText);
        //     }
        // };
        // r.open("POST", "set_subject.php", true);
        // r.send(f3);


    } else {
        document.getElementById("sel_" + x).disabled = true;

    }
}

function addstu() {


    if (document.getElementById("g").value != "") {
        document.getElementById("stue").innerHTML = "";
        var r = new XMLHttpRequest();
        r.onreadystatechange = function() {
            if (r.readyState == 4) {
                var text = r.responseText;
                var sub = JSON.parse(text);

                var s = new Array();

                var j = 0;
                for (var i = 0; i < sub.length; i++) {
                    if (document.getElementById("ch_" + sub[i]).checked) {
                        var d = new Array();
                        d[0] = sub[i];
                        d[1] = document.getElementById("sel_" + sub[i]).value;
                        s[j] = "[" + d + "]";
                        j = j + 1;
                    }



                }


                var f3 = new FormData();

                f3.append("sub", "[" + s + "]");
                f3.append("name", document.getElementById("sname").value);
                f3.append("email", document.getElementById("semail").value);
                f3.append("password", document.getElementById("spw").value);
                f3.append("grade", document.getElementById("g").value);


                var r2 = new XMLHttpRequest();
                r2.onreadystatechange = function() {
                    if (r2.readyState == 4) {
                        if (r2.responseText == "Select a Subject" || r2.responseText == "Enter Name" || r2.responseText == "Enter Email" || r2.responseText == "Invalid Email" || r2.responseText == "Enter Password" || r2.responseText == "Select Grade") {
                            document.getElementById("stue").innerHTML = r2.responseText;
                        } else {
                            em(r2.responseText, document.getElementById("semail").value, document.getElementById("spw").value);

                            document.getElementById('stue').innerHTML = "";
                            document.getElementById("sname").value = "";
                            document.getElementById("semail").value = "";
                            document.getElementById("spw").value = "";
                            document.getElementById("g").value = "";

                            window.location = "manage_students.php";
                            // alert(r2.responseText);
                        }

                    }
                };
                r2.open("POST", "addstudent.php", true);
                r2.send(f3);


            }
        };
        r.open("POST", "add_subjects.php", true);
        r.send();
    } else {
        document.getElementById("stue").innerHTML = "Select The Grade";
    }

}

function uppstu() {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {



        if (r.readyState == 4) {

            var text = r.responseText;
            var sub = JSON.parse(text);

            var s = new Array();

            var j = 0;
            for (var i = 0; i < sub.length; i++) {
                if (document.getElementById("ch_" + sub[i]).checked) {
                    var d = new Array();
                    d[0] = sub[i];
                    d[1] = document.getElementById("sel_" + sub[i]).value;
                    s[j] = "[" + d + "]";
                    j = j + 1;
                }



            }


            var f3 = new FormData();

            f3.append("sub", "[" + s + "]");

            f3.append("id", document.getElementById("ssid").innerHTML);

            f3.append("grade", document.getElementById("gr").value);


            var r2 = new XMLHttpRequest();
            r2.onreadystatechange = function() {
                if (r2.readyState == 4) {
                    if (r2.responseText == "Select a Subject") {
                        document.getElementById("sue").innerHTML = r2.responseText;
                    } else {


                        document.getElementById('sue').innerHTML = "";


                        window.location = "manage_students.php";
                        // alert(r2.responseText);
                    }

                }
            };
            r2.open("POST", "updstudent.php", true);
            r2.send(f3);

        }
    };
    r.open("POST", "up_sub.php", true);
    r.send();


}

function upnotes() {
    var title = document.getElementById("tit").value;
    var file = document.getElementById("file");

    var f = new FormData();
    f.append("title", title);
    f.append("fi", file.files[0]);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Insert Title" || text == "Choose File") {
                document.getElementById("ue").innerHTML = text;
            } else {
                window.location = "teacher_page.php"
            }
        }
    };
    r.open("POST", "uploade_notes.php", true);
    r.send(f);

}

function upass() {
    var title = document.getElementById("ass_tit").value;
    var file = document.getElementById("ass_file");
    var dead = document.getElementById("ass_dead").value;


    // alert(title);
    // alert(dead);
    // alert(file.files[0]);
    var f = new FormData();
    f.append("title", title);
    f.append("fi", file.files[0]);
    f.append("d", dead);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Insert Title" || text == "Choose File" || text == "Choose Date") {
                document.getElementById("ae").innerHTML = text;

            } else {
                // alert(text);
                window.location = "assignments.php"

            }
        }
    };
    r.open("POST", "uploade_assignment.php", true);
    r.send(f);


}

function till() {
    setInterval(tilldate, 1000);

}

function tilldate() {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            document.getElementById("till_date").innerHTML = text;
        }
    };
    r.open("POST", "tildate.php", true);
    r.send();
}

function select_sub(x) {
    alert(x);
}

function up_ass_stu(x, y) {

    var file = document.getElementById("ass_file");
    var ass_id = x;
    var stu_sub_id = y;

    // alert(x);
    // alert(y);
    // alert(file.files[0]);
    var f = new FormData();
    f.append("ass_id", ass_id);
    f.append("fi", file.files[0]);
    f.append("stu_sub-id", stu_sub_id);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "Choose File") {
                document.getElementById("se").innerHTML = text;

            } else {
                // alert(text);
                window.location = "student_page.php"

            }
        }
    };
    r.open("POST", "uas.php", true);
    r.send(f);


}

function up_marks(x) {
    var m = document.getElementById("m" + x).value;
    var amid = x;

    var f = new FormData();
    f.append("ass_id", amid);
    f.append("marks", m);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text != '') {
                alert(text);
            } else {
                window.location = "assignments.php";
            }
        }
    };
    r.open("POST", "up_am.php", true);
    r.send(f);
}

function upd(x) {

    var amid = x;

    var f = new FormData();
    f.append("ass_id", amid);



    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            window.location = "aca_ass.php"

        }
    };
    r.open("POST", "active_as.php", true);
    r.send(f);
}