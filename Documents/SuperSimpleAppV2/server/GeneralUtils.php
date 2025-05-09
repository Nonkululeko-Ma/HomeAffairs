<?php

class GeneralUtils {
    public static function getSATime() {
        return self::getSATimeWithFormat();
    }

    public static function getSATimeWithFormat($format = 'Y-m-d H:i:s') {
        date_default_timezone_set('Africa/Johannesburg');
        return date($format, time());
    }

    public static function formatDatetime($date, $format = 'Y-m-d H:i:s') {
        return date($format, $date);
    }

    public static function elapsedTime($date) {
        $datetime1 = new DateTime(GeneralUtils::getSATime());
        $datetime2 = new DateTime($date);
        $interval = $datetime1->diff($datetime2);

        return (object) array(
            'hours' => $interval->h,
            'minutes' => $interval->i
        );
    }

    public static function randomAlphanumeric($len = 10, $onlyUpper = false) {
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if($onlyUpper) {
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }

        $string = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $len; $i++) {
            $string .= $characters[mt_rand(0, $max)];
        }

        return $string;
    }

    public static function getSearchOptionStrings($searchString) {
        $searchString = strtolower($searchString);
        $array = array();
        $tokens = preg_split('/ /', $searchString, -1, PREG_SPLIT_NO_EMPTY);
        for($i=0;$i<count($tokens);$i++) {
            $token = $tokens[$i];
            array_push($array, $token);
            if($i < (count($tokens)-1)) {
                $thisIteration = $token;
                for($j=$i+1;$j<count($tokens);$j++) {
                    $thisIteration .= " ".$tokens[$j];
                    array_push($array, $thisIteration);
                }
            }
        }
        return $array;
    }

    public static function emptyStringOnNull($str) {
        return $str === null ? "" : $str;
    }

    public static function nullOnEmptyString($str) {
        return strlen(trim($str)) == 0 ? null : $str;
    }

    public static function isNullOrEmptyString($str){
        return ($str === null || trim($str) === '');
    }

    public static function deleteDir($dirPath) {
        if (! is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }

    public static function dirToArray($dir) {

        $result = array();

        $cdir = scandir($dir);
        foreach ($cdir as $key => $value)
        {
            if (!in_array($value,array(".","..")))
            {
                if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
                {
                    $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
                }
                else
                {
                    $result[] = $value;
                }
            }
        }

        return $result;
    }

    public static function underscoreToCamelCase($string, $capitalizeFirstCharacter = false)
    {
        $str = str_replace('_', '', ucwords($string, '_'));

        if (!$capitalizeFirstCharacter) {
            $str = lcfirst($str);
        }

        return $str;
    }

    public static function isBetween($no, $start, $end, $startInc = true, $endInc = true) {
        if(is_null($start) || is_null($end)) {
            return false;
        }

        $no = floatval($no);
        $start = floatval($start);
        $end = floatval($end);
        if($startInc && $endInc) {
            return $start <= $no && $no <= $end;
        } else if($startInc) {
            return $start <= $no && $no < $end;
        } else if($endInc) {
            return $start < $no && $no <= $end;
        } else {
            return $start < $no && $no < $end;
        }
    }

    public static function roundToTopPointTwo($num) {
        $nearestP5 = round($num*5)/5;
        $nearestP5 = $num <= $nearestP5 ? $nearestP5 : ($nearestP5 + 0.2);
        return round($nearestP5 * 10) / 10;
    }

    function getIPAddress() {
        //whether ip is from the share internet
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from the proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from the remote address
        else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
}
class_alias('GeneralUtils', 'GU');