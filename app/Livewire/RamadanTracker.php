<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TrackerEntry;
use Illuminate\Support\Facades\Auth;

class RamadanTracker extends Component
{
    public $entries = [];

    public function mount()
    {
        $this->loadEntries();
    }

    /**
     * Load or create 30 days of tracker entries for the current user.
     */
    public function loadEntries()
    {
        $user = Auth::user();
        
        // Ensure all 30 days exist
        for ($day = 1; $day <= 30; $day++) {
            TrackerEntry::firstOrCreate(
                ['user_id' => $user->id, 'day' => $day],
                [
                    'fajr' => false,
                    'zuhr' => false,
                    'asr' => false,
                    'maghrib' => false,
                    'esha' => false,
                    'taraweeh' => false,
                    'quran_tilawat' => '',
                    'hadith' => false,
                    'sadka' => false,
                    'durood' => false,
                    'istigfaar' => false,
                    'dua' => false,
                ]
            );
        }

        // Load all entries
        $this->entries = TrackerEntry::where('user_id', $user->id)
            ->orderBy('day')
            ->get()
            ->keyBy('day')
            ->toArray();
    }

    /**
     * Toggle a prayer checkbox (fajr, zuhr, asr, maghrib, esha, taraweeh).
     */
    public function togglePrayer($day, $prayer)
    {
        $user = Auth::user();
        $entry = TrackerEntry::where('user_id', $user->id)
            ->where('day', $day)
            ->first();

        if ($entry) {
            $entry->$prayer = !$entry->$prayer;
            $entry->save();
            $this->entries[$day][$prayer] = $entry->$prayer;
        }
    }

    /**
     * Toggle a habit pill (hadith, sadka, durood, istigfaar, dua).
     */
    public function toggleHabit($day, $habit)
    {
        $user = Auth::user();
        $entry = TrackerEntry::where('user_id', $user->id)
            ->where('day', $day)
            ->first();

        if ($entry) {
            $entry->$habit = !$entry->$habit;
            $entry->save();
            $this->entries[$day][$habit] = $entry->$habit;
        }
    }

    /**
     * Update Quran tilawat text (called on blur).
     */
    public function updateQuran($day, $value)
    {
        $user = Auth::user();
        $entry = TrackerEntry::where('user_id', $user->id)
            ->where('day', $day)
            ->first();

        if ($entry) {
            $entry->quran_tilawat = $value;
            $entry->save();
            $this->entries[$day]['quran_tilawat'] = $value;
        }
    }

    public function render()
    {
        return view('livewire.ramadan-tracker');
    }
}
