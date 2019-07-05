<footer class="footer">
    <div class="container-fluid">
        <ul class="nav">
            <li class="nav-item">
                <a href="#" target="blank" class="nav-link">
                    {{ _('Admin') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('tags') }}" target="blank" class="nav-link">
                    {{ _('Tags') }}
                </a>
            </li>
            <li class="nav-item">
                <a href=" {{ route('categories') }} " class="nav-link">
                    {{ _('Categories') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('welcome') }}" class="nav-link">
                    {{ _('Blog') }}
                </a>
            </li>
        </ul>
        <div class="copyright">
            &copy; {{ now()->year }} {{ _('made with') }} <i class="tim-icons icon-heart-2"></i> {{ _('by') }}
            <a href="https://creative-tim.com" target="_blank">{{ _('Udip Rai') }}</a> &amp;
            <a href="https://updivision.com" target="_blank">{{ _('PhpStorm') }}</a> {{ _('for a better web') }}.
        </div>
    </div>
</footer>
