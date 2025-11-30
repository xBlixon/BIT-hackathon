<script>
    import { Button } from "@/components/ui/button";
    import SearchBar from "@/components/SearchBar.svelte"
    import * as Avatar from "@/components/ui/avatar";
    import ActivityCard from "@/components/ActivityCard.svelte";

    let { isLoggedIn, allTags ,filteredTags =[]} = $props();
</script>
<header class="flex w-full items-center justify-between p-4 border-b min-h-18">
    <div>
        <SearchBar allTags={allTags}/>
    </div>
    <div class="relative top right z-10">

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
    <div class="flex">
        <ActivityCard/>
        <ActivityCard/>
        <ActivityCard/>

    </div>
    <div class="absolute bottom-4 right-4">
<Button  variant="secondary" size="icon" class="size-12">+</Button>
    </div>
    {#each filteredTags as tag}
        <p>{tag.name}</p>
    {/each}
</main>
