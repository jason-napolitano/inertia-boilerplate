<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title inertia>{{ config('app.name', 'Laravel') }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @routes
        @vite(['resources/vue/app.ts', "resources/vue/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="antialiased bg-stone-600/30 dark:bg-black/95 overflow-y-hidden">
        @inertia
    </body>
</html>
