<!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
<li class="nav-header"></li>
<li class="nav-item">
  <a href="{{ aurl('') }}" class="nav-link {{ active_link(null,'active') }}">
    <i class="nav-icon fas fa-home"></i>
    <p>
      {{ trans('admin.dashboard') }}
    </p>
  </a>
</li>

<!--abouts_start_route-->
@if(admin()->user()->role('abouts_show'))
<li class="nav-item">
  <a href="{{ aurl('abouts') }}" class="nav-link  {{active_sidebar('about')['permanent']}}">
    <i class="nav-icon fas fa-question-circle"></i>
    <p>
      {{ trans('admin.abouts') }}
    </p>
  </a>
</li>
@endif
<!--abouts_end_route-->

<!--products_start_route-->
@if(admin()->user()->role("products_show"))
<li class="nav-item {{active_link('products','menu-open')}} ">
  <a href="#" class="nav-link {{active_sidebar('products')['permanent']}}">
    <i class="nav-icon fab fa-product-hunt"></i>
    <p>
      {{trans('admin.products')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('products')}}" class="nav-link  {{active_sidebar('products')['first']}}">
        <i class="fab fa-product-hunt nav-icon"></i>
        <p>{{trans('admin.products')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('products/create') }}" class="nav-link {{active_sidebar('products','create')['second']}}">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--products_end_route-->

<!--sliders_start_route-->
@if(admin()->user()->role("sliders_show"))
<li class="nav-item {{active_link('sliders','menu-open')}} ">
  <a href="#" class="nav-link {{active_sidebar('sliders')['permanent']}}">
    <i class="nav-icon fas fa-sliders-h"></i>
    <p>
      {{trans('admin.sliders')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('sliders')}}" class="nav-link {{active_sidebar('sliders')['first']}}">
        <i class="fas fa-sliders-h nav-icon"></i>
        <p>{{trans('admin.sliders')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('sliders/create') }}" class="nav-link {{active_sidebar('sliders')['second']}}">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--sliders_end_route-->

<!--blogs_start_route-->
@if(admin()->user()->role("blogs_show"))
<li class="nav-item {{active_link('blogs','menu-open')}} ">
  <a href="#" class="nav-link {{active_sidebar('blogs')['permanent']}}">
    <i class="nav-icon fas fa-paste"></i>
    <p>
      {{trans('admin.blogs')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('blogs')}}" class="nav-link  {{active_sidebar('blogs')['first']}}">
        <i class="fas fa-paste nav-icon"></i>
        <p>{{trans('admin.blogs')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('blogs/create') }}" class="nav-link {{active_sidebar('blogs')['second']}}">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--blogs_end_route-->





<!--clients_start_route-->
@if(admin()->user()->role("clients_show"))
<li class="nav-item {{active_link('clients','menu-open')}} ">
  <a href="#" class="nav-link {{active_sidebar('clients')['permanent']}}">
    <i class="nav-icon fas fa-user-secret"></i>
    <p>
      {{trans('admin.clients')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('clients')}}" class="nav-link  {{active_sidebar('clients')['first']}}">
        <i class="fas fa-user-secret nav-icon"></i>
        <p>{{trans('admin.clients')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('clients/create') }}" class="nav-link {{active_sidebar('clients')['second']}}">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--clients_end_route-->

<!--statistics_start_route-->
@if(admin()->user()->role("statistics_show"))
<li class="nav-item {{active_link('statistics','menu-open')}} ">
  <a href="#" class="nav-link {{active_sidebar('statistics')['permanent']}}">
    <i class="nav-icon fas fa-draw-polygon"></i>
    <p>
      {{trans('admin.statistics')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('statistics')}}" class="nav-link  {{active_sidebar('statistics')['first']}}">
        <i class="fas fa-draw-polygon nav-icon"></i>
        <p>{{trans('admin.statistics')}} </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('statistics/create') }}" class="nav-link {{active_sidebar('statistics')['second']}}">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--statistics_end_route-->

<!--contacts_start_route-->
@if(admin()->user()->role("contacts_show"))
<li class="nav-item {{active_link('contacts','menu-open')}} ">
  <a href="#" class="nav-link {{active_sidebar('contacts')['permanent']}}">
    <i class="nav-icon fas fa-id-card-alt"></i>
    <p>
      {{trans('admin.contacts')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('contacts')}}" class="nav-link  {{active_sidebar('contacts')['first']}}">
        <i class="nav-icon fas fa-id-card-alt"></i>
        <p>{{trans('admin.contacts')}} </p>
      </a>
    </li>
  </ul>
</li>
@endif
<!--contacts_end_route-->


@if(admin()->user()->role('settings_show'))
<li class="nav-item">
  <a href="{{ aurl('settings') }}" class="nav-link  {{active_sidebar('settings')['permanent']}}">
    <i class="nav-icon fas fa-cogs"></i>
    <p>
      {{ trans('admin.settings') }}
    </p>
  </a>
</li>
@endif
@if(admin()->user()->role("admins_show"))
<li class="nav-item {{ active_link('admins','menu-open') }}">
  <a href="#" class="nav-link  {{active_sidebar('admins')['permanent']}}">
    <i class="nav-icon fas fa-users"></i>
    <p>
      {{trans('admin.admins')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('admins')}}" class="nav-link {{active_sidebar('admins')['first']}}">
        <i class="fas fa-users nav-icon"></i>
        <p>{{trans('admin.admins')}}</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('admins/create') }}" class="nav-link {{active_sidebar('admins')['second']}}">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}}</p>
      </a>
    </li>
  </ul>
</li>
@endif
@if(admin()->user()->role("admingroups_show"))
<li class="nav-item {{ active_link('admingroups','menu-open') }}">
  <a href="#" class="nav-link  {{active_sidebar('admingroups')['permanent']}}">
    <i class="nav-icon fas fa-users"></i>
    <p>
      {{trans('admin.admingroups')}}
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{aurl('admingroups')}}" class="nav-link {{active_sidebar('admingroups')['first']}}">
        <i class="fas fa-users nav-icon"></i>
        <p>{{trans('admin.admingroups')}}</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ aurl('admingroups/create') }}" class="nav-link {{active_sidebar('admingroups')['second']}}">
        <i class="fas fa-plus nav-icon"></i>
        <p>{{trans('admin.create')}}</p>
      </a>
    </li>
  </ul>
</li>
@endif


