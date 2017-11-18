<?php
/**
 * Created by PhpStorm.
 * User: kiddie
 * Date: 11/18/17
 * Time: 9:43 PM
 */

namespace Idstack\Fcm;


class FcmExc
{
    protected $recipient;
    protected $data;
    protected $notification;

    public function data(array $data = [])
    {
        $this->data = $data;

        return $this;
    }

    public function notification(array $notification = [])
    {
        $this->notification = $notification;

        return $this;
    }

    public function to($recipient)
    {
        $this->recipient = $recipient;

        $fields = [
            'registration_ids' => $this->recipient,
            'content-available' => true,
            'priority' => 'high',
            'data' => $this->data,
            'notification' => $this->notification
        ];

        $this->sendNotification($fields);
    }

    public function toTopics($recipient)
    {
        $this->recipient = $recipient;

        $fields = [
            'to' => $this->recipient,
            'content-available' => true,
            'priority' => 'high',
            'data' => $this->data,
            'notification' => $this->notification
        ];

        $this->sendNotification($fields);
    }

    public function sendNotification($fields)
    {
        $fcmEndpoint = 'https://fcm.googleapis.com/fcm/send';
        $serverKey = config('fcm.fcm_server_key');

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type:application/json'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $fcmEndpoint);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);

        curl_close($ch);
    }
}