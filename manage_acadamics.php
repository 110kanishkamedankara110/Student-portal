<?php
session_start();
require "database.php";

$no_of_aca = (Dbms::s("SELECT * FROM `acadamic` WHERE `acadamic_status`='Veryfied' "))->num_rows;





$no_of_aca_al = (Dbms::s("SELECT * FROM `acadamic` "))->num_rows;


if ($no_of_aca_al != 0) {

    $nvap = round((($no_of_aca_al - $no_of_aca) / $no_of_aca_al) * 100,2);
} else {

    $nvap = 0;
}


if (isset($_SESSION["admin"])) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Admin | <?php echo $_SESSION['admin']["admin_name"] ?></title>
        <link rel="stylesheet" href="style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body style="box-sizing: border-box; background-repeat: no-repeat; background-size: cover;background-attachment: fixed;background-image: url('images/school.jpg');">

        <?php
        require "popup.php";
        ?>

        <div class="more-but" id="menu-but" onclick="showMenu();">

        </div>
        <div class="more-but" style="left: 5px;background-image: url('images/arrow.svg');" id="back-but" onclick="window.location='admin_page.php'">

        </div>
        <div class="more" id="menu">
            <div style="margin-left: 100px;text-align: center;" id="men">
                <h1>Menu</h1>
                <p style="text-align:start;">Admin : <?php echo $_SESSION["admin"]["admin_name"] ?></p>

                <button class="b" style="background-color: rgba(5, 147, 255, 0.759);color: white;" onclick="document.getElementById('popup').style.display='grid'">Edit Profile</button>

                <button class="b" style="background-color: tomato;color:white" onclick="window.location='admin_logout.php'">Logout</button>

            </div>
        </div>





        <div class="admin-page">
            <div class="manage" style="height:100%;margin-top: 0;">
                <div class="mn-i" style="background-image: url('images/academic.svg');">

                </div>
                <div class="mn-d">
                    <h1>Acadamic</h1>
                    <hr />
                    <h4>Veryfied Acadamics : <?php echo $no_of_aca ?></h4>
                    <h4>All Acadamics : <?php echo $no_of_aca_al ?></h4>
                    <hr />
                    <h4>Not Veryfied <?php echo $nvap . "%" ?></h4>
                    <div class="pi" style="margin-bottom:20px; background-image: conic-gradient( rgba(5, 147, 255, 0.759) 0 <?php echo $nvap . "%" ?>,rgba(255, 255, 255, 0.846) <?php echo $nvap . "%" ?>);">

                    </div>
                    <button class="b" onclick="document.getElementById('acadamic_reg').style.display='grid'">Register Acadamics</button>
                </div>
            </div>
            <?php
            $q = "SELECT * FROM `acadamic`;";

            $res = Dbms::s($q);
            $n = $res->num_rows;

            ?>
            <div class="content" style="display: block;box-sizing: border-box;">

                <div class="stc">
                    <?php
                    for ($i = 0; $i < $n; $i++) {
                        $r = $res->fetch_assoc();

                    ?>


                        <div class="stu">
                            <?php
                            if ($r["acadamic_status"] == "Veryfied") {
                            ?>
                                <div class="vf-stat"></div>
                            <?php
                            } else {

                            ?>
                                <div class="nvf-stat"></div>
                            <?php
                            }
                            ?>

                            <h1 style="text-align: center;"><?php echo $r["acadamic_name"] ?></h1>
                            
                            <h3 style="margin: 5px;text-align: center;">Email : <?php echo $r["acadamic_email"] ?></h3>

                            <h3 style="margin: 5px;text-align: center;">Status : <?php echo $r["acadamic_status"] ?></h3>
                          

                            <!-- <button class="b" style="width: 100%;margin-top: 10px;margin-bottom: 10px;" onclick="window.location='student_info.php?id=<?php echo $r['teacher_id']; ?>'">Details</button> -->
                        </div>


                    <?php
                    }
                    ?>
                </div>

            </div>
        </div>
        </div>























        <script src="script.js"></script>
    </body>

    </html>
<?php
} else {
?>
    <script>
        window.location = "index.php";
    </script>
<?php
}
?>