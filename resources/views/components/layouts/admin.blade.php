<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />

    @vite('resources/css/app.css')
    @fluxStyles
</head>
<body>

<flux:header container class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
    <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

    <flux:brand href="#" logo="https://fluxui.dev/img/demo/logo.png" name="Acme Inc." class="max-lg:hidden dark:hidden" />
    <flux:brand href="#" logo="https://fluxui.dev/img/demo/dark-mode-logo.png" name="Acme Inc." class="max-lg:!hidden hidden dark:flex" />

    <flux:navbar class="-mb-px max-lg:hidden">
        <flux:navbar.item icon="home" href="#" current>Home</flux:navbar.item>
        <flux:navbar.item icon="inbox" badge="12" href="#">Inbox</flux:navbar.item>
        <flux:navbar.item icon="document-text" href="#">Documents</flux:navbar.item>
        <flux:navbar.item icon="calendar" href="#">Calendar</flux:navbar.item>

        <flux:separator vertical variant="subtle" class="my-2"/>

        <flux:dropdown class="max-lg:hidden">
            <flux:navbar.item icon-trailing="chevron-down">Favorites</flux:navbar.item>

            <flux:navmenu>
                <flux:navmenu.item href="#">Marketing site</flux:navmenu.item>
                <flux:navmenu.item href="#">Android app</flux:navmenu.item>
                <flux:navmenu.item href="#">Brand guidelines</flux:navmenu.item>
            </flux:navmenu>
        </flux:dropdown>
    </flux:navbar>

    <flux:spacer />

    <flux:navbar class="mr-4">
        <flux:navbar.item icon="magnifying-glass" href="#" label="Search" />
        <flux:navbar.item class="max-lg:hidden" icon="cog-6-tooth" href="#" label="Settings" />
        <flux:navbar.item class="max-lg:hidden" icon="information-circle" href="#" label="Help" />
    </flux:navbar>

    <flux:dropdown position="top" align="start">
        <flux:profile avatar="https://fluxui.dev/img/demo/user.png" />

        <flux:menu>
            <flux:menu.radio.group>
                <flux:menu.radio checked>Olivia Martin</flux:menu.radio>
                <flux:menu.radio>Truly Delta</flux:menu.radio>
            </flux:menu.radio.group>

            <flux:menu.separator />

            <flux:menu.item icon="arrow-right-start-on-rectangle">Logout</flux:menu.item>
        </flux:menu>
    </flux:dropdown>
</flux:header>

<flux:main container>
    <flux:heading size="xl" level="1">Admin</flux:heading>

    <flux:subheading size="lg" class="mb-6">Here's what's new today</flux:subheading>

    <flux:separator variant="subtle" />

    {{ $slot }}

</flux:main>

<flux:toast />
@fluxScripts
</body>
</html>
