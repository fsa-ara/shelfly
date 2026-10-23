@guest
    <section @class(['flex flex-col gap-8 pt-12'])>
        <p>{{ __('components/sidebar.guest.description', ['app' => config('app.name')]) }}</p>
        <nav>
            <ul>
                <li>
                    <x-sidebar.nav.link :aria-label="__('components/sidebar.guest.link.sign_in.label')"
                                        route="login"
                                        :text="__('components/sidebar.guest.link.sign_in.text')"
                                        icon="icon.login" />
                </li>
            </ul>
        </nav>
    </section>
@endguest
