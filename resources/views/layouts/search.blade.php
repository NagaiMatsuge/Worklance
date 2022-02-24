{{-- <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
    <form action="/post/search" method="POST" class="search-field d-flex">
        @csrf
        <input name="search" type="text" placeholder="Search" class="search-field-input">
        <input type="submit" value="🔍" class="search-field-submit">
    </form>
</div> --}}

<form action="{{ route('postSearch') }}" method="POST" class="search-form">
   @csrf
   <input name="search" type="text" placeholder="Поиск">
   <button type="submit" class="search-btn"><img src="{{ asset('data/img/search.svg') }}" alt="search image"></button>
</form>
