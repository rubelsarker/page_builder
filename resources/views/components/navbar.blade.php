@foreach($menu as $item)
    @if(count($item->subItems()) >0)
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{$item->label}}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"></a>
                @foreach($item->subItems() as $subItem)
                    <a class="dropdown-item" href="{{ route('user-pages',$item->url) }}">{{$subItem->label}}</a>
                @endforeach

            </div>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link" href="{{route('user-pages',$item->url)}}">{{$item->label}}</a>
        </li>
    @endif
@endforeach

