<?php
require_once dirname(dirname(dirname(__DIR__))) . '/config.php';
$host = $sql_db_host;
$user = $sql_db_user;
$pass = $sql_db_pass;
$dbname = $sql_db_name;

class xloop
{
    function xcon()
    {

        global $host;
        global $user;
        global $pass;
        global $dbname;
        $con = mysqli_connect($host, $user, $pass, $dbname, 3306) or die("Error in connection!");
        return $con;
    }

    function getUserData($uid)
    {
        $qu = "
			SELECT c.user_id,c.username,concat(c.first_name,' ',c.last_name) as 'full_name',c.gender,c.birthday,b.height, b.weight, 
			(ifnull(DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(),c.birthday)), '%Y'),0)*1) as 'age'
			FROM `ffc_user_fitness_profile` as b
			join 
			`Wo_Users` as c 
			on 
			b.user_id = c.user_id 
			where b.user_id = $uid;
			";
        //$q = mysqli_query($this->xcon(), $qu) or die("Error in query! getUserData");

        $q = mysqli_query($this->xcon(), $qu);
        if (!$q) {
            throw new Exception("Fitness Profile not Completed.");
        }
        return $q;
    }

    function getUserDataDI($key)
    {
        $query = "SELECT c.birthday, CONCAT(c.first_name, ' ', c.last_name) AS full_name, c.birthday, c.gender, CONCAT(FLOOR(d.height/100), 'm ', d.height % 100, 'cm') as height,d.height/100 as decimal_height, d.weight ,ifnull(l.target_weight - d.weight,0) as dtw, ifnull(l.target_weight,0) as target_weight, ifnull(l.calories,0) as calories
		FROM Wo_Users AS c
		JOIN ffc_user_fitness_profile AS d ON c.user_id = d.user_id
		left outer JOIN di_log AS l ON c.user_id = l.uid
		WHERE c.user_id = " . $_SESSION["rm_user_id"] . ";";
        //$q = mysqli_query($this->xcon(), $query) or die("Error in query! getUserDataDI");
        $q = mysqli_query($this->xcon(), $query);
        if (!$q) {
            throw new Exception("Some Parameters of Fitness Profile not Completed.");
        }
        $result = mysqli_fetch_array($q);
        return $result[$key];
    }

    //update gender
    function updategender($gender, $uid)
    {
        $query = "update `Wo_Users` set gender = '$gender' where user_id = $uid";
        mysqli_query($this->xcon(), $query);

    }

    //update birthday
    function updatebirthday($birthday, $uid)
    {
        $query = "update `Wo_Users` set birthday = '$birthday' where user_id = $uid";
        mysqli_query($this->xcon(), $query);
    }

    //update weight
    function updateweight($weight, $uid)
    {
        $query = "update `ffc_user_fitness_profile` set weight = '$weight' where user_id = $uid";
        mysqli_query($this->xcon(), $query);
    }

    //update height
    function updateheight($height, $uid)
    {
        $query = "update `ffc_user_fitness_profile` set height = '$height' where user_id = $uid";
        mysqli_query($this->xcon(), $query);
    }

    //get plan for User
    function getPlan($bmr, $uid)
    {
        $day = $this->getuserday($uid);
        $day = $day == 0 ? 1 : $day;
        $query = "select `id`, `day`, `meal_type`, `item`,`c" . $bmr . "` as qty from di_dietplan where day = $day;";
        $q = mysqli_query($this->xcon(), $query);
        if (!$q) {
            throw new Exception("Ops! Cannot Generate Your plan.");
        }
        return $q;
    }

    function setPlan($calories, $target_weight, $progress, $date, $uid)
    {
        $query = "replace INTO `di_log`(`uid`,`start_date`,`target_weight`, `progress`, `calories`) VALUES ($uid,'$date',$target_weight,'$progress',$calories)";
        $q = mysqli_query($this->xcon(), $query);
        if (!$q) {
            throw new Exception("Ops! Cannot Set Your plan.");
        }
        return $q;
    }

    function getuserday($uid)
    {
        $query = "select MOD(DATEDIFF(CURRENT_DATE, start_date), 7) + 1 AS day from di_log where uid = $uid;";
        //return $query;
        $q = mysqli_query($this->xcon(), $query) or die("error in query! get day number");
        $qq = mysqli_fetch_assoc($q);
        return $qq['day'];
    }

    function countUserLogData($uid)
    {
        $query = "SELECT COUNT(*) as log_count FROM di_log WHERE uid=$uid;";
        //return $query;
        $q = mysqli_query($this->xcon(), $query);
        if (!$q) {
            throw new Exception("Ops! No Data found for your profile.");
        }
        $result = mysqli_fetch_array($q);
        return $result['log_count'];
    }

    function resetuserlog($uid)
    {
        $query = "delete FROM di_log WHERE uid=$uid;";
        mysqli_query($this->xcon(), $query);
    }

    function changecal($cal, $uid)
    {
        $query = "update `di_log` set `calories` = $cal where `uid` = $uid";
        $q = mysqli_query($this->xcon(), $query);
        if (!$q) {
            throw new Exception("Ops! Enable to update your Calories plan.");
        }
        return $q;
    }

    function Wo_GetConfig()
    {
        $data = array();
        $query = mysqli_query($this->xcon(), "SELECT * FROM " . T_CONFIG);
        if (mysqli_num_rows($query)) {
            while ($fetched_data = mysqli_fetch_assoc($query)) {
                $data[$fetched_data['name']] = $fetched_data['value'];
            }
        }
        return $data;
    }

    function Wo_LangsFromDB($lang = 'english')
    {
        $data = array();
        if (empty($lang)) {
            $lang = 'english';
        }
        $query = mysqli_query($this->xcon(), "SELECT `lang_key`, `$lang` FROM " . T_LANGS);
        mysqli_set_charset($this->xcon(), "utf8");
        if ($query) {
            if (mysqli_num_rows($query)) {
                while ($fetched_data = mysqli_fetch_assoc($query)) {
                    $data[$fetched_data['lang_key']] = ($fetched_data[$lang] ?? '');
                }
            }
        }
        return $data;
    }
}    //end of xloop class

?>