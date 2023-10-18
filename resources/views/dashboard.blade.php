@foreach($users as $user)
    <h1> {{$user['name']}} </h1>
    <h1> {{$user['age']}} </h1>
    <hr>
@endforeach