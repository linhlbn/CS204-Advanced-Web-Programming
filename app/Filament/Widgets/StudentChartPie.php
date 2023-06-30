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
            'rgba(255, 179, 186, 0.9)', 'rgba(255, 209, 220, 0.9)', 
            'rgba(255, 229, 217, 0.9)', 'rgba(255, 253, 230, 0.9)', 
            'rgba(230, 255, 238, 0.9)', 'rgba(207, 247, 246, 0.9)', 
            'rgba(207, 226, 243, 0.9)', 'rgba(224, 210, 233, 0.9)', 
            'rgba(235, 214, 255, 0.9)', 'rgba(255, 218, 242, 0.9)', 
            'rgba(255, 227, 215, 0.9)', 'rgba(245, 245, 245, 0.9)'
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
        foreach ($studentsByDepartment as $departmentId => $count) {
            $departmentName = Department::find($departmentId)->name; 
            $labels[] = $departmentName;
            $data[] = $count;
            $backgroundColor[] = $colors[$departmentId % count($colors)];  // Cycle colors
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'data' => $data,
                    'backgroundColor' => $backgroundColor,
                ],
            ],
        ];
    }
}
