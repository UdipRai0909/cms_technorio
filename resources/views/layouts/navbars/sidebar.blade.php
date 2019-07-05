<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">

            <a href="{{ route('dashboard') }}" class="simple-text logo-mini"><img src=
            "{{ asset('assets/img/logo.svg') }}" class="img-fireProfile"></a>

            <a href="{{ route('dashboard') }}"
             class="simple-text logo-normal pt-3 text-uppercase" >
                {{ _('Dashboard') }}
            </a>
        </div>
        <ul class="nav">
            <li class="active">
                <a href="{{ route('users') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p> {{_('Users (Admin)')}}</p>
                </a>
            </li>

            <li>
                <a href="{{ route('posts') }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p> {{_('Posts')}}</p>
                </a>
            </li>

            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <p class="nav-link-text" >{{_('Create')}}</p>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">

                        <li>
                            <a href="{{ route('user.create') }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{_('Create User (Admin)')}}</p>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('post.create') }}">
                                <i class="tim-icons icon-chat-33"></i>
                                <p>{{_('Create Post')}}</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('category.create') }}">
                                <i class="tim-icons icon-send"></i>
                                <p>{{_('Create Category')}}</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('tag.create') }}">
                                <i class="tim-icons icon-tag"></i>
                                <p>{{_('Create Tag')}}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="{{ route('categories') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{_('Categories')}}</p>
                </a>
            </li>
            <li>
                <a href="{{ route('tags') }}">
                    <i class="tim-icons icon-pin"></i>
                    <p> {{_('Tags')}} </p>
                </a>
            </li>
            <li>
                <a href=" {{ route('posts.trashed') }} ">
                    <i class="tim-icons icon-spaceship"></i>
                    <p>{{_('Trash')}}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
