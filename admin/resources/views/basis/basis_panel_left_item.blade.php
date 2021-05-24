{{-- link for page simple--}}
<li class="nav-item">
  <a class="nav-link {{ URL::current() == $href ? 'active' : ''}}" href="{{ $href }}">
    <i class="fas fa-fw fa-{{ $icon_name }}"></i>
    <span>{{ $name }}</span></a>
</li>

