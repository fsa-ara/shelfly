@for ($i = 0; $i < 2; $i++)
    <polyline points="160,-480 800,-480"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-width="80"
              @class([
                  'origin-[480px_-480px] rotate-0',
                  'first:-translate-y-40',
                  'last:translate-y-40',
                  'transition-[translate,_rotate] duration-250 ease-[cubic-bezier(0.5,_0,_0.25,_1)] delay-[125ms,_0ms]',
                  'group-aria-expanded/burger:first:rotate-45',
                  'group-aria-expanded/burger:first:translate-y-0',
                  'group-aria-expanded/burger:last:-rotate-45',
                  'group-aria-expanded/burger:last:translate-y-0',
                  'group-aria-expanded/burger:delay-[0ms,_125ms]',
              ]) />
@endfor
