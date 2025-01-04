<div>
    <h1>About Us Page</h1>
    <p>This is a static about page.</p>
</div>
@php
    // The [id] in filename becomes available as $id variable
    $tour = \App\Models\Tour::findOrFail(1);
@endphp

<article>
    <h1>{{ $tour->name }}</h1>
    <div>{{ $tour->price }}</div>
</article>
