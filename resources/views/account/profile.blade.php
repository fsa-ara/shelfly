<x-app :title="__('account/profile.title')">
    <x-card.profile>
        <div @class(['mb-2'])>
            <x-typography.heading level="1"
                                  :content="__('account/profile.heading')" />
        </div>
        <div @class(['mb-16 text-center'])>
            <p>{{ __('account/profile.description.subheading') }}</p>
        </div>
        <div>
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
                <x-modal.dialog id="profile-delete-dialog">
                    <div @class(['flex justify-center relative'])>
                        <div @class([
                            'bg-white dark:bg-black',
                            'shadow-slate-400 dark:shadow-slate-600',
                            'text-amber-500',
                            'absolute aspect-square h-16 p-4 rounded-full shadow-lg -translate-y-full',
                        ])>
                            <div @class(['-translate-y-1'])>
                                <x-icon component="icon.warning" />
                            </div>
                        </div>
                    </div>
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
            </x-tab.panel>
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
    </x-card.profile>
</x-app>
