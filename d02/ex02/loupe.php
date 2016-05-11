#!/usr/bin/php
<?php
    $str = file_get_contents($argv[1]);

    function change_between($str)
    {
        $i = 0;
        $n = strlen($str[0]);
        $m = 0;
        print_r($str);
        $str = preg_replace_callback("/title=.*\"/", 'change_title', $str);
        // print_r($str);
        $i++;
        while ($str[0][$i] != '>')
        {
            $i++;
        }
        $i++;
        echo $str[0][$i];
        while ($i < $n && $str[0][$i] != '<')
        {
            if ($str[0][$i] >= 'a' && $str[0][$i] <= 'z')
            {
                $m = ord($str[0][$i]) - 32;
                $str[0][$i] = chr($m);
            }
            $i++;
        }
        // print_r($str);
        return ($str[0]);
    }

    function change_title($str)
    {
        $i = 0;
        $n = strlen($str[0]);
        $m = 0;
        $q = 0;

        // print_r($str);
        while ($str[0][$i] != '=')
        {
            $i++;
        }
        while ($i < $n && $q != 2)
        {
            if ($str[0][$i] >= 'a' && $str[0][$i] <= 'z')
            {
                $m = ord($str[0][$i]) - 32;
                $str[0][$i] = chr($m);
            }
            if ($str[0][$i] == '"')
            {
                $q++;
            }
            $i++;
        }
        // print_r($str);
        return ($str[0]);
    }
    // echo $str."\n"."hello";
    $str = preg_replace_callback("/<[aA].*>.*>/", 'change_between', $str);
    echo $str;
?>
