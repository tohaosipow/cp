<?php
/**
 * Created by PhpStorm.
 * User: tohao
 * Date: 07.07.2019
 * Time: 12:49
 */

namespace App\Services;

use SMSRU;
use stdClass;

require_once "sms.ru.php";

class SmsService
{
    public function send($phone, $text){
        $smsru = new SMSRU('E938E559-76C5-BD75-8B68-E38AC298A735');
        $data = new stdClass();
        $data->to = '79224448131';
        $data->text = $text;
        $sms = $smsru->send_one($data);
    }
}