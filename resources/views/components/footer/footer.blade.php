<footer @class(['flex items-center justify-center min-h-12'])>
    <p @class(['text-xs'])>{{ __('components/footer.copyright', [
        'date' => date('Y'),
        'app' => config('app.name'),
    ]) }}</p>
</footer>
