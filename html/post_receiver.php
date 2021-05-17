<?php

class Inquiry
{
    var $data;
    function __construct($post)
    {
        $this->data = array();
        foreach ($post as $key => $value) {
            $this->data += array(Inquiry::sanitize_text($key) => Inquiry::sanitize_text($value));
        }
    }

    function to_json()
    {
        return json_encode($this);
    }

    static function sanitize_text($text)
    {
        $result = trim($text);
        $result = htmlentities($result);
        return $result;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inquiry = new Inquiry($_POST);
    $fileName = "/var/log/php/" . date("Ymd") . ".log";
    file_put_contents($fileName, $inquiry->to_json() . "\n", FILE_APPEND | LOCK_EX);
    exit();
}
