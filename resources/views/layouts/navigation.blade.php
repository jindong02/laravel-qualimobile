<?php
$mainMenus = \App\Models\Menu::orderBy('order')->get();
?>

<div class="d-md-flex d-none">
    @foreach ($mainMenus as $mainMenu)
        @if ($mainMenu->is_single)
            <li class="nav-item d-sm-none d-lg-block">
                <a class="nav-link text-uppercase text-truncate" href="{{ route('produtos', ['main' => $mainMenu->slug]) }}">
                    {{ $mainMenu->name }}
                </a>
            </li>
        @else
            <li class="nav-item dropdown d-sm-none d-lg-block">
                <a class="nav-link dropdown-toggle text-uppercase" href="javascript:void(0)" id="{{ $mainMenu->slug }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ $mainMenu->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="{{ $mainMenu->slug }}">
                    @php($submenus = $mainMenu->submenus()->orderBy('order')->get())
                    @foreach ($submenus as $submenu)
                    <li>
                        <a class="dropdown-item text-truncate text-uppercase" href="{{ route('produtos', ['main' => $mainMenu->slug, 'sub' => $submenu->slug]) }}">
                            {{ $submenu->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
            
        @endif
    @endforeach
</div>

<div class="d-block d-md-none" style="width: 100%">
    <li class="nav-item">
        <a class="nav-link text-uppercase" href="{{ route('cases.index') }}">{{ __('CASES') }}</a>
    </li>

    @foreach ($mainMenus as $mainMenu)
        @if ($mainMenu->is_single)
            <li class="nav-item d-sm-none d-lg-block">
                <a class="nav-link text-uppercase text-truncate" href="{{ route('produtos', ['main' => $mainMenu->slug]) }}">{{ $mainMenu->name }}</a>
            </li>
        @else
            <li class="nav-item dropdown d-sm-none d-lg-block">
                <a class="nav-link dropdown-toggle text-uppercase" href="javascript:void(0)" id="mobile_{{ $mainMenu->slug }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ $mainMenu->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="mobile_{{ $mainMenu->slug }}">
                    @php($submenus = $mainMenu->submenus()->orderBy('order')->get())
                    @foreach ($submenus as $submenu)
                    <li>
                        <a class="dropdown-item text-truncate text-uppercase" href="{{ route('produtos', ['main' => $mainMenu->slug, 'sub' => $submenu->slug]) }}">
                            {{ $submenu->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
        @endif
    @endforeach

    <li class="nav-item">
        <a class="nav-link text-uppercase" href="{{ route('blog') }}">{{ __('BLOG') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-uppercase" href="{{ route('contato') }}">{{ __('CONTATO') }}</a>
    </li>
</div>

