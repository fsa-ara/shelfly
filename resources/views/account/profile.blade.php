<x-app title="Profile">
    <h1>Profile</h1>
    <p>Manage your personal information and account security.</p>
    <nav>
        <div>
            <a href="#informations">Informations</a>
        </div>
        <div>
            <a href="#security">Security</a>
        </div>
    </nav>
    <section id="informations">
        <div>
            <form id="profile-informations-form"
                  action="{{ route('profile.update.informations') }}"
                  method="post">
                <div>
                    <div>
                        <label for="profile-informations-username-field">Username</label>
                        <input id="profile-informations-username-field"
                               name="username"
                               type="text"
                               value="{{ request()->user()->profile->username }}"
                               aria-required="true"
                               autocomplete="username"
                               required>
                    </div>
                    <div>
                        <label for="profile-informations-locale-select">Select your language</label>
                        <select id="profile-informations-locale-select"
                                name="locale"
                                aria-required="true"
                                required>
                            @foreach ($availableLanguages as $code => $name)
                                <option value="{{ $code }}"
                                        @selected($code === $userLanguage)>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        @error('username')
                            <p>{{ $message }}</p>
                        @enderror
                        @error('locale')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <button form="profile-informations-form"
                        type="submit">Update</button>
            </form>
        </div>
        <div>
            <form id="profile-delete-form"
                  action="{{ route('profile.delete') }}"
                  method="post"></form>
            <button type="button"
                    command="show-modal"
                    commandfor="profile-delete-dialog">Delete your account</button>
            <dialog id="profile-delete-dialog">
                <p>Are you sure you want to delete your account?</p>
                <div>
                    <button form="profile-delete-form"
                            type="submit">Delete</button>
                    <button type="button"
                            command="close"
                            commandfor="profile-delete-dialog">Cancel</button>
                </div>
            </dialog>
        </div>
    </section>
    <section id="security">
        <form id="profile-security-form"
              action="{{ route('profile.update.security') }}"
              method="post">
            <input name="email"
                   type="hidden"
                   value="{{ request()->user()->email }}"
                   aria-required="true"
                   required>
            <div>
                <div>
                    <label for="profile-security-current-password-field">Enter your current password</label>
                    <input id="profile-security-current-password-field"
                           name="current_password"
                           type="password"
                           aria-required="true"
                           autocomplete="current-password"
                           required>
                </div>
                <div>
                    <label for="profile-security-password-field">Enter your new password</label>
                    <input id="profile-security-password-field"
                           name="password"
                           type="password"
                           aria-required="true"
                           autocomplete="new-password"
                           required>
                </div>
                <div>
                    <label for="profile-security-password-confirmation-field">Confirm your new password</label>
                    <input id="profile-security-password-confirmation-field"
                           name="password_confirmation"
                           type="password"
                           aria-required="true"
                           autocomplete="new-password"
                           required>
                </div>
                <div>
                    @error('current_password')
                        <p>{{ $message }}</p>
                    @enderror
                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <button form="profile-security-form"
                    type="submit">Update</button>
        </form>
    </section>
</x-app>
