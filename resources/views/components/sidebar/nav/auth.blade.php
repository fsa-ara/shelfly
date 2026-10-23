@auth
    <section @class(['bg-white dark:bg-black', 'sticky top-0'])>
        <div @class(['flex h-12 items-center'])>
            <p @class(['font-bold truncate'])>{{ __('components/sidebar.auth.greeting', ['username' => request()->user()->profile->username]) }}</p>
        </div>
    </section>
    <section>
        <x-sidebar.nav.heading :content="__('components/sidebar.auth.section.my_account')" />
        <nav @class(['my-2'])>
            <ul>
                <li>
                    <x-sidebar.nav.link :aria-label="__('components/sidebar.auth.link.profile.label')"
                                        route="profile"
                                        :text="__('components/sidebar.auth.link.profile.text')"
                                        icon="icon.profile" />
                </li>
                <li>
                    <div>
                        <x-form id="sign-out-form"
                                action="{{ route('logout.deauthenticate') }}"
                                method="post"></x-form>
                    </div>
                    <div>
                        <x-sidebar.nav.button form="sign-out-form"
                                              type="submit"
                                              :text="__('components/sidebar.auth.button.submit')"
                                              icon="icon.logout" />
                    </div>
                </li>
            </ul>
        </nav>
    </section>
@endauth
