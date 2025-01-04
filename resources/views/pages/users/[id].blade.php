<div>
    @php
        // The [id] in filename becomes available as $id variable
        $tour = \App\Models\Tour::findOrFail($id);
    @endphp
    @dd('index from users ' . "$tour->name")
</div>
