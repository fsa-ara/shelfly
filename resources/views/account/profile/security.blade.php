<x-tab.panel id="profile-security-panel"
             aria-labelledby="profile-security-tab"
             tabindex="0"
             hidden>
    <div @class(['mb-8'])>
        <x-form id="profile-security-form"
                action="{{ route('profile.update.security') }}"
                method="post">
            <x-form.input name="email"
                          type="hidden"
                          value="{{ request()->user()->email }}"
                          required />
            <div @class(['flex flex-col gap-4 mb-4'])>
                <x-form.input id="profile-security-current-password-field"
                              name="current_password"
                              type="password"
                              autocomplete="current-password"
                              required
                              :label="__('account/profile.input.label.current_password')"
                              :isInvalid="$errors->has('current_password')" />
                <x-form.input id="profile-security-password-field"
                              name="password"
                              type="password"
                              autocomplete="new-password"
                              required
                              :label="__('account/profile.input.label.password')"
                              :isInvalid="$errors->has('password')" />
                <x-form.input id="profile-security-password-confirmation-field"
                              name="password_confirmation"
                              type="password"
                              autocomplete="new-password"
                              required
                              :label="__('account/profile.input.label.password_confirmation')"
                              :isInvalid="$errors->has('password')" />
                <div @class(['h-16'])>
                    <x-form.error type="current_password" />
                    <x-form.error type="password" />
                </div>
            </div>
        </x-form>
    </div>
    <div>
        <x-button.primary form="profile-security-form"
                          type="submit"
                          :text="__('account/profile.button.submit.security')" />
    </div>
</x-tab.panel>
