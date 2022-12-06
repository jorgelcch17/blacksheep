<div class="search-style-1">
    <form action="{{ route('product.search') }}">
        <input type="text" name="q" placeholder="Buscar producto..." value="{{ $q }}">
    </form>
</div>