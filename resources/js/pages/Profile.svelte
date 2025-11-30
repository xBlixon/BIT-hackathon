<script lang='ts'>
    import {Button} from "@/components/ui/button";
    import * as Avatar from "@/components/ui/avatar";
    let {user}=$props();
</script>

<div class="flex justify-center h-screen">
    <div  class="flex align-center flex-col">
    <div class="mx-auto">
        <Avatar.Root class="h-[20vw] w-[20vw] min-h-12 min-w-12">
            <Avatar.Image src="https://github.com/shadcn.png" alt="@shadcn" />
            <Avatar.Fallback>prof</Avatar.Fallback>
        </Avatar.Root>
    </div>
    <h1 class="text-center">Hello {user.username}!</h1>
    <h2>This is your profile page</h2>
    <Button href={route('home')} class="m-4">Home</Button>
    <Button href={route('logout')} class="m-4">Logout</Button>
</div>
</div>