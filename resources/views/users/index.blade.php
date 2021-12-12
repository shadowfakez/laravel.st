@if(session()->get('success'))
    {{ session()->get('success') }}
@endif

<table class="min-w-full leading-normal">
    <thead>
    <tr>
        <th>
            ID
        </th>
        <th>
            Name
        </th>
        <th>
            Email
        </th>
        <th>
            Delete
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>
                <p>
                    {{ $user->id }}
                </p>
            </td>
            <td>
                <p>
                    {{ $user->name }}
                </p>
            </td>
            <td>
                <p>
                    {{ $user->email }}
                </p>
            </td>
            <td>
                 <form action="{{ route('users.delete', $user->id) }}" method="POST">
                     @csrf
                     @method('DELETE')
                     <button type="submit" onclick="return confirm('Подтвердите удаление')">
                         delete
                     </button>
                 </form>
             </td>
        </tr>
    @endforeach()
    </tbody>
</table>
