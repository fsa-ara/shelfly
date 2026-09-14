<circle cx="480"
        cy="-480"
        r="480"
        fill="currentColor"
        @class(['text-slate-300 dark:text-slate-700']) />
<circle cx="480"
        cy="-480"
        r="320"
        fill="none"
        pathLength="100"
        stroke="currentColor"
        stroke-width="160"
        stroke-dasharray="100"
        stroke-dashoffset="0"
        transform="rotate(-90 480 -480)"
        @class(['text-lime-500'])>
    <animate attributeName="stroke-dashoffset"
             from="0"
             to="100"
             dur="{{ $dur }}"
             fill="freeze" />
</circle>
