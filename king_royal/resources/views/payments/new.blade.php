@extends('../layouts.app')
@section('content')
<div class="container">
    <h2 class="text-center">New Payment</h2>
    <form action="/payments" method="POST">
        @csrf

        <div class="form-group">
            <label for="user_email" class="mb-2 mr-sm-2">User Email id:</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="user_email" placeholder="Enter email id" name="user_email" autofocus>
        </div>
        <div class="form-group">
            <label for="payment_for" class="mb-2 mr-sm-2">Payment for:</label>
            <input type="text" class="form-control mb-2 mr-sm-2" id="payment_for" placeholder="Enter reason for payment" name="payment_for">
        </div>
        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" class="form-control" id="amount" placeholder="Enter the amount" name="amount">
        </div>
        <div class="form-group">
            <label for="payment_mode">Mode Of Payment:</label>
            <select type="text" class="form-control" id="payment_mode" name="payment_mode">
                <option value="">Select Mode of Payment</option>
                <option value="Cash">Cash</option>
                <option value="Cheque">Cheque</option>
                <option value="Online Payment">Online Payment</option>
            </select>
        </div>
        <div class="form-group">
            <label for="payment_status">Payment Status:</label>
            <select type="text" class="form-control" id="payment_status" name="payment_status">
                <option value="Pending">Pending</option>
                <option value="Confirmed">Confirmed</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection