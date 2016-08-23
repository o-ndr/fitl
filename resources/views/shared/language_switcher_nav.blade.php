        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
            role="dropdown" aria-haspopup="true" aria-expanded="false">
            Language <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                            {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
        </li>