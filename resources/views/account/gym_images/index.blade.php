@extends('layouts.main')
@section('content')
    <x-account.gym.menu></x-account.gym.menu>
    <div class="offset-2 col-8">
        <hr class="featurette-divider">
        <h2>Редактирование фотографий фитнес-клуба</h2>
        @if ($gymImages === null)
            {
            <h2>Фотографии отсутствуют</h2>
            }
        @endif
        @foreach($gymImages as $gymImage)
                <img class="m-2 w-25 rounded-2 border border-secondary border-2 border-opacity-10"
                     src="{{ Storage::disk('public')->url($gymImage->image) }}"
                     alt="img">
            <a class="mb-2 me-1 btn btn-outline-success @if (request()->routeIs('account.gym_addresses.*')) active @endif"
               href="{{ route('account.gym_images.edit', ['gym_image' => $gymImage->id]) }}">
                &#128736
                Заменить
            </a>
            <a href="javascript:;" class="mb-2 me-1 btn btn-outline-success delete @if (request()->routeIs('account.gym_addresses.*')) active @endif"
               rel="{{  $gymImage->id }}">
                &#128465
                Удалить
            </a>
            <br>
        @endforeach
        <a class="mb-2 me-1 btn btn-outline-success @if (request()->routeIs('account.gym_addresses.*')) active @endif"
           href="{{ route('account.gym_images.create') }}">
            <svg class="bi pe-none me-2" width="16" height="16"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M1 0L0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.356 3.356a1 1 0 0 0 1.414 0l1.586-1.586a1 1 0 0 0 0-1.414l-3.356-3.356a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0zm9.646 10.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708zM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11z" />
            </svg>
            Добавить фото
        </a>
        {{ $gymImages->links() }}
    </div>
    <hr class="featurette-divider">
@endsection
@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function (){
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function (e, k) {
                e.addEventListener("click", function () {
                    const id = e.getAttribute('rel');
                    if (confirm(`Подтверждаете удаление записи с #id = ${id}?`)) {
                        //send id on the server
                        send(`/account/gym_images/${id}`).then(()=>{
                            location.reload();
                        })
                    }else{
                        alert("Удаление отменено")
                    }
                })
            })
        })
        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
