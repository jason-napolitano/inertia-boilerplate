## User Management Studio

> This is a boilerplate codebase in the form of a user management studio that leverages
> the power of _Laravel_, _Inertia_ and _Vue 3_. It uses _Element Plus_ for clean and
> efficient components, _Tailwind_ for the UI, and iconography provided by _Lucide Icons_.
> Included are a ton of extra features such as prearranged packages (for both client-side and
> server-side), helper functions and quality-of-life composables to make the DX easy, and
> enjoyable.

## Included Packages
### Below lists the included packages and features:
- Laravel Packages
    - [`staudenmeir/belongs-to-through`](https://packagist.org/packages/staudenmeir/belongs-to-through)
    - [`barryvdh/laravel-query-builder`](https://packagist.org/packages/spatie/laravel-query-builder)
    - [`barryvdh/laravel-debugbar`](https://packagist.org/packages/barryvdh/laravel-debugbar)
    - [`laravel-permission`](https://packagist.org/packages/spatie/laravel-permission)
    - [`laravel/telescope`](https://packagist.org/packages/laravel/telescope)
    - [`pest`](https://packagist.org/packages/pestphp/pest)
- Frontend Packages
    - [`@vueuse/core`](https://www.npmjs.com/package/@vueuse/core) and [`@vueuse/components`](https://www.npmjs.com/package/@vueuse/components)
    - [`chart.js`](https://www.npmjs.com/package/chart.js) and [`vue-chart3`](https://www.npmjs.com/package/vue-chart-3)
    - [`unplugin-vue-components`](https://www.npmjs.com/package/unplugin-vue-components)
    - [`unplugin-auto-import`](https://www.npmjs.com/package/unplugin-auto-import)
    - [`lucide-vue-next`](https://www.npmjs.com/package/lucide-vue-next)
    - [`vue3-openlayers`](https://www.npmjs.com/package/vue3-openlayers)
    - [`element-plus`](https://www.npmjs.com/package/element-plus)
    - [`tailwind.css`](https://www.npmjs.com/package/tailwindcss)
    - [`fullcalendar`](https://www.npmjs.com/package/@fullcalendar/vue3)
    - [`typescript`](https://www.npmjs.com/package/typescript)
    - [`inertia`](https://www.npmjs.com/package/@inertiajs/inertia)
    - [`vitest`](https://www.npmjs.com/package/vitest)
    - [`pinia`](https://www.npmjs.com/package/pinia)
    - [`maska`](https://www.npmjs.com/package/maska)
    - [`dayjs`](https://www.npmjs.com/package/dayjs)

## Installation and Setup

```bash
# generate the env file
$ cp .env.example .env

# install server dependencies
$ composer install

# install client dependencies
$ npm i

# generate key
$ php artisan key:generate

# laravel migrations
$ php artisan migrate:fresh --seed

# storage link
$ php artisan storage:link

# run the dev server
$ composer dev

# OPTIONAL

# clear caches
$ php artisan optimize:clear

# run the build process
$ npm run build
```
