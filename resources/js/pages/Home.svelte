<script>
    import { Button } from "@/components/ui/button";

    // 1. FIXED IMPORT: Usually you import from the folder, not the specific .svelte file
    import * as Avatar from "@/components/ui/avatar";
    import { Link } from "lucide-svelte";

    let { isLoggedIn, filteredTags } = $props();
</script>
<header class="flex w-full items-center justify-between p-4 border-b min-h-18">
    <div class="absolute top-4 right-4 z-10">

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
    <p> this is the initial landing page Hello :P</p>
    <p>{isLoggedIn ? "EZ" : ":("}</p>
    {#each filteredTags as tag}
        <p>{tag.name}</p>
    {/each}
</main>
