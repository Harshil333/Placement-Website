@extends('layouts.app')

@section('content')
    <div class="container">
        <div class='img-responsive'>
            <img src="https://m.aussizzgroup.com/uploadedfiles/BL_27_03062017191904.png" alt="">
        </div>
        <h2>Settle Abroad With your family</h2>
        <hr>
        <div>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis ullam explicabo asperiores incidunt a odio saepe 
                recusandae perspiciatis corporis itaque odit nostrum similique, delectus quia, ipsa iure sed? Non, labore.
                ipisicing elit. Omnis ullam explicabo asperiores incidunt a odio saepe 
                recusandae perspiciatis corporis itaque odit nostrum similique, delectus quia, ipsa iure sed? Non, labore.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis ullam explicabo asperiores incidunt a odio saepe 
                recusandae perspiciatis corporis itaque odit nostrum similique, delectus quia, ipsa iure sed? Non, labore.
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis ullam explicabo asperiores incidunt a odio saepe 
                recusandae perspiciatis corporis itaque odit nostrum similique, delectus quia, ipsa iure sed? Non, labore.
            </p>
        </div>
        <h2 style='margin-top:50px;'>Why Migrate Abroad?</h2>
        <hr>
        <div>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis ullam explicabo asperiores incidunt a odio saepe 
                recusandae perspiciatis corporis itaque odit nostrum similique, delectus quia, ipsa iure sed? Non, labore.
                ipisicing elit. Omnis ullam explicabo asperiores incidunt a odio saepe 
                recusandae perspiciatis corporis itaque odit nostrum similique, delectus quia, ipsa iure sed? Non, labore.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis ullam explicabo asperiores incidunt a odio saepe 
                recusandae perspiciatis corporis itaque odit nostrum similique, delectus quia, ipsa iure sed? Non, labore.
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis ullam explicabo asperiores incidunt a odio saepe 
                recusandae perspiciatis corporis itaque odit nostrum similique, delectus quia, ipsa iure sed? Non, labore.
            </p>
        </div>
        <h2>Countries</h2>
        <p>A list of 6 countries</p>
        <h2>Wish to Know More?</h2>
        <form action="{{ url('sendemail/send') }}" method='POST'>
            {{ csrf_field() }}
            <input type="submit" value="Send an email">
        </form>
    </div>
@endsection