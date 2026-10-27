<x-app :title="__('account/profile.title')">
    <x-card.profile>
        <div @class(['mb-2'])>
            <x-typography.heading level="1"
                                  :content="__('account/profile.heading')" />
        </div>
        <div @class(['mb-16 text-center'])>
            <p>{{ __('account/profile.description.subheading') }}</p>
        </div>
        <x-tab.list aria-label="{{ __('account/profile.tab.label') }}">
            <x-button.tab id="profile-information-tab"
                          role="tab"
                          aria-controls="profile-information-panel"
                          aria-selected="true"
                          tabindex="0"
                          :text="__('account/profile.tab.button.information')" />
            <x-button.tab id="profile-security-tab"
                          role="tab"
                          aria-controls="profile-security-panel"
                          aria-selected="false"
                          tabindex="-1"
                          :text="__('account/profile.tab.button.security')" />
        </x-tab.list>

        @include('account.profile.information')
        @include('account.profile.security')

        <x-modal.dialog id="profile-delete-dialog">
            <div @class(['flex flex-col my-8'])>
                <div>
                    <x-typography.heading level="1"
                                          :content="__('account/profile.modal.heading')" />
                </div>
                <div @class(['my-4'])>
                    <div @class(['text-center'])>
                        <p>{{ __('account/profile.modal.question') }}</p>
                    </div>
                    <div @class(['text-red-700 dark:text-red-300', 'text-center'])>
                        <p>{{ __('account/profile.modal.warning') }}</p>
                    </div>
                </div>
            </div>
            <div>
                <div @class(['flex gap-4'])>
                    <x-button.danger form="profile-delete-form"
                                     type="submit"
                                     :text="__('account/profile.button.submit.delete')" />
                    <x-button.secondary type="button"
                                        autofocus
                                        command="close"
                                        commandfor="profile-delete-dialog"
                                        :text="__('account/profile.modal.button.close')" />
                </div>
            </div>
        </x-modal.dialog>

    </x-card.profile>
</x-app>
