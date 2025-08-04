@extends(backpack_view('blank'))

@php
    // Get total number of bookings
    $totalBookings = \App\Models\BookingTable::count();

    // Add booking stats widget
    $widgets['before_content'][] = [
        'type'    => 'div',
        'class'   => 'row',
        'content' => [
            [
                'type' => 'card',
                'wrapper' => ['class' => 'col-sm-6 col-md-4'],
                'class' => 'card bg-info text-white',
                'content' => [
                    'header' => 'Total Bookings',
                    'body'   => '<h1 class="text-center">'.$totalBookings.'</h1>',
                ]
            ],
            // Add more widgets here if needed
        ]
    ];

    // Remove the default welcome message completely
    // No need to add the jumbotron or getting started widgets
@endphp

@section('content')
@endsection