<script lang='ts'>
    import {Button} from "@/components/ui/button"
</script>

<div>
    <p>This is profile page</p>
    <Button href={route('home')}>Home</Button>
    <Button href={route('logout')}>Logout</Button>
</div>