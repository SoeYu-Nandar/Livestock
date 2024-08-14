<x-admin-layout>
    <x-dashboard-card :admin="$admin" :blogs="$blogs" :user="$user" :faq="$faq"/>
    <x-user-list :users="$users"/>
</x-admin-layout>