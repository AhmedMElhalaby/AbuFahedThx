<li class="nav-item @if(url()->current() == url('admin')) active @endif ">
    <a href="{{url('admin')}}" class="nav-link">
        <i class="material-icons">dashboard</i>
        <p>{{__('admin.sidebar.home')}}</p>
    </a>
</li>
<li class="nav-item @if(strpos(url()->current() , url('admin/admins'))===0) active @endif">
    <a href="{{url('admin/admins')}}" class="nav-link">
        <i class="material-icons">persons</i>
        <p>{{__('admin.sidebar.admins')}}</p>
    </a>
</li>
<li class="nav-item @if(strpos(url()->current() , url('admin/categories'))===0) active @endif">
    <a href="{{url('admin/categories')}}" class="nav-link">
        <i class="material-icons">tags</i>
        <p>{{__('admin.sidebar.categories')}}</p>
    </a>
</li>

<li class="nav-item @if(strpos(url()->current() , url('admin/certifications'))===0) active @endif">
    <a href="{{url('admin/certifications')}}" class="nav-link">
        <i class="material-icons">file_copy</i>
        <p>{{__('admin.sidebar.certifications')}}</p>
    </a>
</li>
