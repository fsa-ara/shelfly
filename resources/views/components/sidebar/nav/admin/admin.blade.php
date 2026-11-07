@if (auth()->user()->role->admin)
    <x-sidebar.nav.heading :content="__('components/sidebar.auth.section.inventory')" />
    <nav @class(['my-2'])>
        <ul>
            <li>
                <x-sidebar.nav.link :aria-label="__('components/sidebar.auth.link.categories.label')"
                                    route="admin.categories"
                                    :text="__('components/sidebar.auth.link.categories.text')"
                                    icon="icon.category"
                                    viewBox="0 0 24 24" />
            </li>
        </ul>
    </nav>
@endif
