@if (Request::is('admin/*') || Request::is('admin'))
    ISRA - admin
@elseif (Request::is('user/*') || Request::is('user'))
    ISRA - user
@else
    @if (Request::is('/') || Request::is(''))
        ISRA by Diaspora SDN BHD
    @elseif (Request::is('login') || Request::is('register'))
        ISRA by Diaspora SDN BHD
    @endif
@endif
