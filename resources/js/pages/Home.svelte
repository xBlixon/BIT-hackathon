<script>
    import { Button } from "@/components/ui/button";
    import SearchBar from "@/components/SearchBar.svelte"
    import * as Avatar from "@/components/ui/avatar";
    import ActivityCard from "@/components/ActivityCard.svelte";

    let { user,events,isLoggedIn, allTags ,filteredTags =[]} = $props();
</script>
<header class="flex w-full items-center justify-between p-4 border-b min-h-18">
    <div>
        <SearchBar allTags={allTags}/>
    </div>
    <div class="gap-4 flex relative top right z-10">
        <Button href={route('event.create')} variant="secondary" size="icon" class="my-auto size-7">+</Button>
    {#if !isLoggedIn}
    <Button href={route('register')}>register</Button>
    <Button href={route('login')}>login</Button>
    {:else}
    <a href={route('profile') }>
        <Avatar.Root class="h-[3vw] w-[3vw] min-h-12 min-w-12">
            <Avatar.Image src="https://github.com/shadcn.png" alt="@shadcn" />
            <Avatar.Fallback>prof</Avatar.Fallback>
        </Avatar.Root>
    </a>
    {/if}
    </div>

</header>
<main>
    <div class="flex flex-wrap">
        {#each events as event}
            {console.dir(event)}
        <ActivityCard class="mr-auto" user={user} {...event} attendees={event.attendees}></ActivityCard>
{/each}
    </div>
    {#each filteredTags as tag}
        <p>{tag.name}</p>
    {/each}
</main>
