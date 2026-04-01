<!-- Sidebar -->
<div class="hidden md:flex flex-col w-64 bg-gray-800 text-white min-h-screen">
    <!-- Logo -->
    <div class="flex items-center justify-center h-16 bg-gray-900 font-bold text-xl uppercase shadow-md">
        {{ config('app.name', 'HRM App') }}
    </div>

    <!-- Navigation Links -->
    <div class="flex-1 overflow-y-auto pt-4">
        <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" icon="fa-solid fa-tachometer-alt">
            {{ __('Dashboard') }}
        </x-sidebar-link>

        @hasrole('Admin|HR')
        <div class="text-xs uppercase text-gray-400 font-semibold mt-4 mb-2 px-6">Company</div>
        <x-sidebar-link :href="route('departments.index')" :active="request()->routeIs('departments.*')" icon="fa-solid fa-building">
            {{ __('Departments') }}
        </x-sidebar-link>
        <x-sidebar-link :href="route('designations.index')" :active="request()->routeIs('designations.*')" icon="fa-solid fa-id-badge">
            {{ __('Designations') }}
        </x-sidebar-link>
        @endhasrole

        <div class="text-xs uppercase text-gray-400 font-semibold mt-4 mb-2 px-6">Staff</div>
        @hasrole('Admin|HR')
        <x-sidebar-link :href="route('employees.index')" :active="request()->routeIs('employees.*')" icon="fa-solid fa-users">
            {{ __('Employees') }}
        </x-sidebar-link>
        @endhasrole
        <x-sidebar-link :href="route('attendances.index')" :active="request()->routeIs('attendances.*')" icon="fa-solid fa-clock">
            {{ __('Attendance') }}
        </x-sidebar-link>
        <x-sidebar-link :href="route('leaves.index')" :active="request()->routeIs('leaves.*')" icon="fa-solid fa-calendar-times">
            {{ __('Leaves') }}
        </x-sidebar-link>

        <div class="text-xs uppercase text-gray-400 font-semibold mt-4 mb-2 px-6">Finance</div>
        <x-sidebar-link :href="route('payrolls.index')" :active="request()->routeIs('payrolls.*')" icon="fa-solid fa-money-bill-wave">
            {{ __('Payroll') }}
        </x-sidebar-link>

        <div class="text-xs uppercase text-gray-400 font-semibold mt-4 mb-2 px-6">System</div>
        <x-sidebar-link :href="route('documents.index')" :active="request()->routeIs('documents.*')" icon="fa-solid fa-folder-open">
            {{ __('Documents') }}
        </x-sidebar-link>
        @hasrole('Admin')
        <x-sidebar-link :href="route('settings.index')" :active="request()->routeIs('settings.*')" icon="fa-solid fa-cogs">
            {{ __('Settings') }}
        </x-sidebar-link>
        @endhasrole
    </div>
</div>
