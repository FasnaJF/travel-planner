    Service Images

<div style="display:flex; flex-wrap:wrap; gap:16px; max-width:800px; margin:auto;">
    @foreach ($getRecord()->serviceImages as $image)
        <div style="border:1px solid #d1d5db; border-radius:0.5rem; padding:4px; background:white; flex: 0 0 calc(50% - 16px); height:350px; display:flex; justify-content:center; align-items:center;">
            <img src="{{ asset('storage/' . $image->image_url) }}" 
                 alt="Service Image" 
                 style="width:100%; height:100%; object-fit:cover; border-radius:0.5rem;">
        </div>
    @endforeach
</div>
