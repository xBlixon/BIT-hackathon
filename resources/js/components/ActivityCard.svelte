<script>
    import * as Card from "@/components/ui/card/";
    import { Button } from "@/components/ui/button";   
    import * as Dialog from "@/components/ui/dialog";
    import { Badge } from "@/components/ui/badge"; 

    let { 
        title = "Default Title", 
        description = "Default description...", 
        people = "0/10", 
        tags = []
    } = $props(); 
</script>

<Dialog.Root>
    <Dialog.Trigger>
        {#snippet child({ props })}
            <Card.Root 
                {...props} 
                class="min-w-[200px] max-w-[240px] m-3 h-80 flex flex-col text-left hover:bg-slate-50 transition-colors cursor-pointer"
            >
                <Card.Header>
                    <Card.Title class="text-lg">{title}</Card.Title>
                </Card.Header>
                
                <Card.Content class="flex-1">
                    <p class="text-sm text-gray-600 line-clamp-4">{description}</p>
                </Card.Content>

                <Card.Footer class="flex justify-between items-center">
                    
                    <Button 
                        class="bg-green-600 hover:bg-green-700 text-white h-8" 
                        onclick={(e) => { e.stopPropagation(); console.log('Joined!'); }}
                    >
                        Join
                    </Button>
                    
                    <p class="text-sm text-gray-500">{people}</p>
                </Card.Footer>
            </Card.Root>
        {/snippet}
    </Dialog.Trigger>

    <Dialog.Content class="sm:max-w-[600px]">
        <Dialog.Header>
            <Dialog.Title class="text-2xl">{title}</Dialog.Title>
        </Dialog.Header>

        <div class="grid gap-6 py-4">
            <div class="space-y-2">
                <h4 class="font-medium leading-none">Description</h4>
                <p class="text-sm text-muted-foreground">
                    {description}
                </p>
            </div>
            
            <div class="space-y-2">
                 <h4 class="font-medium leading-none">Status</h4>
                 <Badge variant="outline">Open</Badge>
            </div>
        </div>

        <Dialog.Footer>
            <Button class="bg-green-600 hover:bg-green-700 text-white">
                Confirm Join
            </Button>
        </Dialog.Footer>
    </Dialog.Content>
</Dialog.Root>