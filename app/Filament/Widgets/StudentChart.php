<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Student;
use Filament\Widgets\BarChartWidget;

class StudentChart extends BarChartWidget
{
    public function __construct()
    {
        self::$heading = 'Students joined University this year - '.date('Y');
    }

    // protected static ?string $heading = 'Student Join University this year';

    protected function getData(): array
    {
        // Define an array of pastel colors
        $colors = [
            'rgba(255, 179, 186, 0.9)', 'rgba(255, 209, 220, 0.9)', 
            'rgba(255, 229, 217, 0.9)', 'rgba(255, 253, 230, 0.9)', 
            'rgba(230, 255, 238, 0.9)', 'rgba(207, 247, 246, 0.9)', 
            'rgba(207, 226, 243, 0.9)', 'rgba(224, 210, 233, 0.9)', 
            'rgba(235, 214, 255, 0.9)', 'rgba(255, 218, 242, 0.9)', 
            'rgba(255, 227, 215, 0.9)', 'rgba(245, 245, 245, 0.9)'
        ];

        $currentYearJanuary = Carbon::now()->month(1)->startOfMonth();
        $currentYearDecember = Carbon::now()->month(12)->endOfMonth();

        $students = Student::select('date_entranced')
            ->whereBetween('date_entranced', [$currentYearJanuary, $currentYearDecember])
            ->get()
            ->groupBy(function($students) {
                return Carbon::parse($students->date_entranced)->format('n'); // Group by month number
            })
            ->sortKeys(); // Sort by month number

        $datasets = [];
        foreach ($students as $monthNumber => $value) {
            $monthName = date('F', mktime(0, 0, 0, $monthNumber, 10)); // Convert month number to month name
            $colorIndex = ($monthNumber % count($colors)) - 1; // Cycle colors
            $datasets[] = [
                'label' => $monthName,
                'data' => [$value->count()],
                'backgroundColor' => $colors[$colorIndex],
                'borderColor' => str_replace('0.5', '1', $colors[$colorIndex]), // use the same color but not transparent
                'borderWidth' => 1,
            ];
        }

        return [
            'datasets' => $datasets,
            'labels' => ['Students Joined'],
        ];
    }
}
