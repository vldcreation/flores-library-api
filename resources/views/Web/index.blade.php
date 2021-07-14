<?php
use Illuminate\Support\Facades\URL;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Flores Library - API</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

        <link rel="canonical" href="https://laravel.com/docs/8.x/queries">
    
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg" color="#ff2d20">
    <link rel="shortcut icon" href="/img/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#ff2d20">
    <meta name="msapplication-config" content="/img/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="https://use.typekit.net/ins2wgm.css">
    <link rel="stylesheet" href="<?php echo asset('assets/css/app.css')?>" type="text/css"> 
    <style type="text/css">
        .btn-clipboard {
            font-size: .65em;
            color: #0d6efd;
            background-color: #fff;
            border: 1px solid;
            border-radius: .25rem;
        }
        .btn-clipboard:hover{
            background-color:#0d6efd;
            color: #fff;
        }
    </style>
</head>
<body
    x-data="{
        navIsOpen: false,
        searchIsOpen: false,
        search: '',
    }"
    class="language-php h-full w-full font-sans text-gray-900 antialiased"
>

     <a
    id="skip-to-content-link"
    href="#main-content"
    class="absolute bg-gray-100 px-4 py-2 top-3 left-3 text-gray-700 shadow-xl"
>
    Skip to content
</a>
 
    <div class="relative overflow-auto" id="docsScreen">
        <div class="relative lg:flex lg:items-start">
            <aside
                x-init="init()"
                x-data="{
                    navIsOpen: false,
                    init() {
                        this.$watch('navIsOpen', (val) => {
                            if (val) {
                                document.body.classList.add('overflow-hidden');
                            } else {
                                document.body.classList.remove('overflow-hidden');
                            }
                        });
                    }
                }"
                class="hidden fixed top-0 bottom-0 left-0 z-20 h-full w-16 flex flex-col bg-gradient-to-b from-gray-100 to-white transition-all duration-300 overflow-hidden lg:sticky lg:w-80 lg:flex-shrink-0 lg:flex lg:justify-end lg:items-end 2xl:max-w-lg 2xl:w-full"
                :class="{ 'w-64': navIsOpen }"
                @click.away="navIsOpen = false"
                @keydown.window.escape="navIsOpen = false"
            >
                <div class="relative min-h-0 flex-1 flex flex-col xl:w-80">
                    <a href="/" class="flex items-center py-8 px-4 lg:px-8 xl:px-16">
                        <img
                            class="w-8 h-8 flex-shrink-0 transition-all duration-300 lg:w-12 lg:h-12"
                            :class="{ 'w-12 h-12': navIsOpen }"
                            src="/assets/file-image/Logo-1.png"
                            alt="Flores Dev Team"
                        >
                        <img
                            x-show="navIsOpen"
                            x-cloak
                            class="ml-4 transition-all duration-300 lg:hidden"
                            x-transition:enter="duration-250 ease-out"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="duration-250 ease-in"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            src="/assets/file-image/Logo-1.png"
                            alt="Flores Dev Team"
                        >
                        <img
                            src="/assets/file-image/Logo-2.png"
                            alt="Flores Dev Team"
                            class="hidden ml-4 lg:block"
                        >
                    </a>
                    <div class="overflow-y-auto overflow-x-hidden px-4 lg:overflow-hidden lg:px-8 xl:px-16">
                        <nav x-show="navIsOpen" x-cloak class="mt-4 lg:hidden">
                            <div class="docs_sidebar">
                                <ul>
<li>
<h2>Books</h2>
<ul>
<li><a href="/docs/8.x/releases">Get Books</a></li>
<li><a href="/docs/8.x/upgrade">Upgrade Guide</a></li>
<li><a href="/docs/8.x/contributions">Contribution Guide</a></li>
</ul>
</li>
</ul>
                            </div>
                        </nav>
                        <nav id="indexed-nav" style="position: fixed;z-index: 1;" class="hidden lg:block lg:mt-4">
                            <div class="docs_sidebar">
                            <ul>
<li>
<h2>Books</h2>
<ul>
<li><a href="#introduction-book">Introduction</a></li>
<li><a href="#retrieving-all-rows-from-books-table">Get ALL Books</a></li>
<li><a href="#get-book-detail">Get Books Detail</a></li>
</ul>
</li>
</ul>
                            </div>
                        </nav>

                        
                                                    <!-- <div :class="{ 'hidden': !navIsOpen }" x-cloak class="mt-4 px-3 py-2 border-dashed border-gray-200 border rounded-lg text-xs leading-loose text-gray-700 lg:block">
                                <span class="font-medium">Laravel Forge:</span> create and manage PHP 8 servers. Deploy your Laravel applications in seconds. <a class="underline text-red-600" href="https://forge.laravel.com">Sign up now!</a>.
                            </div> -->
                        
                        
                                            </div>
                    <div class="sticky bottom-0 flex-1 flex flex-col justify-end lg:hidden">
                        <div class="py-4 px-4 bg-white">
                            <button class="relative ml-1 w-6 h-6 text-red-600 lg:hidden focus:outline-none focus:shadow-outline" aria-label="Menu" @click.prevent="navIsOpen = !navIsOpen">
                                <svg x-show.transition.opacity="! navIsOpen" class="absolute inset-0 w-6 h-6" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                                <svg x-show.transition.opacity="navIsOpen" x-cloak class="absolute inset-0 w-6 h-6" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </aside>

            <header
                class="lg:hidden"
                @keydown.window.escape="navIsOpen = false"
                @click.away="navIsOpen = false"
            >
                <div class="relative mx-auto w-full py-10 bg-white transition duration-200">
                    <div class="mx-auto px-8 sm:px-16 flex items-center justify-between">
                        <a href="/" class="flex items-center">
                            <img class="" src="/img/logomark.min.svg" alt="Laravel">
                            <img class="hidden ml-5 sm:block" src="/img/logotype.min.svg" alt="Laravel">
                        </a>
                        <div class="flex-1 flex items-center justify-end">
                            <button class="ml-2 relative w-10 h-10 p-2 text-red-600 lg:hidden focus:outline-none focus:shadow-outline" aria-label="Menu" @click.prevent="navIsOpen = !navIsOpen">
                                <svg x-show.transition.opacity="! navIsOpen" class="absolute inset-0 mt-2 ml-2 w-6 h-6" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                                <svg x-show.transition.opacity="navIsOpen" x-cloak class="absolute inset-0 mt-2 ml-2 w-6 h-6" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                        </div>
                    </div>
                    <span :class="{ 'shadow-sm': navIsOpen }" class="absolute inset-0 z-20 pointer-events-none"></span>
                </div>
                <div
                    x-show="navIsOpen"
                    x-transition:enter="duration-150"
                    x-transition:leave="duration-100 ease-in"
                    x-cloak
                >
                    <nav
                        x-show="navIsOpen"
                        x-cloak
                        class="absolute w-full transform origin-top shadow-sm z-10"
                        x-transition:enter="duration-150 ease-out"
                        x-transition:enter-start="opacity-0 -translate-y-8 scale-75"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="duration-100 ease-in"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 -translate-y-8 scale-75"
                    >
                        <div class="relative p-8 bg-white docs_sidebar">
                        <ul>
<li>
<h2>Books</h2>
<ul>
<!-- <li><a href="#introduction">Introduction</a></li> -->
<li><a href="/docs/8.x/releases">Release Notes</a></li>
<li><a href="/docs/8.x/upgrade">Upgrade Guide</a></li>
<li><a href="/docs/8.x/contributions">Contribution Guide</a></li>
</ul>
</li>
</ul>
                        </div>
                    </nav>
                </div>
            </header>

            <section class="flex-1">
                <div class="max-w-screen-lg px-8 sm:px-16 lg:px-24">
                    

                    <section class="mt-8 md:mt-16">
                        <section class="docs_main max-w-prose">
                            
                                                         <div id="main-content">
    <h1>Flores Library : API</h1>
<!-- <ul>
<li><a href="#introduction">Introduction</a></li>
<li><a href="#running-database-queries">Running Database Queries</a>
<ul>
<li><a href="#chunking-results">Chunking Results</a></li>
<li><a href="#streaming-results-lazily">Streaming Results Lazily</a></li>
<li><a href="#aggregates">Aggregates</a></li>
</ul></li>
<li><a href="#select-statements">Select Statements</a></li>
<li><a href="#raw-expressions">Raw Expressions</a></li>
<li><a href="#joins">Joins</a></li>
<li><a href="#unions">Unions</a></li>
<li><a href="#basic-where-clauses">Basic Where Clauses</a>
<ul>
<li><a href="#where-clauses">Where Clauses</a></li>
<li><a href="#or-where-clauses">Or Where Clauses</a></li>
<li><a href="#json-where-clauses">JSON Where Clauses</a></li>
<li><a href="#additional-where-clauses">Additional Where Clauses</a></li>
<li><a href="#logical-grouping">Logical Grouping</a></li>
</ul></li>
<li><a href="#advanced-where-clauses">Advanced Where Clauses</a>
<ul>
<li><a href="#where-exists-clauses">Where Exists Clauses</a></li>
<li><a href="#subquery-where-clauses">Subquery Where Clauses</a></li>
</ul></li>
<li><a href="#ordering-grouping-limit-and-offset">Ordering, Grouping, Limit &amp; Offset</a>
<ul>
<li><a href="#ordering">Ordering</a></li>
<li><a href="#grouping">Grouping</a></li>
<li><a href="#limit-and-offset">Limit &amp; Offset</a></li>
</ul></li>
<li><a href="#conditional-clauses">Conditional Clauses</a></li>
<li><a href="#insert-statements">Insert Statements</a>
<ul>
<li><a href="#upserts">Upserts</a></li>
</ul></li>
<li><a href="#update-statements">Update Statements</a>
<ul>
<li><a href="#updating-json-columns">Updating JSON Columns</a></li>
<li><a href="#increment-and-decrement">Increment &amp; Decrement</a></li>
</ul></li>
<li><a href="#delete-statements">Delete Statements</a></li>
<li><a href="#pessimistic-locking">Pessimistic Locking</a></li>
<li><a href="#debugging">Debugging</a></li>
</ul> -->
<p><a name="introduction-book"></a></p>
<h2 id="introduction-book">Introduction</h2>
<p>Books service is a service that handles book data management in the flores library</p>
<blockquote>
<p>{note} To use the rest api , you need include this Secret in header<br>$headers = array(
   "SECRET_KEY: {value}",
   "Content-Type: application/json",
)</p>
</blockquote>
<p><a name="books-api"></a></p>
<h2 id="books-api">Books</h2>
<p><a name="retrieving-all-rows-from-books-table"></a></p>
<h4 id="retrieving-all-rows-from-books-table">Retrieving All Rows From Book Table</h4>
<h4><code><b>GET</b></code> <code> <div  id="value-retrieving-all-rows-from-books-table"> <?php echo url("/api/books"); ?> </div></code> <button type="button" onclick="cpy('value-retrieving-all-rows-from-books-table')" class="btn-clipboard" title="Copy to Clipboard" data-bs-original-title="Copy to clipboard">Copy</button> </h4>
<pre><code>
{
    "data": [
        {
            "id": 1,
            "id_kategori": 1,
            "isbn": "ISBN111111111",
            "judul": "Ilmu Theologia",
            "deskripsi": "Theologia berasal dari ...",
            "penulis": "Theolog",
            "penerbit": "Theodora",
            "gambar_buku": "1626076695.jpg",
            "jlh_halaman": 100,
            "bahasa": "Indonesia",
            "edisi": "56",
            "tahun_terbit": 2019,
            "subject": "Fiction",
            "lokasi": "",
            "created_at": "2021-06-22T22:13:36.000000Z",
            "updated_at": "2021-06-22T22:13:36.000000Z"
        },
        {
            "id": 2,
            "id_kategori": 1,
            "isbn": "ISBN222222",
            "judul": "Ilmu Theologia",
            "deskripsi": "Theologia berasal dari ...",
            "penulis": "Theolog",
            "penerbit": "Theodora",
            "gambar_buku": "1626076695.jpg",
            "jlh_halaman": 100,
            "bahasa": "Indonesia",
            "edisi": "56",
            "tahun_terbit": 2019,
            "subject": "Fiction",
            "lokasi": "",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 3,
            "id_kategori": 1,
            "isbn": "12312312312",
            "judul": "Sesi 2 Tutorial Codeigneiter",
            "deskripsi": "Pal Pal si jagoan neon",
            "penulis": "Pal Pal",
            "penerbit": "Pal Pal",
            "gambar_buku": "1626076629.jpg",
            "jlh_halaman": 123,
            "bahasa": "Indonesia",
            "edisi": "Contoh",
            "tahun_terbit": 2020,
            "subject": "Pal",
            "lokasi": "palpalmedan",
            "created_at": "2021-07-12T07:57:09.000000Z",
            "updated_at": "2021-07-12T07:57:09.000000Z"
        },
        {
            "id": 4,
            "id_kategori": 1,
            "isbn": "123123123122",
            "judul": "Sesi 2 Tutorial Codeigneiter",
            "deskripsi": "Pal Pal si jagoan neon",
            "penulis": "Pal Pal",
            "penerbit": "Pal Pal",
            "gambar_buku": "1626076695.jpg",
            "jlh_halaman": 123,
            "bahasa": "Indonesia",
            "edisi": "Contoh",
            "tahun_terbit": 2020,
            "subject": "Nice",
            "lokasi": "palpalmedan",
            "created_at": "2021-07-12T07:58:15.000000Z",
            "updated_at": "2021-07-12T07:58:15.000000Z"
        }
    ],
    "message": 200
}
</code></pre>

<p><a name="get-book-detail"></a></p>
<h4 id="get-book-detail">Retrieving A Single Row / Column From Book Table</h4>
<h4><code><b>GET</b></code> <code><?php echo url("/api/books/{id_book}"); ?></code> </h4>
<pre><code>
{
    "data": {
        "id": 1,
        "id_kategori": 1,
        "isbn": "ISBN111111111",
        "judul": "Ilmu Theologia",
        "deskripsi": "Theologia berasal dari ...",
        "penulis": "Theolog",
        "penerbit": "Theodora",
        "gambar_buku": "1626076695.jpg",
        "jlh_halaman": 100,
        "bahasa": "Indonesia",
        "edisi": "56",
        "tahun_terbit": 2019,
        "subject": "Fiction",
        "lokasi": "",
        "created_at": "2021-06-22T22:13:36.000000Z",
        "updated_at": "2021-06-22T22:13:36.000000Z"
    },
    "message": 200
}
</code></pre>


</div>
 
                        </section>
                    </section>
                </div>
            </section>
        </div>
    </div>

<!-- <footer style="background: linear-gradient(0deg,#fff 90%,hsla(0,0%,100%,0))" class="relative z-30">
    <div class="relative z-20 overflow-x-hidden">
        <div class="relative max-w-screen-2xl mx-auto sm:px-8">
            <div class="absolute inset-0 flex flex-col px-4 lg:px-12 xl:px-16">
                <div class="flex-1"></div>
                <div class="flex-1 bg-gray-100"></div>
            </div>
            <div class="relative max-w-screen-xl mx-auto px-8">
                <section class="relative z-10 p-6 bg-white shadow-lg md:flex md:items-center md:p-12 lg:p-16">
                    <div class="content md:pr-12">
                        <h2 class="text-3xl tracking-tight sm:text-4xl md:mt-4 xl:text-5xl">Become a Laravel Partner</h2>
                        <p class="mt-3 max-w-xl text-gray-600 sm:mt-5 md:max-w-2xl md:mt-8 md:text-lg">Laravel Partners are elite shops providing top-notch Laravel development and consulting. Each of our partners can help you craft a beautiful, well-architected project.</p>
                    </div>
                                             <a class="group relative h-12 inline-flex w-64 border border-red-600 sm:w-56 focus:outline-none mt-8" href="/partners">
    <span class="absolute inset-0 inline-flex items-center justify-center self-stretch px-6 text-white text-center font-medium bg-red-600 ring-1 ring-red-600 ring-offset-1 ring-offset-red-600 transform transition-transform group-hover:-translate-y-1 group-hover:-translate-x-1 group-focus:-translate-y-1 group-focus:-translate-x-1">
        Our Partners
    </span>
</a>
 
                                    </section>
            </div>
        </div>

        <div class="max-w-screen-2xl mx-auto px-4 lg:px-12 xl:px-16">
            <div class="px-8 pb-12 bg-gray-100 xl:px-20">
                <div>
                    <img class="-mt-2 max-w-4xl w-full transform -translate-x-12 lg:-translate-x-24 xl:-translate-x-40" src="/img/logotype.min.svg" alt="Laravel">
                </div>
                <div class="mt-6 sm:mt-12 md:flex">
                    <div class="divide-y divide-gray-600 divide-opacity-25 sm:hidden">
                                                    <div
                                x-data="{ expanded: false }"
                                class="py-4"
                            >
                                <button class="-mx-2 px-2 w-full flex items-center justify-between py-2 font-bold" @click="expanded = ! expanded">
                                    <span>Highlights</span>
                                    <span class="transform transition-transform" :class="{ 'rotate-45': expanded }">&plus;</span>
                                </button>
                                <div
                                    x-show="expanded"
                                    x-cloak
                                    class="py-2 transition transform"
                                    x-transition:enter="duration-250 ease-out"
                                    x-transition:enter-start="opacity-0 -translate-y-8"
                                    x-transition:enter-end="opacity-100"
                                    x-transition:leave="duration-250 ease-in"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0 -translate-y-8"
                                >
                                    <ul class="space-y-2 text-gray-600 text-sm">
                                                                                    <li><a href="/team">Our Team</a></li>
                                                                                    <li><a href="/docs/8.x/releases">Release Notes</a></li>
                                                                                    <li><a href="/docs/8.x/installation">Getting Started</a></li>
                                                                                    <li><a href="/docs/8.x/routing">Routing</a></li>
                                                                                    <li><a href="/docs/8.x/blade">Blade Templates</a></li>
                                                                                    <li><a href="/docs/8.x/authentication">Authentication</a></li>
                                                                                    <li><a href="/docs/8.x/authorization">Authorization</a></li>
                                                                                    <li><a href="/docs/8.x/artisan">Artisan Console</a></li>
                                                                                    <li><a href="/docs/8.x/database">Database</a></li>
                                                                                    <li><a href="/docs/8.x/eloquent">Eloquent ORM</a></li>
                                                                                    <li><a href="/docs/8.x/testing">Testing</a></li>
                                                                            </ul>
                                </div>
                            </div>
                                                    <div
                                x-data="{ expanded: false }"
                                class="py-4"
                            >
                                <button class="-mx-2 px-2 w-full flex items-center justify-between py-2 font-bold" @click="expanded = ! expanded">
                                    <span>Resources</span>
                                    <span class="transform transition-transform" :class="{ 'rotate-45': expanded }">&plus;</span>
                                </button>
                                <div
                                    x-show="expanded"
                                    x-cloak
                                    class="py-2 transition transform"
                                    x-transition:enter="duration-250 ease-out"
                                    x-transition:enter-start="opacity-0 -translate-y-8"
                                    x-transition:enter-end="opacity-100"
                                    x-transition:leave="duration-250 ease-in"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0 -translate-y-8"
                                >
                                    <ul class="space-y-2 text-gray-600 text-sm">
                                                                                    <li><a href="https://laracasts.com">Laracasts</a></li>
                                                                                    <li><a href="https://laravel-news.com">Laravel News</a></li>
                                                                                    <li><a href="https://laracon.us">Laracon</a></li>
                                                                                    <li><a href="https://laracon.eu/">Laracon EU</a></li>
                                                                                    <li><a href="https://larajobs.com">Jobs</a></li>
                                                                                    <li><a href="https://certification.laravel.com/">Certification</a></li>
                                                                                    <li><a href="https://laracasts.com/discuss">Forums</a></li>
                                                                            </ul>
                                </div>
                            </div>
                                                    <div
                                x-data="{ expanded: false }"
                                class="py-4"
                            >
                                <button class="-mx-2 px-2 w-full flex items-center justify-between py-2 font-bold" @click="expanded = ! expanded">
                                    <span>Partners</span>
                                    <span class="transform transition-transform" :class="{ 'rotate-45': expanded }">&plus;</span>
                                </button>
                                <div
                                    x-show="expanded"
                                    x-cloak
                                    class="py-2 transition transform"
                                    x-transition:enter="duration-250 ease-out"
                                    x-transition:enter-start="opacity-0 -translate-y-8"
                                    x-transition:enter-end="opacity-100"
                                    x-transition:leave="duration-250 ease-in"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0 -translate-y-8"
                                >
                                    <ul class="space-y-2 text-gray-600 text-sm">
                                                                                    <li><a href="https://vehikl.com">Vehikl</a></li>
                                                                                    <li><a href="https://tighten.co">Tighten</a></li>
                                                                                    <li><a href="https://64robots.com/">64 Robots</a></li>
                                                                                    <li><a href="https://kirschbaumdevelopment.com/">Kirschbaum</a></li>
                                                                                    <li><a href="https://www.curotec.com/services/technologies/laravel/">Curotec</a></li>
                                                                                    <li><a href="https://jump24.co.uk/">Jump24</a></li>
                                                                                    <li><a href="https://www.a2design.biz/">A2 Design</a></li>
                                                                                    <li><a href="https://corporate.aboutyou.de/app/uploads/2019/08/INTRO-Pitch-I-AY-Tech.pdf?utm_source=laravelpartnersfindoutmore&amp;utm_medium=socialgroups&amp;utm_campaign=tech">ABOUT YOU</a></li>
                                                                                    <li><a href="https://www.byte5.net/">Byte 5</a></li>
                                                                                    <li><a href="https://cubettech.com/">Cubet</a></li>
                                                                                    <li><a href="https://www.cyber-duck.co.uk/how-we-work/technology/laravel?utm_source=Laravel%20Partner&amp;utm_medium=Sponsorship">Cyber-Duck</a></li>
                                                                                    <li><a href="https://devsquad.com/">DevSquad</a></li>
                                                                                    <li><a href="https://www.ideil.com/">Ideil</a></li>
                                                                                    <li><a href="https://romegadigital.com/">Romega Software</a></li>
                                                                                    <li><a href="https://www.worksome.com/">Worksome</a></li>
                                                                            </ul>
                                </div>
                            </div>
                                                    <div
                                x-data="{ expanded: false }"
                                class="py-4"
                            >
                                <button class="-mx-2 px-2 w-full flex items-center justify-between py-2 font-bold" @click="expanded = ! expanded">
                                    <span>Ecosystem</span>
                                    <span class="transform transition-transform" :class="{ 'rotate-45': expanded }">&plus;</span>
                                </button>
                                <div
                                    x-show="expanded"
                                    x-cloak
                                    class="py-2 transition transform"
                                    x-transition:enter="duration-250 ease-out"
                                    x-transition:enter-start="opacity-0 -translate-y-8"
                                    x-transition:enter-end="opacity-100"
                                    x-transition:leave="duration-250 ease-in"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0 -translate-y-8"
                                >
                                    <ul class="space-y-2 text-gray-600 text-sm">
                                                                                    <li><a href="/docs/8.x/billing">Cashier</a></li>
                                                                                    <li><a href="/docs/8.x/dusk">Dusk</a></li>
                                                                                    <li><a href="/docs/8.x/broadcasting">Echo</a></li>
                                                                                    <li><a href="https://envoyer.io">Envoyer</a></li>
                                                                                    <li><a href="https://forge.laravel.com">Forge</a></li>
                                                                                    <li><a href="/docs/8.x/homestead">Homestead</a></li>
                                                                                    <li><a href="/docs/8.x/horizon">Horizon</a></li>
                                                                                    <li><a href="https://lumen.laravel.com">Lumen</a></li>
                                                                                    <li><a href="/docs/8.x/mix">Mix</a></li>
                                                                                    <li><a href="https://nova.laravel.com">Nova</a></li>
                                                                                    <li><a href="/docs/8.x/passport">Passport</a></li>
                                                                                    <li><a href="/docs/8.x/scout">Scout</a></li>
                                                                                    <li><a href="/docs/8.x/socialite">Socialite</a></li>
                                                                                    <li><a href="https://spark.laravel.com">Spark</a></li>
                                                                                    <li><a href="/docs/8.x/telescope">Telescope</a></li>
                                                                                    <li><a href="/docs/8.x/valet">Valet</a></li>
                                                                                    <li><a href="https://vapor.laravel.com">Vapor</a></li>
                                                                            </ul>
                                </div>
                            </div>
                                            </div>
                    <div class="hidden sm:grid sm:grid-cols-2 sm:gap-x-4 sm:gap-y-8 md:w-1/2 lg:w-3/4 lg:grid-cols-4">
                                                    <div>
                                <span class="font-bold">Highlights</span>
                                <div class="mt-6">
                                    <ul class="space-y-3 text-gray-600 text-sm">
                                                                                    <li>
                                                <a href="/team" class="transition-colors hover:text-gray-700">Our Team</a>
                                            </li>
                                                                                    <li>
                                                <a href="/docs/8.x/releases" class="transition-colors hover:text-gray-700">Release Notes</a>
                                            </li>
                                                                                    <li>
                                                <a href="/docs/8.x/installation" class="transition-colors hover:text-gray-700">Getting Started</a>
                                            </li>
                                                                                    <li>
                                                <a href="/docs/8.x/routing" class="transition-colors hover:text-gray-700">Routing</a>
                                            </li>
                                                                                    <li>
                                                <a href="/docs/8.x/blade" class="transition-colors hover:text-gray-700">Blade Templates</a>
                                            </li>
                                                                                    <li>
                                                <a href="/docs/8.x/authentication" class="transition-colors hover:text-gray-700">Authentication</a>
                                            </li>
                                                                                    <li>
                                                <a href="/docs/8.x/authorization" class="transition-colors hover:text-gray-700">Authorization</a>
                                            </li>
                                                                                    <li>
                                                <a href="/docs/8.x/artisan" class="transition-colors hover:text-gray-700">Artisan Console</a>
                                            </li>
                                                                                    <li>
                                                <a href="/docs/8.x/database" class="transition-colors hover:text-gray-700">Database</a>
                                            </li>
                                                                                    <li>
                                                <a href="/docs/8.x/eloquent" class="transition-colors hover:text-gray-700">Eloquent ORM</a>
                                            </li>
                                                                                    <li>
                                                <a href="/docs/8.x/testing" class="transition-colors hover:text-gray-700">Testing</a>
                                            </li>
                                                                            </ul>
                                </div>
                            </div>
                                                    <div>
                                <span class="font-bold">Resources</span>
                                <div class="mt-6">
                                    <ul class="space-y-3 text-gray-600 text-sm">
                                                                                    <li>
                                                <a href="https://laracasts.com" class="transition-colors hover:text-gray-700">Laracasts</a>
                                            </li>
                                                                                    <li>
                                                <a href="https://laravel-news.com" class="transition-colors hover:text-gray-700">Laravel News</a>
                                            </li>
                                                                                    <li>
                                                <a href="https://laracon.us" class="transition-colors hover:text-gray-700">Laracon</a>
                                            </li>
                                                                                    <li>
                                                <a href="https://laracon.eu/" class="transition-colors hover:text-gray-700">Laracon EU</a>
                                            </li>
                                                                                    <li>
                                                <a href="https://larajobs.com" class="transition-colors hover:text-gray-700">Jobs</a>
                                            </li>
                                                                                    <li>
                                                <a href="https://certification.laravel.com/" class="transition-colors hover:text-gray-700">Certification</a>
                                            </li>
                                                                                    <li>
                                                <a href="https://laracasts.com/discuss" class="transition-colors hover:text-gray-700">Forums</a>
                                            </li>
                                                                            </ul>
                                </div>
                            </div>
                                                    <div>
                                <span class="font-bold">Partners</span>
                                <div class="mt-6">
                                    <ul class="space-y-3 text-gray-600 text-sm">
                                                                                    <li>
                                                <a href="https://vehikl.com" class="transition-colors hover:text-gray-700">Vehikl</a>
                                            </li>
                                                                                    <li>
                                                <a href="https://tighten.co" class="transition-colors hover:text-gray-700">Tighten</a>
                                            </li>
                                                                                    <li>
                                                <a href="https://64robots.com/" class="transition-colors hover:text-gray-700">64 Robots</a>
                                            </li>
                                                                                    <li>
                                                <a href="https://kirschbaumdevelopment.com/" class="transition-colors hover:text-gray-700">Kirschbaum</a>
                                            </li>
                                                                                    <li>
                                                <a href="https://www.curotec.com/services/technologies/laravel/" class="transition-colors hover:text-gray-700">Curotec</a>
                                            </li>
                                                                                    <li>
                                                <a href="https://jump24.co.uk/" class="transition-colors hover:text-gray-700">Jump24</a>
                                            </li>
                                                                                    <li>
                                                <a href="https://www.a2design.biz/" class="transition-colors hover:text-gray-700">A2 Design</a>
                                            </li>
                                                                                    <li>
                                                <a href="https://corporate.aboutyou.de/app/uploads/2019/08/INTRO-Pitch-I-AY-Tech.pdf?utm_source=laravelpartnersfindoutmore&amp;utm_medium=socialgroups&amp;utm_campaign=tech" class="transition-colors hover:text-gray-700">ABOUT YOU</a>
                                            </li>
                                                                                    <li>
                                                <a href="https://www.byte5.net/" class="transition-colors hover:text-gray-700">Byte 5</a>
                                            </li>
                                                                                    <li>
                                                <a href="https://cubettech.com/" class="transition-colors hover:text-gray-700">Cubet</a>
                                            </li>
                                                                                    <li>
                                                <a href="https://www.cyber-duck.co.uk/how-we-work/technology/laravel?utm_source=Laravel%20Partner&amp;utm_medium=Sponsorship" class="transition-colors hover:text-gray-700">Cyber-Duck</a>
                                            </li>
                                                                                    <li>
                                                <a href="https://devsquad.com/" class="transition-colors hover:text-gray-700">DevSquad</a>
                                            </li>
                                                                                    <li>
                                                <a href="https://www.ideil.com/" class="transition-colors hover:text-gray-700">Ideil</a>
                                            </li>
                                                                                    <li>
                                                <a href="https://romegadigital.com/" class="transition-colors hover:text-gray-700">Romega Software</a>
                                            </li>
                                                                                    <li>
                                                <a href="https://www.worksome.com/" class="transition-colors hover:text-gray-700">Worksome</a>
                                            </li>
                                                                            </ul>
                                </div>
                            </div>
                                                    <div>
                                <span class="font-bold">Ecosystem</span>
                                <div class="mt-6">
                                    <ul class="space-y-3 text-gray-600 text-sm">
                                                                                    <li>
                                                <a href="/docs/8.x/billing" class="transition-colors hover:text-gray-700">Cashier</a>
                                            </li>
                                                                                    <li>
                                                <a href="/docs/8.x/dusk" class="transition-colors hover:text-gray-700">Dusk</a>
                                            </li>
                                                                                    <li>
                                                <a href="/docs/8.x/broadcasting" class="transition-colors hover:text-gray-700">Echo</a>
                                            </li>
                                                                                    <li>
                                                <a href="https://envoyer.io" class="transition-colors hover:text-gray-700">Envoyer</a>
                                            </li>
                                                                                    <li>
                                                <a href="https://forge.laravel.com" class="transition-colors hover:text-gray-700">Forge</a>
                                            </li>
                                                                                    <li>
                                                <a href="/docs/8.x/homestead" class="transition-colors hover:text-gray-700">Homestead</a>
                                            </li>
                                                                                    <li>
                                                <a href="/docs/8.x/horizon" class="transition-colors hover:text-gray-700">Horizon</a>
                                            </li>
                                                                                    <li>
                                                <a href="https://lumen.laravel.com" class="transition-colors hover:text-gray-700">Lumen</a>
                                            </li>
                                                                                    <li>
                                                <a href="/docs/8.x/mix" class="transition-colors hover:text-gray-700">Mix</a>
                                            </li>
                                                                                    <li>
                                                <a href="https://nova.laravel.com" class="transition-colors hover:text-gray-700">Nova</a>
                                            </li>
                                                                                    <li>
                                                <a href="/docs/8.x/passport" class="transition-colors hover:text-gray-700">Passport</a>
                                            </li>
                                                                                    <li>
                                                <a href="/docs/8.x/scout" class="transition-colors hover:text-gray-700">Scout</a>
                                            </li>
                                                                                    <li>
                                                <a href="/docs/8.x/socialite" class="transition-colors hover:text-gray-700">Socialite</a>
                                            </li>
                                                                                    <li>
                                                <a href="https://spark.laravel.com" class="transition-colors hover:text-gray-700">Spark</a>
                                            </li>
                                                                                    <li>
                                                <a href="/docs/8.x/telescope" class="transition-colors hover:text-gray-700">Telescope</a>
                                            </li>
                                                                                    <li>
                                                <a href="/docs/8.x/valet" class="transition-colors hover:text-gray-700">Valet</a>
                                            </li>
                                                                                    <li>
                                                <a href="https://vapor.laravel.com" class="transition-colors hover:text-gray-700">Vapor</a>
                                            </li>
                                                                            </ul>
                                </div>
                            </div>
                                            </div>
                    <div class="mt-10 max-w-md md:mt-0 md:w-1/2 lg:w-1/4">
                        <p class="text-xs text-gray-600 sm:text-sm">Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in most web projects.</p>
                        <p class="mt-6 text-xs text-gray-600 text-opacity-75 sm:text-sm">
                            Laravel is a Trademark of Taylor Otwell.<br>Copyright &copy; 2011-2021 Laravel LLC.
                        </p>
                        <ul class="mt-6 flex items-center space-x-3">
                            <li>
                                <a href="https://twitter.com/laravelphp">
                                    <img class="w-6 h-6" src="/img/social/twitter.min.svg" alt="Twitter">
                                </a>
                            </li>
                            <li>
                                <a href="https://github.com/laravel">
                                    <img class="w-6 h-6" src="/img/social/github.min.svg" alt="GitHub">
                                </a>
                            </li>
                            <li>
                                <a href="https://discord.gg/mPZNm7A">
                                    <img class="w-6 h-6" src="/img/social/discord.min.svg" alt="Discord">
                                </a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/laravelphp">
                                    <img class="w-6 h-6" src="/img/social/youtube.min.svg" alt="YouTube">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center py-6">
            <a href="/" class="logomark">
                <img class="w-9 h-9" src="/img/logomark.min.svg" alt="Laravel">
            </a>
        </div>
    </div>
</footer> -->

<footer>
        <p>Copyright By &copy; Flores Dev Team 2021  All Rights Reserved.</p>
</footer>

<style>
    footer {
    background: #1A1E25;
    color: #868c96;
}

footer p {
    padding: 40px 0;
    text-align: center;
}

footer img {
    width: 44px;
}
</style>

<script src="{{ URL::asset('assets/js/app.js') }}"></script>
<script>
    function cpy(containerid) {
  if (document.selection) {
    var range = document.body.createTextRange();
    range.moveToElementText(document.getElementById(containerid));
    range.select().createTextRange();
    document.execCommand("copy");
  } else if (window.getSelection) {
    var range = document.createRange();
    range.selectNode(document.getElementById(containerid));
    window.getSelection().addRange(range);
    document.execCommand("copy");
    alert("Text has been copied, now paste in the text-area")
}
</script>

</body>
</html>
