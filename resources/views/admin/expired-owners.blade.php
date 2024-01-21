<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
            削除済みオーナー照会
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <section class="text-gray-600 body-font">
                        <x-flash-message status="session('status')" />
                        <div class="container px-5 mx-auto">
                        <div class="flex justify-end mb-4">
                            <button onclick="location.href='{{ route('admin.owners.create') }}'"  class=" text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">New Create</button>
                        </div>
                          <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                              <thead>
                                <tr>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Name</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Email</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Date</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($expiredOwners as $owner)
                                <tr>
                                  <td class="px-4 py-3">{{ $owner->name }}</td>
                                  <td class="px-4 py-3">{{ $owner->email }}</td>
                                  <td class="px-4 py-3">{{ $owner->deleted_at->diffForHumans() }}</td>
                                  <form id="delete_{{ $owner->id }}" method="post" action="{{ route('admin.expired-owners.destroy', ['owner' => $owner->id]) }}">
                                  @csrf
                                  {{-- @method('delete') --}}
                                    <td class="px-4 py-3">
                                    <a href="#" data-id="{{ $owner->id }}" onclick="deletePost(this)" class=" text-white bg-red-400 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded">Data Clear</a>
                                  </td>
                                  </form>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                    </section>

                    {{-- //diffForHumans() ○年前、○ヶ月前 表記とする  --}}
                    {{-- Eloquent
                    @foreach ($e_all as $e_owner)
                        {{ $e_owner->name }}
                        {{ $e_owner->created_at->diffForHumans() }}
                    @endforeach
                    <br>
                    QueryBuilder
                    @foreach ($q_get as $q_owner)
                        {{ $q_owner->name }}
                        {{ Carbon\Carbon::parse($q_owner->created_at)->diffForHumans() }}
                    @endforeach --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        function deletePost(e) {
            'use strict';
            if (confirm('Really delete?')){
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>
