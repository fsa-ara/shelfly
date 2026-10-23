<footer @class(['flex min-h-12 items-center justify-center mt-full'])>
    <p @class(['text-xs'])>{{ __('components/footer.copyright', [
        'date' => date('Y'),
        'app' => config('app.name'),
    ]) }}</p>
</footer>
