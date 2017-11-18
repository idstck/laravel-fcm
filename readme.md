# Laravel FCM

A Simple package that help you send a firebase notification with your laravel applications

### Installation

You can pull the package via composer :

``` bash
$ composer require idstack/laravel-fcm
```

 Next, You must register the service provider :

 ``` php
// config/app.php

'Providers' => [
    ...
    Idstack\Fcm\FcmServiceProvider::class,
]
 ```

 If you want to make use of the facade you must install it as well:

```php
// config/app.php
'aliases' => [
    ...
    'Fcm' => Idstack\Fcm\Facades\Fcm::class,
];
```

Next, You must publish the config file to define your fcm server key :

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

If You want to send a FCM with just notification parameter, this is an example of usage sending a FCM with only data parameter :
```php
fcm()
    ->data([
        'title' => 'Test FCM',
        'body' => 'This is a test of FCM',
    ])
    ->to($recipients); // $recipients must an array
```