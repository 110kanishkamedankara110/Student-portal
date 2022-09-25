<div class="popup-body" id="ass_up" >
    <div class="admin-edit-pop">
        <div class="dd">
            <div class="cd">
                <div class="close" onclick="document.getElementById('ass_up').style.display='none';">

                </div>
            </div></br>
            <div class="pop-det" style="text-align: center;">
                <h2 style="text-align: center;">Upload Assignments</h2>

               <span>Title : </span> <input id="ass_tit" type="text" placeholder="Assignment Title" style="border: solid black 0.1px;" class="inp"  /></br>
               <span>Deadline : </span> <input id="ass_dead" type="date"  style="border: solid black 0.1px;" class="inp"  />
                <input type="file" id="ass_file" style="display: none;"/><br/><br/>
                <label for="ass_file" style="margin-top: 10px;background-color:blue;color: white;padding: 10px;box-sizing: border-box;border-radius: 10px">Choose File</label>
                
             


                <p id="ae" style="background-color: tomato;color:white;text-align: center;"></p>

                <button class="b" style="width: 100%;margin-top: 10px;margin-bottom: 10px;background-color:teal;color:white; " onclick="upass();">Upload</button>


            </div>
        </div>
    </div>
</div>