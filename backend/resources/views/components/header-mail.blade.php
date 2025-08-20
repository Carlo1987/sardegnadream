<header {{ $attributes }} style="display: table; width: 100%;">
    <div style="display: table-cell; vertical-align: middle; width: 45px; padding:5px;">
        <x-application-logo width="45"/>
    </div>
    
    <div style="display: table-cell; vertical-align: middle; padding-left: 8px; font-size: 25px; font-weight: bold;">
       {{ $slot }}
    </div>
</header>
