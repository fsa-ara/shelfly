<x-app title="Profile">
    <x-card.profile>
        <div @class(['mb-2'])>
            <x-typography.heading level="1"
                                  content="{{ 'Profile' }}" />
        </div>
        <div @class(['mb-16 text-center'])>
            <p>Manage your personal information and account security.</p>
        </div>
        <div>
            <x-tab.list aria-label="{{ 'Profile tabs' }}">
                <x-button.tab id="profile-informations-tab"
                              role="tab"
                              aria-controls="profile-informations-panel"
                              aria-selected="true"
                              tabindex="0"
                              text="{{ 'Informations' }}" />
                <x-button.tab id="profile-security-tab"
                              role="tab"
                              aria-controls="profile-security-panel"
                              aria-selected="false"
                              tabindex="-1"
                              text="{{ 'Security' }}" />
            </x-tab.list>
            <x-tab.panel id="profile-informations-panel"
                         aria-labelledby="profile-informations-tab"
                         tabindex="0">
                <div @class(['mb-8'])>
                    <x-form id="profile-informations-form"
                            action="{{ route('profile.update.informations') }}"
                            method="post">
                        <div @class(['flex flex-col gap-4 mb-4'])>
                            <x-form.input id="profile-informations-username-field"
                                          name="username"
                                          type="text"
                                          value="{{ request()->user()->profile->username }}"
                                          autocomplete="username"
                                          required
                                          label="{{ 'Enter your username' }}"
                                          :isInvalid="$errors->has('username')" />
                            <x-form.select id="profile-informations-locale-select"
                                           name="locale"
                                           required
                                           label="{{ 'Select your language' }}"
                                           :isInvalid="$errors->has('locale')">
                                @foreach ($availableLocales as $code => $name)
                                    <option value="{{ $code }}"
                                            @selected($code === $userLocale)>{{ $name }}</option>
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
                    <x-button.primary form="profile-informations-form"
                                      type="submit"
                                      text="{{ 'Update' }}" />
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
                                             text="{{ 'Delete your account' }}" />
                        </div>
                    </div>
                </div>
                <x-modal.dialog id="profile-delete-dialog">
                    <div @class(['flex justify-center relative'])>
                        <div @class([
                            'bg-white dark:bg-black',
                            'shadow-slate-300 dark:shadow-slate-700',
                            'text-amber-500',
                            'absolute aspect-square h-16 p-4 rounded-full shadow-lg -translate-y-full',
                        ])>
                            <div @class(['-translate-y-1'])>
                                <x-icon component="icon.warning" />
                            </div>
                        </div>
                    </div>
                    <div @class(['flex flex-col my-8'])>
                        <div @class(['font-bold text-center text-2xl'])>
                            <p>Delete your account</p>
                        </div>
                        <div @class(['my-4'])>
                            <div @class(['text-center'])>
                                <p>Are you sure?</p>
                            </div>
                            <div @class(['text-red-700 dark:text-red-300', 'text-center'])>
                                <p>This action cannot be undone!</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div @class(['flex gap-4'])>
                            <x-button.danger form="profile-delete-form"
                                             type="submit"
                                             text="{{ 'Yes, delete' }}" />
                            <x-button.secondary type="button"
                                                autofocus
                                                command="close"
                                                commandfor="profile-delete-dialog"
                                                text="{{ 'No, keep it' }}" />
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
                                          label="{{ 'Enter your current password' }}"
                                          :isInvalid="$errors->has('current_password')" />
                            <x-form.input id="profile-security-password-field"
                                          name="password"
                                          type="password"
                                          autocomplete="new-password"
                                          required
                                          label="{{ 'Enter your new password' }}"
                                          :isInvalid="$errors->has('password')" />
                            <x-form.input id="profile-security-password-confirmation-field"
                                          name="password_confirmation"
                                          type="password"
                                          autocomplete="new-password"
                                          required
                                          label="{{ 'Confirm your new password' }}"
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
                                      text="{{ 'Update' }}" />
                </div>
            </x-tab.panel>
    </x-card.profile>
</x-app>
