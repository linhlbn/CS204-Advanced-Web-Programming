<?php

namespace App\Filament\Resources\StudentResource\Widgets;

use App\Models\Country;
use App\Models\Student;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StudentStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $vn = Country::where('country_code', 'VN')->withCount('students')->first();
        $nz = Country::where('country_code', 'NZ')->withCount('students')->first();
        
        return [
            //
            
            Card::make('All Student', Student::all()->count()),
            Card::make('Vietnam Students', $vn ? $vn->students_count : 0),
            Card::make('New Zealand Students', $nz ? $nz->students_count : 0),

        ];
    }
}
