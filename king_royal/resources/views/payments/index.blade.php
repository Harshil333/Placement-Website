@extends('../layouts.app')
@section('content')
    <div class="container">
    @if (count($payments)>0)
        @foreach ($payments as $payment)
            <div class="row">
                <div class="col-md-10">
                    <h3>{{$payment->user_email}}</h3>
                    <p>{{$payment->amount}}</p>
                </div>
                <div class="col-md-2">
                    @if ($payment->payment_status==0)
                        <form action="{{url('/payments/'.$payment->id.'/confirm_payment')}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <button class="btn btn-warning" type="submit">Confirm Payment</button>
                        </form>
                    @else
                        <button class="btn btn-success">Confirmed Payment</button>
                    @endif
                </div>
            </div>
        @endforeach
    @else
        <h3>No payments available!</h3>
    @endif  
    </div>
@endsection