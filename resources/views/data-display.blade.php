<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="filepath/style.css">
    <link
rel="stylesheet"
type="text/css"
href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"
/>
</head>
<body>
    

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex items-center justify-between">
            <a href="{{ route('showData') }}" class="btn btn-primary" style="background-color: green; color: white; border-radius: 5px; padding: 10px;margin-left: 1050px;margin-top: -113px;margin-left: 294px;">
                    {{ __('Display Department') }}
                </a>

                {{ __('') }}
            </div>
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 gap-8 py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">


        <a href="{{ route('form') }}" class="btn btn-primary" style="background-color: green; color: white; border-radius: 5px; padding: 10px;margin-left: 945px;">
                    {{ __('Add user') }}
                </a>

                <a href="{{ route('insertData') }}" class="btn btn-primary" style="background-color: green; color: white; border-radius: 5px; padding: 10px;margin-left: 1050px;margin-top: -73px;">
                    {{ __('Add department') }}
                </a>

<!-- HTML file -->
<table class="table" id="user-table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Number</th>
            <th scope="col">Department</th>
            <th scope="col">Blood Group</th>
            <th scope="col">Gender</th>
            <th scope="col">Skillset</th>
            <th scope="col">Photo</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($formData as $data)
            <tr>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->number }}</td>
                <td>{{ $data->department }}</td>
                <td>{{ $data->bloodgroup }}</td>
                <td>{{ $data->gender }}</td>
                <td>{{ $data->skillset }}</td>
                <td>
    @if ($data->photo)
        <img src="{{ asset('storage/subdirectory/' . $data->photo) }}" width="50">
    @else
        No Photo
    @endif
</td>

                <td style="display: flex; justify-content: space-between;">
                <a href="{{ route('view-form', $data->id) }}" class="btn btn-primary" >View</a>
                <a href="{{ route('download-pdf', $data->id) }}" class="btn btn-secondary" style="  margin-left: 8px;">Download PDF</a>

               <a href="{{ route('forms.download', $data->id) }}" class="btn btn-secondary" style="  margin-left: 8px;">TCP</a>

<script>
    function downloadPDF(url) {
        window.open(url, '_blank');
    }
</script>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

  <script
type="text/javascript"
charset="utf8"
src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"
></script>
<script
type="text/javascript"
charset="utf8"
src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

<script>
$(function() {
$("#user-table").dataTable();
});
</script>


</div>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
    $('#user-table').dataTable();
    } );
    </script> 


</div>

</x-app-layout>
</body>
</html>