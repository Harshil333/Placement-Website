@extends('../layouts.app')
@section('content')
<div class="container">
    <form action="{{url('/candidates/search')}}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <input class="col-md-10 form-control" type="text" placeholder="Enter the candidate's email id" name="queryString">
            <button class="col-md-2 btn btn-success my-2 my-sm-0" type="submit">Search</button>
        </div>
    </form>
    @if($candidate!=null)
        @if (count($docs)>0)
            @foreach ($docs as $doc)
                <div class="row">
                    <div class="card">
                        <div class="col-md-9">Document: {{$doc->document}}</div>
                        @if ($doc->verified==0)
                            <div class="col-md-3">
                                <form action="{{url('/verified/'.$doc->id)}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}
                                    <button class="btn btn-success">Verify</button>
                                </form>
                            </div>
                        @else
                        <button class="btn btn-success">Verified</button>
                        @endif
                    </div>
                </div>
            @endforeach
            {{-- @if ($no_of_docs==count($docs))
                <button class="btn btn-success">Print Call Letter</button>
            @endif --}}
        @else
            <h3>No documents posted by the candidate!</h3>
        @endif
    @else
        <h2>No candidate present!</h2>
    @endif
</div>
@endsection