@if (Request::is('admin/*'))
    ISRA - admin
@elseif (Request::is('user/*'))
    ISRA - user
@else
    ISRA by Diaspora SDN BHD
@endif
