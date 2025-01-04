<div>
@php
    // The [id] in filename becomes available as $id variable
    $tour = \App\Models\Tour::findOrFail($id);
@endphp

<article>
    <h1>{{ $tour->name }}</h1>
    <div>{{ $tour->price }}</div>
</article>

</div>
