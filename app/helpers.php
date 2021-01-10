<?php
function settings($key = null, $default = null) {
    if ($key === null) {
        return app(App\Settings::class);
    }
    return app(App\Settings::class)->get($key, $default);
}

function settings_404($key = null, $default = null) {
    if ($key === null) {
        return app(App\Settings_404::class);
    }
    return app(App\Settings_404::class)->get($key, $default);
}

function settings_translate($key = null, $default = null) {
    if ($key === null) {
        return app(App\SettingsTranslate::class);
    }
    return app(App\SettingsTranslate::class)->get($key, $default);
}
