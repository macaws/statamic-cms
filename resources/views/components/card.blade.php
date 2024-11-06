<div class="shadow-pop rounded-xl">
    <div class="z-10 h-full rounded-xl bg-slate-50/40 p-1.5 ring-1 ring-inset ring-slate-200/50">
        <div class="rounded-md bg-white shadow-2xl shadow-black/5 ring-1 ring-slate-900/5">
            <div {{ $attributes }}>
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
