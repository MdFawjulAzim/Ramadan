@extends('layouts.app')

@section('title', 'Login - Ramadan Tracker')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
        <!-- Logo/Header -->
        <div class="text-center mb-10">
            <div class="relative inline-block">
                <div class="absolute -inset-4 bg-gradient-to-r from-orange-400 to-amber-300 rounded-full blur-xl opacity-40 animate-pulse"></div>
                <h1 class="relative title-script text-6xl md:text-7xl text-primary-600 drop- ">
                    Ramadan Tracker
                </h1>
            </div>
            <p class="mt-4 text-gray-600 text-lg">
                🌙 আপনার রমাদানের ইবাদত ট্র্যাক করুন
            </p>
        </div>

        <!-- Login Card -->
        <div class="glass rounded-3xl p-8 space-y-8 border border-orange-100">
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-800">
                    স্বাগতম! 🕌
                </h2>
                <p class="mt-2 text-gray-500">
                    আপনার নাম ও ফোন নম্বর দিয়ে শুরু করুন
                </p>
            </div>
            
            <form method="POST" action="{{ url('/login') }}" class="space-y-6">
                @csrf
                
                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            আপনার নাম
                        </span>
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        required
                        placeholder="যেমন: ফাওজুল"
                        class="w-full px-5 py-4 rounded-2xl border-2 border-orange-200 focus:border-primary-500 focus:ring-4 focus:ring-primary-100 transition-all duration-200 text-gray-700 placeholder-gray-400 text-lg"
                    >
                    @error('name')
                        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone Field -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            ফোন নম্বর
                        </span>
                    </label>
                    <input 
                        type="tel" 
                        id="phone" 
                        name="phone" 
                        required
                        placeholder="01XXXXXXXXX"
                        class="w-full px-5 py-4 rounded-2xl border-2 border-orange-200 focus:border-primary-500 focus:ring-4 focus:ring-primary-100 transition-all duration-200 text-gray-700 placeholder-gray-400 text-lg"
                    >
                    @error('phone')
                        <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full py-4 px-6 rounded-2xl bg-gradient-to-r from-primary-500 to-amber-500 hover:from-primary-600 hover:to-amber-600 text-white font-semibold text-lg transform hover:-translate-y-1 transition-all duration-200"
                >
                    <span class="flex items-center justify-center gap-3">
                        শুরু করুন
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </span>
                </button>
            </form>
            
            <p class="text-center text-sm text-gray-500">
                নতুন ব্যবহারকারী? স্বয়ংক্রিয়ভাবে অ্যাকাউন্ট তৈরি হবে! ✨
            </p>
        </div>
        
        <!-- Footer -->
        <p class="text-center text-gray-400 text-sm mt-8">
            রমাদান মোবারক! 🌟
        </p>
    </div>
</div>
@endsection
