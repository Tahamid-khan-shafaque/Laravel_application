<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex items-center justify-between">
                {{ __('') }}
            </div>
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 gap-8 py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">




<style>
    table {
        width: 80%;
        margin: 0 auto;
        border-collapse: collapse;
    }

    table thead {
        background-color: #f2f2f2;
    }

    table th,
    table td {
        padding: 8px;
        border: 1px solid #ccc;
    }

    table th {
        text-align: left;
    }
</style>

<div style="text-align: center;">
    <table>
        <thead>
            <tr>
              
                <th>Department</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                
                <td>{{ $item->department }}</td>
                <td>{{ $item->description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

</x-app-layout>