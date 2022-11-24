@props(['id' => ''])

<table {{ $attributes->merge(['id' => $id]) }} class="table table-striped table-sm"
       data-toggle="table" data-locale="ru-RU"
       style="width:100%; font-size: .8rem;">
    <thead>
        <x-admin.table.tr>
            {{ $heading }}
        </x-admin.table.tr>
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
</table>
