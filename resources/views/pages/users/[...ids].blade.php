<ul>
    @foreach ($ids as $id)
        <li>Tour {{ \App\Models\Tour::findOrFail($id)->get(['price' , 'name']) }}</li>
    @endforeach
</ul>
