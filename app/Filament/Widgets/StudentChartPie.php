<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use App\Models\Department;
use Filament\Widgets\PieChartWidget;

class StudentChartPie extends PieChartWidget
{
    protected static ?string $heading = 'Students by Department';

    protected function getData(): array
    {
        // Define an array of pastel colors
        $colors = [
            'rgba(238, 136, 138, 0.9)',  // Light pink
            'rgba(237, 161, 177, 0.9)',  // Light coral
            'rgba(243, 183, 154, 0.9)',  // Light apricot
            'rgba(250, 207, 155, 0.9)',  // Light peach
            'rgba(223, 230, 193, 0.9)',  // Light pistachio
            'rgba(192, 233, 229, 0.9)',  // Light aqua
            'rgba(182, 199, 230, 0.9)',  // Light lavender
            'rgba(213, 183, 221, 0.9)',  // Light mauve
            'rgba(234, 189, 242, 0.9)',  // Light lavender blush
            'rgba(248, 187, 225, 0.9)',  // Light orchid pink
            'rgba(255, 212, 199, 0.9)',  // Light salmon
            'rgba(232, 232, 232, 0.9)',  // Light gray
        ];

        $studentsByDepartment = Student::select('department_id')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('department_id')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item['department_id'] => $item['count']];
            });

        // Prepare the data for the pie chart
        $labels = [];
        $data = [];
        $backgroundColor = [];
        $hoverBackgroundColor = [];
        foreach ($studentsByDepartment as $departmentId => $count) {
            $departmentName = Department::find($departmentId)->name; 
            $labels[] = $departmentName;
            $data[] = $count;
            $color = $colors[$departmentId % count($colors)];  // Cycle colors
            $backgroundColor[] = $color;
            $hoverBackgroundColor[] = str_replace('0.9', '0.7', $color); // lighter color on hover
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'data' => $data,
                    'backgroundColor' => $backgroundColor,
                    'hoverBackgroundColor' => $hoverBackgroundColor, // added attribute
                    'borderColor' => '#fff', // white border
                    'borderWidth' => 2, // border width
                ],
            ],
        ];
    }
}
