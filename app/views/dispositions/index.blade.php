@extends("layout")
@section("content")

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('dispositions') }}">Disposition</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('dispositions') }}">View All Dispositions</a></li>
        <li><a href="{{ URL::to('dispositions/create') }}">Create a Disposition</a>
    </ul>
</nav>

<h1>All the Dispositions</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($dispositions as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the disposition (uses the destroy method DESTROY /dispositions/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->
                {{ Form::open(array('url' => 'dispositions/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this Disposition', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
                <!-- show the disposition (uses the show method found at GET /dispositions/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('dispositions/' . $value->id) }}">Show this Disposition</a>

                <!-- edit this disposition (uses the edit method found at GET /dispositions/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('dispositions/' . $value->id . '/edit') }}">Edit this Disposition</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@stop
