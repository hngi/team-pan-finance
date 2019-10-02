@if(!is_null($diff))
    @if($diff > 0)
        <h5 class="text-warning">You have spent {{ number_format($diff, 2) }}% more this {{ $duration }}, compared with last {{ $duration }}</h5>
    @else
        <h5 class="text-success">You have spent {{ number_format(abs($diff), 2 ) }}% less this {{ $duration }}, compared with last {{ $duration }}</h5>
    @endif
@else
<h5 class="text-info">You have not saved any expense record with us for the previous {{ $duration }}, otherwise we would have shown a comparison of your spending.</h5>
@endif
