<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                {{ $category->title}} {{ __(' - SubCategories List') }}
            </h2>
            <a href="{{ route('category.index') }}"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                @lang('Go back')
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="block mb-8">
                <a href="{{ route('category.subcategory.create', $category->id) }}"
                    class="py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white rounded-xl shadow">{{ _('Add Sub-Category') }}</a>
            </div>

            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            s/n
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Slug
                                        </th>

                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Header
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Footer
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Order
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">view</span>
                                            <span class="sr-only">Edit</span>
                                            <span class="sr-only">Delete</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($category->children as $child)
                                    <tr>
                                        <td class="px-6 py-4 text-sm text-gray-900">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900">
                                            {{ $child->title }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900">
                                            {{ $child->slug }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                            @if ($child->status)
                                            <span class="text-sm text-gray-900 bg-green-300 px-2 py-1 rounded-xl">
                                                Active
                                            </span>
                                            @else
                                            <span class="text-sm text-gray-900 bg-red-300 px-2 py-1 rounded-xl">
                                                In-Active
                                            </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                            @if ($child->show_in_header)
                                            <span class="text-sm   px-2 py-1 rounded-xl">
                                                Yes
                                            </span>
                                            @else
                                            <span class="text-sm   px-2 py-1 rounded-xl">
                                                No
                                            </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                            @if ($child->show_in_footer)
                                            <span class="text-sm   px-2 py-1 rounded-xl">
                                                Yes
                                            </span>
                                            @else
                                            <span class="text-sm   px-2 py-1 rounded-xl">
                                                No
                                            </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $child->order }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium ">
                                            {{-- <a href="{{ route('category.show', $child->id) }}"
                                            class="text-blue-600 m-1 hover:text-blue-900">View</a> --}}
                                            <a href="{{ route('category.subcategory.edit', $child->id) }}"
                                                class="text-indigo-600 m-1 hover:text-indigo-900">Edit</a>
                                            <form action="{{ route('category.destroy', $child->id) }}" class="inline"
                                                method="post"
                                                onsubmit="return confirm('Are you sure you want to Delete?')">
                                                @csrf
                                                @method('delete')
                                                <button class="text-red-600 m-1 hover:text-red-900 p-1">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>