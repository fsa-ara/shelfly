<header @class([
    'sticky top-0 z-50',
    'col-start-1 row-start-1',
    'lg:relative',
])>
    <div @class(['bg-white dark:bg-black', 'size-full'])>
        <nav @class(['px-2 size-full'])>
            <ul @class(['flex size-full justify-between'])>
                <li @class(['flex items-center'])>
                    <a href="{{ route('home') }}"
                       aria-label="{{ config('app.name') }}"
                       @class([
                           'focus:outline-sky-500',
                           'inline-block px-4 rounded-sm',
                           'focus:outline-1 focus:outline-offset-2',
                       ])>{{ strtoupper(config('app.name')) }}</a>
                </li>
                <li @class(['lg:hidden'])>
                    <x-header.nav.button data-trigger-label-open="{{ __('components/header.label.open') }}"
                                         data-trigger-label-close="{{ __('components/header.label.close') }}"
                                         type="button"
                                         aria-label="{{ __('components/header.label.open') }}"
                                         aria-controls="sidebar"
                                         aria-expanded="false" />
                </li>
            </ul>
        </nav>
    </div>
</header>
