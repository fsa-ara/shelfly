<div id="app-grid"
     @class([
         'grid grid-cols-1 grid-rows-[3rem_1fr] size-full',
         'lg:grid-cols-[16rem_1fr]',
     ])>
    <div id="app-header-grid"
         @class(['col-start-1 row-start-1'])>{{ $header }}</div>
    <div id="app-sidebar-grid"
         @class(['min-h-0', 'col-start-1 row-start-2'])>{{ $sidebar }}</div>
    <div id="app-content-grid"
         @class([
             'min-h-0',
             'col-start-1 row-start-2',
             'lg:col-start-2 lg:row-start-1 lg:row-span-full',
         ])>{{ $content }}</div>
</div>
