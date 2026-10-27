<circle cx="480"
        cy="-480"
        r="360"
        fill="none"
        pathLength="100"
        stroke="currentColor"
        stroke-width="240"
        stroke-dasharray="100"
        stroke-dashoffset="0"
        transform="rotate(-90 480 -480)">
    <animate attributeName="stroke-dashoffset"
             from="0"
             to="100"
             dur="{{ $dur . 'ms' }}"
             fill="freeze" />
</circle>
