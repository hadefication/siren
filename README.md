# Siren

Toast style application messages for [Laravel]() using [toastr]().

## Installation
1. Install by running `composer require hadefication/siren`.
2. Add the service provider and facade to your `config/app.php`.

```
'providers' => [
    ...
    Hadefication\Siren\SirenServiceProvider::class,
    ...
],

'aliases' = [
    ...
    'Siren' => Hadefication\Siren\SirenFacade::class,
    ...
]
```

## Usage
- To collect messages, you can either use the facade `Siren` or the nifty little helper function called `siren()`. This then will give you access to all of the methods that siren can offer. To collect an error message, use `siren()->error($message, $title, $important)` where `$message` will obviously the message you want to convey and same goes to `$title` then `$important` will determine if your message will stay until it's closed (set to `true`) or will auto-close after a number of seconds. See example below for the type message that can be collected.

```
// Example

$message = 'This is a message';
$title = 'Notification';
$important = false;

// Error
siren()->error($message, $title, $important);
// or
\Siren::error($message, $title, $important);

// Success
siren()->success($message, $title, $important);
// or
\Siren::success($message, $title, $important);

// Warning
siren()->warning($message, $title, $important);
// or
\Siren::warning($message, $title, $important);

// Notice or Info
siren()->notice($message, $title, $important);
// or
\Siren::notice($message, $title, $important);
```
- Next is you need to include the companion javascript library by either requiring it to your `app.js` or adding it directly to your view. You may need to copy `vendor/src/resources/assets/dist/siren.js` to your public path if your going for the later option. Luckily, [Laravel Elixir]() or [Laravel Mix]() can do that for you! Once the javascript library is added, you will then have `siren` global variable at your disposal, see **Javascript** section for more details.

```
// app.js
require('vendor/src/resources/assets/dist/siren.js');

// direct
<script src="{{ asset('path/to/siren.js') }}"></script>
```
- To show the toast messages, you need to add `siren()->render()` or `\Siren::render()` at the tail of your layout's view. It's important that this method will be the last one to be called.

```
    {!! siren()->render() !!}
    // or
    {!! \Siren::render() !!}
```

## Javascript
Once you added the siren javascript library, `siren` variable will be available. This will then give you access to all methods that you can use. 
