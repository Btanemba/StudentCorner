@extends(backpack_view('blank'))

@php
    use App\Models\BookingTable;
    use App\Models\Client;
    use App\Models\UniversityApplication;
    use App\Models\University;

    // Get totals
    $totalBookings      = BookingTable::count();
    $totalClients       = Client::count();
    $totalApplications  = UniversityApplication::count();
    $totalUniversities  = University::count();

    $widgets['before_content'][] = [
        'type'    => 'div',
        'class'   => 'row',
        'content' => [
            [
                'type' => 'card',
                'wrapper' => ['class' => 'col-sm-6 col-md-3'],
                'class' => 'card bg-info text-white',
                'content' => [
                    'header' => 'Total Bookings',
                    'body'   => '<h1 class="text-center">'.$totalBookings.'</h1>',
                ]
            ],
            [
                'type' => 'card',
                'wrapper' => ['class' => 'col-sm-6 col-md-3'],
                'class' => 'card bg-success text-white',
                'content' => [
                    'header' => 'Total Clients',
                    'body'   => '<h1 class="text-center">'.$totalClients.'</h1>',
                ]
            ],
            [
                'type' => 'card',
                'wrapper' => ['class' => 'col-sm-6 col-md-3'],
                'class' => 'card bg-warning text-dark',
                'content' => [
                    'header' => 'Total University Applications',
                    'body'   => '<h1 class="text-center">'.$totalApplications.'</h1>',
                ]
            ],
            [
                'type' => 'card',
                'wrapper' => ['class' => 'col-sm-6 col-md-3'],
                'class' => 'card bg-primary text-white',
                'content' => [
                    'header' => 'Total Universities',
                    'body'   => '<h1 class="text-center">'.$totalUniversities.'</h1>',
                ]
            ],
        ]
    ];
@endphp

@section('content')
@endsection
