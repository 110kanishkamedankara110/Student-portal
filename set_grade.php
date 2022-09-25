<?php
$gr = $_POST["grade"];

require "database.php";


$su = "SELECT * FROM  `subject`;";
session_start();
$sures = Dbms::s($su);
$sun = $sures->num_rows;


?>
<table style="width: 100%;text-align: center;margin-top: 10px;">
    <tr>
        <th>
            Subject
        </th>
        <th>
            Teacher
        </th>
    </tr>
    <?php
    $sub = array();
    for ($i = 0; $i < $sun; $i++) {
        $sur = $sures->fetch_assoc();

        $sub[] = $sur["subject_id"];



    ?>
        <tr>
            <td><input id="ch_<?php echo $sur['subject_id'] ?>" onclick="check('<?php echo $sur['subject_id'] ?>');" style="font-size: 40px;" type="checkbox" value="<?php echo $sur["subject_id"] ?>" /><?php echo $sur["subject"] ?></td>
            <?php
            $tea = "SELECT * FROM `teacher` WHERE `subject_id`='" . $sur["subject_id"] . "' AND `grade_id`='" . $gr . "' ; ";
            $tres = Dbms::s($tea);
            $tn = $tres->num_rows;

            ?>
            
            <td>
                <Select disabled class="inp" id="sel_<?php echo $sur["subject_id"] ?>" style="border: solid black 0.1px;">
                    <?php
                    for ($j = 0; $j < $tn; $j++) {
                        $tr = $tres->fetch_assoc();
                    ?>
                        <option value="<?php echo $tr["teacher_id"] ?>"><?php echo $tr["teacher_name"] ?></option>
                    <?php

                    }
                    ?>
                </Select>
            </td>
        </tr>
    <?php

    }

    $_SESSION["subjects"] = $sub;
    ?>

</table>