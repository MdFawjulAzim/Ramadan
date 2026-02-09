<div class="space-y-4" wire:poll.keep-alive>
    <!-- Legend/Guide -->
    <div class="glass rounded-2xl   p-4 border border-orange-100">
        <div class="flex flex-wrap items-center justify-center gap-4 text-sm">
            <div class="flex items-center gap-2">
                <span class="font-semibold text-gray-700">নামাজ:</span>
                <span class="px-2 py-1 rounded-full bg-primary-100 text-primary-700 text-xs font-medium">F = ফজর</span>
                <span class="px-2 py-1 rounded-full bg-primary-100 text-primary-700 text-xs font-medium">Z = যোহর</span>
                <span class="px-2 py-1 rounded-full bg-primary-100 text-primary-700 text-xs font-medium">A = আসর</span>
                <span class="px-2 py-1 rounded-full bg-primary-100 text-primary-700 text-xs font-medium">M = মাগরিব</span>
                <span class="px-2 py-1 rounded-full bg-primary-100 text-primary-700 text-xs font-medium">E = এশা</span>
                <span class="px-2 py-1 rounded-full bg-primary-100 text-primary-700 text-xs font-medium">T = তারাবীহ</span>
            </div>
        </div>
    </div>

    <!-- Tracker Grid -->
    <div class="glass rounded-2xl   border border-orange-100 overflow-hidden">
        <!-- Table Header -->
        <div class="hidden md:grid grid-cols-12 gap-2 p-4 bg-gradient-to-r from-primary-500 to-amber-500 text-white font-semibold text-sm">
            <div class="col-span-1 text-center">দিন</div>
            <div class="col-span-3 text-center">নামাজ (F Z A M E T)</div>
            <div class="col-span-2 text-center">কুরআন তিলাওয়াত</div>
            <div class="col-span-6 text-center">ভালো অভ্যাস</div>
        </div>
        
        <!-- Days Loop -->
        <div class="divide-y divide-orange-100">
            @for($day = 1; $day <= 30; $day++)
                @php
                    $entry = $entries[$day] ?? null;
                @endphp
                <div class="grid grid-cols-1 md:grid-cols-12 gap-3 md:gap-2 p-4 hover:bg-orange-50/50 transition-colors duration-200 {{ $day % 2 == 0 ? 'bg-white' : 'bg-orange-50/30' }}">
                    
                    <!-- Day Number -->
                    <div class="md:col-span-1 flex items-center justify-center md:justify-center">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary-500 to-amber-400 flex items-center justify-center text-white font-bold text-sm shadow-md">
                            {{ $day }}
                        </div>
                    </div>
                    
                    <!-- Prayers (6 circular checkboxes) -->
                    <div class="md:col-span-3 flex items-center justify-center gap-2">
                        @foreach(['fajr' => 'F', 'zuhr' => 'Z', 'asr' => 'A', 'maghrib' => 'M', 'esha' => 'E', 'taraweeh' => 'T'] as $prayer => $label)
                            <button 
                                wire:click="togglePrayer({{ $day }}, '{{ $prayer }}')"
                                class="prayer-check w-9 h-9 rounded-full flex items-center justify-center text-xs font-bold border-2 cursor-pointer  
                                    {{ ($entry[$prayer] ?? false) 
                                        ? 'bg-gradient-to-br from-primary-500 to-amber-400 border-primary-500 text-white' 
                                        : 'bg-white border-gray-300 text-gray-400 hover:border-primary-400 hover:text-primary-500' 
                                    }}"
                                title="{{ ucfirst($prayer) }}"
                            >
                                @if($entry[$prayer] ?? false)
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                @else
                                    {{ $label }}
                                @endif
                            </button>
                        @endforeach
                    </div>
                    
                    <!-- Quran Tilawat -->
                    <div class="md:col-span-2 flex items-center justify-center">
                        <input 
                            type="text" 
                            wire:blur="updateQuran({{ $day }}, $event.target.value)"
                            value="{{ $entry['quran_tilawat'] ?? '' }}"
                            placeholder="জুয/সূরা"
                            class="w-full px-3 py-2 rounded-full border-2 border-gray-200 focus:border-primary-400 focus:ring-2 focus:ring-primary-100 text-sm text-center text-gray-700 placeholder-gray-400 transition-all duration-200"
                        >
                    </div>
                    
                    <!-- Habits (5 pill toggles) -->
                    <div class="md:col-span-6 flex items-center justify-center gap-2 flex-wrap">
                        @foreach(['hadith' => 'হাদিস', 'sadka' => 'সদকা', 'durood' => 'দুরুদ', 'istigfaar' => 'ইস্তিগফার', 'dua' => 'দুআ'] as $habit => $label)
                            <button 
                                wire:click="toggleHabit({{ $day }}, '{{ $habit }}')"
                                class="habit-pill px-3 py-1.5 rounded-full text-xs font-medium border-2 cursor-pointer transition-all duration-200  
                                    {{ ($entry[$habit] ?? false) 
                                        ? 'bg-green-100 border-green-500 text-green-700' 
                                        : 'bg-white border-gray-300 text-gray-500 hover:border-green-400 hover:text-green-600' 
                                    }}"
                            >
                                @if($entry[$habit] ?? false)
                                    <span class="flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        {{ $label }}
                                    </span>
                                @else
                                    {{ $label }}
                                @endif
                            </button>
                        @endforeach
                    </div>
                </div>
            @endfor
        </div>
    </div>
    
    <!-- Quick Stats -->
    <div class="glass rounded-2xl   p-6 border border-orange-100">
        <h3 class="text-lg font-semibold text-gray-700 mb-4 text-center">📊 আপনার অগ্রগতি</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @php
                $totalFajr = collect($entries)->sum('fajr');
                $totalTaraweeh = collect($entries)->sum('taraweeh');
                $totalSadka = collect($entries)->sum('sadka');
                $totalDua = collect($entries)->sum('dua');
            @endphp
            <div class="bg-gradient-to-br from-primary-100 to-amber-100 rounded-xl p-4 text-center">
                <div class="text-3xl font-bold text-primary-600">{{ $totalFajr }}</div>
                <div class="text-sm text-gray-600">ফজর নামাজ</div>
            </div>
            <div class="bg-gradient-to-br from-purple-100 to-pink-100 rounded-xl p-4 text-center">
                <div class="text-3xl font-bold text-purple-600">{{ $totalTaraweeh }}</div>
                <div class="text-sm text-gray-600">তারাবীহ</div>
            </div>
            <div class="bg-gradient-to-br from-green-100 to-emerald-100 rounded-xl p-4 text-center">
                <div class="text-3xl font-bold text-green-600">{{ $totalSadka }}</div>
                <div class="text-sm text-gray-600">সদকা</div>
            </div>
            <div class="bg-gradient-to-br from-blue-100 to-cyan-100 rounded-xl p-4 text-center">
                <div class="text-3xl font-bold text-blue-600">{{ $totalDua }}</div>
                <div class="text-sm text-gray-600">দুআ</div>
            </div>
        </div>
    </div>
</div>
