<div class="popup-body" id="edit_pro">
    <div class="admin-edit-pop">
        <div class="dd">
            <div class="cd">
                <div class="close" onclick="document.getElementById('edit_pro').style.display='none'">

                </div>
            </div></br>
            <div class="pop-det">
                <h2 style="text-align: center;">Acadamic Details Edit</h2>

                <span style="text-align: center;">Name : </span><input type="text" disabled placeholder="Name" style="border: solid black 0.1px;" class="inp" value="<?php echo $_SESSION["acadamic"]["acadamic_name"] ?>"></br>
                <span style="text-align: center;">Email : </span><input type="text" disabled placeholder="Email" style="border: solid black 0.1px;" value="<?php echo $_SESSION["acadamic"]["acadamic_email"] ?>" class="inp"></br>

                </hr>

                <span style="text-align: center;">Old Password : </span><input id="acada_op" type="password" placeholder="Old Password" style="border: solid black 0.1px;" class="inp"></br>
                <span style="text-align: center;">New Password : </span><input id="acada_np" type="password" placeholder="New Password" style="border: solid black 0.1px;" class="inp"></br>

                <p id="acada_em" style="background-color: tomato;color:white;text-align: center;"></p>

                <button class="b" style="width: 100%;margin-top: 10px;margin-bottom: 10px;background-color:teal;color:white; " onclick="acaedi();">Reset Password</button>


            </div>
        </div>
    </div>
</div>

<script>
    function acaedi() {

        if (document.getElementById('acada_op').value == '' && document.getElementById('acada_np').value == '') {
            document.getElementById('edit_pro').style.display = 'none';
        } else if ((document.getElementById('acada_op').value == '' && document.getElementById('acada_np').value != '') || (document.getElementById('acada_op').value != '' && document.getElementById('acada_np').value == '')) {
            document.getElementById('acada_em').innerHTML = 'Plese enter Your New Password And Old Password';

        } else {
            if (<?php echo(isset($_SESSION["acadamic"]))?>) {
                if (document.getElementById('acada_op').value != "<?php echo $_SESSION["acadamic"]["acadamic_password"] ?>") {
                    document.getElementById('acada_em').innerHTML = 'Your Old Password Is not Correct';
                } else {
                    window.location = "acadamic_pw_change.php?pw=" + document.getElementById('acada_np').value;
                }
            }
        }
    }
</script>