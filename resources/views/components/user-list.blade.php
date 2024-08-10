@props(['users'])
<h3 class="my-3 text-center text-info">Register Users</h3>
<table class="table text-center">
    <thead>
        <tr>
            <th scope="col">Username</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>         
        </tr>
    </thead>
    <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->username}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
            </tr>
            @endforeach 
            {{$users->links()}}   
        </tbody>   
</table>