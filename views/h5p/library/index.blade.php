@extends(config('laravel-h5p.layout'))

@section('h5p')
    <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">

        <div class="grid grid-cols-12 gap-6">

            <div class="col-span-12 md:col-span-9">

                <div
                    class="mb-6 overflow-hidden rounded-lg border border-gray-200 bg-white shadow dark:border-gray-700 dark:bg-gray-800">

                    <form action="{{ route('h5p.library.store') }}" method="POST" id="h5p-library-form" class="p-6"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="h5p-file"
                                class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">{{ trans('laravel-h5p.library.upload_libraries') }}</label>

                            <div
                                class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pb-6 pt-5 transition-colors hover:border-indigo-500 dark:border-gray-600 dark:hover:border-indigo-400">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                        viewBox="0 0 48 48" aria-hidden="true">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex justify-center text-sm text-gray-600 dark:text-gray-400">
                                        <label for="h5p-file"
                                            class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500 dark:bg-gray-800 dark:text-indigo-400">
                                            <span>Upload a file</span>
                                            <input id="h5p-file" name="h5p_file" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        .h5p files only
                                    </p>
                                </div>
                            </div>

                            <div class="mt-4 space-y-3">
                                <div class="flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input type="checkbox" name="h5p_upgrade_only" id="h5p-upgrade-only"
                                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:checked:bg-indigo-600">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="h5p-upgrade-only"
                                            class="font-medium text-gray-700 dark:text-gray-300">{{ trans('laravel-h5p.library.only_update_existing_libraries') }}</label>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input type="checkbox" name="h5p_disable_file_check" id="h5p-disable-file-check"
                                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:checked:bg-indigo-600">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="h5p-disable-file-check"
                                            class="font-medium text-gray-700 dark:text-gray-300">{{ trans('laravel-h5p.library.upload_disable_extension_check') }}</label>
                                    </div>
                                </div>
                            </div>

                            @if ($errors->has('h5p_file'))
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                    {{ $errors->first('h5p_file') }}
                                </p>
                            @endif
                        </div>

                        <div class="mt-4 flex items-center justify-end">
                            <input type="submit" name="submit" value="{{ trans('laravel-h5p.library.upload') }}"
                                class="inline-flex cursor-pointer items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-gray-700 focus:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 active:bg-gray-900 dark:bg-gray-200 dark:text-gray-800 dark:hover:bg-white dark:focus:bg-white dark:focus:ring-offset-gray-800 dark:active:bg-gray-300">
                        </div>
                    </form>

                </div>

            </div>
            <div class="col-span-12 md:col-span-3">
                <div
                    class="mb-6 overflow-hidden rounded-lg border border-gray-200 bg-white shadow dark:border-gray-700 dark:bg-gray-800">

                    <form action="{{ route('h5p.library.clear') }}" method="POST"
                        id="laravel-h5p-update-content-type-cache" class="p-6" enctype="multipart/form-data">
                        @csrf

                        <h4 class="mb-4 text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ trans('laravel-h5p.library.content_type_cache') }}</h4>

                        <div class="flex items-center justify-end">
                            <input type="hidden" id="sync_hub" name="sync_hub" value="">
                            <input type="submit" name="updatecache" id="updatecache"
                                class="inline-flex cursor-pointer items-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 active:bg-red-700 dark:focus:ring-offset-gray-800"
                                value="{{ trans('laravel-h5p.library.clear') }}">
                        </div>
                    </form>

                </div>

            </div>

        </div>

        <div
            class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow dark:border-gray-700 dark:bg-gray-800">
            <div class="border-b border-gray-200 p-6 dark:border-gray-700">
                <p class="text-gray-700 dark:text-gray-300">
                    {{ trans('laravel-h5p.library.search-result', ['count' => count($entrys)]) }}
                </p>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-300">
                                {{ trans('laravel-h5p.library.name') }}</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-300">
                                {{ trans('laravel-h5p.library.version') }}</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-300">
                                {{ trans('laravel-h5p.library.restricted') }}</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-300">
                                {{ trans('laravel-h5p.library.contents') }}</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-300">
                                {{ trans('laravel-h5p.library.contents_using_it') }}</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-300">
                                {{ trans('laravel-h5p.library.libraries_using_it') }}</th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-300">
                                {{ trans('laravel-h5p.library.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-800">
                        @unless (count($entrys) > 0)
                            <tr>
                                <td colspan="7"
                                    class="whitespace-nowrap px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                    {{ trans('laravel-h5p.common.no-result') }}</td>
                            </tr>
                        @endunless

                        @foreach ($entrys as $entry)
                            <tr>
                                <td
                                    class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $entry->title }}
                                </td>
                                <td
                                    class="whitespace-nowrap px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                    {{ $entry->major_version . '.' . $entry->minor_version . '.' . $entry->patch_version }}
                                </td>

                                <td
                                    class="whitespace-nowrap px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                    <input type="checkbox" value="{{ $entry->restricted }}"
                                        @if ($entry->restricted == '1') checked="" @endif
                                        class="laravel-h5p-restricted h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:checked:bg-indigo-600"
                                        data-id="{{ $entry->id }}">
                                </td>

                                <td
                                    class="whitespace-nowrap px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                    {{ number_format($entry->numContent()) }}
                                </td>
                                <td
                                    class="whitespace-nowrap px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                    {{ number_format($entry->getCountContentDependencies()) }}
                                </td>
                                <td
                                    class="whitespace-nowrap px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                    {{ number_format($entry->getCountLibraryDependencies()) }}
                                </td>

                                <td class="whitespace-nowrap px-6 py-4 text-center text-sm font-medium">
                                    <button
                                        class="laravel-h5p-destory inline-flex items-center rounded-md border border-transparent bg-red-600 px-3 py-1 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 active:bg-red-700 dark:focus:ring-offset-gray-800"
                                        data-id="{{ $entry->id }}">{{ trans('laravel-h5p.library.remove') }}</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="border-t border-gray-200 bg-gray-50 p-4 dark:border-gray-600 dark:bg-gray-700">
                {!! $entrys->links() !!}
            </div>
        </div>

    </div>
@endsection

@push('h5p-header-script')
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>
    {{--    core styles       --}}
    @foreach ($settings['core']['styles'] as $style)
        <link rel="stylesheet" href="{{ $style }}">
    @endforeach
@endpush

@push('h5p-footer-script')
    <script type="text/javascript">
        H5PAdminIntegration = {!! json_encode($settings) !!};
    </script>

    {{--    core script       --}}
    @foreach ($required_files['scripts'] as $script)
        <script src="{{ $script }}"></script>
    @endforeach

    <script type="text/javascript">
        (function($) {

            if (!$) {
                console.warn("jQuery not loaded for H5P library management.");
                return;
            }

            $(document).ready(function() {

                // File input change handler to show filename
                $('#h5p-file').on('change', function() {
                    var fileName = $(this).val().split('\\').pop();
                    if (fileName) {
                        $(this).prev('span').text(fileName);
                    } else {
                        $(this).prev('span').text('Upload a file');
                    }
                });

                $(document).on("click", ".laravel-h5p-restricted", function(e) {
                    var $this = $(this);
                    $.ajax({
                        url: "{{ route('h5p.library.restrict') }}",
                        data: {
                            id: $this.data('id'),
                            selected: $this.is(':checked')
                        },
                        success: function(response) {
                            alert("{{ trans('laravel-h5p.library.updated') }}");
                        },
                        error: function() {
                            alert("Error updating restriction status");
                            $this.prop('checked', !$this.is(':checked')); // Revert
                        }
                    });
                });

                $(document).on("submit", "#laravel-h5p-update-content-type-cache", function(e) {
                    if (confirm("{{ trans('laravel-h5p.library.confirm_clear_type_cache') }}")) {
                        return true;
                    } else {
                        return false;
                    }
                });

                $(document).on("click", ".laravel-h5p-destory", function(e) {

                    var $obj = $(this);
                    var msg = "{{ trans('laravel-h5p.library.confirm_destroy') }}";
                    if (confirm(msg)) {

                        $.ajax({
                            url: "{{ route('h5p.library.destroy') }}",
                            data: {
                                id: $obj.data('id'),
                                _token: "{{ csrf_token() }}"
                            }, // Ensure CSRF token is sent
                            method: "DELETE",
                            success: function(response) {
                                if (response.msg) {
                                    alert(response.msg);
                                }
                                location.reload();
                            },
                            error: function() {
                                alert(
                                    "{{ trans('laravel-h5p.library.can_not_destroy') }}"
                                );
                                location.reload();
                            }
                        })
                    }

                });

            });

        })(window.H5P && window.H5P.jQuery ? window.H5P.jQuery : window.jQuery);
    </script>
@endpush
