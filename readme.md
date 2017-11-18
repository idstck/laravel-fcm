# Simple Laravel FCM

Simple package for using FCM as Push Notification. With multiple token or device ID and send with topics.

### Installation

You can pull the package via composer :

``` bash
$ composer require idstack/laravel-fcm
```

 Register the service provider :

 ``` php
'Providers' => [
    ...
    Idstack\Fcm\FcmServiceProvider::class,
]
 ```

 Optional using facade:

```php
'aliases' => [
    ...
    'Fcm' => Idstack\Fcm\Facades\Fcm::class,
];
```

Publish the config file to define your server key :

```bash
php artisan vendor:publish --provider="Idstack\Fcm\FcmServiceProvider"
```

This is the contents of the published file:

```php
return [
    /**
     * Insert your FCM Server Key Here
     * Or you can add in env file with FCM_SERVER_KEY variable
     */
    'fcm_server_key' => env('FCM_SERVER_KEY','')
];

```

### Usage

This sample usage for sending notification with several information like title and body notification :
```php
fcm()
    ->data([
        'title' => 'Test FCM',
        'body' => 'This is a test of FCM',
    ])
    ->to($recipients); // $recipients must an array
```