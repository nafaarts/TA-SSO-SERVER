<div class="card border-0">
    <div class="card-header bg-white">Personal Information</div>

    <div class="card-body">
        <table class="table">
            <tbody>
                <tr>
                    <td>NIP/NIM</td>
                    <td><strong>{{ auth()->user()->nomor_induk }}</strong></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><strong>{{ auth()->user()->name }}</strong></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><strong>{{ auth()->user()->email }}</strong></td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td>
                        <strong>{{ auth()->user()->getRoles()->implode(', ') }}</strong>
                    </td>
                </tr>
                @can('is-admin')
                    <tr>
                        <td>Privileges</td>
                        <td><span class="text-success">Admin</span></td>
                    </tr>
                @endcan
            </tbody>
        </table>


    </div>
</div>
