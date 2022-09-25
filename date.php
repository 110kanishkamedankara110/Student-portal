<?php







class Date
{
    private static $tz;
    private static $t;


    public static function getdate()
    {
        Date::$t = new DateTime();
        Date::$tz = new DateTimeZone("Asia/Colombo");
        Date::$t->setTimezone(Date::$tz);
        $date_time = Date::$t->format("Y-m-d H:i:s");
        return $date_time;
    }
    public static function onlydate()
    {
        Date::$t = new DateTime();
        Date::$tz = new DateTimeZone("Asia/Colombo");
        Date::$t->setTimezone(Date::$tz);
        $date_time = Date::$t->format("Y-m-d");
        return $date_time;
    }

    public static function getExpDate()
    {
        Date::getdate();
        if (Date::$t->format("m") == 12) {
            $month = 1;
            $year = Date::$t->format("Y") + 1;
        } else {
            $month = Date::$t->format("m") + 1;
            $year = Date::$t->format("Y");
        }
        $date = Date::$t->format("d");
        $time = Date::$t->format("H:i:s");
        $e = "$year-$month-$date $time";
        $d = strtotime($e);
        return date("Y-m-d H:i:s", $d);
    }

    public static function getpassDate()
    {
        Date::getdate();


        $month = Date::$t->format("m");
        $year = Date::$t->format("Y") + 1;

        $date = Date::$t->format("d");
        $time = Date::$t->format("H:i:s");
        $e = "$year-$month-$date $time";
        $d = strtotime($e);
        return date("Y-m-d H:i:s", $d);
    }
}
