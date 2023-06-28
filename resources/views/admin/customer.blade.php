@extends('layouts.master')

@section('content')

    <div class="container dashboard-con">
        <div class="row dashboard">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Customer List') }}</div>
                </div>
            </div>
        </div>
    </div>
    
    @extends('layouts.master')

    @section('content')
    
        <div class="container dashboard-con">
            <div class="row dashboard">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Customer List') }}</div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="container">
            <table id="user-table" class="table m-2">
                <thead>
                    <tr>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Table body will be populated dynamically using Ajax -->
                </tbody>
            </table>
        </div>
    
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $.ajax({
                    url: 'https://reqres.in/api/users?fbclid=IwAR3bhGh_TttptIIVJUjPa_AAAw2v6uoahl49vauE75SYqSKdqNYrNBSuJUE',
                    method: 'GET',
                    success: function(response) {
                        var users = response.data;
                        var tableBody = $('#user-table tbody');
    
                        $.each(users, function(index, user) {
                            var row = $('<tr></tr>');
                            var profileCell = $('<td><img src="' + user.avatar + '" alt="Profile Image" width="50"></td>');
                            var nameCell = $('<td>' + user.first_name + ' ' + user.last_name + '</td>');
                            var emailCell = $('<td>' + user.email + '</td>');
    
                            row.append(profileCell);
                            row.append(nameCell);
                            row.append(emailCell);
    
                            tableBody.append(row);
                        });
                    }
                });
            });
        </script>
    
    @endsection
    

@endsection
