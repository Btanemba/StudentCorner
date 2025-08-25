{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Booking tables" icon="	la la-calendar-check" :link="backpack_url('booking-table')" />
<x-backpack::menu-item title="Clients" icon="la la-users" :link="backpack_url('client')" />
<x-backpack::menu-item title="University applications" icon="la la-graduation-cap" :link="backpack_url('university-application')" />

<x-backpack::menu-item title="Universities" icon="la la-university" :link="backpack_url('university')" />


{{-- <x-backpack::menu-item title="Messages" icon="la la-comments" :link="backpack_url('message')" />
 --}}

 <x-backpack::menu-item title="Communication" icon="la la-comments" :link="backpack_url('message/chat')" />


<x-backpack::menu-item
    title="Mail"
    icon="la la-envelope"
    :link="'https://www.studentcorner.ng:2096/cpsess9882188737/3rdparty/roundcube/?_task=mail&_mbox=INBOX'"
    target="_blank"
/>
