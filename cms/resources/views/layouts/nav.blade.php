<nav>
  <ul>
    <li>{!! link_to(url('/'), 'Home') !!}</li>
    <li>{!! link_to(url('items/create'), 'Add Item') !!}</li>
    <li class="pull-right">{!! link_to(url('auth/logout'), 'logout') !!}</li>
  </ul>
</nav>
