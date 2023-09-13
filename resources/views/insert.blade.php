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
    .form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    form {
        width: 300px;
        text-align: center;
    }

    input[type="text"],
    button {
        display: block;
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 14px;
    }

    button {
     
        background-color: #1a0808;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }
</style>

<div class="form-container">
    <form action="{{ route('insertData') }}" method="POST">
        @csrf
       
        <input type="text" name="department" placeholder="Department">
        <input type="text" name="description" placeholder="Description">
        <button type="submit">Insert</button>
    </form>
</div>


</div>

</x-app-layout>