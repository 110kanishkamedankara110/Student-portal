<div class="popup-body" id="edit_st">
    <div class="admin-edit-pop">
        <div class="dd">
            <div class="cd">
                <div class="close" onclick="document.getElementById('edit_st').style.display='none'">

                </div>
            </div></br>
            <div class="pop-det">
                <h2 style="text-align: center;">Student Details Edit</h2>

                <span style="text-align: center;">Name : </span><input type="text" disabled placeholder="Name" style="border: solid black 0.1px;" class="inp" value="<?php echo $_SESSION["student"]["student_name"] ?>"></br>
                <span style="text-align: center;">Email : </span><input type="text" disabled placeholder="Email" style="border: solid black 0.1px;" value="<?php echo $_SESSION["student"]["student_email"] ?>" class="inp"></br>

                </hr>

                <span style="text-align: center;">Old Password : </span><input id="st_op" type="password" placeholder="Old Password" style="border: solid black 0.1px;" class="inp"></br>
                <span style="text-align: center;">New Password : </span><input id="st_np" type="password" placeholder="New Password" style="border: solid black 0.1px;" class="inp"></br>

                <p id="st_em" style="background-color: tomato;color:white;text-align: center;"></p>

                <button class="b" style="width: 100%;margin-top: 10px;margin-bottom: 10px;background-color:teal;color:white; " onclick="st_edi();">Reset Password</button>


            </div>
        </div>
    </div>
</div>

<script>
    function st_edi() {
    
        if (document.getElementById('st_op').value == '' && document.getElementById('st_np').value == '') {
            document.getElementById('edit_st').style.display = 'none';
        } else if ((document.getElementById('st_op').value == '' && document.getElementById('st_np').value != '') || (document.getElementById('st_op').value != '' && document.getElementById('st_np').value == '')) {
            document.getElementById('st_em').innerHTML = 'Plese enter Your New Password And Old Password';

        } else {
            if (<?php echo(isset($_SESSION["student"]))?>) {
                if (document.getElementById('st_op').value != "<?php echo $_SESSION["student"]["student_password"] ?>") {
                    document.getElementById('st_em').innerHTML = 'Your Old Password Is not Correct';
                } else {
                    window.location = "student_pw_change.php?pw=" + document.getElementById('st_np').value;
                }
            }
        }
    }
</script>