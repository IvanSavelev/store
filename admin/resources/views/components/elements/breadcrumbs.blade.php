<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    @isset($parents)
      @foreach($parents as $parent)
        <li class="breadcrumb-item"><a href="{{ $parent['url'] }}">{{ $parent['name'] }}</a></li>
      @endforeach
    @endisset
    <li class="breadcrumb-item active" aria-current="page">{{ $name }}</li>
  </ol>
</nav>
