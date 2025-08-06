import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
import { browser } from '$app/environment';

let echo;

if (browser) {
    window.Pusher = Pusher;

    echo = new Echo({
        broadcaster: 'reverb',
        key: 'some-key',
        wsHost: 'localhost',
        wsPort: 9000,
        wssPort: 9000,
        forceTLS: false,
        enabledTransports: ['ws', 'wss'],
    });
}

export { echo };
