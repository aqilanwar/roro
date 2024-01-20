<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class StatsSales extends ChartWidget
{
    protected static ?string $heading = 'Total Sales';
    protected int | string | array $columnSpan = 'full';
    protected static ?string $maxHeight = '300px';

    public ?string $filter = 'today';



    protected function getData(): array
    {
        $activeFilter = $this->filter;

        return [
            'datasets' => [
                [
                    'label' => 'Sales',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Today',
            'week' => 'Last week',
            'month' => 'Last month',
            'year' => 'This year',
        ];
    }
}
