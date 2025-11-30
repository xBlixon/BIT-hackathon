<script>
    import * as Card from "@/components/ui/card/"
    import { Button } from "@/components/ui/button";   
    import * as Dialog from "@/components/ui/dialog"

    let title = "tytul";
    let description = "lorem ipsum doltor sit ament"
    let people = "4/10";
</script>

<Dialog.Root>
    <Dialog.Trigger class="w-full text-left focus:outline-none">

<Card.Root class="min-w-50 max-w-60 m-3 h-80">
    <Card.Header style="font-size:larger">
        <div class="flex justify-between items-start"></div>
{title}
    </Card.Header>
    <Card.Content class="flex h-100">
          <p>{description}</p>
        </Card.Content>
        <Card.Footer class="justify-between">
        <Button class="bg-green-600 hover:bg-green-700 text-white ">
          Join
        </Button>
        <p>{people}</p>

    </Card.Footer>
</Card.Root>

</Dialog.Trigger>

<Dialog.Content class="sm:max-w-[600px]">
    <Dialog.Header>
        <div class="flex items-center gap-2 mb-2">
            
        </div>
        <Dialog.Title class="text-2xl">{title}</Dialog.Title>
    </Dialog.Header>

    <div class="grid gap-6 py-4">
    <div class="space-y-2">
        <h4 class="front-medium leading-none">Description</h4>
        <p class="text-sm text-muted-foreground">
            {description}
        </p>
    </div>

</div>
<Dialog.Footer>
    <Button class="absolute bottom-5 right-5 bg-green-600 hover:bg-green-700 text-white ">Join</Button>
</Dialog.Footer>
</Dialog.Content>
</Dialog.Root>