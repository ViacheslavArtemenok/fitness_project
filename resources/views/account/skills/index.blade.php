
@extends('layouts.account')
@section('content')

    <h2>Навыки и умения</h2>
    @include('inc.message')
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>location</th>
                <th>education</th>
                <th>experience</th>
                <th>achievements</th>
                <th>skills_list</th>
                <th>description</th>
            </tr>
            </thead>
            <tbody>
            @if($skill===null)
                <tr>
                    <td colspan="6"><a class="btn btn-primary" href="{{ route('account.skills.create', ['skill'=> Auth::user()->id]) }}">Заполните навыки</a></td>
                </tr>
            @else
                <tr>
                    <td>{{ $skill->location }}</td>
                    <td>{{ $skill->education }}</td>
                    <td>{{ $skill->experience }}</td>
                    <td>{{ $skill->achievements }}</td>
                    <td>{{ $skill->skills_list }}</td>
                    <td>{{ $skill->description }}</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection
