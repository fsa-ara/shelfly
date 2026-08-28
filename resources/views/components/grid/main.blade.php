<main id="main-grid"
      @class([
          'gap-x-4 grid grid-cols-4 px-4 size-full',
          'sm:grid-cols-8',
          'lg:grid-cols-12',
      ])>{{ $slot }}</main>
