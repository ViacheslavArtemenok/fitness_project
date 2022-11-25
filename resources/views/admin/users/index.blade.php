@extends('layouts.admin')
@section('content')
    <h2>Список пользователей</h2>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        @php
            $count = \app\Models\User::onlyTrashed()->count()
        @endphp
        <a href="{{ route('admin.users.index') . '?trashed' }}" class="btn btn-outline-primary">
            Удаленные пользователи <span id="recycled-user-count">{{ ($count > 0)? '(' . $count . ')' : '' }}</span>
        </a>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Добавить пользователя</a>
    </div>
    <br>
    <div id="alert-message" class="alert-message" data-mdb-autohide="true" data-mdb-delay="2000"></div><br>
    @include('inc.message')
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="table-responsive">--}}
{{--                @include('inc.message')--}}
{{--                <table id="user_table" class="table table-striped table-sm"--}}
{{--                       data-toggle="table" data-locale="ru-RU"--}}
{{--                       style="width:100%; font-size: .8rem;">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th scope="col">#</th>--}}
{{--                        <th scope="col">Фамилия</th>--}}
{{--                        <th scope="col">Имя</th>--}}
{{--                        <th scope="col">Отчество</th>--}}
{{--                        <th scope="col">Никнейм</th>--}}
{{--                        <th scope="col">Элект почта</th>--}}
{{--                        <th scope="col">Телефон</th>--}}
{{--                        <th scope="col">Роль</th>--}}
{{--                        <th scope="col">Статус</th>--}}
{{--                        <th scope="col">Дата добавления</th>--}}
{{--                        <th scope="col">Дата проверки эл. почты</th>--}}
{{--                        <th scope="col">Управление</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    @forelse($users as $user)--}}
{{--                        <tr id="row-{{ $user->id }}">--}}
{{--                            <td></td>--}}
{{--                            <td>--}}
{{--                                @if (isset($user->profile->last_name))--}}
{{--                                    {{ $user->profile->last_name }}--}}
{{--                                @endif--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                @if (isset($user->profile->first_name))--}}
{{--                                    {{ $user->profile->first_name }}--}}
{{--                                @endif--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                @if (isset($user->profile->father_name))--}}
{{--                                    {{ $user->profile->father_name }}--}}
{{--                                @endif--}}
{{--                            </td>--}}
{{--                            <td>{{ $user->name }}</td>--}}
{{--                            <td>{{ $user->email }}</td>--}}
{{--                            <td>{{ $user->phone }}</td>--}}
{{--                            <td>{{ $user->role->title }}</td>--}}
{{--                            <td>{{ $user->status }}</td>--}}
{{--                            <td>{{ $user->created_at }}</td>--}}
{{--                            <td>{{ $user->email_verified_at }}</td>--}}
{{--                            <td>--}}
{{--                                @if($user->trashed())--}}
{{--                                    <div style="">--}}
{{--                                        <a class="text-decoration-none" href="{{ route('admin.users.restore', $user->id) }}"--}}
{{--                                           title="Восстановить">--}}
{{--                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"--}}
{{--                                                 class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">--}}
{{--                                                <path fill-rule="evenodd"--}}
{{--                                                      d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>--}}
{{--                                                <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>--}}
{{--                                            </svg>--}}
{{--                                        </a>--}}
{{--                                        <a class="text-decoration-none"--}}
{{--                                           href="{{ route('admin.users.force_delete', $user->id) }}" style="color: red;"--}}
{{--                                           title="Очистить корзину">--}}
{{--                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"--}}
{{--                                                 class="bi bi-trash3-fill" viewBox="0 0 16 16">--}}
{{--                                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>--}}
{{--                                            </svg>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                @else--}}
{{--                                    <div style="">--}}
{{--                                        <a href="" class="text-decoration-none" title="Отправить письмо">--}}
{{--                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"--}}
{{--                                                 class="bi bi-envelope-at" viewBox="0 0 16 16">--}}
{{--                                                <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>--}}
{{--                                                <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>--}}
{{--                                            </svg>--}}
{{--                                        </a>--}}
{{--                                        <a class="text-decoration-none"--}}
{{--                                           href="{{ route('admin.users.edit', ['user' => $user]) }}"--}}
{{--                                           title="Редактировать пользователя">--}}
{{--                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"--}}
{{--                                                 class="bi bi-pencil-square" viewBox="0 0 16 16">--}}
{{--                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>--}}
{{--                                                <path fill-rule="evenodd"--}}
{{--                                                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>--}}
{{--                                            </svg>--}}
{{--                                        </a>--}}
{{--                                        <a href="javascript:;" class="delete text-decoration-none" rel="{{ $user->id }}"--}}
{{--                                           style="color: red;" title="Удалить в корзину">--}}
{{--                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"--}}
{{--                                                 class="bi bi-trash3" viewBox="0 0 16 16">--}}
{{--                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>--}}
{{--                                            </svg>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @empty--}}
{{--                        <span>--}}
{{--                            Записей не найдено--}}
{{--                        </span>--}}
{{--                    @endforelse--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <x-admin.table id="user_table">
        <x-slot name="heading">
            <x-admin.table.th scope="col">#</x-admin.table.th>
            <x-admin.table.th scope="col">Фамилия</x-admin.table.th>
            <x-admin.table.th scope="col">Имя</x-admin.table.th>
            <x-admin.table.th scope="col">Отчество</x-admin.table.th>
            <x-admin.table.th scope="col">Никнейм</x-admin.table.th>
            <x-admin.table.th scope="col">Элект почта</x-admin.table.th>
            <x-admin.table.th scope="col">Телефон</x-admin.table.th>
            <x-admin.table.th scope="col">Роль</x-admin.table.th>
            <x-admin.table.th scope="col">Статус</x-admin.table.th>
            <x-admin.table.th scope="col">Дата добавления</x-admin.table.th>
            <x-admin.table.th scope="col">Дата проверки эл. почты</x-admin.table.th>
            <x-admin.table.th scope="col">Управление</x-admin.table.th>
        </x-slot>
        @forelse($users as $user)
            <x-admin.table.tr id="row-{{ $user->id }}">
                <x-admin.table.td/>
                <x-admin.table.td>{{ $user->profile->last_name ?? ''}}</x-admin.table.td>
                <x-admin.table.td>{{ $user->profile->first_name ?? ''}}</x-admin.table.td>
                <x-admin.table.td>{{ $user->profile->father_name ?? ''}}</x-admin.table.td>
                <x-admin.table.td>{{ $user->name ?? ''}}</x-admin.table.td>
                <x-admin.table.td>{{ $user->email ?? ''}}</x-admin.table.td>
                <x-admin.table.td>{{ $user->phone ?? ''}}</x-admin.table.td>
                <x-admin.table.td>{{ $user->role->title ?? ''}}</x-admin.table.td>
                <x-admin.table.td>{{ $user->status ?? ''}}</x-admin.table.td>
                <x-admin.table.td>{{ $user->created_at ?? ''}}</x-admin.table.td>
                <x-admin.table.td>{{ $user->email_verified_at ?? ''}}</x-admin.table.td>

                <x-admin.table.td>
                    @if($user->trashed())
                        <div style="">
                            <a class="text-decoration-none" href="{{ route('admin.users.restore', $user->id) }}"
                               title="Восстановить">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
                                    <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
                                </svg>
                            </a>
                            <a class="text-decoration-none"
                               href="{{ route('admin.users.force_delete', $user->id) }}" style="color: red;"
                               title="Очистить корзину">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                </svg>
                            </a>
                        </div>
                    @else
                        <div style="">

                            <x-admin.link class="text-decoration-none" title="Отправить письмо">
                                <x-admin.icon.mail/>
                            </x-admin.link>

                            <a class="text-decoration-none"
                               href="{{ route('admin.users.edit', ['user' => $user]) }}"
                               title="Редактировать пользователя">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd"
                                          d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </a>
                            @if ($user->id !=  \Illuminate\Support\Facades\Auth::id())
                            <a href="javascript:;" class="delete text-decoration-none" rel="{{ $user->id }}"
                               style="color: red;" title="Удалить в корзину">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                </svg>
                            </a>
                            @endif
                        </div>
                    @endif
                </x-admin.table.td>
            </x-admin.table.tr>
        @empty
            <span>
                  Записей не найдено
            </span>
        @endforelse
    </x-admin.table>

@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
            integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
            crossorigin="anonymous"></script>

    <script type="text/javascript">
        // document.addEventListener("DOMContentLoaded", function () {
        //     let elements = document.querySelectorAll(".delete");
        //     elements.forEach(function (e, k) {
        //         e.addEventListener("click", function () {
        //             const id = e.getAttribute('rel');
        //             send(`/admin/users/${id}`).then((result) => {
        //                 const answer = JSON.parse(JSON.stringify(result));
        //                 let alertBlock = document.querySelector('.alert-message');
        //                 alertBlock.textContent = '';
        //                 switch (answer.status.toLowerCase()) {
        //                     case 'ok':
        //                         console.log(JSON.stringify(result));
        //                         const message = `Запись с #ID = ${id} успешно удалена`;
        //                         renderBlock(alertBlock, message, 'success', 'beforeend');
        //                         let removeRow = document.querySelector('#row-' + id);
        //                         removeRow.remove();
        //                         setTimeout("location.reload()", 2000);
        //                         break;
        //                     case 'error':
        //                         console.log(JSON.stringify(result));
        //                         const error = 'Возникла ошибка при удалении записи';
        //                         renderBlock(alertBlock, error, 'danger', 'beforeend');
        //                         break;
        //                     default:
        //                         console.log('Wrong Answer');
        //                 }
        //             });
        //         });
        //     });
        // });
        //
        // async function send(url) {
        //     let response = await fetch(url, {
        //         method: 'DELETE',
        //         headers: {
        //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        //         }
        //     })
        //     // .then(res => {
        //     //     if (res.ok) { console.log("HTTP request successful") }
        //     //     else { console.log("HTTP request unsuccessful") }
        //     //     return res
        //     // })
        //     // .then(res => console.log(res))
        //     // .then(data => console.log(data))
        //     // .catch(error => console.log(error))
        //     let result = await response.json();
        //     return result;
        // }
        //
        function getHtml(message, type = 'success') {
            let alertContent;
            alertContent = `<div class="alert alert-${type} alert-dismissible fade show">
                                ${message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`;
            return alertContent;
        }

        function renderBlock(container, message, type = 'success', target = 'afterbegin') {
            //const alert_message = document.getElementById('alert-message');
            //alert_message.remove();

            container.insertAdjacentHTML(target, getHtml(message, type));
            return true;
        }

        const userUrl = '{{ route('admin.users.index') }}';

        $(document).ready(function () {
            let table = $('#user_table').DataTable({
                processing: true,
                //serverSide: true,
                // ajax: {
                //     url: userUrl
                // },
                //ajax: 'data.json',
                dom: '<"row" <"col-sm-12 col-md-5"l><"col-sm-12 col-md-7 text-end"i>>rt<"row" <"col-sm-12 col-md-5"l><"col-sm-12 col-md-7"p>><"clear">',
                searching: true,
                lengthMenu: [5, 10, 15, 20],
                iDisplayLength: 5,
                order: [[1, 'asc']],
                responsive: true,
                language: {
                    processing: "",
                    search: "Поиск по значению поля&nbsp;:",
                    lengthMenu: "Показано _MENU_ записей",
                    info: "Показано с _START_ по  _END_  из _TOTAL_ записей.",
                    infoEmpty: "Показано с 0 по  0  из 0 записей.",
                    infoFiltered: "(всего фильтровать _MAX_ элемент(а,ов))",
                    infoPostFix: "",
                    loadingRecords: "Загрузка...",
                    zeroRecords: "Нет записей, удовлетворяющих поиску",
                    emptyTable: "Нет данных в таблице",
                    paginate: {
                        first: "Первая",
                        previous: "Предыдущая",
                        next: "Последующая",
                        last: "Последняя"
                    }
                },
                columnDefs: [
                    {
                        searchable: false,
                        orderable: false,
                        targets: 0,
                    },
                    {
                        searchable: false,
                        orderable: false,
                        targets: 11,
                    }
                ]
            });

            table.on('order.dt search.dt', function () {
                let i = 1;
                table.cells(null, 0, {search: 'applied', order: 'applied'}).every(function (cell) {
                    this.data(i++);
                });
            }).draw();

            $('#tableSearchText').on('keyup', function () {
                table.search( this.value ).draw();
            });

            // document.addEventListener("DOMContentLoaded", function () {
            //     let elements = document.querySelectorAll(".delete");
            //     elements.forEach(function (e, k) {
            //         e.addEventListener("click", function () {
            //             const id = e.getAttribute('rel');
            //
            //             console.log('id = ' + id);
            //         });
            //     });
            // });

            $(document).on('click', '.delete', function (event) {
                //const id = $(event.currentTarget).data('id');

                const id = $(event.currentTarget).attr('rel');

                console.log('id = ' + id);
                //console.log('idN = ' + idN);

                $.ajax({
                    url: userUrl + '/' + id,
                    type: 'DELETE',
                    DataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    success: function (response) {
                        let alertBlock = document.querySelector('.alert-message');
                        console.log(response);
                        if (response.success === true) {
                            table.row('#row-' + id).remove().draw(false);
                            renderBlock(alertBlock, response.message, 'success', 'beforeend');
                        } else {
                            renderBlock(alertBlock, response.message, 'warning', 'beforeend');
                        }

                        //renderBlock(alertBlock, response.message, 'success', 'beforeend');
                        document.getElementById('recycled-user-count').innerHTML = '(' + response.recycled + ')';
                    }
                });
            });
        });
    </script>
@endpush
