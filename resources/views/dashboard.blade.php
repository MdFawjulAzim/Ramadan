@extends('layouts.app')

@section('title', 'Dashboard - Ramadan Tracker')

@section('content')
<div class="min-h-screen py-6 px-4 sm:px-6 lg:px-8" x-data="{ lang: localStorage.getItem('lang') || 'en' }" x-init="$watch('lang', val => localStorage.setItem('lang', val))">
    <!-- Header -->
    <header class="max-w-7xl mx-auto mb-8">
        <div class="glass rounded-2xl   p-4 sm:p-6 flex flex-col sm:flex-row items-center justify-between gap-4 border border-orange-100">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-primary-500 to-amber-400 flex items-center justify-center text-white text-xl font-bold  ">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">
                        <span x-show="lang === 'en'">Assalamu Alaikum, <span class="text-primary-600">{{ auth()->user()->name }}</span>! 🌙</span>
                        <span x-show="lang === 'bn'" x-cloak>আসসালামু আলাইকুম, <span class="text-primary-600">{{ auth()->user()->name }}</span>! 🌙</span>
                    </h2>
                    <p class="text-sm text-gray-500">
                        <span x-show="lang === 'en'">Your Ramadan Tracker</span>
                        <span x-show="lang === 'bn'" x-cloak>আপনার রমাদান ট্র্যাকার</span>
                    </p>
                </div>
            </div>
            
            <div class="flex items-center gap-4">
                <h1 class="title-script text-4xl sm:text-5xl text-primary-600 ">
                    Ramadan Tracker
                </h1>
                
                <!-- Language Switcher -->
                <div class="flex items-center gap-1 bg-gray-100 rounded-xl p-1">
                    <button 
                        @click="lang = 'en'"
                        :class="lang === 'en' ? 'bg-white shadow-sm text-primary-600' : 'text-gray-500 hover:text-primary-600'"
                        class="px-3 py-1.5 rounded-lg text-sm font-medium transition-all duration-200"
                    >
                        EN
                    </button>
                    <button 
                        @click="lang = 'bn'"
                        :class="lang === 'bn' ? 'bg-white shadow-sm text-primary-600' : 'text-gray-500 hover:text-primary-600'"
                        class="px-3 py-1.5 rounded-lg text-sm font-medium transition-all duration-200"
                    >
                        বাং
                    </button>
                </div>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-100 hover:bg-red-100 text-gray-600 hover:text-red-600 transition-all duration-200 font-medium">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span class="hidden sm:inline" x-show="lang === 'en'">Logout</span>
                        <span class="hidden sm:inline" x-show="lang === 'bn'" x-cloak>লগআউট</span>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Tracker -->
    <main class="max-w-7xl mx-auto">
        @livewire('ramadan-tracker')
    </main>
    
    <!-- Footer -->
    <footer class="max-w-7xl mx-auto mt-8 text-center text-gray-400 text-sm">
        <p x-show="lang === 'en'">Ramadan Mubarak! May Allah accept all your prayers. 🤲</p>
        <p x-show="lang === 'bn'" x-cloak>রমাদান মোবারক! আল্লাহ আপনার সকল ইবাদত কবুল করুন। 🤲</p>
    </footer>
</div>

<style>
    [x-cloak] { display: none !important; }
</style>
@endsection
