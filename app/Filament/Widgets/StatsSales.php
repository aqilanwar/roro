<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\{Bin,Booking};
use Carbon\Carbon;

class StatsSales extends ChartWidget
{
    protected static ?string $heading = 'Total Booking by Bin';
    protected int | string | array $columnSpan = 'full';
    protected static ?string $maxHeight = '300px';

    public ?string $filter = '1';



    protected function getData(): array
    {

        $activeFilter = $this->filter;

        $data = Booking::with(['booking_bin' => function ($query) use($activeFilter) {

            $query->where('bin_id', $activeFilter);
        }])
        ->where('payment_status', 'Paid')
        ->get();
        $jan = $feb = $mar = $apr = $may = $jun = $jul = $aug = $sep = $oct = $nov = $dec = 0;

        foreach ($data as $booking) {
            // Check if the booking has a related booking_bin
            if ($booking->relationLoaded('booking_bin') && $booking->booking_bin) {
                // Loop through each booking_bin
                foreach ($booking->booking_bin as $book) {
                    // Accumulate the quantity based on the booking_date month
                    $bookingDate = Carbon::parse($booking->booking_date);
                    switch ($bookingDate->month) {
                        case 1:
                            $jan += $book->quantity;
                            break;
                        case 2:
                            $feb += $book->quantity;
                            break;
                        case 3:
                            $mar += $book->quantity;
                            break;
                        case 4:
                            $apr += $book->quantity;
                            break;
                        case 5:
                            $may += $book->quantity;
                            break;
                        case 6:
                            $jun += $book->quantity;
                            break;
                        case 7:
                            $jul += $book->quantity;
                            break;
                        case 8:
                            $aug += $book->quantity;
                            break;
                        case 9:
                            $sep += $book->quantity;
                            break;
                        case 10:
                            $oct += $book->quantity;
                            break;
                        case 11:
                            $nov += $book->quantity;
                            break;
                        case 12:
                            $dec += $book->quantity;
                            break;
                    }
                }
            }
        }

        // dd($data);
        return [
            'datasets' => [
                [
                    'label' => 'Bin booked',
                    'data' => [$jan, $feb, $mar, $apr, $may, $jun, $jul, $aug, $sep, $oct, $nov, $dec],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getFilters(): ?array
    {
        $bins = Bin::all();

        $data = [];

        foreach($bins as $bin){
            $data[$bin->id] = $bin->bin_name;
        }

        return $data;
    }
}
