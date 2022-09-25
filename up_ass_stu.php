<div class="popup-body" id="ass_up_stu">
    <div class="admin-edit-pop">
        <div class="dd">
            <div class="cd">
                <div class="close" onclick="document.getElementById('ass_up_stu').style.display='none';">

                </div>
            </div></br>
            <div class="pop-det" style="text-align: center;">
                <h2 style="text-align: center;">Upload Assignments</h2>


                <input type="file" id="ass_file" style="display: none;" /><br /><br />
                <label for="ass_file" style="margin-top: 10px;background-color:blue;color: white;padding: 10px;box-sizing: border-box;border-radius: 10px">Choose File</label>




                <p id="se" style="background-color: tomato;color:white;text-align: center;"></p>

                <button class="b" style="width: 100%;margin-top: 10px;margin-bottom: 10px;background-color:teal;color:white; " onclick="up_ass_stu('<?php echo $rsub['assignment_id']?>','<?php echo $asm ?>');">Upload</button>


            </div>
        </div>
    </div>
</div>

