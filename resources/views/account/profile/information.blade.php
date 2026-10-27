<x-tab.panel id="profile-information-panel"
             aria-labelledby="profile-information-tab"
             tabindex="0">
    <div @class(['mb-8'])>
        <x-form id="profile-information-form"
                action="{{ route('profile.update.information') }}"
                method="post">
            <div @class(['flex flex-col gap-4 mb-4'])>
                <x-form.input id="profile-information-username-field"
                              name="username"
                              type="text"
                              value="{{ request()->user()->profile->username }}"
                              autocomplete="username"
                              required
                              :label="__('account/profile.input.label.username')"
                              :isInvalid="$errors->has('username')" />
                <x-form.select id="profile-information-locale-select"
                               name="locale"
                               required
                               :label="__('account/profile.select.label.locale')"
                               :isInvalid="$errors->has('locale')">
                    @foreach (config('app.supported_locales') as $locale => $name)
                        <option value="{{ $locale }}"
                                @selected($locale === request()->user()->profile->locale)>{{ $name }}</option>
                    @endforeach
                </x-form.select>
                <div @class(['h-16'])>
                    <x-form.error type="username" />
                    <x-form.error type="locale" />
                </div>
            </div>
        </x-form>
    </div>
    <div>
        <x-button.primary form="profile-information-form"
                          type="submit"
                          :text="__('account/profile.button.submit.information')" />
    </div>
    <div @class(['mt-8'])>
        <x-form id="profile-delete-form"
                action="{{ route('profile.delete') }}"
                method="post" />
        <div @class(['flex justify-center'])>
            <div @class(['w-fit'])>
                <x-button.danger type="button"
                                 command="show-modal"
                                 commandfor="profile-delete-dialog"
                                 :text="__('account/profile.modal.button.show')" />
            </div>
        </div>
    </div>
</x-tab.panel>
