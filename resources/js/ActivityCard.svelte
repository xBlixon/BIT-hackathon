<script>
    import * as Card from "@/components/ui/card/"
    import { Button } from "@/components/ui/button";    
    let title = "tytul";
    let description = "lorem ipsum doltor sit ament"
    let people = "4/10";
</script>

<Card.Root class="min-w-50 max-w-60 m-3 h-80">
    <Card.Header style="font-size:larger">
{title}
    </Card.Header>
    <Card.Content class="flex h-100">
          <p>{description}</p>
        </Card.Content>
        <Card.Footer class="justify-between">
        <Button class="bg-green-600 hover:bg-green-700 text-white ">
          Apply
        </Button>
        <p>{people}</p>

    </Card.Footer>
</Card.Root>

