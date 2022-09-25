<div class="popup-body" id="popup">
    <div class="admin-edit-pop">
        <div class="dd">
            <div class="cd">
                <div class="close" onclick="document.getElementById('popup').style.display='none'">

                </div>
            </div></br>
            <div class="pop-det">
                <h2 style="text-align: center;">Admin Details Edit</h2>

                <span style="text-align: center;">Name : </span><input type="text" disabled placeholder="Name" style="border: solid black 0.1px;" class="inp" value="<?php echo $_SESSION["admin"]["admin_name"] ?>"></br>
                <span style="text-align: center;">Email : </span><input type="text" disabled placeholder="Email" style="border: solid black 0.1px;" value="<?php echo $_SESSION["admin"]["admin_email"] ?>" class="inp"></br>

                </hr>

                <span style="text-align: center;">Old Password : </span><input id="op" type="password" placeholder="Old Password" style="border: solid black 0.1px;" class="inp"></br>
                <span style="text-align: center;">New Password : </span><input id="np" type="password" placeholder="New Password" style="border: solid black 0.1px;" class="inp"></br>

                <p id="em" style="background-color: tomato;color:white;text-align: center;"></p>

                <button class="b" style="width: 100%;margin-top: 10px;margin-bottom: 10px;background-color:teal;color:white; " onclick="adedi();">Reset Password</button>


            </div>
        </div>
    </div>
</div>

<?php

$q = "SELECT * FROM `subject`;";
$res = Dbms::s($q);
$nr = $res->num_rows;
$qg = "SELECT * FROM `grade`;";
$resg = Dbms::s($qg);
$nrg = $resg->num_rows;
?>
<div class="popup-body" id="teacher_reg">
    <div class="admin-edit-pop">
        <div class="dd">
            <div class="cd">
                <div class="close" onclick="document.getElementById('teacher_reg').style.display='none'">

                </div>
            </div></br>
            <div class="pop-det">
                <h2 style="text-align: center;">Add a Teacher</h2>

                <span style="text-align: center;">Name : </span><input id="tname" type="text" placeholder="Name" style="border: solid black 0.1px;" class="inp"></br>
                <span style="text-align: center;">Email : </span><input id="temail" type="text" placeholder="Email" style="border: solid black 0.1px;" class="inp"></br>
                <span style="text-align: center;">Password : </span><input id="tpw" type="password" placeholder="password" style="border: solid black 0.1px;" class="inp"></br>
                <span style="text-align: center;">Subject : </span><select id="tsub" style="border: solid black 0.1px;" class="inp">
                    <?php
                    for ($i = 0; $i < $nr; $i++) {
                        $r = $res->fetch_assoc();

                    ?>
                        <option value="<?php echo $r["subject_id"] ?>"><?php echo $r["subject"] ?></option>
                    <?php
                    }
                    ?>
                </select></br>
                <span style="text-align: center;">Grade : </span><select id="tgr" style="border: solid black 0.1px;" class="inp">
                    <?php
                    for ($i = 0; $i < $nrg; $i++) {
                        $rg = $resg->fetch_assoc();

                    ?>
                        <option value="<?php echo $rg["grade_id"] ?>"><?php echo $rg["grade"] ?></option>
                    <?php
                    }
                    ?>
                </select>
                </hr>



                <p id="tm" style="background-color: tomato;color:white;text-align: center;"></p>

                <button class="b" style="width: 100%;margin-top: 10px;margin-bottom: 10px;background-color:teal;color:white; " onclick="addte();">ADD</button>


            </div>
        </div>
    </div>
</div>

<div class="popup-body" id="acadamic_reg">
    <div class="admin-edit-pop">
        <div class="dd">
            <div class="cd">
                <div class="close" onclick="document.getElementById('acadamic_reg').style.display='none'">

                </div>
            </div></br>
            <div class="pop-det">
                <h2 style="text-align: center;">Add a Acadamic</h2>

                <span style="text-align: center;">Name : </span><input id="aname" type="text" placeholder="Name" style="border: solid black 0.1px;" class="inp"></br>
                <span style="text-align: center;">Email : </span><input id="aemail" type="text" placeholder="Email" style="border: solid black 0.1px;" class="inp"></br>
                <span style="text-align: center;">Password : </span><input id="apw" type="password" placeholder="password" style="border: solid black 0.1px;" class="inp"></br>

                </hr>



                <p id="ae" style="background-color: tomato;color:white;text-align: center;"></p>

                <button class="b" style="width: 100%;margin-top: 10px;margin-bottom: 10px;background-color:teal;color:white; " onclick="addac();">ADD</button>


            </div>
        </div>
    </div>
</div>



<div class="popup-body" id="student_reg" >
    <div class="admin-edit-pop">
        <div class="dd">
            <div class="cd">
                <div class="close" onclick="document.getElementById('student_reg').style.display='none';<?php $_COOKIE['subject']=''?>">

                </div>
            </div></br>
            <div class="pop-det">
                <h2 style="text-align: center;">Add a Student</h2>

                <span style="text-align: center;">Name : </span><input id="sname" type="text" placeholder="Name" style="border: solid black 0.1px;" class="inp"></br>
                <span style="text-align: center;">Email : </span><input id="semail" type="text" placeholder="Email" style="border: solid black 0.1px;" class="inp"></br>
                <span style="text-align: center;">Password : </span><input id="spw" type="password" placeholder="password" style="border: solid black 0.1px;" class="inp"></br>
                <span style="text-align: center;">Grade : </span><select onchange="set_grade();" id="g" class="inp" style="border: solid black 0.1px;">
                    <option></option>
                    <?php
                    $sg = "SELECT * FROM `grade`";



                    $snres = Dbms::s($sg);

                    $sn = $snres->num_rows;
                    for ($i = 0; $i < $sn; $i++) {
                        $sr = $snres->fetch_assoc();
                    ?>
                        <option value="<?php echo $sr['grade_id'] ?>"><?php echo $sr['grade'] ?></option>
                    <?php

                    }


                    ?>
                </select>

                <div id="su">

                </div>



                <p id="stue" style="background-color: tomato;color:white;text-align: center;"></p>

                <button class="b" style="width: 100%;margin-top: 10px;margin-bottom: 10px;background-color:teal;color:white; " onclick="addstu();">ADD</button>


            </div>
        </div>
    </div>
</div>

<div class="popup-body" id="student_g_up" >
    <div class="admin-edit-pop">
        <div class="dd">
            <div class="cd">
                <div class="close" onclick="document.getElementById('student_g_up').style.display='none';<?php $_COOKIE['subject']=''?>">

                </div>
            </div></br>
            <div class="pop-det">
                <h2 style="text-align: center;">Select Subjects</h2>

                
                
                <div id="sg">

                </div>
             

                <h1 style="display: none;" id="ssid"><?php echo $_GET["id"]?></h1>

                <p id="sue" style="background-color: tomato;color:white;text-align: center;"></p>

                <button class="b" style="width: 100%;margin-top: 10px;margin-bottom: 10px;background-color:teal;color:white; " onclick="uppstu();">Update Grade</button>


            </div>
        </div>
    </div>
</div>





<script>
    function adedi() {

        if (document.getElementById('op').value == '' && document.getElementById('np').value == '') {
            document.getElementById('popup').style.display = 'none';
        } else if ((document.getElementById('op').value == '' && document.getElementById('np').value != '') || (document.getElementById('op').value != '' && document.getElementById('np').value == '')) {
            document.getElementById('em').innerHTML = 'Plese enter Your New Password And Old Password';

        } else {
            if (<?php echo (isset($_SESSION["admin"])) ?>) {
                if (document.getElementById('op').value != "<?php echo $_SESSION["admin"]["admin_password"] ?>") {
                    document.getElementById('em').innerHTML = 'Your Old Password Is not Correct';
                } else {
                    window.location = "admin_pw_change.php?pw=" + document.getElementById('np').value;
                }
            }
        }
    }

   
</script>