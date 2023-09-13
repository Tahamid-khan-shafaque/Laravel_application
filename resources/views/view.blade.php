<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div style="text-align: center;">
        <h2 style="margin-top: 50px; font-size: 30px;">User Details</h2>
        <div style="display: inline-block; border: 2px solid #ccc; padding: 30px; border-radius: 10px; background-color: #f2f2f2;">
        <div>
                @if ($formData->photo)
                    <img src="{{ asset('storage/subdirectory/' . $formData->photo) }}" width="50" alt="User Photo">
                @else
                    <p>No Photo</p>
                @endif
            </div>
            <p style="font-size: 18px; margin-bottom: 10px;"><strong>Name:</strong> {{ $formData->name }}</p>
            <p style="font-size: 18px; margin-bottom: 10px;"><strong>Email:</strong> {{ $formData->email }}</p>
            <p style="font-size: 18px; margin-bottom: 10px;"><strong>Number:</strong> {{ $formData->number }}</p>
            <p style="font-size: 18px; margin-bottom: 10px;"><strong>Department:</strong> {{ $formData->department }}</p>
            <p style="font-size: 18px; margin-bottom: 10px;"><strong>Blood Group:</strong> {{ $formData->bloodgroup }}</p>
            <p style="font-size: 18px; margin-bottom: 10px;"><strong>Gender:</strong> {{ $formData->gender }}</p>
            <p style="font-size: 18px; margin-bottom: 10px;"><strong>Skillset:</strong> {{ $formData->skillset }}</p>
          
        </div>
    </div>
</div>

