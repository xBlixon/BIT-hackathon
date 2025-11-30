<script>
    import { Button } from "@/components/ui/button";
    
    import * as Avatar from "@/components/ui/avatar"; 
    import { Link } from "lucide-svelte";
    import ActivityCard from "@/ActivityCard.svelte";

    let { isLoggedIn } = $props();
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
    <p>tu bedzie search bar</p>
    <div class="flex">
        <ActivityCard/>
        <ActivityCard/>
        <ActivityCard/>
        
    </div>
    <div class="absolute bottom-4 right-4">
<Button  variant="secondary" size="icon" class="size-12">+</Button>
    </div>
</main>
